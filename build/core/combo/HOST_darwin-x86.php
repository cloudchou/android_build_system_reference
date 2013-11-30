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
<h3>build/core/combo/HOST_darwin-x86.mk</h3>
<p>
Configuration&nbsp;for&nbsp;Darwin&nbsp;(Mac&nbsp;OS&nbsp;X)&nbsp;on&nbsp;x86.<br/>
Included&nbsp;by&nbsp;combo/select.mk<br/>
在苹果机上的编译配置<br/>
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
HOST_NO_UNDEFINED_LDFLAGS&nbsp;:=&nbsp;-Wl,-undefined,error<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CC">■ &nbsp;&nbsp;HOST_CC</a></h3>
<p>
HOST_CC&nbsp;:=&nbsp;gcc<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CXX">■ &nbsp;&nbsp;HOST_CXX</a></h3>
<p>
HOST_CXX&nbsp;:=&nbsp;g++<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_AR">■ &nbsp;&nbsp;HOST_AR</a></h3>
<p>
HOST_AR&nbsp;:=&nbsp;$(AR)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_STRIP">■ &nbsp;&nbsp;HOST_STRIP</a></h3>
<p>
HOST_STRIP&nbsp;:=&nbsp;$(STRIP)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_STRIP_COMMAND">■ &nbsp;&nbsp;HOST_STRIP_COMMAND</a></h3>
<p>
HOST_STRIP_COMMAND&nbsp;=&nbsp;$(HOST_STRIP)&nbsp;--strip-debug&nbsp;$<&nbsp;-o&nbsp;$@<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_SHLIB_SUFFIX">■ &nbsp;&nbsp;HOST_SHLIB_SUFFIX</a></h3>
<p>
HOST_SHLIB_SUFFIX&nbsp;:=&nbsp;.dylib<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JNILIB_SUFFIX">■ &nbsp;&nbsp;HOST_JNILIB_SUFFIX</a></h3>
<p>
HOST_JNILIB_SUFFIX&nbsp;:=&nbsp;.jnilib<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CFLAGS">■ &nbsp;&nbsp;HOST_GLOBAL_CFLAGS</a></h3>
<p>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-include&nbsp;$(call&nbsp;select-android-config-h,darwin-x86)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_ARFLAGS">■ &nbsp;&nbsp;HOST_GLOBAL_ARFLAGS</a></h3>
<p>
HOST_GLOBAL_ARFLAGS&nbsp;:=&nbsp;cqs<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CUSTOM_LD_COMMAND">■ &nbsp;&nbsp;HOST_CUSTOM_LD_COMMAND</a></h3>
<p>
HOST_CUSTOM_LD_COMMAND&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-shared-lib-inner]">■ &nbsp;&nbsp;[transform-host-o-to-shared-lib-inner]</a></h3>
<p>
将目标代码转为动态链接库的宏函数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-executable-inner]">■ &nbsp;&nbsp;[transform-host-o-to-executable-inner]</a></h3>
<p>
将目标代码转为可执行文件的宏函数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-file-size]">■ &nbsp;&nbsp;[get-file-size]</a></h3>
<p>
获取文件大小宏函数<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
