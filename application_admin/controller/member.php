<?php

class Controller_member extends ManagerAction {

	public function action_index(){

		$db = Db::instance();


		$this->render();

	}

	public function action_detail(){

		$db = Db::instance();

		if(!empty($_GET['email']) && preg_match('/^[a-zA-Z_0-9\.-]+@[a-zA-Z_0-9\.-]+$/',$_GET['email'])){
			$email = urldecode($_GET['email']);
			$sql_where =  "m.email = '{$email}'";
		}
		elseif(!empty($_GET['port']) && is_numeric($_GET['port'])){
			$sql_where = "u.port = {$_GET['port']}";
		}
		elseif(!empty($_GET['recharge_id']) && is_numeric($_GET['recharge_id'])){
			
			$recharge_id = $_GET['recharge_id'];

			$row = $db->fetchRow("select * from recharge_history where id = {$recharge_id} limit 1");

			if(!empty($row['uid'])){
				$sql_where = "m.ss_user_id = {$row['uid']}";
			}
		}

		if(!empty($sql_where)){


			$member = $db->fetchRow("select m.* from member as m left join user as u on m.ss_user_id = u.id where {$sql_where} limit 1");

			$redis = Model_Redis::instance();

			$member_id = $member['id'];

			$divice_win_lasttime = $redis->get("divice-win-member-{$member_id}");

			$this->divice_win_lasttime = $divice_win_lasttime;

			if(!empty($member['ss_user_id'])){

				$ss_user_id = $member['ss_user_id'];

				$member['ss_data'] = $db->fetchRow("select * from user where id = {$ss_user_id}");

			}

			$this->member = $member;

		}

		$this->render();

	}

}
