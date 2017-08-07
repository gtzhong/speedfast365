<?php
class Model_ACL{
	protected static $_instance = null;
	public static function instance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function pwd_decode($pwd){

		$file = ROOT_PATH . '/ssl/js/server.pem'; 

		$pwd = base64_encode(pack("H*", $pwd));	

		$str =  Model_RSA::instance()->privatekey_decodeing($pwd,$file,true);

		return trim($str);
	}

	public static function _session_user(){

		global $cookie_host;

		if(!empty($GLOBALS['_session_user'])){
			return $GLOBALS['_session_user'];
		}
		if(!empty($_COOKIE['__id']) && is_numeric($_COOKIE['__id']) && !empty($_COOKIE['__token'])){

			$id = $_COOKIE['__id'];
			$row = Db::instance()->fetchRow("select * from member_session where id = {$id} limit 1");
			if(empty($row)){
				return false;
			}
			else{
				if($row['token'] == $_COOKIE['__token']){
					if($row['online'] < time() - 60){
						Db::instance()->update('member_session',array('online'=>time()),array("id = {$id}"));
					}
					if(!empty($cookie_host)){
						setcookie('__id',$_COOKIE['__id'],time()+604800,'/',$cookie_host);
						setcookie('__token',$_COOKIE['__token'],time()+604800,'/',$cookie_host);
					}
					else{
						setcookie('__id',$_COOKIE['__id'],time()+604800,'/');
						setcookie('__token',$_COOKIE['__token'],time()+604800,'/');
					}
					$u = Db::instance()->fetchRow("select * from member where id = {$row['uid']} limit 1");
					$GLOBALS['_session_user'] = $u;
					return $u;
				}
				else{
					return false;
				}
			}
		}
		else{
			return false;
		}

	}

	public static function _set_login($uid){
		global $cookie_host;
		if(!empty($uid)){

			$db = Db::instance();

			Db::instance()->update('member',array('last_login'=>time()),array('id='.$uid));

			$token = genRandomString(16);

			$bind = array(
				'uid' => $uid,
				'token' => $token,
				'online' => time()
			);
			
			$db->insert('member_session',$bind);

			$insert_id = $db->lastInsertId();
			
			if(!empty($cookie_host)){
				setcookie('__id',$insert_id,time()+604800,'/',$cookie_host);
				setcookie('__token',$token,time()+604800,'/',$cookie_host);
			}
			else{
				setcookie('__id',$insert_id,time()+604800);
				setcookie('__token',$token,time()+604800);
			}
			
			return true;
		}
		else{
			return false;
		}
	}

	public static function _set_logout(){

		global $cookie_host;

		if(!empty($_COOKIE['__id']) && is_numeric($_COOKIE['__id']) && !empty($_COOKIE['__token'])){
			$id = $_COOKIE['__id'];
			$row = Db::instance()->fetchRow("select * from member_session where id = {$id} limit 1");
			if(empty($row)){
				return false;
			}
			else{
				if($row['token'] == $_COOKIE['__token']){
					$c = Db::instance()->exec("delete from member_session where id = {$id}");

					
					if(!empty($cookie_host)){
						setcookie('__id','',time()-1000,'/',$cookie_host);
						setcookie('__token','',time()-1000,'/',$cookie_host);
					}
					else{
						setcookie('__id','',time()-1000,'/');
						setcookie('__token','',time()-1000,'/');
					}

					 return $c;
				}
				else{
					return false;
				}
			}
		}
		else{
			return false;
		}

	}

	public static function _is_admin(){

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			return false;
		}
		elseif(in_array($_session_user['id'],array(1))){
	
			return true;

		}

		return false;

	}

}
