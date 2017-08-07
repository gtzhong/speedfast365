<?php $register_result = $this->register_result;?>
<?php $form_error = $this->form_error;?>

<script type="text/javascript" src="/static/js/BigInt.js"></script>
<script type="text/javascript" src="/static/js/Barrett.js"></script>
<script type="text/javascript" src="/static/js/RSA_Stripped.js"></script>

<script type="text/javascript" src="/static/js/jquery-1.5.1.min.js"></script>


<div class="container">





<h1>找回登录邮箱</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 找回登录邮箱 </li>
</ol>

</div>

<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

<div class="col-md-7 middle">
    

<p>请填入之前充值过的支付宝交易号（订单号）</p>

	<form action="" method="post" class="login form-horizontal">

		<div class="form-group">
		    <label for="id_login" class="col-sm-2 control-label">转账交易号:</label>
		    <div class="col-sm-10 col-md-6">
		      <input autofocus="autofocus" class="form-control" name="form_code" placeholder="一串长数字" type="text" />
			<?php if(!empty($form_error['form_code'])):?>
			<span class="item-error">
				<?php echo $form_error['form_code'];?>
			</span>
			<?php endif;?>

		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button class="primaryAction btn btn-default btn-primary" type="submit">查询帐号</button>
		    </div>

		  </div>

	</form>
   


	<h4>提示：</h4>
	<ol>
	<li>如果发现查询出来的email不对，那么一般是你注册的时候填错了。</li>
	</ol>

</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
