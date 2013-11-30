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
<h3>build/target/board/generic_mips.mk</h3>
<p>
The&nbsp;"generic_mips"&nbsp;product&nbsp;defines&nbsp;a&nbsp;MIPS&nbsp;based&nbsp;non-hardware-specific<br/>
target&nbsp;without&nbsp;a&nbsp;kernel&nbsp;or&nbsp;bootloader.<br/>
It&nbsp;can&nbsp;be&nbsp;used&nbsp;to&nbsp;build&nbsp;the&nbsp;entire&nbsp;user-level&nbsp;system,&nbsp;and<br/>
will&nbsp;work&nbsp;with&nbsp;the&nbsp;emulator,&nbsp;though&nbsp;sound&nbsp;will&nbsp;not&nbsp;work<br/>
(see&nbsp;the&nbsp;"emulator"&nbsp;product&nbsp;for&nbsp;that).<br/>
It&nbsp;is&nbsp;not&nbsp;a&nbsp;product&nbsp;"base&nbsp;class";&nbsp;no&nbsp;other&nbsp;products&nbsp;inherit<br/>
from&nbsp;it&nbsp;or&nbsp;use&nbsp;it&nbsp;in&nbsp;any&nbsp;way.<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
