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
<h3>build/target/product/full_x86.mk</h3>
<p>
这是一份为源代码开源部分的所有功能的编译配置&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;它是专为模拟器设置的一份编译配置，对与设备来说不怎么适合继承.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;它运行于模拟器上或者其它有LAN连接的设备上.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;这将指引init.rc开启network连接，所以你可以使用adb连接<br/>
&nbsp;&nbsp;&nbsp;&nbsp;继承自：<br/>
build/target/product/full_base_telephony.mk<br/>
build/board/generic_x86/device.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
ifdef&nbsp;NET_ETH0_STARTONBOOT<br/>
&nbsp;&nbsp;PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;net.eth0.startonboot=1<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
Ensure&nbsp;we&nbsp;package&nbsp;the&nbsp;BIOS&nbsp;files&nbsp;too.<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;bios.bin&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;vgabios-cirrus.bin&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;full_x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic_x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;Android<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MODEL">PRODUCT_MODEL</a></h3>
<p>
PRODUCT_MODEL&nbsp;:=&nbsp;Full&nbsp;Android&nbsp;on&nbsp;x86&nbsp;Emulator<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
