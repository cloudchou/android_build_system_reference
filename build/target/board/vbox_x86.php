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

<div class="">
<h3><a id="">▶ &nbsp;&nbsp;</a></h3>
<p>
The&nbsp;"vbox_x86"&nbsp;product&nbsp;defines&nbsp;a&nbsp;non-hardware-specific&nbsp;target&nbsp;intended<br/>
to&nbsp;run&nbsp;on&nbsp;the&nbsp;VirtualBox&nbsp;emulator.<br/>
Most&nbsp;of&nbsp;the&nbsp;Android&nbsp;devices&nbsp;(networking,&nbsp;phones,&nbsp;sound,&nbsp;etc)&nbsp;do&nbsp;not&nbsp;work.<br/>
ADB&nbsp;via&nbsp;ethernet&nbsp;works&nbsp;with&nbsp;this&nbsp;target.&nbsp;You&nbsp;can&nbsp;use&nbsp;'adb&nbsp;install'&nbsp;to<br/>
test&nbsp;applications&nbsp;that&nbsp;do&nbsp;not&nbsp;require&nbsp;network,&nbsp;phone&nbsp;or&nbsp;sound&nbsp;support.<br/>
This&nbsp;emulation&nbsp;is&nbsp;useful&nbsp;because&nbsp;VirtualBox&nbsp;runs&nbsp;much&nbsp;faster&nbsp;then&nbsp;does&nbsp;the<br/>
QEMU&nbsp;emulators&nbsp;(at&nbsp;least&nbsp;until&nbsp;a&nbsp;KVM&nbsp;enabled&nbsp;QEMU&nbsp;emulator&nbsp;is&nbsp;available).<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
