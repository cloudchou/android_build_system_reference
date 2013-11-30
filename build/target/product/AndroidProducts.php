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
<h3>build/target/product/AndroidProducts.mk</h3>
<p>
This&nbsp;file&nbsp;should&nbsp;set&nbsp;PRODUCT_MAKEFILES&nbsp;to&nbsp;a&nbsp;list&nbsp;of&nbsp;product&nbsp;makefiles<br/>
to&nbsp;expose&nbsp;to&nbsp;the&nbsp;build&nbsp;system.&nbsp;&nbsp;LOCAL_DIR&nbsp;will&nbsp;already&nbsp;be&nbsp;set&nbsp;to<br/>
the&nbsp;directory&nbsp;containing&nbsp;this&nbsp;file.<br/>
PRODUCT_MAKEFILES&nbsp;is&nbsp;set&nbsp;up&nbsp;in&nbsp;AndroidProducts.mks.<br/>
Format&nbsp;of&nbsp;PRODUCT_MAKEFILES:<br/>
<product_name>:<path_to_the_product_makefile><br/>
If&nbsp;the&nbsp;<product_name>&nbsp;is&nbsp;the&nbsp;same&nbsp;as&nbsp;the&nbsp;base&nbsp;file&nbsp;name&nbsp;(without&nbsp;dir<br/>
and&nbsp;the&nbsp;.mk&nbsp;suffix)&nbsp;of&nbsp;the&nbsp;product&nbsp;makefile,&nbsp;"<product_name>:"&nbsp;can&nbsp;be<br/>
omitted.<br/>
#&nbsp;This&nbsp;file&nbsp;may&nbsp;not&nbsp;rely&nbsp;on&nbsp;the&nbsp;value&nbsp;of&nbsp;any&nbsp;variable&nbsp;other&nbsp;than<br/>
LOCAL_DIR;&nbsp;do&nbsp;not&nbsp;use&nbsp;any&nbsp;conditionals,&nbsp;and&nbsp;do&nbsp;not&nbsp;look&nbsp;up&nbsp;the<br/>
value&nbsp;of&nbsp;any&nbsp;variable&nbsp;that&nbsp;isn't&nbsp;set&nbsp;in&nbsp;this&nbsp;file&nbsp;or&nbsp;in&nbsp;a&nbsp;file&nbsp;that<br/>
it&nbsp;includes.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MAKEFILES">■ &nbsp;&nbsp;PRODUCT_MAKEFILES</a></h3>
<p>
ifneq&nbsp;($(TARGET_BUILD_APPS),)<br/>
PRODUCT_MAKEFILES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full_x86.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full_mips.mk<br/>
else<br/>
PRODUCT_MAKEFILES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/core.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/generic.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/generic_x86.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/generic_mips.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full_x86.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full_mips.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/vbox_x86.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/sdk.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/sdk_x86.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/sdk_mips.mk&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/large_emu_hw.mk<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
