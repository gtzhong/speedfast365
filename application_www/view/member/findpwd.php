<?php $register_result = $this->register_result;?>
<?php $form_error = $this->form_error;?>

<script type="text/javascript" src="/static/js/BigInt.js"></script>
<script type="text/javascript" src="/static/js/Barrett.js"></script>
<script type="text/javascript" src="/static/js/RSA_Stripped.js"></script>

<script type="text/javascript" src="/static/js/jquery-1.5.1.min.js"></script>


<div class="container">





<h1>找回密码</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 找回密码 </li>
</ol>

</div>

<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

<div class="col-md-7 middle">
   
<script language="javascript">
function findpwd_getcode(){
	
	var form_email = jQuery("#form_email").val();

	jQuery("#btn_findpwd_getcode").attr("disabled","disabled");		
	jQuery("#msg_findpwd_a").html("稍等.....");		
	jQuery.post("/member/findpwd",{form_email:form_email,form_getcode:1},function(result){
		jQuery("#msg_findpwd_a").html(result);		
	});

}
</script>


<p>先填登录邮箱取得验证码，正确填入获取的验证码后，点击修改密码</p>

	<form action="" method="post" class="login form-horizontal">

		<div class="form-group">
		    <label for="id_login" class="col-sm-2 control-label">登录邮箱:</label>
		    <div class="col-sm-10 col-md-6">
		      <input autofocus="autofocus" class="form-control" id="form_email" name="form_email" placeholder="登录邮箱" type="email" />
			<span class="item-error" id="msg_findpwd_a"></span>
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button id="btn_findpwd_getcode" onclick="findpwd_getcode();"; class="primaryAction btn btn-default btn-primary" type="button">获取验证码</button>
		    </div>

		  </div>


		<div class="form-group">
		    <label for="id_login" class="col-sm-2 control-label">验证码:</label>
		    <div class="col-sm-10 col-md-6">
		      <input autofocus="autofocus" class="form-control" name="form_code" placeholder="4位数字" type="text" />
			<?php if(!empty($form_error['form_code'])):?>
			<span class="item-error">
				<?php echo $form_error['form_code'];?>
			</span>
			<?php endif;?>

		    </div>
		  </div>
		<div class="form-group">
		    <label for="id_login" class="col-sm-2 control-label">新密码:</label>
		    <div class="col-sm-10 col-md-6">
		      <input autofocus="autofocus" class="form-control" name="form_pwd" placeholder="密码长度需8到20位" type="password" />
			<?php if(!empty($form_error['form_pwd'])):?>
			<span class="item-error">
				<?php echo $form_error['form_pwd'];?>
			</span>
			<?php endif;?>

		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button class="primaryAction btn btn-default btn-primary" type="submit">修改密码</button>
		    </div>

		  </div>

	</form>
   


	<h4>提示：</h4>
	<ol>
	<li>如果有问题，请加技术售后QQ。</li>
	</ol>

</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
