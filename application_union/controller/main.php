<?php

class Controller_main extends Action {

	public function action_index(){

		$_session_user = $this->_session_user;

		if(!empty($_session_user['id'])){

			$member_id = $_session_user['id'];

			$db = Db::instance();

			$union_member = $db->fetchRow("select * from union_member where member_id = {$member_id} limit 1");

			if(empty($union_member)){
				$this->create_union_member($member_id);
				header("location:/main/");die();
			}
		
			$union_member_id = $union_member['id'];
		
			$union_member['balance_history'] = $db->fetchOne("select sum(amount) as total from union_withdraw where union_member_id = {$union_member_id} and status = 1 limit 1");

			$union_member['balance_withdrawing'] = $db->fetchOne("select sum(amount) as total from union_withdraw where union_member_id = {$union_member_id} and status = 0 limit 1");

			$union_member['balance'] -= $union_member['balance_withdrawing'];

			$union_member['balance'] -= $union_member['balance_history'];


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

	public function create_union_member($member_id){

		$db = Db::instance();

		$union_member = $db->fetchRow("select * from union_member where member_id = {$member_id} limit 1");

		if(empty($union_member)){
			$bind = array();
			$bind['member_id'] = $member_id;
			$bind['jointime'] = time();
			$bind['status'] = 1;
			$db->insert('union_member',$bind);	
		}

	}	
}
