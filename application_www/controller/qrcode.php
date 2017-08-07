<?php
include_once(LIBRARY_PATH . "/phpqrcode/qrlib.php");
class Controller_qrcode extends Action {

	public function init(){

	}

	public function action_png(){
		if(empty($_GET['str'])){
			die();
		}
		$str = $_GET['str'];
		$str = urldecode($str);
		QRcode::png($str);

	}

	public function action_normal(){

	
		$this->title = '个人中心-Speedfast365';

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}

			$member_id = $_session_user['id'];

			$db = Db::instance();

			$this->member = $member = $db->fetchRow("select * from member where id = {$member_id} limit 1");
			
			if(!empty($member['ss_user_id'])){

				$ss_user_id = $member['ss_user_id'];

				$ss_user = $db->fetchRow("select * from user where id = {$ss_user_id}");

				$this->ss_user = $ss_user;

				$ip = trim($_GET['ip']);

				if(!preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/',$ip)){
					$ip = '';
				}

				$url = "aes-256-cfb:{$ss_user['passwd']}@{$ip}:{$ss_user['port']}";

				$qrstring = base64_encode($url);

				//$qrstring = "ss://".trim($qrstring,"=");
				$qrstring = "ss://".$qrstring;
				
				$this->qrstring = $qrstring;

			}

		$this->render();
		

	}


	public function action_surgeconf(){

		if(empty($_GET['host']) || empty($_GET['port']) || empty($_GET['passwd'])){
			die();
		}

		$this->host = urldecode($_GET['host']);

		$this->port = urldecode($_GET['port']);

		$this->passwd = urldecode($_GET['passwd']);
		
		$this->render('qrcode/surge_conf');
		
	}
}
