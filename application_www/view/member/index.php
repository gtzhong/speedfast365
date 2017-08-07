<?php 
$member = $this->member;
$total_transfer = $this->total_transfer;
$total_traffic = $this->total_traffic;
$member_expire = $this->member_expire;
$ss_user = $this->ss_user;
$server_list = $this->server_list;
?>
<?php $form_error = $this->form_error;?>

<div class="container">





<h1>个人中心</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 个人中心 </li>
</ol>

</div>


<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

	<div class="col-md-7 middle">



   <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>您的流量状态及配置信息:</h3>
                </div>

		<div class="panel-body">

	<?php if(!empty($member['ss_user_id'])):?>


<?php /*****************************************/ ?>
			


	<div>

		<div>


			<form action="" method="post"  class="login form-horizontal">
			<?php if($total_traffic > 0):?>
			 <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">剩余流量：
				<?php echo "{$total_transfer['G']}GB {$total_transfer['M']}MB {$total_transfer['K']}KB";?>
				<?php /*&nbsp;&nbsp;&gt;<a href="/member/invite">邀请有奖</a>&lt;**/?>
			    </div>
			  </div>
			<?php else:?>

			  <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">剩余流量：
				<font color="red"><?php echo floor($total_traffic / 1024); echo "KB";?></font>
				<?php /*&nbsp;&nbsp;&gt;<a href="/member/invite">邀请有奖</a>&lt;**/?>
				<br />
			        (流量用完了！该<a href="/member/alipayrecharge" target="_blank">充值</a>了！充值后，时间会往后累计，流量累计增加。)	
			    </div>
			  </div>
			<?php endif;?>

			     <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">会员期限至：
			        <?php echo date('Y-m-d H:i:s',$member_expire);?>
				<?php if($ss_user['member_level']>0){echo '<font color="red">&nbsp;VIP</font>';} ?>
				<?php if(empty($ss_user['enable']) && $member_expire < time()){echo '<br />(<font color="red">已过期，系统已暂停您的连接，充值后约3分钟自动恢复!</font>)';}?>
			    </div>
			  </div>

			     <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">服务器端口：
			        <?php echo $ss_user['port'];?>
			        </div>
			     </div>


			    <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">加密方式：
			        aes-256-cfb
			        </div>
			     </div>
			</form>
		</div>

		<div>
			<form action="" method="post"  class="login form-horizontal">
			
				<input type="hidden" name="changesspwd" value="1" />

				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">SS密码:</label>
				<div class="col-sm-10 col-md-6">
				<input autofocus="autofocus" class="form-control" value="<?php echo $ss_user['passwd'];?>" name="form_pwd" placeholder="" type="text" />
				<?php if(!empty($form_error['form_pwd'])):?>
				<span class="item-error">
					<?php echo $form_error['form_pwd'];?>
				</span>
				<?php endif;?>

			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button class="primaryAction btn btn-default btn-primary" type="submit">修改</button>
			    </div>

			  </div>
		           <?php /* if(!empty($ss_user['benefit_201704_transfer_byte'])):?>
			   <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
				<font color="blue">好消息：我们于<?php echo date('Y年m月d日',$ss_user['benefit_201704_transfer_byte_dateline']);?>给您添加了<?php echo floor($ss_user['benefit_201704_transfer_byte']/1024/1024/1024); ?>G流量</font>
			    </div>

			   </div>
			   <?php endif;*/?>

			  </form>
		</div>
	</div>
	<?php else:?>
	<div>

			<form action="" method="post"  class="login form-horizontal">
			<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">剩余流量：
				<?php echo "0 GB 0 MB 0 KB";?>
				(<a href="/member/alipayrecharge">马上充值</a>)
				<?php /*<a href="/member/invite">邀请有奖</a>**/?>
			    </div>
			  </div>

			   <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">会员期限至：
				(<font>未充值激活，系统未分配连接!</font>)
			    </div>
			     </div>
			    <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">服务器端口：
			        (充值后系统立即自动分配)
			        </div>
			     </div>


			    <div class="form-group">
				<label for="id_login" class="col-sm-2 control-label"></label>
				<div class="col-sm-10 col-md-6">加密方式：
			        aes-256-cfb
			        </div>
			     </div>

			  </form>
	</div>
			<div>
			<form action="" method="post"  class="login form-horizontal">
			
				<div class="form-group">
				<label for="id_login" class="col-sm-2 control-label">SS密码:</label>
				<div class="col-sm-10 col-md-6">
				<input autofocus="autofocus" class="form-control" value="充值后可见密码"  placeholder="" type="text" />
				<?php if(!empty($form_error['form_pwd'])):?>
				<span class="item-error">
					<?php echo $form_error['form_pwd'];?>
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
	<?php endif;?>
	</div>

	</div>


  <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>可用服务器IP列表(建议多配置几个，方便随时切换):</h3>
                </div>

		<div class="panel-body">
			<div style="color:#009900;"><b>如何选择线路？</b><br />
			每一条线路都很快，任性选择。
			</div>

