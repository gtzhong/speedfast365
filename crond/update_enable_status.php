<?php
include_once dirname(__file__) . '/crond_init.php';

$db = Db::instance();

$time = time();

$total = $db->exec("update user set enable = 0 where (expire_dateline < {$time} or transfer_enable <= 0) and enable = 1");

echo "update enable to 0:".$total."\n";

$total = $db->exec("update user set enable = 1 where expire_dateline > {$time} and transfer_enable > 0  and enable = 0");

echo "update enable to 1:".$total."\n";

$total = $db->fetchOne("select count(*) as total from user where expire_dateline > {$time} and enable = 1");

echo "total enable:".$total."\n";

$long_time = $time - 86400 * 30;

$total = $db->exec("update user set enable_server = 0 where expire_dateline < {$long_time} and enable_server = 1");

echo "update enable_server to 0:".$total."\n";

$total = $db->exec("update user set enable_server = 1 where expire_dateline > {$time}  and enable_server = 0");

echo "update enable_server to 1:".$total."\n";

$total = $db->fetchOne("select count(*) as total from user where expire_dateline > {$time} and enable_server = 1");

echo "total enable_server:".$total."\n";

