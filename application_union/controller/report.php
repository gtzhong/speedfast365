<?php

class Controller_report extends Action {

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

		$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;

		if($page < 1){$page = 1;}

		$pagesize = 40;

		$offset = $page * $pagesize - $pagesize;

		$list = $db->fetchAll("select d.*,m.email from union_deal_data as d left join member as m on d.member_id = m.id where d.union_member_id = {$union_member_id} order by d.id desc limit {$offset},{$pagesize}");

		$this->list = $list;

		$this->page = $page;

		$this->render();

	}

	
}
