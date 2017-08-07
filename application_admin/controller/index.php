<?php

class Controller_index extends ManagerAction {

	public function action_index(){

		$redis = Model_Redis::instance();


		$db = Db::instance();

		$lastest_findpwd = $db->fetchAll("select p.member_id,m.email,p.dateline,p.code,p.status from member_findpwd as p left join member as m on p.member_id = m.id where p.status = 0 order by p.id desc limit 3");

		$this->lastest_findpwd = $lastest_findpwd;


		$lastest_alipay_list = $db->fetchAll("select * from alipay_history order by id desc limit 50");

		$recharge_id_list = array();
		foreach($lastest_alipay_list as $k=>$v){
			$recharge_id_list[] = $v['recharge_id'];
		}

		$sql_recharge = implode(',',$recharge_id_list);

		$recharge_list = $db->fetchAll("select id,uid as ss_user_id from recharge_history where id in ($sql_recharge)");

		$recharge_list_a = array();
		foreach($recharge_list as $k=>$v){
			$recharge_list_a["{$v['id']}"] = $v;
		}

		$sql_ss_uid_list = array();
		foreach($recharge_list as $k=>$v){
			$sql_ss_uid_list[] = $v['ss_user_id'];
		}
		
		$sql_member = implode(',',$sql_ss_uid_list);
		
		$member_list = $db->fetchAll("select * from member where ss_user_id in ($sql_member)");

		$member_list_a = array();

		foreach($member_list  as $k=>$v){
			$member_list_a["{$v['ss_user_id']}"] = $v;
		}

		foreach($lastest_alipay_list as $k=>$v){
			
			@$lastest_alipay_list[$k]['recharge'] = $recharge_list_a["{$v['recharge_id']}"];
			@$lastest_alipay_list[$k]['member'] = $member_list_a["{$lastest_alipay_list[$k]['recharge']['ss_user_id']}"];
			@$member_id = $lastest_alipay_list[$k]['member']['id'];
			@$divice_win_lasttime = $redis->get("divice-win-member-{$member_id}");

			@$lastest_alipay_list[$k]['member']['divice_win_lasttime'] = $divice_win_lasttime;

		}
//print_r($lastest_alipay_list);die();
		$this->lastest_alipay_list = $lastest_alipay_list;

		$this->render();	

	}

}
