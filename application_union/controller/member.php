<?php

class Controller_member extends Action {

	public function action_index(){

	
		$this->render();

	}


	public function action_login(){
		
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
						
						//header("location:/main/");return true;	

						$this->_tpl_notice_msg = '成功登录';
						$this->_tpl_notice_url = '/main/';
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
			$this->title = '登录';
			$this->render();
		}
	}
	
	public function action_logout(){
	
		Model_ACL::_set_logout();

		//header("location:/");

		//return true;

		$this->_tpl_notice_msg = '成功注销';
		$this->_tpl_notice_url = '/';
		$this->render();

	}


}
