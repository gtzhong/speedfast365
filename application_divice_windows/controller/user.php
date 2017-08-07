<?php

class Controller_user extends Action {

	public function init(){
	
	}

	public function action_index(){

	}

	public function action_login(){


		$result = array();

		$input = file_get_contents("php://input");

		$input_json = json_decode($input);

		$input_json = (array)$input_json;

		if(!empty($input_json['username_or_email']) && !empty($input_json['login_password'])){
			
			$username_or_email = $input_json['username_or_email'];
			$login_password = $input_json['login_password'];

			$error = array();
			
			$db = Db::instance();

			$form_email = trim($username_or_email);
					
			$form_password = $login_password;
			
			//检查email格式
			//if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z0-9_-\.]+\.[a-zA-Z]+(\.[a-zA-Z]+)?$/',$form_email)){
			if(!preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$form_email)){
				$result['message'] = "请填写正确的Email地址";
				$result['ok'] = false;
			}
			else{
	
				$form_email = $db->quote($form_email);

				$row = $db->fetchRow("select * from member where email = {$form_email} limit 1");


				if(empty($row)){
					$result['message'] = "用户名或密码错误";
					$result['ok'] = false;
				}
				else{

					$uid = $row['id'];
					
					$form_salt = $row['salt'];

					$pwd = md5($form_salt . md5($form_salt . $form_password));

					if($pwd == $row['pwd']){

						//$db->update('member',array('last_login'=>time()),array('id='.$uid));

						$session_id = $token = genRandomString(16);

						$bind = array(
							'uid' => $uid,
							'token' => $token,
							'online' => time()
						);
						
						//$db->insert('member_session',$bind);

						//$insert_id = $db->lastInsertId();
						$member = $row;	
						Model_Redis::instance()->session_set($session_id,$member);

						$result['ok'] = true;
						$result['session_id'] = $token;

					}
					else{
						$result['message'] = "用户名或密码错误";
						$result['ok'] = false;
					}

				}

			}
		
		}
		else{
			$result['message'] = "请填写用户名和密码";
			$result['ok'] = false;
		}
		
		header('Content-type:application/json');	
		echo json_encode($result);

	}


	public function action_logout(){

		$result = array();

		$input = file_get_contents("php://input");

		$input_json = json_decode($input);

		$input_json = (array)$input_json;

		if(!empty($input_json['session_id'])){

			$session_id = $input_json['session_id'];

			if(preg_match('/^\w+$/',$session_id)){

				//$token = $session_id;

				//$db = Db::instance();

				//$db->delete("member_session",array("token = '{$token}'"));
			
				Model_Redis::instance()->session_delete($session_id);

			}
			

		}

		$result['ok'] = false;
		
		header('Content-type:application/json');	
		echo json_encode($result);

	}

}
