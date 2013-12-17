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
<h3>build/core/tasks/kernel.mk</h3>
<p>
定义生成内核的规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_AUTO_KDIR">TARGET_AUTO_KDIR</a></h3>
<p>
TARGET_AUTO_KDIR&nbsp;:=&nbsp;$(shell&nbsp;echo&nbsp;$(TARGET_DEVICE_DIR)&nbsp;|&nbsp;sed&nbsp;-e&nbsp;'s/^device/kernel/g')<br/>
自动设置的内核目录<br/>
比如i9100，那么自动设置的内核目录是<br/>
&nbsp;&nbsp;&nbsp;kernel/samsung/i9100<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_KERNEL_SOURCE">TARGET_KERNEL_SOURCE</a></h3>
<p>
TARGET_KERNEL_SOURCE&nbsp;?=&nbsp;$(TARGET_AUTO_KDIR)<br/>
内核源码目录<br/>
&nbsp;默认&nbsp;kernel/<vendor>/<device><br/>
&nbsp;一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_SRC">KERNEL_SRC</a></h3>
<p>
KERNEL_SRC&nbsp;:=&nbsp;$(TARGET_KERNEL_SOURCE)<br/>
内核源码目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_DEFCONFIG">KERNEL_DEFCONFIG</a></h3>
<p>
KERNEL_DEFCONFIG&nbsp;:=&nbsp;$(TARGET_KERNEL_CONFIG)<br/>
编译内核用的配置文件<br/>
一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="VARIANT_DEFCONFIG">VARIANT_DEFCONFIG</a></h3>
<p>
VARIANT_DEFCONFIG&nbsp;:=&nbsp;$(TARGET_KERNEL_VARIANT_CONFIG)<br/>
变量配置<br/>
一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_KERNEL_SELINUX_CONFIG">TARGET_KERNEL_SELINUX_CONFIG</a></h3>
<p>
selinux配置<br/>
一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_OUT">KERNEL_OUT</a></h3>
<p>
KERNEL_OUT&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/KERNEL_OBJ<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/obj/KERNEL_OBJ<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_CONFIG">KERNEL_CONFIG</a></h3>
<p>
生成的编译内核的配置文件&nbsp;&nbsp;&nbsp;<br/>
KERNEL_CONFIG&nbsp;:=&nbsp;$(KERNEL_OUT)/.config<br/>
示例：<br/>
out/target/product/i9100/obj/KERNEL_OBJ/.config<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_USES_UBOOT">BOARD_USES_UBOOT</a></h3>
<p>
是否启用uboot<br/>
一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_USES_UNCOMPRESSED_BOOT">BOARD_USES_UNCOMPRESSED_BOOT</a></h3>
<p>
是否启用无压缩的boot<br/>
一般在BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_INT_KERNEL">TARGET_PREBUILT_INT_KERNEL</a></h3>
<p>
ifeq&nbsp;($(BOARD_USES_UBOOT),true)<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL&nbsp;:=&nbsp;$(KERNEL_OUT)/arch/$(TARGET_ARCH)/boot/uImage<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL_TYPE&nbsp;:=&nbsp;uImage<br/>
else&nbsp;ifeq&nbsp;($(BOARD_USES_UNCOMPRESSED_BOOT),true)<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL&nbsp;:=&nbsp;$(KERNEL_OUT)/arch/$(TARGET_ARCH)/boot/Image<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL_TYPE&nbsp;:=&nbsp;Image<br/>
else<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL&nbsp;:=&nbsp;$(KERNEL_OUT)/arch/$(TARGET_ARCH)/boot/zImage<br/>
&nbsp;&nbsp;&nbsp;TARGET_PREBUILT_INT_KERNEL_TYPE&nbsp;:=&nbsp;zImage<br/>
endif<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/i9100/obj/KERNEL_OBJ/arch/arm/boot/zImage<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_INT_KERNEL_TYPE">TARGET_PREBUILT_INT_KERNEL_TYPE</a></h3>
<p>
见TARGET_PREBUILT_INT_KERNEL<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_KERNEL">TARGET_PREBUILT_KERNEL</a></h3>
<p>
预编译的内核<br/>
一般在BoardConfig.mk里配置<br/>
在Recovery适配时经常需要设置该项<br/>
示例：<br/>
&nbsp;&nbsp;TARGET_PREBUILT_KERNEL&nbsp;:=&nbsp;$(LOCAL_DIR)/kernel<br/>
</p>
</div>
<div class="variable">
<h3><a id="HAS_PREBUILT_KERNEL">HAS_PREBUILT_KERNEL</a></h3>
<p>
是否有预编译的内核<br/>
</p>
</div>
<div class="variable">
<h3><a id="NEEDS_KERNEL_COPY">NEEDS_KERNEL_COPY</a></h3>
<p>
是否需要拷贝内核<br/>
</p>
</div>
<div class="variable">
<h3><a id="FULL_KERNEL_BUILD">FULL_KERNEL_BUILD</a></h3>
<p>
是否需要编译内核源代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_BIN">KERNEL_BIN</a></h3>
<p>
内核文件<br/>
ifeq&nbsp;"$(wildcard&nbsp;$(KERNEL_SRC)&nbsp;)"&nbsp;""<br/>
&nbsp;&nbsp;&nbsp;ifneq&nbsp;($(HAS_PREBUILT_KERNEL),)<br/>
KERNEL_BIN&nbsp;:=&nbsp;$(TARGET_PREBUILT_KERNEL)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;ifeq&nbsp;($(TARGET_KERNEL_CONFIG),)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;....<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifeq&nbsp;($(TARGET_USES_UNCOMPRESSED_KERNEL),true)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;KERNEL_BIN&nbsp;:=&nbsp;$(KERNEL_OUT)/piggy<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;KERNEL_BIN&nbsp;:=&nbsp;$(TARGET_PREBUILT_INT_KERNEL)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;endif&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;示例：<br/>
out/target/product/i9100/obj/KERNEL_OBJ/arch/arm/boot/zImage<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_HEADERS_INSTALL">KERNEL_HEADERS_INSTALL</a></h3>
<p>
KERNEL_HEADERS_INSTALL&nbsp;:=&nbsp;$(KERNEL_OUT)/usr<br/>
示例：<br/>
&nbsp;&nbsp;out/target/product/i9100/obj/KERNEL_OBJ/usr<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_MODULES_INSTALL">KERNEL_MODULES_INSTALL</a></h3>
<p>
KERNEL_MODULES_INSTALL&nbsp;:=&nbsp;system<br/>
内核模块的安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="KERNEL_MODULES_OUT">KERNEL_MODULES_OUT</a></h3>
<p>
KERNEL_MODULES_OUT&nbsp;:=&nbsp;$(TARGET_OUT)/lib/modules<br/>
内核模块的的实际安装目录<br/>
out/target/product/i9100/system/lib/modules<br/>
</p>
</div>
<div class="function">
<h3><a id="mv-modules">Function:&nbsp;&nbsp;mv-modules</a></h3>
<p>
移动模块<br/>
在system/lib/modules找到modules.order文件，<br/>
然后找到该文件所在目录下的kernel目录的ko模块文件<br/>
对这些文件用arm-eabi-strip进行strip处理<br/>
然后将其移至system/lib/modules<br/>
</p>
</div>
<div class="function">
<h3><a id="clean-module-folder">Function:&nbsp;&nbsp;clean-module-folder</a></h3>
<p>
在system/lib/modules找到modules.order文件<br/>
然后删除该文件所在的目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="ccache">ccache</a></h3>
<p>
ccache程序&nbsp;&nbsp;&nbsp;<br/>
ifneq&nbsp;($(USE_CCACHE),)<br/>
&nbsp;&nbsp;#&nbsp;search&nbsp;executable<br/>
&nbsp;&nbsp;&nbsp;ccache&nbsp;=<br/>
&nbsp;&nbsp;&nbsp;ifneq&nbsp;($(strip&nbsp;$(wildcard&nbsp;$(ANDROID_BUILD_TOP)/prebuilts/misc/$(HOST_PREBUILT_EXTRA_TAG)/ccache/ccache)),)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ccache&nbsp;:=&nbsp;$(ANDROID_BUILD_TOP)/prebuilts/misc/$(HOST_PREBUILT_EXTRA_TAG)/ccache/ccache<br/>
&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifneq&nbsp;($(strip&nbsp;$(wildcard&nbsp;$(ANDROID_BUILD_TOP)/prebuilts/misc/$(HOST_PREBUILT_TAG)/ccache/ccache)),)<br/>
&nbsp;ccache&nbsp;:=&nbsp;$(ANDROID_BUILD_TOP)/prebuilts/misc/$(HOST_PREBUILT_TAG)/ccache/ccache<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARM_CROSS_COMPILE">ARM_CROSS_COMPILE</a></h3>
<p>
交叉编译工具链所在目录<br/>
&nbsp;ifneq&nbsp;($(TARGET_KERNEL_CUSTOM_TOOLCHAIN),)<br/>
&nbsp;&nbsp;ifeq&nbsp;($(HOST_OS),darwin)<br/>
ARM_CROSS_COMPILE:=CROSS_COMPILE="$(ccache)&nbsp;$(ANDROID_BUILD_TOP)/prebuilt/darwin-x86/toolchain/$(TARGET_KERNEL_CUSTOM_TOOLCHAIN)/bin/arm-eabi-"<br/>
&nbsp;&nbsp;else<br/>
ARM_CROSS_COMPILE:=CROSS_COMPILE="$(ccache)&nbsp;$(ANDROID_BUILD_TOP)/prebuilt/linux-x86/toolchain/$(TARGET_KERNEL_CUSTOM_TOOLCHAIN)/bin/arm-eabi-"<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;ARM_CROSS_COMPILE:=CROSS_COMPILE="$(ccache)&nbsp;$(ARM_EABI_TOOLCHAIN)/arm-eabi-"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="MAKE_FLAGS">MAKE_FLAGS</a></h3>
<p>
ifeq&nbsp;($(HOST_OS),darwin)<br/>
&nbsp;&nbsp;MAKE_FLAGS&nbsp;:=&nbsp;C_INCLUDE_PATH=$(ANDROID_BUILD_TOP)/external/elfutils/libelf<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_KERNEL_MODULES">TARGET_KERNEL_MODULES</a></h3>
<p>
ifeq&nbsp;($(TARGET_KERNEL_MODULES),)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;TARGET_KERNEL_MODULES&nbsp;:=&nbsp;no-external-modules<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(KERNEL_OUT)">Target:&nbsp;&nbsp;$(KERNEL_OUT)</a></h3>
<p>
创建$(KERNEL_OUT)目录<br/>
即目录out/target/product/i9100/obj/KERNEL_OBJ<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(KERNEL_CONFIG)">Target:&nbsp;&nbsp;$(KERNEL_CONFIG)</a></h3>
<p>
生成编译内核源代码用的配置文件<br/>
$(KERNEL_CONFIG):&nbsp;$(KERNEL_OUT)<br/>
&nbsp;&nbsp;&nbsp;$(MAKE)&nbsp;$(MAKE_FLAGS)&nbsp;-C&nbsp;$(KERNEL_SRC)&nbsp;O=$(KERNEL_OUT)&nbsp;ARCH=$(TARGET_ARCH)&nbsp;$(ARM_CROSS_COMPILE)&nbsp;VARIANT_DEFCONFIG=$(VARIANT_DEFCONFIG)&nbsp;SELINUX_DEFCONFIG=$(SELINUX_DEFCONFIG)&nbsp;$(KERNEL_DEFCONFIG)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(KERNEL_OUT)/piggy">Target:&nbsp;&nbsp;$(KERNEL_OUT)/piggy</a></h3>
<p>
生成piggy内核<br/>
$(KERNEL_OUT)/piggy&nbsp;:&nbsp;$(TARGET_PREBUILT_INT_KERNEL)<br/>
$(hide)&nbsp;gunzip&nbsp;-c&nbsp;$(KERNEL_OUT)/arch/$(TARGET_ARCH)/boot/compressed/piggy.gzip&nbsp;>&nbsp;$(KERNEL_OUT)/piggy<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_KERNEL_BINARIES">TARGET_KERNEL_BINARIES</a></h3>
<p>
生成内核，并安装好模块<br/>
TARGET_KERNEL_BINARIES:&nbsp;$(KERNEL_OUT)&nbsp;$(KERNEL_CONFIG)&nbsp;$(KERNEL_HEADERS_INSTALL)<br/>
#生成内核<br/>
$(MAKE)&nbsp;$(MAKE_FLAGS)&nbsp;-C&nbsp;$(KERNEL_SRC)&nbsp;O=$(KERNEL_OUT)&nbsp;ARCH=$(TARGET_ARCH)&nbsp;$(ARM_CROSS_COMPILE)&nbsp;$(TARGET_PREBUILT_INT_KERNEL_TYPE)<br/>
#生成模块<br/>
-$(MAKE)&nbsp;$(MAKE_FLAGS)&nbsp;-C&nbsp;$(KERNEL_SRC)&nbsp;O=$(KERNEL_OUT)&nbsp;ARCH=$(TARGET_ARCH)&nbsp;$(ARM_CROSS_COMPILE)&nbsp;modules<br/>
#安装模块至system/lib/modules目录，但是还需strip处理<br/>
-$(MAKE)&nbsp;$(MAKE_FLAGS)&nbsp;-C&nbsp;$(KERNEL_SRC)&nbsp;O=$(KERNEL_OUT)&nbsp;INSTALL_MOD_PATH=../../$(KERNEL_MODULES_INSTALL)&nbsp;ARCH=$(TARGET_ARCH)&nbsp;$(ARM_CROSS_COMPILE)&nbsp;modules_install<br/>
$(mv-modules)<br/>
$(clean-module-folder)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(TARGET_PREBUILT_INT_KERNEL)">Target:&nbsp;&nbsp;$(TARGET_PREBUILT_INT_KERNEL)</a></h3>
<p>
安装模块，并清除先前不用的模块所在目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_PREBUILT">ALL_PREBUILT</a></h3>
<p>
ALL_PREBUILT&nbsp;+=&nbsp;$(file)<br/>
$(file)&nbsp;:&nbsp;$(KERNEL_BIN)&nbsp;|&nbsp;$(ACP)<br/>
&nbsp;&nbsp;&nbsp;$(transform-prebuilt-to-target)<br/>
ALL_PREBUILT&nbsp;+=&nbsp;$(INSTALLED_KERNEL_TARGET)<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
