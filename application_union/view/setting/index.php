<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;

?>

<div class="container">





<h1>个人信息设置</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 个人信息设置 </li>
</ol>

</div>


<div class="container">
<div class="row">

	<?php require APPLICATION_PATH . '/view/inc.colmenu.php';?>





	<div class="col-md-7 middle">

	
		<div class="panel panel-default" >

			<div class="panel-heading">
			 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>个人信息</h3>
			</div>

			<div class="panel-body">

			
			    <form action="" method="post"  class="login form-horizontal">

				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">支付宝账户：</label>
				<div class="col-sm-10 col-md-6">
					<input autofocus="autofocus" class="form-control" value="<?php echo htmlspecialchars($union_member['alipay_account']);?>" name="alipay_account"  placeholder="未填写" type="text" />
				</div>
				</div>

				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">支付宝姓名：</label>
				<div class="col-sm-10 col-md-6">
					<input autofocus="autofocus" class="form-control" value="<?php echo htmlspecialchars($union_member['alipay_name']);?>" name="alipay_name"  placeholder="未填写" type="text" />
				    </div>
				</div>

				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">联系手机号：</label>
				<div class="col-sm-10 col-md-6">
					<input autofocus="autofocus" class="form-control" value="<?php echo htmlspecialchars($union_member['phone_mobile']);?>" name="phone_mobile"  placeholder="未填写" type="text" />
				    </div>
				</div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button class="primaryAction btn btn-default btn-primary" type="submit">确定</button>
			    </div>
		            </form>


			</div>


		

		</div>




	</div>


</div>



</div>
</div>
