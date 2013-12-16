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
<h3>build/target/product/full_base.mk</h3>
<p>
这是一份为源代码开源部分的所有功能的编译配置<br/>
它是专为模拟器设置的一份编译配置，对与设备来说不怎么适合继承<br/>
但是所有的设置都可以被继承产品给覆盖<br/>
它继承了<br/>
&nbsp;&nbsp;&nbsp;frameworks/base/data/sounds/AllAudio.mk<br/>
&nbsp;&nbsp;&nbsp;external/svox/pico/lang/all_pico_languages.mk<br/>
&nbsp;&nbsp;&nbsp;build/target/product/locales_full.mk<br/>
&nbsp;&nbsp;&nbsp;build/target/product/generic_no_telephony.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libfwdlockengine&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;VideoEditor&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;WAPPushManager&nbsp;<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_core&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_osal&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_videofilters&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditorplayer&nbsp;<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Galaxy4&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;HoloSpiralWallpaper&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LiveWallpapers&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LiveWallpapersPicker&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;MagicSmokeWallpapers&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;NoiseField&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PhaseBeam&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;VisualizationWallpapers&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PhotoTable<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
PRODUCT_PROPERTY_OVERRIDES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.com.android.dateformat=MM-dd-yyyy&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
<p>
PRODUCT_LOCALES&nbsp;:=&nbsp;en_US&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
