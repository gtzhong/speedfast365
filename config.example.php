<?php

Define('SITE_NAME','Speedfast365');//（请修改成自己的）

Define('SUPER_MEMBER_ID',1);//超级用户member id 请修改

$_CONFIG = array();

//mainhost是由gethostname()得到的主机名，给不同的主机分别配置参数（开发机、生产机、测试机等）

$_CONFIG['mainhost'] = array(
	'db' => array(
		'host' => '127.0.0.1',
		'dbname' => 'mysql_db',
		'user' => 'mysql_username',
		'passwd' => 'mysql_password',
	),
);

$_CONFIG['iZj6cbrtfxqp5uqxuoqxisZ'] = $_CONFIG['ubuntu'] = $_CONFIG['mainhost'];

//以上是生产机配置，以下是开发机、测试机配置 localhost 是开发机的主机名，betaboy是测试机的主机名，随你取

$_CONFIG['localhost'] = $_CONFIG['betaboy'] = array(
	'db' => array(
		'host' => '127.0.0.1',
		'dbname' => 'mysql_db',
		'user' => 'mysql_username',
		'passwd' => 'mysql_password',
	),
);

//以下是每台服务器的昵称信息

$_CONFIG['iZj6cbrtfxqp5uqxuoqxisZ']['nick'] = 'yun';
$_CONFIG['localhost']['nick'] = 'stone';
$_CONFIG['betaboy']['nick'] = 'pig';



//以下是价格设置

Define('PRICE_M',35);//月价格
$bytes = 30 * 1024 * 1024 * 1024;//30G比特
Define('TRIFFIC_M',$bytes);//月流量 
Define('Y_MONTH',8);//一年只要8个月的钱，只要 PRICE_M * Y_MONTH 元
Define('PRICE_Y',PRICE_M*Y_MONTH);//一年的价格


//以下是接口通信密码配置

Define('KEY_EASYPAY','12349876');//支付宝监控机器人通信密码

Define('KEY_HAND','13572468');//管理员操作密码，非一般情况使用

//以下是支付和客服信息
Define('SUPPORT_METHOD','QQ');//客服类型，换成微信也可以
Define('SUPPORT_CONTACT','********');//客服联系方式

Define('ALIPAY_ACCOUNT','*********');//支付宝账户
Define('ALIPAY_NAME','张三');//支付宝姓名
Define('ALIPAY_QR','/static/image/alipay_2.jpg');//支付宝个人二维码

//以下是IP跳转，针对dns污染和推广使用(请修改成自己的，或者删除）
$redirect_ip = array();
$redirect_ip[] = '108.61.186.155';
$redirect_ip[] = '45.79.96.118';

//以下配置请修改成自己的！！
//以下配置功能解释：发现当前域名不在domain_name_out_stable里时，会自动跳转到domain_name_cn
$domain_name_cn = 'speedfast365-001.com';//墙内可访问的玉米

$domain_name_out_stable = array();
$domain_name_out_stable[] = 'speedfast365.com';
$domain_name_out_stable[] = 'www.speedfast365.com';
$domain_name_out_stable[] = 'test-www.speedfast365.com';
$domain_name_out_stable[] = 'a.speedfast365.net';
$domain_name_out_stable[] = 'speedfast365.net';
$domain_name_out_stable[] = 'www.speedfast365.net';
$domain_name_out_stable[] = 'speedfast365.org';
$domain_name_out_stable[] = 'www.speedfast365.org';
$domain_name_out_stable[] = 'speedfast365.info';
$domain_name_out_stable[] = 'www.speedfast365.info';
$domain_name_out_stable[] = 'speedfast365.me';
$domain_name_out_stable[] = 'www.speedfast365.me';
$domain_name_out_stable[] = 'speedfast365.xyz';
$domain_name_out_stable[] = 'www.speedfast365.xyz';
$domain_name_out_stable[] = 'speedfast365-001.com';
$domain_name_out_stable[] = 'www.speedfast365-001.com';

//以下是主域名配置（请修改成自己的）
Define('DOMAIN_NAME','speedfast365.com');

//以下是墙内域名配置(你配置如上同一个也无妨）
Define('DOMAIN_NAME_CN','speedfast365-001.com');
