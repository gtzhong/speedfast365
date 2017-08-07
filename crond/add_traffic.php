<?php
//这个文件已经废弃。原先是在调整价格后，统一给老客户做补偿流量的程序。
include_once dirname(__file__) . '/crond_init.php';
die();
$db = Db::instance();

$time = time();

$list_recharge = $db->fetchAll("select * from recharge_history where expire_time > 864000 and expire_dateline_new > {$time}");

$i = 0;
$ss_array = array();
foreach($list_recharge as $k=>$v){

	$i++;

	//echo "({$i}):expire_dateline_old:".date('Y-m-d H:i:s',$v['expire_dateline_old'])."\n";
	//echo "({$i}):expire_dateline_new:".date('Y-m-d H:i:s',$v['expire_dateline_new'])."\n";

	if($v['expire_dateline_old'] > $time){
		$b_time = $v['expire_time'];
	}
	else{
		$b_time = $v['expire_dateline_new'] - $time;
	}
	$b_day = floor($b_time / 86400);

	$a_day = $v['expire_time'] / 86400;

	//echo $b_day / $a_day;

	//echo "\n";

	$b_bytes = ($a_day / 31 * TRIFFIC_M - $v['bytes']) * ($b_day / $a_day);

	//echo "{$i}): b_day:{$b_day}\n";

	@$ss_array["{$v['uid']}"]['b_day_all']+=$b_day;
	@$ss_array["{$v['uid']}"]['b_bytes_all']+=floor($b_bytes);


}

//print_r($ss_array);


//die();



$list = $db->fetchAll("select * from user where expire_dateline > {$time}");

$j=0;
foreach($list as $k=>$v){

	$j++;

	if(isset($ss_array["{$v['id']}"]['b_bytes_all'])){
		$b_bytes = $ss_array["{$v['id']}"]['b_bytes_all'];
		$b_day = $ss_array["{$v['id']}"]['b_day_all'];
	}
	else{
		continue;
	}
	
	$gb = ceil($b_bytes / 1024 / 1024 / 1024);

	echo "({$j}):user:{$v['port']} expire_dateline: ".date('Y-m-d',$v['expire_dateline'])." b_day_all:{$b_day}\n";

	echo "({$j}):add traffic:{$b_bytes} GB:{$gb}\n";


	if(isset($v['benefit_201704_transfer_byte']) && $v['benefit_201704_transfer_byte'] < $b_bytes){

		echo $v['benefit_201704_transfer_byte'];
		echo "\n";
		echo "$b_bytes\n";
		echo "\n";
		echo "++++++++++++++++++++++++++++++\n";
		$transfer_enable = $v['transfer_enable'] + $b_bytes;
		$db->update("user",array("transfer_enable"=>$transfer_enable,"benefit_201704_transfer_byte"=>$b_bytes,"benefit_201704_transfer_byte_dateline"=>$time),array("id={$v['id']}"));
	}
	else{
		echo "------------------------------\n";
	}

}
