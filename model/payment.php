<?php
class Model_Payment {
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function easyPay($bind){

		if($bind['gateway'] == 'easypay'){
			return $this->rechargeByAlipayPay($bind);
		}		
		else{
			return false;
		}
	}


	public function rechargeByAlipayPay($bind){
		
		if($bind['status'] != '交易成功'){
			return false;
		}


		$tradeNo = trim($bind['tradeNo']);
		$checkCode = trim($bind['desc']);
		$dateline = strtotime($bind['time']);
		$username = $bind['username'];
		$amount = trim($bind['amount']);

		if(!is_numeric($tradeNo) || !is_numeric($amount)){
			return false;
		}
		if(empty($tradeNo)){
			return false;
		}
		
		$db = Db::instance();

		/*	
		$row_check = $db->fetchRow("select * from alipay_check where check_code = {$checkCode} limit 1");
		
		if(empty($row_check)){
			echo '备注填错了';
			return false;
		}

		if($row_check['status'] > 0){
			echo "已经收到过通知了\n";
			return false;
		}
		
		$member_id = $row_check['member_id'];
		*/

		$row_alipay_history = $db->fetchRow("select * from alipay_history where trade_no = '{$tradeNo}' limit 1");

		if(!empty($row_alipay_history)){
			echo 'tradeNo 已经存在';
			return false;
			//$alipay_row = $row_alipay_history;	
		}
		else{
		
			$insert = array();
			$insert['status'] = 1;
			$insert['trade_no'] = $tradeNo;
			$insert['check_code'] = $checkCode;
			$insert['amount'] = $amount;
			$insert['dateline'] = $dateline;
			$insert['username'] = $username;

			$db->insert("alipay_history",$insert);

			$lastInsertId = $db->lastInsertId();

			//$alipay_row = $db->fetchRow("select * from alipay_history where id = {$lastInsertId} limit 1");

			//$db->update("alipay_check",array("status"=>1),array("id={$row_check['id']}"));
		}

		//$alipay_id = $alipay_row['id'];
		
		if(!empty($lastInsertId) && !empty($checkCode) && preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$checkCode)){
			$email = $db->quote($checkCode);
			$member_id = $db->fetchOne("select id from member where email = {$email} limit 1");
			if(!empty($member_id)){
				$recharge_result = Model_Payment::instance()->rechargeByAliTradeNo($tradeNo,$member_id);
				if($recharge_result){
					$db->update("alipay_history",array('status'=>2),array("id={$lastInsertId}"));
				}
			}
		}

		return $lastInsertId;

		//$result = Model_Recharge::instance()->alipayRecharge($alipay_id);
		/*
		if($result){
			 ' 充值成功';
		}
		else{
			 ' 充值成功';
		}
		*/
	}

	public function rechargeByAliTradeNo($tradeNo,$member_id){

		if(!is_numeric($tradeNo)){
			return false;
		}

		$db = Db::instance();

		$row = $db->fetchRow("select * from alipay_history where trade_no = '{$tradeNo}' and recharge_id = 0 and status = 1 limit 1");

		if(!empty($row)){
			$alipay_id = $row['id'];		
			$result = Model_Recharge::instance()->alipayRecharge($alipay_id,$member_id);
			return $result;
		}
		else{
			return false;
		}

	}
}
