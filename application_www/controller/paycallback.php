<?php
class Controller_paycallback extends Action {

	public function init(){
	
	}

	public function action_index(){
		
		$this->render();
	}

	public function action_hand(){

		if(!empty($_POST['pwd']) && !empty($_POST['sn']) && !empty($_POST['amount']) && is_numeric($_POST['sn']) && is_numeric($_POST['amount'])){

			if($_POST['pwd'] != KEY_HAND){
				die('hehe');
			}

			$db = Db::instance();

			$tradeNo = trim($_POST['sn']);

			$amount = $_POST['amount'];
		
			$row_alipay_history = $db->fetchRow("select * from alipay_history where trade_no = '{$tradeNo}' limit 1");

			if(!empty($row_alipay_history)){
				echo 'tradeNo is exist';
				die();
			}
			else{
		
				$amount = $_POST['amount'];
	
				$insert = array();
				$insert['status'] = 1;
				$insert['trade_no'] = $tradeNo;
				$insert['amount'] = $amount;
				$insert['dateline'] = time();

				$db->insert("alipay_history",$insert);

				$lastInsertId = $db->lastInsertId();
				
				echo $lastInsertId;die();


			}




		}

		$this->render('paycallback/hand');

	}

	public function action_easypay(){

		if(empty($_POST)){
			return false;
		}

		echo date('Y-m-d H:i:s',time());

		echo " ";

		$key = KEY_EASYPAY;//通信秘钥，跟easyPay.exe上填写的接口秘钥保持一致 在config.php中设置

		$sig = $_POST['sig'];//签名
		$tradeNo = $_POST['tradeNo'];//交易号
		$desc = $_POST['desc'];//交易名称（付款说明）
		$time = $_POST['time'];//付款时间
		$username = $_POST['username'];//客户名称
		$userid = $_POST['userid'];//客户id
		$amount = $_POST['amount'];//交易额
		$status = $_POST['status'];//交易状态

		//$string = print_r($_POST,true);
		//file_put_contents('/tmp/ababab1.txt',$string);

		//验证签名
		if(strtoupper(md5("$tradeNo|$desc|$time|$username|$userid|$amount|$status|$key")) == $sig){

			if(!empty($time) && !is_numeric($time)){
				$time = str_replace('.','-',$time);
				$time = strtotime($time);
			}
			
			$data = array();
			$data['sig'] = $sig;
			$data['tradeNo'] = $tradeNo;
			$data['desc'] = $desc;
			$data['time'] = $time;
			$data['username'] = $username;
			$data['amount'] = $amount;
			$data['status'] = $status;

			$data['gateway'] = 'easypay';

			$payment = Model_Payment::instance();

			$result = $payment->easypay($data);

			echo $result;


		}
		else{
			echo "sig error";

		}
	}


}
