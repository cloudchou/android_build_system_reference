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
<h3>build/target/product/generic_no_telephony.mk</h3>
<p>
This&nbsp;is&nbsp;a&nbsp;generic&nbsp;phone&nbsp;product&nbsp;that&nbsp;isn't&nbsp;specialized&nbsp;for&nbsp;a&nbsp;specific&nbsp;device.<br/>
It&nbsp;includes&nbsp;the&nbsp;base&nbsp;Android&nbsp;platform.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_POLICY">PRODUCT_POLICY</a></h3>
<p>
PRODUCT_POLICY&nbsp;:=&nbsp;android.policy_phone<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_COPY_FILES">PRODUCT_COPY_FILES</a></h3>
<p>
PRODUCT_COPY_FILES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;frameworks/av/media/libeffects/data/audio_effects.conf:system/etc/audio_effects.conf<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.carrier=unknown<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DeskClock&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Bluetooth&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Calculator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Calendar&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CertInstaller&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DrmProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Email2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Exchange2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;FusedLocation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Gallery2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;InputDevices&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LatinIME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Launcher2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Music&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Provision&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Phone&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;QuickSearchBox&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Settings&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SystemUI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CalendarProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;bluetooth-health&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;hostapd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;wpa_supplicant.conf<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dhcpcd.conf&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;network&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;pand&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;pppd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;sdptool&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;wpa_supplicant<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;icu.dat<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;librs_jni<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio.primary.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio_policy.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;local_time.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;power.default&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;generic<br/>
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
PRODUCT_BRAND&nbsp;:=&nbsp;generic_no_telephony<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
