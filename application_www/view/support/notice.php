<div class="container">


<?php
$_session_user = $this->_session_user;
?>


<h1>
致歉信
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-faq" property="itemListElement" typeof="ListItem"><a href="/support/faq/" property="item" typeof="WebPage"><span property="name">FAQ 常见问题</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    
<h2><strong>关于价格调整的致歉</strong></h2>


<div class="faq-list">
	<p>
各位亲爱的用户：
	</p>
	<p>
从一开始的几条普通线路，到现在每条线路超过100M的速度，我们一直始终致力于为您提供优质、高速、稳定的科学上网服务。感谢您一直以来的陪伴与包容、信任和托付，这是我们不断前进的动力。
	</p>
	<p>
伴随着用户对上网品质的要求逐步提高、以及越来越丰富的外网App及网站对带宽要求的与日俱增，在不降低服务质量的前提下，更为了能持续为您提供更优质的服务，我们于9月18日对所有服务器线路的配置和带宽进行了升级：从2016年9月18日起，所有香港服务器提供100M的带宽，所有日本服务器提供1000M的带宽。为了感谢老用户的信任，先前充值的老用户（包括年付的）都可以平滑享用新升级的服务器线路，新注册及续费的用户，按照新的价格续费并且享受新的流量额度。
	</p>
	<p>
您需要了解的是，本站流量不清零，无论价格调整前后，所有剩余的流量都可以自动结转到下月、平滑享受新的服务器线路。同时，一如既往支持邀请朋友注册，赠送永久免费的活动。
	</p>
	<p>
这并非是一个容易的决定，更不意味着本站从此以赚钱作为唯一目的。但所有服务都需要以可持续的资源为依托，勉力支撑有违客观商业规律。我们坦承困难，也完全理解您的不解或是失望。但调整价格后，对我们同时意味着更大的责任，更高的服务水准，我们仍将一如既往鞭策自己不断进步，我们更期待以更好的服务来获得您的理解与再次的支持。
	</p>
	<p>
7x24小时全天1080P YouTube流畅，每天1元都不到。
	</p>
	<p>
	&nbsp;
	</p>
<?php if(!empty($_session_user['register_time']) && $_session_user['register_time'] < 1474171200): ?>
<p>
<font color="red">为感谢老用户的支持，从现在到10月1日0点，9月18日12点之前注册的会员，可以享受先前原价格<b>150元充值1年+120G流量</b>的优惠。可以直接充值，也可以先咨询客服。</font>(该通知，仅老会员登录可见)
</p>
<?php endif;?>
</div>


    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>

