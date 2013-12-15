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
定义了许多变量，SRC_*,&nbsp;BUILD_*，TARGET_*<br/>
还定义了表示生成某个类型目标用的Makefile的变量，<br/>
如果模块的Android.mk包含该变量，表示该模块将生成该类型的目标文件<br/>
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
<h3><a id="SHELL">SHELL</a></h3>
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
<h3><a id="empty">empty</a></h3>
<p>
空变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="space">space</a></h3>
<p>
空格变量space&nbsp;:=&nbsp;$(empty)&nbsp;$(empty)<br/>
</p>
</div>
<div class="variable">
<h3><a id="comma">comma</a></h3>
<p>
逗号comma&nbsp;:=&nbsp;,<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_DOCS">SRC_DOCS</a></h3>
<p>
Standard&nbsp;source&nbsp;directories<br/>
SRC_DOCS:=&nbsp;$(TOPDIR)docs<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_HEADERS">SRC_HEADERS</a></h3>
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
<h3><a id="SRC_HOST_HEADERS">SRC_HOST_HEADERS</a></h3>
<p>
编译host上的目标文件时的头文件目录<br/>
SRC_HOST_HEADERS:=$(TOPDIR)tools/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_LIBRARIES">SRC_LIBRARIES</a></h3>
<p>
要链接的库的目录<br/>
SRC_LIBRARIES:=&nbsp;$(TOPDIR)libs<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_SERVERS">SRC_SERVERS</a></h3>
<p>
servers目录<br/>
SRC_SERVERS:=&nbsp;$(TOPDIR)servers&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_TARGET_DIR">SRC_TARGET_DIR</a></h3>
<p>
build/target目录<br/>
SRC_TARGET_DIR&nbsp;:=&nbsp;$(TOPDIR)build/target<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_API_DIR">SRC_API_DIR</a></h3>
<p>
api目录<br/>
SRC_API_DIR&nbsp;:=&nbsp;$(TOPDIR)frameworks/base/api<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_DROIDDOC_DIR">SRC_DROIDDOC_DIR</a></h3>
<p>
Some&nbsp;specific&nbsp;paths&nbsp;to&nbsp;tools<br/>
生成文档用的东东<br/>
SRC_DROIDDOC_DIR&nbsp;:=&nbsp;$(TOPDIR)build/tools/droiddoc<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_SYSTEM">BUILD_SYSTEM</a></h3>
<p>
build/core目录&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_COMBOS">BUILD_COMBOS</a></h3>
<p>
BUILD_COMBOS:=&nbsp;$(BUILD_SYSTEM)/combo<br/>
示例：build/core/combo<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLEAR_VARS">CLEAR_VARS</a></h3>
<p>
用于清除LOCAL_*变量，几乎每个模块的Android.mk都会包含该变量所指的makefile&nbsp;<br/>
CLEAR_VARS:=&nbsp;$(BUILD_SYSTEM)/clear_vars.mk<br/>
示例：build/core/clear_vars.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_STATIC_LIBRARY">BUILD_HOST_STATIC_LIBRARY</a></h3>
<p>
编译成主机静态库使用的makefile<br/>
&nbsp;BUILD_HOST_STATIC_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_static_library.mk<br/>
&nbsp;示例：build/core/host_static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_SHARED_LIBRARY">BUILD_HOST_SHARED_LIBRARY</a></h3>
<p>
编译成主机动态库使用的makefile<br/>
&nbsp;&nbsp;&nbsp;&nbsp;BUILD_HOST_SHARED_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_shared_library.mk<br/>
&nbsp;&nbsp;&nbsp;&nbsp;示例：build/core/host_shared_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_STATIC_LIBRARY">BUILD_STATIC_LIBRARY</a></h3>
<p>
编译成静态库使用的makefile&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;BUILD_STATIC_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/static_library.mk<br/>
&nbsp;&nbsp;示例：build/core/static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_RAW_STATIC_LIBRARY">BUILD_RAW_STATIC_LIBRARY</a></h3>
<p>
编译成原始静态库使用的makefile&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;BUILD_RAW_STATIC_LIBRARY&nbsp;:=&nbsp;$(BUILD_SYSTEM)/raw_static_library.mk<br/>
&nbsp;&nbsp;示例：build/core/raw_static_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_SHARED_LIBRARY">BUILD_SHARED_LIBRARY</a></h3>
<p>
编译成动态库使用的makefile&nbsp;<br/>
BUILD_SHARED_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/shared_library.mk<br/>
示例：build/core/shared_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_EXECUTABLE">BUILD_EXECUTABLE</a></h3>
<p>
编译成可执行文件使用的makefile&nbsp;<br/>
BUILD_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/executable.mk<br/>
示例：build/core/executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_RAW_EXECUTABLE">BUILD_RAW_EXECUTABLE</a></h3>
<p>
编译成原生可执行文件使用的makefile&nbsp;<br/>
BUILD_RAW_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/raw_executable.mk<br/>
示例：build/core/raw_executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_EXECUTABLE">BUILD_HOST_EXECUTABLE</a></h3>
<p>
编译成主机可执行文件使用的makefile&nbsp;&nbsp;&nbsp;<br/>
BUILD_HOST_EXECUTABLE:=&nbsp;$(BUILD_SYSTEM)/host_executable.mk<br/>
示例：build/core/host_executable.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PACKAGE">BUILD_PACKAGE</a></h3>
<p>
生成手机app的makefile<br/>
&nbsp;&nbsp;BUILD_PACKAGE:=&nbsp;$(BUILD_SYSTEM)/package.mk<br/>
&nbsp;&nbsp;示例：build/core/package.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PHONY_PACKAGE">BUILD_PHONY_PACKAGE</a></h3>
<p>
生成伪目标的makefile<br/>
BUILD_PHONY_PACKAGE:=&nbsp;$(BUILD_SYSTEM)/phony_package.mk<br/>
示例：build/core/phony_package.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_PREBUILT">BUILD_HOST_PREBUILT</a></h3>
<p>
生成主机上预编译可执行文件的makefile，主要是一些编译工具<br/>
BUILD_HOST_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/host_prebuilt.mk<br/>
示例：build/core/host_prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_PREBUILT">BUILD_PREBUILT</a></h3>
<p>
生成预编译可执行文件的makefile，编译目标是编译工具，主要用于生成手机上可执行程序<br/>
&nbsp;&nbsp;BUILD_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/prebuilt.mk<br/>
&nbsp;&nbsp;示例：build/core/prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_MULTI_PREBUILT">BUILD_MULTI_PREBUILT</a></h3>
<p>
多个prebuilt目标的makefile<br/>
在packages/apps/VideoEditor/Android.mk中有用到<br/>
&nbsp;&nbsp;BUILD_MULTI_PREBUILT:=&nbsp;$(BUILD_SYSTEM)/multi_prebuilt.mk<br/>
&nbsp;&nbsp;示例：build/core/multi_prebuilt.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_JAVA_LIBRARY">BUILD_JAVA_LIBRARY</a></h3>
<p>
编译为java库&nbsp;<br/>
frameworks/base/cmds/pm/Android.mk&nbsp;有用到，<br/>
将安装在手机上的system/framework/pm.jar<br/>
&nbsp;&nbsp;BUILD_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/java_library.mk<br/>
&nbsp;&nbsp;示例：build/core/java_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_STATIC_JAVA_LIBRARY">BUILD_STATIC_JAVA_LIBRARY</a></h3>
<p>
BUILD_STATIC_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/static_java_library.mk<br/>
frameworks/support/v4/Android.mk有用到<br/>
编译为java库，用于sdk开发&nbsp;<br/>
示例：build/core/static_java_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_JAVA_LIBRARY">BUILD_HOST_JAVA_LIBRARY</a></h3>
<p>
编译为主机上运行的java库<br/>
BUILD_HOST_JAVA_LIBRARY:=&nbsp;$(BUILD_SYSTEM)/host_java_library.mk<br/>
development/tools/hosttestlib&nbsp;中有用到<br/>
build/tools/signapk/Android.mk&nbsp;中有用到<br/>
示例：build/core/host_java_library.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_DROIDDOC">BUILD_DROIDDOC</a></h3>
<p>
生成文档的目标&nbsp;<br/>
BUILD_DROIDDOC:=&nbsp;$(BUILD_SYSTEM)/droiddoc.mk<br/>
frameworks/base/Android.mk中有用到<br/>
示例：build/core/droiddoc.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_COPY_HEADERS">BUILD_COPY_HEADERS</a></h3>
<p>
BUILD_COPY_HEADERS&nbsp;:=&nbsp;$(BUILD_SYSTEM)/copy_headers.mk<br/>
build/core/binary.mk有用到<br/>
示例：build/core/copy_headers.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_NATIVE_TEST">BUILD_NATIVE_TEST</a></h3>
<p>
BUILD_NATIVE_TEST&nbsp;:=&nbsp;$(BUILD_SYSTEM)/native_test.mk<br/>
bionic/tests/Android.mk中有用到<br/>
用于本地代码测试<br/>
示例：build/core/native_test.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_HOST_NATIVE_TEST">BUILD_HOST_NATIVE_TEST</a></h3>
<p>
用于主机上的本地代码测试<br/>
&nbsp;&nbsp;BUILD_HOST_NATIVE_TEST&nbsp;:=&nbsp;$(BUILD_SYSTEM)/host_native_test.mk<br/>
&nbsp;&nbsp;dalvik/unit-tests/Android.mk&nbsp;中有用到&nbsp;<br/>
&nbsp;&nbsp;示例：build/core/host_native_test.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="SHOW_COMMANDS">SHOW_COMMANDS</a></h3>
<p>
是一个修饰性的目标，如果在编译时加上该参数showcommands，会将执行过程中的命令显示出来<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_GLOBAL_CFLAGS">COMMON_GLOBAL_CFLAGS</a></h3>
<p>
COMMON_GLOBAL_CFLAGS:=&nbsp;-DANDROID&nbsp;-fmessage-length=0&nbsp;-W&nbsp;-Wall&nbsp;-Wno-unused&nbsp;-Winit-self&nbsp;-Wpointer-arith<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_RELEASE_CFLAGS">COMMON_RELEASE_CFLAGS</a></h3>
<p>
COMMON_RELEASE_CFLAGS:=&nbsp;-DNDEBUG&nbsp;-UDEBUG<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_GLOBAL_CPPFLAGS">COMMON_GLOBAL_CPPFLAGS</a></h3>
<p>
COMMON_GLOBAL_CPPFLAGS:=&nbsp;$(COMMON_GLOBAL_CFLAGS)&nbsp;-Wsign-promo<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_RELEASE_CPPFLAGS">COMMON_RELEASE_CPPFLAGS</a></h3>
<p>
COMMON_RELEASE_CPPFLAGS:=&nbsp;$(COMMON_RELEASE_CFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_PACKAGE_SUFFIX">COMMON_PACKAGE_SUFFIX</a></h3>
<p>
包的后缀<br/>
COMMON_PACKAGE_SUFFIX&nbsp;:=&nbsp;.zip<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_JAVA_PACKAGE_SUFFIX">COMMON_JAVA_PACKAGE_SUFFIX</a></h3>
<p>
java包的后缀用jar<br/>
COMMON_JAVA_PACKAGE_SUFFIX&nbsp;:=&nbsp;.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_ANDROID_PACKAGE_SUFFIX">COMMON_ANDROID_PACKAGE_SUFFIX</a></h3>
<p>
Android程序的后缀apk<br/>
&nbsp;&nbsp;COMMON_ANDROID_PACKAGE_SUFFIX&nbsp;:=&nbsp;.apk<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ERROR_FLAGS">TARGET_ERROR_FLAGS</a></h3>
<p>
将警告转为错误的flag列表<br/>
TARGET_ERROR_FLAGS&nbsp;:=&nbsp;-Werror=return-type&nbsp;-Werror=non-virtual-dtor&nbsp;-Werror=address&nbsp;-Werror=sequence-point<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COMPRESS_MODULE_SYMBOLS">TARGET_COMPRESS_MODULE_SYMBOLS</a></h3>
<p>
TARGET_COMPRESS_MODULE_SYMBOLS&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_SHELL">TARGET_SHELL</a></h3>
<p>
在手机上的默认终端,mksh，但是mksh不支持bash的很多功能，不是很好用<br/>
TARGET_SHELL&nbsp;:=&nbsp;mksh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_BUILDSPEC">ANDROID_BUILDSPEC</a></h3>
<p>
buildspec.mk文件，能够建立基础环境，如果该文件不存在，默认是arm&nbsp;build<br/>
ifndef&nbsp;ANDROID_BUILDSPEC<br/>
ANDROID_BUILDSPEC&nbsp;:=&nbsp;$(TOPDIR)buildspec.mk<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DEVICE_DIR">TARGET_DEVICE_DIR</a></h3>
<p>
TARGET_DEVICE_DIR&nbsp;:=&nbsp;$(patsubst&nbsp;%/,%,$(dir&nbsp;$(board_config_mk)))<br/>
设备配置文件所在目录<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;device/samsung/i9100g<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_DEVICE_KERNEL_HEADERS">TARGET_DEVICE_KERNEL_HEADERS</a></h3>
<p>
TARGET_DEVICE_KERNEL_HEADERS&nbsp;是编译系统为当前编译设备自动创建的.<br/>
它将被设置为$(TARGET_DEVICE_DIR)/kernel-headers<br/>
该目录不用被任何人显示指定，编译系统会自动添加该目录<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;device/samsung/tuna/kernel-headers<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BOARD_KERNEL_HEADERS">TARGET_BOARD_KERNEL_HEADERS</a></h3>
<p>
需要在BoardConfig.mk里设置该变量，可允许被其它目录包含该BoardConfig.mk<br/>
这将非常有用，如果能为一组设备创建有一个公共的地方放置共同的头文件.<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;device/<vendor>/common/kernel-headers能存放<vendor>的几个设备的共同内核头文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PRODUCT_KERNEL_HEADERS">TARGET_PRODUCT_KERNEL_HEADERS</a></h3>
<p>
TARGET_PRODUCT_KERNEL_HEADERS是被产品继承图自动生成的.<br/>
这将允许产品为那些使用它架构的设备提供内核头文件<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hardware/ti/omap4xxx/omap4.mk&nbsp;将设置PRODUCT_VENDOR_KERNEL_HEADERS变量，<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_VENDOR_KERNEL_HEADERS&nbsp;:=&nbsp;hardware/ti/omap4xxx/kernel-headers&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;该变量指出使用了omap4架构的内核头文件存放目录<br/>
编译系统将会把产品继承图里的所有变量PRODUCT_VENDOR_KERNEL_HEADERS的值串起来作为TARGET_PRODUCT_KERNEL_HEADERS的值.<br/>
</p>
</div>
<div class="function">
<h3><a id="validate-kernel-headers">Function:&nbsp;&nbsp;validate-kernel-headers</a></h3>
<p>
校验内核头文件目录是否正确，内核头文件目录必须命名为kernel-headers<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BOOTLOADER_BOARD_NAME">TARGET_BOOTLOADER_BOARD_NAME</a></h3>
<p>
bootloader用的板子的名字<br/>
示例：<br/>
&nbsp;&nbsp;device/samsung/i9100g/BoardConfig.mk:27:TARGET_BOOTLOADER_BOARD_NAME&nbsp;:=&nbsp;t1<br/>
&nbsp;&nbsp;device/oppo/find5/BoardConfig.mk:55:TARGET_BOOTLOADER_BOARD_NAME&nbsp;:=&nbsp;find5<br/>
build/tools/buildinfo.sh用来生成属性文件：<br/>
&nbsp;&nbsp;echo&nbsp;"ro.product.board=$TARGET_BOOTLOADER_BOARD_NAME"<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CPU_ABI">TARGET_CPU_ABI</a></h3>
<p>
cpu体系结构&nbsp;<br/>
device/oppo/find5/BoardConfig.mk:21:TARGET_CPU_ABI&nbsp;:=&nbsp;armeabi-v7a<br/>
device/samsung/omap4-common/BoardConfigCommon.mk:25:TARGET_CPU_ABI&nbsp;:=&nbsp;armeabi-v7a<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_CPU_ABI2">TARGET_CPU_ABI2</a></h3>
<p>
cpu兼容体系结构<br/>
&nbsp;&nbsp;device/samsung/omap4-common/BoardConfigCommon.mk:26:TARGET_CPU_ABI2&nbsp;:=&nbsp;armeabi<br/>
&nbsp;&nbsp;device/oppo/find5/BoardConfig.mk:22:TARGET_CPU_ABI2&nbsp;:=&nbsp;armeabi<br/>
</p>
</div>
<div class="function">
<h3><a id="select-android-config-h">Function:&nbsp;&nbsp;select-android-config-h</a></h3>
<p>
选择体系结构配置文件目录<br/>
$(1):&nbsp;os/arch<br/>
例：select-android-config-h&nbsp;linux/arm<br/>
返回&nbsp;build/core/combo/include/arch/linux/arm/Android/Config.h<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_TOOLCHAIN_ROOT">TARGET_TOOLCHAIN_ROOT</a></h3>
<p>
编译工具链的根目录<br/>
在combo_target&nbsp;:=&nbsp;TARGET_<br/>
&nbsp;&nbsp;include&nbsp;$(BUILD_SYSTEM)/combo/select.mk时，<br/>
&nbsp;&nbsp;select.mk将会包含TARGET_linux-arm.mk，<br/>
&nbsp;&nbsp;而在该makefile里定义了TARGET_TOOLCHAIN_ROOT变量<br/>
TARGET_TOOLCHAIN_ROOT&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/arm/arm-linux-androideabi-4.6&nbsp;&nbsp;<br/>
示例：<br/>
&nbsp;&nbsp;prebuilts/gcc/linux-x86/arm/arm-linux-androideabi-4.6<br/>
</p>
</div>
<div class="variable">
<h3><a id="LEX">LEX</a></h3>
<p>
LEX:=&nbsp;flex<br/>
</p>
</div>
<div class="variable">
<h3><a id="YACC">YACC</a></h3>
<p>
YACC:=&nbsp;bison&nbsp;-d<br/>
</p>
</div>
<div class="variable">
<h3><a id="DOXYGEN">DOXYGEN</a></h3>
<p>
DOXYGEN:=&nbsp;doxygen<br/>
</p>
</div>
<div class="variable">
<h3><a id="AAPT">AAPT</a></h3>
<p>
AAPT&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aapt$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/aapt<br/>
</p>
</div>
<div class="variable">
<h3><a id="AIDL">AIDL</a></h3>
<p>
AIDL&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aidl$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/aidl<br/>
</p>
</div>
<div class="variable">
<h3><a id="PROTOC">PROTOC</a></h3>
<p>
PROTOC&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/aprotoc$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/aprotoc<br/>
</p>
</div>
<div class="variable">
<h3><a id="ICUDATA">ICUDATA</a></h3>
<p>
ICUDATA&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/icudata$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/icudata<br/>
</p>
</div>
<div class="variable">
<h3><a id="SIGNAPK_JAR">SIGNAPK_JAR</a></h3>
<p>
SIGNAPK_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/signapk$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/framework/signapk.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKBOOTFS">MKBOOTFS</a></h3>
<p>
MKBOOTFS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkbootfs$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/mkbootfs<br/>
</p>
</div>
<div class="variable">
<h3><a id="MINIGZIP">MINIGZIP</a></h3>
<p>
MINIGZIP&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/minigzip$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/minigzip<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKBOOTIMG">MKBOOTIMG</a></h3>
<p>
MKBOOTIMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkbootimg$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/mkbootimg<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKYAFFS2">MKYAFFS2</a></h3>
<p>
MKYAFFS2&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkyaffs2image$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/mkyaffs2image<br/>
</p>
</div>
<div class="variable">
<h3><a id="APICHECK">APICHECK</a></h3>
<p>
APICHECK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/apicheck$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/apicheck<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKIMAGE">MKIMAGE</a></h3>
<p>
MKIMAGE&nbsp;:=&nbsp;&nbsp;$(HOST_OUT_EXECUTABLES)/mkimage$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/mkimage<br/>
</p>
</div>
<div class="variable">
<h3><a id="FS_GET_STATS">FS_GET_STATS</a></h3>
<p>
FS_GET_STATS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/fs_get_stats$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/fs_get_stats<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKEXT2IMG">MKEXT2IMG</a></h3>
<p>
MKEXT2IMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/genext2fs$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/genext2fs<br/>
</p>
</div>
<div class="variable">
<h3><a id="MAKE_EXT4FS">MAKE_EXT4FS</a></h3>
<p>
MAKE_EXT4FS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/make_ext4fs$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/make_ext4fs<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKEXTUSERIMG">MKEXTUSERIMG</a></h3>
<p>
MKEXTUSERIMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/mkuserimg.sh<br/>
示例:<br/>
out/host/linux-x86/bin/mkuserimg.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKEXT2BOOTIMG">MKEXT2BOOTIMG</a></h3>
<p>
MKEXT2BOOTIMG&nbsp;:=&nbsp;external/genext2fs/mkbootimg_ext2.sh<br/>
示例:<br/>
external/genext2fs/mkbootimg_ext2.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="SIMG2IMG">SIMG2IMG</a></h3>
<p>
SIMG2IMG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/simg2img$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/simg2img<br/>
</p>
</div>
<div class="variable">
<h3><a id="E2FSCK">E2FSCK</a></h3>
<p>
E2FSCK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/e2fsck$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/e2fsck<br/>
</p>
</div>
<div class="variable">
<h3><a id="MKTARBALL">MKTARBALL</a></h3>
<p>
MKTARBALL&nbsp;:=&nbsp;build/tools/mktarball.sh<br/>
示例:<br/>
out/host/linux-x86/bin/mktarball.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="TUNE2FS">TUNE2FS</a></h3>
<p>
TUNE2FS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/tune2fs$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/tune2fs<br/>
</p>
</div>
<div class="variable">
<h3><a id="E2FSCK">E2FSCK</a></h3>
<p>
E2FSCK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/e2fsck$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/e2fsck<br/>
</p>
</div>
<div class="variable">
<h3><a id="JARJAR">JARJAR</a></h3>
<p>
JARJAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/jarjar.jar<br/>
示例:<br/>
out/host/linux-x86/framework/jarjar.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="PROGUARD">PROGUARD</a></h3>
<p>
PROGUARD&nbsp;:=&nbsp;external/proguard/bin/proguard.sh<br/>
示例:<br/>
external/proguard/bin/proguard.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="JAVATAGS">JAVATAGS</a></h3>
<p>
JAVATAGS&nbsp;:=&nbsp;build/tools/java-event-log-tags.py<br/>
示例:<br/>
build/tools/java-event-log-tags.py<br/>
</p>
</div>
<div class="variable">
<h3><a id="LLVM_RS_CC">LLVM_RS_CC</a></h3>
<p>
LLVM_RS_CC&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-rs-cc$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/llvm-rs-cc<br/>
</p>
</div>
<div class="variable">
<h3><a id="LLVM_RS_LINK">LLVM_RS_LINK</a></h3>
<p>
LLVM_RS_LINK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-rs-link$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/llvm-rs-link<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXOPT">DEXOPT</a></h3>
<p>
DEXOPT&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/dexopt$(HOST_EXECUTABLE_SUFFIX)<br/>
示例:<br/>
out/host/linux-x86/bin/dexopt<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT">DEXPREOPT</a></h3>
<p>
DEXPREOPT&nbsp;:=&nbsp;dalvik/tools/dex-preopt<br/>
示例:<br/>
out/host/linux-x86/bin/dex-preopt<br/>
</p>
</div>
<div class="variable">
<h3><a id="LINT">LINT</a></h3>
<p>
LINT&nbsp;:=&nbsp;prebuilts/sdk/tools/lint<br/>
示例:<br/>
out/host/linux-x86/bin/lint<br/>
</p>
</div>
<div class="variable">
<h3><a id="ACP">ACP</a></h3>
<p>
ACP&nbsp;:=&nbsp;$(BUILD_OUT_EXECUTABLES)/acp$(BUILD_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
&nbsp;out/host/linux-x86/bin/acp&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="DX">DX</a></h3>
<p>
DX&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/dx<br/>
示例：<br/>
out/host/linux-x86/bin/dx<br/>
</p>
</div>
<div class="variable">
<h3><a id="ZIPALIGN">ZIPALIGN</a></h3>
<p>
ZIPALIGN&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/zipalign$(HOST_EXECUTABLE_SUFFIX)<br/>
示例：<br/>
out/host/linux-x86/bin/zipalign<br/>
</p>
</div>
<div class="variable">
<h3><a id="FINDBUGS">FINDBUGS</a></h3>
<p>
FINDBUGS&nbsp;:=&nbsp;prebuilt/common/findbugs/bin/findbugs<br/>
示例：<br/>
prebuilt/common/findbugs/bin/findbugs<br/>
</p>
</div>
<div class="variable">
<h3><a id="EMMA_JAR">EMMA_JAR</a></h3>
<p>
EMMA_JAR&nbsp;:=&nbsp;external/emma/lib/emma$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
示例：<br/>
&nbsp;&nbsp;external/emma/lib/emma<br/>
</p>
</div>
<div class="variable">
<h3><a id="YACC_HEADER_SUFFIX">YACC_HEADER_SUFFIX</a></h3>
<p>
ifeq($(filter1.28,$(shell$(YACC)-V)),)<br/>
YACC_HEADER_SUFFIX:=.hpp<br/>
else<br/>
YACC_HEADER_SUFFIX:=.cpp.h<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="COLUMN">COLUMN</a></h3>
<p>
ifeq&nbsp;($(HOST_OS),windows)<br/>
COLUMN:=&nbsp;cat<br/>
else<br/>
COLUMN:=&nbsp;column<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="OLD_FLEX">OLD_FLEX</a></h3>
<p>
prebuilts/misc/$(HOST_PREBUILT_TAG)/flex/flex-2.5.4a$(HOST_EXECUTABLE_SUFFIX)<br/>
例：<br/>
prebuilts/misc/hlinux-x86/flex/flex-2.5.4a<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JDK_TOOLS_JAR">HOST_JDK_TOOLS_JAR</a></h3>
<p>
表示查找jdk里tools.jar所用的脚本<br/>
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
示例：<br/>
&nbsp;&nbsp;&nbsp;build/core/find-jdk-tools-jar.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JDK_IS_64BIT_VERSION">HOST_JDK_IS_64BIT_VERSION</a></h3>
<p>
表示jdk是否是64位的<br/>
ifneq&nbsp;($(filter&nbsp;64-Bit,&nbsp;$(shell&nbsp;java&nbsp;-version&nbsp;2>&1)),)<br/>
HOST_JDK_IS_64BIT_VERSION&nbsp;:=&nbsp;true<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="MD5SUM">MD5SUM</a></h3>
<p>
md5程序<br/>
#&nbsp;It's&nbsp;called&nbsp;md5&nbsp;on&nbsp;Mac&nbsp;OS&nbsp;and&nbsp;md5sum&nbsp;on&nbsp;Linux<br/>
ifeq&nbsp;($(HOST_OS),darwin)<br/>
MD5SUM:=md5&nbsp;-q<br/>
else<br/>
MD5SUM:=md5sum<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="SED_INPLACE">SED_INPLACE</a></h3>
<p>
表示sed命令加上原地替换参数，如果在linux上则是sed&nbsp;-i<br/>
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
<h3><a id="APICHECK_CLASSPATH">APICHECK_CLASSPATH</a></h3>
<p>
apicheck程序用的class&nbsp;path<br/>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(HOST_JDK_TOOLS_JAR)<br/>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(APICHECK_CLASSPATH):$(HOST_OUT_JAVA_LIBRARIES)/doclava$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
APICHECK_CLASSPATH&nbsp;:=&nbsp;$(APICHECK_CLASSPATH):$(HOST_OUT_JAVA_LIBRARIES)/jsilver$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
APICHECK_COMMAND&nbsp;:=&nbsp;$(APICHECK)&nbsp;-JXmx1024m&nbsp;-J"classpath&nbsp;$(APICHECK_CLASSPATH)"<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEFAULT_SYSTEM_DEV_CERTIFICATE">DEFAULT_SYSTEM_DEV_CERTIFICATE</a></h3>
<p>
默认的开发用的密钥<br/>
可以在设备配置文件device_*.mk里设置PRODUCT_DEFAULT_DEV_CERTIFICATE来覆盖DEFAULT_SYSTEM_DEV_CERTIFICATE<br/>
ifdef&nbsp;PRODUCT_DEFAULT_DEV_CERTIFICATE<br/>
&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE&nbsp;:=&nbsp;$(PRODUCT_DEFAULT_DEV_CERTIFICATE)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE&nbsp;:=&nbsp;build/target/product/security/testkey<br/>
endif<br/>
示例：<br/>
&nbsp;&nbsp;build/target/product/security/testkey<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CFLAGS">HOST_GLOBAL_CFLAGS</a></h3>
<p>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;$(COMMON_GLOBAL_CFLAGS)&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_RELEASE_CFLAGS">HOST_RELEASE_CFLAGS</a></h3>
<p>
HOST_RELEASE_CFLAGS&nbsp;+=&nbsp;$(COMMON_RELEASE_CFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CPPFLAGS">HOST_GLOBAL_CPPFLAGS</a></h3>
<p>
HOST_GLOBAL_CPPFLAGS&nbsp;+=&nbsp;$(COMMON_GLOBAL_CPPFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_RELEASE_CPPFLAGS">HOST_RELEASE_CPPFLAGS</a></h3>
<p>
HOST_RELEASE_CPPFLAGS&nbsp;+=&nbsp;$(COMMON_RELEASE_CPPFLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_LD_DIRS">HOST_GLOBAL_LD_DIRS</a></h3>
<p>
HOST_GLOBAL_LD_DIRS&nbsp;+=&nbsp;-L$(HOST_OUT_INTERMEDIATE_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_LD_DIRS">TARGET_GLOBAL_LD_DIRS</a></h3>
<p>
TARGET_GLOBAL_LD_DIRS&nbsp;+=&nbsp;-L$(TARGET_OUT_INTERMEDIATE_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_PROJECT_INCLUDES">HOST_PROJECT_INCLUDES</a></h3>
<p>
HOST_PROJECT_INCLUDES:=&nbsp;$(SRC_HEADERS)&nbsp;$(SRC_HOST_HEADERS)&nbsp;$(HOST_OUT_HEADERS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PROJECT_INCLUDES">TARGET_PROJECT_INCLUDES</a></h3>
<p>
工程的头文件目录<br/>
&nbsp;TARGET_PROJECT_INCLUDES:=&nbsp;$(SRC_HEADERS)&nbsp;$(TARGET_OUT_HEADERS)&nbsp;\<br/>
&nbsp;$(TARGET_DEVICE_KERNEL_HEADERS)&nbsp;$(TARGET_BOARD_KERNEL_HEADERS)&nbsp;\<br/>
&nbsp;$(TARGET_PRODUCT_KERNEL_HEADERS)<br/>
&nbsp;其中&nbsp;TARGET_OUT_HEADERS&nbsp;<br/>
&nbsp;&nbsp;示例：out/target/product/i9100/obj/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;$(TARGET_ERROR_FLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CPPFLAGS">TARGET_GLOBAL_CPPFLAGS</a></h3>
<p>
TARGET_GLOBAL_CPPFLAGS&nbsp;+=&nbsp;$(TARGET_ERROR_FLAGS)<br/>
</p>
</div>
<div class="function">
<h3><a id="numerically_sort">Function:&nbsp;&nbsp;numerically_sort</a></h3>
<p>
Numerically&nbsp;sort&nbsp;a&nbsp;list&nbsp;of&nbsp;numbers<br/>
$(1):&nbsp;the&nbsp;list&nbsp;of&nbsp;numbers&nbsp;to&nbsp;be&nbsp;sorted<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_AVAILABLE_SDK_VERSIONS">TARGET_AVAILABLE_SDK_VERSIONS</a></h3>
<p>
可用的sdk版本集合<br/>
&nbsp;TARGET_AVAILABLE_SDK_VERSIONS&nbsp;:=&nbsp;$(call&nbsp;numerically_sort,\<br/>
$(patsubst&nbsp;$(HISTORICAL_SDK_VERSIONS_ROOT)/%/android.jar,%,&nbsp;\<br/>
$(wildcard&nbsp;$(HISTORICAL_SDK_VERSIONS_ROOT)/*/android.jar)))<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_PLATFORM_API_FILE">INTERNAL_PLATFORM_API_FILE</a></h3>
<p>
INTERNAL_PLATFORM_API_FILE&nbsp;:=&nbsp;$(TARGET_OUT_COMMON_INTERMEDIATES)/PACKAGING/public_api.txt<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/common/obj/PACKAGING/public_api.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH">TARGET_ARCH</a></h3>
<p>
示例：arm&nbsp;或者&nbsp;mips&nbsp;或者&nbsp;x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_TAG">TARGET_PREBUILT_TAG</a></h3>
<p>
这是命名&nbsp;包含prebuit目标程序的目录&nbsp;的标准方式<br/>
&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;standard&nbsp;way&nbsp;to&nbsp;name&nbsp;a&nbsp;directory&nbsp;containing&nbsp;prebuilt&nbsp;target<br/>
&nbsp;&nbsp;objects.&nbsp;E.g.,&nbsp;prebuilt/$(TARGET_PREBUILT_TAG)/libc.so<br/>
TARGET_PREBUILT_TAG&nbsp;:=&nbsp;android-$(TARGET_ARCH)<br/>
示例：<br/>
&nbsp;android-arm<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
