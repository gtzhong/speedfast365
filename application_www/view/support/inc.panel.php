
    
<div class="panel panel-default user-panel">
<div class="panel-body">

<span class="glyphicon glyphicon-cloud"></span>
请务必加<?php echo SUPPORT_METHOD; ?>：<?php echo SUPPORT_CONTACT; ?> (技术售后)
<br />

<?php 
global $redirect_ip;
if(!empty($redirect_ip)):?>
<span class="glyphicon glyphicon-cloud"></span>
本站备用网址(墙内长期可用)：
<br />
<?php foreach($redirect_ip as $v):?>
<span class="glyphicon glyphicon-cloud"></span>
<a href="http://<?php echo $v; ?>/" >http://<?php echo $v; ?>/</a>
<br />
<?php endforeach;?>
<?php endif;?>

<span class="glyphicon glyphicon-cloud"></span>
本站主网址(墙外才可打开)：
<br />
<span class="glyphicon glyphicon-cloud"></span>
<a href="https://<?php echo DOMAIN_NAME; ?>">https://<?php echo DOMAIN_NAME; ?></a>
<br />
</div>
</div>

