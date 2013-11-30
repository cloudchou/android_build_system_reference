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
<h3>build/target/product/languages_small.mk</h3>
<p>
This&nbsp;is&nbsp;a&nbsp;build&nbsp;configuration&nbsp;that&nbsp;just&nbsp;contains&nbsp;a&nbsp;list&nbsp;of&nbsp;languages.<br/>
It&nbsp;helps&nbsp;in&nbsp;situations&nbsp;where&nbsp;laugnages&nbsp;must&nbsp;come&nbsp;first&nbsp;in&nbsp;the&nbsp;list,<br/>
mostly&nbsp;because&nbsp;screen&nbsp;densities&nbsp;interfere&nbsp;with&nbsp;the&nbsp;list&nbsp;of&nbsp;locales&nbsp;and<br/>
the&nbsp;system&nbsp;misbehaves&nbsp;when&nbsp;a&nbsp;density&nbsp;is&nbsp;the&nbsp;first&nbsp;locale.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">■ &nbsp;&nbsp;PRODUCT_LOCALES</a></h3>
<p>
This&nbsp;is&nbsp;the&nbsp;list&nbsp;of&nbsp;languages&nbsp;that&nbsp;originally&nbsp;shipped&nbsp;on&nbsp;ADP1&nbsp;&nbsp;<br/>
&nbsp;&nbsp;PRODUCT_LOCALES&nbsp;:=&nbsp;en_US&nbsp;en_GB&nbsp;fr_FR&nbsp;it_IT&nbsp;de_DE&nbsp;es_ES<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
