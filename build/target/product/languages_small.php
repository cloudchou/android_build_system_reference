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
这是一份仅仅含有一系列语言的编译配置.<br/>
下述场景很有有用：<br/>
语言在列表里必须出现在第一个位置，<br/>
主要是因为screen&nbsp;densities继承自locale了表，<br/>
并且系统的density由第一个locale决定<br/>
这里支持所有语言和地区&nbsp;&nbsp;<br/>
这里的locale是在ADP1时支持的locale列表<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
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
