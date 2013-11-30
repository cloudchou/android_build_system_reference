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
<h3>build/core/base_rules.mk</h3>
<p>
base_rules.mk里定义了编译编译为某个类型目标的方法<br/>
编译系统的模块能编译成各种类型的目标，可能是主机上的可执行文件，也可能是手机上的可执行文件，<br/>
还可能是jar，动态链接库，在Android编译系统里每一种类型目标的编译方式对应一个makefile，<br/>
如果某个模块需要编译成手机上的可执行程序，它需要include&nbsp;$(BUILD_EXECUTABLE)&nbsp;<br/>
而BUILD_EXECUTABLE指向的是$(BUILD_SYSTEM)/executable.mk<br/>
所有这些编译方式对应的makefile都将包含base_rules.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE">LOCAL_MODULE</a></h3>
<p>
LOCAL_MODULE表示模块的名称<br/>
LOCAL_MODULE将在每个模块的makefile里定义，如果未定义，编译系统会报错<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_IS_HOST_MODULE">LOCAL_IS_HOST_MODULE</a></h3>
<p>
表示该模块是否是将在主机上运行的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_prefix">my_prefix</a></h3>
<p>
若定义了&nbsp;LOCAL_IS_HOST_MODULE&nbsp;为true，那么my_prefix:=HOST_，否则&nbsp;my_prefix:=TARGET_<br/>
</p>
</div>
<div class="variable">
<h3><a id="my_host">my_host</a></h3>
<p>
若定义了&nbsp;LOCAL_IS_HOST_MODULE&nbsp;为true，那么&nbsp;my_host:=host-，否则&nbsp;my_host:=&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNINSTALLABLE_MODULE">LOCAL_UNINSTALLABLE_MODULE</a></h3>
<p>
表示该模块是否安装至手机，像sdk文档模块不会被安装至手机，因此LOCAL_UNINSTALLABLE_MODULE为true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_TAGS">LOCAL_MODULE_TAGS</a></h3>
<p>
模块的tag，为debug&nbsp;eng&nbsp;tests&nbsp;optional&nbsp;samples&nbsp;shell_ash&nbsp;shell_mksh等tag的组合，一个模块可有多个Tag,<br/>
注意现在模块现在不能使用user&nbsp;tag作为模块的Tag,<br/>
如果使用user做为tag,那么这个模块将被自动安装，<br/>
如果想定义自动安装的模块，需要在PRODUCT_PACKAGES变量里添加该模块<br/>
该变量在build/target/product/base.mk里有赋值，<br/>
在每个设备的配置文件device.mk里也可以为PRODUCT_PACKAGES添加产品模块<br/>
如果当前目录或者父目录有*_GPL*的文件，那么将gnu的tag<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
将用于决定编译的中间文件存放的位置<br/>
LOCAL_MODULE_CLASS在决定编译目标类型的文件里定义，<br/>
&nbsp;&nbsp;比如executable.mk里定义LOCAL_MODULE_CLASS&nbsp;:=&nbsp;EXECUTABLES<br/>
在recovery模块的Android.mk里定义的LOCAL_MODULE_CLASS有：<br/>
&nbsp;&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;RECOVERY_EXECUTABLES<br/>
&nbsp;&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;UTILITY_EXECUTABLES<br/>
其它的LOCAL_MODULE_CLASS有<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;ETC<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;STATIC_LIBRARIES<br/>
&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;EXECUTABLES<br/>
对应&nbsp;Cyanogenmod/target/product/m7ul/obj&nbsp;的目录&nbsp;<br/>
&nbsp;&nbsp;比如说若&nbsp;LOCAL_MODULE_CLASS&nbsp;:=&nbsp;ETC&nbsp;<br/>
&nbsp;&nbsp;那么该模块编译的中间文件将存放于<br/>
&nbsp;&nbsp;Cyanogenmod/target/product/m7ul/obj/ETC<br/>
</p>
</div>
<div class="variable">
<h3><a id="partition_tag">partition_tag</a></h3>
<p>
如果是主机模块，partition_tag将为空，否则如果是设备专有模块，partition_tag:=_VENDOR<br/>
否则如果是安装到系统的模块，那么partition_tag将为空(只有test模块不安装到目录，而安装至data目录)<br/>
否则partition_tag:=_DATA<br/>
在编译系统里没发现LOCAL_PROPRIETARY_MODULE的赋值<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROPRIETARY_MODULE">LOCAL_PROPRIETARY_MODULE</a></h3>
<p>
是否是设备专有模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_PATH">LOCAL_MODULE_PATH</a></h3>
<p>
表示模块编译结果将要存放的目录<br/>
recovery模块的Android.mk里有<br/>
LOCAL_MODULE&nbsp;:=&nbsp;nandroid-md5.sh&nbsp;<br/>
LOCAL_MODULE_PATH&nbsp;:=&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/sbin&nbsp;<br/>
说明：nandroid-md5.sh&nbsp;将存放于out/Cyanogenmod/target/product/m7ul/recovery/root/sbin<br/>
如果模块的Android.mk里未定义LOCAL_MODULE_PATH<br/>
那么LOCAL_MODULE_PATH&nbsp;:=&nbsp;$($(my_prefix)OUT$(partition_tag)_$(LOCAL_MODULE_CLASS))<br/>
在recovery模块里recovery可执行文件相关变量如下：<br/>
比如my_prefix为TARGET_，partition_tag为空,LOCAL_MODULE_CLASS为EXECUTABLES<br/>
那么LOCAL_MODULE_PATH为$(TARGET_OUT_EXECUTABLES)，<br/>
值应该为<br/>
out/Cyanogenmod/target/product/m7ul/system/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="module_id">module_id</a></h3>
<p>
用于确保每个模块都是唯一的<br/>
module_id&nbsp;:=&nbsp;MODULE.$(if&nbsp;\<br/>
$(LOCAL_IS_HOST_MODULE),HOST,TARGET).$(LOCAL_MODULE_CLASS).$(LOCAL_MODULE)<br/>
&nbsp;&nbsp;如果$(module_id)已经定义过，那会提示用户出错<br/>
recovery模块的Android.mk里针对recovery可执行文件：<br/>
module_id&nbsp;:=&nbsp;MODULE.TARGET.EXECUTABLES.RECOVERY<br/>
&nbsp;&nbsp;$(MODULE.TARGET.EXECUTABLES.RECOVERY)=$(LOCAL_PATH)<br/>
&nbsp;&nbsp;即当前模块路径<br/>
</p>
</div>
<div class="variable">
<h3><a id="intermediates">intermediates</a></h3>
<p>
intermediates&nbsp;:=&nbsp;$(call&nbsp;local-intermediates-dir)<br/>
例：&nbsp;recovery模块Android.mk里编译Recovery可执行文件：<br/>
out/target/product/find5/obj/EXECUTABLES/recovery_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="intermediates.COMMON">intermediates.COMMON</a></h3>
<p>
intermediates.COMMON&nbsp;:=&nbsp;$(call&nbsp;local-intermediates-dir,COMMON)<br/>
&nbsp;例：&nbsp;recovery模块Android.mk里编译Recovery可执行文件：<br/>
&nbsp;out/target/common/obj/EXECUTABLES/recovery_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_STEM">LOCAL_MODULE_STEM</a></h3>
<p>
表示编译链接后的目标文件的文件名，不带后缀<br/>
LOCAL_MODULE_STEM&nbsp;:=&nbsp;$(strip&nbsp;$(LOCAL_MODULE_STEM))<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_MODULE_STEM),)<br/>
&nbsp;LOCAL_MODULE_STEM&nbsp;:=&nbsp;$(LOCAL_MODULE)<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;recovery模块编译recovery可执行文件：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE_STEM:=recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
表示编译链接后的目标文件的后缀<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE_STEM">LOCAL_INSTALLED_MODULE_STEM</a></h3>
<p>
表示要安装的目标文件的文件名，带后缀<br/>
LOCAL_INSTALLED_MODULE_STEM&nbsp;:=&nbsp;$(LOCAL_MODULE_STEM)$(LOCAL_MODULE_SUFFIX)<br/>
例：<br/>
&nbsp;&nbsp;&nbsp;recovery模块编译recovery可执行文件：<br/>
&nbsp;&nbsp;&nbsp;LOCAL_INSTALLED_MODULE_STEM:=recovery<br/>
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
OVERRIDE_BUILT_MODULE_PATH&nbsp;is&nbsp;only&nbsp;allowed&nbsp;to&nbsp;be&nbsp;used&nbsp;by&nbsp;the&nbsp;internal&nbsp;SHARED_LIBRARIES&nbsp;build&nbsp;files.<br/>
OVERRIDE_BUILT_MODULE_PATH&nbsp;:=&nbsp;$(strip&nbsp;$(OVERRIDE_BUILT_MODULE_PATH))<br/>
&nbsp;&nbsp;ifdef&nbsp;OVERRIDE_BUILT_MODULE_PATH<br/>
ifneq&nbsp;($(LOCAL_MODULE_CLASS),SHARED_LIBRARIES)<br/>
&nbsp;&nbsp;$(error&nbsp;$(LOCAL_PATH):&nbsp;Illegal&nbsp;use&nbsp;of&nbsp;OVERRIDE_BUILT_MODULE_PATH)<br/>
endif<br/>
built_module_path&nbsp;:=&nbsp;$(OVERRIDE_BUILT_MODULE_PATH)<br/>
&nbsp;&nbsp;else<br/>
built_module_path&nbsp;:=&nbsp;$(intermediates)<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="built_module_path">built_module_path</a></h3>
<p>
参见OVERRIDE_BUILT_MODULE_PATH<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE">LOCAL_BUILT_MODULE</a></h3>
<p>
表示编译链接后的目标文件(文件路径+文件名)<br/>
LOCAL_BUILT_MODULE&nbsp;:=&nbsp;$(built_module_path)/$(LOCAL_BUILT_MODULE_STEM)<br/>
比如recovery:<br/>
LOCAL_BUILT_MODULE&nbsp;路径；<br/>
out/Cyanogenmod/target/product/m7ul/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INSTALLED_MODULE">LOCAL_INSTALLED_MODULE</a></h3>
<p>
表示模块的安装路径+文件名<br/>
ifneq&nbsp;(true,$(LOCAL_UNINSTALLABLE_MODULE))<br/>
&nbsp;LOCAL_INSTALLED_MODULE&nbsp;:=&nbsp;$(LOCAL_MODULE_PATH)/$(LOCAL_INSTALLED_MODULE_STEM)<br/>
&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;示例：<br/>
&nbsp;&nbsp;out/Cyanogenmod/target/product/m7ul/system/bin/recovery<br/>
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
<h3><a id="aidl_sources">aidl_sources</a></h3>
<p>
表示所有源代码中的aidl文件<br/>
aidl_sources&nbsp;:=&nbsp;$(filter&nbsp;%.aidl,$(LOCAL_SRC_FILES))<br/>
如果想编译aidl，只需将aidl加入LOCAL_SRC_FILES即可，<br/>
frameworks/base/Android.mk里有将aidl文件加入LOCAL_SRC_FILES变量<br/>
LOCAL_SRC_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;core/java/android/accessibilityservice/IAccessibilityServiceConnection.aidl&nbsp;\<br/>
&nbsp;core/java/android/accessibilityservice/IAccessibilityServiceClient.aidl&nbsp;\<br/>
&nbsp;core/java/android/accounts/IAccountManager.aidl&nbsp;\<br/>
&nbsp;core/java/android/accounts/IAccountManagerResponse.aidl&nbsp;\<br/>
&nbsp;core/java/android/accounts/IAccountAuthenticator.aidl&nbsp;\<br/>
如果没有定义&nbsp;TARGET_BUILD_APPS&nbsp;变量，说明要编译framework.jar，那么将<br/>
LOCAL_AIDL_INCLUDES&nbsp;+=&nbsp;$(FRAMEWORKS_BASE_JAVA_SRC_DIRS)<br/>
在base_rules里定义了如何将aidl文件编译成java文件的方式，包括文件依赖<br/>
</p>
</div>
<div class="variable">
<h3><a id="logtags_sources">logtags_sources</a></h3>
<p>
表示源代码中的logtags文件<br/>
frameworks/base/Android.mk里有将logtas文件加入LOCAL_SRC_FILES变量<br/>
LOCAL_SRC_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;core/java/android/content/EventLogTags.logtags&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;core/java/android/speech/tts/EventLogTags.logtags&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;core/java/android/webkit/EventLogTags.logtags&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;在base_rules里定义了如何将logtag文件编译成java文件的方式，包括文件依赖<br/>
</p>
</div>
<div class="variable">
<h3><a id="proto_sources">proto_sources</a></h3>
<p>
表示源代码中的proto文件<br/>
在definitions里定义了all-proto-files-under方法添加所有proto文件&nbsp;<br/>
在./hardware/ril/mock-ril/Android.mk里有调用该方法&nbsp;<br/>
在base_rules里定义了如何将.proto文件编译成java文件的方式，包括文件依赖&nbsp;&nbsp;&nbsp;<br/>
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
<h3><a id="all_java_sources">all_java_sources</a></h3>
<p>
所有Java源代码<br/>
Compile&nbsp;.java&nbsp;files&nbsp;to&nbsp;.class<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_static_java_libs">full_static_java_libs</a></h3>
<p>
编译为java静态库<br/>
</p>
</div>
<div class="variable">
<h3><a id="cleantarget">cleantarget</a></h3>
<p>
定义一个模块的清除目标，如：recovery模块，有对应的clean-recovery<br/>
如果在编译时用mka&nbsp;clean-recovery，将清除编译recovery时产生的文件，<br/>
包括编译中间文件和编译目标文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES">ALL_MODULES</a></h3>
<p>
将一些本地变量加入到ALL_MODULES变量里<br/>
ALL_MODULES&nbsp;+=&nbsp;$(LOCAL_MODULE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).CLASS">ALL_MODULES.$(LOCAL_MODULE).CLASS</a></h3>
<p>
$(ALL_MODULES.$(LOCAL_MODULE).CLASS)&nbsp;$(LOCAL_MODULE_CLASS)<br/>
示例：<br/>
ALL_MODULES.recovery.CLASS&nbsp;=&nbsp;EXECECUTABLE&nbsp;<br/>
一个模块可能既编译为手机上的可执行程序，又编译为电脑上的可执行程序<br/>
故此ALL_MODULES.recovery.CLASS&nbsp;可能由多个CLASS组合<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).PATH">ALL_MODULES.$(LOCAL_MODULE).PATH</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).PATH&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).PATH)&nbsp;$(LOCAL_PATH)<br/>
&nbsp;&nbsp;示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALL_MODULES.recovery.PATH&nbsp;bootable/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).TAGS">ALL_MODULES.$(LOCAL_MODULE).TAGS</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).TAGS&nbsp;:=&nbsp;\<br/>
$(ALL_MODULES.$(LOCAL_MODULE).TAGS)&nbsp;$(LOCAL_MODULE_TAGS)<br/>
示例：<br/>
&nbsp;ALL_MODULES.recovery.TAGS&nbsp;eng<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).CHECKED">ALL_MODULES.$(LOCAL_MODULE).CHECKED</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).CHECKED&nbsp;:=&nbsp;\<br/>
&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).CHECKED)&nbsp;$(LOCAL_CHECKED_MODULE)<br/>
示例：<br/>
&nbsp;ALL_MODULES.recovery.CHECKED&nbsp;&nbsp;<br/>
out/Cyanogenmod/target/product/m7ul/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).BUILT">ALL_MODULES.$(LOCAL_MODULE).BUILT</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).BUILT&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).BUILT)&nbsp;$(LOCAL_BUILT_MODULE)<br/>
示例：<br/>
&nbsp;out/Cyanogenmod/target/product/m7ul/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).INSTALLED">ALL_MODULES.$(LOCAL_MODULE).INSTALLED</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).INSTALLED&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;$(strip&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).INSTALLED)&nbsp;$(LOCAL_INSTALLED_MODULE))<br/>
示例：<br/>
out/Cyanogenmod/target/product/m7ul/system/bin/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).REQUIRED">ALL_MODULES.$(LOCAL_MODULE).REQUIRED</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).REQUIRED&nbsp;:=&nbsp;\<br/>
&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).REQUIRED)&nbsp;$(LOCAL_REQUIRED_MODULES)<br/>
&nbsp;&nbsp;binary.mk:<br/>
&nbsp;&nbsp;LOCAL_REQUIRED_MODULES&nbsp;+=&nbsp;$(installed_shared_library_module_names)&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).EVENT_LOG_TAGS">ALL_MODULES.$(LOCAL_MODULE).EVENT_LOG_TAGS</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).EVENT_LOG_TAGS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).EVENT_LOG_TAGS)&nbsp;$(event_log_tags)<br/>
&nbsp;&nbsp;event_log_tags&nbsp;:=&nbsp;$(addprefix&nbsp;$(LOCAL_PATH)/,$(logtags_sources))<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).INTERMEDIATE_SOURCE_DIR">ALL_MODULES.$(LOCAL_MODULE).INTERMEDIATE_SOURCE_DIR</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).INTERMEDIATE_SOURCE_DIR&nbsp;:=&nbsp;\<br/>
$(ALL_MODULES.$(LOCAL_MODULE).INTERMEDIATE_SOURCE_DIR)&nbsp;$(LOCAL_INTERMEDIATE_SOURCE_DIR)<br/>
LOCAL_INTERMEDIATE_SOURCE_DIR&nbsp;:=&nbsp;$(intermediates.COMMON)/src<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).MAKEFILE">ALL_MODULES.$(LOCAL_MODULE).MAKEFILE</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).MAKEFILE&nbsp;:=&nbsp;\<br/>
&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).MAKEFILE)&nbsp;$(LOCAL_MODULE_MAKEFILE)<br/>
举例：<br/>
bootable/recovery/Android.mk&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).OWNER">ALL_MODULES.$(LOCAL_MODULE).OWNER</a></h3>
<p>
ifdef&nbsp;LOCAL_MODULE_OWNER<br/>
&nbsp;ALL_MODULES.$(LOCAL_MODULE).OWNER&nbsp;:=&nbsp;\<br/>
&nbsp;$(sort&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).OWNER)&nbsp;$(LOCAL_MODULE_OWNER))<br/>
&nbsp;endif<br/>
&nbsp;三星glaxsy2有定义LOCAL_MODULE_OWNER变量<br/>
&nbsp;./vendor/samsung/galaxys2-common/proprietary/Android.mk:21:LOCAL_MODULE_OWNER&nbsp;:=&nbsp;samsung<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLABLE_FILES.$(LOCAL_INSTALLED_MODULE).MODULE">INSTALLABLE_FILES.$(LOCAL_INSTALLED_MODULE).MODULE</a></h3>
<p>
INSTALLABLE_FILES.$(LOCAL_INSTALLED_MODULE).MODULE&nbsp;:=&nbsp;$(LOCAL_MODULE)<br/>
例子：<br/>
&nbsp;&nbsp;INSTALLABLE_FILES.out/Cyanogenmod/target/product/m7ul/system/bin/recovery.MODULE:=recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULE_TAGS">ALL_MODULE_TAGS</a></h3>
<p>
ALL_MODULE_TAGS&nbsp;:=&nbsp;$(sort&nbsp;$(ALL_MODULE_TAGS)&nbsp;$(LOCAL_MODULE_TAGS))<br/>
例：<br/>
&nbsp;&nbsp;ALL_MODULE_TAGS&nbsp;debug&nbsp;eng&nbsp;tests&nbsp;optional&nbsp;samples&nbsp;shell_ash&nbsp;shell_mksh<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
