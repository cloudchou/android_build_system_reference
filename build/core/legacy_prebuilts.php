<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../header.php';?> 
<div id="content">

<div class="file">
<h3>build/core/legacy_prebuilts.mk</h3>
<p>
ALL_PREBUILT&nbsp;modules&nbsp;are&nbsp;hard&nbsp;to&nbsp;control&nbsp;and&nbsp;audit&nbsp;and&nbsp;we&nbsp;don't&nbsp;want&nbsp;&nbsp;to&nbsp;add&nbsp;any&nbsp;new&nbsp;such&nbsp;module&nbsp;in&nbsp;the&nbsp;system<br/>
</p>
</div>
<div class="variable">
<h3><a id="GRANDFATHERED_ALL_PREBUILT">■ &nbsp;&nbsp;GRANDFATHERED_ALL_PREBUILT</a></h3>
<p>
主要用途：在main.mk里用于过滤ALL_PEBUILT里的变量&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;GRANDFATHERED_ALL_PREBUILT&nbsp;:=&nbsp;\<br/>
&nbsp;akmd2&nbsp;\<br/>
&nbsp;am&nbsp;\<br/>
&nbsp;ap_gain.bin&nbsp;\<br/>
&nbsp;AVRCP.kl&nbsp;\<br/>
&nbsp;batch&nbsp;\<br/>
&nbsp;bitmap_size.txt&nbsp;\<br/>
&nbsp;bmgr&nbsp;\<br/>
&nbsp;bp.img&nbsp;\<br/>
&nbsp;brcm_guci_drv&nbsp;\<br/>
&nbsp;bypassfactory&nbsp;\<br/>
&nbsp;cdt.bin&nbsp;\<br/>
&nbsp;chat-ril&nbsp;\<br/>
&nbsp;content&nbsp;\<br/>
&nbsp;cpcap-key.kl&nbsp;\<br/>
&nbsp;data&nbsp;\<br/>
&nbsp;dbus.conf&nbsp;\<br/>
&nbsp;dev&nbsp;\<br/>
&nbsp;egl.cfg&nbsp;\<br/>
&nbsp;firmware_error.565&nbsp;\<br/>
&nbsp;firmware_install.565&nbsp;\<br/>
&nbsp;ftmipcd&nbsp;\<br/>
&nbsp;gps.conf&nbsp;\<br/>
&nbsp;gpsconfig.xml&nbsp;\<br/>
&nbsp;gps.stingray.so&nbsp;\<br/>
&nbsp;gralloc.omap3.so&nbsp;\<br/>
&nbsp;gralloc.tegra.so&nbsp;\<br/>
&nbsp;hosts&nbsp;\<br/>
&nbsp;hwcomposer.tegra.so&nbsp;\<br/>
&nbsp;ime&nbsp;\<br/>
&nbsp;init.goldfish.rc&nbsp;\<br/>
&nbsp;init.goldfish.sh&nbsp;\<br/>
&nbsp;init.olympus.rc&nbsp;\<br/>
&nbsp;init.rc&nbsp;\<br/>
&nbsp;init.sholes.rc&nbsp;\<br/>
&nbsp;init.stingray.rc&nbsp;\<br/>
&nbsp;input&nbsp;\<br/>
&nbsp;kernel&nbsp;\<br/>
&nbsp;lbl&nbsp;\<br/>
&nbsp;libEGL_POWERVR_SGX530_121.so&nbsp;\<br/>
&nbsp;libEGL_tegra.so&nbsp;\<br/>
&nbsp;libGLESv1_CM_POWERVR_SGX530_121.so&nbsp;\<br/>
&nbsp;libGLESv1_CM_tegra.so&nbsp;\<br/>
&nbsp;libGLESv2_POWERVR_SGX530_121.so&nbsp;\<br/>
&nbsp;libGLESv2_tegra.so&nbsp;\<br/>
&nbsp;libmoto_ril.so&nbsp;\<br/>
&nbsp;libpppd_plugin-ril.so&nbsp;\<br/>
&nbsp;libril_rds.so&nbsp;\<br/>
&nbsp;location&nbsp;\<br/>
&nbsp;location.cfg&nbsp;\<br/>
&nbsp;main.conf&nbsp;\<br/>
&nbsp;mbm.bin&nbsp;\<br/>
&nbsp;mbm_consumer.bin&nbsp;\<br/>
&nbsp;mdm_panicd&nbsp;\<br/>
&nbsp;monkey&nbsp;\<br/>
&nbsp;pm&nbsp;\<br/>
&nbsp;pppd-ril&nbsp;\<br/>
&nbsp;pppd-ril.options&nbsp;\<br/>
&nbsp;proc&nbsp;\<br/>
&nbsp;qwerty.kl&nbsp;\<br/>
&nbsp;radio.img&nbsp;\<br/>
&nbsp;rdl.bin&nbsp;\<br/>
&nbsp;RFFspeed_501.bmd&nbsp;\<br/>
&nbsp;RFFstd_501.bmd&nbsp;\<br/>
&nbsp;savebpver&nbsp;\<br/>
&nbsp;sbin&nbsp;\<br/>
&nbsp;sholes-keypad.kl&nbsp;\<br/>
&nbsp;suplcerts.bks&nbsp;\<br/>
&nbsp;svc&nbsp;\<br/>
&nbsp;sys&nbsp;\<br/>
&nbsp;system&nbsp;\<br/>
&nbsp;tcmd&nbsp;\<br/>
&nbsp;ueventd.goldfish.rc&nbsp;\<br/>
&nbsp;ueventd.olympus.rc&nbsp;\<br/>
&nbsp;ueventd.rc&nbsp;\<br/>
&nbsp;ueventd.stingray.rc&nbsp;\<br/>
&nbsp;vold.fstab&nbsp;\<br/>
&nbsp;wl1271.bin<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
