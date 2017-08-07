<?php
$_tpl_notice_msg = $this->_tpl_notice_msg;
$_tpl_notice_error = $this->_tpl_notice_error;
$_tpl_notice_url = $this->_tpl_notice_url;
?>
<div style="height:200px;text-align:center;"></div>
<div class="tpl_notice"i style="text-align:center;">
<?php if(!empty($_tpl_notice_msg)):?>
<?php echo $_tpl_notice_msg;?>
<?php elseif(!empty($_tpl_notice_error)):?>
<?php echo $_tpl_notice_error;?>
<?php endif;?>
<?php if(!empty($_tpl_notice_url)):?>
<p>系统将在<span id="jumpurl_timeout"></span>秒后跳转</p>
<script language="javascript">
var secs = 2; //倒计时的秒数 
var URL ; 
function Load(url){ 
URL =url; 
for(var i=secs;i>=0;i--) 
{ 
window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000); 
} 
} 
function doUpdate(num) 
{ 
document.getElementById('jumpurl_timeout').innerHTML = num;
if(num == 0) { window.location=URL; } 
}
Load('<?php echo $_tpl_notice_url;?>'); 
</script>
<?php endif;?>
</div>
<div style="height:200px;"></div>
