


<?php $type = !empty($_GET['type']) ? $_GET['type'] : '';?>

<?php if($type == 'windows'):?>
<div class="container">





<h1>
Windows客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-windows客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=windows" property="item" typeof="WebPage"><span property="name">Windows客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">



<?php include_once 'inc.colmenu.php';?>


<div class="col-md-7 middle">
    

<?php require APPLICATION_PATH . '/view/support/inc.introduce.php';?>
<?php /* require APPLICATION_PATH . '/view/support/inc.introduce.divice.php';*/?>

    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>



</div>
</div>

<?php elseif($type == 'windows_fast'):?>
<div class="container">





<h1>
Windows客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-windows客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=windows" property="item" typeof="WebPage"><span property="name">Windows客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">



<?php include_once 'inc.colmenu.php';?>


<div class="col-md-7 middle">
    

<?php  require APPLICATION_PATH . '/view/support/inc.introduce.divice.php';?>

    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>



</div>
</div>



<?php elseif($type == 'mac_fast'):?>

<div class="container">





<h1>
Mac客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-mac客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=mac" property="item" typeof="WebPage"><span property="name">Mac客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    

<h4>Shadowsocks手动配置(简单快速)图文教程</h4>
<ol>
<li>首先到：系统偏好设置---系统性与安全隐私--通用标签栏，如下图，将“允许从以下位置下载的应用”选为“Appstore和被认可的开发者”。
<li><img src="/static/pic_mac_help/4.png" /></li>
<li>点击这里：<a href="/static/dl/ShadowsocksX-NG.1.5.1.zip">ShadowsocksX-NG.1.5.1.zip</a>，下载客户端文件，如下图，一个名为ShadowsocksX-NG.1.5.1.zip的文件：</li>
<li><img src="/static/pic_mac_help/1.png" /></li>
<li>双击这个文件，自动解压出程序文件，名为ShadowsocksX-NG，如下图这样：</li>
<li><img src="/static/pic_mac_help/2.png" /></li>
<li>双击ShadowsocksX-NG，启动后，在上面任务栏，靠右边，会有小飞机图标。</li>

<li>然后，点击"<a href="/autoconfig/speedfast365_shadowsocks_config_mac.json" target="_blank">这里</a>"，如果提示登录，你就先登录，然后再回到这里来重试；如果出现空白页面，则说明你需要充值；如果出现一堆代码，就右键点击"<a href="/autoconfig/speedfast365_shadowsocks_config_mac.json" target="_blank">这里</a>"(注意是右键，mac触控板双指点击代表右键)，选择“链接储存为”，按提示保存文件，如下图，一个配置文件(这是你的私人配置文件，勿泄露)。</li>

<li><img src="/static/image/help_mac_fast/1.png" /></li>
<li>然后，点击右上角小飞机图标，鼠标滑到“服务器”，点击“导入服务器配置文件”，如下图：</li>
<li><img src="/static/image/help_mac_fast/2.png" /></li>
<li>弹出了文件选取框，如下图，选择刚才保存的“私人配置文件”，名字是speedfast365开头以json结尾的那个文件，然后点击打开</li>
<li><img src="/static/image/help_mac_fast/3.png" /></li>
<li>现在，点击小飞机图标，鼠标滑到“服务器-请选择线路”，选择一条线路，如下图中那样，选中后点击它</li>
<li><img src="/static/image/help_mac_fast/4.png" /></li>
<li>最后，点击小飞机，再点击“打开Shadowsocks”，如下图这样：（这是开关）</li>
<li><img src="/static/image/help_mac_fast/5.png" /></li>

<li>最后，点击小飞机图标，鼠标滑到“偏好设置”，点击“开机启动”，如下图：</li>
<li><img src="/static/pic_mac_help/10.png" /></li>
</ol>


<h4>常见问题：</h4>
<ol>
<li>如果不能打开facebook，请换一个浏览器试试；或者重启电脑；哪个浏览器不行，就重新安装那个浏览器。</li>
<li>请确保你的mac os版本不低于10.10，否则请升级系统。</li> 
</ol>

    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>



<?php elseif($type == 'mac'):?>

<div class="container">





<h1>
Mac客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-mac客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=mac" property="item" typeof="WebPage"><span property="name">Mac客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    

