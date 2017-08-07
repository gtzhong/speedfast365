<?php
//此页面和cover.inc.php是单独放置在以IP访问的服务器的WEB目录下的，访问IP，跳转到域名。如果是手机QQ内置的浏览器，则弹出遮罩层
$agent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match('/QQ/',$agent) && is_mobile()){
	require 'cover.inc.php';
}
else{
	if(preg_match('/domain_windows/',$_SERVER['REQUEST_URI'])){
		echo "https://divice-windows.speedfast365-1080.com/";die();
	}

	header("location:https://speedfast365-001.com{$_SERVER[REQUEST_URI]}");die();
}

function is_mobile(){
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($agent,"NetFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
		return true;
	}
	else{
		return false;
	}

}


