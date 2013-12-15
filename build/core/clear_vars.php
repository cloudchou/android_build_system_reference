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
<h3>build/core/clear_vars.mk</h3>
<p>
Clear&nbsp;out&nbsp;values&nbsp;of&nbsp;all&nbsp;variables&nbsp;used&nbsp;by&nbsp;rule&nbsp;templates<br/>
清除LOCAL变量，每个模块的Android.mk，一般会先包含该文件<br/>
变量定义主要出现在base_rules.mk，config.mk，definitions.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE">LOCAL_MODULE</a></h3>
<p>
LOCAL_MODULE表示模块的名称<br/>
&nbsp;&nbsp;&nbsp;LOCAL_MODULE将在每个模块的makefile里定义，如果未定义，编译系统会报错<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_PATH">LOCAL_MODULE_PATH</a></h3>
<p>
表示模块编译结果将要存放的目录<br/>
&nbsp;&nbsp;&nbsp;&nbsp;recovery模块的Android.mk里有<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE&nbsp;:=&nbsp;nandroid-md5.sh&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE_PATH&nbsp;:=&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/sbin&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;说明：nandroid-md5.sh&nbsp;将存放于out/Cyanogenmod/target/product/m7ul/recovery/root/sbin<br/>
&nbsp;&nbsp;&nbsp;&nbsp;如果模块的Android.mk里未定义LOCAL_MODULE_PATH<br/>
&nbsp;&nbsp;&nbsp;&nbsp;那么LOCAL_MODULE_PATH&nbsp;:=&nbsp;$($(my_prefix)OUT$(partition_tag)_$(LOCAL_MODULE_CLASS))<br/>
&nbsp;&nbsp;&nbsp;&nbsp;在recovery模块里recovery可执行文件相关变量如下：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;比如my_prefix为TARGET_，partition_tag为空,LOCAL_MODULE_CLASS为EXECUTABLES<br/>
&nbsp;&nbsp;&nbsp;&nbsp;那么LOCAL_MODULE_PATH为$(TARGET_OUT_EXECUTABLES)，<br/>
&nbsp;&nbsp;&nbsp;&nbsp;值应该为<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/Cyanogenmod/target/product/m7ul/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_STEM">LOCAL_MODULE_STEM</a></h3>
<p>
表示编译链接后的目标文件的文件名，不带后缀<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE_STEM&nbsp;:=&nbsp;$(strip&nbsp;$(LOCAL_MODULE_STEM))<br/>
&nbsp;ifeq&nbsp;($(LOCAL_MODULE_STEM),)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE_STEM&nbsp;:=&nbsp;$(LOCAL_MODULE)<br/>
&nbsp;endif<br/>
&nbsp;例：<br/>
&nbsp;&nbsp;&nbsp;recovery模块编译recovery可执行文件：<br/>
&nbsp;&nbsp;&nbsp;LOCAL_MODULE_STEM:=recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DONT_CHECK_MODULE">LOCAL_DONT_CHECK_MODULE</a></h3>
<p>
如果定义了该变量，那么模块将不被检查<br/>
ifdef&nbsp;LOCAL_DONT_CHECK_MODULE<br/>
&nbsp;&nbsp;LOCAL_CHECKED_MODULE&nbsp;:=<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CHECKED_MODULE">LOCAL_CHECKED_MODULE</a></h3>
<p>
需要检查的模块&nbsp;<br/>
ifndef&nbsp;LOCAL_CHECKED_MODULE<br/>
&nbsp;&nbsp;ifndef&nbsp;LOCAL_SDK_VERSION<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_CHECKED_MODULE&nbsp;:=&nbsp;$(LOCAL_BUILT_MODULE)<br/>
&nbsp;&nbsp;endif<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE">LOCAL_BUILT_MODULE</a></h3>
<p>
表示编译链接后的目标文件(文件路径+文件名)<br/>
&nbsp;&nbsp;LOCAL_BUILT_MODULE&nbsp;:=&nbsp;$(built_module_path)/$(LOCAL_BUILT_MODULE_STEM)<br/>
&nbsp;&nbsp;比如recovery:<br/>
&nbsp;&nbsp;LOCAL_BUILT_MODULE&nbsp;路径；<br/>
&nbsp;&nbsp;out/Cyanogenmod/target/product/m7ul/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE_STEM">LOCAL_BUILT_MODULE_STEM</a></h3>
<p>
表示编译链接后的目标文件的文件名，带后缀<br/>
LOCAL_BUILT_MODULE_STEM&nbsp;:=&nbsp;$(strip&nbsp;$(LOCAL_BUILT_MODULE_STEM))<br/>
ifeq&nbsp;($(LOCAL_BUILT_MODULE_STEM),)<br/>
&nbsp;&nbsp;LOCAL_BUILT_MODULE_STEM&nbsp;:=&nbsp;$(LOCAL_INSTALLED_MODULE_STEM)<br/>
endif<br/>
例：<br/>
recovery模块编译recovery可执行文件：<br/>
LOCAL_INSTALLED_MODULE_STEM:=recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="OVERRIDE_BUILT_MODULE_PATH">OVERRIDE_BUILT_MODULE_PATH</a></h3>
<p>
只有内部动态链接库模块可以使用OVERRIDE_BUILT_MODULE_PATH&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;OVERRIDE_BUILT_MODULE_PATH&nbsp;:=&nbsp;$(strip&nbsp;$(OVERRIDE_BUILT_MODULE_PATH))<br/>
ifdef&nbsp;OVERRIDE_BUILT_MODULE_PATH<br/>
&nbsp;&nbsp;ifneq&nbsp;($(LOCAL_MODULE_CLASS),SHARED_LIBRARIES)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(error&nbsp;$(LOCAL_PATH):&nbsp;Illegal&nbsp;use&nbsp;of&nbsp;OVERRIDE_BUILT_MODULE_PATH)<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;built_module_path&nbsp;:=&nbsp;$(OVERRIDE_BUILT_MODULE_PATH)<br/>
else<br/>
&nbsp;&nbsp;built_module_path&nbsp;:=&nbsp;$(intermediates)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE">LOCAL_INSTALLED_MODULE</a></h3>
<p>
表示模块的安装路径+文件名，存放在安装目录<br/>
ifneq&nbsp;(true,$(LOCAL_UNINSTALLABLE_MODULE))<br/>
&nbsp;LOCAL_INSTALLED_MODULE&nbsp;:=&nbsp;$(LOCAL_MODULE_PATH)/$(LOCAL_INSTALLED_MODULE_STEM)<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;示例：<br/>
&nbsp;&nbsp;out/Cyanogenmod/target/product/m7ul/system/bin/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNINSTALLABLE_MODULE">LOCAL_UNINSTALLABLE_MODULE</a></h3>
<p>
表示该模块是否安装至手机，像sdk文档模块不会被安装至手机，<br/>
&nbsp;因此LOCAL_UNINSTALLABLE_MODULE为true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_TARGETS">LOCAL_INTERMEDIATE_TARGETS</a></h3>
<p>
Assemble&nbsp;the&nbsp;list&nbsp;of&nbsp;targets&nbsp;to&nbsp;create&nbsp;PRIVATE_&nbsp;variables&nbsp;for.<br/>
LOCAL_INTERMEDIATE_TARGETS&nbsp;+=&nbsp;$(LOCAL_BUILT_MODULE)<br/>
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
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
将用于决定编译时的中间文件存放的位置<br/>
LOCAL_MODULE_CLASS在定义目标生成方式的makefile文件里定义，<br/>
&nbsp;&nbsp;比如executable.mk里定义LOCAL_MODULE_CLASS&nbsp;:=&nbsp;EXECUTABLES<br/>
在recovery模块的Android.mk里定义的LOCAL_MODULE_CLASS有：<br/>
&nbsp;&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;RECOVERY_EXECUTABLES<br/>
&nbsp;&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;UTILITY_EXECUTABLES<br/>
其它的LOCAL_MODULE_CLASS有<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;ETC<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;STATIC_LIBRARIES<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;EXECUTABLES<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;FAKE<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;JAVA_LIBRARIES<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;SHARED_LIBRARIES<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;APPS<br/>
对应&nbsp;Cyanogenmod/target/product/m7ul/obj&nbsp;的目录&nbsp;<br/>
&nbsp;&nbsp;比如说若&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;ETC&nbsp;<br/>
&nbsp;&nbsp;那么该模块编译的中间文件将存放于<br/>
&nbsp;&nbsp;Cyanogenmod/target/product/m7ul/obj/ETC<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
表示编译链接后的目标文件的后缀<br/>
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
<h3><a id="LOCAL_OVERRIDES_PACKAGES">LOCAL_OVERRIDES_PACKAGES</a></h3>
<p>
Some&nbsp;packages&nbsp;may&nbsp;override&nbsp;others&nbsp;using&nbsp;LOCAL_OVERRIDES_PACKAGE&nbsp;&nbsp;&nbsp;<br/>
示例：<br/>
&nbsp;&nbsp;packages/apps/DeskClock/Android.mk:13:LOCAL_OVERRIDES_PACKAGES&nbsp;:=&nbsp;AlarmClock<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EXPORT_PACKAGE_RESOURCES">LOCAL_EXPORT_PACKAGE_RESOURCES</a></h3>
<p>
若定义该变量，资源文件打包成一个apk<br/>
示例：<br/>
&nbsp;&nbsp;frameworks/base/core/res/Android.mk:34:LOCAL_EXPORT_PACKAGE_RESOURCES&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MANIFEST_PACKAGE_NAME">LOCAL_MANIFEST_PACKAGE_NAME</a></h3>
<p>
在build/core/definitions.mk里inherit-package函数有用到LOCAL_MANIFEST_PACKAGE_NAME&nbsp;<br/>
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
<h3><a id="LOCAL_ACP_UNAVAILABLE">LOCAL_ACP_UNAVAILABLE</a></h3>
<p>
示例：<br/>
&nbsp;build/tools/acp/Android.mk:23:LOCAL_ACP_UNAVAILABLE&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_TAGS">LOCAL_MODULE_TAGS</a></h3>
<p>
模块的tag，为debug&nbsp;eng&nbsp;tests&nbsp;optional&nbsp;samples&nbsp;shell_ash&nbsp;shell_mksh等tag的组合，一个模块可有多个Tag,<br/>
注意现在模块现在不能使用user作为模块的Tag,<br/>
&nbsp;&nbsp;以前如果使用user做为tag,那么这个模块将被自动安装，<br/>
&nbsp;&nbsp;如果想定义自动安装的模块，需要在PRODUCT_PACKAGES变量里添加该模块，<br/>
&nbsp;&nbsp;该变量在build/target/product/base.mk和build/target/product/core.mk里有赋值，这是所有产品都将继承的基础配置<br/>
&nbsp;&nbsp;另外每个设备可在自己的产品配置文件device_*.mk里设置该变量，添加更多的模块&nbsp;<br/>
如果当前目录或者父目录有*_GPL*的文件，那么将自动添加gnu的tag<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SRC_FILES">LOCAL_SRC_FILES</a></h3>
<p>
源代码文件集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_OBJ_FILES">LOCAL_PREBUILT_OBJ_FILES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;sdk/find_lock/Android.mk:50:LOCAL_PREBUILT_OBJ_FILES&nbsp;+=&nbsp;images/$(FIND_LOCK_ICON_OBJ)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STATIC_JAVA_LIBRARIES">LOCAL_STATIC_JAVA_LIBRARIES</a></h3>
<p>
要链接的Java库，被链接的库将不会安装在手机上，因此会放到链接生成的java包里<br/>
示例：<br/>
&nbsp;packages/apps/Exchange/Android.mk:24:LOCAL_STATIC_JAVA_LIBRARIES&nbsp;:=&nbsp;android-common&nbsp;com.android.emailcommon<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STATIC_LIBRARIES">LOCAL_STATIC_LIBRARIES</a></h3>
<p>
表示模块要链接的静态库<br/>
&nbsp;&nbsp;&nbsp;ifneq&nbsp;(,$(filter&nbsp;libcutils&nbsp;libutils,$(LOCAL_STATIC_LIBRARIES)))<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;$(call&nbsp;insert-liblog,$(LOCAL_STATIC_LIBRARIES))<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;示例：external/busybox/Android.mk<br/>
&nbsp;&nbsp;LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;libcutils&nbsp;libc&nbsp;libm<br/>
&nbsp;&nbsp;最终：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_STATIC_LIBRARIES&nbsp;:=&nbsp;libcutils&nbsp;libc&nbsp;libm&nbsp;liblog&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_GROUP_STATIC_LIBRARIES">LOCAL_GROUP_STATIC_LIBRARIES</a></h3>
<p>
示例：<br/>
&nbsp;build/core/binary.mk:223:ifeq&nbsp;(true,$(LOCAL_GROUP_STATIC_LIBRARIES))<br/>
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
<h3><a id="LOCAL_SHARED_LIBRARIES">LOCAL_SHARED_LIBRARIES</a></h3>
<p>
表示模块要链接的动态链接库<br/>
&nbsp;&nbsp;ifneq&nbsp;(,$(filter&nbsp;libcutils&nbsp;libutils,$(LOCAL_SHARED_LIBRARIES)))<br/>
&nbsp;&nbsp;LOCAL_SHARED_LIBRARIES&nbsp;:=&nbsp;$(call&nbsp;insert-liblog,$(LOCAL_SHARED_LIBRARIES))<br/>
&nbsp;&nbsp;endif&nbsp;&nbsp;<br/>
示例：frameworks/av/media/mtp模块<br/>
Android.mk&nbsp;LOCAL_SHARED_LIBRARIES&nbsp;:=&nbsp;libutils&nbsp;libcutils&nbsp;libusbhost&nbsp;libbinder<br/>
最终：LOCAL_SHARED_LIBRARIES：&nbsp;libutils&nbsp;liblog&nbsp;libcutils&nbsp;libusbhost&nbsp;libbinder&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_IS_HOST_MODULE">LOCAL_IS_HOST_MODULE</a></h3>
<p>
表示该模块是否是将在主机上运行的模块<br/>
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
<h3><a id="LOCAL_CPP_EXTENSION">LOCAL_CPP_EXTENSION</a></h3>
<p>
当前c++代码文件后缀<br/>
external/protobuf/Android.mk:177:LOCAL_CPP_EXTENSION&nbsp;:=&nbsp;.cc<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_DEFAULT_COMPILER_FLAGS">LOCAL_NO_DEFAULT_COMPILER_FLAGS</a></h3>
<p>
通常为C或者C++源代码文件的编译提供了默认的头文件目录和flag，可以通过LOCAL_NO_DEFAULT_COMPILER_FLAGS设置不使用这些东东<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_FDO_SUPPORT">LOCAL_NO_FDO_SUPPORT</a></h3>
<p>
示例：<br/>
build/core/binary.mk:136:ifeq&nbsp;($(strip&nbsp;$(LOCAL_NO_FDO_SUPPORT)),)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ARM_MODE">LOCAL_ARM_MODE</a></h3>
<p>
示例：<br/>
ndk/tests/build/build-mode/jni/Android.mk:19:LOCAL_ARM_MODE&nbsp;:=&nbsp;thumb<br/>
ndk/tests/build/build-mode/jni/Android.mk:32:LOCAL_ARM_MODE&nbsp;:=&nbsp;arm&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_YACCFLAGS">LOCAL_YACCFLAGS</a></h3>
<p>
Any&nbsp;flags&nbsp;to&nbsp;pass&nbsp;to&nbsp;invocations&nbsp;of&nbsp;yacc&nbsp;for&nbsp;your&nbsp;module.&nbsp;<br/>
A&nbsp;known&nbsp;limitation&nbsp;here&nbsp;is&nbsp;that&nbsp;the&nbsp;flags&nbsp;will&nbsp;be&nbsp;the&nbsp;same&nbsp;for&nbsp;all&nbsp;invocations&nbsp;of&nbsp;YACC&nbsp;for&nbsp;your&nbsp;module.&nbsp;<br/>
This&nbsp;can&nbsp;be&nbsp;fixed.&nbsp;If&nbsp;you&nbsp;ever&nbsp;need&nbsp;it&nbsp;to&nbsp;be,&nbsp;just&nbsp;ask.<br/>
LOCAL_YACCFLAGS&nbsp;:=&nbsp;-p&nbsp;kjsyy<br/>
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
<h3><a id="LOCAL_CFLAGS">LOCAL_CFLAGS</a></h3>
<p>
表示编译C代码时用的参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CPPFLAGS">LOCAL_CPPFLAGS</a></h3>
<p>
编译C++代码使用的flag<br/>
&nbsp;./frameworks/av/media/libstagefright/Android.mk:78:LOCAL_CPPFLAGS&nbsp;+=&nbsp;-DUSE_TI_CUSTOM_DOMX<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RTTI_FLAG">LOCAL_RTTI_FLAG</a></h3>
<p>
编译C++代码使用rtti标记<br/>
./external/icu4c/common/Android.mk:135:LOCAL_RTTI_FLAG&nbsp;:=&nbsp;-frtti<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_C_INCLUDES">LOCAL_C_INCLUDES</a></h3>
<p>
编译C代码使用的头文件目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EXPORT_C_INCLUDE_DIRS">LOCAL_EXPORT_C_INCLUDE_DIRS</a></h3>
<p>
示例：<br/>
system/core/libsuspend/Android.mk:18:LOCAL_EXPORT_C_INCLUDE_DIRS&nbsp;:=&nbsp;$(LOCAL_PATH)/include<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LDFLAGS">LOCAL_LDFLAGS</a></h3>
<p>
表示链接时用的参数<br/>
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
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_AAPT_FLAGS">LOCAL_AAPT_FLAGS</a></h3>
<p>
使用aapt编译资源包时所用的flag<br/>
packages/apps/Calendar/Android.mk:35:LOCAL_AAPT_FLAGS&nbsp;:=&nbsp;--auto-add-overlay<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_AAPT_INCLUDE_ALL_RESOURCES">LOCAL_AAPT_INCLUDE_ALL_RESOURCES</a></h3>
<p>
使用AAPT编译时需用的一个标记，打包资源时会用到该比较<br/>
&nbsp;build/core/package.mk:391:ifeq&nbsp;($(LOCAL_AAPT_INCLUDE_ALL_RESOURCES),true)<br/>
&nbsp;packages/inputmethods/LatinIME/java/Android.mk:37:LOCAL_AAPT_INCLUDE_ALL_RESOURCES&nbsp;:=&nbsp;true<br/>
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
<div class="variable">
<h3><a id="LOCAL_PREBUILT_LIBS">LOCAL_PREBUILT_LIBS</a></h3>
<p>
预编译好的库，当使用including&nbsp;$(BUILD_PREBUILT)&nbsp;or&nbsp;$(BUILD_HOST_PREBUILT)<br/>
会将LOCAL_PREBUILT_LIBS所指的库拷贝到安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_EXECUTABLES">LOCAL_PREBUILT_EXECUTABLES</a></h3>
<p>
预编译好的可执行程序，一般通过include&nbsp;$(BUILD_PREBUILT)设置<br/>
会将预编译好的程序拷贝直接拷贝至安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_JAVA_LIBRARIES">LOCAL_PREBUILT_JAVA_LIBRARIES</a></h3>
<p>
示例：<br/>
prebuilts/misc/common/kxml2/Android.mk:19:LOCAL_PREBUILT_JAVA_LIBRARIES&nbsp;:=&nbsp;kxml2-2.3.0$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_STATIC_JAVA_LIBRARIES">LOCAL_PREBUILT_STATIC_JAVA_LIBRARIES</a></h3>
<p>
示例：<br/>
packages/apps/CMUpdater/Android.mk:39:LOCAL_PREBUILT_STATIC_JAVA_LIBRARIES&nbsp;:=&nbsp;dashclockapi:libs/dashclock-api-r1.1.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PREBUILT_STRIP_COMMENTS">LOCAL_PREBUILT_STRIP_COMMENTS</a></h3>
<p>
示例：<br/>
build/core/prebuilt.mk:52:&nbsp;&nbsp;ifneq&nbsp;($(LOCAL_PREBUILT_STRIP_COMMENTS),)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_SOURCES">LOCAL_INTERMEDIATE_SOURCES</a></h3>
<p>
示例：<br/>
frameworks/base/Android.mk:249:LOCAL_INTERMEDIATE_SOURCES&nbsp;:=&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_SOURCE_DIR">LOCAL_INTERMEDIATE_SOURCE_DIR</a></h3>
<p>
表示编译生成的源文件存放目录<br/>
LOCAL_INTERMEDIATE_SOURCE_DIR&nbsp;:=&nbsp;$(intermediates.COMMON)/src<br/>
例：out/target/common/obj/EXECUTABLES/recovery_intermediates/src<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVACFLAGS">LOCAL_JAVACFLAGS</a></h3>
<p>
If&nbsp;you&nbsp;have&nbsp;additional&nbsp;flags&nbsp;to&nbsp;pass&nbsp;into&nbsp;the&nbsp;javac&nbsp;compiler,&nbsp;add&nbsp;them&nbsp;here.&nbsp;For&nbsp;example:<br/>
&nbsp;LOCAL_JAVACFLAGS&nbsp;+=&nbsp;-Xlint:deprecation<br/>
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
<h3><a id="LOCAL_NO_STANDARD_LIBRARIES">LOCAL_NO_STANDARD_LIBRARIES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;frameworks/base/Android.mk:254:LOCAL_NO_STANDARD_LIBRARIES&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CLASSPATH">LOCAL_CLASSPATH</a></h3>
<p>
示例：<br/>
&nbsp;external/javassist/Android.mk:21:LOCAL_CLASSPATH&nbsp;:=&nbsp;$(HOST_JDK_TOOLS_JAR)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_USE_STANDARD_DOCLET">LOCAL_DROIDDOC_USE_STANDARD_DOCLET</a></h3>
<p>
示例：<br/>
device/sample/frameworks/PlatformLibrary/Android.mk:48:LOCAL_DROIDDOC_USE_STANDARD_DOCLET&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_SOURCE_PATH">LOCAL_DROIDDOC_SOURCE_PATH</a></h3>
<p>
示例：<br/>
build/core/droiddoc.mk:40:LOCAL_DROIDDOC_SOURCE_PATH&nbsp;:=&nbsp;$(LOCAL_PATH)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_TEMPLATE_DIR">LOCAL_DROIDDOC_TEMPLATE_DIR</a></h3>
<p>
暂时未见用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR">LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR</a></h3>
<p>
示例：<br/>
frameworks/base/Android.mk:591:LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR:=build/tools/droiddoc/templates-sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_ASSET_DIR">LOCAL_DROIDDOC_ASSET_DIR</a></h3>
<p>
示例：<br/>
build/core/droiddoc.mk:143:$(full_target):&nbsp;PRIVATE_OUT_ASSET_DIR&nbsp;:=&nbsp;$(out_dir)/$(LOCAL_DROIDDOC_ASSET_DIR)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_CUSTOM_ASSET_DIR">LOCAL_DROIDDOC_CUSTOM_ASSET_DIR</a></h3>
<p>
示例：<br/>
build/tools/droiddoc/test/stubs/Android.mk:25:LOCAL_DROIDDOC_CUSTOM_ASSET_DIR:=assets-google<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_OPTIONS">LOCAL_DROIDDOC_OPTIONS</a></h3>
<p>
示例：<br/>
device/sample/frameworks/PlatformLibrary/Android.mk:46:LOCAL_DROIDDOC_OPTIONS&nbsp;:=&nbsp;com.example.android.platform_library<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_HTML_DIR">LOCAL_DROIDDOC_HTML_DIR</a></h3>
<p>
示例：<br/>
&nbsp;frameworks/base/Android.mk:429:framework_docs_LOCAL_DROIDDOC_HTML_DIR&nbsp;:=&nbsp;docs/html<br/>
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
<h3><a id="LOCAL_ASSET_DIR">LOCAL_ASSET_DIR</a></h3>
<p>
编译Android&nbsp;Package(app)程序时，通常用LOCAL_ASSET_FILES，表示assets目录的所有文件<br/>
通常使用方式：<br/>
LOCAL_ASSET_FILES&nbsp;+=&nbsp;$(call&nbsp;find-subdir-assets)&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RESOURCE_DIR">LOCAL_RESOURCE_DIR</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;packages/apps/Gallery2/Android.mk:59:LOCAL_RESOURCE_DIR&nbsp;+=&nbsp;$(LOCAL_PATH)/res&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_RESOURCE_DIRS">LOCAL_JAVA_RESOURCE_DIRS</a></h3>
<p>
示例：<br/>
frameworks/base/tools/layoutlib/bridge/Android.mk:20:LOCAL_JAVA_RESOURCE_DIRS&nbsp;:=&nbsp;resources<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_RESOURCE_FILES">LOCAL_JAVA_RESOURCE_FILES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;frameworks/base/Android.mk:261:LOCAL_JAVA_RESOURCE_FILES&nbsp;+=&nbsp;$(LOCAL_PATH)/preloaded-classes<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_GENERATED_SOURCES">LOCAL_GENERATED_SOURCES</a></h3>
<p>
编译时生成的源代码文件，像aidl将转为java代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COPY_HEADERS_TO">LOCAL_COPY_HEADERS_TO</a></h3>
<p>
需要拷贝头头文件至哪个安装目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COPY_HEADERS">LOCAL_COPY_HEADERS</a></h3>
<p>
需要拷贝至安装目录的头文件集合，你需要同时定义LOCAL_COPY_HEADERS_TO&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FORCE_STATIC_EXECUTABLE">LOCAL_FORCE_STATIC_EXECUTABLE</a></h3>
<p>
强制编译为静态可执行文件，这样在执行时不会去查找动态链接库<br/>
一般只有安装在sbin目录下的可执行文件使用该变量<br/>
如果想程序在recovery下运行，一般都需要添加该变量<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;LOCAL_FORCE_STATIC_EXECUTABLE&nbsp;:=&nbsp;true<br/>
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
<h3><a id="LOCAL_ENABLE_APROF">LOCAL_ENABLE_APROF</a></h3>
<p>
编译动态链接库时用到<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ENABLE_APROF_JNI">LOCAL_ENABLE_APROF_JNI</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/shared_library.mk:26:ifeq&nbsp;($(strip&nbsp;$(LOCAL_ENABLE_APROF_JNI)),true)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_COMPRESS_MODULE_SYMBOLS">LOCAL_COMPRESS_MODULE_SYMBOLS</a></h3>
<p>
暂未见赋值之处<br/>
示例：<br/>
build/core/dynamic_binary.mk:74:ifeq&nbsp;($(LOCAL_COMPRESS_MODULE_SYMBOLS),true)<br/>
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
<h3><a id="LOCAL_JNI_SHARED_LIBRARIES">LOCAL_JNI_SHARED_LIBRARIES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;packages/inputmethods/LatinIME/java/Android.mk:27:LOCAL_JNI_SHARED_LIBRARIES&nbsp;:=&nbsp;libjni_latinime<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JNI_SHARED_LIBRARIES_ABI">LOCAL_JNI_SHARED_LIBRARIES_ABI</a></h3>
<p>
暂未见赋值之处&nbsp;<br/>
示例：<br/>
&nbsp;&nbsp;build/core/package.mk:346:&nbsp;&nbsp;&nbsp;&nbsp;jni_shared_libraries_abi&nbsp;:=&nbsp;$(LOCAL_JNI_SHARED_LIBRARIES_ABI)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAR_MANIFEST">LOCAL_JAR_MANIFEST</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;cts/tools/dasm/src/Android.mk:24:LOCAL_JAR_MANIFEST&nbsp;:=&nbsp;../etc/manifest.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTRUMENTATION_FOR">LOCAL_INSTRUMENTATION_FOR</a></h3>
<p>
示例：<br/>
&nbsp;packages/apps/Gallery/tests/Android.mk:15:LOCAL_INSTRUMENTATION_FOR&nbsp;:=&nbsp;Gallery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MANIFEST_INSTRUMENTATION_FOR">LOCAL_MANIFEST_INSTRUMENTATION_FOR</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/definitions.mk:2046:&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;keep-or-override,LOCAL_MANIFEST_INSTRUMENTATION_FOR,$(patsubst&nbsp;&&%,%,$(word&nbsp;7,$(_o))))&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_AIDL_INCLUDES">LOCAL_AIDL_INCLUDES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/base_rules.mk:185:LOCAL_AIDL_INCLUDES&nbsp;+=&nbsp;$(FRAMEWORKS_BASE_JAVA_SRC_DIRS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JARJAR_RULES">LOCAL_JARJAR_RULES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;frameworks/base/Android.mk:263:#LOCAL_JARJAR_RULES&nbsp;:=&nbsp;$(LOCAL_PATH)/jarjar-rules.txt<br/>
&nbsp;&nbsp;build/core/java.mk:281:$(full_classes_jarjar_jar):&nbsp;PRIVATE_JARJAR_RULES&nbsp;:=&nbsp;$(LOCAL_JARJAR_RULES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDITIONAL_JAVA_DIR">LOCAL_ADDITIONAL_JAVA_DIR</a></h3>
<p>
示例：<br/>
&nbsp;frameworks/base/Android.mk:738:LOCAL_ADDITIONAL_JAVA_DIR:=$(framework_docs_LOCAL_ADDITIONAL_JAVA_DIR)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ALLOW_UNDEFINED_SYMBOLS">LOCAL_ALLOW_UNDEFINED_SYMBOLS</a></h3>
<p>
示例：<br/>
&nbsp;bionic/libthread_db/Android.mk:27:LOCAL_ALLOW_UNDEFINED_SYMBOLS&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DX_FLAGS">LOCAL_DX_FLAGS</a></h3>
<p>
用dx处理jar代码的flag<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CERTIFICATE">LOCAL_CERTIFICATE</a></h3>
<p>
签名用的证书<br/>
./device/samsung/galaxys2-common/DeviceSettings/Android.mk:11:LOCAL_CERTIFICATE&nbsp;:=&nbsp;platform<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_VERSION">LOCAL_SDK_VERSION</a></h3>
<p>
build/core/java.mk里定义该变量<br/>
LOCAL_SDK_VERSION&nbsp;:=&nbsp;$(PDK_BUILD_SDK_VERSION)<br/>
如果定义了LOCAL_SDK_VERSION，那么需要定义ndk编译相关变量<br/>
因为编译app时，常需要编译jni代码<br/>
示例：LOCAL_SDK_VERSION:&nbsp;9<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_RES_VERSION">LOCAL_SDK_RES_VERSION</a></h3>
<p>
./build/core/static_java_library.mk:62:LOCAL_SDK_RES_VERSION:=$(strip&nbsp;$(LOCAL_SDK_RES_VERSION))<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NDK_STL_VARIANT">LOCAL_NDK_STL_VARIANT</a></h3>
<p>
./packages/inputmethods/LatinIME/native/jni/Android.mk:97:LOCAL_NDK_STL_VARIANT&nbsp;:=&nbsp;stlport_static<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EMMA_INSTRUMENT">LOCAL_EMMA_INSTRUMENT</a></h3>
<p>
使用emma进行覆盖代码测试<br/>
&nbsp;./build/core/java_library.mk:54:LOCAL_EMMA_INSTRUMENT&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROGUARD_ENABLED">LOCAL_PROGUARD_ENABLED</a></h3>
<p>
是否启用混淆<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROGUARD_FLAGS">LOCAL_PROGUARD_FLAGS</a></h3>
<p>
混淆使用的flag<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROGUARD_FLAG_FILES">LOCAL_PROGUARD_FLAG_FILES</a></h3>
<p>
混淆使用的flag文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EMMA_COVERAGE_FILTER">LOCAL_EMMA_COVERAGE_FILTER</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;packages/apps/Browser/Android.mk:20:LOCAL_EMMA_COVERAGE_FILTER&nbsp;:=&nbsp;*,-com.android.common.*<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_WARNINGS_ENABLE">LOCAL_WARNINGS_ENABLE</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/definitions.mk:1468:&nbsp;&nbsp;&nbsp;&nbsp;$(if&nbsp;$(findstring&nbsp;true,$(LOCAL_WARNINGS_ENABLE)),$(xlint_unchecked),)&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FULL_MANIFEST_FILE">LOCAL_FULL_MANIFEST_FILE</a></h3>
<p>
示例：<br/>
&nbsp;build/core/package.mk:63:LOCAL_FULL_MANIFEST_FILE&nbsp;:=&nbsp;$(LOCAL_PATH)/$(LOCAL_MANIFEST_FILE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MANIFEST_FILE">LOCAL_MANIFEST_FILE</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/package.mk:57:LOCAL_MANIFEST_FILE&nbsp;:=&nbsp;AndroidManifest.xml<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_INCLUDES">LOCAL_RENDERSCRIPT_INCLUDES</a></h3>
<p>
示例：<br/>
&nbsp;frameworks/base/tests/RenderScriptTests/ImageProcessing2/Android.mk:30:LOCAL_RENDERSCRIPT_INCLUDES_OVERRIDE&nbsp;:=&nbsp;$(TOPDIR)external/clang/lib/Headers&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_INCLUDES_OVERRIDE">LOCAL_RENDERSCRIPT_INCLUDES_OVERRIDE</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;frameworks/base/tests/RenderScriptTests/ImageProcessing2/Android.mk:30:LOCAL_RENDERSCRIPT_INCLUDES_OVERRIDE&nbsp;:=&nbsp;$(TOPDIR)external/clang/lib/Headers&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_CC">LOCAL_RENDERSCRIPT_CC</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;build/core/java.mk:161:LOCAL_RENDERSCRIPT_CC&nbsp;:=&nbsp;$(LLVM_RS_CC)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_FLAGS">LOCAL_RENDERSCRIPT_FLAGS</a></h3>
<p>
示例：<br/>
&nbsp;frameworks/base/tests/RenderScriptTests/ImageProcessing2/Android.mk:33:LOCAL_RENDERSCRIPT_FLAGS&nbsp;:=&nbsp;-rs-package-name=android.support.v8.renderscript<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_TARGET_API">LOCAL_RENDERSCRIPT_TARGET_API</a></h3>
<p>
示例：<br/>
&nbsp;frameworks/base/tests/RenderScriptTests/ImageProcessing2/Android.mk:29:LOCAL_RENDERSCRIPT_TARGET_API&nbsp;:=&nbsp;17<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILD_HOST_DEX">LOCAL_BUILD_HOST_DEX</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;libcore/JavaLibrary.mk:137:LOCAL_BUILD_HOST_DEX&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DEX_PREOPT">LOCAL_DEX_PREOPT</a></h3>
<p>
如果编译模式选择的是user或者userdebug，那么LOCAL_DEX_PREOPT默认为true，这样资源apk和代码文件分离<br/>
成为odex<br/>
&nbsp;build/core/package.mk:156:LOCAL_DEX_PREOPT&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROTOC_OPTIMIZE_TYPE">LOCAL_PROTOC_OPTIMIZE_TYPE</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;hardware/ril/mock-ril/Android.mk:57:LOCAL_PROTOC_OPTIMIZE_TYPE&nbsp;:=&nbsp;full<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROTOC_FLAGS">LOCAL_PROTOC_FLAGS</a></h3>
<p>
编译.proto文件使用的flag，暂未见赋值<br/>
&nbsp;build/core/binary.mk:291:$(proto_generated_cc_sources):&nbsp;PRIVATE_PROTOC_FLAGS&nbsp;:=&nbsp;$(LOCAL_PROTOC_FLAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_CRT">LOCAL_NO_CRT</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;bionic/linker/Android.mk:70:LOCAL_NO_CRT&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROPRIETARY_MODULE">LOCAL_PROPRIETARY_MODULE</a></h3>
<p>
是否是设备专有模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_OWNER">LOCAL_MODULE_OWNER</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;vendor/samsung/galaxys2-common/proprietary/Android.mk:21:LOCAL_MODULE_OWNER&nbsp;:=&nbsp;samsung<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CTS_TEST_PACKAGE">LOCAL_CTS_TEST_PACKAGE</a></h3>
<p>
示例：<br/>
cts/tests/uiautomator/Android.mk:29:LOCAL_CTS_TEST_PACKAGE&nbsp;:=&nbsp;android.uiautomator<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CTS_TEST_RUNNER">LOCAL_CTS_TEST_RUNNER</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;cts/tests/tests/accessibilityservice/Android.mk:32:LOCAL_CTS_TEST_RUNNER&nbsp;:=&nbsp;com.android.cts.tradefed.testtype.AccessibilityServiceTestRunner<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CLANG">LOCAL_CLANG</a></h3>
<p>
表示编译C代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ADDRESS_SANITIZER">LOCAL_ADDRESS_SANITIZER</a></h3>
<p>
地址对齐<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAR_EXCLUDE_FILES">LOCAL_JAR_EXCLUDE_FILES</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;build/core/static_java_library.mk:44:LOCAL_JAR_EXCLUDE_FILES&nbsp;:=&nbsp;$(ANDROID_RESOURCE_GENERATED_CLASSES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_LINT_FLAGS">LOCAL_LINT_FLAGS</a></h3>
<p>
暂未见赋值之处<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SOURCE_FILES_ALL_GENERATED">LOCAL_SOURCE_FILES_ALL_GENERATED</a></h3>
<p>
LOCAL_SOURCE_FILES_ALL_GENERATED&nbsp;is&nbsp;set&nbsp;only&nbsp;if&nbsp;the&nbsp;module&nbsp;does&nbsp;not&nbsp;have&nbsp;static&nbsp;source&nbsp;files,<br/>
but&nbsp;generated&nbsp;source&nbsp;files&nbsp;in&nbsp;its&nbsp;LOCAL_INTERMEDIATE_SOURCE_DIR<br/>
You&nbsp;have&nbsp;to&nbsp;set&nbsp;up&nbsp;the&nbsp;dependency&nbsp;in&nbsp;some&nbsp;other&nbsp;way.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DONT_DELETE_JAR_META_INF">LOCAL_DONT_DELETE_JAR_META_INF</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;cts/tests/core/ctscore.mk:24:LOCAL_DONT_DELETE_JAR_META_INF&nbsp;:=&nbsp;true<br/>
&nbsp;&nbsp;build/core/java.mk:263:$(full_classes_compiled_jar):&nbsp;PRIVATE_DONT_DELETE_JAR_META_INF&nbsp;:=&nbsp;$(LOCAL_DONT_DELETE_JAR_META_INF)<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
