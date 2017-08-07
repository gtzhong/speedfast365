<?php 
$member = $this->member;
$myfriends = $this->myfriends;
$myfriends_list = $this->myfriends_list;
?>
<?php $form_error = $this->form_error;?>

<div class="container">

<h1>我的奖励</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 个人中心 </li>
</ol>

</div>


<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

	<div class="col-md-7 middle">
	
		<h4>邀请朋友，得永久免费</h4>
<ol>
<li>
如果你成功邀请1个朋友注册，那么你朋友每次充值多少，都分别奖励你和你朋友<font color="red">20%</font>，长期有效。
</li>
<li>
你邀请的朋友，每次充值后，奖励都会立即到账。
</li>
<li>
比如你朋友充值了<?php echo PRICE_M; ?>元，那么你和你朋友就可以分别被奖励<?php  echo floor(31/5); ?>天时长+<?php echo floor(TRIFFIC_M / 1024 /1024 /1024 / 5);?>G流量。
<br />
比如你朋友充值了<?php echo PRICE_Y; ?>元，那么你和你朋友就可以分别被奖励<?php echo floor(31 * 12 / 5); ?>天+<?php echo /*floor(PRICE_Y / PRICE_M * TRIFFIC_M / 1024 /1024 /1024 /5);*/floor(TRIFFIC_M / 1024 /1024 /1024 / 5) * 12; ?>G流量。
</li>
<li>
假如你邀请了<font color="red">5个人</font>，那他们每次充值1个月就奖励你5个20%，那相当于你可以每月免费使用了。
</li>
<li>
上不封顶，邀请得越多，奖励得越多。
</li>
</ol>
		
		<h4>说明</h4>
		<ol>
		<li>
			告诉朋友，注册的时候，邀请人邮箱一栏填上你的登录邮箱即可。
		</li>
		<li>
			此后，你朋友每次充值多少，都分别奖励你和你朋友20%，长期有效。
		</li>
		<?php if(!empty($member)):?>
		<li>
		将这段话发给朋友：<font color="blue">我现在用这家的科学上网服务：https://<?php echo DOMAIN_NAME_CN;?>，手机电脑通用，体验非常不错！推荐你也来用，邀请人邮箱填写<?php echo $member['email']; ?>就可以每次充值额外赠送20%！</font>
		</li>
		<li>
		<b>或者直接将下面的邀请链接发给朋友，朋友注册时，邀请人一栏会自动填上你的email</b>：
		</li>
		<li>
		<?php $invite_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/?inviter=".urlencode($member['email']); ?>
		<input type="text" style="width:98%;" value="<?php echo $invite_url; ?>" />
		</li>
		<?php endif;?>
		</ol>

	<h4>我的奖励</h4>
		<ol>
		<table border="1" style="width:95%;">
		<tr><td width="110">奖励时间</td><td width="130">奖励流量</td><td width="100">奖励时长</td><td>奖励事项</td></tr>
		<?php if(!empty($myfriends)):?>
		<?php foreach($myfriends as $v):?>
		<tr>
			<td>
			<?php echo date('Y-m-d H:i',$v['dateline']); ?> 
			</td>
			<td>
			<?php echo bytes2human($v['bytes']);?>
			</td>
			<td>
			<?php $t = $v['expire_time'] / 86400; $t = number_format($t,2); echo trim($t,'0');?>天时长
			</td>
			<td>
			<?php 
			if($v['inviter_id'] == $member['id']){
				echo '我邀请的人充值了，我获得奖励';
			}
			elseif($v['be_invited_id'] == $member['id']){
				echo '我有邀请人，我每次可获得奖励';
			}
			?>
			</td>	
		</tr>
		<?php endforeach;?>
		<?php endif;?>
		</table>
		</ol>
	<h4>我邀请的朋友</h4>
		<ol>
		<table border="1" style="width:95%;">
		<tr><td width="200">邮箱</td><td>注册时间</td><td>目前状态</td>
		<?php if(!empty($myfriends_list)):?>
		<?php foreach($myfriends_list as $v):?>
		<tr>
		
			<td>
			<?php echo $v['email']; ?> 
			</td>
			<td width="130">
			<?php echo date('Y-m-d H:i:s',$v['register_time']);?>
			</td>
			<td>
			<?php if(!empty($v['ss_status'])){echo '正常';}else{echo '需要充值';}?>
			</td>
		
		</tr>
		<?php endforeach;?>
		<?php endif;?>
		</table>
		</ol>

	</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
