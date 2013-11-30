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
<h3>build/core/dynamic_binary.mk</h3>
<p>
Standard&nbsp;rules&nbsp;for&nbsp;building&nbsp;any&nbsp;target-side&nbsp;binaries<br/>
with&nbsp;dynamic&nbsp;linkage&nbsp;(dynamic&nbsp;libraries&nbsp;or&nbsp;executables<br/>
that&nbsp;link&nbsp;with&nbsp;dynamic&nbsp;libraries)<br/>
Files&nbsp;including&nbsp;this&nbsp;file&nbsp;must&nbsp;define&nbsp;a&nbsp;rule&nbsp;to&nbsp;build<br/>
the&nbsp;target&nbsp;$(linked_module).<br/>
编译为手机上的可执行文件和动态链接库的规则，它不会被任何模块的Android.mk直接包含，<br/>
只有executable.mk，prebuilt.mk，shared_library.mk直接包含dynamic_binary.mk，<br/>
故此没有对应的BUILD_*之类的变量会该makefile对应<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNSTRIPPED_PATH">■ &nbsp;&nbsp;LOCAL_UNSTRIPPED_PATH</a></h3>
<p>
没有优化的模块编译结果存放路径<br/>
LOCAL_UNSTRIPPED_PATH&nbsp;:=&nbsp;$(strip&nbsp;$(LOCAL_UNSTRIPPED_PATH))<br/>
ifeq&nbsp;($(LOCAL_UNSTRIPPED_PATH),)<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_MODULE_PATH),)<br/>
&nbsp;LOCAL_UNSTRIPPED_PATH&nbsp;:=&nbsp;$(TARGET_OUT_$(LOCAL_MODULE_CLASS)_UNSTRIPPED)&nbsp;//可能是TARGET_OUT_UNSTRIPPED，TARGET_OUT_EXECUTABLES_UNSTRIPPED，TARGET_OUT_SHARED_LIBRARIES_UNSTRIPPED<br/>
&nbsp;&nbsp;else<br/>
&nbsp;#&nbsp;We&nbsp;have&nbsp;to&nbsp;figure&nbsp;out&nbsp;the&nbsp;corresponding&nbsp;unstripped&nbsp;path&nbsp;if&nbsp;LOCAL_MODULE_PATH&nbsp;is&nbsp;customized.<br/>
&nbsp;LOCAL_UNSTRIPPED_PATH&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)/$(patsubst&nbsp;$(PRODUCT_OUT)/%,%,$(LOCAL_MODULE_PATH))<br/>
&nbsp;&nbsp;endif<br/>
endif<br/>
示例：<br/>
out/target/product/find5/symbols/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_STEM">■ &nbsp;&nbsp;LOCAL_MODULE_STEM</a></h3>
<p>
目标文件的名字，不包含后缀<br/>
The&nbsp;name&nbsp;of&nbsp;the&nbsp;target&nbsp;file,&nbsp;without&nbsp;any&nbsp;path&nbsp;prepended.<br/>
This&nbsp;duplicates&nbsp;logic&nbsp;from&nbsp;base_rules.mk&nbsp;because&nbsp;we&nbsp;need&nbsp;to<br/>
know&nbsp;its&nbsp;results&nbsp;before&nbsp;base_rules.mk&nbsp;is&nbsp;included.<br/>
Consolidate&nbsp;the&nbsp;duplicates.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE_STEM">■ &nbsp;&nbsp;LOCAL_INSTALLED_MODULE_STEM</a></h3>
<p>
目标文件的名字(最终安装在系统的名字)，包含后缀<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE_STEM">■ &nbsp;&nbsp;LOCAL_BUILT_MODULE_STEM</a></h3>
<p>
目标文件的名字(编译结果存放的名字)，包含后缀&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="guessed_intermediates">■ &nbsp;&nbsp;guessed_intermediates</a></h3>
<p>
base_rules.make&nbsp;defines&nbsp;$(intermediates),&nbsp;but&nbsp;we&nbsp;need&nbsp;its&nbsp;value<br/>
before&nbsp;we&nbsp;include&nbsp;base_rules.&nbsp;&nbsp;Make&nbsp;a&nbsp;guess,&nbsp;and&nbsp;verify&nbsp;that<br/>
&nbsp;it's&nbsp;correct&nbsp;once&nbsp;the&nbsp;real&nbsp;value&nbsp;is&nbsp;defined.<br/>
&nbsp;guessed_intermediates&nbsp;:=&nbsp;$(call&nbsp;local-intermediates-dir)<br/>
</p>
</div>
<div class="variable">
<h3><a id="linked_module">■ &nbsp;&nbsp;linked_module</a></h3>
<p>
Define&nbsp;the&nbsp;target&nbsp;that&nbsp;is&nbsp;the&nbsp;unmodified&nbsp;output&nbsp;of&nbsp;the&nbsp;linker.<br/>
The&nbsp;basename&nbsp;of&nbsp;this&nbsp;target&nbsp;must&nbsp;be&nbsp;the&nbsp;same&nbsp;as&nbsp;the&nbsp;final&nbsp;output<br/>
binary&nbsp;name,&nbsp;because&nbsp;it's&nbsp;used&nbsp;to&nbsp;set&nbsp;the&nbsp;"soname"&nbsp;in&nbsp;the&nbsp;binary.<br/>
The&nbsp;includer&nbsp;of&nbsp;this&nbsp;file&nbsp;will&nbsp;define&nbsp;a&nbsp;rule&nbsp;to&nbsp;build&nbsp;this&nbsp;target.<br/>
&nbsp;&nbsp;linked_module&nbsp;:=&nbsp;$(guessed_intermediates)/LINKED/$(LOCAL_BUILT_MODULE_STEM)&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_ORIGINAL_DYNAMIC_BINARIES">■ &nbsp;&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES</a></h3>
<p>
表示所有动态链接后的可执行文件&nbsp;&nbsp;&nbsp;<br/>
ALL_ORIGINAL_DYNAMIC_BINARIES&nbsp;+=&nbsp;$(linked_module)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_TARGETS">■ &nbsp;&nbsp;LOCAL_INTERMEDIATE_TARGETS</a></h3>
<p>
Because&nbsp;TARGET_SYMBOL_FILTER_FILE&nbsp;depends&nbsp;on&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES,<br/>
the&nbsp;linked_module&nbsp;rules&nbsp;won't&nbsp;necessarily&nbsp;inherit&nbsp;the&nbsp;PRIVATE_<br/>
variables&nbsp;from&nbsp;LOCAL_BUILT_MODULE.&nbsp;&nbsp;This&nbsp;tells&nbsp;binary.make&nbsp;to&nbsp;explicitly<br/>
define&nbsp;the&nbsp;PRIVATE_&nbsp;variables&nbsp;for&nbsp;linked_module&nbsp;as&nbsp;well&nbsp;as&nbsp;for<br/>
LOCAL_BUILT_MODULE.&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COMPRESS_MODULE_SYMBOLS">■ &nbsp;&nbsp;LOCAL_COMPRESS_MODULE_SYMBOLS</a></h3>
<p>
将可执行文件压缩后的结果<br/>
ifeq&nbsp;($(strip&nbsp;$(LOCAL_COMPRESS_MODULE_SYMBOLS)),)<br/>
&nbsp;&nbsp;LOCAL_COMPRESS_MODULE_SYMBOLS&nbsp;:=&nbsp;$(strip&nbsp;$(TARGET_COMPRESS_MODULE_SYMBOLS))<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STRIP_MODULE">■ &nbsp;&nbsp;LOCAL_STRIP_MODULE</a></h3>
<p>
将编译压缩可执行文件进行Strip后的结果<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
