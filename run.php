<?php

$uri = $_SERVER['REQUEST_URI'];

$_SGLOBAL = array();

$route = Model_Route::get($uri);

if(empty($route['controller'])){
	_Error_404();
	exit;
}
else{
	$_SGLOBAL['controller'] = $route['controller'];
	$_SGLOBAL['action'] = $route['action'];
	if(isset($route['params'])){
		$_SGLOBAL['params'] = $route['params'];
	}
}

$file = APPLICATION_PATH . '/controller/' . $_SGLOBAL['controller'] . '.php';

if(file_exists($file)){
	require $file;
}
else{
	echo "file not found:{$file}";die();
	_Error_404();	
}

$class = "Controller_{$_SGLOBAL['controller']}";

$action = "action_{$_SGLOBAL['action']}";

$obj = new $class;

$obj->$action();
