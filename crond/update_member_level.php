<?php
include_once dirname(__file__) . '/crond_init.php';

$db = Db::instance();

$time = time();

$total = $db->exec("update user set member_level = 1 where id in (SELECT uid FROM `recharge_history`  where expire_time >= 32140800 and expire_dateline_new > {$time})");

echo "member_level:1 total:";
echo $total;
echo "\n";

$total = $db->exec("update user set member_level = 0 where id not in (SELECT uid FROM `recharge_history`  where expire_time >= 32140800 and expire_dateline_new > {$time})");

echo "member_level:0 total:";
echo $total;

echo "\n";
