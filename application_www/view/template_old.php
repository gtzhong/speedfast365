<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Shadowsocks</title>
<link href="<?php echo $this->_static_path; ?>css/all.css" rel="stylesheet" />
<script src="<?php echo $this->_static_path; ?>js/jquery-1.5.1.min.js" ></script>
<script src="<?php echo $this->_static_path; ?>js/jquery.form.js" ></script>
</head>
<?php
$_session_user = $this->_session_user;
$_tpl_notice_msg = $this->_tpl_notice_msg;
$_tpl_notice_error = $this->_tpl_notice_error;
?>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>

<a class="navbar-brand" href="/">Shadowsocks365</a>
<p class="navbar-text visible-lg">专业的ss代理平台，不限制终端数量</p>

</div>
<div class="navbar-collapse collapse">


<ul class="nav navbar-nav"><li class="active" id="dropdown-menu-home"><a href="/">首页</a></li><li class="
"
id="shop"><a href="/shop/"
>
购买

</a></li><li class="
"
id="r"><a href="/r/"
>
兑换

</a></li><li class="
"
id="download"><a href="/download/"
>
下载

</a></li><li class="dropdown
"
id="support"><a href="/support/"

class="dropdown-toggle disabled" data-toggle="dropdown"
>
支持
<b class="caret"></b></a><ul class="dropdown-menu"><li class="dropdown-submenu
"
id="support-帮助"><a href="/support/%E5%B8%AE%E5%8A%A9/">帮助</a><ul class="dropdown-menu"><li class="
"
id="support-帮助-windows客户端"><a href="/support/%E5%B8%AE%E5%8A%A9/windows%E5%AE%A2%E6%88%B7%E7%AB%AF/">Windows客户端</a></li><li class="
"
id="support-帮助-mac客户端"><a href="/support/%E5%B8%AE%E5%8A%A9/mac%E5%AE%A2%E6%88%B7%E7%AB%AF/">Mac客户端</a></li></ul></li><li class="
"
id="support-faq"><a href="/support/faq/">FAQ 常见问题</a></li><li class="
"
id="support-服务条款"><a href="/support/%E6%9C%8D%E5%8A%A1%E6%9D%A1%E6%AC%BE/">服务条款</a></li><li class="
"
id="surge-conf-generator"><a href="/surge/conf/generator/">Surge配置生成器</a></li></ul></li></ul>


<ul class="nav navbar-nav navbar-right">

<li>
<a href="/accounts/login/?next=/">
<span class="glyphicon glyphicon-log-in"></span> 登录</a>
</li>
<li>
<a href="/accounts/signup/?next=/">
<span class="glyphicon glyphicon-edit"></span> 注册</a>
</li>

</ul>
</div>
</div>
</div>





<div class="mainbody">

<a href="/">首页</a>
|
<?php if(empty($_session_user)):?>
<a href="/member/login">登录</a>
<?php else:?>
<a href="/member/index">个人中心</a>
|
<a href="/member/logout">退出</a>
<?php endif;?>

<div class="content">
<?php if(!empty($_tpl_notice_msg) || !empty($_tpl_notice_error)):?>
	<?php $this->_render('inc.notice');?>
	<?php else:?>
	<?php $this->_render($this->_tpl);?>
	<?php endif;?>
</div>
</div>
<div class="footer" style="text-align:center;">
<span title="<?php echo $GLOBALS['hostname'];?>">©</span>2016 Shadowsocks365 版权所有</a>
</div>
</body>
</html>
