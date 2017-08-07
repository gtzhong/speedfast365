<?php

class Controller_withdraw extends Action {

	public function action_index(){


		$_session_user = $this->_session_user;
			
		$db = Db::instance();

		if(!empty($_session_user['id'])){

			$member_id = $_session_user['id'];

			$union_member = $db->fetchRow("select * from union_member where member_id = {$member_id} limit 1");
		
			$union_member_id = $union_member['id'];
		
		if(empty($union_member)){
			header("location:/");die();
		}
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


		if(!empty($_POST['withdraw_amount']) && is_numeric($_POST['withdraw_amount'])){
			$withdraw_amount = $_POST['withdraw_amount'];
			$bind = array();
			$bind['union_member_id'] = $union_member_id;
			$bind['dateline'] = time();
			$bind['amount'] = $withdraw_amount;
			$bind['status'] = 0;

			$could_withdraw_amount = $this->could_withdraw_amount($union_member_id);

			if($withdraw_amount >= 20 && $could_withdraw_amount >= $withdraw_amount){
				$db->insert('union_withdraw',$bind);
				header('location:/withdraw/');die();
			}
		}

		$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;

		if($page < 1){$page = 1;}

		$this->page = $page;

		$pagesize = 40;

		$offset = $page * $pagesize - $pagesize;

		$list = $db->fetchAll("select * from union_withdraw where union_member_id = {$union_member_id} order by id desc limit {$offset},{$pagesize}");

		$this->list = $list;

		$this->render();

	}

	public function could_withdraw_amount($union_member_id){

		$db = Db::instance();

		//withdraw_history
		
		$history_withdraw_amount_all = $db->fetchOne("select sum(amount) as total from union_withdraw where union_member_id = {$union_member_id} limit 1");

		$history_deal_amount = $db->fetchOne("select sum(commission_amount) as total from union_deal_data where union_member_id = {$union_member_id} and status = 1 limit 1");

		$amount = $history_deal_amount - $history_withdraw_amount_all;

		return $amount;

	}

	
}
