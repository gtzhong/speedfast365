<?php

class Controller_autoconfig extends Action {

	public function init(){

		
		redirect_domain_name_stable();

	}

	public function action_mac(){

		$_session_user = Model_ACL::_session_user();

		if(empty($_session_user)){
			//未登录
			header('location:/member/login');die();
		}

		$member_id = $_session_user['id'];

		$db = Db::instance();

		$this->member = $member = $db->fetchRow("select * from member where id = {$member_id} limit 1");

	
		$config_str = '';
	
		if(!empty($member['ss_user_id'])){

				$ss_user_id = $member['ss_user_id'];

				$ss_user = $db->fetchRow("select * from user where id = {$ss_user_id}");

		
				$server_list = $db->fetchAll("select * from server_data order by sort_num desc");

				$config_str = '';

				$config = array();

				foreach($server_list as $k=>$v){
					
					
$config[] = '{"remarks": "'.$v['friendlyname'].'",
"server": "'.$v['ip_address'].'",
"server_port": '.$ss_user['port'].',
"method": "aes-256-cfb",
"remarks_base64": "'.base64_encode($v['friendlyname']).'",
"password": "'.$ss_user['passwd'].'",
"tcp_over_udp": false,
"udp_over_tcp": false,
"enable": true
}';

				}
$config_str = '{
    "index": 0,
    "random": false,
    "global": false,
    "enabled": true,
    "shareOverLan": false,
    "isDefault": false,
    "localPort": 1080,
    "pacUrl": null,
    "useOnlinePac": false,
    "reconnectTimes": 3,
    "randomAlgorithm": 0,
    "TTL": 0,
    "proxyEnable": false,
    "proxyType": 0,
    "proxyHost": null,
    "proxyPort": 0,
    "proxyAuthUser": null,
    "proxyAuthPass": null,
    "authUser": null,
    "authPass": null,
    "autoban": false,
    "configs": ['.implode(',',$config).']
}';
			header('Content-type: application/json');
			echo $config_str;


		}







	}


}
