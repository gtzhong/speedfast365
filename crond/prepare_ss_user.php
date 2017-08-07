<?php
include_once dirname(__file__) . '/crond_init.php';

$db = Db::instance();

$prepare_user = $db->fetchAll("select * from user where prepare = 1");

$prepare_user_total = count($prepare_user);

if($prepare_user_total < 7){

	for($i=1;$i<=3;$i++){

		$max_port = $db->fetchOne("select max(port) as max_port from user");
		
		$ss_bind = array();

		$ss_bind['prepare'] = 1;

		$ss_bind['passwd'] = rand(11111111,99999999);

		$ss_bind['port'] = $max_port + 1;

		$ss_bind['enable'] = 1;

		$ss_bind['transfer_enable'] = 1024 * 1024 * 20;

		$ss_bind['expire_dateline'] = time() + 1200;

		$db->insert("user",$ss_bind);


	}

}

if(!empty($prepare_user)){
	foreach($prepare_user as $k=>$user){
		if($user['expire_dateline'] - time() < 600){
			$db->update("user",array("expire_dateline"=>time()+1200),array("id={$user['id']}"));	
		}
	}
}
