<?php $list = $this->list;?>
<?php $form_error = $this->form_error;?>

<script type="text/javascript" src="/static/js/BigInt.js"></script>
<script type="text/javascript" src="/static/js/Barrett.js"></script>
<script type="text/javascript" src="/static/js/RSA_Stripped.js"></script>

<script type="text/javascript" src="/static/js/jquery-1.5.1.min.js"></script>


<div class="container">





<h1>流量使用历史</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 流量使用历史 </li>
</ol>

</div>

<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

<div class="col-md-7 middle">

  <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>最近100天内流量使用历史记录</h3>
                </div>

		<div class="panel-body">

<?php if(!empty($list)):?>
<?php $t_page = 0;?>
<table border="1" style="width:99%;">
	<tr>
		<td width="150">统计时间</td>
		<td>下载流量</td>
		<td>上传流量</td>
		<td>总计</td>
	</tr>
	<?php foreach($list as $k=>$v):?>

	<tr>
		<td><?php echo date('Y-m-d H:i',$v['dateline']);?>分</td>
		<td><?php echo $this->show_count($v['byte_d']); ?></td>
		<td><?php echo $this->show_count($v['byte_u']); ?></td>
		<td><?php $t = $v['byte_u']+$v['byte_d']; echo $this->show_count($t); $t_page+=$t;?></td>
	</tr>
	<?php endforeach;?>

	<tr>
		<td></td>
		<td></td>
		<td><font color="red">本页流量总计：</font></td>
		<td><font color="red"><?php echo $this->show_count($t_page); ?></font></td>
	</tr>
</table>
<?php $page = $this->page;?>
	<div>
		<a href="/history?page=<?php echo $page-1;?>">上一页</a>
		<a href="/history?page=<?php echo $page+1;?>">下一页</a>
	</div>
<?php endif;?>

</div>
</div>


</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
