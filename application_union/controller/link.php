<?php

class Controller_link extends Action {

	public function action_index(){


		$_session_user = $this->_session_user;

		if(!empty($_session_user['id'])){

			$member_id = $_session_user['id'];

			$db = Db::instance();

			$union_member = $db->fetchRow("select * from union_member where member_id = {$member_id} limit 1");
		
			$this->union_member = $union_member;

		}
		else{
			header("location:/login");die();
		}
	
		if(empty($union_member)){
			header("location:/");die();
		}

		$union_member_id = $union_member['id'];

		$this->render();

	}

	
}
