  <div class="jumbotron">
    <div class="container">
      <h1><strong>科学上网加速代理服务器(Shadowsocks)</strong></h1>
      <ul>
        <li>全平台: Windows,Mac,Linux,Android,iOS</li>
        <li>国内、国外网站自动分流，高速上Youtube、Tumblr、Pinterest、Twitter、FB、Google等外网</li>
        <li>稳定,协议无特征,不受干扰</li>
        <li>BGP加速、24小时1080p Youtube分分钟高速流畅</li>
        <li>多地区15条线路(香港、美国、日本等)，其中有不限流量线路</li>
        <li>同一帐号可供多人多台电脑手机同时使用</li>
        <li>一键支持：Android影梭，及iPhone的各种客户端</li>
        <li>剩余流量永不清零，在线支付,自动开通</li>
      </ul>
      <?php if(!empty($GLOBALS['free_line'])):?>
      <p><a class="btn btn-primary btn-lg" href="/member/register" role="button">注册免费试用 »</a></p>
      <?php else:?>
      <p><a class="btn btn-primary btn-lg" href="/member/register" role="button">注册一键扫码科学上网 »</a></p>
		<?php /*
      <p><a class="btn btn-primary btn-lg" href="/member/invite" role="button">邀请朋友，永久免费 »</a></p>
		*/?>
      <?php endif;?>
    </div>
  </div>
  <div class="packages-section">
    <div class="container">
      <div>
        <div class="row text-center ">

          <div class="col-md-4 col-sm-6">
            <div class="package">
              <h2>5元/试用1天</h2>
              <h3>多个设备同时可用</h3>
              <ul>
                <li class="transfer-row">1G<small> / 5元</small></li>
                <li><div>手机电脑通用</div></li>
                <li>流量不清零</li>
                <li>1080P视频</li>
                <li>全国BGP加速</li>
                <li>7条高速线路</li>
                <li>支持OTA、UDP</li>
                <li>多个设备可用</li>
              </ul>
              <span class="price-row">1<small>天</small></span>
              <p><a class="btn btn-default btn-primary" href="/member/alipayrecharge" role="button">立即充值 »</a></p>
            </div>
          </div>


          <div class="col-md-4 col-sm-6">
            <div class="package">
              <h2><?php echo PRICE_M * 1; ?>元/1个月</h2>
              <h3>7x24小时高速流畅</h3>
              <ul>
                <li class="transfer-row"><?php echo floor(TRIFFIC_M / 1024 / 1024 / 1024 * 1) ?>G<small> / <?php echo PRICE_M * 1; ?>元</small></li>
                <li><div>手机电脑通用</div></li>
                <li>流量不清零</li>
                <li>1080P视频</li>
                <li>全国BGP加速</li>
                <li>7条高速线路</li>
                <li>支持OTA、UDP</li>
                <li>多个设备可用</li>
              </ul>
              <span class="price-row"><?php echo 31 * 1; ?><small>天</small></span>
              <p><a class="btn btn-default btn-primary" href="/member/alipayrecharge" role="button">立即充值 »</a></p>
            </div>
          </div>
<?php /*
          <div class="col-md-4 col-sm-6">
            <div class="package">
              <h2><?php echo PRICE_M * 3; ?>元/3个月</h2>
              <h3>多个设备同时可用</h3>
              <ul>
                <li class="transfer-row"><?php echo floor(TRIFFIC_M / 1024 / 1024 / 1024 * 3) ?>G<small> / <?php echo PRICE_M * 3; ?>元</small></li>
                <li><div>各平台通用</div></li>
                <li>1000Mbps高速</li>
                <li>流量不清零</li>
                <li>1080P视频</li>
                <li>支持OTA</li>
                <li>多个设备可用</li>
              </ul>
              <span class="price-row"><?php echo 31 * 3; ?><small>天</small></span>
              <p><a class="btn btn-default btn-primary" href="/member/register" role="button">立即注册 »</a></p>
            </div>
          </div>
**/?>
	  <?php 
		$sale_month = floor(PRICE_Y / PRICE_M);
	  ?>
          <div class="col-md-4 col-sm-6">
            <div class="package">
              <h2><?php echo PRICE_Y; ?>元/12个月</h2>
		<?php if($sale_month < 12):?>
              <h3>1年只需<?php echo floor(PRICE_Y / PRICE_M); ?>个月的钱</h3>
		<?php else:?>
              <h3>省心省力方便无忧</h3>
		<?php endif;?>
              <ul>
                <li class="transfer-row"><?php echo /*floor(PRICE_Y / PRICE_M * TRIFFIC_M / 1024 /1024 /1024);*/floor(TRIFFIC_M / 1024 /1024 /1024) * 12; ?>G<small> / <?php echo PRICE_Y; ?>元</small></li>
                <li><div>手机电脑通用</div></li>
                <li>流量不清零</li>
                <li>1080P视频</li>
                <li>全国BGP加速</li>
                <li>12条高速线路+<font color="red">3条无限流量</font></li>
                <li>支持OTA、UDP</li>
                <li>多个设备可用</li>
              </ul>
              <span class="price-row"><?php echo 31 * 12; ?><small>天</small></span>
              <p><a class="btn btn-default btn-primary" href="/member/alipayrecharge" role="button">立即充值 »</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <div class="signup-now">
      <div class="container">
        <div class="row">
          <div class="signup-now-row text-center col-lg-12">
            <div class="signup-now-title">开始使用Shadowsocks</div>
            <a class="btn btn-default btn-primary btn-lg" href="/member/register">注册账号 »</a>
          </div>
        </div>
      </div>
    </div>
  
 
