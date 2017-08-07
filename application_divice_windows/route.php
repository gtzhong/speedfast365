<?php
$_route = array(
	"index_index" => array(
		'url' => '/',
		'controller' => 'index',
		'action' => 'index',
	),
);

$_route['index_ping'] = array(
	'url' => '/ping',
	'controller' => 'index',
	'action' => 'ping',
);
$_route['index_systemdata'] = array(
	'url' => '/system_data',
	'controller' => 'index',
	'action' => 'systemdata',
);
$_route['index_notification'] = array(
	'url' => '/index_notification',
	'controller' => 'index',
	'action' => 'notification',
);

$_route['user_login'] = array(
	'url' => '/login',
	'controller' => 'user',
	'action' => 'login',
);

$_route['user_logout'] = array(
	'url' => '/logout',
	'controller' => 'user',
	'action' => 'logout',
);
