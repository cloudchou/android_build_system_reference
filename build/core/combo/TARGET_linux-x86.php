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
<h3>build/core/combo/TARGET_linux-x86.mk</h3>
<p>
Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;x86&nbsp;as&nbsp;a&nbsp;target.<br/>
Included&nbsp;by&nbsp;combo/select.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT">■ &nbsp;&nbsp;TARGET_ARCH_VARIANT</a></h3>
<p>
Provide&nbsp;a&nbsp;default&nbsp;variant.<br/>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT)),)<br/>
TARGET_ARCH_VARIANT&nbsp;:=&nbsp;x86<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_SPECIFIC_MAKEFILE">■ &nbsp;&nbsp;TARGET_ARCH_SPECIFIC_MAKEFILE</a></h3>
<p>
TARGET_ARCH_SPECIFIC_MAKEFILE&nbsp;:=&nbsp;$(BUILD_COMBOS)/arch/$(TARGET_ARCH)/$(TARGET_ARCH_VARIANT).mk<br/>
Include&nbsp;the&nbsp;arch-variant-specific&nbsp;configuration&nbsp;file.<br/>
Its&nbsp;role&nbsp;is&nbsp;to&nbsp;define&nbsp;various&nbsp;ARCH_X86_HAVE_XXX&nbsp;feature&nbsp;macros,<br/>
plus&nbsp;initial&nbsp;values&nbsp;for&nbsp;TARGET_GLOBAL_CFLAGS<br/>
&nbsp;&nbsp;&nbsp;TARGET_ARCH_SPECIFIC_MAKEFILE&nbsp;:=&nbsp;$(BUILD_COMBOS)/arch/$(TARGET_ARCH)/$(TARGET_ARCH_VARIANT).mk<br/>
&nbsp;&nbsp;&nbsp;ifeq&nbsp;($(strip&nbsp;$(wildcard&nbsp;$(TARGET_ARCH_SPECIFIC_MAKEFILE))),)<br/>
&nbsp;&nbsp;&nbsp;$(error&nbsp;Unknown&nbsp;$(TARGET_ARCH)&nbsp;architecture&nbsp;version:&nbsp;$(TARGET_ARCH_VARIANT))<br/>
&nbsp;&nbsp;&nbsp;endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLS_PREFIX">■ &nbsp;&nbsp;TARGET_TOOLS_PREFIX</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(TARGET_TOOLS_PREFIX)),)<br/>
TARGET_TOOLCHAIN_ROOT&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/x86/i686-linux-android-4.6<br/>
TARGET_TOOLS_PREFIX&nbsp;:=&nbsp;$(TARGET_TOOLCHAIN_ROOT)/bin/i686-linux-android-<br/>
endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CC">■ &nbsp;&nbsp;TARGET_CC</a></h3>
<p>
TARGET_CC&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)gcc$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CXX">■ &nbsp;&nbsp;TARGET_CXX</a></h3>
<p>
TARGET_CXX&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)g++$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_AR">■ &nbsp;&nbsp;TARGET_AR</a></h3>
<p>
TARGET_AR&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)ar$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OBJCOPY">■ &nbsp;&nbsp;TARGET_OBJCOPY</a></h3>
<p>
TARGET_OBJCOPY&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)objcopy$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_LD">■ &nbsp;&nbsp;TARGET_LD</a></h3>
<p>
TARGET_LD&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)ld$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_STRIP">■ &nbsp;&nbsp;TARGET_STRIP</a></h3>
<p>
TARGET_STRIP&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)strip$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_STRIP_COMMAND">■ &nbsp;&nbsp;TARGET_STRIP_COMMAND</a></h3>
<p>
ifeq&nbsp;($(TARGET_BUILD_VARIANT),user)<br/>
TARGET_STRIP_COMMAND&nbsp;=&nbsp;$(TARGET_STRIP)&nbsp;--strip-debug&nbsp;$<&nbsp;-o&nbsp;$@<br/>
else<br/>
TARGET_STRIP_COMMAND&nbsp;=&nbsp;$(TARGET_STRIP)&nbsp;--strip-debug&nbsp;$<&nbsp;-o&nbsp;$@&nbsp;&&&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(TARGET_OBJCOPY)&nbsp;--add-gnu-debuglink=$<&nbsp;$@<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_NO_UNDEFINED_LDFLAGS">■ &nbsp;&nbsp;TARGET_NO_UNDEFINED_LDFLAGS</a></h3>
<p>
TARGET_NO_UNDEFINED_LDFLAGS&nbsp;:=&nbsp;-Wl,--no-undefined<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_HEADERS">■ &nbsp;&nbsp;KERNEL_HEADERS</a></h3>
<p>
unless&nbsp;CUSTOM_KERNEL_HEADERS&nbsp;is&nbsp;defined,&nbsp;we're&nbsp;going&nbsp;to&nbsp;use<br/>
symlinks&nbsp;located&nbsp;in&nbsp;out/&nbsp;to&nbsp;point&nbsp;to&nbsp;the&nbsp;appropriate&nbsp;kernel<br/>
headers.&nbsp;see&nbsp;'config/kernel_headers.make'&nbsp;for&nbsp;more&nbsp;details<br/>
&nbsp;&nbsp;&nbsp;ifneq&nbsp;($(CUSTOM_KERNEL_HEADERS),)<br/>
&nbsp;KERNEL_HEADERS_COMMON&nbsp;:=&nbsp;$(CUSTOM_KERNEL_HEADERS)<br/>
&nbsp;KERNEL_HEADERS_ARCH&nbsp;&nbsp;&nbsp;:=&nbsp;$(CUSTOM_KERNEL_HEADERS)<br/>
&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;KERNEL_HEADERS_COMMON&nbsp;:=&nbsp;$(libc_root)/kernel/common<br/>
&nbsp;KERNEL_HEADERS_ARCH&nbsp;&nbsp;&nbsp;:=&nbsp;$(libc_root)/kernel/arch-$(TARGET_ARCH)<br/>
&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;KERNEL_HEADERS&nbsp;:=&nbsp;$(KERNEL_HEADERS_COMMON)&nbsp;$(KERNEL_HEADERS_ARCH)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;\<br/>
-O2&nbsp;\<br/>
-Ulinux&nbsp;\<br/>
-Wa,--noexecstack&nbsp;\<br/>
-Werror=format-security&nbsp;\<br/>
-Wstrict-aliasing=2&nbsp;\<br/>
-fPIC&nbsp;-fPIE&nbsp;\<br/>
-ffunction-sections&nbsp;\<br/>
-finline-functions&nbsp;\<br/>
-finline-limit=300&nbsp;\<br/>
-fno-inline-functions-called-once&nbsp;\<br/>
-fno-short-enums&nbsp;\<br/>
-fstrict-aliasing&nbsp;\<br/>
-funswitch-loops&nbsp;\<br/>
-funwind-tables&nbsp;\<br/>
-fstack-protector<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ANDROID_CONFIG_CFLAGS">■ &nbsp;&nbsp;TARGET_ANDROID_CONFIG_CFLAGS</a></h3>
<p>
TARGET_ANDROID_CONFIG_CFLAGS&nbsp;:=&nbsp;-include&nbsp;$(android_config_h)&nbsp;-I&nbsp;$(dir&nbsp;$(android_config_h))<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;$(TARGET_ANDROID_CONFIG_CFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CPPFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CPPFLAGS</a></h3>
<p>
Not&nbsp;sure&nbsp;this&nbsp;is&nbsp;still&nbsp;needed.&nbsp;Must&nbsp;check&nbsp;with&nbsp;our&nbsp;toolchains.<br/>
TARGET_GLOBAL_CPPFLAGS&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-fno-use-cxa-atexit<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CRTBEGIN_STATIC_O">■ &nbsp;&nbsp;TARGET_CRTBEGIN_STATIC_O</a></h3>
<p>
TARGET_CRTBEGIN_STATIC_O&nbsp;:=<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_static.o">■ &nbsp;&nbsp;$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_static.o</a></h3>
<p>
$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_static.o<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CRTBEGIN_DYNAMIC_O">■ &nbsp;&nbsp;TARGET_CRTBEGIN_DYNAMIC_O</a></h3>
<p>
TARGET_CRTBEGIN_DYNAMIC_O&nbsp;:=<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_dynamic.o">■ &nbsp;&nbsp;$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_dynamic.o</a></h3>
<p>
$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_dynamic.o<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CRTEND_O">■ &nbsp;&nbsp;TARGET_CRTEND_O</a></h3>
<p>
TARGET_CRTEND_O&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtend_android.o<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CRTBEGIN_SO_O">■ &nbsp;&nbsp;TARGET_CRTBEGIN_SO_O</a></h3>
<p>
TARGET_CRTBEGIN_SO_O&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtbegin_so.o<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CRTEND_SO_O">■ &nbsp;&nbsp;TARGET_CRTEND_SO_O</a></h3>
<p>
TARGET_CRTEND_SO_O&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATE_LIBRARIES)/crtend_so.o<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_STRIP_MODULE:=true">■ &nbsp;&nbsp;TARGET_STRIP_MODULE:=true</a></h3>
<p>
TARGET_STRIP_MODULE:=true<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DEFAULT_SYSTEM_SHARED_LIBRARIES">■ &nbsp;&nbsp;TARGET_DEFAULT_SYSTEM_SHARED_LIBRARIES</a></h3>
<p>
TARGET_DEFAULT_SYSTEM_SHARED_LIBRARIES&nbsp;:=&nbsp;libc&nbsp;libstdc++&nbsp;libm<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CUSTOM_LD_COMMAND">■ &nbsp;&nbsp;TARGET_CUSTOM_LD_COMMAND</a></h3>
<p>
TARGET_CUSTOM_LD_COMMAND&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-shared-lib-inner]">■ &nbsp;&nbsp;[transform-o-to-shared-lib-inner]</a></h3>
<p>
将目标代码转为动态链接库<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-executable-inner]">■ &nbsp;&nbsp;[transform-o-to-executable-inner]</a></h3>
<p>
将目标代码转为可执行文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-static-executable-inner]">■ &nbsp;&nbsp;[transform-o-to-static-executable-inner]</a></h3>
<p>
将目标代码转为静态可执行文件&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
