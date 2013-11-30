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
<h3>build/core/product_config.mk</h3>
<p>
产品配置相关变量定义<br/>
</p>
</div>
<div class="function">
<h3><a id="is-c-identifier">Function:&nbsp;&nbsp;is-c-identifier</a></h3>
<p>
判断是否是C标识符<br/>
&nbsp;$(1):要判断的单词<br/>
</p>
</div>
<div class="variable">
<h3><a id="SED_EXTENDED">SED_EXTENDED</a></h3>
<p>
加了扩展的sed命令&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="find-copy-subdir-files">Function:&nbsp;&nbsp;find-copy-subdir-files</a></h3>
<p>
List&nbsp;all&nbsp;of&nbsp;the&nbsp;files&nbsp;in&nbsp;a&nbsp;subdirectory&nbsp;in&nbsp;a&nbsp;format<br/>
suitable&nbsp;for&nbsp;PRODUCT_COPY_FILES&nbsp;and<br/>
PRODUCT_SDK_ADDON_COPY_FILES.<br/>
$(1):&nbsp;Glob&nbsp;to&nbsp;match&nbsp;file&nbsp;name<br/>
&nbsp;$(2):&nbsp;Source&nbsp;directory<br/>
&nbsp;$(3):&nbsp;Target&nbsp;base&nbsp;directory<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_VALID_VARIANTS">INTERNAL_VALID_VARIANTS</a></h3>
<p>
INTERNAL_VALID_VARIANTS&nbsp;:=&nbsp;user&nbsp;userdebug&nbsp;eng&nbsp;tests<br/>
These&nbsp;are&nbsp;the&nbsp;valid&nbsp;values&nbsp;of&nbsp;TARGET_BUILD_VARIANT.&nbsp;&nbsp;Also,&nbsp;if&nbsp;anything&nbsp;else&nbsp;is&nbsp;passed<br/>
as&nbsp;the&nbsp;variant&nbsp;in&nbsp;the&nbsp;PRODUCT-$TARGET_BUILD_PRODUCT-$TARGET_BUILD_VARIANT&nbsp;form,<br/>
it&nbsp;will&nbsp;be&nbsp;treated&nbsp;as&nbsp;a&nbsp;goal,&nbsp;and&nbsp;the&nbsp;eng&nbsp;variant&nbsp;will&nbsp;be&nbsp;used.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
<p>
Figure&nbsp;out&nbsp;which&nbsp;resoure&nbsp;configuration&nbsp;options&nbsp;to&nbsp;use&nbsp;for&nbsp;this<br/>
&nbsp;product.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_AAPT_CONFIG">PRODUCT_AAPT_CONFIG</a></h3>
<p>
用AAPT编译资源时的配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_AAPT_PREF_CONFIG">PRODUCT_AAPT_PREF_CONFIG</a></h3>
<p>
用AAPT编译资源时的配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
产品品牌<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MODEL">PRODUCT_MODEL</a></h3>
<p>
产品型号<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MANUFACTURER">PRODUCT_MANUFACTURER</a></h3>
<p>
产品制造商<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_AAPT_CHARACTERISTICS">TARGET_AAPT_CHARACTERISTICS</a></h3>
<p>
AAPT编译用的配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEFAULT_WIFI_CHANNELS">PRODUCT_DEFAULT_WIFI_CHANNELS</a></h3>
<p>
wifi频道<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEFAULT_DEV_CERTIFICATE">PRODUCT_DEFAULT_DEV_CERTIFICATE</a></h3>
<p>
产品开发用的密钥<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_COPY_FILES">PRODUCT_COPY_FILES</a></h3>
<p>
A&nbsp;list&nbsp;of&nbsp;words&nbsp;like&nbsp;<source&nbsp;path>:<destination&nbsp;path>[:<owner>].<br/>
The&nbsp;file&nbsp;at&nbsp;the&nbsp;source&nbsp;path&nbsp;should&nbsp;be&nbsp;copied&nbsp;to&nbsp;the&nbsp;destination&nbsp;path<br/>
when&nbsp;building&nbsp;&nbsp;this&nbsp;product.&nbsp;&nbsp;<destination&nbsp;path>&nbsp;is&nbsp;relative&nbsp;to<br/>
$(PRODUCT_OUT),&nbsp;so&nbsp;it&nbsp;should&nbsp;look&nbsp;like,&nbsp;e.g.,&nbsp;"system/etc/file.xml".<br/>
The&nbsp;rules&nbsp;for&nbsp;these&nbsp;copy&nbsp;steps&nbsp;are&nbsp;defined&nbsp;in&nbsp;build/core/Makefile.<br/>
The&nbsp;optional&nbsp;:<owner>&nbsp;is&nbsp;used&nbsp;to&nbsp;indicate&nbsp;the&nbsp;owner&nbsp;of&nbsp;a&nbsp;vendor&nbsp;file.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
A&nbsp;list&nbsp;of&nbsp;property&nbsp;assignments,&nbsp;like&nbsp;"key&nbsp;=&nbsp;value",&nbsp;with&nbsp;zero&nbsp;or&nbsp;more<br/>
whitespace&nbsp;characters&nbsp;on&nbsp;either&nbsp;side&nbsp;of&nbsp;the&nbsp;'='.&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEFAULT_PROPERTY_OVERRIDES">PRODUCT_DEFAULT_PROPERTY_OVERRIDES</a></h3>
<p>
A&nbsp;list&nbsp;of&nbsp;property&nbsp;assignments,&nbsp;like&nbsp;"key&nbsp;=&nbsp;value",&nbsp;with&nbsp;zero&nbsp;or&nbsp;more<br/>
whitespace&nbsp;characters&nbsp;on&nbsp;either&nbsp;side&nbsp;of&nbsp;the&nbsp;'='.<br/>
used&nbsp;for&nbsp;adding&nbsp;properties&nbsp;to&nbsp;default.prop<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BUILD_PROP_OVERRIDES">PRODUCT_BUILD_PROP_OVERRIDES</a></h3>
<p>
一些覆盖的属性&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGE_OVERLAYS">PRODUCT_PACKAGE_OVERLAYS</a></h3>
<p>
PRODUCT_PACKAGE_OVERLAYS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_PACKAGE_OVERLAYS))&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEVICE_PACKAGE_OVERLAYS">DEVICE_PACKAGE_OVERLAYS</a></h3>
<p>
DEVICE_PACKAGE_OVERLAYS&nbsp;:=&nbsp;\<br/>
$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).DEVICE_PACKAGE_OVERLAYS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_TAGS">PRODUCT_TAGS</a></h3>
<p>
An&nbsp;list&nbsp;of&nbsp;whitespace-separated&nbsp;words.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_VENDOR_KERNEL_HEADERS">PRODUCT_VENDOR_KERNEL_HEADERS</a></h3>
<p>
The&nbsp;list&nbsp;of&nbsp;product-specific&nbsp;kernel&nbsp;header&nbsp;dirs<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDITIONAL_BUILD_PROPERTIES">ADDITIONAL_BUILD_PROPERTIES</a></h3>
<p>
Add&nbsp;the&nbsp;product-defined&nbsp;properties&nbsp;to&nbsp;the&nbsp;build&nbsp;properties.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_OTA_PUBLIC_KEYS">PRODUCT_OTA_PUBLIC_KEYS</a></h3>
<p>
The&nbsp;OTA&nbsp;key(s)&nbsp;specified&nbsp;by&nbsp;the&nbsp;product&nbsp;config,&nbsp;if&nbsp;any.&nbsp;&nbsp;The&nbsp;names<br/>
of&nbsp;these&nbsp;keys&nbsp;are&nbsp;stored&nbsp;in&nbsp;the&nbsp;target-files&nbsp;zip&nbsp;so&nbsp;that&nbsp;post-build<br/>
signing&nbsp;tools&nbsp;can&nbsp;substitute&nbsp;them&nbsp;for&nbsp;the&nbsp;test&nbsp;key&nbsp;embedded&nbsp;by<br/>
default.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_EXTRA_RECOVERY_KEYS">PRODUCT_EXTRA_RECOVERY_KEYS</a></h3>
<p>
recovery&nbsp;key<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
