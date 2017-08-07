<?php

class Controller_history extends Action {

	public function init(){

	}

	public function action_index(){

	
		$this->title = '流量详情-Shadowsocks365';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}

		$ss_user_id = $_session_user['ss_user_id'];

		$page = empty($_GET['page']) ? 0 : intval($_GET['page']);

		if($page < 1){$page = 1;}

		$pagesize = 240;

		$offset = $page * $pagesize - $pagesize;

		$dateline = time() - 86400 * 100;

		$list = Db::instance()->fetchAll("select * from traffic_history where uid = {$ss_user_id} and dateline > {$dateline} order by id desc limit {$offset},{$pagesize}");
		//echo "select * from traffic_history where uid = {$ss_user_id} order by id desc limit {$offset},{$pagesize}";

		$this->list = $list;

		$this->page = $page;

		//_print_r($list);

		$this->render();

	}

	public function show_count($total_traffic){
	

		$total_transfer = array();

		$total_transfer['G'] = floor($total_traffic / 1024 / 1024 / 1024);
		$total_transfer['M'] = floor(($total_traffic % (1024 * 1024 * 1024)) / 1024 / 1024);
		$total_transfer['K'] = floor(($total_traffic % (1024 * 1024)) / 1024);

		$str = '';

		if($total_transfer['G'] == 0){
			$str .= '<font style="color:#999;">'.$total_transfer['G'].'GB</font> ';
		}
		else{
			$str .= '<font style="color:#000;">'.$total_transfer['G'].'GB</font> ';
		}
	
		if($total_transfer['M'] == 0){
			$str .= '<font style="color:#999;">'.$total_transfer['M'].'MB</font> ';
		}
		else{
			$str .= '<font style="color:#000;">'.$total_transfer['M'].'MB</font> ';
		}

		if($total_transfer['K'] == 0){
			$str .= '<font style="color:#999;">'.$total_transfer['K'].'KB</font> ';
		}
		else{
			$str .= '<font style="color:#000;">'.$total_transfer['K'].'KB</font> ';
		}

		return $str;


		//return "{$total_transfer['G']}GB {$total_transfer['M']}MB {$total_transfer['K']}KB";


	}

}
