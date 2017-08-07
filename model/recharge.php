<?php
class Model_Recharge {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function alipayRecharge($alipay_id,$member_id){

		if(!is_numeric($alipay_id) || !is_numeric($alipay_id)){
			return false;
		}
	
		$db = Db::instance();

		$alipay_row = $db->fetchRow("select * from alipay_history where id = {$alipay_id} and status = 1 and recharge_id = 0 limit 1");
		if(empty($alipay_row)){
			//echo '已经充值过的';
			return false;
		}

		/**
		$check_code = $alipay_row['check_code'];
		
		$alipay_check = $db->fetchRow("select * from alipay_check where check_code = {$check_code} limit 1");

		$member_id = $alipay_check['member_id'];
		**/

		$member = $db->fetchRow("select * from member where id = {$member_id} limit 1");

		if(empty($member)){
			return $member;
		}

		if(empty($member['ss_user_id'])){
			$ss_user_id = $this->create_ss_user_id($member['id']);
		}
		else{
			$ss_user_id = $member['ss_user_id'];
		}

		if(empty($ss_user_id)){
			return false;
		}

		$user = $db->fetchRow("select * from user where id = {$ss_user_id} limit 1");

		$uid = $ss_user_id;

		$amount = $alipay_row['amount'];
	
		if($amount < 15 && $amount >= 1){
			$expire_time = 86400 / 5 * $amount;
			$bytes = $amount / 5 * 1024 * 1024 * 1024;
		}
		elseif($amount >= 15){
			//echo '10块钱以上';
			$expire_time = $amount / PRICE_M * 31 * 86400;
			$bytes = $amount / PRICE_M * TRIFFIC_M;

			if($amount >= PRICE_Y){
				$expire_time = PRICE_M * 12 / PRICE_Y * $expire_time;
				//$bytes = $bytes * 1;
				$bytes = PRICE_M * 12 / PRICE_Y * $bytes;
			}

		}
		else{
			return false;
		}
		
		try{

			$db->beginTransaction();

			$expire_dateline_old = $user['expire_dateline'];

			if($expire_dateline_old < time()){
				$expire_dateline_new = time() + $expire_time;
			}
			else{
				$expire_dateline_new = $expire_dateline_old + $expire_time;
			}

			$db->exec("update user set transfer_enable = transfer_enable+{$bytes},expire_dateline={$expire_dateline_new},enable = 1 where id = {$uid} limit 1");

			$bind_recharge_history = array();
			$bind_recharge_history['uid'] = $uid;
			$bind_recharge_history['alipay_id'] = $alipay_row['id'];
			$bind_recharge_history['dateline'] = time();
			$bind_recharge_history['expire_dateline_old'] = $expire_dateline_old;
			$bind_recharge_history['expire_dateline_new'] = $expire_dateline_new;

			$bind_recharge_history['expire_time'] = $expire_time;
			$bind_recharge_history['bytes'] = $bytes;

			$db->insert("recharge_history",$bind_recharge_history);

			$recharge_id = $db->lastInsertId();

			$db->update("alipay_history",array("recharge_id"=>$recharge_id,"recharge_time"=>time(),'recharge_expire'=>$expire_time,'recharge_bytes'=>$bytes),array("id={$alipay_row['id']}"));

			//member_level 372 days
			if($expire_time >= 32140800){
				$db->exec("update user set member_level = 1 where id = {$uid} limit 1");
			}

			$db->commit();

			$result = true;
			//return $amount;

		}
		catch(Exception $e){
			$db->rollBack();
			$result = false;
			//return false;
		}

		if($result && !empty($member['inviter_id'])){
			
			$i_expire_time = $expire_time / 5;

			$i_bytes = $bytes / 5;

			$be_invited_id = $member_id;
			$inviter_id = $member['inviter_id'];
			//被邀请者奖励
			$this->inviteRecharge($member_id,$i_expire_time,$i_bytes,$be_invited_id,$inviter_id);
			//邀请人奖励
			$this->inviteRecharge($inviter_id,$i_expire_time,$i_bytes,$be_invited_id,$inviter_id);

		}

