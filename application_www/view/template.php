<!doctype html>
<html lang="zh-cn">


<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="shadowsocks付费代理,speedfast365,shadowsocks,ss,付费翻墙,代理服务器,科学上网,vpn,影梭,梯子,GFW">
<meta name="description" content="收费Shadowsocks线路,有香港、美国、日本多条100M的高速线路,24小时全天1080P视频,最低￥15/月">
<title><?php $title = $this->title; echo empty($title) ? 'Speedfast365-香港、美国、日本高速科学上网代理服务器' : $title;?></title>
<link rel="shortcut icon" href="/static/img/favicon.ico">
<link rel="apple-touch-icon" sizes="57x57" href="/static/img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/static/img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/static/img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/static/img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/static/img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/static/img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/static/img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/static/img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/static/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/static/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/static/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/static/img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/static/img/favicon-16x16.png">
<link rel="manifest" href="/static/img/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/static/img/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="<?php echo $this->_static_path; ?>css/all.css" type="text/css" />

<?php
$_session_user = $this->_session_user;
$_tpl_notice_msg = $this->_tpl_notice_msg;
$_tpl_notice_error = $this->_tpl_notice_error;
?>

<?php
	$_domain = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}";
?>

<!--[if lt IE 9]>
<script src="/static/js/html5shiv.js"></script>
<script src="/static/js/respond.min.js"></script>
<![endif]-->


</head>
<script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "<?php echo $_domain; ?>",
  "logo": "<?php echo $_domain; ?>/static/img/favicon-96x96.png"
  }
</script>
<script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "<?php echo SITE_NAME;?>",
  "alternateName": "<?php echo SITE_NAME;?>",
  "url": "<?php echo $_domain; ?>"
  }
</script>
<body id="body">
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    
    <a class="navbar-brand" href="/">Speedfast365</a>
    <p class="navbar-text visible-lg">收费Shadowsocks，不限制终端设备数量</p>
    
</div>
<div class="navbar-collapse collapse">

    
<ul class="nav navbar-nav"><li class="active" id="dropdown-menu-home"><a href="<?php echo $_domain ?>/">首页</a></li><li class="
               "
        id="shop"><a href="<?php echo $_domain ?>/member/register"
        >
            注册
            
        </a></li><li class="
               "
        id="r"><a href="<?php echo $_domain ?>/member/alipayrecharge"
        >
            充值
            
        </a></li><li class="
               "
        id="download"><a href="<?php echo $_domain ?>/download/"
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
        id="support-帮助"><a href="<?php echo $_domain ?>/support/help/">帮助</a><ul class="dropdown-menu">

	<li class="" id="support-帮助-windows客户端"><a href="<?php echo $_domain ?>/support/help/?type=windows">Windows客户端</a></li>

	<li class="" id="support-帮助-mac客户端"><a href="<?php echo $_domain ?>/support/help/?type=mac">Mac客户端</a></li>
	<li class="" id="support-帮助-android客户端"><a href="<?php echo $_domain ?>/support/help/?type=android">Android客户端</a></li>
	<li class="" id="support-帮助-iphone客户端"><a href="<?php echo $_domain ?>/support/help/?type=iphone">iPhone客户端</a></li>

	</ul></li><li class="
               "
        id="support-faq"><a href="<?php echo $_domain ?>/support/faq/">FAQ 常见问题</a></li><li class="
               "
        id="support-服务条款"><a href="<?php echo $_domain ?>/support/service/">服务条款</a></li>
<?php /*
	<li class="
               "
        id="surge-conf-generator"><a href="/surge/conf/generator/">Surge配置生成器</a></li>
*/?>
</ul></li></ul>


  <ul class="nav navbar-nav navbar-right">
      <?php if(empty($_session_user)):?>
      <li>
        <a href="<?php echo $_domain ?>/member/login">
          <span class="glyphicon glyphicon-log-in"></span> 登录</a>
      </li>
      <li>
        <a href="<?php echo $_domain ?>/member/register">
          <span class="glyphicon glyphicon-edit"></span> 注册</a>
      </li>
      <?php else:?>
	<li>
        <a href="<?php echo $_domain ?>/member/index">
          <span class="glyphicon glyphicon-user"></span>(<?php echo $_session_user['email'];?>) 个人中心</a>
      </li>

      <li>
        <a href="<?php echo $_domain ?>/member/settingpwd">
          <span class="glyphicon glyphicon-edit"></span>  修改密码</a>
      </li>

	<li>
        <a href="<?php echo $_domain ?>/member/logout">
          <span class="glyphicon glyphicon-log-out"></span> 退出</a>
        </li>
      <?php endif;?>
  </ul>
</div>
</div>
</div>


	<?php if(!empty($_tpl_notice_msg) || !empty($_tpl_notice_error)):?>
	<?php $this->_render('inc.notice');?>
	<?php else:?>
	<?php $this->_render($this->_tpl);?>
	<?php endif;?>



<footer>
<div class="container">


<div class="nav-footer"><ul class="list-unstyled"><li 
            id="footer-menu-shop"><a href="/member/register">注册</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-r"><a href="/member/alipayrecharge">充值</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-download"><a href="/download/">下载</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-support"><a href="/support/">支持</a></li><li 
            id="footer-menu-support-faq"><a href="/support/faq/">FAQ 常见问题</a></li><li 
            id="footer-menu-support-服务条款"><a href="/support/service/">服务条款</a></li>
<?php /*
	<li 
            id="footer-menu-surge-conf-generator"><a href="/surge/conf/generator/">Surge配置生成器</a></li>
*/?>
</ul></div>

</div>
  <div class="site-info text-center">
    <span title="<?php global $hostname,$_CONFIG; echo $_CONFIG["{$hostname}"]['nick']; ?>">@</span> 2014 Speedfast365 版权所有
    
  </div>
</footer>
<script type="text/javascript" src="/static/js/js1.js"></script>
<?php /*
<div style="display:none;/">
<script src="https://s95.cnzz.com/z_stat.php?id=1260188017&web_id=1260188017" language="JavaScript"></script>
</div>
*/?>
</body>
</html>

