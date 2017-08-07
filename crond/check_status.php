<?php
//这是统计数据的程序，偶尔看看所用。命令行使用。
include_once dirname(__file__) . '/crond_init.php';

if(!empty($argv[1])){
	$day = intval($argv[1]);
}
else{
	$day = 0;
}

echo "day:{$day}\n";

$time = time();

$dateline_today = strtotime(date('Y-m-d',$time)) - $day * 86400;

$dateline_yestoday = $dateline_today - 86400;

$db = Db::instance();

$transfer_yestoday = $db->fetchOne("SELECT sum(byte_d) FROM `traffic_history` where dateline > {$dateline_yestoday} and dateline < {$dateline_today}");

$transfer_yestoday = $transfer_yestoday / 1024 /1024/1024;

echo "transfer_yestoday:{$transfer_yestoday}\n";

$transfer_today = $db->fetchOne("SELECT sum(byte_d) FROM `traffic_history` where dateline > {$dateline_today}");

$transfer_today = $transfer_today / 1024 /1024/1024;

echo "transfer_today:{$transfer_today}\n";

$transfer = $db->fetchOne("SELECT sum(byte_d) FROM `traffic_history`");

$transfer = $transfer / 1024 /1024/1024;

echo "transfer_all:{$transfer}\n";

$error_no = $db->fetchOne("select count(*) from user where expire_dateline < {$time} and enable > 0");

echo "error_no:{$error_no}\n";

$error_fo = $db->fetchOne("select count(*) from user where d < 0");

echo "error_fo:{$error_fo}\n";

$error_transfer = $db->fetchOne("select count(*) from user where transfer_enable < 0 and enable > 0");

echo "error_transfer:{$error_transfer}\n";

$custmer_no = $db->fetchOne("select count(*) from user where expire_dateline > {$time} and enable = 1 and prepare <> 1");

echo "custmer_no:{$custmer_no}\n";

$custmer_no_year = $db->fetchOne("select count(*) from user where expire_dateline > {$time} and enable = 1 and member_level = 1");

echo "custmer_no_year:{$custmer_no_year}\n";

		
$expire_month = time() + 86400 * 31 * 6;

$google_user_reg_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265532");

$google_user_money_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265532 and ss_user_id > 0");

echo "google_user_reg_yestoday:{$google_user_reg_yestoday}\n";
echo "google_user_money_yestoday:{$google_user_money_yestoday}\n";

$google_user_reg_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265532");

$google_user_money_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265532 and ss_user_id > 0");

echo "google_user_reg_today:{$google_user_reg_today}\n";
echo "google_user_money_today:{$google_user_money_today}\n";

$google_free_user_reg_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265533");

$google_free_user_money_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265533 and ss_user_id > 0");

echo "google_free_user_reg_today:{$google_free_user_reg_today}\n";
echo "google_free_user_money_today:{$google_free_user_money_today}\n";

$google_free_user_reg_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265533");

$google_free_user_money_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265533 and ss_user_id > 0");

echo "google_free_user_reg_yestoday:{$google_free_user_reg_yestoday}\n";
echo "google_free_user_money_yestoday:{$google_free_user_money_yestoday}\n";

$zhihu_user_reg_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265523");

$zhihu_user_money_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265523 and ss_user_id > 0");

echo "zhihu_user_reg_yestoday:{$zhihu_user_reg_yestoday}\n";
echo "zhihu_user_money_yestoday:{$zhihu_user_money_yestoday}\n";

$zhihu_user_reg_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265523");

$zhihu_user_money_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265523 and ss_user_id > 0");

echo "zhihu_user_reg_today:{$zhihu_user_reg_today}\n";
echo "zhihu_user_money_today:{$zhihu_user_money_today}\n";


$baidu_user_reg_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265534");

$baidu_user_money_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 1265534 and ss_user_id > 0");

echo "baidu_user_reg_yestoday:{$baidu_user_reg_yestoday}\n";
echo "baidu_user_money_yestoday:{$baidu_user_money_yestoday}\n";

$baidu_user_reg_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265534");

$baidu_user_money_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 1265534 and ss_user_id > 0");

echo "baidu_user_reg_today:{$baidu_user_reg_today}\n";
echo "baidu_user_money_today:{$baidu_user_money_today}\n";

$normal_user_reg_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 0");
$normal_user_money_yestoday = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_yestoday} and register_time < {$dateline_today} and union_member_id = 0 and ss_user_id > 0");

echo "normal_user_reg_yestoday:{$normal_user_reg_yestoday}\n";
echo "normal_user_money_yestoday:{$normal_user_money_yestoday}\n";

$normal_user_reg_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 0");

$normal_user_money_today = $db->fetchOne("SELECT count(*) FROM `member` where register_time > {$dateline_today} and union_member_id = 0 and ss_user_id > 0");

echo "normal_user_reg_today:{$normal_user_reg_today}\n";
echo "normal_user_money_today:{$normal_user_money_today}\n";