		//union record
		if(!empty($recharge_id) && !empty($member['union_member_id'])){
			$union_member_id = $member['union_member_id'];
			$union_thread_id = $member['union_thread_id'];
			$pay_history_id = $alipay_id;
			Model_Union::instance()->addDealData($member_id,$union_member_id,$union_thread_id,$amount,$pay_history_id,$recharge_id);	
		}

		return $result;
	}

	public function create_ss_user_id($member_id){
		
		$db = Db::instance();

		$row = $db->fetchRow("select * from user where prepare = 1 limit 1");

		if(!empty($row)){

			$k = rand(1111111,9999999);

			$db->update("user",array("prepare"=>$k,"u"=>0,"d"=>0),array("id = {$row['id']}"));

			$prepare_user = $db->fetchRow("select * from user where prepare = {$k} and id = {$row['id']} limit 1");
		}

		if(!empty($prepare_user)){

			$ss_user_id = $prepare_user['id'];
			
			$db->update("member",array("ss_user_id"=>$ss_user_id),array("id={$member_id}"));

			return $ss_user_id;
		}


		try{
			$db->beginTransaction();

			$max_port = $db->fetchOne("select max(port) as max_port from user");
		
			$ss_bind = array();
			$ss_bind['passwd'] = rand(11111111,99999999);
			$ss_bind['port'] = $max_port + 1;

			$db->insert("user",$ss_bind);

			$ss_user_id = $db->lastInsertId();

			if(empty($ss_user_id)){
				$db->rollBack();
				
			}
			else{
			
				$db->update("member",array("ss_user_id"=>$ss_user_id),array("id={$member_id}"));
			
				$db->commit();
			}
		
		}
		catch(Exception $e){
			
			$db->rollBack();
		
		}

		return $ss_user_id;

	}

	public function inviteRecharge($member_id,$expire_time,$bytes,$be_invited_id,$inviter_id){
	
		$db = Db::instance();

		$member = $db->fetchRow("select * from member where id = {$member_id} limit 1");

		if(empty($member)){
			return $member;
		}

		if(empty($member['ss_user_id'])){
			$ss_user_id = $this->create_ss_user_id($member['id']);
		}
		else{
			$ss_user_id = $member['ss_user_id'];
		}

		if(empty($ss_user_id)){
			return false;
		}

		$user = $db->fetchRow("select * from user where id = {$ss_user_id} limit 1");

		$uid = $ss_user_id;
		
		try{

			$db->beginTransaction();

			$expire_dateline_old = $user['expire_dateline'];

			if($expire_dateline_old < time()){
				$expire_dateline_new = time() + $expire_time;
			}
			else{
				$expire_dateline_new = $expire_dateline_old + $expire_time;
			}

			$db->exec("update user set transfer_enable = transfer_enable+{$bytes},expire_dateline={$expire_dateline_new},enable = 1 where id = {$uid} limit 1");

			$bind_recharge_history = array();
			$bind_recharge_history['uid'] = $uid;

				$bind_recharge_history['be_invited_id'] = $be_invited_id;
				$bind_recharge_history['inviter_id'] = $inviter_id;

			$bind_recharge_history['dateline'] = time();
			$bind_recharge_history['expire_dateline_old'] = $expire_dateline_old;
			$bind_recharge_history['expire_dateline_new'] = $expire_dateline_new;
			
			$bind_recharge_history['expire_time'] = $expire_time;
			$bind_recharge_history['bytes'] = $bytes;

			$db->insert("recharge_history",$bind_recharge_history);

			$recharge_id = $db->lastInsertId();

			$db->commit();

			return true;

		}
		catch(Exception $e){
			$db->rollBack();
			return false;
		}

	
	}
}

