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
<h3>build/target/board/vbox_x86.mk</h3>
<p>
"vbox_x86"&nbsp;product&nbsp;定义了一个设备无关的目标&nbsp;用于在VirtualBox模拟器上运行<br/>
大多数Android设备都不可以用&nbsp;<br/>
用adb连接设个设备需要通过以太网。你可以用adb&nbsp;install&nbsp;来测试不需要网络，手机，声音的应用程序<br/>
这种模拟非常有用，因为virtualbox模拟器运行比qemu&nbsp;的模拟器(至少相对开启了kvm的qemu)&nbsp;快很多.<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
