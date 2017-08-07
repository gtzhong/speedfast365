<?php

class Controller_recharge extends Action {

	public function init(){

	
		redirect_domain_name_stable();

		record_refer_before_um();	

		if(!empty($_GET['um'])){
			$um = $_GET['um'];
			setcookie('um',$um,time()+86400*15,'/');
		}
		
	}

	public function action_alipay(){
	
		$this->title = '充值-Speedfast365';

		$this->_session_user = $_session_user = Model_ACL::_session_user();

		$member_id = $_session_user['id'];

		$db = Db::instance();

		$tradeNo = '';

		if(!empty($_POST)){

			$error = array();
			if(!empty($_session_user)){
				if(empty($_POST['form_code'])){
					$error['form_code'] = "<font color='red'>请输入交易号</font>";
				}

				$form_code = trim($_POST['form_code']);
					
				if(is_numeric($form_code)){
					
					if(!empty($_session_user['ss_user_id'])){
						$ss_user_before = $db->fetchRow("select * from user where id = {$_session_user['ss_user_id']}");
					}

					$tradeNo = $form_code;
					$result = Model_Payment::instance()->rechargeByAliTradeNo($tradeNo,$member_id);
					if($result){
						if(isset($ss_user_before['enable']) && $ss_user_before['enable'] == 0){
							$error['form_code'] = "<font color='green'>充值成功，线路约3分钟左右自动激活</font>";
						}
						else{
							if(isset($ss_user_before['enable']) && $ss_user_before['enable'] == 1 && $ss_user_before['member_level'] == 0){
								$ss_user_now = $db->fetchRow("select * from user where id = {$_session_user['ss_user_id']}");
								if($ss_user_now['member_level'] == 1){
									$error['form_code'] = "<font color='green'>充值成功，您的VIP线路约3分钟左右自动激活</font>";
								}
								
							}
							if(empty($error['form_code'])){
								$error['form_code'] = "<font color='green'>充值成功</font>";
							}
						}
					}
					else{

						$db = Db::instance();

						$repeat_alipay_id = $db->fetchRow("select * from alipay_history where trade_no = '{$tradeNo}' and recharge_id > 0 limit 1");
						if(empty($repeat_alipay_id)){

							$error['form_code'] = "<font color='red'>未找到该交易号（请稍等系统同步或检查有无填错）</font>";
						}
						else{
						
							$error['form_code'] = "<font color='blue'>该交易号已经充值成功过了，请到个人中心检查剩余时间和流量，不要重复充值。</font>";

						}
					}
				}

			}
			else{
				$error['form_code'] = "<font color='red'>请先登录</font>";
				
			}

			if(!empty($error)){
				$this->form_tradeNo = $tradeNo;
				$this->form_error = $error;
			}

		}

		/*
		$row = $db->fetchRow("select * from alipay_check where member_id = {$member_id} and status = 0 order by id limit 1");

		if(empty($row)){
			$bind = array();
			$bind['check_code'] = rand(1111111111,9999999999);
			$bind['member_id'] = $member_id;
			$bind['dateline'] = time();
			$db->insert("alipay_check",$bind);
		
			$row = $db->fetchRow("select * from alipay_check where member_id = {$member_id} and status = 0 order by id limit 1");
		}
		if(!empty($row)){
			$this->check_code = $row['check_code'];
		}
		*/

		$this->render();		

	}

}
