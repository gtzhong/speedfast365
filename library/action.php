<?php

class Action {
	private $_hash;
	public $_static_path = "/static/";

	public function __call($method,$args){
		return _Exception("action:{$method} not found");
	}

	public function __get($name){
		if(isset($this->_hash["{$name}"])){
			return $this->_hash["{$name}"];
		}
	}

	public function __set($name,$value){
		return $this->_hash["{$name}"] = $value;
	}

	public function __construct(){
		$this->_session_user = Model_Acl::_session_user();
		return $this->init();
	}

	public function init(){
		return null;
	}

	public function render_get($tpl){
		@ob_end_clean();
		ob_start();
		require APPLICATION_PATH . "/view/{$tpl}.php";
		return ob_get_clean();
	}

	public function render($tpl = 'template'){

		return require APPLICATION_PATH . "/view/{$tpl}.php";

	}
	public function _render($tpl = null){
		global $_SGLOBAL;
		if($tpl == null){
			$tpl = APPLICATION_PATH . "/view/" . $_SGLOBAL['controller'] . "/" . $_SGLOBAL['action'] . ".php";
		}
		else{
			$tpl = APPLICATION_PATH . "/view/" . $tpl . ".php";
		}
		if(file_exists($tpl)){
			require $tpl;
		}
		else{
			return _Exception("template: {$tpl} not found");
		}
	}
	
	public function _GET($key){
		if(isset($_GET["{$key}"])){
			return $_GET["{$key}"];
		}
		else{
			return null;
		}
	}
}


class ManagerAction extends Action {
	public function init(){

		$_session_user = $this->_session_user;

		if(empty($_session_user)){
			//未登录
			echo "login";
			die();
		}
		
		if($_session_user['id'] != SUPER_MEMBER_ID){
			echo "Access Denied";
			die();
		}

	}

}
