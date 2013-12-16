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
<h3>build/target/board/generic_x86.mk</h3>
<p>
generic&nbsp;product定义了与设备无关的IA目标，没有kernel也没有bootloader,基于mips架构<br/>
它可以被用来生成整个用户层的系统，并且可以和IA版本的模拟器product一起工作，&nbsp;<br/>
虽然听起来不可能，可以看emulator.mk<br/>
它不是一个产品的基类，没有其它product从它继承<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
