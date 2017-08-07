
<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;



?>

<div class="container">





<h1>数据中心</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 数据中心 </li>
</ol>

</div>


<div class="container">
<div class="row">

	<?php require APPLICATION_PATH . '/view/inc.colmenu.php';?>





	<div class="col-md-7 middle">

	
		<div class="panel panel-default" >

			<div class="panel-heading">
			 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>实时数据</h3>
			</div>

			<div class="panel-body">

				<form action="" method="post"  class="login form-horizontal">
				 
				 <div class="form-group">
					<label for="id_login" class="col-sm-2 control-label"></label>
					<div class="col-sm-10 col-md-6">未提现佣金总额：
						<?php echo number_format($union_member['balance'],2);?>
				    </div>
				  </div>

			
				     <div class="form-group">
					<label for="id_login" class="col-sm-2 control-label"></label>
					<div class="col-sm-10 col-md-6">已经提现佣金总额：
						<?php echo number_format($union_member['balance_history'],2);?>
					</div>
				     </div>


				    <div class="form-group">
					<label for="id_login" class="col-sm-2 control-label"></label>
					<div class="col-sm-10 col-md-6">正在提现佣金总额：
						<?php echo number_format($union_member['balance_withdrawing'],2);?>
					</div>
				     </div>

					<div class="form-group">
					<label for="id_login" class="col-sm-2 control-label"></label>
					<div class="col-sm-10 col-md-6">
			      			<button class="primaryAction btn btn-default btn-primary" type="button" onclick="location.href='/withdraw/';">申请提现</button>
					</div>
				     </div>
				</form>



				</p>
			</div>


		

		</div>

	</div>


</div>



</div>
</div>
