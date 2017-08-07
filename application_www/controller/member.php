<?php

class Controller_member extends Action {

	public function init(){

		
		redirect_domain_name_stable();


		if(!empty($_GET['um'])){
			$um = $_GET['um'];
			setcookie('um',$um,time()+86400*15,'/');
		}
	}

	public function action_index(){

	
		$this->title = '个人中心-Speedfast365';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}

			$member_id = $_session_user['id'];

			$db = Db::instance();

			$this->member = $member = $db->fetchRow("select * from member where id = {$member_id} limit 1");

		if(!empty($_POST['changesspwd'])){
			
			$error = array();

			$form_pwd = trim($_POST['form_pwd']);

			if(empty($form_pwd)){
				$error['form_pwd'] = "请输入密码";
			}
			elseif(strlen($form_pwd) < 6){
				$error['form_pwd'] = "不建议小于6位";
			}

			if(!empty($error)){
				$this->form_error = $error;
			}
			else{
			
				if(!empty($member['ss_user_id'])){

					$ss_user_id = $member['ss_user_id'];

					$db->update("user",array("passwd"=>$form_pwd),array("id={$ss_user_id}"));


					$error['form_pwd'] = "修改成功";

					$this->form_error = $error;
				}
				else{
					$error['form_pwd'] = "<font color='red'>您尚未充值</font>";

					$this->form_error = $error;

				}
			
			}

		}

	
			if(!empty($member['ss_user_id'])){

				$ss_user_id = $member['ss_user_id'];

				$ss_user = $db->fetchRow("select * from user where id = {$ss_user_id}");

				$this->member_expire = $ss_user['expire_dateline'];

				$this->total_traffic = $total_traffic = $ss_user['transfer_enable'] - $ss_user['d'] - $ss_user['u'];

				//$total_transfer['G'] = floor(($total_traffic % (1024 * 1024 * 1024 * 1024)) / 1024 / 1024 / 1024);
				$total_transfer['G'] = floor($total_traffic / 1024 / 1024 / 1024);
				$total_transfer['M'] = floor(($total_traffic % (1024 * 1024 * 1024)) / 1024 / 1024);
				$total_transfer['K'] = floor(($total_traffic % (1024 * 1024)) / 1024);

				$this->total_transfer = $total_transfer;

				$this->ss_user = $ss_user;
			}


		$server_data = $db->fetchAll("select * from server_data where center_show = 1 order by sort_num desc,id asc");
	
		$server_list = array();
		foreach($server_data as $k=>$v){
			if($v['is_vip']){
				if($v['is_unlimit']){
					$server_list["unlimit"][] = $v;
				}
				else{
					$server_list["vip"][] = $v;
				}
			}
			else{
				$server_list["normal"][] = $v;
			}
		}
		$this->server_list = $server_list;
	
