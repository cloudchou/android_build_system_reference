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
<h3>build/core/combo/TARGET_linux-mips.mk</h3>
<p>
Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;MIPS.<br/>
Included&nbsp;by&nbsp;combo/select.mk<br/>
You&nbsp;can&nbsp;set&nbsp;TARGET_ARCH_VARIANT&nbsp;to&nbsp;use&nbsp;an&nbsp;arch&nbsp;version&nbsp;other<br/>
than&nbsp;mips32r2-fp.&nbsp;Each&nbsp;value&nbsp;should&nbsp;correspond&nbsp;to&nbsp;a&nbsp;file&nbsp;named<br/>
$(BUILD_COMBOS)/arch/<name>.mk&nbsp;which&nbsp;must&nbsp;contain<br/>
makefile&nbsp;variable&nbsp;definitions&nbsp;similar&nbsp;to&nbsp;the&nbsp;preprocessor<br/>
defines&nbsp;in&nbsp;build/core/combo/include/arch/<combo>/AndroidConfig.h.&nbsp;Their<br/>
purpose&nbsp;is&nbsp;to&nbsp;allow&nbsp;module&nbsp;Android.mk&nbsp;files&nbsp;to&nbsp;selectively&nbsp;compile<br/>
different&nbsp;versions&nbsp;of&nbsp;code&nbsp;based&nbsp;upon&nbsp;the&nbsp;funtionality&nbsp;and<br/>
instructions&nbsp;available&nbsp;in&nbsp;a&nbsp;given&nbsp;architecture&nbsp;version.<br/>
The&nbsp;blocks&nbsp;also&nbsp;define&nbsp;specific&nbsp;arch_variant_cflags,&nbsp;which<br/>
include&nbsp;defines,&nbsp;and&nbsp;compiler&nbsp;settings&nbsp;for&nbsp;the&nbsp;given&nbsp;architecture<br/>
version.<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT">■ &nbsp;&nbsp;TARGET_ARCH_VARIANT</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT)),)<br/>
TARGET_ARCH_VARIANT&nbsp;:=&nbsp;mips32r2-fp<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLS_PREFIX">■ &nbsp;&nbsp;TARGET_TOOLS_PREFIX</a></h3>
<p>
You&nbsp;can&nbsp;set&nbsp;TARGET_TOOLS_PREFIX&nbsp;to&nbsp;get&nbsp;gcc&nbsp;from&nbsp;somewhere&nbsp;else<br/>
ifeq&nbsp;($(strip&nbsp;$(TARGET_TOOLS_PREFIX)),)<br/>
TARGET_TOOLCHAIN_ROOT&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/mips/mipsel-linux-android-4.6<br/>
TARGET_TOOLS_PREFIX&nbsp;:=&nbsp;$(TARGET_TOOLCHAIN_ROOT)/bin/mipsel-linux-android-<br/>
endif<br/>
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
<h3><a id="TARGET_mips_CFLAGS">■ &nbsp;&nbsp;TARGET_mips_CFLAGS</a></h3>
<p>
Set&nbsp;FORCE_MIPS_DEBUGGING&nbsp;to&nbsp;"true"&nbsp;in&nbsp;your&nbsp;buildspec.mk<br/>
or&nbsp;in&nbsp;your&nbsp;environment&nbsp;to&nbsp;gdb&nbsp;debugging&nbsp;easier.<br/>
Don't&nbsp;forget&nbsp;to&nbsp;do&nbsp;a&nbsp;clean&nbsp;build.<br/>
ifeq&nbsp;($(FORCE_MIPS_DEBUGGING),true)<br/>
&nbsp;&nbsp;TARGET_mips_CFLAGS&nbsp;+=&nbsp;-fno-omit-frame-pointer<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(TARGET_mips_CFLAGS)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-Ulinux&nbsp;-U__unix&nbsp;-U__unix__&nbsp;-Umips&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-fpic&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-ffunction-sections&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-fdata-sections&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-funwind-tables&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-Werror=format-security&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(arch_variant_cflags)&nbsp;&nbsp;&nbsp;<br/>
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
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
This&nbsp;is&nbsp;to&nbsp;avoid&nbsp;the&nbsp;dreaded&nbsp;warning&nbsp;compiler&nbsp;message:<br/>
note:&nbsp;the&nbsp;mangling&nbsp;of&nbsp;'va_list'&nbsp;has&nbsp;changed&nbsp;in&nbsp;GCC&nbsp;4.4<br/>
The&nbsp;fact&nbsp;that&nbsp;the&nbsp;mangling&nbsp;changed&nbsp;does&nbsp;not&nbsp;affect&nbsp;the&nbsp;NDK&nbsp;ABI<br/>
very&nbsp;fortunately&nbsp;(since&nbsp;none&nbsp;of&nbsp;the&nbsp;exposed&nbsp;APIs&nbsp;used&nbsp;va_list<br/>
in&nbsp;their&nbsp;exported&nbsp;C++&nbsp;functions).&nbsp;Also,&nbsp;GCC&nbsp;4.5&nbsp;has&nbsp;already<br/>
removed&nbsp;the&nbsp;warning&nbsp;from&nbsp;the&nbsp;compiler.<br/>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;-Wno-psabi<br/>
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
<h3><a id="TARGET_C_INCLUDES">■ &nbsp;&nbsp;TARGET_C_INCLUDES</a></h3>
<p>
TARGET_C_INCLUDES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libc_root)/arch-mips/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libc_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libstdc++_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(KERNEL_HEADERS)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libm_root)/include&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(libm_root)/include/mips&nbsp;\<br/>
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
TARGET_CUSTOM_LD_COMMAND&nbsp;:=&nbsp;true&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
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
