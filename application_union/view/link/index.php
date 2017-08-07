
<?php


$_session_user = $this->_session_user;





$union_member = $this->union_member;

$union_member_id = $union_member['id'];


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
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>通用推广链接</h3>
                </div>

		<div class="panel-body">

			<p>
				<input type="text" style="width:98%;" value="http://108.61.186.155/?um=<?php echo $union_member_id; ?>" />
			</p>
			<p>或</p>

			<p>
				<input type="text" style="width:98%;" value=" http://45.79.96.118/?um=<?php echo $union_member_id; ?>" />
			</p>

		</div>


	

	</div>
 	<div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>通用推广二维码</h3>
                </div>

		<div class="panel-body">

				<?php $link_url = "http://108.61.186.155/?um=".$union_member_id;?>
			<table>
				<tr>
					<td>
					<img src="http://108.61.186.155/qrcode/png?str=<?php echo urlencode($link_url); ?>" />
					</td>
					<td>
						说明：您的私人推广二维码。将该二维码截图分享到网络上，他人手机扫该二维码进入产品站注册、充值，佣金自动记入您的帐户，与上面的推广链接效果一样。	
					</td>
				</tr>
			</table>
		</div>


	

	</div>
	<div class="panel panel-default" >

		<div class="panel-heading">
                 <h3 class="panel-title"><i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>简单说明</h3>
                </div>

		<div class="panel-body">

			<p>
				
				将类似下面这样的宣传内容发布到网络上（论坛、博客、日志、贴吧、问答社区、手机App等各种网络社区）。当用户点击您的“链接”进入我们的<a href="https://<?php echo DOMAIN_NAME_CN;?>/">产品网站</a>注册并且充值后，您即可获得10%的充值金额作为佣金(该用户自注册之日起，60天内的所有充值，都可以计算10%佣金到您账上)。当账户累计佣金达到100元后，可以永久升级到20%佣金！！
<?php if(!empty($union_member['commission_rate']) && $union_member['commission_rate'] > 10):?>
<br />
<font color="red">*您的级别佣金比率是20%*</font>
<?php endif;?>
			</p>

			<p>**举例一：</p>
			<p>
				<textarea style="width:98%;height:100px;"> 我现在用的是这家的科学上网加速服务，链接：http://108.61.186.155/?um=<?php echo $union_member_id; ?>  有香港、日本、美国多条100M线路，速度非常快，看油管1080p的视频都是分分钟秒开。而且支持手机、电脑、平板同时用，非常不错，推荐使用！</textarea>
			</p>
			<p>**举例二：</p>
			<p>
				<textarea style="width:98%;height:150px;"> Pinterest被禁了！！好气呀！！
啊啊啊要吐槽一下！Pinterest有什么不能看的！要被qiang！
作为一个设计师！Pinterest有多重要！！！好气啊！！！
国产哪个能用！花瓣那么辣鸡！！！
好怕那一天v叉叉叉p叉叉叉n用不了Pinterest就再也上不去了
推荐给你们lz一直用的，链接：http://108.61.186.155/?um=<?php echo $union_member_id; ?> 现在用着速度还不错</textarea>
			</p>
		</div>


	

	</div>



</div>



</div>
</div>
