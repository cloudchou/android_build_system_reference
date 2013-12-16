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
本文件将设置PRODUCT_MAKEFILES变量为给编译系统用的makefiles文件列表，<br/>
LOCAL_DIR已经在包含本文件的makefile里设置好了<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_MAKEFILES&nbsp;is&nbsp;set&nbsp;up&nbsp;in&nbsp;AndroidProducts.mks.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_MAKEFILES的规则:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;<product_name>:<path_to_the_product_makefile><br/>
&nbsp;&nbsp;&nbsp;&nbsp;如果<product_name>和product&nbsp;makefile文件的名字一样(除去目录和后缀)，那么<product_name>可以被省略<br/>
&nbsp;&nbsp;&nbsp;&nbsp;本文件最好不要依赖出去LOCAL_DIR的任何其它变量，不要使用条件语句，<br/>
&nbsp;&nbsp;&nbsp;&nbsp;不要去查其它没在本文件或者包含本文件的文件设置的变量的值，<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MAKEFILES">PRODUCT_MAKEFILES</a></h3>
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
