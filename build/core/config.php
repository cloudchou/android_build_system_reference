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
<h3>build/core/config.mk</h3>
<p>
定义了一些SRC_*的变量，还定义了生成某个类型目标用的变量，如果模块的android.mk包含该变量，表示该模块将生成该类型的目标文件<br/>
This&nbsp;is&nbsp;included&nbsp;by&nbsp;the&nbsp;top-level&nbsp;Makefile&nbsp;It&nbsp;sets&nbsp;up&nbsp;standard&nbsp;variables&nbsp;based&nbsp;on&nbsp;the&nbsp;current&nbsp;configuration&nbsp;and&nbsp;platform,&nbsp;which<br/>
are&nbsp;not&nbsp;specific&nbsp;to&nbsp;what&nbsp;is&nbsp;being&nbsp;built.<br/>
该文件还会选择编译工具链，通过<br/>
combo_target&nbsp;:=&nbsp;HOST_<br/>
&nbsp;include&nbsp;$(BUILD_SYSTEM)/combo/select.mk<br/>
&nbsp;select.mk会包含HOST_linux-x86.mk，里面定义了编译工具链<br/>
combo_target&nbsp;:=&nbsp;TARGET_<br/>
&nbsp;include&nbsp;$(BUILD_SYSTEM)/combo/select.mk<br/>
&nbsp;select.mk会包含TARGET_linux-arm.mk，里面定义了编译工具链<br/>
</p>
</div>
<div class="variable">
<h3><a id="SHELL">■ &nbsp;&nbsp;SHELL</a></h3>
<p>
用于和系统交互的shell<br/>
ifdef&nbsp;ANDROID_BUILD_SHELL<br/>
&nbsp;&nbsp;SHELL&nbsp;:=&nbsp;$(ANDROID_BUILD_SHELL)<br/>
else<br/>
&nbsp;&nbsp;SHELL&nbsp;:=&nbsp;/bin/bash&nbsp;#只能用bash<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="empty">■ &nbsp;&nbsp;empty</a></h3>
<p>
空变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="space">■ &nbsp;&nbsp;space</a></h3>
<p>
空格变量space&nbsp;:=&nbsp;$(empty)&nbsp;$(empty)<br/>
</p>
</div>
<div class="variable">
<h3><a id="comma">■ &nbsp;&nbsp;comma</a></h3>
<p>
逗号comma&nbsp;:=&nbsp;,<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_DOCS">■ &nbsp;&nbsp;SRC_DOCS</a></h3>
<p>
Standard&nbsp;source&nbsp;directories<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_HEADERS">■ &nbsp;&nbsp;SRC_HEADERS</a></h3>
<p>
目前在Android编译系统里，编译c代码时，有一份统一的系统头文件目录<br/>
因此在编译时可以看到会显示一堆的include，<br/>
SRC_HEADERS&nbsp;:=&nbsp;\<br/>
$(TOPDIR)system/core/include&nbsp;\<br/>
$(TOPDIR)hardware/libhardware/include&nbsp;\<br/>
$(TOPDIR)hardware/libhardware_legacy/include&nbsp;\<br/>
$(TOPDIR)hardware/ril/include&nbsp;\<br/>
$(TOPDIR)libnativehelper/include&nbsp;\<br/>
$(TOPDIR)frameworks/native/include&nbsp;\<br/>
$(TOPDIR)frameworks/native/opengl/include&nbsp;\<br/>
$(TOPDIR)frameworks/av/include&nbsp;\<br/>
$(TOPDIR)frameworks/base/include&nbsp;\<br/>
$(TOPDIR)frameworks/base/opengl/include&nbsp;\<br/>
$(TOPDIR)external/skia/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_HOST_HEADERS">■ &nbsp;&nbsp;SRC_HOST_HEADERS</a></h3>
<p>
编译host上的目标文件时的头文件目录<br/>
SRC_HOST_HEADERS:=$(TOPDIR)tools/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_LIBRARIES">■ &nbsp;&nbsp;SRC_LIBRARIES</a></h3>
<p>
要链接的库的目录<br/>
SRC_LIBRARIES:=&nbsp;$(TOPDIR)libs<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_SERVERS">■ &nbsp;&nbsp;SRC_SERVERS</a></h3>
<p>
SRC_SERVERS:=&nbsp;$(TOPDIR)servers<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_TARGET_DIR">■ &nbsp;&nbsp;SRC_TARGET_DIR</a></h3>
<p>
SRC_TARGET_DIR&nbsp;:=&nbsp;$(TOPDIR)build/target<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_API_DIR">■ &nbsp;&nbsp;SRC_API_DIR</a></h3>
<p>
SRC_API_DIR&nbsp;:=&nbsp;$(TOPDIR)frameworks/base/api<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_DROIDDOC_DIR">■ &nbsp;&nbsp;SRC_DROIDDOC_DIR</a></h3>
<p>
Some&nbsp;specific&nbsp;paths&nbsp;to&nbsp;tools<br/>
生成文档用的东东<br/>
SRC_DROIDDOC_DIR&nbsp;:=&nbsp;$(TOPDIR)build/tools/droiddoc<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_COMBOS">■ &nbsp;&nbsp;BUILD_COMBOS</a></h3>
<p>
BUILD_COMBOS:=&nbsp;$(BUILD_SYSTEM)/combo<br/>
build/core/combo<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLEAR_VARS">■ &nbsp;&nbsp;CLEAR_VARS</a></h3>
<p>
用于清除LOCAL_*变量，几乎每个模块的Android.mk都会包含该变量&nbsp;<br/>
CLEAR_VARS:=&nbsp;$(BUILD_SYSTEM)/clear_vars.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_STATIC_LIBRARY">■ &nbsp;&nbsp;BUILD_HOST_STATIC_LIBRARY</a></h3>
<p>
编译成主机静态库使用的makefile<br/>
&nbsp;BUILD_HOST_STATIC_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_SHARED_LIBRARY">■ &nbsp;&nbsp;BUILD_HOST_SHARED_LIBRARY</a></h3>
<p>
编译成主机动态库使用的makefile<br/>
&nbsp;&nbsp;&nbsp;&nbsp;BUILD_HOST_SHARED_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_shared_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_STATIC_LIBRARY">■ &nbsp;&nbsp;BUILD_STATIC_LIBRARY</a></h3>
<p>
编译成静态库使用的makefile&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;BUILD_STATIC_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_RAW_STATIC_LIBRARY">■ &nbsp;&nbsp;BUILD_RAW_STATIC_LIBRARY</a></h3>
<p>
编译成原始静态库使用的makefile&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;BUILD_RAW_STATIC_LIBRARY&nbsp;:=&nbsp;$(BUILD_SYSTEM)/raw_static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_SHARED_LIBRARY">■ &nbsp;&nbsp;BUILD_SHARED_LIBRARY</a></h3>
<p>
编译成动态库使用的makefile&nbsp;<br/>
BUILD_SHARED_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/shared_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_EXECUTABLE">■ &nbsp;&nbsp;BUILD_EXECUTABLE</a></h3>
<p>
编译成可执行文件使用的makefile&nbsp;<br/>
BUILD_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_RAW_EXECUTABLE">■ &nbsp;&nbsp;BUILD_RAW_EXECUTABLE</a></h3>
<p>
编译成原生可执行文件使用的makefile&nbsp;<br/>
BUILD_RAW_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/raw_executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_EXECUTABLE">■ &nbsp;&nbsp;BUILD_HOST_EXECUTABLE</a></h3>
<p>
编译成主机可执行文件使用的makefile&nbsp;&nbsp;&nbsp;<br/>
BUILD_HOST_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/host_executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PACKAGE">■ &nbsp;&nbsp;BUILD_PACKAGE</a></h3>
<p>
生成手机app的makefile<br/>
&nbsp;&nbsp;BUILD_PACKAGE:=&nbsp;$(BUILD_SYSTEM)/package.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PHONY_PACKAGE">■ &nbsp;&nbsp;BUILD_PHONY_PACKAGE</a></h3>
<p>
生成伪目标的makefile<br/>
BUILD_PHONY_PACKAGE:=&nbsp;$(BUILD_SYSTEM)/phony_package.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_PREBUILT">■ &nbsp;&nbsp;BUILD_HOST_PREBUILT</a></h3>
<p>
生成主机上预编译可执行文件的makefile，主要是一些编译工具<br/>
BUILD_HOST_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/host_prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PREBUILT">■ &nbsp;&nbsp;BUILD_PREBUILT</a></h3>
<p>
生成预编译可执行文件的makefile，编译目标是编译工具，主要用于生成手机上可执行程序<br/>
&nbsp;&nbsp;BUILD_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_MULTI_PREBUILT">■ &nbsp;&nbsp;BUILD_MULTI_PREBUILT</a></h3>
<p>
多个prebuilt目标的makefile<br/>
在packages/apps/VideoEditor/Android.mk中有用到<br/>
&nbsp;&nbsp;BUILD_MULTI_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/multi_prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_JAVA_LIBRARY">■ &nbsp;&nbsp;BUILD_JAVA_LIBRARY</a></h3>
<p>
编译为java库&nbsp;<br/>
frameworks/base/cmds/pm/Android.mk&nbsp;有用到，<br/>
将安装在手机上的system/framework/pm.jar<br/>
&nbsp;&nbsp;BUILD_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/java_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_STATIC_JAVA_LIBRARY">■ &nbsp;&nbsp;BUILD_STATIC_JAVA_LIBRARY</a></h3>
<p>
BUILD_STATIC_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/static_java_library.mk<br/>
frameworks/support/v4/Android.mk有用到<br/>
编译为java库，用于sdk开发&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_JAVA_LIBRARY">■ &nbsp;&nbsp;BUILD_HOST_JAVA_LIBRARY</a></h3>
<p>
编译为主机上运行的java库<br/>
BUILD_HOST_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_java_library.mk<br/>
development/tools/hosttestlib&nbsp;中有用到<br/>
build/tools/signapk/Android.mk&nbsp;中有用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_DROIDDOC">■ &nbsp;&nbsp;BUILD_DROIDDOC</a></h3>
<p>
生成文档的目标&nbsp;<br/>
BUILD_DROIDDOC:=&nbsp;$(BUILD_SYSTEM)/droiddoc.mk<br/>
frameworks/base/Android.mk中有用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_COPY_HEADERS">■ &nbsp;&nbsp;BUILD_COPY_HEADERS</a></h3>
<p>
BUILD_COPY_HEADERS&nbsp;:=&nbsp;$(BUILD_SYSTEM)/copy_headers.mk<br/>
build/core/binary.mk有用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_NATIVE_TEST">■ &nbsp;&nbsp;BUILD_NATIVE_TEST</a></h3>
<p>
BUILD_NATIVE_TEST&nbsp;:=&nbsp;$(BUILD_SYSTEM)/native_test.mk<br/>
bionic/tests/Android.mk中有用到<br/>
用于本地代码测试<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_NATIVE_TEST">■ &nbsp;&nbsp;BUILD_HOST_NATIVE_TEST</a></h3>
<p>
用于主机上的本地代码测试<br/>
&nbsp;&nbsp;BUILD_HOST_NATIVE_TEST&nbsp;:=&nbsp;$(BUILD_SYSTEM)/host_native_test.mk<br/>
&nbsp;&nbsp;dalvik/unit-tests/Android.mk&nbsp;中有用到&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="SHOW_COMMANDS">■ &nbsp;&nbsp;SHOW_COMMANDS</a></h3>
<p>
The&nbsp;'showcommands'&nbsp;goal&nbsp;says&nbsp;to&nbsp;show&nbsp;the&nbsp;full&nbsp;command<br/>
lines&nbsp;being&nbsp;executed,&nbsp;instead&nbsp;of&nbsp;a&nbsp;short&nbsp;message&nbsp;about<br/>
the&nbsp;kind&nbsp;of&nbsp;operation&nbsp;being&nbsp;done.<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_GLOBAL_CFLAGS">■ &nbsp;&nbsp;COMMON_GLOBAL_CFLAGS</a></h3>
<p>
COMMON_GLOBAL_CFLAGS:=&nbsp;-DANDROID&nbsp;-fmessage-length=0&nbsp;-W&nbsp;-Wall&nbsp;-Wno-unused&nbsp;-Winit-self&nbsp;-Wpointer-arith<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_RELEASE_CFLAGS">■ &nbsp;&nbsp;COMMON_RELEASE_CFLAGS</a></h3>
<p>
COMMON_RELEASE_CFLAGS:=&nbsp;-DNDEBUG&nbsp;-UDEBUG<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_GLOBAL_CPPFLAGS">■ &nbsp;&nbsp;COMMON_GLOBAL_CPPFLAGS</a></h3>
<p>
COMMON_GLOBAL_CPPFLAGS:=&nbsp;$(COMMON_GLOBAL_CFLAGS)&nbsp;-Wsign-promo<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_RELEASE_CPPFLAGS">■ &nbsp;&nbsp;COMMON_RELEASE_CPPFLAGS</a></h3>
<p>
COMMON_RELEASE_CPPFLAGS:=&nbsp;$(COMMON_RELEASE_CFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_PACKAGE_SUFFIX">■ &nbsp;&nbsp;COMMON_PACKAGE_SUFFIX</a></h3>
<p>
COMMON_PACKAGE_SUFFIX&nbsp;:=&nbsp;.zip<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_JAVA_PACKAGE_SUFFIX">■ &nbsp;&nbsp;COMMON_JAVA_PACKAGE_SUFFIX</a></h3>
<p>
COMMON_JAVA_PACKAGE_SUFFIX&nbsp;:=&nbsp;.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_ANDROID_PACKAGE_SUFFIX">■ &nbsp;&nbsp;COMMON_ANDROID_PACKAGE_SUFFIX</a></h3>
<p>
COMMON_ANDROID_PACKAGE_SUFFIX&nbsp;:=&nbsp;.apk<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ERROR_FLAGS">■ &nbsp;&nbsp;TARGET_ERROR_FLAGS</a></h3>
<p>
TARGET_ERROR_FLAGS&nbsp;:=&nbsp;-Werror=return-type&nbsp;-Werror=non-virtual-dtor&nbsp;-Werror=address&nbsp;-Werror=sequence-point<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COMPRESS_MODULE_SYMBOLS">■ &nbsp;&nbsp;TARGET_COMPRESS_MODULE_SYMBOLS</a></h3>
<p>
TARGET_COMPRESS_MODULE_SYMBOLS&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_SHELL">■ &nbsp;&nbsp;TARGET_SHELL</a></h3>
<p>
TARGET_SHELL&nbsp;:=&nbsp;mksh<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DEVICE_DIR">■ &nbsp;&nbsp;TARGET_DEVICE_DIR</a></h3>
<p>
TARGET_DEVICE_DIR&nbsp;:=&nbsp;$(patsubst&nbsp;%/,%,$(dir&nbsp;$(board_config_mk)))<br/>
设备配置文件所在目录<br/>
例如device/samsung/i9100g<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DEVICE_KERNEL_HEADERS">■ &nbsp;&nbsp;TARGET_DEVICE_KERNEL_HEADERS</a></h3>
<p>
TARGET_DEVICE_KERNEL_HEADERS&nbsp;is&nbsp;automatically&nbsp;created&nbsp;for&nbsp;the&nbsp;current<br/>
&nbsp;device&nbsp;being&nbsp;built.&nbsp;It&nbsp;is&nbsp;set&nbsp;as&nbsp;$(TARGET_DEVICE_DIR)/kernel-headers,<br/>
&nbsp;e.g.&nbsp;device/samsung/tuna/kernel-headers.&nbsp;This&nbsp;directory&nbsp;is&nbsp;not<br/>
&nbsp;explicitly&nbsp;set&nbsp;by&nbsp;anyone,&nbsp;the&nbsp;build&nbsp;system&nbsp;always&nbsp;adds&nbsp;this&nbsp;subdir.<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BOARD_KERNEL_HEADERS">■ &nbsp;&nbsp;TARGET_BOARD_KERNEL_HEADERS</a></h3>
<p>
TARGET_BOARD_KERNEL_HEADERS&nbsp;is&nbsp;specified&nbsp;by&nbsp;the&nbsp;BoardConfig.mk&nbsp;file<br/>
to&nbsp;allow&nbsp;other&nbsp;directories&nbsp;to&nbsp;be&nbsp;included.&nbsp;This&nbsp;is&nbsp;useful&nbsp;if&nbsp;there's<br/>
&nbsp;&nbsp;some&nbsp;common&nbsp;place&nbsp;where&nbsp;a&nbsp;few&nbsp;headers&nbsp;are&nbsp;being&nbsp;kept&nbsp;for&nbsp;a&nbsp;group<br/>
of&nbsp;devices.&nbsp;For&nbsp;example,&nbsp;device/<vendor>/common/kernel-headers&nbsp;could<br/>
contain&nbsp;some&nbsp;headers&nbsp;for&nbsp;several&nbsp;of&nbsp;<vendor>'s&nbsp;devices.&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PRODUCT_KERNEL_HEADERS">■ &nbsp;&nbsp;TARGET_PRODUCT_KERNEL_HEADERS</a></h3>
<p>
TARGET_PRODUCT_KERNEL_HEADERS&nbsp;is&nbsp;generated&nbsp;by&nbsp;the&nbsp;product&nbsp;inheritance<br/>
&nbsp;graph.&nbsp;This&nbsp;allows&nbsp;architecture&nbsp;products&nbsp;to&nbsp;provide&nbsp;headers&nbsp;for&nbsp;the<br/>
&nbsp;&nbsp;devices&nbsp;using&nbsp;that&nbsp;architecture.&nbsp;For&nbsp;example,<br/>
&nbsp;hardware/ti/omap4xxx/omap4.mk&nbsp;will&nbsp;specify<br/>
PRODUCT_VENDOR_KERNEL_HEADERS&nbsp;variable&nbsp;that&nbsp;specify&nbsp;where&nbsp;the&nbsp;omap4<br/>
specific&nbsp;headers&nbsp;are,&nbsp;e.g.&nbsp;hardware/ti/omap4xxx/kernel-headers.<br/>
The&nbsp;build&nbsp;system&nbsp;then&nbsp;combines&nbsp;all&nbsp;the&nbsp;values&nbsp;specified&nbsp;by&nbsp;all&nbsp;the<br/>
PRODUCT_VENDOR_KERNEL_HEADERS&nbsp;directives&nbsp;in&nbsp;the&nbsp;product&nbsp;inheritance<br/>
tree&nbsp;and&nbsp;then&nbsp;exports&nbsp;a&nbsp;TARGET_PRODUCT_KERNEL_HEADERS&nbsp;variable.&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[validate-kernel-headers]">■ &nbsp;&nbsp;[validate-kernel-headers]</a></h3>
<p>
校验内核头文件目录是否正确，内核头文件目录必须命名为kernel-headers<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BOOTLOADER_BOARD_NAME">■ &nbsp;&nbsp;TARGET_BOOTLOADER_BOARD_NAME</a></h3>
<p>
bootloader用的板子的名字<br/>
device/samsung/i9100g/BoardConfig.mk:27:TARGET_BOOTLOADER_BOARD_NAME&nbsp;:=&nbsp;t1<br/>
device/oppo/find5/BoardConfig.mk:55:TARGET_BOOTLOADER_BOARD_NAME&nbsp;:=&nbsp;find5<br/>
build/tools/buildinfo.sh用来生成属性文件：<br/>
&nbsp;&nbsp;echo&nbsp;"ro.product.board=$TARGET_BOOTLOADER_BOARD_NAME"<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CPU_ABI">■ &nbsp;&nbsp;TARGET_CPU_ABI</a></h3>
<p>
cpu体系结构&nbsp;<br/>
device/oppo/find5/BoardConfig.mk:21:TARGET_CPU_ABI&nbsp;:=&nbsp;armeabi-v7a<br/>
device/samsung/omap4-common/BoardConfigCommon.mk:25:TARGET_CPU_ABI&nbsp;:=&nbsp;armeabi-v7a<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CPU_ABI2">■ &nbsp;&nbsp;TARGET_CPU_ABI2</a></h3>
<p>
cpu兼容体系结构<br/>
&nbsp;&nbsp;device/samsung/omap4-common/BoardConfigCommon.mk:26:TARGET_CPU_ABI2&nbsp;:=&nbsp;armeabi<br/>
&nbsp;&nbsp;device/oppo/find5/BoardConfig.mk:22:TARGET_CPU_ABI2&nbsp;:=&nbsp;armeabi<br/>
</p>
</div>
<div class="variable">
<h3><a id="[select-android-config-h]">■ &nbsp;&nbsp;[select-android-config-h]</a></h3>
<p>
选择体系结构配置文件目录<br/>
$(1):&nbsp;os/arch<br/>
例：select-android-config-h&nbsp;linux/arm<br/>
返回&nbsp;build/core/combo/include/arch/linux/arm/Android/Config.h<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLCHAIN_ROOT">■ &nbsp;&nbsp;TARGET_TOOLCHAIN_ROOT</a></h3>
<p>
编译工具链的根目录<br/>
在combo_target&nbsp;:=&nbsp;TARGET_<br/>
&nbsp;&nbsp;include&nbsp;$(BUILD_SYSTEM)/combo/select.mk时，<br/>
&nbsp;&nbsp;select.mk将会包含TARGET_linux-arm.mk，<br/>
&nbsp;&nbsp;而在该makefile里定义了TARGET_TOOLCHAIN_ROOT变量<br/>
TARGET_TOOLCHAIN_ROOT&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/arm/arm-linux-androideabi-4.6&nbsp;&nbsp;<br/>
prebuilts/gcc/linux-x86/arm/arm-linux-androideabi-4.6<br/>
</p>
</div>
<div class="variable">
<h3><a id="[LEX]">■ &nbsp;&nbsp;[LEX]</a></h3>
<p>
LEX:=&nbsp;flex<br/>
</p>
</div>
<div class="variable">
<h3><a id="[YACC]">■ &nbsp;&nbsp;[YACC]</a></h3>
<p>
YACC:=&nbsp;bison&nbsp;-d<br/>
</p>
</div>
<div class="variable">
<h3><a id="[DOXYGEN:=]">■ &nbsp;&nbsp;[DOXYGEN:=]</a></h3>
<p>
DOXYGEN:=&nbsp;doxygen<br/>
</p>
</div>
<div class="variable">
<h3><a id="[AAPT]">■ &nbsp;&nbsp;[AAPT]</a></h3>
<p>
AAPT&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aapt$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[AIDL]">■ &nbsp;&nbsp;[AIDL]</a></h3>
<p>
AIDL&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aidl$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[PROTOC]">■ &nbsp;&nbsp;[PROTOC]</a></h3>
<p>
PROTOC&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aprotoc$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[ICUDATA]">■ &nbsp;&nbsp;[ICUDATA]</a></h3>
<p>
ICUDATA&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/icudata$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[SIGNAPK_JAR]">■ &nbsp;&nbsp;[SIGNAPK_JAR]</a></h3>
<p>
SIGNAPK_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/signapk$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKBOOTFS]">■ &nbsp;&nbsp;[MKBOOTFS]</a></h3>
<p>
MKBOOTFS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkbootfs$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MINIGZIP]">■ &nbsp;&nbsp;[MINIGZIP]</a></h3>
<p>
MINIGZIP&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/minigzip$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKBOOTIMG]">■ &nbsp;&nbsp;[MKBOOTIMG]</a></h3>
<p>
MKBOOTIMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkbootimg$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKYAFFS2]">■ &nbsp;&nbsp;[MKYAFFS2]</a></h3>
<p>
MKYAFFS2&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkyaffs2image$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[APICHECK]">■ &nbsp;&nbsp;[APICHECK]</a></h3>
<p>
APICHECK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/apicheck$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKIMAGE]">■ &nbsp;&nbsp;[MKIMAGE]</a></h3>
<p>
MKIMAGE&nbsp;:=&nbsp;&nbsp;$(HOST_OUT_EXECUTABLES)/mkimage$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[FS_GET_STATS]">■ &nbsp;&nbsp;[FS_GET_STATS]</a></h3>
<p>
FS_GET_STATS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/fs_get_stats$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKEXT2IMG]">■ &nbsp;&nbsp;[MKEXT2IMG]</a></h3>
<p>
MKEXT2IMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/genext2fs$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MAKE_EXT4FS]">■ &nbsp;&nbsp;[MAKE_EXT4FS]</a></h3>
<p>
MAKE_EXT4FS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/make_ext4fs$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKEXTUSERIMG]">■ &nbsp;&nbsp;[MKEXTUSERIMG]</a></h3>
<p>
MKEXTUSERIMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkuserimg.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKEXT2BOOTIMG]">■ &nbsp;&nbsp;[MKEXT2BOOTIMG]</a></h3>
<p>
MKEXT2BOOTIMG&nbsp;:=&nbsp;external/genext2fs/mkbootimg_ext2.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="[SIMG2IMG]">■ &nbsp;&nbsp;[SIMG2IMG]</a></h3>
<p>
SIMG2IMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/simg2img$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[E2FSCK]">■ &nbsp;&nbsp;[E2FSCK]</a></h3>
<p>
E2FSCK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/e2fsck$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[MKTARBALL]">■ &nbsp;&nbsp;[MKTARBALL]</a></h3>
<p>
MKTARBALL&nbsp;:=&nbsp;build/tools/mktarball.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="[TUNE2FS]">■ &nbsp;&nbsp;[TUNE2FS]</a></h3>
<p>
TUNE2FS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/tune2fs$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[E2FSCK]">■ &nbsp;&nbsp;[E2FSCK]</a></h3>
<p>
E2FSCK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/e2fsck$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[JARJAR]">■ &nbsp;&nbsp;[JARJAR]</a></h3>
<p>
JARJAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/jarjar.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="[PROGUARD]">■ &nbsp;&nbsp;[PROGUARD]</a></h3>
<p>
PROGUARD&nbsp;:=&nbsp;external/proguard/bin/proguard.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="[JAVATAGS]">■ &nbsp;&nbsp;[JAVATAGS]</a></h3>
<p>
JAVATAGS&nbsp;:=&nbsp;build/tools/java-event-log-tags.py<br/>
</p>
</div>
<div class="variable">
<h3><a id="[LLVM_RS_CC]">■ &nbsp;&nbsp;[LLVM_RS_CC]</a></h3>
<p>
LLVM_RS_CC&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-rs-cc$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[LLVM_RS_LINK]">■ &nbsp;&nbsp;[LLVM_RS_LINK]</a></h3>
<p>
LLVM_RS_LINK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-rs-link$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[DEXOPT]">■ &nbsp;&nbsp;[DEXOPT]</a></h3>
<p>
DEXOPT&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/dexopt$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[DEXPREOPT]">■ &nbsp;&nbsp;[DEXPREOPT]</a></h3>
<p>
DEXPREOPT&nbsp;:=&nbsp;dalvik/tools/dex-preopt<br/>
</p>
</div>
<div class="variable">
<h3><a id="[LINT]">■ &nbsp;&nbsp;[LINT]</a></h3>
<p>
LINT&nbsp;:=&nbsp;prebuilts/sdk/tools/lint<br/>
</p>
</div>
<div class="variable">
<h3><a id="[ACP]">■ &nbsp;&nbsp;[ACP]</a></h3>
<p>
ACP&nbsp;:=&nbsp;$(BUILD_OUT_EXECUTABLES)/acp$(BUILD_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[DX]">■ &nbsp;&nbsp;[DX]</a></h3>
<p>
DX&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/dx<br/>
</p>
</div>
<div class="variable">
<h3><a id="[ZIPALIGN]">■ &nbsp;&nbsp;[ZIPALIGN]</a></h3>
<p>
ZIPALIGN&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/zipalign$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[FINDBUGS]">■ &nbsp;&nbsp;[FINDBUGS]</a></h3>
<p>
FINDBUGS&nbsp;:=&nbsp;prebuilt/common/findbugs/bin/findbugs<br/>
</p>
</div>
<div class="variable">
<h3><a id="[EMMA_JAR]">■ &nbsp;&nbsp;[EMMA_JAR]</a></h3>
<p>
EMMA_JAR&nbsp;:=&nbsp;external/emma/lib/emma$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[YACC_HEADER_SUFFIX]">■ &nbsp;&nbsp;[YACC_HEADER_SUFFIX]</a></h3>
<p>
ifeq($(filter1.28,$(shell$(YACC)-V)),)<br/>
YACC_HEADER_SUFFIX:=.hpp<br/>
else<br/>
YACC_HEADER_SUFFIX:=.cpp.h<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="COLUMN">■ &nbsp;&nbsp;COLUMN</a></h3>
<p>
ifeq&nbsp;($(HOST_OS),windows)<br/>
COLUMN:=&nbsp;cat<br/>
else<br/>
COLUMN:=&nbsp;column<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="OLD_FLEX">■ &nbsp;&nbsp;OLD_FLEX</a></h3>
<p>
prebuilts/misc/$(HOST_PREBUILT_TAG)/flex/flex-2.5.4a$(HOST_EXECUTABLE_SUFFIX)<br/>
例：<br/>
prebuilts/misc/hlinux-x86/flex/flex-2.5.4a<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JDK_TOOLS_JAR">■ &nbsp;&nbsp;HOST_JDK_TOOLS_JAR</a></h3>
<p>
ifeq&nbsp;($(BUILD_OS),darwin)<br/>
#&nbsp;Mac&nbsp;OS'&nbsp;screwy&nbsp;version&nbsp;of&nbsp;java&nbsp;uses&nbsp;a&nbsp;non-standard&nbsp;directory&nbsp;layout<br/>
#&nbsp;and&nbsp;doesn't&nbsp;even&nbsp;seem&nbsp;to&nbsp;have&nbsp;tools.jar.&nbsp;&nbsp;On&nbsp;the&nbsp;other&nbsp;hand,&nbsp;javac&nbsp;seems<br/>
#&nbsp;to&nbsp;be&nbsp;able&nbsp;to&nbsp;magically&nbsp;find&nbsp;the&nbsp;classes&nbsp;in&nbsp;there,&nbsp;wherever&nbsp;they&nbsp;are,&nbsp;so<br/>
#&nbsp;leave&nbsp;this&nbsp;blank<br/>
HOST_JDK_TOOLS_JAR&nbsp;:=<br/>
else<br/>
HOST_JDK_TOOLS_JAR:=&nbsp;$(shell&nbsp;$(BUILD_SYSTEM)/find-jdk-tools-jar.sh)<br/>
ifeq&nbsp;($(wildcard&nbsp;$(HOST_JDK_TOOLS_JAR)),)<br/>
$(error&nbsp;Error:&nbsp;could&nbsp;not&nbsp;find&nbsp;jdk&nbsp;tools.jar,&nbsp;please&nbsp;install&nbsp;JDK6,&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;which&nbsp;you&nbsp;can&nbsp;download&nbsp;from&nbsp;java.sun.com)<br/>
endif<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JDK_IS_64BIT_VERSION">■ &nbsp;&nbsp;HOST_JDK_IS_64BIT_VERSION</a></h3>
<p>
ifneq&nbsp;($(filter&nbsp;64-Bit,&nbsp;$(shell&nbsp;java&nbsp;-version&nbsp;2>&1)),)<br/>
HOST_JDK_IS_64BIT_VERSION&nbsp;:=&nbsp;true<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="MD5SUM">■ &nbsp;&nbsp;MD5SUM</a></h3>
<p>
#&nbsp;It's&nbsp;called&nbsp;md5&nbsp;on&nbsp;Mac&nbsp;OS&nbsp;and&nbsp;md5sum&nbsp;on&nbsp;Linux<br/>
ifeq&nbsp;($(HOST_OS),darwin)<br/>
MD5SUM:=md5&nbsp;-q<br/>
else<br/>
MD5SUM:=md5sum<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="SED_INPLACE">■ &nbsp;&nbsp;SED_INPLACE</a></h3>
<p>
ifeq&nbsp;($(HOST_OS),darwin)<br/>
GSED:=$(shell&nbsp;which&nbsp;gsed)<br/>
ifeq&nbsp;($(GSED),)<br/>
SED_INPLACE:=sed&nbsp;-i&nbsp;''<br/>
else<br/>
SED_INPLACE:=gsed&nbsp;-i<br/>
endif<br/>
else<br/>
SED_INPLACE:=sed&nbsp;-i<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="APICHECK_CLASSPATH">■ &nbsp;&nbsp;APICHECK_CLASSPATH</a></h3>
<p>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(HOST_JDK_TOOLS_JAR)<br/>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(APICHECK_CLASSPATH):$(HOST_OUT_JAVA_LIBRARIES)/doclava$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(APICHECK_CLASSPATH):$(HOST_OUT_JAVA_LIBRARIES)/jsilver$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
APICHECK_COMMAND&nbsp;:=&nbsp;$(APICHECK)&nbsp;-JXmx1024m&nbsp;-J"classpath&nbsp;$(APICHECK_CLASSPATH)"<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEFAULT_SYSTEM_DEV_CERTIFICATE">■ &nbsp;&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE</a></h3>
<p>
ifdef&nbsp;PRODUCT_DEFAULT_DEV_CERTIFICATE<br/>
&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE&nbsp;:=&nbsp;$(PRODUCT_DEFAULT_DEV_CERTIFICATE)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE&nbsp;:=&nbsp;build/target/product/security/testkey<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CFLAGS">■ &nbsp;&nbsp;HOST_GLOBAL_CFLAGS</a></h3>
<p>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;$(COMMON_GLOBAL_CFLAGS)&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_RELEASE_CFLAGS">■ &nbsp;&nbsp;HOST_RELEASE_CFLAGS</a></h3>
<p>
HOST_RELEASE_CFLAGS&nbsp;+=&nbsp;$(COMMON_RELEASE_CFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CPPFLAGS">■ &nbsp;&nbsp;HOST_GLOBAL_CPPFLAGS</a></h3>
<p>
HOST_GLOBAL_CPPFLAGS&nbsp;+=&nbsp;$(COMMON_GLOBAL_CPPFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_RELEASE_CPPFLAGS">■ &nbsp;&nbsp;HOST_RELEASE_CPPFLAGS</a></h3>
<p>
HOST_RELEASE_CPPFLAGS&nbsp;+=&nbsp;$(COMMON_RELEASE_CPPFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_LD_DIRS">■ &nbsp;&nbsp;HOST_GLOBAL_LD_DIRS</a></h3>
<p>
HOST_GLOBAL_LD_DIRS&nbsp;+=&nbsp;-L$(HOST_OUT_INTERMEDIATE_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_LD_DIRS">■ &nbsp;&nbsp;TARGET_GLOBAL_LD_DIRS</a></h3>
<p>
TARGET_GLOBAL_LD_DIRS&nbsp;+=&nbsp;-L$(TARGET_OUT_INTERMEDIATE_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_PROJECT_INCLUDES">■ &nbsp;&nbsp;HOST_PROJECT_INCLUDES</a></h3>
<p>
HOST_PROJECT_INCLUDES:=&nbsp;$(SRC_HEADERS)&nbsp;$(SRC_HOST_HEADERS)&nbsp;$(HOST_OUT_HEADERS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PROJECT_INCLUDES">■ &nbsp;&nbsp;TARGET_PROJECT_INCLUDES</a></h3>
<p>
TARGET_PROJECT_INCLUDES:=&nbsp;$(SRC_HEADERS)&nbsp;$(TARGET_OUT_HEADERS)&nbsp;\<br/>
$(TARGET_DEVICE_KERNEL_HEADERS)&nbsp;$(TARGET_BOARD_KERNEL_HEADERS)&nbsp;\<br/>
$(TARGET_PRODUCT_KERNEL_HEADERS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;$(TARGET_ERROR_FLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CPPFLAGS">■ &nbsp;&nbsp;TARGET_GLOBAL_CPPFLAGS</a></h3>
<p>
TARGET_GLOBAL_CPPFLAGS&nbsp;+=&nbsp;$(TARGET_ERROR_FLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="numerically_sort">■ &nbsp;&nbsp;numerically_sort</a></h3>
<p>
Numerically&nbsp;sort&nbsp;a&nbsp;list&nbsp;of&nbsp;numbers<br/>
$(1):&nbsp;the&nbsp;list&nbsp;of&nbsp;numbers&nbsp;to&nbsp;be&nbsp;sorted<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_AVAILABLE_SDK_VERSIONS">■ &nbsp;&nbsp;TARGET_AVAILABLE_SDK_VERSIONS</a></h3>
<p>
TARGET_AVAILABLE_SDK_VERSIONS&nbsp;:=&nbsp;$(call&nbsp;numerically_sort,\<br/>
&nbsp;$(patsubst&nbsp;$(HISTORICAL_SDK_VERSIONS_ROOT)/%/android.jar,%,&nbsp;\<br/>
&nbsp;$(wildcard&nbsp;$(HISTORICAL_SDK_VERSIONS_ROOT)/*/android.jar)))<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_PLATFORM_API_FILE">■ &nbsp;&nbsp;INTERNAL_PLATFORM_API_FILE</a></h3>
<p>
INTERNAL_PLATFORM_API_FILE&nbsp;:=&nbsp;$(TARGET_OUT_COMMON_INTERMEDIATES)/PACKAGING/public_api.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_TAG">■ &nbsp;&nbsp;TARGET_PREBUILT_TAG</a></h3>
<p>
This&nbsp;is&nbsp;the&nbsp;standard&nbsp;way&nbsp;to&nbsp;name&nbsp;a&nbsp;directory&nbsp;containing&nbsp;prebuilt&nbsp;target<br/>
objects.&nbsp;E.g.,&nbsp;prebuilt/$(TARGET_PREBUILT_TAG)/libc.so<br/>
&nbsp;TARGET_PREBUILT_TAG&nbsp;:=&nbsp;android-$(TARGET_ARCH)<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
