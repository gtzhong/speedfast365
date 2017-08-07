<div class="container">





<h1>
FAQ 常见问题
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-faq" property="itemListElement" typeof="ListItem"><a href="/support/faq/" property="item" typeof="WebPage"><span property="name">FAQ 常见问题</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    
<h2><strong>FAQ 常见问题</strong></h2>



<ul>
  
    <li>
      <a href="#faq_entry_">Shadowsocks跟VPN有什么不同？</a>
    </li>
  
    <li>
      <a href="#faq_entry_">“自动代理模式”和“全局代理模式”有什么区别？</a>
    </li>
  
    <li>
      <a href="#faq_entry_">月流量是怎么计算的？</a>
    </li>
  
</ul>
<div class="faq-list">
  
    <div id="faq_entry_">
      <div class="faq-question">
        <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>Shadowsocks跟VPN有什么不同？</strong></h3></div>
      <div class="faq-answer"><p>现在GFW已经可以识别OpenVPN、PPTP等常见VPN协议。GFW如果发现你连接是VPN，一定时间后就会重置你的连接，使VPN无法正常使用。现在GFW对VPN的干扰越来越多。而Shadowsocks是针对此问题专门设计的，GFW无法识别出Shadowsocks连接，因此无法进行干扰。</p></div>
      <a href="#">回到顶端</a>
    </div>
  
    <div id="faq_entry_">
      <div class="faq-question">
        <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>“自动代理模式”和“全局代理模式”有什么区别？</strong></h3></div>
      <div class="faq-answer"><p>“自动代理模式”是指使用一个PAC （代理自动配置）文件来决定是否使用代理来访问一个目标网站。Shadowsocks中的PAC文件是根据GFW的过滤列表配置的。这样只有访问被墙的网站才使用代理服务器。既节省了Shadowsocks流量，又不影响访问国内网站的速度。

“全局代理模式&quot;是指所有网络访问都走代理服务器。当您遇到某些被墙网站还没有被加入PAC中的列表，可以手动切换的全局模式后访问。</p></div>
      <a href="#">回到顶端</a>
    </div>
  
    <div id="faq_entry_">
      <div class="faq-question">
        <h3><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <strong>月流量是怎么计算的？</strong></h3></div>
      <div class="faq-answer"><p><?php echo PRICE_M; ?>元可购买<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 * 1); ?>G流量+31天期限，流量永远不清零，可以累计使用。当期限到期，流量还没有用完时，再充值一次即可累计使用。</p></div>
      <a href="#">回到顶端</a>
    </div>
 
  
</div>


    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>


