
这是安装使用说明（可能有为完善之处，欢迎提建议mysql)


目录：
==============================================================================================
一、服务器环境
二、部署代码和导入数据库
三、设置域名和SSL
四、设置服务器与节点之间的通信
五、启动各节点的shadowsocks服务
六、设置中心服务器的crontab

正文：
==============================================================================================

一、服务器环境
1、ubuntu 16.04 ，ssd硬盘25G，内存1G，swap设置1G，（这里使用vultr的服务器，一个月5美元）；
2、MySQL 5.5.56 、PHP 5.5.38、Nginx (推荐用 https://lnmp.org/ 的1.4版本，一键安装）;
3、redis(到 https://lnmp.org/faq/addons.html 中找到redis一键安装说明）；

*vultr上添加swap可以参考这里：https://help.aliyun.com/knowledge_detail/42534.html 
*将php.ini中的error打开，disable_funcions中的exec、shell_exec全部开启；

*修改 /usr/local/nginx/conf/fastcgi.conf   注释掉这一行：fastcgi_param PHP_ADMIN_VALUE "open_basedir=$document_root/:/tmp/:/proc/";

*使用 iptables -F  清除所有端口限制，包括清除限制mysql外部连接；

4、重启lnmp 

二、部署代码和导入数据库

cd /
mkdir zdisk
cd /zdisk

git clone https://github.com/ShenYinjie/speedfast365.git

cd /zdisk/speedfast365

建立一个数据库，名字随你定，排序规则选“utf8_unicode_ci”，然后将 install/db.mysql 导入。

cp config.example.php config.php

vim config.php

根据config.php中的注释，配置好相关参数，如：mysql、支付宝等


三、设置域名和SSL

1、申请一个域名，然后解析到你的服务器IP，等解析生效（配置SSL必须解析生效，仅仅设置host是不行的）；
2、解析生效后，使用lnmp命令快速配置nginx：
命令如下：
lnmp vhost add
按照提示，设置网站域名、目录、伪静态类型和let's encrypt ssl证书，其中伪静态类别选择 wordpress 。（方法可以参考：https://lnmp.org/faq/lnmp-vhost-add-howto.html）
3、如果网站目录出现 .user.ini 文件，请使用 chattr -i .user.ini 命令，然后删除它后 重启lnmp。

四、设置服务器与节点之间的通信

中心服务器使用ssh进行统计各节点、各用户的流量，需要将服务器的ssh公钥传到各节点，以此避免输入ssh密码，否则无法自动统计流量。使用以下命令，配置公钥。

中心服务器生成key：

ssh-keygen -t rsa


将key传送到各节点：

ssh-copy-id -i ~/.ssh/id_rsa.pub root@节点IP

完成后，在中心服务器上，ssh就可以免密码登录各节点。（如此 crond/remote_manage.inc.php 就可以自动统计各节点的流量）

五、启动各节点的shadowsocks服务

https://github.com/ShenYinjie/shadowsocks_manyuser_speedfast365

进入上面的链接，按照说明安装各节点的shadowsocks，并配置好，启动。

六、设置中心服务器的crontab

(在进行该步骤之前，请确保网站已经可以正常访问、注册、充值，并且会员的线路可以自动开通）

将本项目更目录的crontab复盖 /etc/crontab   然后使用命令 /etc/init.d/cron reload  使crondtab立即生效 
