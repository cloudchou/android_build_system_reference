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
<h3>build/target/board/board.mk</h3>
<p>
Set&nbsp;up&nbsp;product-global&nbsp;definitions&nbsp;and&nbsp;include&nbsp;product-specific&nbsp;rules<br/>
定义了INSTALLED_BOOTLOADER_MODULE,INSTALLED_2NDBOOTLOADER_TARGET等变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_BOOTLOADER_MODULE">INSTALLED_BOOTLOADER_MODULE</a></h3>
<p>
ifneq&nbsp;($(strip&nbsp;$(TARGET_NO_BOOTLOADER)),true)<br/>
&nbsp;&nbsp;INSTALLED_BOOTLOADER_MODULE&nbsp;:=&nbsp;$(PRODUCT_OUT)/bootloader<br/>
&nbsp;&nbsp;ifeq&nbsp;($(strip&nbsp;$(TARGET_BOOTLOADER_IS_2ND)),true)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;INSTALLED_2NDBOOTLOADER_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/2ndbootloader<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;INSTALLED_2NDBOOTLOADER_TARGET&nbsp;:=<br/>
&nbsp;&nbsp;endif<br/>
else<br/>
&nbsp;&nbsp;INSTALLED_BOOTLOADER_MODULE&nbsp;:=<br/>
&nbsp;&nbsp;INSTALLED_2NDBOOTLOADER_TARGET&nbsp;:=<br/>
endif&nbsp;&nbsp;&nbsp;#&nbsp;TARGET_NO_BOOTLOADER<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_KERNEL_TARGET">INSTALLED_KERNEL_TARGET</a></h3>
<p>
ifneq&nbsp;($(strip&nbsp;$(TARGET_NO_KERNEL)),true)<br/>
&nbsp;&nbsp;INSTALLED_KERNEL_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/kernel<br/>
else<br/>
&nbsp;&nbsp;INSTALLED_KERNEL_TARGET&nbsp;:=<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_ANDROID_INFO_TXT_TARGET">INSTALLED_ANDROID_INFO_TXT_TARGET</a></h3>
<p>
INSTALLED_ANDROID_INFO_TXT_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/android-info.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="board_info_txt">board_info_txt</a></h3>
<p>
board_info_txt&nbsp;:=&nbsp;$(TARGET_BOARD_INFO_FILE)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifndef&nbsp;board_info_txt<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;board_info_txt&nbsp;:=&nbsp;$(wildcard&nbsp;$(TARGET_DEVICE_DIR)/board-info.txt)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(INSTALLED_ANDROID_INFO_TXT_TARGET):&nbsp;$(board_info_txt)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;build/tools/check_radio_versions.py&nbsp;$<&nbsp;$(BOARD_INFO_CHECK)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;pretty,"Generated:&nbsp;($@)")<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifdef&nbsp;board_info_txt<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;grep&nbsp;-v&nbsp;'#'&nbsp;$<&nbsp;>&nbsp;$@<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;echo&nbsp;"board=$(TARGET_BOOTLOADER_BOARD_NAME)"&nbsp;>&nbsp;$@<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
