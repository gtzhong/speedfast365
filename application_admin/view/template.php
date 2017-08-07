<!doctype html>
<html lang="zh-cn">


<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title><?php $title = $this->title; echo empty($title) ? '' : $title;?></title>
<?php
$_session_user = $this->_session_user;
$_tpl_notice_msg = $this->_tpl_notice_msg;
$_tpl_notice_error = $this->_tpl_notice_error;
?>

<?php
if($GLOBALS['hostname'] == 'bananabook'){
	$_domain = '';
}
else{
	//$_domain = "https://www.speedfast365.com";
	//$_domain = "https://{$_SERVER['HTTP_HOST']}";
	$_domain = "";
}
?>


	<?php if(!empty($_tpl_notice_msg) || !empty($_tpl_notice_error)):?>
	<?php $this->_render('inc.notice');?>
	<?php else:?>
	<?php $this->_render($this->_tpl);?>
	<?php endif;?>


</body>
</html>

