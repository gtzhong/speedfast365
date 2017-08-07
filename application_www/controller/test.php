<?php

class Controller_test extends Action {

	public function init(){
	
	}

	public function action_index(){

		$_session_user = Model_ACL::_session_user();
		//_print_r($_session_user);

	}




}
