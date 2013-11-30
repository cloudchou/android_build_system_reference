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
<h3>build/core/combo/TARGET_linux-arm.mk</h3>
<p>
Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;ARM.<br/>
Included&nbsp;by&nbsp;combo/select.mk<br/>
You&nbsp;can&nbsp;set&nbsp;TARGET_ARCH_VARIANT&nbsp;to&nbsp;use&nbsp;an&nbsp;arch&nbsp;version&nbsp;other<br/>
than&nbsp;ARMv5TE.&nbsp;Each&nbsp;value&nbsp;should&nbsp;correspond&nbsp;to&nbsp;a&nbsp;file&nbsp;named<br/>
$(BUILD_COMBOS)/arch/<name>.mk&nbsp;which&nbsp;must&nbsp;contain<br/>
makefile&nbsp;variable&nbsp;definitions&nbsp;similar&nbsp;to&nbsp;the&nbsp;preprocessor<br/>
defines&nbsp;in&nbsp;build/core/combo/include/arch/<combo>/AndroidConfig.h.&nbsp;Their<br/>
purpose&nbsp;is&nbsp;to&nbsp;allow&nbsp;module&nbsp;Android.mk&nbsp;files&nbsp;to&nbsp;selectively&nbsp;compile<br/>
different&nbsp;versions&nbsp;of&nbsp;code&nbsp;based&nbsp;upon&nbsp;the&nbsp;funtionality&nbsp;and<br/>
instructions&nbsp;available&nbsp;in&nbsp;a&nbsp;given&nbsp;architecture&nbsp;version.<br/>
The&nbsp;blocks&nbsp;also&nbsp;define&nbsp;specific&nbsp;arch_variant_cflags,&nbsp;which<br/>
include&nbsp;defines,&nbsp;and&nbsp;compiler&nbsp;settings&nbsp;for&nbsp;the&nbsp;given&nbsp;architecture<br/>
version.&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT">■ &nbsp;&nbsp;TARGET_ARCH_VARIANT</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT)),)<br/>
TARGET_ARCH_VARIANT&nbsp;:=&nbsp;armv5te<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_SPECIFIC_MAKEFILE">■ &nbsp;&nbsp;TARGET_ARCH_SPECIFIC_MAKEFILE</a></h3>
<p>
TARGET_ARCH_SPECIFIC_MAKEFILE&nbsp;:=&nbsp;$(BUILD_COMBOS)/arch/$(TARGET_ARCH)/$(TARGET_ARCH_VARIANT).mk<br/>
ifeq&nbsp;($(strip&nbsp;$(wildcard&nbsp;$(TARGET_ARCH_SPECIFIC_MAKEFILE))),)<br/>
$(error&nbsp;Unknown&nbsp;ARM&nbsp;architecture&nbsp;version:&nbsp;$(TARGET_ARCH_VARIANT))<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLCHAIN_ROOT">■ &nbsp;&nbsp;TARGET_TOOLCHAIN_ROOT</a></h3>
<p>
TARGET_TOOLCHAIN_ROOT&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/arm/arm-linux-androideabi-4.6<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLS_PREFIX">■ &nbsp;&nbsp;TARGET_TOOLS_PREFIX</a></h3>
<p>
TARGET_TOOLS_PREFIX&nbsp;:=&nbsp;$(TARGET_TOOLCHAIN_ROOT)/bin/arm-linux-androideabi-<br/>
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
TRGET_OBJCOPY&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)objcopy$(HOST_EXECUTABLE_SUFFIX)<br/>
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
TARGET_STRIP&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)strip$(HOST_EXECUTABLE_SUFFIX)&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_STRIP_COMMAND">■ &nbsp;&nbsp;TARGET_STRIP_COMMAND</a></h3>
<p>
ifeq&nbsp;($(TARGET_BUILD_VARIANT),user)<br/>
TARGET_STRIP_COMMAND&nbsp;=&nbsp;$(TARGET_STRIP)&nbsp;--strip-all&nbsp;$<&nbsp;-o&nbsp;$@<br/>
else<br/>
TARGET_STRIP_COMMAND&nbsp;=&nbsp;$(TARGET_STRIP)&nbsp;--strip-all&nbsp;$<&nbsp;-o&nbsp;$@&nbsp;&&&nbsp;\<br/>
$(TARGET_OBJCOPY)&nbsp;--add-gnu-debuglink=$<&nbsp;$@<br/>
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
<h3><a id="TARGET_arm_CFLAGS">■ &nbsp;&nbsp;TARGET_arm_CFLAGS</a></h3>
<p>
TARGET_arm_CFLAGS&nbsp;:=&nbsp;&nbsp;&nbsp;&nbsp;-O2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-fomit-frame-pointer&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-fstrict-aliasing&nbsp;&nbsp;&nbsp;&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-funswitch-loops<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_thumb_CFLAGS">■ &nbsp;&nbsp;TARGET_thumb_CFLAGS</a></h3>
<p>
Modules&nbsp;can&nbsp;choose&nbsp;to&nbsp;compile&nbsp;some&nbsp;source&nbsp;as&nbsp;thumb.&nbsp;As<br/>
non-thumb&nbsp;enabled&nbsp;targets&nbsp;are&nbsp;supported,&nbsp;this&nbsp;is&nbsp;treated<br/>
as&nbsp;a&nbsp;'hint'.&nbsp;If&nbsp;thumb&nbsp;is&nbsp;not&nbsp;enabled,&nbsp;these&nbsp;files&nbsp;are&nbsp;just<br/>
compiled&nbsp;as&nbsp;ARM.<br/>
ifeq&nbsp;($(ARCH_ARM_HAVE_THUMB_SUPPORT),true)<br/>
TARGET_thumb_CFLAGS&nbsp;:=&nbsp;&nbsp;-mthumb&nbsp;\<br/>
-Os&nbsp;\<br/>
-fomit-frame-pointer&nbsp;\<br/>
-fno-strict-aliasing<br/>
else<br/>
TARGET_thumb_CFLAGS&nbsp;:=&nbsp;$(TARGET_arm_CFLAGS)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="FORCE_ARM_DEBUGGING">■ &nbsp;&nbsp;FORCE_ARM_DEBUGGING</a></h3>
<p>
Set&nbsp;FORCE_ARM_DEBUGGING&nbsp;to&nbsp;"true"&nbsp;in&nbsp;your&nbsp;buildspec.mk<br/>
or&nbsp;in&nbsp;your&nbsp;environment&nbsp;to&nbsp;force&nbsp;a&nbsp;full&nbsp;arm&nbsp;build,&nbsp;even&nbsp;for<br/>
files&nbsp;that&nbsp;are&nbsp;normally&nbsp;built&nbsp;as&nbsp;thumb;&nbsp;this&nbsp;can&nbsp;make<br/>
gdb&nbsp;debugging&nbsp;easier.&nbsp;&nbsp;Don't&nbsp;forget&nbsp;to&nbsp;do&nbsp;a&nbsp;clean&nbsp;build.<br/>
NOTE:&nbsp;if&nbsp;you&nbsp;try&nbsp;to&nbsp;build&nbsp;a&nbsp;-O0&nbsp;build&nbsp;with&nbsp;thumb,&nbsp;several<br/>
of&nbsp;the&nbsp;libraries&nbsp;(libpv,&nbsp;libwebcore,&nbsp;libkjs)&nbsp;need&nbsp;to&nbsp;be&nbsp;built<br/>
with&nbsp;-mlong-calls.&nbsp;&nbsp;When&nbsp;built&nbsp;at&nbsp;-O0,&nbsp;those&nbsp;libraries&nbsp;are<br/>
too&nbsp;big&nbsp;for&nbsp;a&nbsp;thumb&nbsp;"BL&nbsp;<label>"&nbsp;to&nbsp;go&nbsp;from&nbsp;one&nbsp;end&nbsp;to&nbsp;the&nbsp;other.<br/>
&nbsp;&nbsp;&nbsp;ifeq&nbsp;($(FORCE_ARM_DEBUGGING),true)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TARGET_arm_CFLAGS&nbsp;+=&nbsp;-fno-omit-frame-pointer&nbsp;-fno-strict-aliasing<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TARGET_thumb_CFLAGS&nbsp;+=&nbsp;-marm&nbsp;-fno-omit-frame-pointer<br/>
&nbsp;&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DISABLE_ARM_PIE">■ &nbsp;&nbsp;TARGET_DISABLE_ARM_PIE</a></h3>
<p>
ifeq&nbsp;($(TARGET_DISABLE_ARM_PIE),true)<br/>
&nbsp;&nbsp;&nbsp;PIE_GLOBAL_CFLAGS&nbsp;:=<br/>
&nbsp;&nbsp;&nbsp;PIE_EXECUTABLE_TRANSFORM&nbsp;:=&nbsp;-Wl,-T,$(BUILD_SYSTEM)/armelf.x<br/>
else<br/>
&nbsp;&nbsp;&nbsp;PIE_GLOBAL_CFLAGS&nbsp;:=&nbsp;-fPIE<br/>
&nbsp;&nbsp;&nbsp;PIE_EXECUTABLE_TRANSFORM&nbsp;:=&nbsp;-fPIE&nbsp;-pie<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
编译C的标记<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RELEASE_CFLAGS">■ &nbsp;&nbsp;TARGET_RELEASE_CFLAGS</a></h3>
<p>
TARGET_RELEASE_CFLAGS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-DNDEBUG&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-g&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-Wstrict-aliasing=2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-fgcse-after-reload&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-frerun-cse-after-loop&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-frename-registers<br/>
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
&nbsp;&nbsp;&nbsp;KERNEL_HEADERS&nbsp;:=&nbsp;$(KERNEL_HEADERS_COMMON)&nbsp;$(KERNEL_HEADERS_ARCH)&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_C_INCLUDES">■ &nbsp;&nbsp;TARGET_C_INCLUDES</a></h3>
<p>
TARGET_C_INCLUDES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libc_root)/arch-arm/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libc_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libstdc++_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(KERNEL_HEADERS)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libm_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libm_root)/include/arm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libthread_db_root)/include<br/>
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
将目标代码转为静态可执行文件<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
