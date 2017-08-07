
<h4>Windows上Shadowsocks图文使用说明教程</h4>
<ol>

<li>如果你觉得下面的图文说明太复杂或麻烦，那就请点击这里：<a href="/support/help/?type=windows_fast">懒人版客户端图文说明</a></li>

<li>
下载Shadowsocks客户端<a href="/static/dl/Shadowsocks-3.3.2.best.zip" target="_blank">点击这里</a>，解压后（如图），右键点击“管理员方式运行”。
<br />
	<img src="/static/image/m_1.png" />

<br />
如果提示“需要安装.NET Framework”，则请在 <a href="https://www.microsoft.com/zh-CN/download/details.aspx?id=49982" target="_blank">https://www.microsoft.com/zh-CN/download/details.aspx?id=49982</a> 下载并安装(<a target="_blank" href="/static/dl/net.framework.4.6.1.exe">点击此处本地高速下载</a>)。
<br />
Shadowsocks 会自动最小化至屏幕右下角通知区域。(如果发生闪退，请<a href="/static/dl/Shadowsocks-win-2.5.6.best.zip" target="_blank">下载经典稳定版客户端</a>重试)
<br />
现在，我们需要找到Shadowsocks 图标，它是一个灰色的纸飞机：
<br />
	<img src="/static/image/m_2.png" />
</li>

</ol>



<h4>方法一：扫码配置(新手)</h4>
<ol>
<li>点击网站右上角个人中心。</li>
<li>在服务器列表中选择你想要用服务器，点击相应的&nbsp;<img src="/static/image/qr.png" />&nbsp;二维码图标。</li>
<li>打开了显示该服务器二维码的页面。</span></li>
<li>右击shadowsocks纸飞机图标，如下图，选择"扫描屏幕上的二维码"，然后扫码成功点击确定就成功添加了一条线路。</li>
<li><img src="/static/image/pc_1.png" /></li>

<li>如上图打勾，然后尝试打开 google twitter facebook 试试。</li>
<li>如果有问题，请先参考本页最下方的“常见问题”。</li>
</ol>

<h4>方法二：手动配置(高级)</h4>
<ol>
<li>
右击shadowsock客户端图标，选择“服务器”-“编辑服务器”，将这几个部分连接信息填入：(在网站个人中心，充值后就能显示出您的连接端口、密码)
<br />
<b>服务器IP</b>：网站个人中心“可用服务器列表”中任选一个"服务器IP"填入
<br />
<b>服务器端口</b> ：删掉默认的8388，改填入网站个人中心"配置信息"中分配的"服务器端口" （不同的账号的端口也都是不同的）
<br />
<b>密码</b>：网站个人中心"配置信息"中的SS密码
<br />
<b>加密</b>：选择 aes-256-cfb
<br />
<b>代理端口</b>：保持默认的1080
<br />
<b>一次性认证</b>：支持
<br />
	<img src="/static/image/m_3.png" width="480" />

</li>
<li>
点击 确定 保存，成功后会在桌面右下方显示 Shadowsocks logo 的图标，
然后，右键单击 Shadowsocks图标，然后选择勾上“开机启动”和“启用系统代理”，并且选择勾上 "系统代理模式"-"PAC模式"。
<br />
	<img src="/static/image/m_4.png" width="320" />
</li>
<li>
需要注意的是：仔细核对服务器IP、服务器端口、密码和加密，等上面其它配置信息。

配置好后请打开https://www.google.com测试下是否能够正常访问，如果无法访问请重新检查一次设置。
<br />
Facebook：https://www.facebook.com
<br />
维基百科：https://zh.wikipedia.org 
<br />
纽约时报中文网： http://cn.nytimes.com/
<br />
以上几个被墙网站也可打开试试，如果一个浏览器有问题（比如360浏览器），请多换换其它浏览器试试。
</li>
<li>
<b>常见问题</b>：
<br />
a、如果客户端闪退，请确认是否“管理员模式运行”了。
<br />
b、a方法若无效，换上一个版本的客户端，点击这里下载：<a href="/static/dl/Shadowsocks-win-2.5.6.best.zip" target="_blank">经典稳定版客户端</a>
<br />
c、如果是win10，在严格按照上面配置了几遍以后，也换了多个浏览器试过，还是有问题。请下载<a href="/static/dl/win10.bat" target="_blank">该配置文件</a>，右键点击它，管理员模式运行该配置文件修复网络。

<br />
d、如果，发现还有被墙网站打不开，请右键点击右下角纸飞机图标，选择"PAC--从GFWList更新本地PAC"，即可。
<br />
e、如果最新客户端出现很奇怪的问题，请换<a href="/static/dl/Shadowsocks-win-2.5.6.best.zip" target="_blank">经典稳定版客户端</a>。
</li>
<li>
<b>罕见问题</b>：
<br />
如果你能打开http开头的被墙网站，却打不开https开头的被墙网站，那可能是因为google的证书被国内的某些管家、卫士、杀毒软件禁用掉了。可以尝试卸载它们，换成卡巴斯基、麦咖啡、诺顿、微软MSE之类的国外杀毒软件，解决这个问题。
</li>
</ol>

