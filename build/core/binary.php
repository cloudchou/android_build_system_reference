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
<h3>build/core/binary.mk</h3>
<p>
将asm/c/cpp/yacc/lex源代码编译为目标文件的基本规则<br/>
所有的目标文件将添加到$(all_objects)变量里<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_version_root">■ &nbsp;&nbsp;my_ndk_version_root</a></h3>
<p>
不知道<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_VERSION">■ &nbsp;&nbsp;LOCAL_SDK_VERSION</a></h3>
<p>
build/core/java.mk里定义该变量<br/>
LOCAL_SDK_VERSION&nbsp;:=&nbsp;$(PDK_BUILD_SDK_VERSION)<br/>
如果定义了LOCAL_SDK_VERSION，那么需要定义ndk编译相关变量<br/>
因为编译app时，常需要编译jni代码<br/>
示例：LOCAL_SDK_VERSION:&nbsp;9<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_source_root">■ &nbsp;&nbsp;my_ndk_source_root</a></h3>
<p>
my_ndk_source_root&nbsp;:=&nbsp;$(HISTORICAL_NDK_VERSIONS_ROOT)/current/sources<br/>
示例：HISTORICAL_NDK_VERSIONS_ROOT：&nbsp;prebuilts/ndk<br/>
示例：&nbsp;my_ndk_source_root&nbsp;：&nbsp;prebuilts/ndk/current/sources<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_version_root">■ &nbsp;&nbsp;my_ndk_version_root</a></h3>
<p>
my_ndk_version_root&nbsp;:=&nbsp;$(HISTORICAL_NDK_VERSIONS_ROOT)/current/platforms/android-$(LOCAL_SDK_VERSION)/arch-$(TARGET_ARCH)<br/>
示例：<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_include_path">■ &nbsp;&nbsp;my_ndk_stl_include_path</a></h3>
<p>
示例：prebuilts/ndk/current/sources/cxx-stl/system/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_shared_lib_fullpath">■ &nbsp;&nbsp;my_ndk_stl_shared_lib_fullpath</a></h3>
<p>
示例：空<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_shared_lib">■ &nbsp;&nbsp;my_ndk_stl_shared_lib</a></h3>
<p>
示例：空<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_static_lib">■ &nbsp;&nbsp;my_ndk_stl_static_lib</a></h3>
<p>
示例：prebuilts/ndk/current/sources/cxx-stl/stlport/libs/armeabi-v7a/libstlport_static.a<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SYSTEM_SHARED_LIBRARIES">■ &nbsp;&nbsp;LOCAL_SYSTEM_SHARED_LIBRARIES</a></h3>
<p>
ifdef&nbsp;LOCAL_IS_HOST_MODULE<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_SYSTEM_SHARED_LIBRARIES),none)<br/>
LOCAL_SYSTEM_SHARED_LIBRARIES&nbsp;:=<br/>
&nbsp;&nbsp;endif<br/>
else<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_SYSTEM_SHARED_LIBRARIES),none)<br/>
LOCAL_SYSTEM_SHARED_LIBRARIES&nbsp;:=&nbsp;$(TARGET_DEFAULT_SYSTEM_SHARED_LIBRARIES)<br/>
&nbsp;&nbsp;endif<br/>
endif<br/>
示例：<br/>
&nbsp;&nbsp;TARGET_DEFAULT_SYSTEM_SHARED_LIBRARIES：libc&nbsp;libstdc++&nbsp;libm<br/>
&nbsp;LOCAL_SYSTEM_SHARED_LIBRARIES：libc&nbsp;libstdc++&nbsp;libm<br/>
</p>
</div>
<div class="variable">
<h3><a id="[insert-liblog]">■ &nbsp;&nbsp;[insert-liblog]</a></h3>
<p>
Logging&nbsp;used&nbsp;to&nbsp;be&nbsp;part&nbsp;of&nbsp;libcutils&nbsp;(target)&nbsp;and&nbsp;libutils&nbsp;(sim);<br/>
hack&nbsp;modules&nbsp;that&nbsp;use&nbsp;those&nbsp;other&nbsp;libs&nbsp;to&nbsp;also&nbsp;include&nbsp;liblog.<br/>
All&nbsp;of&nbsp;this&nbsp;complexity&nbsp;is&nbsp;to&nbsp;make&nbsp;sure&nbsp;that&nbsp;liblog&nbsp;only&nbsp;appears<br/>
once,&nbsp;and&nbsp;appears&nbsp;just&nbsp;before&nbsp;libcutils&nbsp;or&nbsp;libutils&nbsp;on&nbsp;the&nbsp;link<br/>
line.&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SHARED_LIBRARIES">■ &nbsp;&nbsp;LOCAL_SHARED_LIBRARIES</a></h3>
<p>
表示模块要链接的动态链接库<br/>
ifneq&nbsp;(,$(filter&nbsp;libcutils&nbsp;libutils,$(LOCAL_SHARED_LIBRARIES)))<br/>
&nbsp;LOCAL_SHARED_LIBRARIES&nbsp;:=&nbsp;$(call&nbsp;insert-liblog,$(LOCAL_SHARED_LIBRARIES))<br/>
endif<br/>
&nbsp;示例：frameworks/av/media/mtp模块<br/>
Android.mk&nbsp;LOCAL_SHARED_LIBRARIES&nbsp;:=&nbsp;libutils&nbsp;libcutils&nbsp;libusbhost&nbsp;libbinder<br/>
最终：LOCAL_SHARED_LIBRARIES：&nbsp;libutils&nbsp;liblog&nbsp;libcutils&nbsp;libusbhost&nbsp;libbinder<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STATIC_LIBRARIES">■ &nbsp;&nbsp;LOCAL_STATIC_LIBRARIES</a></h3>
<p>
表示模块要链接的静态库<br/>
&nbsp;ifneq&nbsp;(,$(filter&nbsp;libcutils&nbsp;libutils,$(LOCAL_STATIC_LIBRARIES)))<br/>
LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;$(call&nbsp;insert-liblog,$(LOCAL_STATIC_LIBRARIES))<br/>
endif<br/>
示例：external/busybox/Android.mk<br/>
LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;libcutils&nbsp;libc&nbsp;libm<br/>
最终：<br/>
&nbsp;LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;libcutils&nbsp;libc&nbsp;libm&nbsp;liblog&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_WHOLE_STATIC_LIBRARIES">■ &nbsp;&nbsp;LOCAL_WHOLE_STATIC_LIBRARIES</a></h3>
<p>
These&nbsp;are&nbsp;the&nbsp;static&nbsp;libraries&nbsp;that&nbsp;you&nbsp;want&nbsp;to&nbsp;include&nbsp;in&nbsp;your&nbsp;module&nbsp;without&nbsp;allowing&nbsp;the&nbsp;linker&nbsp;to&nbsp;remove&nbsp;dead&nbsp;code&nbsp;from&nbsp;them.&nbsp;This&nbsp;is&nbsp;mostly&nbsp;useful&nbsp;if&nbsp;you&nbsp;want&nbsp;to&nbsp;add&nbsp;a&nbsp;static&nbsp;library&nbsp;to&nbsp;a&nbsp;shared&nbsp;library&nbsp;and&nbsp;have&nbsp;the&nbsp;static&nbsp;library's&nbsp;content&nbsp;exposed&nbsp;from&nbsp;the&nbsp;shared&nbsp;library.<br/>
ifneq&nbsp;(,$(filter&nbsp;libcutils&nbsp;libutils,$(LOCAL_WHOLE_STATIC_LIBRARIES)))<br/>
&nbsp;&nbsp;LOCAL_WHOLE_STATIC_LIBRARIES&nbsp;:=&nbsp;$(call&nbsp;insert-liblog,$(LOCAL_WHOLE_STATIC_LIBRARIES))<br/>
endif<br/>
示例：<br/>
dalvik/vm/Android.mk<br/>
LOCAL_WHOLE_STATIC_LIBRARIES&nbsp;+=&nbsp;libexpat&nbsp;libcutils&nbsp;libdex&nbsp;liblog&nbsp;libz<br/>
最终<br/>
&nbsp;LOCAL_WHOLE_STATIC_LIBRARIES&nbsp;+=&nbsp;libexpat&nbsp;libcutils&nbsp;libdex&nbsp;liblog&nbsp;libz&nbsp;liblog<br/>
</p>
</div>
<div class="variable">
<h3><a id="installed_shared_library_module_names">■ &nbsp;&nbsp;installed_shared_library_module_names</a></h3>
<p>
安装的动态链接库名字，用于定义依赖的动态链接库<br/>
ifdef&nbsp;LOCAL_SDK_VERSION<br/>
&nbsp;&nbsp;#&nbsp;Get&nbsp;the&nbsp;list&nbsp;of&nbsp;INSTALLED&nbsp;libraries&nbsp;as&nbsp;module&nbsp;names.<br/>
&nbsp;&nbsp;#&nbsp;We&nbsp;cannot&nbsp;compute&nbsp;the&nbsp;full&nbsp;path&nbsp;of&nbsp;the&nbsp;LOCAL_SHARED_LIBRARIES&nbsp;for<br/>
&nbsp;&nbsp;#&nbsp;they&nbsp;may&nbsp;cusomize&nbsp;their&nbsp;install&nbsp;path&nbsp;with&nbsp;LOCAL_MODULE_PATH<br/>
&nbsp;&nbsp;installed_shared_library_module_names&nbsp;:=&nbsp;\<br/>
$(LOCAL_SHARED_LIBRARIES)<br/>
else<br/>
&nbsp;&nbsp;installed_shared_library_module_names&nbsp;:=&nbsp;\<br/>
$(LOCAL_SYSTEM_SHARED_LIBRARIES)&nbsp;$(LOCAL_SHARED_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SYSTEM_SHARED_LIBRARIES">■ &nbsp;&nbsp;LOCAL_SYSTEM_SHARED_LIBRARIES</a></h3>
<p>
Used&nbsp;while&nbsp;building&nbsp;the&nbsp;base&nbsp;libraries:&nbsp;libc,&nbsp;libm,&nbsp;libdl.<br/>
&nbsp;Usually&nbsp;it&nbsp;should&nbsp;be&nbsp;set&nbsp;to&nbsp;"none,"&nbsp;as&nbsp;it&nbsp;is&nbsp;in&nbsp;$(CLEAR_VARS).&nbsp;<br/>
&nbsp;When&nbsp;building&nbsp;these&nbsp;libraries,&nbsp;it's&nbsp;set&nbsp;to&nbsp;the&nbsp;ones&nbsp;they&nbsp;link&nbsp;against.&nbsp;For&nbsp;example,&nbsp;libc,&nbsp;libstdc++&nbsp;and&nbsp;libdl&nbsp;don't&nbsp;link&nbsp;against&nbsp;anything,&nbsp;and&nbsp;libm&nbsp;links&nbsp;against&nbsp;libc.&nbsp;Normally,&nbsp;when&nbsp;the&nbsp;value&nbsp;is&nbsp;none,&nbsp;these&nbsp;libraries&nbsp;are&nbsp;automatically&nbsp;linked&nbsp;in&nbsp;to&nbsp;executables&nbsp;and&nbsp;libraries,<br/>
&nbsp;so&nbsp;you&nbsp;don't&nbsp;need&nbsp;to&nbsp;specify&nbsp;them&nbsp;manually.<br/>
示例：<br/>
libc&nbsp;libstdc++&nbsp;libm<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_REQUIRED_MODULES">■ &nbsp;&nbsp;LOCAL_REQUIRED_MODULES</a></h3>
<p>
Set&nbsp;LOCAL_REQUIRED_MODULES&nbsp;to&nbsp;any&nbsp;number&nbsp;of&nbsp;whitespace-separated&nbsp;module&nbsp;names,&nbsp;like&nbsp;"libblah"&nbsp;or&nbsp;"Email".&nbsp;<br/>
If&nbsp;this&nbsp;module&nbsp;is&nbsp;installed,&nbsp;all&nbsp;of&nbsp;the&nbsp;modules&nbsp;that&nbsp;it&nbsp;requires&nbsp;will&nbsp;be&nbsp;installed&nbsp;as&nbsp;well.&nbsp;<br/>
This&nbsp;can&nbsp;be&nbsp;used&nbsp;to,&nbsp;e.g.,&nbsp;ensure&nbsp;that&nbsp;necessary&nbsp;shared&nbsp;libraries&nbsp;<br/>
or&nbsp;providers&nbsp;are&nbsp;installed&nbsp;when&nbsp;a&nbsp;given&nbsp;app&nbsp;is&nbsp;installed&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;示例：&nbsp;<br/>
&nbsp;&nbsp;&nbsp;LOCAL_REQUIRED_MODULES&nbsp;+=&nbsp;$(installed_shared_library_module_names)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CLANG">■ &nbsp;&nbsp;LOCAL_CLANG</a></h3>
<p>
表示编译C代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CFLAGS">■ &nbsp;&nbsp;LOCAL_CFLAGS</a></h3>
<p>
表示编译C代码时用的参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDFLAGS">■ &nbsp;&nbsp;LOCAL_LDFLAGS</a></h3>
<p>
表示链接时用的参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDRESS_SANITIZER">■ &nbsp;&nbsp;LOCAL_ADDRESS_SANITIZER</a></h3>
<p>
地址对齐<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG">■ &nbsp;&nbsp;CLANG</a></h3>
<p>
C编译器<br/>
CLANG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CXX">■ &nbsp;&nbsp;CLANG_CXX</a></h3>
<p>
C++编译器&nbsp;<br/>
CLANG_CXX&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang++$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ENABLE_APROF">■ &nbsp;&nbsp;LOCAL_ENABLE_APROF</a></h3>
<p>
编译动态链接库时用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ASFLAGS">■ &nbsp;&nbsp;LOCAL_ASFLAGS</a></h3>
<p>
Explicitly&nbsp;declare&nbsp;assembly-only&nbsp;__ASSEMBLY__&nbsp;macro&nbsp;for<br/>
assembly&nbsp;source<br/>
&nbsp;&nbsp;LOCAL_ASFLAGS&nbsp;+=&nbsp;-D__ASSEMBLY__<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_TARGETS">■ &nbsp;&nbsp;LOCAL_INTERMEDIATE_TARGETS</a></h3>
<p>
编译动态链接库时用，&nbsp;<br/>
LOCAL_INTERMEDIATE_TARGETS&nbsp;:=&nbsp;$(linked_module)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_GENERATED_SOURCES">■ &nbsp;&nbsp;LOCAL_GENERATED_SOURCES</a></h3>
<p>
编译时生成的源代码文件，像aidl将专为java代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="proto_generated_cc_sources">■ &nbsp;&nbsp;proto_generated_cc_sources</a></h3>
<p>
定义了将.proto编译为.cc的目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="proto_generated_objects">■ &nbsp;&nbsp;proto_generated_objects</a></h3>
<p>
定义了将&nbsp;proto代码编译后的c代码编译为目标文件的目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="yacc_cpps">■ &nbsp;&nbsp;yacc_cpps</a></h3>
<p>
利用yacc将.y文件编译为.cpp文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="yacc_objects">■ &nbsp;&nbsp;yacc_objects</a></h3>
<p>
将.y文件编译的.cpp文件编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="lex_cpps">■ &nbsp;&nbsp;lex_cpps</a></h3>
<p>
利用lex将.l文件编译为.cpp文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="lex_objects">■ &nbsp;&nbsp;lex_objects</a></h3>
<p>
利用lex将lex编译出来的.cpp编译为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="cpp_objects">■ &nbsp;&nbsp;cpp_objects</a></h3>
<p>
将cpp编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_cpp_objects">■ &nbsp;&nbsp;gen_cpp_objects</a></h3>
<p>
将生成的Cpp编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_s_objects">■ &nbsp;&nbsp;gen_s_objects</a></h3>
<p>
将汇编代码.s,.S编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="c_objects">■ &nbsp;&nbsp;c_objects</a></h3>
<p>
将c代码编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_c_objects">■ &nbsp;&nbsp;gen_c_objects</a></h3>
<p>
将生成的C文件编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="objc_sources">■ &nbsp;&nbsp;objc_sources</a></h3>
<p>
将objectc代码(以.m结尾)编译为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="asm_objects_S">■ &nbsp;&nbsp;asm_objects_S</a></h3>
<p>
将汇编代码编译[.S]为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="asm_objects_s">■ &nbsp;&nbsp;asm_objects_s</a></h3>
<p>
将汇编代码编译[.s]为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="import_includes">■ &nbsp;&nbsp;import_includes</a></h3>
<p>
需要include的头文件<br/>
内容示例：-I&nbsp;system/core/fs_mgr/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_objects">■ &nbsp;&nbsp;all_objects</a></h3>
<p>
some&nbsp;rules&nbsp;depend&nbsp;on&nbsp;asm_objects&nbsp;being&nbsp;first.&nbsp;&nbsp;If&nbsp;your&nbsp;code&nbsp;depends&nbsp;on<br/>
&nbsp;&nbsp;&nbsp;being&nbsp;first,&nbsp;it's&nbsp;reasonable&nbsp;to&nbsp;require&nbsp;it&nbsp;to&nbsp;be&nbsp;assembly<br/>
&nbsp;&nbsp;&nbsp;要编译的目标集合&nbsp;<br/>
&nbsp;&nbsp;&nbsp;all_objects&nbsp;:=&nbsp;\<br/>
$(asm_objects)&nbsp;\<br/>
$(cpp_objects)&nbsp;\<br/>
$(gen_cpp_objects)&nbsp;\<br/>
$(gen_asm_objects)&nbsp;\<br/>
$(c_objects)&nbsp;\<br/>
$(gen_c_objects)&nbsp;\<br/>
$(objc_objects)&nbsp;\<br/>
$(yacc_objects)&nbsp;\<br/>
$(lex_objects)&nbsp;\<br/>
$(proto_generated_objects)&nbsp;\<br/>
$(addprefix&nbsp;$(TOPDIR)$(LOCAL_PATH)/,$(LOCAL_PREBUILT_OBJ_FILES))&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COPY_HEADERS">■ &nbsp;&nbsp;LOCAL_COPY_HEADERS</a></h3>
<p>
The&nbsp;set&nbsp;of&nbsp;files&nbsp;to&nbsp;copy&nbsp;to&nbsp;the&nbsp;install&nbsp;include&nbsp;tree.&nbsp;You&nbsp;must&nbsp;also&nbsp;supply&nbsp;LOCAL_COPY_HEADERS_TO<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COPY_HEADERS_TO">■ &nbsp;&nbsp;LOCAL_COPY_HEADERS_TO</a></h3>
<p>
The&nbsp;directory&nbsp;within&nbsp;"include"&nbsp;to&nbsp;copy&nbsp;the&nbsp;headers&nbsp;listed&nbsp;in&nbsp;LOCAL_COPY_HEADERS&nbsp;to<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CC">■ &nbsp;&nbsp;LOCAL_CC</a></h3>
<p>
If&nbsp;you&nbsp;want&nbsp;to&nbsp;use&nbsp;a&nbsp;different&nbsp;C&nbsp;compiler&nbsp;for&nbsp;this&nbsp;module,&nbsp;set&nbsp;LOCAL_CC&nbsp;to&nbsp;the&nbsp;path&nbsp;to&nbsp;the&nbsp;compiler.&nbsp;If&nbsp;LOCAL_CC&nbsp;is&nbsp;blank,&nbsp;the&nbsp;appropriate&nbsp;default&nbsp;compiler&nbsp;is&nbsp;used<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CXX">■ &nbsp;&nbsp;LOCAL_CXX</a></h3>
<p>
If&nbsp;you&nbsp;want&nbsp;to&nbsp;use&nbsp;a&nbsp;different&nbsp;C++&nbsp;compiler&nbsp;for&nbsp;this&nbsp;module,&nbsp;set&nbsp;LOCAL_CXX&nbsp;to&nbsp;the&nbsp;path&nbsp;to&nbsp;the&nbsp;compiler.&nbsp;If&nbsp;LOCAL_CXX&nbsp;is&nbsp;blank,&nbsp;the&nbsp;appropriate&nbsp;default&nbsp;compiler&nbsp;is&nbsp;used.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ASSET_FILES">■ &nbsp;&nbsp;LOCAL_ASSET_FILES</a></h3>
<p>
In&nbsp;Android.mk&nbsp;files&nbsp;that&nbsp;include&nbsp;$(BUILD_PACKAGE)&nbsp;set&nbsp;this&nbsp;to&nbsp;the&nbsp;set&nbsp;of&nbsp;files&nbsp;you&nbsp;want&nbsp;built&nbsp;into&nbsp;your&nbsp;app.&nbsp;Usually<br/>
LOCAL_ASSET_FILES&nbsp;+=&nbsp;$(call&nbsp;find-subdir-assets)<br/>
&nbsp;This&nbsp;will&nbsp;probably&nbsp;change&nbsp;when&nbsp;we&nbsp;switch&nbsp;to&nbsp;ant&nbsp;for&nbsp;the&nbsp;apps'&nbsp;build&nbsp;system.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_DEFAULT_COMPILER_FLAGS">■ &nbsp;&nbsp;LOCAL_NO_DEFAULT_COMPILER_FLAGS</a></h3>
<p>
Normally,&nbsp;the&nbsp;compile&nbsp;line&nbsp;for&nbsp;C&nbsp;and&nbsp;C++&nbsp;files&nbsp;includes&nbsp;global&nbsp;include&nbsp;paths&nbsp;and&nbsp;global&nbsp;cflags.&nbsp;If&nbsp;LOCAL_NO_DEFAULT_COMPILER_FLAGS&nbsp;is&nbsp;non-empty,&nbsp;none&nbsp;of&nbsp;the&nbsp;default&nbsp;includes&nbsp;or&nbsp;flags&nbsp;will&nbsp;be&nbsp;used&nbsp;when&nbsp;compiling&nbsp;C&nbsp;and&nbsp;C++&nbsp;files&nbsp;in&nbsp;this&nbsp;module.&nbsp;LOCAL_C_INCLUDES,&nbsp;LOCAL_CFLAGS,&nbsp;and&nbsp;LOCAL_CPPFLAGS&nbsp;will&nbsp;still&nbsp;be&nbsp;used&nbsp;in&nbsp;this&nbsp;case,&nbsp;as&nbsp;will&nbsp;any&nbsp;DEBUG_CFLAGS&nbsp;that&nbsp;are&nbsp;defined&nbsp;for&nbsp;the&nbsp;module.&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FORCE_STATIC_EXECUTABLE">■ &nbsp;&nbsp;LOCAL_FORCE_STATIC_EXECUTABLE</a></h3>
<p>
If&nbsp;your&nbsp;executable&nbsp;should&nbsp;be&nbsp;linked&nbsp;statically,&nbsp;set&nbsp;LOCAL_FORCE_STATIC_EXECUTABLE:=true.&nbsp;There&nbsp;is&nbsp;a&nbsp;very&nbsp;short&nbsp;list&nbsp;of&nbsp;libraries&nbsp;that&nbsp;we&nbsp;have&nbsp;in&nbsp;static&nbsp;form&nbsp;(currently&nbsp;only&nbsp;libc).&nbsp;This&nbsp;is&nbsp;really&nbsp;only&nbsp;used&nbsp;for&nbsp;executables&nbsp;in&nbsp;/sbin&nbsp;on&nbsp;the&nbsp;root&nbsp;filesystem<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVACFLAGS">■ &nbsp;&nbsp;LOCAL_JAVACFLAGS</a></h3>
<p>
If&nbsp;you&nbsp;have&nbsp;additional&nbsp;flags&nbsp;to&nbsp;pass&nbsp;into&nbsp;the&nbsp;javac&nbsp;compiler,&nbsp;add&nbsp;them&nbsp;here.&nbsp;For&nbsp;example:<br/>
&nbsp;LOCAL_JAVACFLAGS&nbsp;+=&nbsp;-Xlint:deprecation<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_LIBRARIES">■ &nbsp;&nbsp;LOCAL_JAVA_LIBRARIES</a></h3>
<p>
When&nbsp;linking&nbsp;Java&nbsp;apps&nbsp;and&nbsp;libraries,&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;specifies&nbsp;which&nbsp;sets&nbsp;of&nbsp;java&nbsp;classes&nbsp;to&nbsp;include.&nbsp;Currently&nbsp;there&nbsp;are&nbsp;two&nbsp;of&nbsp;these:&nbsp;core&nbsp;and&nbsp;framework.&nbsp;In&nbsp;most&nbsp;cases,&nbsp;it&nbsp;will&nbsp;look&nbsp;like&nbsp;this:<br/>
LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;core&nbsp;framework<br/>
Note&nbsp;that&nbsp;setting&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;is&nbsp;not&nbsp;necessary&nbsp;(and&nbsp;is&nbsp;not&nbsp;allowed)&nbsp;when&nbsp;building&nbsp;an&nbsp;APK&nbsp;with&nbsp;"include&nbsp;$(BUILD_PACKAGE)".&nbsp;The&nbsp;appropriate&nbsp;libraries&nbsp;will&nbsp;be&nbsp;included&nbsp;automatically.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDFLAGS">■ &nbsp;&nbsp;LOCAL_LDFLAGS</a></h3>
<p>
You&nbsp;can&nbsp;pass&nbsp;additional&nbsp;flags&nbsp;to&nbsp;the&nbsp;linker&nbsp;by&nbsp;setting&nbsp;LOCAL_LDFLAGS.&nbsp;Keep&nbsp;in&nbsp;mind&nbsp;that&nbsp;the&nbsp;order&nbsp;of&nbsp;parameters&nbsp;is&nbsp;very&nbsp;important&nbsp;to&nbsp;ld,&nbsp;so&nbsp;test&nbsp;whatever&nbsp;you&nbsp;do&nbsp;on&nbsp;all&nbsp;platforms.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDLIBS">■ &nbsp;&nbsp;LOCAL_LDLIBS</a></h3>
<p>
LOCAL_LDLIBS&nbsp;allows&nbsp;you&nbsp;to&nbsp;specify&nbsp;additional&nbsp;libraries&nbsp;that&nbsp;are&nbsp;not&nbsp;part&nbsp;of&nbsp;the&nbsp;build&nbsp;for&nbsp;your&nbsp;executable&nbsp;or&nbsp;library.&nbsp;Specify&nbsp;the&nbsp;libraries&nbsp;you&nbsp;want&nbsp;in&nbsp;-lxxx&nbsp;format;&nbsp;they're&nbsp;passed&nbsp;directly&nbsp;to&nbsp;the&nbsp;link&nbsp;line.&nbsp;However,&nbsp;keep&nbsp;in&nbsp;mind&nbsp;that&nbsp;there&nbsp;will&nbsp;be&nbsp;no&nbsp;dependency&nbsp;generated&nbsp;for&nbsp;these&nbsp;libraries.&nbsp;It's&nbsp;most&nbsp;useful&nbsp;in&nbsp;simulator&nbsp;builds&nbsp;where&nbsp;you&nbsp;want&nbsp;to&nbsp;use&nbsp;a&nbsp;library&nbsp;preinstalled&nbsp;on&nbsp;the&nbsp;host.&nbsp;The&nbsp;linker&nbsp;(ld)&nbsp;is&nbsp;a&nbsp;particularly&nbsp;fussy&nbsp;beast,&nbsp;so&nbsp;it's&nbsp;sometimes&nbsp;necessary&nbsp;to&nbsp;pass&nbsp;other&nbsp;flags&nbsp;here&nbsp;if&nbsp;you're&nbsp;doing&nbsp;something&nbsp;sneaky.&nbsp;Some&nbsp;examples:<br/>
LOCAL_LDLIBS&nbsp;+=&nbsp;-lcurses&nbsp;-lpthread<br/>
LOCAL_LDLIBS&nbsp;+=&nbsp;-Wl,-z,origin&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_MANIFEST">■ &nbsp;&nbsp;LOCAL_NO_MANIFEST</a></h3>
<p>
If&nbsp;your&nbsp;package&nbsp;doesn't&nbsp;have&nbsp;a&nbsp;manifest&nbsp;(AndroidManifest.xml),&nbsp;then&nbsp;set&nbsp;LOCAL_NO_MANIFEST:=true.&nbsp;The&nbsp;common&nbsp;resources&nbsp;package&nbsp;does&nbsp;this.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PACKAGE_NAME">■ &nbsp;&nbsp;LOCAL_PACKAGE_NAME</a></h3>
<p>
LOCAL_PACKAGE_NAME&nbsp;is&nbsp;the&nbsp;name&nbsp;of&nbsp;an&nbsp;app.&nbsp;For&nbsp;example,&nbsp;Dialer,&nbsp;Contacts,&nbsp;etc.&nbsp;This&nbsp;will&nbsp;probably&nbsp;change&nbsp;or&nbsp;go&nbsp;away&nbsp;when&nbsp;we&nbsp;switch&nbsp;to&nbsp;an&nbsp;ant-based&nbsp;build&nbsp;system&nbsp;for&nbsp;the&nbsp;apps.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_POST_PROCESS_COMMAND">■ &nbsp;&nbsp;LOCAL_POST_PROCESS_COMMAND</a></h3>
<p>
For&nbsp;host&nbsp;executables,&nbsp;you&nbsp;can&nbsp;specify&nbsp;a&nbsp;command&nbsp;to&nbsp;run&nbsp;on&nbsp;the&nbsp;module&nbsp;after&nbsp;it's&nbsp;been&nbsp;linked.&nbsp;You&nbsp;might&nbsp;have&nbsp;to&nbsp;go&nbsp;through&nbsp;some&nbsp;contortions&nbsp;to&nbsp;get&nbsp;variables&nbsp;right&nbsp;because&nbsp;of&nbsp;early&nbsp;or&nbsp;late&nbsp;variable&nbsp;evaluation:<br/>
&nbsp;&nbsp;module&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/$(LOCAL_MODULE)<br/>
&nbsp;&nbsp;LOCAL_POST_PROCESS_COMMAND&nbsp;:=&nbsp;/Developer/Tools/Rez&nbsp;-d&nbsp;__DARWIN__&nbsp;-t&nbsp;APPL\<br/>
&nbsp;&nbsp;-d&nbsp;__WXMAC__&nbsp;-o&nbsp;$(module)&nbsp;Carbon.r&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_EXECUTABLES">■ &nbsp;&nbsp;LOCAL_PREBUILT_EXECUTABLES</a></h3>
<p>
When&nbsp;including&nbsp;$(BUILD_PREBUILT)&nbsp;or&nbsp;$(BUILD_HOST_PREBUILT),&nbsp;set&nbsp;these&nbsp;to&nbsp;executables&nbsp;that&nbsp;you&nbsp;want&nbsp;copied.&nbsp;They're&nbsp;located&nbsp;automatically&nbsp;into&nbsp;the&nbsp;right&nbsp;bin&nbsp;directory<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_LIBS">■ &nbsp;&nbsp;LOCAL_PREBUILT_LIBS</a></h3>
<p>
When&nbsp;including&nbsp;$(BUILD_PREBUILT)&nbsp;or&nbsp;$(BUILD_HOST_PREBUILT),&nbsp;set&nbsp;these&nbsp;to&nbsp;libraries&nbsp;that&nbsp;you&nbsp;want&nbsp;copied.&nbsp;They're&nbsp;located&nbsp;automatically&nbsp;into&nbsp;the&nbsp;right&nbsp;lib&nbsp;directory.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNSTRIPPED_PATH">■ &nbsp;&nbsp;LOCAL_UNSTRIPPED_PATH</a></h3>
<p>
Instructs&nbsp;the&nbsp;build&nbsp;system&nbsp;to&nbsp;put&nbsp;the&nbsp;unstripped&nbsp;version&nbsp;of&nbsp;the&nbsp;module&nbsp;somewhere&nbsp;other&nbsp;than&nbsp;what's&nbsp;normal&nbsp;for&nbsp;its&nbsp;type.&nbsp;Usually,&nbsp;you&nbsp;override&nbsp;this&nbsp;because&nbsp;you&nbsp;overrode&nbsp;LOCAL_MODULE_PATH&nbsp;for&nbsp;an&nbsp;executable&nbsp;or&nbsp;a&nbsp;shared&nbsp;library.&nbsp;If&nbsp;you&nbsp;overrode&nbsp;LOCAL_MODULE_PATH,&nbsp;but&nbsp;not&nbsp;LOCAL_UNSTRIPPED_PATH,&nbsp;an&nbsp;error&nbsp;will&nbsp;occur.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_PATH">■ &nbsp;&nbsp;LOCAL_MODULE_PATH</a></h3>
<p>
Instructs&nbsp;the&nbsp;build&nbsp;system&nbsp;to&nbsp;put&nbsp;the&nbsp;module&nbsp;somewhere&nbsp;other&nbsp;than&nbsp;what's&nbsp;normal&nbsp;for&nbsp;its&nbsp;type.&nbsp;If&nbsp;you&nbsp;override&nbsp;this,&nbsp;make&nbsp;sure&nbsp;you&nbsp;also&nbsp;set&nbsp;LOCAL_UNSTRIPPED_PATH&nbsp;if&nbsp;it's&nbsp;an&nbsp;executable&nbsp;or&nbsp;a&nbsp;shared&nbsp;library&nbsp;so&nbsp;the&nbsp;unstripped&nbsp;binary&nbsp;has&nbsp;somewhere&nbsp;to&nbsp;go.&nbsp;An&nbsp;error&nbsp;will&nbsp;occur&nbsp;if&nbsp;you&nbsp;forget&nbsp;to.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_YACCFLAGS">■ &nbsp;&nbsp;LOCAL_YACCFLAGS</a></h3>
<p>
Any&nbsp;flags&nbsp;to&nbsp;pass&nbsp;to&nbsp;invocations&nbsp;of&nbsp;yacc&nbsp;for&nbsp;your&nbsp;module.&nbsp;A&nbsp;known&nbsp;limitation&nbsp;here&nbsp;is&nbsp;that&nbsp;the&nbsp;flags&nbsp;will&nbsp;be&nbsp;the&nbsp;same&nbsp;for&nbsp;all&nbsp;invocations&nbsp;of&nbsp;YACC&nbsp;for&nbsp;your&nbsp;module.&nbsp;This&nbsp;can&nbsp;be&nbsp;fixed.&nbsp;If&nbsp;you&nbsp;ever&nbsp;need&nbsp;it&nbsp;to&nbsp;be,&nbsp;just&nbsp;ask.<br/>
LOCAL_YACCFLAGS&nbsp;:=&nbsp;-p&nbsp;kjsyy<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDITIONAL_DEPENDENCIES">■ &nbsp;&nbsp;LOCAL_ADDITIONAL_DEPENDENCIES</a></h3>
<p>
If&nbsp;your&nbsp;module&nbsp;needs&nbsp;to&nbsp;depend&nbsp;on&nbsp;anything&nbsp;else&nbsp;that&nbsp;isn't&nbsp;actually&nbsp;built&nbsp;in&nbsp;to&nbsp;it,&nbsp;you&nbsp;can&nbsp;add&nbsp;those&nbsp;make&nbsp;targets&nbsp;to&nbsp;LOCAL_ADDITIONAL_DEPENDENCIES.&nbsp;Usually&nbsp;this&nbsp;is&nbsp;a&nbsp;workaround&nbsp;for&nbsp;some&nbsp;other&nbsp;dependency&nbsp;that&nbsp;isn't&nbsp;created&nbsp;automatically.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE">■ &nbsp;&nbsp;LOCAL_BUILT_MODULE</a></h3>
<p>
When&nbsp;a&nbsp;module&nbsp;is&nbsp;built,&nbsp;the&nbsp;module&nbsp;is&nbsp;created&nbsp;in&nbsp;an&nbsp;intermediate&nbsp;directory&nbsp;then&nbsp;copied&nbsp;to&nbsp;its&nbsp;final&nbsp;location.&nbsp;LOCAL_BUILT_MODULE&nbsp;is&nbsp;the&nbsp;full&nbsp;path&nbsp;to&nbsp;the&nbsp;intermediate&nbsp;file.&nbsp;See&nbsp;LOCAL_INSTALLED_MODULE&nbsp;for&nbsp;the&nbsp;path&nbsp;to&nbsp;the&nbsp;final&nbsp;installed&nbsp;location&nbsp;of&nbsp;the&nbsp;module.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_HOST">■ &nbsp;&nbsp;LOCAL_HOST</a></h3>
<p>
Set&nbsp;by&nbsp;the&nbsp;host_xxx.make&nbsp;includes&nbsp;to&nbsp;tell&nbsp;base_rules.make&nbsp;and&nbsp;the&nbsp;other&nbsp;includes&nbsp;that&nbsp;we're&nbsp;building&nbsp;for&nbsp;the&nbsp;host.&nbsp;Kenneth&nbsp;did&nbsp;this&nbsp;as&nbsp;part&nbsp;of&nbsp;openbinder,&nbsp;and&nbsp;I&nbsp;would&nbsp;like&nbsp;to&nbsp;clean&nbsp;it&nbsp;up&nbsp;so&nbsp;the&nbsp;rules,&nbsp;includes&nbsp;and&nbsp;definitions&nbsp;aren't&nbsp;duplicated&nbsp;for&nbsp;host&nbsp;and&nbsp;target.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE">■ &nbsp;&nbsp;LOCAL_INSTALLED_MODULE</a></h3>
<p>
The&nbsp;fully&nbsp;qualified&nbsp;path&nbsp;name&nbsp;of&nbsp;the&nbsp;final&nbsp;location&nbsp;of&nbsp;the&nbsp;module.&nbsp;See&nbsp;LOCAL_BUILT_MODULE&nbsp;for&nbsp;the&nbsp;location&nbsp;of&nbsp;the&nbsp;intermediate&nbsp;file&nbsp;that&nbsp;the&nbsp;make&nbsp;rules&nbsp;should&nbsp;actually&nbsp;be&nbsp;constructing.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_REPLACE_VARS">■ &nbsp;&nbsp;LOCAL_REPLACE_VARS</a></h3>
<p>
Used&nbsp;in&nbsp;some&nbsp;stuff&nbsp;remaining&nbsp;from&nbsp;the&nbsp;openbinder&nbsp;for&nbsp;building&nbsp;scripts&nbsp;with&nbsp;particular&nbsp;values&nbsp;set,<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SCRIPTS">■ &nbsp;&nbsp;LOCAL_SCRIPTS</a></h3>
<p>
Used&nbsp;in&nbsp;some&nbsp;stuff&nbsp;remaining&nbsp;from&nbsp;the&nbsp;openbinder&nbsp;build&nbsp;system&nbsp;that&nbsp;we&nbsp;might&nbsp;find&nbsp;handy&nbsp;some&nbsp;day.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">■ &nbsp;&nbsp;LOCAL_MODULE_CLASS</a></h3>
<p>
Which&nbsp;kind&nbsp;of&nbsp;module&nbsp;this&nbsp;is.&nbsp;This&nbsp;variable&nbsp;is&nbsp;used&nbsp;to&nbsp;construct&nbsp;other&nbsp;variable&nbsp;names&nbsp;used&nbsp;to&nbsp;locate&nbsp;the&nbsp;modules.&nbsp;See&nbsp;base_rules.make&nbsp;and&nbsp;envsetup.make.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_NAME">■ &nbsp;&nbsp;LOCAL_MODULE_NAME</a></h3>
<p>
Set&nbsp;to&nbsp;the&nbsp;leaf&nbsp;name&nbsp;of&nbsp;the&nbsp;LOCAL_BUILT_MODULE.&nbsp;I'm&nbsp;not&nbsp;sure,&nbsp;but&nbsp;it&nbsp;looks&nbsp;like&nbsp;it's&nbsp;just&nbsp;used&nbsp;in&nbsp;the&nbsp;WHO_AM_I&nbsp;variable&nbsp;to&nbsp;identify&nbsp;in&nbsp;the&nbsp;pretty&nbsp;printing&nbsp;what's&nbsp;being&nbsp;built.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">■ &nbsp;&nbsp;LOCAL_MODULE_SUFFIX</a></h3>
<p>
The&nbsp;suffix&nbsp;that&nbsp;will&nbsp;be&nbsp;appended&nbsp;to&nbsp;LOCAL_MODULE&nbsp;to&nbsp;form&nbsp;LOCAL_MODULE_NAME.&nbsp;For&nbsp;example,&nbsp;.so,&nbsp;.a,&nbsp;.dylib.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STRIP_MODULE">■ &nbsp;&nbsp;LOCAL_STRIP_MODULE</a></h3>
<p>
Calculated&nbsp;in&nbsp;base_rules.make&nbsp;to&nbsp;determine&nbsp;if&nbsp;this&nbsp;module&nbsp;should&nbsp;actually&nbsp;be&nbsp;stripped&nbsp;or&nbsp;not,&nbsp;based&nbsp;on&nbsp;whether&nbsp;LOCAL_STRIPPABLE_MODULE&nbsp;is&nbsp;set,&nbsp;and&nbsp;whether&nbsp;the&nbsp;combo&nbsp;is&nbsp;configured&nbsp;to&nbsp;ever&nbsp;strip&nbsp;modules.&nbsp;With&nbsp;Iliyan's&nbsp;stripping&nbsp;tool,&nbsp;this&nbsp;might&nbsp;change.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STRIPPABLE_MODULE">■ &nbsp;&nbsp;LOCAL_STRIPPABLE_MODULE</a></h3>
<p>
Set&nbsp;by&nbsp;the&nbsp;include&nbsp;makefiles&nbsp;if&nbsp;that&nbsp;type&nbsp;of&nbsp;module&nbsp;is&nbsp;strippable.&nbsp;Executables&nbsp;and&nbsp;shared&nbsp;libraries&nbsp;are.<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_libraries">■ &nbsp;&nbsp;all_libraries</a></h3>
<p>
all_libraries&nbsp;is&nbsp;used&nbsp;for&nbsp;the&nbsp;dependencies&nbsp;on&nbsp;LOCAL_BUILT_MODULE.<br/>
</p>
</div>
<div class="variable">
<h3><a id="export_includes">■ &nbsp;&nbsp;export_includes</a></h3>
<p>
导出的头文件，参看&nbsp;import_includes<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
