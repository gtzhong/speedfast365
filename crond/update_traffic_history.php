<?php
include_once dirname(__file__) . '/crond_init.php';

$db = Db::instance();

$list = $db->fetchAll("select * from user where (u>0 || d>0)");

if(!empty($list)){
	foreach($list as $row){
		try{
			$db->beginTransaction();

			$bind = array();
			$bind['uid'] = $row['id'];
			$bind['byte_u'] = $row['u'];
			$bind['byte_d'] = $row['d'];
			$bind['dateline'] = time();

			$transfer_total = $row['u'] + $row['d'];
			//insert traffic_history
			$db->insert("traffic_history",$bind);
			//update user
			$db->exec("update user set u=u-{$row['u']},d=d-{$row['d']},transfer_enable=transfer_enable-{$transfer_total} where id = {$row['id']} limit 1");

			//检查expire_dateline是否过期
			if($row['expire_dateline'] < time()){
				$db->update("user",array("enable"=>0),array("id={$row['id']}"));
			}
			
			$db->commit();

		}
		catch(Exception $e){
			$db->rollBack();
		}
	}
}
