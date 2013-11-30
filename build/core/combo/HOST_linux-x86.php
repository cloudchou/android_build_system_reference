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
<h3>build/core/combo/HOST_linux-x86.mk</h3>
<p>
Configuration&nbsp;for&nbsp;builds&nbsp;hosted&nbsp;on&nbsp;linux-x86.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Included&nbsp;by&nbsp;combo/select.mk<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在linux上的编译配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-file-size]">■ &nbsp;&nbsp;[get-file-size]</a></h3>
<p>
获取文件大小<br/>
$(1):&nbsp;The&nbsp;file&nbsp;to&nbsp;check<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_SDK_TOOLCHAIN_PREFIX">■ &nbsp;&nbsp;HOST_SDK_TOOLCHAIN_PREFIX</a></h3>
<p>
HOST_SDK_TOOLCHAIN_PREFIX&nbsp;:=&nbsp;prebuilts/tools/gcc-sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CC">■ &nbsp;&nbsp;HOST_CC</a></h3>
<p>
HOST_CC&nbsp;&nbsp;:=&nbsp;$(HOST_SDK_TOOLCHAIN_PREFIX)/gcc<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CXX">■ &nbsp;&nbsp;HOST_CXX</a></h3>
<p>
HOST_CXX&nbsp;:=&nbsp;$(HOST_SDK_TOOLCHAIN_PREFIX)/g++<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_AR">■ &nbsp;&nbsp;HOST_AR</a></h3>
<p>
HOST_AR&nbsp;&nbsp;:=&nbsp;$(HOST_SDK_TOOLCHAIN_PREFIX)/ar<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_64bit">■ &nbsp;&nbsp;BUILD_HOST_64bit</a></h3>
<p>
ifneq&nbsp;($(strip&nbsp;$(BUILD_HOST_64bit)),)<br/>
#By&nbsp;default&nbsp;we&nbsp;build&nbsp;everything&nbsp;in&nbsp;32-bit,&nbsp;because&nbsp;it&nbsp;gives&nbsp;us<br/>
#more&nbsp;consistency&nbsp;between&nbsp;the&nbsp;host&nbsp;tools&nbsp;and&nbsp;the&nbsp;target.<br/>
#BUILD_HOST_64bit=1&nbsp;overrides&nbsp;it&nbsp;for&nbsp;tool&nbsp;like&nbsp;emulator<br/>
#which&nbsp;can&nbsp;benefit&nbsp;from&nbsp;64-bit&nbsp;host&nbsp;arch.<br/>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;-m64<br/>
HOST_GLOBAL_LDFLAGS&nbsp;+=&nbsp;-m64<br/>
else<br/>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;-m32<br/>
HOST_GLOBAL_LDFLAGS&nbsp;+=&nbsp;-m32<br/>
endif&nbsp;#&nbsp;BUILD_HOST_64bit<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_NO_UNDEFINED_LDFLAGS">■ &nbsp;&nbsp;HOST_NO_UNDEFINED_LDFLAGS</a></h3>
<p>
HOST_NO_UNDEFINED_LDFLAGS&nbsp;:=&nbsp;-Wl,--no-undefined<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
