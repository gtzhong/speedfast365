<?php

class Controller_setting extends Action {

	public function action_index(){

		$db = Db::instance();

		$_session_user = $this->_session_user;

		if(!empty($_session_user['id'])){

			$member_id = $_session_user['id'];


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

		$bind_update = array();

		if(!empty($_POST['alipay_account'])){
			$bind_update['alipay_account'] = $_POST['alipay_account'];
		}
		if(!empty($_POST['alipay_name'])){
			$bind_update['alipay_name'] = $_POST['alipay_name'];
		}
		if(!empty($_POST['phone_mobile'])){
			$bind_update['phone_mobile'] = $_POST['phone_mobile'];
		}

		if(!empty($bind_update)){
			$db->update("union_member",$bind_update,array("id={$union_member_id}"));
			header('location:/setting/');die();
		}

		$this->render();

	}
}
