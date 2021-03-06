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
<h3>build/target/product/large_emu_hw.mk</h3>
<p>
这是一个为设备设置的通用配置，并且有大屏幕，但是并没有针对某个设备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;它包含了Android&nbsp;platform.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;继承自：<br/>
&nbsp;build/target/prodcut/core.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_POLICY">PRODUCT_POLICY</a></h3>
<p>
PRODUCT_POLICY&nbsp;:=&nbsp;android.policy_mid<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CarHome&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DeskClock&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Bluetooth&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Calculator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Calendar&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CertInstaller&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DrmProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Email2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Exchange2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Gallery2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LatinIME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Launcher2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Music&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Provision&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;QuickSearchBox&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Settings&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Sync&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Updater&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CalendarProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SyncProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;bluetooth-health&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;hostapd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;wpa_supplicant.conf<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;large_emu_hw<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;generic<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
