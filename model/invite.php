<?php
class Model_Invite {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function add_invite_record($user_1_mid,$user_2_mid){

		if(empty($user_1_mid) || empty($user_2_mid)){
			return false;
		}

		if(!is_numeric($user_1_mid) || !is_numeric($user_2_mid)){
			return false;
		}

		$db = Db::instance();

		$member_1 = $db->fetchRow("select * from member where id = {$user_1_mid} limit 1");

		if(empty($member_1)){
			return false;
		}

		if(empty($member_1['ss_user_id'])){
			return false;
		}

		$user_1_sid = $member_1['ss_user_id'];

		$bind = array();

		$bind['user_1_mid'] = $user_1_mid;

		$bind['user_1_sid'] = $user_1_sid;

		$bind['user_2_mid'] = $user_2_mid;

		$bind['type'] = 1;//1 受邀人注册 2受邀人退款

		$bind['status'] = 0;

		$bind['dateline'] = time();

		$db->insert("member_invite",$bind);

		$lastInsertId = $db->lastInsertId();

		return $lastInsertId;

	}
	//奖赏
	public function first_judge($user_2_mid,$recharge_card){

		if(empty($user_2_mid) || empty($recharge_card)){
			return false;
		}

		if(!is_numeric($user_2_mid) || !is_numeric($recharge_card)){
			return false;
		}

		$db = Db::instance();

		$member_2 = $db->fetchRow("select * from member where id = {$user_2_mid} limit 1");

		if(empty($member_2)){
			return false;
		}

		$record = $db->fetchRow("select * from member_invite where user_2_mid = {$user_2_mid} and type = 1 and status = 0 limit 1");
		if(empty($record)){
			//echo "非受邀请者 或 已经奖赏过了\n";
			return false;//非受邀请者 或 已经奖赏过了 
		}

		$user_1_mid = $record['user_1_mid'];

		$user_1_sid = $record['user_1_sid'];

		$user_2_sid = $member_2['ss_user_id'];

		$transfer = 10 * 1024 * 1024 * 1024;
		
		$expire = 86400 * 15;

		try{
			$db->beginTransaction();

			//执行奖赏	
			$do = $db->exec("update user set transfer_enable = transfer_enable + {$transfer},expire_dateline = expire_dateline + {$expire}  where id in ({$user_1_sid},{$user_2_sid})");

			//记录奖赏

			$bind = array();

			$bind['user_2_sid'] = $user_2_sid;

			$bind['status'] = 1;
			
			$bind['recharge_card'] = $recharge_card;

			$bind['judge_time'] = time();

			$bind['judge_expire'] = $expire;

			$bind['judge_transfer'] = $transfer;

			$db->update("member_invite",$bind,array("id = {$record['id']}"));

			$db->commit();

		}
		catch(Exception $e){
			$db->rollBack();
		}

		return $do;

	}

	//收回奖赏
	public function refund_if_first($user_2_mid,$recharge_card){

		if(empty($user_2_mid) || empty($recharge_card)){
			return false;
		}

		if(!is_numeric($user_2_mid) || !is_numeric($recharge_card)){
			return false;
		}

		$do = 0;

		$db = Db::instance();

		try{

			$db->beginTransaction();

			$member_2 = $db->fetchRow("select * from member where id = {$user_2_mid} limit 1");

			if(empty($member_2)){
				return false;
			}

			$record = $db->fetchRow("select * from member_invite where user_2_mid = {$user_2_mid} and type = 1 and status = 1 and recharge_card = {$recharge_card} limit 1");
			if(empty($record)){
				//echo "非受邀请者 或 不是退第一张充值卡 或 已撤赏\n";
				return false;//非受邀请者 或 不是退第一张充值卡
			}

			$user_1_mid = $record['user_1_mid'];

			$user_1_sid = $record['user_1_sid'];

			$user_2_sid = $record['user_2_sid'];

			$transfer = $record['judge_transfer'];

			$expire = $record['judge_expire'];

			//开始收回奖赏

			$do = $db->exec("update user set transfer_enable = transfer_enable - {$transfer},expire_dateline = expire_dateline - {$expire}  where id in ({$user_1_sid},{$user_2_sid})");


			$bind = array();

			$bind['user_1_mid'] = $user_1_mid;

			$bind['user_1_sid'] = $user_1_sid;

			$bind['user_2_mid'] = $user_2_mid;
			
			$bind['user_2_sid'] = $user_2_sid;

			$bind['type'] = 2;//1 受邀人注册 2受邀人退款

			$bind['status'] = 4;
			
			$bind['recharge_card'] = $recharge_card;

			$bind['judge_time'] = time();

			$bind['judge_expire'] = $expire;

			$bind['judge_transfer'] = $transfer;

			$bind['dateline'] = time();

			$db->insert("member_invite",$bind);
			
			//改记录已经撤赏
			$db->update("member_invite",array('status'=>4),array("id = {$record['id']}"));

			$lastInsertId = $db->lastInsertId();

			$db->commit();
		}
		catch(Exception $e){
			$db->rollBack();
		}

		return $do;

	}

}
