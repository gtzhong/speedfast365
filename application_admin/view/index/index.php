<?php
$lastest_alipay_list = $this->lastest_alipay_list;
$lastest_findpwd = $this->lastest_findpwd;

?>

<div>

<?php if(!empty($lastest_findpwd)):?>
<table border="1">
<?php foreach($lastest_findpwd as $k=>$v):?>
	<tr>
	<td><?php echo $v['email'];?></td>
	<td><?php echo $v['code'];?></td>
	<td><?php echo date('Y-m-d H:i:s',$v['dateline']);?></td>
	</tr>
<?php endforeach;?>
</table>
<?php endif;?>

</div>


<div>

<?php if(!empty($lastest_alipay_list)):?>

<table border="1">

<?php foreach($lastest_alipay_list as $k=>$v):?>
	<tr>
	<td><?php echo preg_replace('/^(\d+)\d{20}(\d{4})$/','\1***************\2',$v['trade_no']);?></td>
	<td><?php echo $v['status'];?></td>
	<td><?php echo $v['username'];?></td>
	<td><?php echo $v['amount'];?></td>
	<td><?php echo $v['check_code'];?></td>
	<td><?php echo $v['recharge_id'];?></td>
	<td><?php echo date('Y-m-d H:i:s',$v['recharge_time']);?></td>
	<td><?php if(!empty($v['member']['divice_win_lasttime'])){echo date('Y-m-d H:i:s',$v['member']['divice_win_lasttime']);}else{echo "--";}?></td>
	</tr>
<?php endforeach;?>

</table>

<?php endif;?>
</div>
