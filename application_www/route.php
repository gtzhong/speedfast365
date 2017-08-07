<?php
$_route = array(
	"index_index" => array(
		'url' => '/',
		'controller' => 'index',
		'action' => 'index',
	),
);
$_route['index_status'] = array(
	'url' => '/status',
	'controller' => 'index',
	'action' => 'status',
);
$_route['test_index'] = array(
	'url' => '/ttt',
	'controller' => 'test',
	'action' => 'index',
);
$_route['other_free'] = array(
	'url' => '/free/',
	'controller' => 'other',
	'action' => 'free',
);

$_route['member_index'] = array(
	'url' => '/member/index',
	'controller' => 'member',
	'action' => 'index',
);
$_route['member_invite'] = array(
	'url' => '/member/invite',
	'controller' => 'member',
	'action' => 'invite',
);
$_route['recharge_alipay'] = array(
	'url' => '/member/alipayrecharge',
	'controller' => 'recharge',
	'action' => 'alipay',
);
$_route['member_login'] = array(
	'url' => '/member/login',
	'controller' => 'member',
	'action' => 'login',
);
$_route['member_logout'] = array(
	'url' => '/member/logout',
	'controller' => 'member',
	'action' => 'logout',
);

$_route['member_register'] = array(
	'url' => '/member/register',
	'controller' => 'member',
	'action' => 'register',
);

$_route['member_findemail'] = array(
	'url' => '/member/findemail',
	'controller' => 'member',
	'action' => 'findemail',
);

$_route['member_findpwd'] = array(
	'url' => '/member/findpwd',
	'controller' => 'member',
	'action' => 'findpwd',
);

$_route['validate_image'] = array(
	'url' => '/validate_image',
	'controller' => 'validate',
	'action' => 'image',
);

$_route['member_settingpwd'] = array(
	'url' => '/member/settingpwd',
	'controller' => 'member',
	'action' => 'settingpwd',
);

$_route['member_settinginfo'] = array(
	'url' => '/member/settinginfo',
	'controller' => 'member',
	'action' => 'settinginfo',
);

$_route['support_index'] = array(
	'url' => '/support(/)',
	'controller' => 'support',
	'action' => 'index',
);

$_route['support_start'] = array(
	'url' => '/support/start(/)',
	'controller' => 'support',
	'action' => 'start',
);

$_route['support_download'] = array(
	'url' => '/download(/)',
	'controller' => 'support',
	'action' => 'download',
);
$_route['support_faq'] = array(
	'url' => '/support/faq(/)',
	'controller' => 'support',
	'action' => 'faq',
);
$_route['support_notice'] = array(
	'url' => '/support/notice(/)',
	'controller' => 'support',
	'action' => 'notice',
);
$_route['support_help'] = array(
	'url' => '/support/help(/)',
	'controller' => 'support',
	'action' => 'help',
);

$_route['support_service'] = array(
	'url' => '/support/service(/)',
	'controller' => 'support',
	'action' => 'service',
);

$_route['paycallback_easypay'] = array(
	'url' => '/paycallback/easypay',
	'controller' => 'paycallback',
	'action' => 'easypay',
);
$_route['paycallback_hand'] = array(
	'url' => '/paycallback/hand',
	'controller' => 'paycallback',
	'action' => 'hand',
);
$_route['qrcode_png'] = array(
	'url' => '/qrcode/png',
	'controller' => 'qrcode',
	'action' => 'png',
);
$_route['qrcode_normal'] = array(
	'url' => '/qrcode/normal',
	'controller' => 'qrcode',
	'action' => 'normal',
);
$_route['qrcode_surgeconf'] = array(
	'url' => '/conf/surge',
	'controller' => 'qrcode',
	'action' => 'surgeconf',
);

$_route['autoconfig_mac'] = array(
	'url' => '/autoconfig/speedfast365_shadowsocks_config_mac.json',
	'controller' => 'autoconfig',
	'action' => 'mac',
);

$_route['history_index'] = array(
	'url' => '/history',
	'controller' => 'history',
	'action' => 'index',
);

$_route['domain_windows'] = array(
	'url' => '/domain_windows',
	'controller' => 'domain',
	'action' => 'windows',
);


