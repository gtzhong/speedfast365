<?php
define('APPLICATION_PATH',dirname(__file__));
require APPLICATION_PATH . '/../init.php';
		
$cookie_host = '.'.$_SERVER['SERVER_NAME'];

if($cookie_host == '.www.lnmp.org'){
	$cookie_host = '';
}
