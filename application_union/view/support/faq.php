
<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;



?>

<div class="container">





<h1>FAQ常见问题</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active">FAQ常见问题</li>
</ol>

</div>


<div class="container">
<div class="row">

	<?php require APPLICATION_PATH . '/view/inc.colmenu.php';?>





	<div class="col-md-7 middle">

	
	
<h2><strong>FAQ常见问题</strong></h2>



<ul>
  
    <li>
      <a href="#faq_entry_">怎么推广赚钱？</a>
    </li>
  
    <li>
      <a href="#faq_entry_">怎么提现？</a>
    </li>
  
</ul>
<div class="faq-list">
  
    <div id="faq_entry_">
      <div class="faq-question">
        <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>怎么推广赚钱？</strong></h3></div>
      <div class="faq-answer"><p>只要在论坛、贴吧、问答社区、手机App等地方，以发帖或跟贴的方式（或以其它很多方式），宣传我们的产品，内容中带上链接（您的<a target="_blank"  href="/link/">推广链接</a>）。当用户点击您的“链接”进入我们的<a target="_blank"  href="https://<?php echo DOMAIN_NAME_CN;?>/">产品网站</a>注册并且充值后，您即可获得10%的充值金额作为佣金(该用户自注册之日起，60天内的所有充值，都可以计算10%佣金到您账上)。当账户累计佣金达到100元后，可以永久升级到20%佣金！！
<?php if(!empty($union_member['commission_rate']) && $union_member['commission_rate'] > 10):?>
<br />
<font color="red">*您的级别佣金比率是20%*</font>
<?php endif;?>
</p>
<p>
开始，先到我们的<a target="_blank" href="https://<?php echo DOMAIN_NAME_CN;?>/">产品网站</a>注册一个帐号，注册成功后会自动进入产品个人中心，可以熟悉一下我们的产品。
</p>
<p>
然后，点击<a target="_blank" href="/login">这里</a>用刚才注册的帐号，登录到数据中心，获取推广链接，开始轻松赚钱之路。</p>

</div>
      <a href="#">回到顶端</a>
    </div>
  
    <div id="faq_entry_">
      <div class="faq-question">
        <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>怎么提现？</strong></h3></div>
      <div class="faq-answer"><p>当可提现佣金累计到20元后，就可以申请提现，提现在24小时内会打入你的支付宝账户。</p></div>
      <a href="#">回到顶端</a>
    </div>
  

  
</div>


	

	</div>


</div>



</div>
</div>

