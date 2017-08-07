<!doctype html>
<html lang="zh-cn">


<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="">
<meta name="description" content="">
<title><?php $title = $this->title; echo empty($title) ? '云享赚' : $title;?></title>
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
	$_domain_www = "https://".DOMAIN_NAME_CN;
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
  "logo": "<?php echo $_domain; ?>"/static/img/favicon-96x96.png"
  }
</script>
<script type="application/ld+json">
  {
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "<?php echo SITE_NAME; ?>",
  "alternateName": "<?php echo SITE_NAME; ?>",
  "url": "<?php echo $_domain;?>"
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
    
    <a class="navbar-brand" href="/">云享赚</a>
    <p class="navbar-text visible-lg">海阔凭鱼跃,天高任鸟飞</p>
    
</div>
<div class="navbar-collapse collapse">

    
<ul class="nav navbar-nav"><li class="active" id="dropdown-menu-home"><a href="<?php echo $_domain ?>/">首页</a></li>
<?php /**
<li class="
               "
        id="support-faq"><a href="<?php echo $_domain ?>/support/faq/">FAQ 常见问题</a></li><li class="
               "
        id="support-服务条款"><a href="<?php echo $_domain ?>/support/service/">服务条款</a></li>
</li>
**/?>

</ul>


  <ul class="nav navbar-nav navbar-right">
      <?php if(empty($_session_user)):?>
      <li>
        <a href="<?php echo $_domain; ?>/login">
          <span class="glyphicon glyphicon-log-in"></span> 登录</a>
      </li>
      <li>
        <a href="<?php echo $_domain_www; ?>/member/register">
          <span class="glyphicon glyphicon-edit"></span> 注册</a>
      </li>
      <?php else:?>
	<li>
        <a href="javascript:void(0);">
          <span class="glyphicon glyphicon-edit"></span>(<?php echo $_session_user['email'];?>)</a>
      </li>

	<li>
        <a href="<?php echo $_domain; ?>/main/">
          <span class="glyphicon glyphicon-edit"></span> 数据中心</a>
        </li>

      <li>
        <a href="<?php echo $_domain; ?>/logout">
          <span class="glyphicon glyphicon-edit"></span> 注销</a>
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
            id="footer-menu-shop"><a href="<?php echo $_domain_www;?>">主站</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-r"><a href="<?php echo $_domain_www;?>">充值</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-download"><a href="<?php echo $_domain_www;?>/download/">下载</a></li></ul><ul class="list-unstyled"><li 
            id="footer-menu-support"><a href="<?php echo $_domain_www;?>/support/">支持</a></li><li 
            id="footer-menu-support-faq"><a href="<?php echo $_domain_www;?>/support/faq/">FAQ 常见问题</a></li><li 
            id="footer-menu-support-服务条款"><a href="<?php echo $_domain_www;?>/support/service/">服务条款</a></li>
<?php /*
	<li 
            id="footer-menu-surge-conf-generator"><a href="/surge/conf/generator/">Surge配置生成器</a></li>
*/?>
</ul></div>

</div>
  <div class="site-info text-center">
    <span title="<?php echo $_SERVER['SERVER_ADDR']; ?>">@</span> 2016 Shadowsocks365 版权所有
    
  </div>
</footer>
<script type="text/javascript" src="/static/js/js1.js"></script>
</body>
</html>