<table border="1" style="width:99%;">
	<tr>
		<td width="140">位置</td>
		<td width="110">&nbsp;服务器IP</td>
		<td><img src="/static/image/qr.png" /></td>
		<td>说明</td>
	</tr>
<?php if(!empty($server_list['normal'])):?>
<?php foreach($server_list['normal'] as $k=>$v):?>
	<tr>
		<td><?php echo $v['friendlyname'];?></td>
		<td><?php echo $v['ip_address'];?></td>
		<td><a href="/qrcode/normal?ip=<?php echo $v['ip_address'];?>" target="_blank"><img src="/static/image/qr.png" /></a></td>
		<td><?php echo $v['remark'];?></td>
	</tr>
<?php endforeach;?>
	<tr>
		<td><font color="blue">温馨提示：</font></td>	
		<td colspan="3"><font color="blue">手机、电脑都可以扫描上面相应的二维码快速配置</font>
			<br />(一键支持：Android影梭，及iPhone的Shadowrocket、Potatso、Surge等App）
		</td>	
	</tr>

<?php endif;?>



<?php if(!empty($server_list['vip'])):?>

	<tr>
		<td><font color="blue">&nbsp;</font></td>	
		<td colspan="3"><font color="red">以下VIP线路为年付会员额外专享，一次性充一年即可享受</font>
			<br />(现在年付<?php echo PRICE_Y; ?>，一年只要<?php echo floor(PRICE_Y / PRICE_M); ?>个月的钱，即可尊享VIP特权)
<?/**
<br />
<?php $dateline_today = strtotime(date('Y-m-d',time())); $diff_time=$dateline_today+86400-time();?>
(原价一年360，还剩余:
<span id='hoursa'></span>小时
<span id='minua'></span>分
<span id='secoa'></span>秒 恢复原价，<a href="/member/alipayrecharge">马上充值</a>)
<script type="text/javascript">
    var t=<?php echo $diff_time;?>;
    function fomtime()
    {
        t-=1;
	if(t<0){return true;}
	var h = Math.floor(t/3600);
	var m = Math.floor((t-h*3600)/60);
	var s = t-h*3600-m*60;
        document.getElementById('hoursa').innerHTML=h;
        document.getElementById('minua').innerHTML=m;
        document.getElementById('secoa').innerHTML=s;
        setTimeout("fomtime()",1000);
    }
    fomtime();
</script>
**/?>
		</td>	
	</tr>

<?php foreach($server_list['vip'] as $k=>$v):?>
	<tr>
		<td><?php echo $v['friendlyname'];?></td>
		<td><?php echo $v['ip_address'];?></td>
		<td><a href="/qrcode/normal?ip=<?php echo $v['ip_address'];?>" target="_blank"><img src="/static/image/qr.png" /></a></td>
		<td><?php echo $v['remark'];?></td>
	</tr>
<?php endforeach;?>
<?php endif;?>

<?php if(!empty($server_list['unlimit'])):?>

	<tr>
		<td><font color="blue">&nbsp;</font></td>	
		<td colspan="3"><font color="red">以下VIP线路<b>不限流量</b>！为年付会员额外专享，一次性充一年即可享受</font>
		</td>	
	</tr>

<?php foreach($server_list['unlimit'] as $k=>$v):?>
	<tr>
		<td><?php echo $v['friendlyname'];?></td>
		<td><?php echo $v['ip_address'];?></td>
		<td><a href="/qrcode/normal?ip=<?php echo $v['ip_address'];?>" target="_blank"><img src="/static/image/qr.png" /></a></td>
		<td><?php echo $v['remark'];?></td>
	</tr>
<?php endforeach;?>


<?php endif;?>


</table>

	</div>
	</div>
<?php /*
  <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>邀请有奖励</h3>
                </div>

		<div class="panel-body">
			将下面的邀请链接发给朋友，朋友注册充值后，你俩就能获得超级奖励：(<a href="/member/invite">详情</a>)
			<br />
			<?php $invite_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/?inviter=".urlencode($member['email']); ?>
			<input type="text" style="width:90%;" value="<?php echo $invite_url; ?>" />
		</div>

  </div>
**/?>

<?php  require APPLICATION_PATH . '/view/support/inc.introduce.divice.php';?>


	</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
