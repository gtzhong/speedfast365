<?php
$qrstring = $this->qrstring;
$ss_user = $this->ss_user;
?>
<div class="container">

<h1>个人中心</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li class="active"> 二维码 </li>
</ol>

</div>


<div class="container">
<div class="row">


<?php require APPLICATION_PATH . '/view/support/inc.colmenu.php';?>

	<div class="col-md-7 middle">

   <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>您的私人二维码:</h3>
                </div>

		<div class="panel-body">
		
			<div style="margin:10px;">
				服务器地址：<?php echo $_GET['ip']; ?>
			</div>

			<?php if(!empty($qrstring)):?>
			<img src="/qrcode/png?str=<?php echo urlencode($qrstring); ?>" />
			<?php else:?>
			<div style="margin:10px;">
			<font color="red">充值后就有二维码</font> 
			</div>
			<?php endif;?>

			<div style="margin:10px;">
				
				该二维码支持：Windows客户端、Mac客户端、Android影梭、iPhone的Shadowrocket和Potatso等App客户端
				
				<br />
				注：请勿重复扫描	
			</div>
		</div>
   </div>

   <div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>您的私人Surge配置URL:</h3>
                </div>

		<div class="panel-body">
		
			<div style="margin:10px;">
				服务器地址：<?php echo $_GET['ip']; ?>
			</div>

			<?php if(!empty($qrstring)):?>
		
			<div style="margin:10px;">
			<?php $url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/conf/surge?host=".urlencode($_GET['ip'])."&port=".urlencode($ss_user['port'])."&passwd=".urlencode($ss_user['passwd']).""; ?>
			<a href="<?php echo $url;?>" target="_blank"><?php echo $url; ?></a>
			</div>

			<?php else:?>
			<div style="margin:10px;">
			<font color="red">充值后就有配置URL</font>
			</div>
			<?php endif;?>

			<div style="margin:10px;">
			
				用Surge的朋友，将该URL填入Surge--Config--"Download Configuration from URL"即可生成配置。	
				<br />
				<font color="red">注意：如果升级到了iOS 10.0，Surge可能会出问题，需要卸载Surge重装，这是新出的iOS 10尚不完善的地方。</font>	
			</div>

		</div>
   </div>



	</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>
