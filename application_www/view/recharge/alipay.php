<div class="container">


<?php $form_error = $this->form_error;?>
<?php
$form_tradeNo = $this->form_tradeNo;
?>



<h1>
充值
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">


<?php include_once APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

<div class="col-md-7 middle">
    

<?php
$_session_user = $this->_session_user;
?>

<h4>价格</h4>
<ol>
<li>
一次充值5元，可试用1天，流量1G。
</li>
<li>
一次充值<?php echo PRICE_M; ?>元，增加1个月使用时长和<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 * 1); ?>G流量。
</li>
<li>
一次充值<?php echo PRICE_M * 3; ?>元，增加3个月使用时长和<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 * 3); ?>G流量。
</li>
<?php 		
$sale_month = floor(PRICE_Y / PRICE_M);
?>
<li>
一次充值<?php echo PRICE_Y; ?>元，增加12个月使用时长和<?php echo /*floor(PRICE_Y / PRICE_M * TRIFFIC_M / 1024 /1024 /1024);*/floor(TRIFFIC_M / 1024 /1024 /1024) * 12; ?>G流量。
<?php if($sale_month < 12):?>
(<font color="red">1年只需<?php echo floor(PRICE_Y / PRICE_M); ?>个月的钱</font>)
<?/**
<br />
<?php $dateline_today = strtotime(date('Y-m-d',time())); $diff_time=$dateline_today+86400-time();?>
<font color="red">还剩余：</font>
<span id='hoursa'></span>小时
<span id='minua'></span>分
<span id='secoa'></span>秒恢复到原价360一年。
**/?>
<?php endif;?>
</li>
<li>
可以多次充值，使用时长和流量都会累加。
</li>
<li>
<font color="blue">根据大数据统计，一般人<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 * 1); ?>G一个月是足够用的。如果1个月不到就用完了，那再充<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 * 1); ?>G进去就马上可以用了。</font><font color="red">(一次性充值1年还可以尊享无限流量线路)</font>
</li>
</ol>
<?/**
<script type="text/javascript">
    var t=<?php echo $diff_time;?>;
    function fomtime()
    {
        t-=1;
	if(t<0){return true;}
	var h = Math.floor(t/3600);
	var m = Math.floor((t-h*3600)/60);
	var s = t-h*3600-m*60;
        document.getElementById('hoursa').innerHTML=h;
        document.getElementById('minua').innerHTML=m;
        document.getElementById('secoa').innerHTML=s;
        setTimeout("fomtime()",1000);
    }
    fomtime();
</script>
**/?>

<h4>用支付宝转账交易号进行充值</h4>
<ol>
<li><font color="red">注意：有时，支付宝会提示你“对方账户存在异常，谨防诈骗”，放心，可照常付款充值。</font><font color="blue">(毕竟，全国各地的人给我们转账付款，不异常才怪)。</font><font color="green">放心，可照常付款充值，我们收了你钱，就提供服务。</font></li>
<li>
向支付宝帐号：<?php echo ALIPAY_ACCOUNT; ?> (<?php echo ALIPAY_NAME; ?>) 转账，转账额度根据上面的价格表填写。
</li>
<li>如果使用手机支付宝，则可以可点击<a href="<?php echo ALIPAY_QR; ?>" target="_blank">此处显示支付宝二维码</a>，简单扫一扫转账付款。（<font color="red">方便！强烈推荐！</font>）
</li>
<li>
转账完成大约1分钟后，将交易号(订单号)填入下面的输入框里，点击“立即充值”，即可到帐。
</li>
<?/**
<li>
如果你在转账备注中填写了登录邮箱，那么可以一分钟左右自动充值到账户，免输入一长串交易号。
</li>
**/?>
<li>
如果出现问题，请联系<?php echo SUPPORT_METHOD; ?>：<?php echo SUPPORT_CONTACT; ?> 。<?/**(如果填错了登录邮箱，就填交易号到下面充值)**/?>
</li>

</ol>

		<form action="" method="post" class="login form-horizontal">

			<div class="form-group">
			    <label for="id_login" class="col-sm-2 control-label">转账交易号:</label>
			    <div class="col-sm-10 col-md-6">
			      <input autofocus="autofocus" class="form-control" name="form_code" value="<?php echo $form_tradeNo;?>" placeholder="一串长数字" type="text" />
				<?php if(!empty($form_error['form_code'])):?>
				<span class="item-error">
					<?php echo $form_error['form_code'];?>
				</span>
				<?php endif;?>

			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button class="primaryAction btn btn-default btn-primary" type="submit">立即充值</button>
			    </div>

			  </div>


		</form>

<h4>什么是交易号(订单号)</h4>
<ol>
<li>手机端转账完成后，点击"我的“--”账单“--”详情“--"创建时间"下方的“<b>订单号</b>”就是交易号(<b>不是商户订单号</b>)。</li>
<li>
若是电脑端转账完成后，如图1，点击“详情”，如图2，黄色的部分是“交易号”
</li>
<li>
【图1】：
<br />
<img src="/static/image/ali_2.jpg" />
<br />
【图2】：
<br />
<img src="/static/image/ali_3.jpg" />
</li>

</ol>
</div>


<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
