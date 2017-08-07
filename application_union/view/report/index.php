<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;

$union_member_id = $union_member['id'];

$list = $this->list;

?>

<div class="container">





<h1>佣金报表</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 佣金报表 </li>
</ol>

</div>


<div class="container">
<div class="row">

	<?php require APPLICATION_PATH . '/view/inc.colmenu.php';?>



	<div class="col-md-7 middle">


 	<div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>报表</h3>
                </div>

		<div class="panel-body">

			<?php if(!empty($list)):?>
			<table border="1" style="width:99%;">
				<tr>
					<td>&nbsp;时间</td>
					<td>&nbsp;成交额</td>
					<td>&nbsp;类型</td>
					<td>&nbsp;用户</td>
					<td>&nbsp;佣金比率</td>
					<td>&nbsp;佣金额</td>
				</tr>
				<?php foreach($list as $k=>$v):?>
				<tr>
					<td width="150">&nbsp;<?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
					<td width="80">&nbsp;<?php echo $v['top_up_amount'];?></td>
					<td width="50">&nbsp;充值</td>
					<td >&nbsp;<?php echo preg_replace('/^\w{4}(.+)/','***\1',$v['email'])?></td>
					<td width="70">&nbsp;<?php echo $v['commission_rate'];?>%</td>
					<td width="80">&nbsp;<?php echo $v['commission_amount'];?>元</td>
				</tr>
				<?php endforeach;?>
			</table>

				<?php $page = $this->page;?>
				<div>
					<a href="/report/?page=<?php echo $page-1;?>">上一页</a>
					<a href="/report/?page=<?php echo $page+1;?>">下一页</a>
				</div>

			<?php else:?>

			 
			
			<?php endif;?>

			
		</div>


	

	</div>


</div>



</div>
</div>
