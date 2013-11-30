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
This&nbsp;is&nbsp;a&nbsp;build&nbsp;configuration&nbsp;for&nbsp;a&nbsp;full-featured&nbsp;build&nbsp;of&nbsp;the<br/>
Open-Source&nbsp;part&nbsp;of&nbsp;the&nbsp;tree.&nbsp;It's&nbsp;geared&nbsp;toward&nbsp;a&nbsp;US-centric<br/>
build&nbsp;quite&nbsp;specifically&nbsp;for&nbsp;the&nbsp;emulator,&nbsp;and&nbsp;might&nbsp;not&nbsp;be<br/>
entirely&nbsp;appropriate&nbsp;to&nbsp;inherit&nbsp;from&nbsp;for&nbsp;on-device&nbsp;configurations.<br/>
If&nbsp;running&nbsp;on&nbsp;an&nbsp;emulator&nbsp;or&nbsp;some&nbsp;other&nbsp;device&nbsp;that&nbsp;has&nbsp;a&nbsp;LAN&nbsp;connection<br/>
that&nbsp;isn't&nbsp;a&nbsp;wifi&nbsp;connection.&nbsp;This&nbsp;will&nbsp;instruct&nbsp;init.rc&nbsp;to&nbsp;enable&nbsp;the<br/>
network&nbsp;connection&nbsp;so&nbsp;that&nbsp;you&nbsp;can&nbsp;use&nbsp;it&nbsp;with&nbsp;ADB<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">■ &nbsp;&nbsp;PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
ifdef&nbsp;NET_ETH0_STARTONBOOT<br/>
&nbsp;&nbsp;PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;net.eth0.startonboot=1<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">■ &nbsp;&nbsp;PRODUCT_PACKAGES</a></h3>
<p>
Ensure&nbsp;we&nbsp;package&nbsp;the&nbsp;BIOS&nbsp;files&nbsp;too.<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;bios.bin&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;vgabios-cirrus.bin&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">■ &nbsp;&nbsp;PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;full_x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">■ &nbsp;&nbsp;PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic_x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">■ &nbsp;&nbsp;PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;Android<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MODEL">■ &nbsp;&nbsp;PRODUCT_MODEL</a></h3>
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