		$this->render();
	}

	public function action_invite(){
		
		$this->title = '我的奖励-Speedfast365';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			//header('location:/member/login');die();
		}
		else{

			$member_id = $_session_user['id'];

			$ss_user_id = $_session_user['ss_user_id'];

			$db = Db::instance();

			$this->member = $member = $db->fetchRow("select * from member where id = {$member_id} limit 1");

			$list = $db->fetchAll("select * from recharge_history where uid = {$ss_user_id} and inviter_id > 0 order by id desc");

			$this->myfriends = $list;	

			$myfriends_list = $db->fetchAll("select a.*,b.enable as ss_status from member as a left join user as b on a.ss_user_id = b.id  where a.inviter_id = {$member_id} order by id desc");

			$this->myfriends_list = $myfriends_list;
		}
		$this->render();
	}

	
	public function action_settinginfo(){

		$this->title = '修改连接信息';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}


		$this->render();	
	}

	public function action_settingpwd(){
				
		$this->title = '修改密码-Speedfast365';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}

		if(!empty($_POST)){

			$form_password1 = $_POST['form_password1'];
			$form_password2 = $_POST['form_password2'];
			$form_password3 = $_POST['form_password3'];

			//$form_password1 = Model_ACL::pwd_decode($form_password1);
			//$form_password2 = Model_ACL::pwd_decode($form_password2);
			//$form_password3 = Model_ACL::pwd_decode($form_password3);

			$error = array();

			//检查密码要求
			if(!preg_match('/.{8,20}/',$form_password1)){
				$error['form_password1'] = "密码长度8-20个字符";
			}
			
			if(!preg_match('/.{8,20}/',$form_password2)){
				$error['form_password2'] = "密码长度8-20个字符";
			}
			
			if(!preg_match('/.{8,20}/',$form_password3)){
				$error['form_password3'] = "密码长度8-20个字符";
			}

			if(empty($error)){

				if($form_password2 != $form_password3){
					$error['form_password3'] = "新密码两次输入不一致";
				}

			}


			if(!empty($error)){
				$this->form_error = $error;
				$this->render();
			}
			else{

				$db = Db::instance();

				$password_old = $_session_user['pwd'];

				$salt = $_session_user['salt'];

				$pwd_old = md5($salt . md5($salt . $form_password1));

				if($pwd_old == $password_old){
					$pwd_new = md5($salt . md5($salt . $form_password2));
					$user_id = $_session_user['id'];
					$db->update('member',array('pwd'=>$pwd_new),array("id={$user_id}"));
					
					//密码修改成功
					$this->_tpl_notice_msg = '密码修改成功，请牢记！';
					$this->_tpl_notice_url = '/member/settingpwd';
				
					$this->render();

				}
				else{
				
					$error['form_password1'] = "旧密码不正确，无权修改";
				
					$this->form_error = $error;
				}

				
			}

		}


		$this->render();
	
	}

	public function action_login(){
		
		$this->title = '登录-Speedfast365';
		
		if(!empty($_POST)){
			
			$error = array();
			
			$db = Db::instance();
			$form_email = trim($_POST['form_email']);
					
			$form_password = $_POST['form_password'];
			
			//检查email格式
			//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-\.]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$form_email)){
			if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$form_email)){
				$error['form_email'] = "请填写正确的Email地址";
				$this->form_error = $error;
				$this->render();
			}
			else{
	
				$form_email = $db->quote($form_email);

				$row = $db->fetchRow("select * from member where email = {$form_email} limit 1");

				if(empty($row)){
					$error['form_password'] = "用户名或密码错误";
					$this->form_error = $error;
					$this->render();
				}
				else{

					//$form_password = Model_ACL::pwd_decode($form_password);

					$form_salt = $row['salt'];

					$pwd = md5($form_salt . md5($form_salt . $form_password));

					if($pwd == $row['pwd']){
						Model_ACL::_set_login($row['id']);
						
						header("location:/member/index");return true;	

						$this->_tpl_notice_msg = '成功登录';
						$this->_tpl_notice_url = '/';
						$this->render();

					}
					else{
						$error['form_password'] = "用户名或密码错误";
						$this->form_error = $error;
						$this->render();
					}

				}

			}
			
		
		}
		else{
			$this->title = '登录-Speedfast365';
			$this->render();
		}
	}
	
	public function action_logout(){
	
		Model_ACL::_set_logout();

		header("location:/");

		return true;

		$this->_tpl_notice_msg = '成功注销';
		$this->_tpl_notice_url = '/';
		$this->render();

	}

	public function action_register(){
		$this->title = '注册-Speedfast365';
		
		if(!empty($_POST)){
			/*
			$form_invite = trim($_POST['form_invite']);
			
			if(!is_numeric($form_invite)){
				$form_invite = 0;
			}
			*/

			$form_email = trim($_POST['form_email']);
			$form_password = $_POST['form_password'];

			//$form_password = Model_ACL::pwd_decode($form_password);
			
			$form_salt = genRandomString(16);

			$bind = array();
			$bind['email'] = $form_email;
			$bind['pwd'] = md5($form_salt . md5($form_salt . $form_password));
			$bind['salt'] = $form_salt;
			$bind['register_time'] = time();
			$bind['register_ip'] = $_SERVER['REMOTE_ADDR'];
			
			if(in_array($_SERVER['REMOTE_ADDR'],array('118.184.37.89'))){
			$bind['register_ip'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}

			$error = array();
			
			//检查验证码
			/**	
			session_start();
			$checkcode = empty($_SESSION['checkcode']) ? null : $_SESSION['checkcode'];
			session_destroy();
			if(empty($_POST['form_captcha']) || (trim($_POST['form_captcha']) != $checkcode)){
				$error['form_captcha'] = '验证码错误';
			}
			*/
			

			//检查email格式
			//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$form_email)){
			if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$form_email)){
				$error['form_email'] = "请填写正确的Email地址";
			}
			
			if(!empty($_POST['form_inviter_email'])){
				//检查邀请人email格式
				//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$_POST['form_inviter_email'])){
				if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$_POST['form_inviter_email'])){
					$error['form_inviter_email'] = "请填写正确的邀请人Email地址，或者不填写。";
				}
				else{
					$form_inviter_email = trim($_POST['form_inviter_email']);
				}
			}

			//检查密码要求
			if(!preg_match('/.{8,20}/',$form_password)){
				$error['form_password'] = "密码长度8-20个字符";
			}

			//检查email是否重复
			if(empty($error['form_email'])){
				$email_exist = $this->email_exist($bind['email']);
				if($email_exist){
					$error['form_email'] = "该Email已经注册过了";
				}
			}
			
			if(!empty($error)){
				$this->form_error = $error;
				$this->render();
			}
			else{
				
				$verify_code = genRandomString(8);

				$verify_code = strtolower($verify_code);

				if(!empty($_COOKIE['f'])){
					$bind['reg_from'] = intval($_COOKIE['f']);
				}

				if(!empty($_COOKIE['um'])){
					if(is_numeric($_COOKIE['um'])){
						$union_member_id = $_COOKIE['um'];
						
					}
					elseif(preg_match('/^(?P<union_member_id>\d+)_(?P<union_thread_id>\d+)$/',$_COOKIE['um'],$matches_union)){
						$union_member_id = $matches_union['union_member_id'];
						$union_thread_id = $matches_union['union_thread_id'];
					}
					if(!empty($union_member_id)){	
						$member_row_union = Db::instance()->fetchRow("select * from union_member where id = {$union_member_id} limit 1");

						if(!empty($member_row_union)){
							$bind['union_member_id'] = $union_member_id;

							if(!empty($union_thread_id)){
							
								$member_row_thread = Db::instance()->fetchRow("select * from union_thread where id = {$union_thread_id} and union_member_id = {$union_member_id} limit 1");
								if(!empty($member_row_thread)){
								$bind['union_thread_id'] = $union_thread_id;
								}

							}
						}

					}

				}


				//提交注册入库
				Db::instance()->insert('member',$bind);
				$uid = Db::instance()->lastInsertId();
				$this->register_uid = $uid;

				//邀请注册人
				if(!empty($form_inviter_email)){
					
					$db = Db::instance();
					
					$form_inviter_email = $db->quote($form_inviter_email);

					$row = $db->fetchRow("select * from member where email = {$form_inviter_email} limit 1");

					if(!empty($row)){
						$inviter_id = $row['id'];
						if($inviter_id <> $uid){//避免填写自己的email作为邀请人
							$db->update("member",array('inviter_id'=>$inviter_id),array("id={$uid}"));
						}
					}

				}
				
				//检查邀请注册
			//	
			//	if($form_invite){
			//		$db = Db::instance();
			//		$row = $db->fetchRow("select * from member where ss_user_id = {$form_invite} limit 1");
			//		if(!empty($row)){
			//			$user_1_mid = $row['id'];
			//			$invite = Model_Invite::instance();

			//			$invite->add_invite_record($user_1_mid,$uid);
			//		}
			//	}


				Model_ACL::_set_login($uid);

				//header("location:/member/index");return true;

				$this->_tpl_notice_msg = '注册成功！自动登录~';
				$this->_tpl_notice_url = '/member/index';

				$this->render();
			
			}
		}
		else{
			$this->render();
		}

	}
		
	private function email_exist($email){
		$db = Db::instance();
		$email = $db->quote($email);
		$db = Db::instance();
		$row = $db->fetchRow("select id from member where email = ".$email." limit 1");
		return empty($row) ? false : $row['id'];
	}
	
	public function action_findemail(){

		$this->title = '找回登录邮箱-Speedfast365';

		$error = array();

		if(!empty($_POST)){

			if(!empty($_POST['form_code']) && is_numeric($_POST['form_code'])){

				$trade_no = $_POST['form_code'];
			
				$db = Db::instance();

				$recharge_id = $db->fetchOne("select recharge_id from alipay_history where trade_no = '{$trade_no}' and recharge_id > 0 order by id limit 1");

				if(empty($recharge_id)){
					$error['form_code'] = "<font color='red'>交易号填错了，或者没找到对应的账号</font>";
				}
				else{
					$ss_user_id = $db->fetchOne("select uid from recharge_history where id = {$recharge_id} limit 1");
					if(!empty($ss_user_id)){
						$email = $db->fetchOne("select email from member where ss_user_id = {$ss_user_id} limit 1");
						
						$error['form_code'] = "<font color='blue'>你的登录Email是：{$email}</font>";
					}
					else{
					
						$error['form_code'] = "<font color='red'>系统错误1038，请联系技术售后</font>";
					}
				}
		
			}
			else{
				$error['form_code'] = "<font color='red'>请输入正确的交易号</font>";
			}

		}

		$this->form_error = $error;



		$this->render();	
	}
	
	public function action_findpwd(){

		$this->title = '找回密码-Speedfast365';
		
		$db = Db::instance();	

		if(!empty($_POST['form_getcode'])){


			if(!empty($_POST['form_email'])){

				$form_email = $_POST['form_email'];

				$to = trim($form_email);
		
				//检查email格式
				//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-\.]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$form_email)){
				if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$form_email)){
					echo "请填写正确的Email地址";die();
				}
				else{
					$form_email = $db->quote($form_email);
					$member_id = $db->fetchOne("select id from member where email = {$form_email} limit 1");
				}
			
			}

			if(empty($member_id)){
				echo "这个邮箱没有注册过";die();
			}

			$db->update('member_findpwd',array("status"=>1),array("member_id={$member_id}","status=0"));
			
			//create code
			$code = rand(1111,9999);

			$bind = array();
			$bind['code'] = $code;
			$bind['member_id'] = $member_id;
			$bind['dateline'] = time();

			$db->insert('member_findpwd',$bind);

			//send email
			// 待写
			$send = Model_SendMail::instance()->send($to,"SS找回验证码",$code);

			//echo $send ? "发送成功" : "发送失败";
			////////

			if($send){
				echo "已经发送验证码";
			}
			else{
				echo "出现错误，请重试或联系技术售后QQ";
			}
			die();

		}
		elseif(!empty($_POST['form_code'])){
			$error = array();
			
			if(!empty($_POST['form_email'])){
				
				$form_email = $_POST['form_email'];
				//检查email格式
				//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-\.]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$form_email)){
				if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$form_email)){
					$error['form_email'] = "请填写正确的Email地址";
				}
				else{
					$form_email = $db->quote($form_email);
					$member_id = $db->fetchOne("select id from member where email = {$form_email} limit 1");
				}
			
			}
			else{
				
				$error['form_pwd'] = "邮箱未填";
			}

				
				if(empty($member_id)){
					$error['form_pwd'] = "这个邮箱没有注册过";
				}


				$form_code = intval($_POST['form_code']);

				$form_pwd = trim($_POST['form_pwd']);
			 
				@$form_pwd = $_POST['form_pwd'];

				//检查密码要求
				if(!preg_match('/.{8,20}/',$form_pwd)){
					$error['form_pwd'] = "密码长度8-20个字符";
				}

				if(empty($error)){

					$dateline_min = time() - 1800;
					
					if(!empty($member_id)){

						$row_find = $db->fetchRow("select * from member_findpwd where member_id = {$member_id} and code = {$form_code} and dateline > {$dateline_min} and status = 0 limit 1");

					}

					if(!empty($row_find)){

						$form_salt = genRandomString(16);

						$bind['pwd'] = md5($form_salt . md5($form_salt . $form_pwd));

						$bind['salt'] = $form_salt;

						$update = $db->update('member',$bind,array("id={$member_id}"));

						$error['form_pwd'] = "修改成功";

						$update = $db->update('member_findpwd',array("status"=>1),array("member_id={$member_id}","status=0"));

					}
					else{
						$error['form_code'] = "验证码不对";
					}

				}

		}

		if(!empty($error)){
		$this->form_error = $error;
		}
		$this->render();

	}
}
