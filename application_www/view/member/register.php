<?php $register_result = $this->register_result;?>
<?php $form_error = $this->form_error;?>

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

	var pwd = jQuery("#id_password").val();
	
	var new_pwd = rsa_pwd(pwd);
	
	jQuery("#id_password").val(new_pwd);

	return true;
}

</script>

<div class="container">





<h1>注册</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 注册 </li>
</ol>

</div>

<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

<div class="col-md-7 middle">
    

<p>已经有账号了? <a href="/member/login" class="btn btn-default ">登录 &raquo;</a></p>
<p>请提供有效的Email地址。<!--(邀请人Email如果没有，则可以不填写)--></p>
<!--
<form class="login form-horizontal" method="post" action="" onsubmit="return login_submit();">
-->
<form class="login form-horizontal" method="post" action="">
  
  <div class="form-group">
    <label for="id_email" class="col-sm-3 control-label">E-mail:</label>
    <div class="col-sm-9 col-md-6">
      <input class="form-control" id="id_email" name="form_email" placeholder="E-mail地址" type="email" />
      				<?php if(!empty($form_error['form_email'])):?>
				<span class="item-error">
					<?php echo $form_error['form_email'];?>
				</span>
				<?php endif;?>
    </div>
  </div>
  <div class="form-group">
    <label for="id_password" class="col-sm-3 control-label">密碼:</label>
    <div class="col-sm-9 col-md-6">
      <input class="form-control" id="id_password" name="form_password" placeholder="密码长度需8到20位" type="password" />
      				<?php if(!empty($form_error['form_password'])):?>
				<span class="item-error">
					<?php echo $form_error['form_password'];?>
				</span>
				<?php endif;?>

    </div>
  </div>
<!--
  <div class="form-group">
    <label for="id_inviter_email" class="col-sm-3 control-label">邀请人Email:</label>
    <div class="col-sm-9 col-md-6">
      <input class="form-control" id="id_inviter_email" name="form_inviter_email" placeholder="如没有，则可以不填" <?php if(!empty($_COOKIE['inviter_email'])){echo 'value="'.urldecode($_COOKIE['inviter_email']).'"';} ?> type="email" />
      				<?php if(!empty($form_error['form_inviter_email'])):?>
				<span class="item-error">
					<?php echo $form_error['form_inviter_email'];?>
				</span>
				<?php endif;?>
    </div>
  </div>
--!>

<?php /**
    <div class="form-group">
    <label for="id_password1" class="col-sm-3 control-label">邀请人ID:</label>
    <div class="col-sm-9 col-md-6">
      <input class="form-control" id="id_password1" name="form_invite" placeholder="可留空" type="text" />
      				<?php if(!empty($form_error['form_invite'])):?>
				<span class="item-error">
					<?php echo $form_error['form_invite'];?>
				</span>
				<?php endif;?>

    </div>
  </div>
**/?>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-default btn-primary">注册 &raquo;</button>
    </div>
  </div>
</form>


    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>

