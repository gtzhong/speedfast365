<?php

class Controller_index extends Action {

	public function init(){
	
	}

	public function action_index(){
		echo "hello world ";
	}

	public function action_systemdata(){
		$result = array();
		$result['ok'] = false;
		header('Content-type:application/json');	
		echo json_encode($result);

	}

	public function action_ping(){
		echo 'pong';die();
	}

	public function action_notification(){

		$result = array();

		$input = file_get_contents("php://input");

		$input_json = json_decode($input);

		$input_json = (array)$input_json;


		if(!empty($input_json['session_id'])){

			$session_id = $token = $input_json['session_id'];

			$db = Db::instance();

			if(!preg_match('/^\w+$/',$token)){
				header('Content-type:application/json');
				$result['ok'] = false;	
				echo json_encode($result);
				die();
			}
			
			//$session_row = $db->fetchRow("select * from member_session where token = '{$token}' limit 1");

			$session = Model_Redis::instance()->session_get($session_id);

			if(empty($session)){
				header('Content-type:application/json');
				$result['ok'] = false;	
				echo json_encode($result);
				die();
			}

			Model_Redis::instance()->session_update($session_id);

			$member_id = $session['member']['id'];

		        //redis
			$redis = Model_Redis::instance();
			$redis->set("divice-win-member-{$member_id}",time());
			//redis

			$ss_user_id = Model_Redis::instance()->get_ss_user_id_by_member_id($member_id);	

			if(!empty($ss_user_id)){

				$user = Model_Redis::instance()->get_user_row_by_ss_user_id($ss_user_id);
				
				$ss_pwd = $user['passwd'];

				$ss_port = $user['port'];

				$transfer_enable = $user['transfer_enable'] - $user['u'] - $user['d'];

				if($user['expire_dateline'] < time()){
					$expire_dateline = '已经到期，请续费';
				}
				else{
					$expire_d = floor(($user['expire_dateline']  - time()) / 86400);
					$expire_h = floor(($user['expire_dateline']  - time()) % 86400 / 3600);
					$expire_m = floor(($user['expire_dateline']  - time()) % 3600 / 60);
					$expire_dateline = $expire_d . '天' . $expire_h .'小时'. $expire_m . '分钟';
				}

				$result = array(
					"ok" => true, 
					"systemNotification" => array(
					"show"=> false,
					"link"=> "",
					"download_link"=> "https://".DOMAIN_NAME_CN."/static/dl/Speedfast365-3.3.0.1.exe", 
					"version"=> "3.3.0.1",
					), 
					"self"=>array(
						"traffic"=> array(
							"premium"=> $transfer_enable,
						),
						"expire_dateline"=> array(
							"premium"=> $expire_dateline,
						),
						"need_recharge"=>'no',
					),
				);

				if($user['transfer_enable'] <= 0){
					$result['self']['need_recharge'] = 'yes';
				}

				if($user['expire_dateline'] <= time()){
					$result['self']['need_recharge'] = 'yes';
				}

				$server_list = Model_Redis::instance()->get_server_list();

				foreach($server_list as $server){

				$result['configs'][] = array(
					    "id"=> "778007c1-3bab-4ae6-bc03-358c0890c954", 
					    "kcp"=> false, 
					    "data"=> array(
						  "hostString" => 'Los-Angeles-43',
					    ), 
					    "port"=> 1080, 
					    "level"=> 2, 
					    "state"=> 0, 
					    "kcpcli"=> null, 
					    "method"=> "aes-256-cfb", 
					    "server"=> $server['ip_address'], 
					    "country"=> "JP", 
					    "remarks"=> $server['friendlyname'], 
					    "timeout"=> 300, 
					    "kcp_port"=> null, 
					    "password"=> $ss_pwd, 
					    "fast_open"=> true, 
					    "server_port"=> $ss_port,
					);

				}
				
				$result['ok'] = true;

			}
			else{

				$result = array(
					"ok" => true, 
					"systemNotification" => array(
					"show"=> false,
					"link"=> "",
					"download_link"=> "https://".DOMAIN_NAME_CN."/static/dl/Speedfast365-3.3.0.1.exe", 
					"version"=> "3.3.0.1",
					), 
					"self"=>array(
						"traffic"=> array(
							"premium"=> '0',
						),
						"expire_dateline"=> array(
							"premium"=> '点此充值',
						),
						"need_recharge"=>'yes',
					),
				);



				//$server_list = $db->fetchAll("select * from server_data");
				$server_list = Model_Redis::instance()->get_server_list();

				foreach($server_list as $server){

				$result['configs'][] = array(
					    "id"=> "778007c1-3bab-4ae6-bc03-358c0890c954", 
					    "kcp"=> false, 
					    "data"=> array(
						  "hostString" => 'Los-Angeles-43',
					    ), 
					    "port"=> 1080, 
					    "level"=> 2, 
					    "state"=> 0, 
					    "kcpcli"=> null, 
					    "method"=> "aes-256-cfb", 
					    "server"=> $server['ip_address'], 
					    "country"=> "JP", 
					    "remarks"=> $server['friendlyname'], 
					    "timeout"=> 300, 
					    "kcp_port"=> null, 
					    "password"=> '11111111', 
					    "fast_open"=> true, 
					    "server_port"=> '8388',
					);

				}
				$result['ok'] = true;
			}

		}
		else{
			$result['ok'] = false;
		}			

		header('Content-type:application/json');	
		echo json_encode($result);

	}
}
