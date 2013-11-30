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
<h3>build/core/envsetup.mk</h3>
<p>
定义了一系列编译变量，主要是编译用的存储编译结果的目录，<br/>
详细的请参考文档<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PRODUCT">TARGET_PRODUCT</a></h3>
<p>
示例：cm_i9100<br/>
</p>
</div>
<div class="variable">
<h3><a id="UNAME">UNAME</a></h3>
<p>
操作系统+体系结构<br/>
例：Linux&nbsp;x86_64<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OS">HOST_OS</a></h3>
<p>
主机操作系统<br/>
linux&nbsp;darwin&nbsp;windows&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_OS">BUILD_OS</a></h3>
<p>
编译所在主机的操作系统<br/>
BUILD_OS&nbsp;:=&nbsp;$(HOST_OS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_ARCH">HOST_ARCH</a></h3>
<p>
主机体系结构<br/>
x86&nbsp;ppc<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_ARCH">BUILD_ARCH</a></h3>
<p>
编译系统所在主机的操作系统<br/>
$(BUILD_OS)<br/>
x86&nbsp;ppc<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_BUILD_TYPE">HOST_BUILD_TYPE</a></h3>
<p>
主机编译类型&nbsp;release&nbsp;或者debug<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_PREBUILT_TAG">HOST_PREBUILT_TAG</a></h3>
<p>
This&nbsp;is&nbsp;the&nbsp;standard&nbsp;way&nbsp;to&nbsp;name&nbsp;a&nbsp;directory&nbsp;containing&nbsp;prebuilt&nbsp;host<br/>
objects.&nbsp;E.g.,&nbsp;prebuilt/$(HOST_PREBUILT_TAG)/cc<br/>
ifeq&nbsp;($(HOST_OS),windows)<br/>
&nbsp;&nbsp;HOST_PREBUILT_TAG&nbsp;:=&nbsp;windows<br/>
else<br/>
&nbsp;&nbsp;HOST_PREBUILT_TAG&nbsp;:=&nbsp;$(HOST_OS)-$(HOST_ARCH)<br/>
endif<br/>
linux-x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COPY_OUT_SYSTEM">TARGET_COPY_OUT_SYSTEM</a></h3>
<p>
TARGET_COPY_OUT_SYSTEM&nbsp;:=&nbsp;system<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COPY_OUT_DATA">TARGET_COPY_OUT_DATA</a></h3>
<p>
TARGET_COPY_OUT_DATA&nbsp;:=&nbsp;data<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COPY_OUT_VENDOR">TARGET_COPY_OUT_VENDOR</a></h3>
<p>
TARGET_COPY_OUT_VENDOR&nbsp;:=&nbsp;system/vendor<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COPY_OUT_ROOT">TARGET_COPY_OUT_ROOT</a></h3>
<p>
TARGET_COPY_OUT_ROOT&nbsp;:=&nbsp;root<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COPY_OUT_RECOVERY">TARGET_COPY_OUT_RECOVERY</a></h3>
<p>
TARGET_COPY_OUT_RECOVERY&nbsp;:=&nbsp;recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OS">TARGET_OS</a></h3>
<p>
TARGET_OS&nbsp;:=&nbsp;linux<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BUILD_TYPE">TARGET_BUILD_TYPE</a></h3>
<p>
ifneq&nbsp;($(TARGET_BUILD_TYPE),debug)<br/>
TARGET_BUILD_TYPE&nbsp;:=&nbsp;release<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="OUT_DIR">OUT_DIR</a></h3>
<p>
ifeq&nbsp;(,$(strip&nbsp;$(OUT_DIR)))<br/>
&nbsp;ifeq&nbsp;(,$(strip&nbsp;$(OUT_DIR_COMMON_BASE)))<br/>
&nbsp;ifneq&nbsp;($(TOPDIR),)<br/>
&nbsp;OUT_DIR&nbsp;:=&nbsp;$(TOPDIR)out<br/>
&nbsp;else<br/>
&nbsp;OUT_DIR&nbsp;:=&nbsp;$(CURDIR)/out<br/>
&nbsp;endif<br/>
&nbsp;else<br/>
&nbsp;OUT_DIR&nbsp;:=&nbsp;$(OUT_DIR_COMMON_BASE)/$(notdir&nbsp;$(PWD))<br/>
&nbsp;endif<br/>
&nbsp;endif&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEBUG_OUT_DIR">DEBUG_OUT_DIR</a></h3>
<p>
DEBUG_OUT_DIR&nbsp;:=&nbsp;$(OUT_DIR)/debug<br/>
示例：out/debug<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_ROOT_release">TARGET_OUT_ROOT_release</a></h3>
<p>
TARGET_OUT_ROOT_release&nbsp;:=&nbsp;$(OUT_DIR)/target<br/>
示例:out/target<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_ROOT_debug">TARGET_OUT_ROOT_debug</a></h3>
<p>
TARGET_OUT_ROOT_debug&nbsp;:=&nbsp;$(DEBUG_OUT_DIR)/target<br/>
示例:out/debug/target<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_ROOT">TARGET_OUT_ROOT</a></h3>
<p>
TARGET_OUT_ROOT&nbsp;:=&nbsp;$(TARGET_OUT_ROOT_$(TARGET_BUILD_TYPE))<br/>
示例:out/target&nbsp;或者out/debug/target<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_ROOT_release">HOST_OUT_ROOT_release</a></h3>
<p>
HOST_OUT_ROOT_release&nbsp;:=&nbsp;$(OUT_DIR)/host<br/>
示例:out/host<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_ROOT_debug">HOST_OUT_ROOT_debug</a></h3>
<p>
HOST_OUT_ROOT_debug&nbsp;:=&nbsp;$(DEBUG_OUT_DIR)/host<br/>
示例:out/debug/host<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_ROOT">HOST_OUT_ROOT</a></h3>
<p>
HOST_OUT_ROOT&nbsp;:=&nbsp;$(HOST_OUT_ROOT_$(HOST_BUILD_TYPE))<br/>
示例:out/host或者out/debug/host<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_release">HOST_OUT_release</a></h3>
<p>
HOST_OUT_release&nbsp;:=&nbsp;$(HOST_OUT_ROOT_release)/$(HOST_OS)-$(HOST_ARCH)<br/>
示例:oust/host/linux-x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_debug">HOST_OUT_debug</a></h3>
<p>
HOST_OUT_debug&nbsp;:=&nbsp;$(HOST_OUT_ROOT_debug)/$(HOST_OS)-$(HOST_ARCH)<br/>
示例:out/debug/host/linux-x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT">HOST_OUT</a></h3>
<p>
HOST_OUT&nbsp;:=&nbsp;$(HOST_OUT_$(HOST_BUILD_TYPE))<br/>
示例:oust/host/linux-x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_OUT">BUILD_OUT</a></h3>
<p>
BUILD_OUT&nbsp;:=&nbsp;$(OUT_DIR)/host/$(BUILD_OS)-$(BUILD_ARCH)<br/>
示例:out/host/linux-x86&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PRODUCT_OUT_ROOT">TARGET_PRODUCT_OUT_ROOT</a></h3>
<p>
TARGET_PRODUCT_OUT_ROOT&nbsp;:=&nbsp;$(TARGET_OUT_ROOT)/product<br/>
示例:out/target/product<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_COMMON_OUT_ROOT">TARGET_COMMON_OUT_ROOT</a></h3>
<p>
TARGET_COMMON_OUT_ROOT&nbsp;:=&nbsp;$(TARGET_OUT_ROOT)/common<br/>
示例:out/target/common&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_COMMON_OUT_ROOT">HOST_COMMON_OUT_ROOT</a></h3>
<p>
HOST_COMMON_OUT_ROOT&nbsp;:=&nbsp;$(HOST_OUT_ROOT)/common<br/>
示例:out/target/common<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_OUT">PRODUCT_OUT</a></h3>
<p>
PRODUCT_OUT&nbsp;:=&nbsp;$(TARGET_PRODUCT_OUT_ROOT)/$(TARGET_DEVICE)<br/>
示例:out/target/product/i9100<br/>
</p>
</div>
<div class="variable">
<h3><a id="OUT_DOCS">OUT_DOCS</a></h3>
<p>
OUT_DOCS&nbsp;:=&nbsp;$(TARGET_COMMON_OUT_ROOT)/docs<br/>
示例:out/target/common/docs<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_OUT">BUILD_OUT</a></h3>
<p>
示例：out/host/linux-x86<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_OUT_EXECUTABLES">BUILD_OUT_EXECUTABLES</a></h3>
<p>
BUILD_OUT_EXECUTABLES:=&nbsp;$(BUILD_OUT)/bin<br/>
示例:out/host/linux-x86/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_EXECUTABLES">HOST_OUT_EXECUTABLES</a></h3>
<p>
HOST_OUT_EXECUTABLES:=&nbsp;$(HOST_OUT)/bin<br/>
示例:out/host/linux-x86/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_SHARED_LIBRARIES">HOST_OUT_SHARED_LIBRARIES</a></h3>
<p>
HOST_OUT_SHARED_LIBRARIES:=&nbsp;$(HOST_OUT)/lib<br/>
示例:out/host/linux-x86/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_JAVA_LIBRARIES">HOST_OUT_JAVA_LIBRARIES</a></h3>
<p>
HOST_OUT_JAVA_LIBRARIES:=&nbsp;$(HOST_OUT)/framework<br/>
示例:out/host/linux-x86/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_SDK_ADDON">HOST_OUT_SDK_ADDON</a></h3>
<p>
HOST_OUT_SDK_ADDON&nbsp;:=&nbsp;$(HOST_OUT)/sdk_addon<br/>
示例:out/host/linux-x86/sdk_addon<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_INTERMEDIATES">HOST_OUT_INTERMEDIATES</a></h3>
<p>
HOST_OUT_INTERMEDIATES&nbsp;:=&nbsp;$(HOST_OUT)/obj<br/>
示例:out/host/linux-x86/obj<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_HEADERS">HOST_OUT_HEADERS</a></h3>
<p>
HOST_OUT_HEADERS:=&nbsp;$(HOST_OUT_INTERMEDIATES)/include<br/>
示例:out/host/linux-x86/obj/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_INTERMEDIATE_LIBRARIES">HOST_OUT_INTERMEDIATE_LIBRARIES</a></h3>
<p>
HOST_OUT_INTERMEDIATE_LIBRARIES&nbsp;:=&nbsp;$(HOST_OUT_INTERMEDIATES)/lib<br/>
示例:out/host/linux-x86/obj/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_NOTICE_FILES">HOST_OUT_NOTICE_FILES</a></h3>
<p>
HOST_OUT_NOTICE_FILES:=$(HOST_OUT_INTERMEDIATES)/NOTICE_FILES<br/>
示例：out/host/linux-x86/obj/NOTICE_FILES<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_OUT_COMMON_INTERMEDIATES">HOST_OUT_COMMON_INTERMEDIATES</a></h3>
<p>
HOST_OUT_COMMON_INTERMEDIATES&nbsp;:=&nbsp;$(HOST_COMMON_OUT_ROOT)/obj<br/>
示例:out/host/linux-x86/obj<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_INTERMEDIATES">TARGET_OUT_INTERMEDIATES</a></h3>
<p>
TARGET_OUT_INTERMEDIATES&nbsp;:=&nbsp;$(PRODUCT_OUT)/obj<br/>
示例:out/target/product/i9100/obj<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_HEADERS:=">TARGET_OUT_HEADERS:=</a></h3>
<p>
TARGET_OUT_HEADERS:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/include<br/>
示例:out/target/product/i9100/obj/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_INTERMEDIATE_LIBRARIES">TARGET_OUT_INTERMEDIATE_LIBRARIES</a></h3>
<p>
TARGET_OUT_INTERMEDIATE_LIBRARIES&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/lib<br/>
示例:out/target/product/i9100/obj/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_COMMON_INTERMEDIATES">TARGET_OUT_COMMON_INTERMEDIATES</a></h3>
<p>
TARGET_OUT_COMMON_INTERMEDIATES&nbsp;:=&nbsp;$(TARGET_COMMON_OUT_ROOT)/obj<br/>
示例:out/target/common/obj<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT">TARGET_OUT</a></h3>
<p>
TARGET_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(TARGET_COPY_OUT_SYSTEM)<br/>
示例:out/target/product/i9100/system<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_EXECUTABLES">TARGET_OUT_EXECUTABLES</a></h3>
<p>
TARGET_OUT_EXECUTABLES:=&nbsp;$(TARGET_OUT)/bin<br/>
示例:out/target/product/i9100/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_OPTIONAL_EXECUTABLES:=">TARGET_OUT_OPTIONAL_EXECUTABLES:=</a></h3>
<p>
TARGET_OUT_OPTIONAL_EXECUTABLES:=&nbsp;$(TARGET_OUT)/xbin<br/>
示例:out/target/product/i9100/system/xbin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_SHARED_LIBRARIES:=">TARGET_OUT_SHARED_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_SHARED_LIBRARIES:=&nbsp;$(TARGET_OUT)/lib<br/>
示例:out/target/product/i9100/system/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_JAVA_LIBRARIES:=">TARGET_OUT_JAVA_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_JAVA_LIBRARIES:=&nbsp;$(TARGET_OUT)/framework<br/>
示例:out/target/product/i9100/system/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_APPS:=">TARGET_OUT_APPS:=</a></h3>
<p>
TARGET_OUT_APPS:=&nbsp;$(TARGET_OUT)/app<br/>
示例:out/target/product/i9100/system/app<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_KEYLAYOUT">TARGET_OUT_KEYLAYOUT</a></h3>
<p>
TARGET_OUT_KEYLAYOUT&nbsp;:=&nbsp;$(TARGET_OUT)/usr/keylayout<br/>
示例:out/target/product/i9100/system/usr/keylayout<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_KEYCHARS">TARGET_OUT_KEYCHARS</a></h3>
<p>
TARGET_OUT_KEYCHARS&nbsp;:=&nbsp;$(TARGET_OUT)/usr/keychars<br/>
示例:out/target/product/i9100/system/usr/keychars<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_ETC">TARGET_OUT_ETC</a></h3>
<p>
TARGET_OUT_ETC&nbsp;:=&nbsp;$(TARGET_OUT)/etc<br/>
示例:out/target/product/i9100/system/etc<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_NOTICE_FILES">TARGET_OUT_NOTICE_FILES</a></h3>
<p>
TARGET_OUT_NOTICE_FILES:=$(TARGET_OUT_INTERMEDIATES)/NOTICE_FILES<br/>
示例:out/target/product/i9100/obj/NOTICE_FILES<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_FAKE">TARGET_OUT_FAKE</a></h3>
<p>
TARGET_OUT_FAKE&nbsp;:=&nbsp;$(PRODUCT_OUT)/fake_packages<br/>
示例:out/target/product/i9100/fake_packages<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA">TARGET_OUT_DATA</a></h3>
<p>
TARGET_OUT_DATA&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(TARGET_COPY_OUT_DATA)<br/>
示例:out/target/product/i9100/data<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_EXECUTABLES:=">TARGET_OUT_DATA_EXECUTABLES:=</a></h3>
<p>
TARGET_OUT_DATA_EXECUTABLES:=&nbsp;$(TARGET_OUT_EXECUTABLES)<br/>
示例:out/target/product/i9100/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_SHARED_LIBRARIES:=">TARGET_OUT_DATA_SHARED_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_DATA_SHARED_LIBRARIES:=&nbsp;$(TARGET_OUT_SHARED_LIBRARIES)<br/>
示例:out/target/product/i9100/system/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_JAVA_LIBRARIES:=">TARGET_OUT_DATA_JAVA_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_DATA_JAVA_LIBRARIES:=&nbsp;$(TARGET_OUT_JAVA_LIBRARIES)<br/>
示例:out/target/product/i9100/system/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_APPS:=">TARGET_OUT_DATA_APPS:=</a></h3>
<p>
TARGET_OUT_DATA_APPS:=&nbsp;$(TARGET_OUT_DATA)/app<br/>
示例:out/target/product/i9100/data/app<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_KEYLAYOUT">TARGET_OUT_DATA_KEYLAYOUT</a></h3>
<p>
TARGET_OUT_DATA_KEYLAYOUT&nbsp;:=&nbsp;$(TARGET_OUT_KEYLAYOUT)<br/>
示例:out/target/product/i9100/system/usr/keylayout<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_KEYCHARS">TARGET_OUT_DATA_KEYCHARS</a></h3>
<p>
TARGET_OUT_DATA_KEYCHARS&nbsp;:=&nbsp;$(TARGET_OUT_KEYCHARS)<br/>
示例:out/target/product/i9100/system/usr/keychars<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_ETC">TARGET_OUT_DATA_ETC</a></h3>
<p>
TARGET_OUT_DATA_ETC&nbsp;:=&nbsp;$(TARGET_OUT_ETC)<br/>
示例:out/target/product/i9100/system/etc<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_DATA_NATIVE_TESTS">TARGET_OUT_DATA_NATIVE_TESTS</a></h3>
<p>
TARGET_OUT_DATA_NATIVE_TESTS&nbsp;:=&nbsp;$(TARGET_OUT_DATA)/nativetest<br/>
示例:out/target/product/i9100/data/nativetest<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_CACHE">TARGET_OUT_CACHE</a></h3>
<p>
TARGET_OUT_CACHE&nbsp;:=&nbsp;$(PRODUCT_OUT)/cache<br/>
示例:out/target/product/i9100/cache<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR">TARGET_OUT_VENDOR</a></h3>
<p>
TARGET_OUT_VENDOR&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(TARGET_COPY_OUT_VENDOR)<br/>
示例:out/target/product/i9100/system/vendor<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_EXECUTABLES:=">TARGET_OUT_VENDOR_EXECUTABLES:=</a></h3>
<p>
TARGET_OUT_VENDOR_EXECUTABLES:=&nbsp;$(TARGET_OUT_VENDOR)/bin<br/>
示例:out/target/product/i9100/system/vendor/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_OPTIONAL_EXECUTABLES:=">TARGET_OUT_VENDOR_OPTIONAL_EXECUTABLES:=</a></h3>
<p>
TARGET_OUT_VENDOR_OPTIONAL_EXECUTABLES:=&nbsp;$(TARGET_OUT_VENDOR)/xbin<br/>
示例:out/target/product/i9100/system/vendor/xbin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_SHARED_LIBRARIES:=">TARGET_OUT_VENDOR_SHARED_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_VENDOR_SHARED_LIBRARIES:=&nbsp;$(TARGET_OUT_VENDOR)/lib<br/>
示例:out/target/product/i9100/system/vendor/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_JAVA_LIBRARIES:=">TARGET_OUT_VENDOR_JAVA_LIBRARIES:=</a></h3>
<p>
TARGET_OUT_VENDOR_JAVA_LIBRARIES:=&nbsp;$(TARGET_OUT_VENDOR)/framework<br/>
示例:out/target/product/i9100/system/vendor/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_APPS:=">TARGET_OUT_VENDOR_APPS:=</a></h3>
<p>
TARGET_OUT_VENDOR_APPS:=&nbsp;$(TARGET_OUT_VENDOR)/app<br/>
示例:out/target/product/i9100/system/vendor/app<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_VENDOR_ETC">TARGET_OUT_VENDOR_ETC</a></h3>
<p>
TARGET_OUT_VENDOR_ETC&nbsp;:=&nbsp;$(TARGET_OUT_VENDOR)/etc<br/>
示例:out/target/product/i9100/system/vendor/etc<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_UNSTRIPPED">TARGET_OUT_UNSTRIPPED</a></h3>
<p>
TARGET_OUT_UNSTRIPPED&nbsp;:=&nbsp;$(PRODUCT_OUT)/symbols<br/>
示例:out/target/product/i9100/system/symbols<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_EXECUTABLES_UNSTRIPPED">TARGET_OUT_EXECUTABLES_UNSTRIPPED</a></h3>
<p>
TARGET_OUT_EXECUTABLES_UNSTRIPPED&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)/system/bin<br/>
示例:out/target/product/i9100/sysmbols/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_OUT_SHARED_LIBRARIES_UNSTRIPPED">TARGET_OUT_SHARED_LIBRARIES_UNSTRIPPED</a></h3>
<p>
TARGET_OUT_SHARED_LIBRARIES_UNSTRIPPED&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)/system/lib<br/>
示例:out/target/product/i9100/sysmbols/system/lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_UNSTRIPPED">TARGET_ROOT_OUT_UNSTRIPPED</a></h3>
<p>
TARGET_ROOT_OUT_UNSTRIPPED&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)<br/>
示例:out/target/product/i9100/sysmbols<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_SBIN_UNSTRIPPED">TARGET_ROOT_OUT_SBIN_UNSTRIPPED</a></h3>
<p>
TARGET_ROOT_OUT_SBIN_UNSTRIPPED&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)/sbin<br/>
示例:out/target/product/i9100/sysmbols/sbin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_BIN_UNSTRIPPED">TARGET_ROOT_OUT_BIN_UNSTRIPPED</a></h3>
<p>
TARGET_ROOT_OUT_BIN_UNSTRIPPED&nbsp;:=&nbsp;$(TARGET_OUT_UNSTRIPPED)/bin<br/>
示例:out/target/product/i9100/sysmbols/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT">TARGET_ROOT_OUT</a></h3>
<p>
TARGET_ROOT_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(TARGET_COPY_OUT_ROOT)<br/>
示例:out/target/product/i9100/root<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_BIN">TARGET_ROOT_OUT_BIN</a></h3>
<p>
TARGET_ROOT_OUT_BIN&nbsp;:=&nbsp;$(TARGET_ROOT_OUT)/bin<br/>
示例:out/target/product/i9100/root/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_SBIN">TARGET_ROOT_OUT_SBIN</a></h3>
<p>
TARGET_ROOT_OUT_SBIN&nbsp;:=&nbsp;$(TARGET_ROOT_OUT)/sbin<br/>
示例:out/target/product/i9100/root/sbin<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_ETC">TARGET_ROOT_OUT_ETC</a></h3>
<p>
TARGET_ROOT_OUT_ETC&nbsp;:=&nbsp;$(TARGET_ROOT_OUT)/etc<br/>
示例:out/target/product/i9100/root/etc<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ROOT_OUT_USR">TARGET_ROOT_OUT_USR</a></h3>
<p>
TARGET_ROOT_OUT_USR&nbsp;:=&nbsp;$(TARGET_ROOT_OUT)/usr<br/>
示例:out/target/product/i9100/root/usr<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RECOVERY_OUT">TARGET_RECOVERY_OUT</a></h3>
<p>
TARGET_RECOVERY_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(TARGET_COPY_OUT_RECOVERY)<br/>
示例:out/target/product/i9100/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RECOVERY_ROOT_OUT">TARGET_RECOVERY_ROOT_OUT</a></h3>
<p>
TARGET_RECOVERY_ROOT_OUT&nbsp;:=&nbsp;$(TARGET_RECOVERY_OUT)/root<br/>
示例:out/target/product/i9100/recovery/root<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_SYSLOADER_OUT">TARGET_SYSLOADER_OUT</a></h3>
<p>
TARGET_SYSLOADER_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/sysloader<br/>
示例:out/target/product/i9100/sysloader<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_SYSLOADER_ROOT_OUT">TARGET_SYSLOADER_ROOT_OUT</a></h3>
<p>
TARGET_SYSLOADER_ROOT_OUT&nbsp;:=&nbsp;$(TARGET_SYSLOADER_OUT)/root<br/>
示例:out/target/product/i9100/sysloader/root<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_SYSLOADER_SYSTEM_OUT">TARGET_SYSLOADER_SYSTEM_OUT</a></h3>
<p>
TARGET_SYSLOADER_SYSTEM_OUT&nbsp;:=&nbsp;$(TARGET_SYSLOADER_OUT)/root/system<br/>
示例:out/target/product/i9100/sysloader/root/system<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_INSTALLER_OUT">TARGET_INSTALLER_OUT</a></h3>
<p>
TARGET_INSTALLER_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/installer<br/>
示例:out/target/product/i9100/installer<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_INSTALLER_DATA_OUT">TARGET_INSTALLER_DATA_OUT</a></h3>
<p>
TARGET_INSTALLER_DATA_OUT&nbsp;:=&nbsp;$(TARGET_INSTALLER_OUT)/data<br/>
示例:out/target/product/i9100/installer/data<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_INSTALLER_ROOT_OUT">TARGET_INSTALLER_ROOT_OUT</a></h3>
<p>
TARGET_INSTALLER_ROOT_OUT&nbsp;:=&nbsp;$(TARGET_INSTALLER_OUT)/root<br/>
示例:out/target/product/i9100/installer/root<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_INSTALLER_SYSTEM_OUT">TARGET_INSTALLER_SYSTEM_OUT</a></h3>
<p>
TARGET_INSTALLER_SYSTEM_OUT&nbsp;:=&nbsp;$(TARGET_INSTALLER_OUT)/root/system<br/>
示例:out/target/product/i9100/installer/root/system<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_FACTORY_RAMDISK_OUT">TARGET_FACTORY_RAMDISK_OUT</a></h3>
<p>
TARGET_FACTORY_RAMDISK_OUT&nbsp;:=&nbsp;$(PRODUCT_OUT)/factory_ramdisk<br/>
示例:out/target/product/i9100/factory_ramdisk<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_MODULE_CLASSES">COMMON_MODULE_CLASSES</a></h3>
<p>
COMMON_MODULE_CLASSES&nbsp;:=&nbsp;TARGET-NOTICE_FILES&nbsp;HOST-NOTICE_FILES&nbsp;HOST-JAVA_LIBRARIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="DIST_DIR">DIST_DIR</a></h3>
<p>
ifeq&nbsp;(,$(strip&nbsp;$(DIST_DIR)))<br/>
&nbsp;&nbsp;DIST_DIR&nbsp;:=&nbsp;$(OUT_DIR)/dist<br/>
endif<br/>
示例：<br/>
　　out/dist<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRINT_BUILD_CONFIG">PRINT_BUILD_CONFIG</a></h3>
<p>
ifeq&nbsp;($(PRINT_BUILD_CONFIG),)<br/>
&nbsp;&nbsp;PRINT_BUILD_CONFIG&nbsp;:=&nbsp;true<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
