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
<h3><a id="">Target:&nbsp;&nbsp;</a></h3>
<p>
﻿[[__thisfile]]<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;定义了INSTALLED_BOOTLOADER_MODULE,INSTALLED_2NDBOOTLOADER_TARGET等变量<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;定义了全局的product变量&nbsp;并且&nbsp;包含了&nbsp;product-specific的变量&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_BOOTLOADER_MODULE">INSTALLED_BOOTLOADER_MODULE</a></h3>
<p>
如果设备没有bootloader，则初始化INSTALLED_BOOTLOADER_MODULE为空<br/>
否则设置为$(PRODUCT_OUT)/bootloader<br/>
示例：out/target/product/i9100/bootloader<br/>
如果设备没有第二阶段的bootloader，则初始化TARGET_BOOTLOADER_IS_2ND为空<br/>
否则设置为&nbsp;$(PRODUCT_OUT)/2ndbootloader<br/>
示例：out/target/product/i9100/2ndbootloader&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_KERNEL_TARGET">INSTALLED_KERNEL_TARGET</a></h3>
<p>
如果设备没有kernel，则初始化INSTALLED_KERNEL_TARGET为&nbsp;$(PRODUCT_OUT)/kernel<br/>
否则设置INSTALLED_KERNEL_TARGET为空&nbsp;<br/>
示例：<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_ANDROID_INFO_TXT_TARGET">INSTALLED_ANDROID_INFO_TXT_TARGET</a></h3>
<p>
INSTALLED_ANDROID_INFO_TXT_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/android-info.txt<br/>
示例：out/target/product/i9100/android-info.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="board_info_txt">board_info_txt</a></h3>
<p>
board_info_txt&nbsp;:=&nbsp;$(TARGET_BOARD_INFO_FILE)<br/>
ifndef&nbsp;board_info_txt<br/>
board_info_txt&nbsp;:=&nbsp;$(wildcard&nbsp;$(TARGET_DEVICE_DIR)/board-info.txt)<br/>
endif<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;device/samsung/i9100/board-info.txt<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_ANDROID_INFO_TXT_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_ANDROID_INFO_TXT_TARGET)</a></h3>
<p>
用check_radio_versions.py脚本处理&nbsp;$(board_info_txt)得到android-info.txt<br/>
&nbsp;$(INSTALLED_ANDROID_INFO_TXT_TARGET):&nbsp;$(board_info_txt)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;build/tools/check_radio_versions.py&nbsp;$<&nbsp;$(BOARD_INFO_CHECK)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;pretty,"Generated:&nbsp;($@)")<br/>
&nbsp;ifdef&nbsp;board_info_txt<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;grep&nbsp;-v&nbsp;'#'&nbsp;$<&nbsp;>&nbsp;$@<br/>
&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;echo&nbsp;"board=$(TARGET_BOOTLOADER_BOARD_NAME)"&nbsp;>&nbsp;$@<br/>
&nbsp;endif<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
