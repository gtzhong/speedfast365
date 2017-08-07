<?php
$member = $this->member;

//_print_r($member);

?>
<div style="margin:20px auto;">
<form method="GET" action="">
	email:<input type="text" value="" name="email" />
	port:<input type="text" value="" name="port"/>
	recharge_id:<input type="text" value="" name="recharge_id"/>
	<input type="submit" value="checkout" />
</form>
</div>

<?php if(!empty($member)):?>
<table border="1">
	<tr>
		<td>email</td>
		<td><?php echo $member['email'];?></td>
		<td>register time</td>
		<td><?php echo date('Y-m-d H:i:s',$member['register_time']);?></td>
	<tr>
	<tr>
		<td>ss_user_id</td>
		<td><?php echo $member['ss_user_id'];?></td>
		<td>inviter_id</td>

		<td><?php echo $member['inviter_id'];?></td>
	<tr>
	<tr>
		<td>union_member_id</td>
		<td><?php echo $member['union_member_id'];?></td>
		<td>union_thread_id</td>

		<td><?php echo $member['union_thread_id'];?></td>
	<tr>
	<?php if(!empty($member['ss_data'])):?>
	<tr>
		<td>ss_data</td>
		<td></td>
		<td></td>

		<td></td>
	<tr>
	<tr>
		<td>Port</td>
		<td><?php echo $member['ss_data']['port'];?></td>
		<td>enable</td>

		<td><?php echo $member['ss_data']['enable'];?></td>
	<tr>
	<tr>
		<td>expire_dateline</td>
		<td><?php echo date('Y-m-d H:i:s',$member['ss_data']['expire_dateline']);?></td>
		<td>member_level</td>

		<td><?php echo $member['ss_data']['member_level'];?></td>
	<tr>
	<tr>
		<td>transfer_enable</td>
		<td><?php echo $member['ss_data']['transfer_enable'] / 1024 / 1024 /1024;?> GB</td>
		<td>passwd</td>

		<td><?php echo $member['ss_data']['passwd'];?></td>
	<tr>
	<tr>
		<td>transfer up</td>
		<td><?php echo $member['ss_data']['u'] / 1024 / 1024;?> MB</td>
		<td></td>

		<td></td>
	<tr>
	<tr>
		<td>transfer down</td>
		<td><?php echo $member['ss_data']['d'] / 1024 / 1024;?> MB</td>
		<td></td>

		<td></td>
	<tr>
	<tr>
		<td>divice_win</td>
		<td><?php echo date('Y-m-d H:i:s',$this->divice_win_lasttime); ?></td>
		<td></td>

		<td></td>
	<tr>


	<?php endif;?>
</table>
<?php else:?>

member is not exist

<?php endif;?>
