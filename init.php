<?php
Defined('APPLICATION_ENV') ? APPLICATION_ENV : (isset($_SERVER['APPLICATION_ENV']) ? Define('APPLICATION_ENV',$_SERVER['APPLICATION_ENV']) : Define('APPLICATION_ENV','production'));
//有些代码看上去显得多余或者奇怪，那一定是历史遗留产物
Defined('ROOT_PATH') ? ROOT_PATH :  Define('ROOT_PATH',dirname(__file__));
Define('LIBRARY_PATH',ROOT_PATH . "/library");
Define('CROND_PATH',ROOT_PATH . "/crond");
include_once(LIBRARY_PATH . "/function.php");
include_once(LIBRARY_PATH . "/action.php");
include_once(LIBRARY_PATH . "/db.php");

$hostname = gethostname();

$hostname = str_replace('.localdomain','',$hostname);

//加载配置文件，记得把config.example.php改成config.php并且配置好参数
include_once(ROOT_PATH . "/config.php");

if(Defined('APPLICATION_PATH')){
	include_once(APPLICATION_PATH . '/route.php');
}

//魔术引号关闭
?>
