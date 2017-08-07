<?php
class Model_Union {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function addDealData($member_id,$union_member_id,$union_thread_id,$amount,$pay_history_id,$recharge_id){

		if(!is_numeric($member_id) || !is_numeric($union_member_id) || !is_numeric($union_thread_id) || !is_numeric($amount)){
			return false;
		}
		
		$db = Db::instance();

		$union_member = $db->fetchRow("select * from union_member where id = {$union_member_id} and status = 1 limit 1");
		if(empty($union_member)){
			return false;
		}

		$limit_time = time() - 86400 * 60;

		$row = $db->fetchRow("select * from member where id = {$member_id} and union_member_id = {$union_member_id} and register_time > $limit_time limit 1");

		if(empty($row)){
			return false;
		}

		try{
			$commission_rate = $union_member['commission_rate'];

			if($commission_rate < 10){
				$commission_rate = 10;
			}
			
			$db->beginTransaction();
		
			$bind_um = array();
			$bind_um['member_id'] = $member_id;
			$bind_um['union_member_id'] = $union_member_id;
			$bind_um['union_thread_id'] = $union_thread_id;
			$bind_um['dateline'] = time();
			$bind_um['status'] = 1;
			$bind_um['pay_history_id'] = $pay_history_id;
			$bind_um['payment_type'] = 1;//alipay
			$bind_um['top_up_amount'] = $amount;
			$bind_um['commission_rate'] = $commission_rate;
			$bind_um['commission_amount'] = $amount * $commission_rate / 100;
			$bind_um['recharge_id'] = $recharge_id;
			
			$db->insert("union_deal_data",$bind_um);

			$lastInsertId = $db->lastInsertId();

			$balance = $union_member['balance'] + $bind_um['commission_amount'];

			$db->update("union_member",array("balance"=>$balance),array("id={$union_member_id}"));

			$db->commit();

			
			return $lastInsertId;

		}
		catch(Exception $e){
			$db->rollBack();
			return false;
		}

	}


}
