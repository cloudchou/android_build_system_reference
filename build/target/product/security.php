<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../../header.php';?> 
<div id="content">

<div class="file">
<h3>build/target/product/security.mk</h3>
<p>
存放所有签名用的公钥和私钥对<br/>
cm签名密钥：cm.x509.pem<br/>
media签名密钥：&nbsp;media.pk8&nbsp;media.x509.pem<br/>
&nbsp;a&nbsp;test&nbsp;key&nbsp;for&nbsp;packages&nbsp;that&nbsp;are&nbsp;part&nbsp;of&nbsp;the&nbsp;media/download&nbsp;system.<br/>
platform签名密钥：&nbsp;platform.pk8&nbsp;platform.x509.pem<br/>
a&nbsp;test&nbsp;key&nbsp;for&nbsp;packages&nbsp;that&nbsp;are&nbsp;part&nbsp;of&nbsp;the&nbsp;core&nbsp;platform.<br/>
shared签名密钥：&nbsp;shared.pk8&nbsp;shared.x509.pem<br/>
a&nbsp;test&nbsp;key&nbsp;for&nbsp;things&nbsp;that&nbsp;are&nbsp;shared&nbsp;in&nbsp;the&nbsp;home/contacts&nbsp;process.<br/>
superuser签名密钥：&nbsp;superuser.pk8&nbsp;superuser.x509.pem&nbsp;<br/>
testkey签名密钥：&nbsp;testkey.pk8&nbsp;testkey.x509.pem&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;a&nbsp;generic&nbsp;key&nbsp;for&nbsp;packages&nbsp;that&nbsp;do&nbsp;not&nbsp;otherwise&nbsp;specify&nbsp;a&nbsp;key.<br/>
test&nbsp;key&nbsp;用于开发&nbsp;，不要认为它表示某种有效性。<br/>
如果设置了BUILD_SECURE为true,&nbsp;代码在任何上下文中都不需要管这些密钥.<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
