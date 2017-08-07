<?php

class Controller_support extends Action {

	public function action_faq(){

		$_session_user = $this->_session_user;

		if(!empty($_session_user['id'])){

			$member_id = $_session_user['id'];

			$db = Db::instance();

			$union_member = $db->fetchRow("select * from union_member where member_id = {$member_id} limit 1");
		
			$this->union_member = $union_member;

		}
	
	
		$this->render();

	}

	public function action_service(){

		$this->render();

	}
}
