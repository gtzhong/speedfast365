<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;

$list = $this->list;

?>

<div class="container">





<h1>申请提现</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 申请提现 </li>
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

				</form>

			</div>


			<div class="panel-body">

			    <form action="" method="post"  class="login form-horizontal">
			
				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">提现金额:</label>
				<div class="col-sm-10 col-md-6">
				<input autofocus="autofocus" class="form-control" value="" name="withdraw_amount"  placeholder="最低20元起可以提现" type="text" />

			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button class="primaryAction btn btn-default btn-primary" type="submit">提交申请</button>
			    </div>
			  </div>
				
			    </form>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
				注意：提现金额最低20元起，提现之前请确保个人设置中填写了正确的支付宝帐号、姓名和手机号。
			    </div>
			  </div>
				
			    </form>
			</div>


		

		</div>





		<div class="panel panel-default" >

			<div class="panel-heading">
			 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>提现记录</h3>
			</div>

			<div class="panel-body">

			<?php if(!empty($list)):?>
			<table border="1" style="width:99%;">
				<tr>
					<td width="150">&nbsp;时间</td>
					<td width="50">&nbsp;金额</td>
					<td width="80">&nbsp;状态</td>
					<td>&nbsp;备注</td>
				</tr>
				<?php foreach($list as $k=>$v):?>
				<tr>
					<td>&nbsp;<?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
					<td>&nbsp;<?php echo $v['amount'];?></td>
					<td>&nbsp;<?php echo empty($v['status']) ? '等待审核' : '成功';?></td>
					<td>&nbsp;<?php echo $v['alipay_trade_no'];?></td>
				</tr>
				<?php endforeach;?>
			</table>

				<?php $page = $this->page;?>
				<div>
					<a href="/withdraw/?page=<?php echo $page-1;?>">上一页</a>
					<a href="/withdraw/?page=<?php echo $page+1;?>">下一页</a>
				</div>

			<?php else:?>

			 
			
			<?php endif;?>
				



			</div>


			<div class="panel-body">

			    

			</div>


		

		</div>






	</div>


</div>



</div>
</div>
