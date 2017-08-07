<div class="container">

<script type="text/javascript" src="/static/js/BigInt.js"></script>
<script type="text/javascript" src="/static/js/Barrett.js"></script>
<script type="text/javascript" src="/static/js/RSA_Stripped.js"></script>

<script type="text/javascript" src="/static/js/jquery-1.5.1.min.js"></script>

<script language="javascript">

function rsa_pwd(content){
    //十六进制公钥 
    var rsa_n = "FC738FEE89A6D2478D3C319B3C11BF6DDC1AF1BD41261B5B3A927BD06748846B3474508BA895C1656772564344AE8004ED46389FEB9AE43E5E9FF92EFF2AE3A954BFB9FEED68E1BBE8BA46245DFD158C3B7BD6820597610F055BDFF1DAD59D799D6E5BD677A2D2F32B514AAF1D3D0BBE39D67ECA3421C3021B088DDD2CE2B387";
    setMaxDigits(131); //131 => n的十六进制位数/2+3 
    var key = new RSAKeyPair("10001", '', rsa_n); //10001 => e的十六进制 
    content_rsa = encryptedString(key, content); //不支持汉字 
    return content_rsa;
}


function login_submit(){

	var pwd1 = jQuery("#id_password1").val();
	
	var new_pwd1 = rsa_pwd(pwd1);

	jQuery("#id_password1").val(new_pwd1);

	var pwd2 = jQuery("#id_password2").val();
	
	var new_pwd2 = rsa_pwd(pwd2);

	jQuery("#id_password2").val(new_pwd2);

	var pwd3 = jQuery("#id_password3").val();
	
	var new_pwd3 = rsa_pwd(pwd3);

	jQuery("#id_password3").val(new_pwd3);

	return true;
}

</script>



<h1>个人中心</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 修改密码 </li>
</ol>

</div>


<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>


	<div class="col-md-7 middle">




		<?php $form_error = $this->form_error;?>
		<div class="reg_cont">
			<!--
			<form  class="login form-horizontal" action="" method="post" onsubmit="return login_submit();">
			-->
			<form  class="login form-horizontal" action="" method="post">
				
				<div class="form-group">
				    <label for="id_password" class="col-sm-2 control-label">原密碼:</label>
				    <div class="col-sm-10 col-md-6">
				      <input class="form-control" id="id_password1" name="form_password1" placeholder="密码长度8~20位,字母区分大小写" type="password" />
				      
								<?php if(!empty($form_error['form_password1'])):?>
								<span class="item-error">
									<?php echo $form_error['form_password1'];?>
								</span>
								<?php endif;?>
				    </div>
				  </div>



				<div class="form-group">
				    <label for="id_password" class="col-sm-2 control-label">新密碼:</label>
				    <div class="col-sm-10 col-md-6">
				      <input class="form-control" id="id_password2" name="form_password2" placeholder="密码长度8~20位,字母区分大小写" type="password" />
				      
								<?php if(!empty($form_error['form_password2'])):?>
								<span class="item-error">
									<?php echo $form_error['form_password2'];?>
								</span>
								<?php endif;?>
				    </div>
				  </div>



				<div class="form-group">
				    <label for="id_password" class="col-sm-2 control-label">新密碼:</label>
				    <div class="col-sm-10 col-md-6">
				      <input class="form-control" id="id_password3" name="form_password3" placeholder="再输入一次密码" type="password" />
				      
								<?php if(!empty($form_error['form_password3'])):?>
								<span class="item-error">
									<?php echo $form_error['form_password3'];?>
								</span>
								<?php endif;?>
				    </div>
				  </div>


				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button class="primaryAction btn btn-default btn-primary" type="submit">修改</button>
				    </div>
				  </div>


			</form>
		</div>


	</div>



<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>




</div>
</div>

