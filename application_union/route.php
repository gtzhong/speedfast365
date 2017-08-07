<?php
$_route = array(
	"index_index" => array(
		'url' => '/',
		'controller' => 'index',
		'action' => 'index',
	),
);

$_route['main_index'] = array(
	'url' => '/main/',
	'controller' => 'main',
	'action' => 'index',
);

$_route['link_index'] = array(
	'url' => '/link/',
	'controller' => 'link',
	'action' => 'index',
);

$_route['report_index'] = array(
	'url' => '/report/',
	'controller' => 'report',
	'action' => 'index',
);

$_route['withdraw_index'] = array(
	'url' => '/withdraw/',
	'controller' => 'withdraw',
	'action' => 'index',
);

$_route['setting_index'] = array(
	'url' => '/setting/',
	'controller' => 'setting',
	'action' => 'index',
);

$_route['support_faq'] = array(
	'url' => '/support/faq/',
	'controller' => 'support',
	'action' => 'faq',
);

$_route['support_help'] = array(
	'url' => '/support/service/',
	'controller' => 'support',
	'action' => 'service',
);

$_route['member_login'] = array(
	'url' => '/login',
	'controller' => 'member',
	'action' => 'login',
);
$_route['member_logout'] = array(
	'url' => '/logout',
	'controller' => 'member',
	'action' => 'logout',
);

