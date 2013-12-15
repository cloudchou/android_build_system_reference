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
定义了将asm，c，cpp，yacc，lex源代码编译为目标文件的基本规则<br/>
模块想生成某类型目标时不会直接包含该makefile，但如果生成二进制程序，会间接包含该makefile<br/>
dynamic_binary.mk，executable.mk，host_executable.mk，host_shared_library.mk<br/>
host_static_library.mk，prebuilt.mk，raw_executable.mk，shared_library.mk，static_library.mk<br/>
等makefile都会包含binary.mk<br/>
所有的目标文件将添加到$(all_objects)变量里<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_version_root">my_ndk_version_root</a></h3>
<p>
不知道<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_VERSION">LOCAL_SDK_VERSION</a></h3>
<p>
build/core/java.mk里定义该变量<br/>
LOCAL_SDK_VERSION&nbsp;:=&nbsp;$(PDK_BUILD_SDK_VERSION)<br/>
如果定义了LOCAL_SDK_VERSION，那么不能定义LOCAL_NDK_VERSION，否则会提示LOCAL_NDK_VERSION&nbsp;is&nbsp;now&nbsp;retired<br/>
如果定义了LOCAL_SDK_VERSION，那么不能定义LOCAL_IS_HOST_MODULE，否则提示LOCAL_SDK_VERSION&nbsp;cannot&nbsp;be&nbsp;used&nbsp;in&nbsp;host&nbsp;module<br/>
因为编译app时，常需要编译jni代码<br/>
示例：LOCAL_SDK_VERSION:&nbsp;9<br/>
</p>
</div>
<div class="variable">
<h3><a id="HISTORICAL_NDK_VERSIONS_ROOT">HISTORICAL_NDK_VERSIONS_ROOT</a></h3>
<p>
ndk的路径，在config.mk里定义：<br/>
&nbsp;&nbsp;HISTORICAL_NDK_VERSIONS_ROOT&nbsp;:=&nbsp;$(TOPDIR)prebuilts/ndk<br/>
&nbsp;&nbsp;即prebuilts/ndk<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_source_root">my_ndk_source_root</a></h3>
<p>
my_ndk_source_root&nbsp;:=&nbsp;$(HISTORICAL_NDK_VERSIONS_ROOT)/current/sources<br/>
示例：HISTORICAL_NDK_VERSIONS_ROOT：&nbsp;prebuilts/ndk<br/>
示例：&nbsp;my_ndk_source_root&nbsp;：&nbsp;prebuilts/ndk/current/sources<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_version_root">my_ndk_version_root</a></h3>
<p>
my_ndk_version_root&nbsp;:=&nbsp;$(HISTORICAL_NDK_VERSIONS_ROOT)/current/platforms/android-$(LOCAL_SDK_VERSION)/arch-$(TARGET_ARCH)<br/>
示例：<br/>
&nbsp;&nbsp;my_ndk_source_root&nbsp;：&nbsp;prebuilts/ndk/current/current<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NDK_STL_VARIANT">LOCAL_NDK_STL_VARIANT</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_NDK_STL_VARIANT&nbsp;:=&nbsp;system<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_include_path">my_ndk_stl_include_path</a></h3>
<p>
示例：prebuilts/ndk/current/sources/cxx-stl/system/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_shared_lib_fullpath">my_ndk_stl_shared_lib_fullpath</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;prebuilts/ndk/cxx-stl/stlport/libs/armeabi-v7a/libstlport_static.a<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_shared_lib">my_ndk_stl_shared_lib</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;my_ndk_stl_shared_lib&nbsp;:=&nbsp;-lstlport_shared<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_ndk_stl_static_lib">my_ndk_stl_static_lib</a></h3>
<p>
示例：prebuilts/ndk/current/sources/cxx-stl/stlport/libs/armeabi-v7a/libstlport_static.a<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SYSTEM_SHARED_LIBRARIES">LOCAL_SYSTEM_SHARED_LIBRARIES</a></h3>
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
<div class="function">
<h3><a id="insert-liblog">Function:&nbsp;&nbsp;insert-liblog</a></h3>
<p>
使得包含了libcutils或者libutils的模块，也包含liblog，并使得liblog排在前面<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SHARED_LIBRARIES">LOCAL_SHARED_LIBRARIES</a></h3>
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
<h3><a id="LOCAL_STATIC_LIBRARIES">LOCAL_STATIC_LIBRARIES</a></h3>
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
<h3><a id="LOCAL_WHOLE_STATIC_LIBRARIES">LOCAL_WHOLE_STATIC_LIBRARIES</a></h3>
<p>
链接时会将LOCAL_WHOLE_STATIC_LIBRARIES类型的静态链接库的所有目标代码放入最终目标文件里，而不去掉<br/>
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
<h3><a id="installed_shared_library_module_names">installed_shared_library_module_names</a></h3>
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
<h3><a id="LOCAL_SYSTEM_SHARED_LIBRARIES">LOCAL_SYSTEM_SHARED_LIBRARIES</a></h3>
<p>
Used&nbsp;while&nbsp;building&nbsp;the&nbsp;base&nbsp;libraries:&nbsp;libc,&nbsp;libm,&nbsp;libdl.<br/>
Usually&nbsp;it&nbsp;should&nbsp;be&nbsp;set&nbsp;to&nbsp;"none,"&nbsp;as&nbsp;it&nbsp;is&nbsp;in&nbsp;$(CLEAR_VARS).&nbsp;<br/>
When&nbsp;building&nbsp;these&nbsp;libraries,&nbsp;it's&nbsp;set&nbsp;to&nbsp;the&nbsp;ones&nbsp;they&nbsp;link&nbsp;against.&nbsp;For&nbsp;example,&nbsp;libc,&nbsp;libstdc++&nbsp;and&nbsp;libdl&nbsp;don't&nbsp;link&nbsp;against&nbsp;anything,&nbsp;and&nbsp;libm&nbsp;links&nbsp;against&nbsp;libc.&nbsp;Normally,&nbsp;when&nbsp;the&nbsp;value&nbsp;is&nbsp;none,&nbsp;these&nbsp;libraries&nbsp;are&nbsp;automatically&nbsp;linked&nbsp;in&nbsp;to&nbsp;executables&nbsp;and&nbsp;libraries,<br/>
so&nbsp;you&nbsp;don't&nbsp;need&nbsp;to&nbsp;specify&nbsp;them&nbsp;manually.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;示例：<br/>
&nbsp;libc&nbsp;libstdc++&nbsp;libm<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_REQUIRED_MODULES">LOCAL_REQUIRED_MODULES</a></h3>
<p>
本模块依赖的模块<br/>
&nbsp;Set&nbsp;LOCAL_REQUIRED_MODULES&nbsp;to&nbsp;any&nbsp;number&nbsp;of&nbsp;whitespace-separated&nbsp;module&nbsp;names,&nbsp;like&nbsp;"libblah"&nbsp;or&nbsp;"Email".&nbsp;<br/>
&nbsp;If&nbsp;this&nbsp;module&nbsp;is&nbsp;installed,&nbsp;all&nbsp;of&nbsp;the&nbsp;modules&nbsp;that&nbsp;it&nbsp;requires&nbsp;will&nbsp;be&nbsp;installed&nbsp;as&nbsp;well.&nbsp;<br/>
&nbsp;This&nbsp;can&nbsp;be&nbsp;used&nbsp;to,&nbsp;e.g.,&nbsp;ensure&nbsp;that&nbsp;necessary&nbsp;shared&nbsp;libraries&nbsp;<br/>
&nbsp;or&nbsp;providers&nbsp;are&nbsp;installed&nbsp;when&nbsp;a&nbsp;given&nbsp;app&nbsp;is&nbsp;installed<br/>
示例：&nbsp;&nbsp;<br/>
LOCAL_REQUIRED_MODULES&nbsp;+=&nbsp;$(installed_shared_library_module_names)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CLANG">LOCAL_CLANG</a></h3>
<p>
表示编译C代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CFLAGS">LOCAL_CFLAGS</a></h3>
<p>
表示编译C代码时用的参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDFLAGS">LOCAL_LDFLAGS</a></h3>
<p>
表示链接时用的参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDRESS_SANITIZER">LOCAL_ADDRESS_SANITIZER</a></h3>
<p>
地址对齐<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG">CLANG</a></h3>
<p>
C编译器<br/>
CLANG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CXX">CLANG_CXX</a></h3>
<p>
C++编译器&nbsp;<br/>
CLANG_CXX&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang++$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ENABLE_APROF">LOCAL_ENABLE_APROF</a></h3>
<p>
编译动态链接库时用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ASFLAGS">LOCAL_ASFLAGS</a></h3>
<p>
Explicitly&nbsp;declare&nbsp;assembly-only&nbsp;__ASSEMBLY__&nbsp;macro&nbsp;for<br/>
assembly&nbsp;source<br/>
&nbsp;&nbsp;LOCAL_ASFLAGS&nbsp;+=&nbsp;-D__ASSEMBLY__<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_TARGETS">LOCAL_INTERMEDIATE_TARGETS</a></h3>
<p>
编译动态链接库时用，&nbsp;<br/>
LOCAL_INTERMEDIATE_TARGETS&nbsp;:=&nbsp;$(linked_module)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_GENERATED_SOURCES">LOCAL_GENERATED_SOURCES</a></h3>
<p>
编译时生成的源代码文件，像aidl将专为java代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="proto_generated_cc_sources">proto_generated_cc_sources</a></h3>
<p>
定义了将.proto编译为.cc的目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="proto_generated_objects">proto_generated_objects</a></h3>
<p>
定义了将&nbsp;proto代码编译后的c代码编译为目标文件的目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="yacc_cpps">yacc_cpps</a></h3>
<p>
利用yacc将.y文件编译为.cpp文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="yacc_objects">yacc_objects</a></h3>
<p>
将.y文件编译的.cpp文件编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="lex_cpps">lex_cpps</a></h3>
<p>
利用lex将.l文件编译为.cpp文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="lex_objects">lex_objects</a></h3>
<p>
利用lex将lex编译出来的.cpp编译为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="cpp_objects">cpp_objects</a></h3>
<p>
将cpp编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_cpp_objects">gen_cpp_objects</a></h3>
<p>
将生成的Cpp编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_s_objects">gen_s_objects</a></h3>
<p>
将汇编代码.s,.S编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="c_objects">c_objects</a></h3>
<p>
将c代码编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="gen_c_objects">gen_c_objects</a></h3>
<p>
将生成的C文件编译为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="objc_sources">objc_sources</a></h3>
<p>
将objectc代码(以.m结尾)编译为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="asm_objects_S">asm_objects_S</a></h3>
<p>
将汇编代码编译[.S]为目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="asm_objects_s">asm_objects_s</a></h3>
<p>
将汇编代码编译[.s]为目标文件&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="import_includes">import_includes</a></h3>
<p>
需要include的头文件<br/>
内容示例：-I&nbsp;system/core/fs_mgr/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_objects">all_objects</a></h3>
<p>
要编译的目标集合&nbsp;&nbsp;&nbsp;<br/>
some&nbsp;rules&nbsp;depend&nbsp;on&nbsp;asm_objects&nbsp;being&nbsp;first.&nbsp;&nbsp;If&nbsp;your&nbsp;code&nbsp;depends&nbsp;on<br/>
&nbsp;&nbsp;&nbsp;being&nbsp;first,&nbsp;it's&nbsp;reasonable&nbsp;to&nbsp;require&nbsp;it&nbsp;to&nbsp;be&nbsp;assembly.&nbsp;&nbsp;<br/>
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
<h3><a id="LOCAL_COPY_HEADERS">LOCAL_COPY_HEADERS</a></h3>
<p>
需要拷贝至安装目录的头文件集合，你需要同时定义LOCAL_COPY_HEADERS_TO&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COPY_HEADERS_TO">LOCAL_COPY_HEADERS_TO</a></h3>
<p>
需要拷贝头头文件至哪个安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CC">LOCAL_CC</a></h3>
<p>
你可以通过LOCAL_CC定义一个不同的C编译器<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CXX">LOCAL_CXX</a></h3>
<p>
你可以通过LOCAL_CXX定义一个不同的C++编译器<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ASSET_FILES">LOCAL_ASSET_FILES</a></h3>
<p>
编译Android&nbsp;Package(app)程序时，通常用LOCAL_ASSET_FILES，表示assets目录的所有文件<br/>
通常使用方式：<br/>
LOCAL_ASSET_FILES&nbsp;+=&nbsp;$(call&nbsp;find-subdir-assets)&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_DEFAULT_COMPILER_FLAGS">LOCAL_NO_DEFAULT_COMPILER_FLAGS</a></h3>
<p>
通常为C或者C++源代码文件的编译提供了默认的头文件目录和flag，可以通过LOCAL_NO_DEFAULT_COMPILER_FLAGS设置不使用这些东东<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FORCE_STATIC_EXECUTABLE">LOCAL_FORCE_STATIC_EXECUTABLE</a></h3>
<p>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDITIONAL_DEPENDENCIES">LOCAL_ADDITIONAL_DEPENDENCIES</a></h3>
<p>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVACFLAGS">LOCAL_JAVACFLAGS</a></h3>
<p>
额外的编译java用的flags<br/>
示例：&nbsp;<br/>
LOCAL_JAVACFLAGS&nbsp;+=&nbsp;-Xlint:deprecation<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_LIBRARIES">LOCAL_JAVA_LIBRARIES</a></h3>
<p>
当链接java&nbsp;app程序和库时，&nbsp;LOCAL_JAVA_LIBRARIES指定了哪些java类将被包含，<br/>
目前只有&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;core&nbsp;framework<br/>
注意目前编译app设置LOCAL_JAVA_LIBRARIES是不必要的，也不被允许的，在include&nbsp;&nbsp;$(BUILD_PACKAGE)时<br/>
合适的库都会被包含进来<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDFLAGS">LOCAL_LDFLAGS</a></h3>
<p>
额外的链接flag&nbsp;<br/>
记住&nbsp;flag的顺序很重要，需要在所有平台都测试，否则容易出错<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDLIBS">LOCAL_LDLIBS</a></h3>
<p>
额外的动态链接库<br/>
LOCAL_LDLIBS&nbsp;allows&nbsp;you&nbsp;to&nbsp;specify&nbsp;additional&nbsp;libraries&nbsp;that&nbsp;are&nbsp;not&nbsp;part&nbsp;of&nbsp;the&nbsp;build&nbsp;for&nbsp;your&nbsp;executable&nbsp;or&nbsp;library.&nbsp;<br/>
Specify&nbsp;the&nbsp;libraries&nbsp;you&nbsp;want&nbsp;in&nbsp;-lxxx&nbsp;format;&nbsp;they're&nbsp;passed&nbsp;directly&nbsp;to&nbsp;the&nbsp;link&nbsp;line.&nbsp;<br/>
However,&nbsp;keep&nbsp;in&nbsp;mind&nbsp;that&nbsp;there&nbsp;will&nbsp;be&nbsp;no&nbsp;dependency&nbsp;generated&nbsp;for&nbsp;these&nbsp;libraries.<br/>
It's&nbsp;most&nbsp;useful&nbsp;in&nbsp;simulator&nbsp;builds&nbsp;where&nbsp;you&nbsp;want&nbsp;to&nbsp;use&nbsp;a&nbsp;library&nbsp;preinstalled&nbsp;on&nbsp;the&nbsp;host.<br/>
The&nbsp;linker&nbsp;(ld)&nbsp;is&nbsp;a&nbsp;particularly&nbsp;fussy&nbsp;beast,&nbsp;<br/>
so&nbsp;it's&nbsp;sometimes&nbsp;necessary&nbsp;to&nbsp;pass&nbsp;other&nbsp;flags&nbsp;here&nbsp;if&nbsp;you're&nbsp;doing&nbsp;something&nbsp;sneaky.<br/>
Some&nbsp;examples:<br/>
LOCAL_LDLIBS&nbsp;+=&nbsp;-lcurses&nbsp;-lpthread<br/>
LOCAL_LDLIBS&nbsp;+=&nbsp;-Wl,-z,origin&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_MANIFEST">LOCAL_NO_MANIFEST</a></h3>
<p>
如果你的packege没有manifest，可以设置LOCAL_NO_MANIFEST:=true<br/>
一般资源包会这么做<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PACKAGE_NAME">LOCAL_PACKAGE_NAME</a></h3>
<p>
App名字&nbsp;<br/>
示例：&nbsp;Dialer,&nbsp;Contacts,&nbsp;etc.&nbsp;<br/>
This&nbsp;will&nbsp;probably&nbsp;change&nbsp;or&nbsp;go&nbsp;away&nbsp;when&nbsp;we&nbsp;switch&nbsp;to&nbsp;an&nbsp;ant-based&nbsp;build&nbsp;system&nbsp;for&nbsp;the&nbsp;apps.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_POST_PROCESS_COMMAND">LOCAL_POST_PROCESS_COMMAND</a></h3>
<p>
你可以为主机上的可执行程序添加一条命令，这条命令在这个模块被链接后执行<br/>
&nbsp;You&nbsp;might&nbsp;have&nbsp;to&nbsp;go&nbsp;through&nbsp;some&nbsp;contortions&nbsp;to&nbsp;get&nbsp;variables&nbsp;right&nbsp;because&nbsp;of&nbsp;early&nbsp;or&nbsp;late&nbsp;variable&nbsp;evaluation:<br/>
module&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/$(LOCAL_MODULE)<br/>
LOCAL_POST_PROCESS_COMMAND&nbsp;:=&nbsp;/Developer/Tools/Rez&nbsp;-d&nbsp;__DARWIN__&nbsp;-t&nbsp;APPL\<br/>
-d&nbsp;__WXMAC__&nbsp;-o&nbsp;$(module)&nbsp;Carbon.r&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_EXECUTABLES">LOCAL_PREBUILT_EXECUTABLES</a></h3>
<p>
预编译好的可执行程序，一般通过include&nbsp;$(BUILD_PREBUILT)设置<br/>
会将预编译好的程序拷贝直接拷贝至安装目录&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_LIBS">LOCAL_PREBUILT_LIBS</a></h3>
<p>
预编译好的库，当使用including&nbsp;$(BUILD_PREBUILT)&nbsp;or&nbsp;$(BUILD_HOST_PREBUILT)<br/>
会将LOCAL_PREBUILT_LIBS所指的库拷贝到安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNSTRIPPED_PATH">LOCAL_UNSTRIPPED_PATH</a></h3>
<p>
没有strip的程序存放路径，通常放在symbols目录<br/>
Instructs&nbsp;the&nbsp;build&nbsp;system&nbsp;to&nbsp;put&nbsp;the&nbsp;unstripped&nbsp;version&nbsp;of&nbsp;the&nbsp;module&nbsp;somewhere&nbsp;<br/>
other&nbsp;than&nbsp;what's&nbsp;normal&nbsp;for&nbsp;its&nbsp;type.&nbsp;<br/>
Usually,&nbsp;you&nbsp;override&nbsp;this&nbsp;because&nbsp;you&nbsp;overrode&nbsp;LOCAL_MODULE_PATH&nbsp;for&nbsp;an&nbsp;executable&nbsp;or&nbsp;a&nbsp;shared&nbsp;library.<br/>
If&nbsp;you&nbsp;overrode&nbsp;LOCAL_MODULE_PATH,&nbsp;but&nbsp;not&nbsp;LOCAL_UNSTRIPPED_PATH,&nbsp;an&nbsp;error&nbsp;will&nbsp;occur.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_PATH">LOCAL_MODULE_PATH</a></h3>
<p>
表示模块生成后的程序安装路径，设置该变量后，必须设置LOCAL_UNSTRIPPED_PATH，如果是预编译的类型，则不用设置&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;Instructs&nbsp;the&nbsp;build&nbsp;system&nbsp;to&nbsp;put&nbsp;the&nbsp;module&nbsp;somewhere&nbsp;other&nbsp;than&nbsp;what's&nbsp;normal&nbsp;for&nbsp;its&nbsp;type.&nbsp;<br/>
&nbsp;&nbsp;&nbsp;If&nbsp;you&nbsp;override&nbsp;this,&nbsp;make&nbsp;sure&nbsp;you&nbsp;also&nbsp;set&nbsp;LOCAL_UNSTRIPPED_PATH&nbsp;<br/>
&nbsp;&nbsp;&nbsp;if&nbsp;it's&nbsp;an&nbsp;executable&nbsp;or&nbsp;a&nbsp;shared&nbsp;library&nbsp;so&nbsp;the&nbsp;unstripped&nbsp;binary&nbsp;has&nbsp;somewhere&nbsp;to&nbsp;go.<br/>
An&nbsp;error&nbsp;will&nbsp;occur&nbsp;if&nbsp;you&nbsp;forget&nbsp;to.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_YACCFLAGS">LOCAL_YACCFLAGS</a></h3>
<p>
额外的yacc编译器flag<br/>
Any&nbsp;flags&nbsp;to&nbsp;pass&nbsp;to&nbsp;invocations&nbsp;of&nbsp;yacc&nbsp;for&nbsp;your&nbsp;module.&nbsp;<br/>
A&nbsp;known&nbsp;limitation&nbsp;here&nbsp;is&nbsp;that&nbsp;the&nbsp;flags&nbsp;will&nbsp;be&nbsp;the&nbsp;same&nbsp;for&nbsp;all&nbsp;invocations&nbsp;of&nbsp;YACC&nbsp;for&nbsp;your&nbsp;module.&nbsp;<br/>
This&nbsp;can&nbsp;be&nbsp;fixed.&nbsp;If&nbsp;you&nbsp;ever&nbsp;need&nbsp;it&nbsp;to&nbsp;be,&nbsp;just&nbsp;ask.<br/>
LOCAL_YACCFLAGS&nbsp;:=&nbsp;-p&nbsp;kjsyy<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDITIONAL_DEPENDENCIES">LOCAL_ADDITIONAL_DEPENDENCIES</a></h3>
<p>
额外的依赖<br/>
If&nbsp;your&nbsp;module&nbsp;needs&nbsp;to&nbsp;depend&nbsp;on&nbsp;anything&nbsp;else&nbsp;that&nbsp;isn't&nbsp;actually&nbsp;built&nbsp;in&nbsp;to&nbsp;it,<br/>
you&nbsp;can&nbsp;add&nbsp;those&nbsp;make&nbsp;targets&nbsp;to&nbsp;LOCAL_ADDITIONAL_DEPENDENCIES.&nbsp;<br/>
Usually&nbsp;this&nbsp;is&nbsp;a&nbsp;workaround&nbsp;for&nbsp;some&nbsp;other&nbsp;dependency&nbsp;that&nbsp;isn't&nbsp;created&nbsp;automatically.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE">LOCAL_BUILT_MODULE</a></h3>
<p>
表示编译链接后的目标文件(文件路径+文件名),存放在临时目录<br/>
When&nbsp;a&nbsp;module&nbsp;is&nbsp;built,&nbsp;the&nbsp;module&nbsp;is&nbsp;created&nbsp;in&nbsp;an&nbsp;intermediate&nbsp;directory&nbsp;then&nbsp;copied&nbsp;to&nbsp;its&nbsp;final&nbsp;location.<br/>
&nbsp;LOCAL_BUILT_MODULE&nbsp;is&nbsp;the&nbsp;full&nbsp;path&nbsp;to&nbsp;the&nbsp;intermediate&nbsp;file.&nbsp;<br/>
&nbsp;See&nbsp;LOCAL_INSTALLED_MODULE&nbsp;for&nbsp;the&nbsp;path&nbsp;to&nbsp;the&nbsp;final&nbsp;installed&nbsp;location&nbsp;of&nbsp;the&nbsp;module.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_HOST">LOCAL_HOST</a></h3>
<p>
表示是在模块生成的文件是在主机上的程序<br/>
Set&nbsp;by&nbsp;the&nbsp;host_xxx.make&nbsp;includes&nbsp;to&nbsp;tell&nbsp;base_rules.make&nbsp;<br/>
and&nbsp;the&nbsp;other&nbsp;includes&nbsp;that&nbsp;we're&nbsp;building&nbsp;for&nbsp;the&nbsp;host.<br/>
Kenneth&nbsp;did&nbsp;this&nbsp;as&nbsp;part&nbsp;of&nbsp;openbinder,&nbsp;and&nbsp;I&nbsp;would&nbsp;like&nbsp;to&nbsp;clean&nbsp;it&nbsp;up&nbsp;so&nbsp;the&nbsp;rules,<br/>
&nbsp;includes&nbsp;and&nbsp;definitions&nbsp;aren't&nbsp;duplicated&nbsp;for&nbsp;host&nbsp;and&nbsp;target.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE">LOCAL_INSTALLED_MODULE</a></h3>
<p>
表示模块的安装路径+文件名，存放在安装目录<br/>
&nbsp;&nbsp;&nbsp;&nbsp;The&nbsp;fully&nbsp;qualified&nbsp;path&nbsp;name&nbsp;of&nbsp;the&nbsp;final&nbsp;location&nbsp;of&nbsp;the&nbsp;module.&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;See&nbsp;LOCAL_BUILT_MODULE&nbsp;for&nbsp;the&nbsp;location&nbsp;of&nbsp;the&nbsp;intermediate&nbsp;file&nbsp;that&nbsp;the&nbsp;make&nbsp;rules&nbsp;should&nbsp;actually&nbsp;be&nbsp;constructing.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_REPLACE_VARS">LOCAL_REPLACE_VARS</a></h3>
<p>
Used&nbsp;in&nbsp;some&nbsp;stuff&nbsp;remaining&nbsp;from&nbsp;the&nbsp;openbinder&nbsp;for&nbsp;building&nbsp;scripts&nbsp;with&nbsp;particular&nbsp;values&nbsp;set,<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SCRIPTS">LOCAL_SCRIPTS</a></h3>
<p>
Used&nbsp;in&nbsp;some&nbsp;stuff&nbsp;remaining&nbsp;from&nbsp;the&nbsp;openbinder&nbsp;build&nbsp;system&nbsp;that&nbsp;we&nbsp;might&nbsp;find&nbsp;handy&nbsp;some&nbsp;day.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STRIP_MODULE">LOCAL_STRIP_MODULE</a></h3>
<p>
表示该模块生成的目标是否需要被strip<br/>
&nbsp;&nbsp;&nbsp;Calculated&nbsp;in&nbsp;base_rules.make&nbsp;to&nbsp;determine&nbsp;if&nbsp;this&nbsp;module&nbsp;should&nbsp;actually&nbsp;be&nbsp;stripped&nbsp;or&nbsp;not,<br/>
&nbsp;&nbsp;&nbsp;based&nbsp;on&nbsp;whether&nbsp;LOCAL_STRIPPABLE_MODULE&nbsp;is&nbsp;set,&nbsp;and&nbsp;whether&nbsp;the&nbsp;combo&nbsp;is&nbsp;configured&nbsp;to&nbsp;ever&nbsp;strip&nbsp;modules.&nbsp;<br/>
&nbsp;&nbsp;&nbsp;With&nbsp;Iliyan's&nbsp;stripping&nbsp;tool,&nbsp;this&nbsp;might&nbsp;change.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STRIPPABLE_MODULE">LOCAL_STRIPPABLE_MODULE</a></h3>
<p>
表示模块生成的文件是否能被Strip，只有可执行程序和动态链接库可以被strip<br/>
Set&nbsp;by&nbsp;the&nbsp;include&nbsp;makefiles&nbsp;if&nbsp;that&nbsp;type&nbsp;of&nbsp;module&nbsp;is&nbsp;strippable.&nbsp;<br/>
Executables&nbsp;and&nbsp;shared&nbsp;libraries&nbsp;are.<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_libraries">all_libraries</a></h3>
<p>
all_libraries&nbsp;is&nbsp;used&nbsp;for&nbsp;the&nbsp;dependencies&nbsp;on&nbsp;LOCAL_BUILT_MODULE.<br/>
</p>
</div>
<div class="variable">
<h3><a id="export_includes">export_includes</a></h3>
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