<h4>Shadowsocks手动配置(高级)图文教程</h4>
<ol>
<li>如果你觉得下面的图文说明太复杂或麻烦，那就请点击这里：<a href="/support/help/?type=mac_fast">简单快速导入配置教程</a></li>
<li>到：系统偏好设置---系统性与安全隐私--通用标签栏，如下图，将“允许从以下位置下载的应用”选为“Appstore和被认可的开发者”。
<li><img src="/static/pic_mac_help/4.png" /></li>
<li>点击这里：<a href="/static/dl/ShadowsocksX-NG.1.5.1.zip">ShadowsocksX-NG.1.5.1.zip</a>，下载客户端文件，如下图，一个名为ShadowsocksX-NG.1.5.1.zip的文件：</li>
<li><img src="/static/pic_mac_help/1.png" /></li>
<li>双击这个文件，自动解压出程序文件，名为ShadowsocksX-NG，如下图这样：</li>
<li><img src="/static/pic_mac_help/2.png" /></li>
<li>双击ShadowsocksX-NG，启动后，在上面任务栏，靠右边，找到小飞机图标，点击它，再点击“打开Shadowsocks”，如下图：</li>
<li><img src="/static/pic_mac_help/5.png" /></li>
<li>鼠标滑到“服务器---服务器设置”，点击“服务器设置”，如下图：</li>
<li><img src="/static/pic_mac_help/6.png" /></li>
<li>下面图为“服务器设置”部分，看见左下角的+号了吧，点击+号，</li>
<li><img src="/static/pic_mac_help/7.png" /></li>
<li>点击了+号后，出现了“新服务器”配置界面，如下图：
关键时刻到了，到<a href="/member/index" target="_blank">个人中心</a>，找到配置信息中的“服务器端口”、“SS密码”、"可用服务器列表"中选一个IP（例如-120.76.44.158），然后记下它们，然后，<br />
1）把IP填到下图中的“地址”栏，<br />
2）把“服务器端口”（5位数字）填到下图的“Port”栏，<br />
3）加密方式选择“aes-256-cfb”，<br />
4）把“SS密码”填到“密码”栏，<br />
5）备注随便填，<br />
6）“启用OTA”和“Enable over kcptun”留空。
</li>
<li><img src="/static/pic_mac_help/8.png" /></li>
<li>上图新服务器信息填完成后，点击“确定”，然后再点击小飞机图标，鼠标滑到“服务器”，会看到刚才添加的服务器，如下图
<br />
名字是“香港-主力（120.76.44.158:18020)” <br />然后鼠标点击它，就勾选上了。<br />
这样，重启浏览器后，就可以上google、twitter、facebook等网站了。(如果重启浏览器不行，就干脆重启电脑）<br />
说明：
这里是示例，我在备注里填了“香港-主力”，地址栏填了“120.76.44.158”，“Port”栏填了18020，这些是我的服务器配置信息，而你呢，端口和SS密码肯定和我的不一样，因为你填的是你自己<a href="/member/index" target="_blank">个人中心</a>里面的信息。
</li>
<li><img src="/static/pic_mac_help/9.png" /></li>
<li>最后，点击小飞机图标，鼠标滑到“偏好设置”，点击“开机启动”，如下图：</li>
<li><img src="/static/pic_mac_help/10.png" /></li>
</ol>


<h4>常见问题：</h4>
<ol>
<li>如果不能打开facebook，请换一个浏览器试试；或者重启电脑；哪个浏览器不行，就重新安装那个浏览器。</li>
<li>请确保你的mac os版本不低于10.10，否则请升级系统。</li> 
</ol>

    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>

<?php elseif($type == 'android'):?>

<div class="container">





<h1>
Android客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-Android客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=android" property="item" typeof="WebPage"><span property="name">Android客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    



<h4>图文说明-Android客户端影梭：</h4>
<ol>
<?php $url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/static/dl/shadowsocks-nightly-4.1.8.apk"; ?>
<li><b>市场上有很多android手机，这个教程是拿一个普通国产的android机做的示范，大部分android机配置界面都是差不多的。
</li>


<li>扫描下面的二维码(或者点击<a target="_blank" href="<?php echo $url; ?>">shadowsocks-nightly-4.1.8.apk</a>)，下载影梭apk文件，安装。
</li>
<li>

<img src="/qrcode/png?str=<?php echo urlencode($url); ?>" />

</li>
<li>启动影梭</li>
</ol>
<h4>扫码配置影梭（Shadowsocks）进行科学上网图文说明</h4>
<ol>
<li>打开影梭后，界面如下图，有一个大大的广告，我们把手指按上去，轻轻的往左一划，广告就删掉了。</li>
<li><img src="/static/image/android_4_1_8/1.png" width="320" /></li>
<li>然后，界面是这样的，挺干净，很简洁。
<br />
仔细看右上角有两个按钮，第一个里面有个+号的那个是我们要用到的。
</li>
<li><img src="/static/image/android_4_1_8/2.png" width="320" /></li>
<li>这里，我们点击右上角带+号的那个按钮，出现如下图所示，
<br />
然后我们点击“扫描二维码”
</li>
<li><img src="/static/image/android_4_1_8/3.png" width="320" /></li>
<li>出现二维码扫描器，然后到我们网站“<a href="/member/index" target="_blank">个人中心</a>”里的“可用服务器IP列表”中，选择一条线路（比如120.76.44.158），点击里面的<img src="/static/image/qr.png" />&nbsp;二维码图标，出现“私人二维码”页面（如果找不到，就直接点击<a href="/qrcode/normal?ip=120.76.44.158" target="_blank">这里</a>）。
<br />
然后对准你的“私人二维码”，扫码。</li>
<li><img src="/static/image/android_4_1_8/4.png" width="320" /></li>
<li>扫码成功后，出现一个新的线路配置，如下图所示。
<br />
注意，后面的18020，这是每个人的Port ID，都不一样的，你的肯定和这里不一样，不用担心。
</li>
<li><img src="/static/image/android_4_1_8/5.png" width="320" /></li>
<li>线路可以添加多条，这里又添加了1条，方法和前面一样。
<br />
点击上面的线路，它头部会变成绿色，这表示选中。
<br />
选中一条线路后，点击右下角的“圆圈小飞机”图标（这是开关）。
</li>
<li><img src="/static/image/android_4_1_8/6.png" width="320" /></li>
<li>点击“小飞机”图标开关后，如下图弹出网络请求消息，点击“确定”，开始启动科学上网服务。</li>
<li><img src="/static/image/android_4_1_8/7.png" width="320" /></li>
<li>“小飞机”开关开始变成橙色，表示正在启动。</li>
<li><img src="/static/image/android_4_1_8/8.png" width="320" /></li>
<li>“小飞机”开关变成绿色了，表示启动成功。
<br />
然后，你可以返回屏幕，影梭会在后台运行（注意不要关闭）。
</li>
<li><img src="/static/image/android_4_1_8/9.png" width="320" /></li>

<li>最后说明，前面这样，默认是全局模式，也就是上个任何网站用任何app通通经过我们的线路，这样不必要，比方用个淘宝，还经过我们线路绕一圈，这样肯定不必要。
<br />
那么我们把它改成智能模式，
<br />
点击“小飞机”开关，关闭它，然后点击其中一条线路的“铅笔”图标，进入手动修改。
</li>
<li><img src="/static/image/android_4_1_8/9.png" width="320" /></li>
<li>在“路由”项，点击它，选择“绕过局域网及中国大陆地址”，如下图所示，
<br />
然后，点击右上角的勾，就这样保存了线路。其它线路也是这么改的。
<br />
改完后，按前面的说明，打开开关就能科学上网，关闭就停止科学上网。是不是很简单。
</li>
<li><img src="/static/image/android_4_1_8/11.png" width="320" /></li>
<li>然后用浏览器打开google，成功了。<br />其它twitter、youtube、facebooke等app都可以用了^_^</li>
<li><img src="/static/image/android_4_1_8/10.png" width="320" /></li>
<li>后记：如果你的手机重启后，发现影梭没有启动翻墙服务，那就请打开影梭，点击“开关”，启动翻墙服务，然后回到主屏幕，让它后台运行。
<br />
*注：国内的行货android手机，都是被阉割掉了google play市场以及全套google服务，各品牌手机在原android系统的基础上有一定程度的修改，并且app市场很多个，不像iPhone那样统一规范。因此不保证所有安卓机都能完美运行该教程中的影梭app服务（偶尔断开了就重开一下影梭开关）。<br />
*所以呢，还是推荐国外来的水货Android，就因为它是原汁原味的Android，自带google play 及全套google服务，在大陆只需要配置好影梭就能体验全套Android服务了。
</li>
</ol>
</li>
</ol>



    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>


 <?php elseif($type == 'iphone'):?>

<div class="container">





<h1>
iPhone、iPad(iOS)客户端
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li><li id="breadcrumb-menu-support-帮助-iPhone(iOS)客户端" property="itemListElement" typeof="ListItem"><a href="/support/help/?type=iphone" property="item" typeof="WebPage"><span property="name">iPhone(iOS)客户端</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">

<?php include_once 'inc.colmenu.php';?>

<div class="col-md-7 middle">
    



<h4>iPhone配置Shadowsocks简单教程(Shadowrocket版)：</h4>
<ol>

<li>iPhone需要配合专用的app使用我们的线路，这里使用Shadowrocket这款app。到App Store中搜索Shadowrocket下载（该app是付费的，价格18元人民币，和本站没有利益关系，钱是软件作者收的，没办法，免费又好用的找不到。其它app和这个使用方法差不多，也可参考该教程）<br />
<font color="red">如果中国区搜不到Shadowrocket，就到美区找。美区的apple id你可以搜网上教程自己申请，也可以到某宝上购买（顺便代充值美金)，关键词“美区apple id”。</font><font color="blue">翻墙不容易，祝一切顺利！</font>
<br />
下载安装完成后，如下图：
</li>
<li><img src="/static/image/help_shadowrocket/1.jpg" /></li>
<li>
（本教程使用英文界面，中文界面请自行脑补翻译）<br />
打开软件后，左下角默认选中“Home”标签，必须选中“Home标签”。
<br />
然后，注意左上角，有一个扫码按钮，右上角有个+号按钮。<br />
这里不用+号按钮，这里需要用左上角的扫码按钮，进行扫码导入我们的线路。<br />
</li>
<li><img src="/static/image/help_shadowrocket/2.jpg" /></li>
<li>
我们需要的二维码在哪里呢？就在我们“<a href="/member/index" target="_blank">个人中心</a>”里面的“可用服务器IP列表”中，点击“可用服务器IP列表”中的&nbsp;<img src="/static/image/qr.png" />&nbsp;二维码小图标打开二维码页面（如果你找不到，就直接点<a href="/qrcode/normal?ip=120.76.44.158" target="_blank">这里</a>吧)
<br />
然后，点击软件左上角的扫码按钮（注意，一定要在Home标签页，其它标签页的会出错）。
<br />
打开扫码二维码，就像下面一样（别对着键盘，要对着二维码）
</li>
<li><img src="/static/image/help_shadowrocket/3.jpg" /></li>
<li>扫码成功后，会出现一条新的线路在软件列表中，如下图，120.76.44.158就是刚刚加入的线路(也许你的IP不一样，没关系，自己随意选）。
<br/ >
注意到线路前面的小点了吗？下面的英文告诉你，这个点代表当前选中的线路。
<br />
然后，把手指移到“Not Connected”开关这里，点击开关，打开。第一次打开开关会有是否允许增加VPN的提示，你允许即可。
</li>
<li><img src="/static/image/help_shadowrocket/4.jpg" /></li>
<li>现在，手机最上面任务栏已经出现vpn标记，已经成功了。你可以在手机上用google、twitter、youtube、facebook、tumblr等app和网站了</li>
<li><img src="/static/image/help_shadowrocket/5.jpg" /></li>
<li>只要打开那个“Connect”开关，无论你手机锁屏后多长时间唤醒、或者切换网络，vpn标记都会一直在，在背后默默为你服务，直到你打开app关闭它。
<br />
在该教程中，添加了一条线路，你可以添加多条线路，方法一样。
</li>
<li><img src="/static/image/help_shadowrocket/6.jpg" /></li>
<li>^_^ End</li>

</ol>
     
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>

<?php else:?>

<div class="container">





<h1>
帮助
</h1>

<ol class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<li id="breadcrumb-menu-home" property="itemListElement" typeof="ListItem"><a href="/" property="item" typeof="WebPage"><span property="name">首页</span></a></li><li id="breadcrumb-menu-support" property="itemListElement" typeof="ListItem"><a href="/support/" property="item" typeof="WebPage"><span property="name">支持</span></a></li><li id="breadcrumb-menu-support-帮助" property="itemListElement" typeof="ListItem"><a href="/support/help/" property="item" typeof="WebPage"><span property="name">帮助</span></a></li>
</ol>

</div>

<div class="container">
<div class="row">


<?php include_once 'inc.colmenu.php';?>


<div class="col-md-7 middle">
    



<ul>
<li><a href="/support/help/?type=windows">Windows客户端使用帮助</a></li>
<li><a href="/support/help/?type=mac">Mac客户端使用帮助</a></li>
<li><a href="/support/help/?type=android">Android客户端使用帮助</a></li>
<li><a href="/support/help/?type=iphone">iPhone客户端使用帮助</a></li>
</ul>
<p><span>通过路由使用shadowsocks的亲，请注意不要不小心忘记关闭迅雷BT等白白耗了许多流量。</span></p>



    
</div>

<div class="col-md-3 right">
    
    



<?php require APPLICATION_PATH . '/view/support/inc.panel.php';?>
    






</div>

</div>
</div>

<?php endif;?>
