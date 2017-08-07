<?php
$_route = array(
	"index_index" => array(
		'url' => '/',
		'controller' => 'index',
		'action' => 'index',
	),
);
$_route['member_index'] = array(
	'url' => '/member/',
	'controller' => 'member',
	'action' => 'index',
);
$_route['member_detail'] = array(
	'url' => '/member/detail/',
	'controller' => 'member',
	'action' => 'detail',
);

