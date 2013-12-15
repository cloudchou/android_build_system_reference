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
<h3>build/core/definitions.mk</h3>
<p>
定义了公共的编译系统变量ALL_*，<br/>
还定义了很多命令用来编译各种各样的目标，<br/>
其它地方用来构建最终目标,build/core/main.mk，build/core/Makefile将用到这些变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_DOCS">ALL_DOCS</a></h3>
<p>
所有文档的全路径<br/>
ALL_DOCS的赋值在droiddoc.mk里：<br/>
ALL_DOCS&nbsp;+=&nbsp;$(full_target)<br/>
full_target&nbsp;:=&nbsp;$(call&nbsp;doc-timestamp-for,$(LOCAL_MODULE))<br/>
&nbsp;&nbsp;ALL_DOCS示例：out/target/common/docs/api-stubs-timestamp&nbsp;&nbsp;out/target/common/docs/hidden-timestamp&nbsp;<br/>
如果某个模块要编译出文档，需要使用命令<br/>
include&nbsp;$(BUILD_DROIDDOC)<br/>
而BUILD_DROID_DOC变量的值是droiddoc.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES">ALL_MODULES</a></h3>
<p>
系统的所有模块的简单名字集合<br/>
编译系统还为每一个模块还定义了其它两个变量<br/>
ALL_MODULES.$(LOCAL_MODULE).BUILT&nbsp;所有模块的生成路径<br/>
ALL_MODULES.$(LOCAL_MODULE).INSTALLED&nbsp;所有模块的各自安装路径<br/>
&nbsp;&nbsp;例如：手机中将安装在system/bin/recovery，那么ALL_MODULES.recovery.INSTALLED为out/target/product/find5/system/bin/recovery<br/>
每个模块都会定义该模块生成的目标类型，可能生成二进制文件，也可能生成java静态库<br/>
这是由这个模块include&nbsp;$(BUILD_<build&nbsp;type>)决定的<br/>
比如build&nbsp;type若是EXCECUTABLE，，那么将include&nbsp;$(BUILD_EXECUTABLE)，那么将include&nbsp;build/core/executable.mk<br/>
而该makefile对应生成的目标类型是在手机上的可执行程序&nbsp;<br/>
executable.mk里包含了binary.mk，而binary.mk包含了base_rules.mk<br/>
base_rules.mk里为变量ALL_MODULES，ALL_MODULES.$(target).BUILT，ALL_MODULES.$(target).INSTALLED赋值<br/>
代码：<br/>
ALL_MODULES&nbsp;+=&nbsp;$(LOCAL_MODULE)<br/>
ALL_MODULES.$(LOCAL_MODULE).BUILT&nbsp;:=&nbsp;\<br/>
&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).BUILT)&nbsp;$(LOCAL_BUILT_MODULE)<br/>
&nbsp;&nbsp;LOCAL_BUILT_MODULE&nbsp;:=&nbsp;$(built_module_path)/$(LOCAL_BUILT_MODULE_STEM)&nbsp;&nbsp;<br/>
&nbsp;&nbsp;ALL_MODULES.$(LOCAL_MODULE).INSTALLED&nbsp;:=&nbsp;\<br/>
&nbsp;$(strip&nbsp;$(ALL_MODULES.$(LOCAL_MODULE).INSTALLED)&nbsp;$(LOCAL_INSTALLED_MODULE))<br/>
&nbsp;&nbsp;ifneq&nbsp;(true,$(LOCAL_UNINSTALLABLE_MODULE))<br/>
&nbsp;LOCAL_INSTALLED_MODULE&nbsp;:=&nbsp;$(LOCAL_MODULE_PATH)/$(LOCAL_INSTALLED_MODULE_STEM)<br/>
&nbsp;&nbsp;endif&nbsp;<br/>
&nbsp;&nbsp;LOCAL_MODULE_PATH&nbsp;:=&nbsp;$(strip&nbsp;$(LOCAL_MODULE_PATH))<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_MODULE_PATH),)<br/>
&nbsp;&nbsp;LOCAL_MODULE_PATH&nbsp;:=&nbsp;$($(my_prefix)OUT$(partition_tag)_$(LOCAL_MODULE_CLASS))<br/>
&nbsp;ifeq&nbsp;($(strip&nbsp;$(LOCAL_MODULE_PATH)),)<br/>
&nbsp;&nbsp;$(error&nbsp;$(LOCAL_PATH):&nbsp;unhandled&nbsp;LOCAL_MODULE_CLASS&nbsp;"$(LOCAL_MODULE_CLASS)")<br/>
&nbsp;endif<br/>
&nbsp;&nbsp;endif&nbsp;<br/>
&nbsp;&nbsp;LOCAL_MODULE_PATH:表示要安装的位置，可由编译系统推算，也可由某个模块显示指定<br/>
&nbsp;&nbsp;示例：<br/>
&nbsp;ALL_MODULES：recvery&nbsp;applypatch&nbsp;&nbsp;applypatch_static&nbsp;imgdiff<br/>
对应的<br/>
&nbsp;&nbsp;$(built_module_path)&nbsp;:&nbsp;out/target/product/find5/obj/EXECUTABLES/recovery_intermediates<br/>
&nbsp;&nbsp;$(LOCAL_BUILT_MODULE_STEM)&nbsp;:&nbsp;recovery<br/>
&nbsp;&nbsp;$(LOCAL_MODULE_PATH):&nbsp;&nbsp;out/target/product/find5/system/bin<br/>
&nbsp;&nbsp;$(LOCAL_INSTALLED_MODULE_STEM):&nbsp;recovery<br/>
&nbsp;&nbsp;$(my_prefix)OUT$(partition_tag)_$(LOCAL_MODULE_CLASS):TARGET_OUT_EXECUTABLES<br/>
&nbsp;&nbsp;$(ALL_MODULES.recovery.BUILT)&nbsp;:out/target/product/find5/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
&nbsp;&nbsp;$(ALL_MODULES.recovery.INSTALLED):out/target/product/find5/system/bin/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_DEFAULT_INSTALLED_MODULES">ALL_DEFAULT_INSTALLED_MODULES</a></h3>
<p>
所有默认要安装的模块,在build/core/main.mk和build/core/makfile里设置&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;Full&nbsp;paths&nbsp;to&nbsp;targets&nbsp;that&nbsp;should&nbsp;be&nbsp;added&nbsp;to&nbsp;the&nbsp;"make&nbsp;droid"&nbsp;set&nbsp;of&nbsp;installed&nbsp;targets.<br/>
&nbsp;&nbsp;&nbsp;droid目标将安装的所有模块的集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULE_TAGS">ALL_MODULE_TAGS</a></h3>
<p>
使用LOCAL_MODULE_TAGS定义的所有tag集合<br/>
每一个tag对应一个ALL_MODULE_TAGS.<tagname>变量<br/>
例：<br/>
在recovery的Android.mk里定义了；<br/>
&nbsp;LOCAL_MODULE&nbsp;:=&nbsp;recovery<br/>
&nbsp;LOCAL_MODULE_TAGS&nbsp;:=&nbsp;eng<br/>
&nbsp;LOCAL_MODULE&nbsp;:=&nbsp;nandroid-md5.sh<br/>
&nbsp;LOCAL_MODULE_TAGS&nbsp;:=&nbsp;optional&nbsp;<br/>
&nbsp;那么：ALL_MODULE_TAGS&nbsp;将包含&nbsp;eng,optional，<br/>
&nbsp;&nbsp;ALL_MODULE_TAGS.eng：out/target/product/find5/system/bin/recovery&nbsp;<br/>
&nbsp;&nbsp;ALL_MODULE_TAGS.optional：&nbsp;out/target/product/find5/recovery/root/sbin/nandroid-md5.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULE_NAME_TAGS">ALL_MODULE_NAME_TAGS</a></h3>
<p>
类似于ALL_MODULE_TAGS，但是它的值是&nbsp;某个tag的所有模块的名称<br/>
例：<br/>
包含bootable/recovery/Android.mk后，<br/>
&nbsp;ALL_MODULE_NAME_TAGS.eng:&nbsp;recovery&nbsp;libbmlutils&nbsp;libdedupe&nbsp;utility_dedupe&nbsp;libcrecovery&nbsp;libmmcutils&nbsp;updater&nbsp;libapplypatch&nbsp;applypatch_static&nbsp;su.recovery<br/>
&nbsp;ALL_MODULE_NAME_TAGS.optional:&nbsp;nandroid-md5.sh&nbsp;killrecovery.sh&nbsp;dedupe&nbsp;libflashutils&nbsp;flash_image&nbsp;dump_image&nbsp;erase_image&nbsp;libflash_image&nbsp;libdump_image&nbsp;liberase_image&nbsp;<br/>
&nbsp;&nbsp;utility_dump_image&nbsp;utility_flash_image&nbsp;utility_erase_image&nbsp;libminui&nbsp;libminelf&nbsp;libminzip&nbsp;libminadbd&nbsp;libmtdutils&nbsp;edify&nbsp;libedify&nbsp;applypatch&nbsp;<br/>
&nbsp;&nbsp;imgdiff&nbsp;parted&nbsp;sdparted&nbsp;libminizip&nbsp;libmake_ext4fs&nbsp;install-su.sh&nbsp;run-su-daemon.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_HOST_INSTALLED_FILES">ALL_HOST_INSTALLED_FILES</a></h3>
<p>
安装在pc上的程序集合<br/>
例：<br/>
包含bootable/recovery/Android.mk后，<br/>
ALL_HOST_INSTALLED_FILES:&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/dedupe<br/>
&nbsp;&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/edify&nbsp;<br/>
&nbsp;&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/imgdiff<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_PREBUILT">ALL_PREBUILT</a></h3>
<p>
将会被拷贝的预编译文件的安装全路径的集合<br/>
&nbsp;&nbsp;Full&nbsp;paths&nbsp;to&nbsp;all&nbsp;prebuilt&nbsp;files&nbsp;that&nbsp;will&nbsp;be&nbsp;copied&nbsp;(used&nbsp;to&nbsp;make&nbsp;the&nbsp;dependency&nbsp;on&nbsp;acp)&nbsp;<br/>
&nbsp;&nbsp;在system/core/Android.mk里大量使用了ALL_PREBUILT<br/>
&nbsp;&nbsp;&nbsp;ALL_PREBUILT&nbsp;+=&nbsp;$(file)<br/>
&nbsp;&nbsp;&nbsp;ALL_PREBUILT&nbsp;+=&nbsp;$(DIRS)<br/>
&nbsp;&nbsp;示例：<br/>
ALL_PREBUILT:&nbsp;&nbsp;&nbsp;out/target/product/find5/system/etc/dbus.conf&nbsp;out/target/product/find5/system/etc/hosts&nbsp;out/target/product/find5/system/etc/init.goldfish.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_GENERATED_SOURCES">ALL_GENERATED_SOURCES</a></h3>
<p>
某些工具生成的源代码文件的集合，比如aidl会生成java源代码文件<br/>
&nbsp;&nbsp;&nbsp;Full&nbsp;path&nbsp;to&nbsp;all&nbsp;files&nbsp;that&nbsp;are&nbsp;made&nbsp;by&nbsp;some&nbsp;tool&nbsp;<br/>
&nbsp;&nbsp;&nbsp;./build/core/binary.mk:273:ALL_GENERATED_SOURCES&nbsp;+=&nbsp;$(LOCAL_GENERATED_SOURCES)<br/>
&nbsp;&nbsp;&nbsp;./bionic/libc/Android.mk:735:ALL_GENERATED_SOURCES&nbsp;+=&nbsp;$(GEN)<br/>
&nbsp;&nbsp;&nbsp;例：<br/>
&nbsp;&nbsp;&nbsp;ALL_GENERATED_SOURCES：&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libRS_intermediates/rsgApiStructs.h&nbsp;<br/>
&nbsp;&nbsp;&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libRS_intermediates/rsgApiFuncDecl.h&nbsp;<br/>
&nbsp;&nbsp;&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libbt-vendor_intermediates/vnd_buildcfg.h<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_C_CPP_ETC_OBJECTS">ALL_C_CPP_ETC_OBJECTS</a></h3>
<p>
所有asm，c,c++,以及lex和yacc生成的c代码文件的全路径<br/>
这些都对拷贝的头文件有一个按序的依赖关系<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_ORIGINAL_DYNAMIC_BINARIES">ALL_ORIGINAL_DYNAMIC_BINARIES</a></h3>
<p>
没有被优化，也没有被压缩的动态链接库<br/>
&nbsp;&nbsp;&nbsp;The&nbsp;list&nbsp;of&nbsp;dynamic&nbsp;binaries&nbsp;that&nbsp;haven't&nbsp;been&nbsp;stripped/compressed/etc&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;dynamic_binary.mk:&nbsp;&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES&nbsp;+=&nbsp;$(linked_module)<br/>
&nbsp;&nbsp;&nbsp;例：<br/>
&nbsp;&nbsp;&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES：out/target/product/find5/obj/EXECUTABLES/vold_intermediates/LINKED/vold<br/>
&nbsp;&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libkeystore_intermediates/LINKED/libkeystore.so<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_SDK_FILES">ALL_SDK_FILES</a></h3>
<p>
将会放在sdk的文件&nbsp;&nbsp;<br/>
&nbsp;&nbsp;These&nbsp;files&nbsp;go&nbsp;into&nbsp;the&nbsp;SDK&nbsp;<br/>
&nbsp;&nbsp;主要赋值：development/build/Android.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_DALVIK_MODULES">INTERNAL_DALVIK_MODULES</a></h3>
<p>
dalvik虚拟机需要的文件&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;Files&nbsp;for&nbsp;dalvik.&nbsp;&nbsp;This&nbsp;is&nbsp;often&nbsp;build&nbsp;without&nbsp;building&nbsp;the&nbsp;rest&nbsp;of&nbsp;the&nbsp;OS&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;在dalvik/dx/src/Android.mk&nbsp;dalvik/dx/Android.mk中有赋值<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_FINDBUGS_FILES">ALL_FINDBUGS_FILES</a></h3>
<p>
所有findbugs程序用的xml文件<br/>
&nbsp;&nbsp;build/core/java.mk:400:ALL_FINDBUGS_FILES&nbsp;+=&nbsp;$(findbugs_xml)<br/>
&nbsp;&nbsp;All&nbsp;findbugs&nbsp;xml&nbsp;files<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_GPL_MODULE_LICENSE_FILES">ALL_GPL_MODULE_LICENSE_FILES</a></h3>
<p>
GPL&nbsp;module&nbsp;license&nbsp;files<br/>
GPL&nbsp;模块的&nbsp;许可文件<br/>
在build/core/base_rules.mk里有赋值<br/>
gpl_license_file&nbsp;:=&nbsp;$(call&nbsp;find-parent-file,$(LOCAL_PATH),MODULE_LICENSE*_GPL*&nbsp;MODULE_LICENSE*_MPL*)<br/>
ifneq&nbsp;($(gpl_license_file),)<br/>
&nbsp;&nbsp;LOCAL_MODULE_TAGS&nbsp;+=&nbsp;gnu<br/>
&nbsp;&nbsp;ALL_GPL_MODULE_LICENSE_FILES&nbsp;:=&nbsp;$(sort&nbsp;$(ALL_GPL_MODULE_LICENSE_FILES)&nbsp;$(gpl_license_file))<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_RESOURCE_GENERATED_CLASSES">ANDROID_RESOURCE_GENERATED_CLASSES</a></h3>
<p>
Android&nbsp;资源文件生成的java代码编译后的类的类型<br/>
&nbsp;&nbsp;ANDROID_RESOURCE_GENERATED_CLASSES&nbsp;:=&nbsp;'R.class'&nbsp;'R$$*.class'&nbsp;'Manifest.class'&nbsp;'Manifest$$*.class'<br/>
&nbsp;&nbsp;在build/core/static_java_library.mk中有用到，用于排除某些文件，使其不被打包至lib文件<br/>
</p>
</div>
<div class="function">
<h3><a id="print-vars">Function:&nbsp;&nbsp;print-vars</a></h3>
<p>
Debugging;&nbsp;prints&nbsp;a&nbsp;variable&nbsp;list&nbsp;to&nbsp;stdout<br/>
用于打印变量的值<br/>
$(1):&nbsp;variable&nbsp;name&nbsp;list,&nbsp;not&nbsp;variable&nbsp;values<br/>
</p>
</div>
<div class="function">
<h3><a id="true-or-empty">Function:&nbsp;&nbsp;true-or-empty</a></h3>
<p>
如果参数含有true，则返回true，否则返回空<br/>
$(1)&nbsp;要测试的变量<br/>
</p>
</div>
<div class="function">
<h3><a id="my-dir">Function:&nbsp;&nbsp;my-dir</a></h3>
<p>
返回当前makefile所在目录<br/>
</p>
</div>
<div class="function">
<h3><a id="all-makefiles-under">Function:&nbsp;&nbsp;all-makefiles-under</a></h3>
<p>
获取某个目录下及子目录的所有Android.mk<br/>
$(1):需要提取Android.mk的目录<br/>
</p>
</div>
<div class="function">
<h3><a id="first-makefiles-under">Function:&nbsp;&nbsp;first-makefiles-under</a></h3>
<p>
在某个目录下的所有子目录中查找Android.mk，不包括当前目录<br/>
$(1):要搜索的目录<br/>
</p>
</div>
<div class="function">
<h3><a id="all-subdir-makefiles">Function:&nbsp;&nbsp;all-subdir-makefiles</a></h3>
<p>
查找当前目录及子目录下的所有Android.mk<br/>
</p>
</div>
<div class="function">
<h3><a id="all-named-subdir-makefiles">Function:&nbsp;&nbsp;all-named-subdir-makefiles</a></h3>
<p>
在当前目录下的一组子目录下查找Android.mk<br/>
$(1):&nbsp;List&nbsp;of&nbsp;directories&nbsp;to&nbsp;look&nbsp;for&nbsp;under&nbsp;this&nbsp;directory<br/>
</p>
</div>
<div class="function">
<h3><a id="all-java-files-under">Function:&nbsp;&nbsp;all-java-files-under</a></h3>
<p>
找出当前makefile所在目录的指定子目录里的所有java文件<br/>
$(1)&nbsp;指定子目录<br/>
使用范例：SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-java-files-under,src&nbsp;tests)<br/>
</p>
</div>
<div class="function">
<h3><a id="all-subdir-java-files">Function:&nbsp;&nbsp;all-subdir-java-files</a></h3>
<p>
从当前目录查找所有java文件<br/>
使用范例：&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-subdir-java-files)<br/>
</p>
</div>
<div class="function">
<h3><a id="all-c-files-under">Function:&nbsp;&nbsp;all-c-files-under</a></h3>
<p>
在指定子目录下找C代码<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;c&nbsp;files&nbsp;under&nbsp;the&nbsp;named&nbsp;directories.<br/>
&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-c-files-under,src&nbsp;tests)<br/>
&nbsp;$1:&nbsp;指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-subdir-c-files">Function:&nbsp;&nbsp;all-subdir-c-files</a></h3>
<p>
查找当前目录所有子目录的c代码文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;c&nbsp;files&nbsp;from&nbsp;here.&nbsp;&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-subdir-c-files)<br/>
</p>
</div>
<div class="function">
<h3><a id="all-Iaidl-files-under">Function:&nbsp;&nbsp;all-Iaidl-files-under</a></h3>
<p>
在指定子目录下查找所有类似I*.aidl代码文件<br/>
Find&nbsp;all&nbsp;files&nbsp;named&nbsp;"I*.aidl"&nbsp;under&nbsp;the&nbsp;named&nbsp;directories,<br/>
which&nbsp;must&nbsp;be&nbsp;relative&nbsp;to&nbsp;$(LOCAL_PATH).&nbsp;&nbsp;The&nbsp;returned&nbsp;list<br/>
is&nbsp;relative&nbsp;to&nbsp;$(LOCAL_PATH).<br/>
$1:&nbsp;指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-subdir-Iaidl-files">Function:&nbsp;&nbsp;all-subdir-Iaidl-files</a></h3>
<p>
在$(LOCAL_PATH)下查找所有I*.aidl代码文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;"I*.aidl"&nbsp;files&nbsp;under&nbsp;$(LOCAL_PATH).<br/>
</p>
</div>
<div class="function">
<h3><a id="all-logtags-files-under">Function:&nbsp;&nbsp;all-logtags-files-under</a></h3>
<p>
在指定子目录下查找所有logtags文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;logtags&nbsp;files&nbsp;under&nbsp;the&nbsp;named&nbsp;directories.<br/>
&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-logtags-files-under,src)<br/>
&nbsp;查找.logtag文件<br/>
&nbsp;$1:指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-proto-files-under">Function:&nbsp;&nbsp;all-proto-files-under</a></h3>
<p>
在指定子目录下查找所有.proto文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;.proto&nbsp;files&nbsp;under&nbsp;the&nbsp;named&nbsp;directories.<br/>
&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-proto-files-under,src)<br/>
&nbsp;查找.proto文件<br/>
&nbsp;$1:指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-renderscript-files-under">Function:&nbsp;&nbsp;all-renderscript-files-under</a></h3>
<p>
在指定子目录下查找所有.rs或者.fs文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;RenderScript&nbsp;files&nbsp;under&nbsp;the&nbsp;named&nbsp;directories.<br/>
&nbsp;&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-renderscript-files-under,src)<br/>
查找.rs&nbsp;.fs文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-html-files-under">Function:&nbsp;&nbsp;all-html-files-under</a></h3>
<p>
在指定子目录下查找所有html文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;html&nbsp;files&nbsp;under&nbsp;the&nbsp;named&nbsp;directories.<br/>
&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-html-files-under,src&nbsp;tests)<br/>
&nbsp;查找.html文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="function">
<h3><a id="all-subdir-html-files">Function:&nbsp;&nbsp;all-subdir-html-files</a></h3>
<p>
在当前目录的子目录里查找所有html文件<br/>
&nbsp;Find&nbsp;all&nbsp;of&nbsp;the&nbsp;html&nbsp;files&nbsp;from&nbsp;here.&nbsp;&nbsp;Meant&nbsp;to&nbsp;be&nbsp;used&nbsp;like:<br/>
&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-subdir-html-files)<br/>
</p>
</div>
<div class="function">
<h3><a id="find-subdir-files">Function:&nbsp;&nbsp;find-subdir-files</a></h3>
<p>
根据find命令的规则查找所有文件<br/>
Find&nbsp;all&nbsp;of&nbsp;the&nbsp;files&nbsp;matching&nbsp;pattern<br/>
&nbsp;&nbsp;&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;find-subdir-files,&nbsp;<pattern>)<br/>
$1&nbsp;find命令的匹配规则<br/>
</p>
</div>
<div class="function">
<h3><a id="find-subdir-subdir-files">Function:&nbsp;&nbsp;find-subdir-subdir-files</a></h3>
<p>
在指定子目录下根据find命令的规则查找文件<br/>
find&nbsp;the&nbsp;files&nbsp;in&nbsp;the&nbsp;subdirectory&nbsp;$1&nbsp;of&nbsp;LOCAL_DIR<br/>
matching&nbsp;pattern&nbsp;$2,&nbsp;filtering&nbsp;out&nbsp;files&nbsp;$3<br/>
&nbsp;e.g.<br/>
&nbsp;SRC_FILES&nbsp;+=&nbsp;$(call&nbsp;find-subdir-subdir-files,&nbsp;\<br/>
&nbsp;css,&nbsp;*.cpp,&nbsp;DontWantThis.cpp)<br/>
&nbsp;$1&nbsp;LOCAL_DIR的子目录<br/>
&nbsp;$2&nbsp;find命令的匹配规则<br/>
&nbsp;$3&nbsp;过滤的文件<br/>
</p>
</div>
<div class="function">
<h3><a id="find-subdir-assets">Function:&nbsp;&nbsp;find-subdir-assets</a></h3>
<p>
查找所有不是软链且文件名不带后缀的文件<br/>
&nbsp;&nbsp;&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;find-subdir-assets)<br/>
$1&nbsp;要进入并查找的目录<br/>
</p>
</div>
<div class="function">
<h3><a id="find-other-java-files">Function:&nbsp;&nbsp;find-other-java-files</a></h3>
<p>
在$(LOCAL_PATH)里根据find命令的匹配规则查找java文件<br/>
$1&nbsp;find命令的匹配规则<br/>
</p>
</div>
<div class="function">
<h3><a id="find-other-html-files">Function:&nbsp;&nbsp;find-other-html-files</a></h3>
<p>
在$(LOCAL_PATH)里根据find命令的匹配规则查找html文件<br/>
$1&nbsp;find命令的匹配规则<br/>
</p>
</div>
<div class="function">
<h3><a id="find-parent-file">Function:&nbsp;&nbsp;find-parent-file</a></h3>
<p>
在$1给出的目录及这个目录的父目录里查找$2,若找到返回该路径<br/>
Scan&nbsp;through&nbsp;each&nbsp;directory&nbsp;of&nbsp;$(1)&nbsp;looking&nbsp;for&nbsp;files<br/>
that&nbsp;match&nbsp;$(2)&nbsp;using&nbsp;$(wildcard).&nbsp;&nbsp;Useful&nbsp;for&nbsp;seeing&nbsp;if<br/>
a&nbsp;given&nbsp;directory&nbsp;or&nbsp;one&nbsp;of&nbsp;its&nbsp;parents&nbsp;contains<br/>
a&nbsp;particular&nbsp;file.&nbsp;&nbsp;Returns&nbsp;the&nbsp;first&nbsp;match&nbsp;found,<br/>
starting&nbsp;furthest&nbsp;from&nbsp;the&nbsp;root.<br/>
&nbsp;&nbsp;&nbsp;$1&nbsp;要查找的目录集合<br/>
&nbsp;&nbsp;&nbsp;$2&nbsp;要查找的文件<br/>
</p>
</div>
<div class="function">
<h3><a id="add-dependency">Function:&nbsp;&nbsp;add-dependency</a></h3>
<p>
添加依赖关系<br/>
&nbsp;&nbsp;Function&nbsp;we&nbsp;can&nbsp;evaluate&nbsp;to&nbsp;introduce&nbsp;a&nbsp;dynamic&nbsp;dependency<br/>
&nbsp;&nbsp;$1&nbsp;需要依赖其它东东的目标<br/>
&nbsp;&nbsp;$2&nbsp;被依赖的东东<br/>
</p>
</div>
<div class="function">
<h3><a id="add-prebuilt-file">Function:&nbsp;&nbsp;add-prebuilt-file</a></h3>
<p>
Set&nbsp;up&nbsp;the&nbsp;dependencies&nbsp;for&nbsp;a&nbsp;prebuilt&nbsp;target<br/>
$(call&nbsp;add-prebuilt-file,&nbsp;srcfile,&nbsp;[targetclass])<br/>
$(1):&nbsp;srcfile<br/>
$(2):&nbsp;target&nbsp;class&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="add-prebuilt-files">Function:&nbsp;&nbsp;add-prebuilt-files</a></h3>
<p>
domultipleprebuilts<br/>
$(calltargetclass,files...)<br/>
$(1)targetclass<br/>
$(2)srcfiles<br/>
使用举例：<br/>
gdbserver/Android.mk:$(calladd-prebuilt-files,EXECUTABLES,$(prebuilt_files))<br/>
</p>
</div>
<div class="function">
<h3><a id="intermediates-dir-for">Function:&nbsp;&nbsp;intermediates-dir-for</a></h3>
<p>
查找中间目录并返回<br/>
The&nbsp;intermediates&nbsp;directory.&nbsp;&nbsp;Where&nbsp;object&nbsp;files&nbsp;go&nbsp;for<br/>
a&nbsp;given&nbsp;target.&nbsp;&nbsp;We&nbsp;could&nbsp;technically&nbsp;get&nbsp;away&nbsp;without<br/>
the&nbsp;"_intermediates"&nbsp;suffix&nbsp;on&nbsp;the&nbsp;directory,&nbsp;but&nbsp;it's<br/>
nice&nbsp;to&nbsp;be&nbsp;able&nbsp;to&nbsp;grep&nbsp;for&nbsp;that&nbsp;string&nbsp;to&nbsp;find&nbsp;out&nbsp;if<br/>
anyone's&nbsp;abusing&nbsp;the&nbsp;system.<br/>
#&nbsp;$(1):&nbsp;target&nbsp;class,&nbsp;like&nbsp;"APPS"<br/>
#&nbsp;$(2):&nbsp;target&nbsp;name,&nbsp;like&nbsp;"NotePad"<br/>
#&nbsp;$(3):&nbsp;if&nbsp;non-empty,&nbsp;this&nbsp;is&nbsp;a&nbsp;HOST&nbsp;target.<br/>
#&nbsp;$(4):&nbsp;if&nbsp;non-empty,&nbsp;force&nbsp;the&nbsp;intermediates&nbsp;to&nbsp;be&nbsp;COMMON&nbsp;如果是host的common，则是out/host/common，如果是target的common，则是out/target/common<br/>
使用举例：<br/>
./development/build/Android.mk&nbsp;framework_res_package&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,APPS,framework-res,,COMMON)/package-export.apk<br/>
./frameworks/base/core/res/Android.mk:37:framework_GENERATED_SOURCE_DIR&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,framework,,COMMON)/src<br/>
值：&nbsp;out/target/product/find5/obj/STATIC_LIBRARIES/libstdc++_intermediates<br/>
&nbsp;out/target/common/obj/JAVA_LIBRARIES/core_intermediates<br/>
&nbsp;out/target/common/obj/APPS/framework-res_intermediates<br/>
&nbsp;out/target/common/obj/JAVA_LIBRARIES/framework_intermediates<br/>
</p>
</div>
<div class="function">
<h3><a id="local-intermediates-dir">Function:&nbsp;&nbsp;local-intermediates-dir</a></h3>
<p>
利用LOCAL_MODULE_CLASS,&nbsp;LOCAL_MODULE,&nbsp;and&nbsp;LOCAL_IS_HOST_MODULE决定中间目录&nbsp;&nbsp;<br/>
$(1):&nbsp;if&nbsp;non-empty,&nbsp;force&nbsp;the&nbsp;intermediates&nbsp;to&nbsp;be&nbsp;COMMON<br/>
例：&nbsp;LOCAL_MODULE_CLASS：EXECUTABLES<br/>
&nbsp;LOCAL_MODULE:&nbsp;recovery<br/>
&nbsp;LOCAL_IS_HOST_MODULE&nbsp;empty&nbsp;<br/>
$1&nbsp;为空<br/>
&nbsp;那么返回out/target/product/find5/obj/EXECUTABLES/recovery_intermediates<br/>
</p>
</div>
<div class="function">
<h3><a id="normalize-libraries">Function:&nbsp;&nbsp;normalize-libraries</a></h3>
<p>
将"path/to/libXXX.so"转为&nbsp;-lXXX<br/>
&nbsp;Convert&nbsp;"path/to/libXXX.so"&nbsp;to&nbsp;"-lXXX".<br/>
&nbsp;Any&nbsp;"path/to/libXXX.a"&nbsp;elements&nbsp;pass&nbsp;through&nbsp;unchanged.<br/>
</p>
</div>
<div class="function">
<h3><a id="normalize-host-libraries">Function:&nbsp;&nbsp;normalize-host-libraries</a></h3>
<p>
参见normalize-libraries，和之类似<br/>
</p>
</div>
<div class="function">
<h3><a id="normalize-target-libraries">Function:&nbsp;&nbsp;normalize-target-libraries</a></h3>
<p>
参见normalize-libraries，和之类似<br/>
</p>
</div>
<div class="function">
<h3><a id="module-built-files">Function:&nbsp;&nbsp;module-built-files</a></h3>
<p>
将模块名字转为它们对应的编译生成路径<br/>
&nbsp;Convert&nbsp;a&nbsp;list&nbsp;of&nbsp;short&nbsp;module&nbsp;names&nbsp;(e.g.,&nbsp;"framework",&nbsp;"Browser")<br/>
&nbsp;into&nbsp;the&nbsp;list&nbsp;of&nbsp;files&nbsp;that&nbsp;are&nbsp;built&nbsp;for&nbsp;those&nbsp;modules.<br/>
&nbsp;NOTE:&nbsp;this&nbsp;won't&nbsp;return&nbsp;reliable&nbsp;results&nbsp;until&nbsp;after&nbsp;all<br/>
&nbsp;sub-makefiles&nbsp;have&nbsp;been&nbsp;included.<br/>
&nbsp;$(1):&nbsp;target&nbsp;list<br/>
</p>
</div>
<div class="function">
<h3><a id="module-installed-files">Function:&nbsp;&nbsp;module-installed-files</a></h3>
<p>
将模块名字转为它们对应的安装路径<br/>
&nbsp;Convert&nbsp;a&nbsp;list&nbsp;of&nbsp;short&nbsp;modules&nbsp;names&nbsp;(e.g.,&nbsp;"framework",&nbsp;"Browser")<br/>
&nbsp;into&nbsp;the&nbsp;list&nbsp;of&nbsp;files&nbsp;that&nbsp;are&nbsp;installed&nbsp;for&nbsp;those&nbsp;modules.<br/>
&nbsp;NOTE:&nbsp;this&nbsp;won't&nbsp;return&nbsp;reliable&nbsp;results&nbsp;until&nbsp;after&nbsp;all<br/>
&nbsp;sub-makefiles&nbsp;have&nbsp;been&nbsp;included.<br/>
&nbsp;$(1):&nbsp;target&nbsp;list<br/>
</p>
</div>
<div class="function">
<h3><a id="module-stubs-files">Function:&nbsp;&nbsp;module-stubs-files</a></h3>
<p>
将模块名字转为它们要作为公共API时链接的文件路径<br/>
&nbsp;Convert&nbsp;a&nbsp;list&nbsp;of&nbsp;short&nbsp;modules&nbsp;names&nbsp;(e.g.,&nbsp;"framework",&nbsp;"Browser")<br/>
&nbsp;into&nbsp;the&nbsp;list&nbsp;of&nbsp;files&nbsp;that&nbsp;should&nbsp;be&nbsp;used&nbsp;when&nbsp;linking<br/>
&nbsp;against&nbsp;that&nbsp;module&nbsp;as&nbsp;a&nbsp;public&nbsp;API.<br/>
&nbsp;TODO:&nbsp;Allow&nbsp;this&nbsp;for&nbsp;more&nbsp;than&nbsp;JAVA_LIBRARIES&nbsp;modules<br/>
&nbsp;NOTE:&nbsp;this&nbsp;won't&nbsp;return&nbsp;reliable&nbsp;results&nbsp;until&nbsp;after&nbsp;all<br/>
&nbsp;sub-makefiles&nbsp;have&nbsp;been&nbsp;included.<br/>
&nbsp;$(1):&nbsp;target&nbsp;list<br/>
&nbsp;define&nbsp;module-stubs-files<br/>
$(foreach&nbsp;module,$(1),$(ALL_MODULES.$(module).STUBS))<br/>
&nbsp;endef<br/>
</p>
</div>
<div class="function">
<h3><a id="doc-timestamp-for">Function:&nbsp;&nbsp;doc-timestamp-for</a></h3>
<p>
为文档模块转为timestamp为文件，这个文件是添加依赖时会用到的<br/>
&nbsp;Evaluates&nbsp;to&nbsp;the&nbsp;timestamp&nbsp;file&nbsp;for&nbsp;a&nbsp;doc&nbsp;module,&nbsp;which<br/>
&nbsp;is&nbsp;the&nbsp;dependency&nbsp;that&nbsp;should&nbsp;be&nbsp;used.<br/>
&nbsp;$(1):&nbsp;doc&nbsp;module<br/>
</p>
</div>
<div class="function">
<h3><a id="java-lib-files">Function:&nbsp;&nbsp;java-lib-files</a></h3>
<p>
Convert&nbsp;"core&nbsp;ext&nbsp;framework"&nbsp;to&nbsp;"out/.../javalib.jar&nbsp;..."<br/>
out/target/common/JAVA_LIBRARIES/libname_indeterminates/classes.jar<br/>
out/host/common/JAVA_LIBRARIES/libname_indeterminates/classes.jar<br/>
$(1):&nbsp;library&nbsp;name&nbsp;list<br/>
$(2):&nbsp;Non-empty&nbsp;if&nbsp;IS_HOST_MODULE<br/>
</p>
</div>
<div class="function">
<h3><a id="java-lib-deps">Function:&nbsp;&nbsp;java-lib-deps</a></h3>
<p>
多个javalib.jar<br/>
$(1):&nbsp;library&nbsp;name&nbsp;list<br/>
$(2):&nbsp;Non-empty&nbsp;if&nbsp;IS_HOST_MODULE<br/>
</p>
</div>
<div class="function">
<h3><a id="rot13">Function:&nbsp;&nbsp;rot13</a></h3>
<p>
Run&nbsp;rot13&nbsp;on&nbsp;a&nbsp;string&nbsp;rot13&nbsp;是一种简易的置换暗码<br/>
$(1):&nbsp;the&nbsp;string.&nbsp;&nbsp;Must&nbsp;be&nbsp;one&nbsp;line.<br/>
</p>
</div>
<div class="function">
<h3><a id="streq">Function:&nbsp;&nbsp;streq</a></h3>
<p>
Returns&nbsp;true&nbsp;if&nbsp;$(1)&nbsp;and&nbsp;$(2)&nbsp;are&nbsp;equal.&nbsp;&nbsp;Returns<br/>
the&nbsp;empty&nbsp;string&nbsp;if&nbsp;they&nbsp;are&nbsp;not&nbsp;equal.<br/>
</p>
</div>
<div class="function">
<h3><a id="normalize-path-list">Function:&nbsp;&nbsp;normalize-path-list</a></h3>
<p>
Convert&nbsp;"a&nbsp;b&nbsp;c"&nbsp;into&nbsp;"a:b:c"<br/>
</p>
</div>
<div class="function">
<h3><a id="word-colon">Function:&nbsp;&nbsp;word-colon</a></h3>
<p>
Read&nbsp;the&nbsp;word&nbsp;out&nbsp;of&nbsp;a&nbsp;colon-separated&nbsp;list&nbsp;of&nbsp;words.<br/>
This&nbsp;has&nbsp;the&nbsp;same&nbsp;behavior&nbsp;as&nbsp;the&nbsp;built-in&nbsp;function<br/>
$(word&nbsp;n,str).<br/>
The&nbsp;individual&nbsp;words&nbsp;may&nbsp;not&nbsp;contain&nbsp;spaces.<br/>
将用":"分隔的字符串转化为词数组<br/>
$(1):&nbsp;1&nbsp;based&nbsp;index<br/>
$(2):&nbsp;value&nbsp;of&nbsp;the&nbsp;form&nbsp;a:b:c...<br/>
</p>
</div>
<div class="function">
<h3><a id="collapse-pairs">Function:&nbsp;&nbsp;collapse-pairs</a></h3>
<p>
Convert&nbsp;"a=b&nbsp;c=&nbsp;d&nbsp;e&nbsp;=&nbsp;f"&nbsp;into&nbsp;"a=b&nbsp;c=d&nbsp;e=f"&nbsp;，注意空格<br/>
$(1):&nbsp;list&nbsp;to&nbsp;collapse<br/>
$(2):&nbsp;if&nbsp;set,&nbsp;separator&nbsp;word;&nbsp;usually&nbsp;"=",&nbsp;":",&nbsp;or&nbsp;":="<br/>
&nbsp;&nbsp;Defaults&nbsp;to&nbsp;"="&nbsp;if&nbsp;not&nbsp;set.<br/>
</p>
</div>
<div class="function">
<h3><a id="uniq-pairs-by-first-component">Function:&nbsp;&nbsp;uniq-pairs-by-first-component</a></h3>
<p>
Given&nbsp;a&nbsp;list&nbsp;of&nbsp;pairs,&nbsp;if&nbsp;multiple&nbsp;pairs&nbsp;have&nbsp;the&nbsp;same<br/>
first&nbsp;components,&nbsp;keep&nbsp;only&nbsp;the&nbsp;first&nbsp;pair.<br/>
$(1):&nbsp;list&nbsp;of&nbsp;pairs<br/>
$(2):&nbsp;the&nbsp;separator&nbsp;word,&nbsp;such&nbsp;as&nbsp;":",&nbsp;"=",&nbsp;etc.<br/>
</p>
</div>
<div class="function">
<h3><a id="modules-for-tag-list">Function:&nbsp;&nbsp;modules-for-tag-list</a></h3>
<p>
Given&nbsp;a&nbsp;list&nbsp;of&nbsp;pairs,&nbsp;if&nbsp;multiple&nbsp;pairs&nbsp;have&nbsp;the&nbsp;same<br/>
first&nbsp;components,&nbsp;keep&nbsp;only&nbsp;the&nbsp;first&nbsp;pair.<br/>
$(1):&nbsp;list&nbsp;of&nbsp;pairs<br/>
$(2):&nbsp;the&nbsp;separator&nbsp;word,&nbsp;such&nbsp;as&nbsp;":",&nbsp;"=",&nbsp;etc.<br/>
&nbsp;ALL_MODULE_TAGS.eng：out/target/product/find5/system/bin/recovery<br/>
</p>
</div>
<div class="function">
<h3><a id="module-names-for-tag-list">Function:&nbsp;&nbsp;module-names-for-tag-list</a></h3>
<p>
Given&nbsp;a&nbsp;list&nbsp;of&nbsp;tags,&nbsp;return&nbsp;the&nbsp;targets&nbsp;that&nbsp;specify<br/>
any&nbsp;of&nbsp;those&nbsp;tags.<br/>
$(1):&nbsp;tag&nbsp;list<br/>
ALL_MODULE_NAME_TAGS.eng:&nbsp;recovery&nbsp;libbmlutils&nbsp;libdedupe&nbsp;utility_dedupe&nbsp;libcrecovery&nbsp;libmmcutils&nbsp;updater&nbsp;libapplypatch&nbsp;applypatch_static&nbsp;su.recovery<br/>
</p>
</div>
<div class="function">
<h3><a id="get-tagged-modules">Function:&nbsp;&nbsp;get-tagged-modules</a></h3>
<p>
Given&nbsp;an&nbsp;accept&nbsp;and&nbsp;reject&nbsp;list,&nbsp;find&nbsp;the&nbsp;matching&nbsp;set&nbsp;of&nbsp;targets.&nbsp;&nbsp;If&nbsp;a&nbsp;target&nbsp;has&nbsp;multiple&nbsp;tags&nbsp;and<br/>
any&nbsp;of&nbsp;them&nbsp;are&nbsp;rejected,&nbsp;the&nbsp;target&nbsp;is&nbsp;rejected.<br/>
Reject&nbsp;overrides&nbsp;accept.<br/>
$(1):&nbsp;list&nbsp;of&nbsp;tags&nbsp;to&nbsp;accept<br/>
$(2):&nbsp;list&nbsp;of&nbsp;tags&nbsp;to&nbsp;reject<br/>
</p>
</div>
<div class="function">
<h3><a id="append-path">Function:&nbsp;&nbsp;append-path</a></h3>
<p>
Append&nbsp;a&nbsp;leaf&nbsp;to&nbsp;a&nbsp;base&nbsp;path.&nbsp;&nbsp;Properly&nbsp;deals&nbsp;with<br/>
base&nbsp;paths&nbsp;ending&nbsp;in&nbsp;/.<br/>
$(1):&nbsp;base&nbsp;path<br/>
$(2):&nbsp;leaf&nbsp;path<br/>
</p>
</div>
<div class="function">
<h3><a id="get-package-overrides">Function:&nbsp;&nbsp;get-package-overrides</a></h3>
<p>
Packagefiltering<br/>
#Givenalistofinstalledmodules(shortorlongnames)<br/>
#returnalistofthepackages(yes,.apkpackages,not<br/>
#modulesingeneral)thatareoverriddenbythislistand,<br/>
#therefore,shouldnotbeinstalled.<br/>
#$(1):mixedlistofinstalledmodules<br/>
#TODO:Thisisfragile;findareliablewaytogetthisinformation.<br/>
</p>
</div>
<div class="function">
<h3><a id="pretty">Function:&nbsp;&nbsp;pretty</a></h3>
<p>
Output&nbsp;the&nbsp;command&nbsp;lines,&nbsp;or&nbsp;not<br/>
如果编译时传递了添加了showcommands参数，调用pretty会打印正在执行的命令<br/>
如果没有传递showcommand参数，则不会打印正在执行的命令<br/>
</p>
</div>
<div class="function">
<h3><a id="dump-module-variables">Function:&nbsp;&nbsp;dump-module-variables</a></h3>
<p>
Dump&nbsp;the&nbsp;variables&nbsp;that&nbsp;are&nbsp;associated&nbsp;with&nbsp;targets<br/>
&nbsp;打印编译时的一些参数<br/>
&nbsp;主要是一些PRIVATE变量，例如PRIVATE_YACCFLAGS<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-variables">Function:&nbsp;&nbsp;transform-variables</a></h3>
<p>
Commands&nbsp;for&nbsp;using&nbsp;sed&nbsp;to&nbsp;replace&nbsp;given&nbsp;variable&nbsp;values<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-d-to-p-args">Function:&nbsp;&nbsp;transform-d-to-p-args</a></h3>
<p>
CommandsformungingthedependencyfilesGCCgenerates<br/>
$(1):theinput.dfile<br/>
$(2):theoutput.Pfile<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-d-to-p">Function:&nbsp;&nbsp;transform-d-to-p</a></h3>
<p>
参见&nbsp;transform-d-to-p-args&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-l-to-cpp">Function:&nbsp;&nbsp;transform-l-to-cpp</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;lex<br/>
举例：<br/>
&nbsp;ifneq&nbsp;($(strip&nbsp;$(lex_cpps)),)<br/>
&nbsp;$(lex_cpps):&nbsp;$(intermediates)/%$(LOCAL_CPP_EXTENSION):&nbsp;\<br/>
$(TOPDIR)$(LOCAL_PATH)/%.l<br/>
$(transform-l-to-cpp)<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-y-to-cpp">Function:&nbsp;&nbsp;transform-y-to-cpp</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;yacc<br/>
Because&nbsp;the&nbsp;extension&nbsp;of&nbsp;c++&nbsp;files&nbsp;can&nbsp;change,&nbsp;the<br/>
extension&nbsp;must&nbsp;be&nbsp;specified&nbsp;in&nbsp;$1.<br/>
E.g,&nbsp;"$(call&nbsp;transform-y-to-cpp,.cpp)"<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-renderscripts-to-java-and-bc">Function:&nbsp;&nbsp;transform-renderscripts-to-java-and-bc</a></h3>
<p>
Commands&nbsp;to&nbsp;compile&nbsp;RenderScript<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-aidl-to-java">Function:&nbsp;&nbsp;transform-aidl-to-java</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;aidl<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-logtags-to-java">Function:&nbsp;&nbsp;transform-logtags-to-java</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;java-event-log-tags.py<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-proto-to-java">Function:&nbsp;&nbsp;transform-proto-to-java</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;protoc&nbsp;to&nbsp;compile&nbsp;.proto&nbsp;into&nbsp;.java<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-proto-to-cc">Function:&nbsp;&nbsp;transform-proto-to-cc</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;protoc&nbsp;to&nbsp;compile&nbsp;.proto&nbsp;into&nbsp;.pb.cc&nbsp;and&nbsp;.pb.h<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-cpp-to-o">Function:&nbsp;&nbsp;transform-cpp-to-o</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;C++&nbsp;file<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-c-or-s-to-o-no-deps">Function:&nbsp;&nbsp;transform-c-or-s-to-o-no-deps</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;C&nbsp;file<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-c-to-o-no-deps">Function:&nbsp;&nbsp;transform-c-to-o-no-deps</a></h3>
<p>
编译c文件至目标文件,无依赖的编译<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-s-to-o-no-deps">Function:&nbsp;&nbsp;transform-s-to-o-no-deps</a></h3>
<p>
编译汇编文件至目标文件，无依赖的编译<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-c-to-o">Function:&nbsp;&nbsp;transform-c-to-o</a></h3>
<p>
编译c文件至目标文件<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags&nbsp;编译参数<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-s-to-o">Function:&nbsp;&nbsp;transform-s-to-o</a></h3>
<p>
编译汇编文件至目标文件<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags，编译参数<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-m-to-o-no-deps">Function:&nbsp;&nbsp;transform-m-to-o-no-deps</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;an&nbsp;Objective-C&nbsp;file<br/>
This&nbsp;should&nbsp;never&nbsp;happen&nbsp;for&nbsp;target&nbsp;builds&nbsp;but&nbsp;this<br/>
will&nbsp;error&nbsp;at&nbsp;build&nbsp;time.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-m-to-o">Function:&nbsp;&nbsp;transform-m-to-o</a></h3>
<p>
编译objet&nbsp;c文件至目标文件<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags，编译参数&nbsp;&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-cpp-to-o">Function:&nbsp;&nbsp;transform-host-cpp-to-o</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;C++&nbsp;file<br/>
编译cpp文件，目标代码将在主机上运行<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-c-or-s-to-o-no-deps">Function:&nbsp;&nbsp;transform-host-c-or-s-to-o-no-deps</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;C&nbsp;file<br/>
编译c代码或者汇编代码，目标代码将在主机上运行，无依赖的编译<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-c-to-o-no-deps">Function:&nbsp;&nbsp;transform-host-c-to-o-no-deps</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;C&nbsp;file<br/>
&nbsp;编译c代码，目标代码将在主机上运行，无依赖的编译<br/>
&nbsp;&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-s-to-o-no-deps">Function:&nbsp;&nbsp;transform-host-s-to-o-no-deps</a></h3>
<p>
编译汇编代码，目标代码将在主机上运行，无依赖的编译<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-c-to-o">Function:&nbsp;&nbsp;transform-host-c-to-o</a></h3>
<p>
编译c代码，目标代码将在主机上运行<br/>
&nbsp;&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-s-to-o">Function:&nbsp;&nbsp;transform-host-s-to-o</a></h3>
<p>
编译汇编代码，目标代码将在主机上运行<br/>
$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-m-to-o-no-deps">Function:&nbsp;&nbsp;transform-host-m-to-o-no-deps</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;Objective-C&nbsp;file<br/>
编译object&nbsp;c代码，目标代码将在主机上运行，无依赖编译<br/>
$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-m-to-o">Function:&nbsp;&nbsp;transform-host-m-to-o</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;Objective-C&nbsp;file<br/>
&nbsp;编译object&nbsp;c代码，目标代码将在主机上运行，<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="function">
<h3><a id="_concat-if-arg2-not-empty">Function:&nbsp;&nbsp;_concat-if-arg2-not-empty</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;ar<br/>
</p>
</div>
<div class="function">
<h3><a id="split-long-arguments">Function:&nbsp;&nbsp;split-long-arguments</a></h3>
<p>
Split&nbsp;long&nbsp;argument&nbsp;list&nbsp;into&nbsp;smaller&nbsp;groups&nbsp;and&nbsp;call&nbsp;the&nbsp;command&nbsp;repeatedly<br/>
Call&nbsp;the&nbsp;command&nbsp;at&nbsp;least&nbsp;once&nbsp;even&nbsp;if&nbsp;there&nbsp;are&nbsp;no&nbsp;arguments,&nbsp;as&nbsp;otherwise<br/>
the&nbsp;output&nbsp;file&nbsp;won't&nbsp;be&nbsp;created.&nbsp;<br/>
$(1):&nbsp;the&nbsp;command&nbsp;without&nbsp;arguments<br/>
$(2):&nbsp;the&nbsp;arguments<br/>
</p>
</div>
<div class="function">
<h3><a id="extract-and-include-target-whole-static-libs">Function:&nbsp;&nbsp;extract-and-include-target-whole-static-libs</a></h3>
<p>
$(1):&nbsp;the&nbsp;full&nbsp;path&nbsp;of&nbsp;the&nbsp;source&nbsp;static&nbsp;library.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-static-lib">Function:&nbsp;&nbsp;transform-o-to-static-lib</a></h3>
<p>
Explicitly&nbsp;delete&nbsp;the&nbsp;archive&nbsp;first&nbsp;so&nbsp;that&nbsp;ar&nbsp;doesn't<br/>
try&nbsp;to&nbsp;add&nbsp;to&nbsp;an&nbsp;existing&nbsp;archive.<br/>
将目标代码打包成静态库<br/>
</p>
</div>
<div class="function">
<h3><a id="extract-and-include-host-whole-static-libs">Function:&nbsp;&nbsp;extract-and-include-host-whole-static-libs</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;host&nbsp;ar<br/>
$(1):&nbsp;the&nbsp;full&nbsp;path&nbsp;of&nbsp;the&nbsp;source&nbsp;static&nbsp;library.<br/>
静态库将在主机上运行<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-static-lib">Function:&nbsp;&nbsp;transform-host-o-to-static-lib</a></h3>
<p>
将目标代码打包成在主机上运行的静态库<br/>
静态库将在主机上运行<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-shared-lib-inner">Function:&nbsp;&nbsp;transform-host-o-to-shared-lib-inner</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;link&nbsp;a&nbsp;shared&nbsp;library&nbsp;or&nbsp;package<br/>
ld&nbsp;just&nbsp;seems&nbsp;to&nbsp;be&nbsp;so&nbsp;finicky&nbsp;with&nbsp;command&nbsp;order&nbsp;that&nbsp;we&nbsp;allow<br/>
it&nbsp;to&nbsp;be&nbsp;overriden&nbsp;en-masse&nbsp;see&nbsp;combo/linux-arm.make&nbsp;for&nbsp;an&nbsp;example.<br/>
将目标代码打包成在主机上运行的动态库或者包<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-shared-lib">Function:&nbsp;&nbsp;transform-host-o-to-shared-lib</a></h3>
<p>
参见transform-host-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-package">Function:&nbsp;&nbsp;transform-host-o-to-package</a></h3>
<p>
参见transform-host-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-shared-lib-inner">Function:&nbsp;&nbsp;transform-o-to-shared-lib-inner</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;link&nbsp;a&nbsp;shared&nbsp;library&nbsp;or&nbsp;package&nbsp;<br/>
ld&nbsp;just&nbsp;seems&nbsp;to&nbsp;be&nbsp;so&nbsp;finicky&nbsp;with&nbsp;command&nbsp;order&nbsp;that&nbsp;we&nbsp;allow<br/>
it&nbsp;to&nbsp;be&nbsp;overriden&nbsp;en-masse&nbsp;see&nbsp;combo/linux-arm.make&nbsp;for&nbsp;an&nbsp;example.<br/>
&nbsp;&nbsp;&nbsp;将目标代码打包成在目标机上运行的动态库<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-shared-lib">Function:&nbsp;&nbsp;transform-o-to-shared-lib</a></h3>
<p>
参见transform-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-package">Function:&nbsp;&nbsp;transform-o-to-package</a></h3>
<p>
参见transform-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-to-stripped">Function:&nbsp;&nbsp;transform-to-stripped</a></h3>
<p>
Commands&nbsp;for&nbsp;filtering&nbsp;a&nbsp;target&nbsp;executable&nbsp;or&nbsp;library<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-executable-inner">Function:&nbsp;&nbsp;transform-o-to-executable-inner</a></h3>
<p>
Commandsforrunninggcctolinkanexecutable<br/>
编译成可执行文件<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-executable">Function:&nbsp;&nbsp;transform-o-to-executable</a></h3>
<p>
参见transform-o-to-executable-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-static-executable-inner">Function:&nbsp;&nbsp;transform-o-to-static-executable-inner</a></h3>
<p>
Commandsforrunninggcctolinkastaticallylinked<br/>
executable.Inpractice,weonlyusethisonarm,so<br/>
theotherplatformsdon'thavethe<br/>
transform-o-to-static-executabledefined<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-o-to-static-executable">Function:&nbsp;&nbsp;transform-o-to-static-executable</a></h3>
<p>
参见transform-o-to-static-executable-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-executable-inner">Function:&nbsp;&nbsp;transform-host-o-to-executable-inner</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;link&nbsp;a&nbsp;host&nbsp;executable<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-o-to-executable">Function:&nbsp;&nbsp;transform-host-o-to-executable</a></h3>
<p>
参见transform-host-o-to-executable-inner<br/>
</p>
</div>
<div class="function">
<h3><a id="create-resource-java-files">Function:&nbsp;&nbsp;create-resource-java-files</a></h3>
<p>
Commandsforrunningjavactomake.classfiles<br/>
@echo"Sourceintermediatesdir:$(PRIVATE_SOURCE_INTERMEDIATES_DIR)"<br/>
@echo"Sourceintermediates:$$(find$(PRIVATE_SOURCE_INTERMEDIATES_DIR)-name'*.java')"<br/>
ThisrulecreatestheR.javaandManifest.javafiles,bothofwhich<br/>
arePRODUCT-neutral.Don'tpassPRIVATE_PRODUCT_AAPT_CONFIGtothisinvocation.<br/>
</p>
</div>
<div class="function">
<h3><a id="emit-line">Function:&nbsp;&nbsp;emit-line</a></h3>
<p>
emit-line,<wordlist>,<outputfile><br/>
</p>
</div>
<div class="function">
<h3><a id="dump-words-to-file">Function:&nbsp;&nbsp;dump-words-to-file</a></h3>
<p>
dump-words-to-file,<wordlist>,<outputfile><br/>
</p>
</div>
<div class="function">
<h3><a id="unzip-jar-files">Function:&nbsp;&nbsp;unzip-jar-files</a></h3>
<p>
For&nbsp;a&nbsp;list&nbsp;of&nbsp;jar&nbsp;files,&nbsp;unzip&nbsp;them&nbsp;to&nbsp;a&nbsp;specified&nbsp;directory,<br/>
but&nbsp;make&nbsp;sure&nbsp;that&nbsp;no&nbsp;META-INF&nbsp;files&nbsp;come&nbsp;along&nbsp;for&nbsp;the&nbsp;ride.<br/>
$(1):&nbsp;files&nbsp;to&nbsp;unzip<br/>
$(2):&nbsp;destination&nbsp;directory<br/>
</p>
</div>
<div class="function">
<h3><a id="compile-java">Function:&nbsp;&nbsp;compile-java</a></h3>
<p>
Common&nbsp;definition&nbsp;to&nbsp;invoke&nbsp;javac&nbsp;on&nbsp;the&nbsp;host&nbsp;and&nbsp;target.<br/>
Some&nbsp;historical&nbsp;notes:<br/>
&nbsp;&nbsp;&nbsp;-&nbsp;below&nbsp;we&nbsp;write&nbsp;the&nbsp;list&nbsp;of&nbsp;java&nbsp;files&nbsp;to&nbsp;java-source-list&nbsp;to&nbsp;avoid&nbsp;argument<br/>
&nbsp;list&nbsp;length&nbsp;problems&nbsp;with&nbsp;Cygwin<br/>
&nbsp;&nbsp;&nbsp;-&nbsp;we&nbsp;filter&nbsp;out&nbsp;duplicate&nbsp;java&nbsp;file&nbsp;names&nbsp;because&nbsp;eclipse's&nbsp;compiler<br/>
&nbsp;doesn't&nbsp;like&nbsp;them.<br/>
$(1):&nbsp;javac<br/>
$(2):&nbsp;bootclasspath<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-java-to-classes.jar">Function:&nbsp;&nbsp;transform-java-to-classes.jar</a></h3>
<p>
将java编译并打包成classes.jar<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-classes.jar-to-emma">Function:&nbsp;&nbsp;transform-classes.jar-to-emma</a></h3>
<p>
emma代码覆盖率测试<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-classes.jar-to-dex">Function:&nbsp;&nbsp;transform-classes.jar-to-dex</a></h3>
<p>
将classes.jar转化为dex<br/>
</p>
</div>
<div class="function">
<h3><a id="create-empty-package">Function:&nbsp;&nbsp;create-empty-package</a></h3>
<p>
Create&nbsp;a&nbsp;mostly-empty&nbsp;.jar&nbsp;file&nbsp;that&nbsp;we'll&nbsp;add&nbsp;to&nbsp;later.<br/>
The&nbsp;MacOS&nbsp;jar&nbsp;tool&nbsp;doesn't&nbsp;like&nbsp;creating&nbsp;empty&nbsp;jar&nbsp;files,<br/>
so&nbsp;we&nbsp;need&nbsp;to&nbsp;give&nbsp;it&nbsp;something.<br/>
</p>
</div>
<div class="function">
<h3><a id="add-assets-to-package">Function:&nbsp;&nbsp;add-assets-to-package</a></h3>
<p>
TODO:&nbsp;we&nbsp;kinda&nbsp;want&nbsp;to&nbsp;build&nbsp;different&nbsp;asset&nbsp;packages&nbsp;for<br/>
&nbsp;different&nbsp;configurations,&nbsp;then&nbsp;combine&nbsp;them&nbsp;later&nbsp;(or&nbsp;something).<br/>
Per-locale,&nbsp;etc.<br/>
A&nbsp;list&nbsp;of&nbsp;dynamic&nbsp;and&nbsp;static&nbsp;parameters;build&nbsp;layers&nbsp;for<br/>
dynamic&nbsp;params&nbsp;that&nbsp;lay&nbsp;over&nbsp;the&nbsp;static&nbsp;ones.<br/>
TODO:&nbsp;update&nbsp;the&nbsp;manifest&nbsp;to&nbsp;point&nbsp;to&nbsp;the&nbsp;package&nbsp;file<br/>
Note&nbsp;that&nbsp;the&nbsp;version&nbsp;numbers&nbsp;are&nbsp;given&nbsp;to&nbsp;aapt&nbsp;as&nbsp;simple&nbsp;default<br/>
values;&nbsp;applications&nbsp;can&nbsp;override&nbsp;these&nbsp;by&nbsp;explicitly&nbsp;stating<br/>
them&nbsp;in&nbsp;their&nbsp;manifest.<br/>
将资源文件打包到package<br/>
</p>
</div>
<div class="function">
<h3><a id="add-jni-shared-libs-to-package">Function:&nbsp;&nbsp;add-jni-shared-libs-to-package</a></h3>
<p>
将jni&nbsp;动态库打包到package<br/>
</p>
</div>
<div class="function">
<h3><a id="add-dex-to-package">Function:&nbsp;&nbsp;add-dex-to-package</a></h3>
<p>
将dex打包到package<br/>
</p>
</div>
<div class="function">
<h3><a id="add-java-resources-to-package">Function:&nbsp;&nbsp;add-java-resources-to-package</a></h3>
<p>
Add&nbsp;java&nbsp;resources&nbsp;added&nbsp;by&nbsp;the&nbsp;current&nbsp;module.<br/>
</p>
</div>
<div class="function">
<h3><a id="add-carried-java-resources">Function:&nbsp;&nbsp;add-carried-java-resources</a></h3>
<p>
Add&nbsp;java&nbsp;resources&nbsp;carried&nbsp;by&nbsp;static&nbsp;Java&nbsp;libraries.<br/>
</p>
</div>
<div class="function">
<h3><a id="sign-package">Function:&nbsp;&nbsp;sign-package</a></h3>
<p>
Sign&nbsp;a&nbsp;package&nbsp;using&nbsp;the&nbsp;specified&nbsp;key/cert.<br/>
</p>
</div>
<div class="function">
<h3><a id="align-package">Function:&nbsp;&nbsp;align-package</a></h3>
<p>
Align&nbsp;STORED&nbsp;entries&nbsp;of&nbsp;a&nbsp;package&nbsp;on&nbsp;4-byte&nbsp;boundaries<br/>
to&nbsp;make&nbsp;them&nbsp;easier&nbsp;to&nbsp;mmap.<br/>
</p>
</div>
<div class="function">
<h3><a id="install-dex-debug">Function:&nbsp;&nbsp;install-dex-debug</a></h3>
<p>
安装debug版本的dex文件<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-java-to-package">Function:&nbsp;&nbsp;transform-host-java-to-package</a></h3>
<p>
TODO(joeo):Ifwecaneverupgradetopost3.81makeandgetthe<br/>
newprebuiltrulestowork,weshouldchangethistocopythe<br/>
resourcestotheoutdirectoryandthencopytheresources.<br/>
Note:weintentionallydon'tcleanPRIVATE_CLASS_INTERMEDIATES_DIR<br/>
intransform-java-to-classesforthesakeofvm-tests.<br/>
</p>
</div>
<div class="function">
<h3><a id="obfuscate-jar">Function:&nbsp;&nbsp;obfuscate-jar</a></h3>
<p>
Obfuscate&nbsp;a&nbsp;jar&nbsp;file<br/>
PRIVATE_KEEP_FILE&nbsp;is&nbsp;a&nbsp;file&nbsp;containing&nbsp;a&nbsp;list&nbsp;of&nbsp;classes<br/>
&nbsp;PRIVATE_INTERMEDIATES_DIR&nbsp;is&nbsp;a&nbsp;directory&nbsp;we&nbsp;can&nbsp;use&nbsp;for&nbsp;temporary&nbsp;files<br/>
&nbsp;The&nbsp;module&nbsp;using&nbsp;this&nbsp;must&nbsp;depend&nbsp;on<br/>
$(HOST_OUT_JAVA_LIBRARIES)/proguard-4.0.1.jar<br/>
&nbsp;混淆代码<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-one-header">Function:&nbsp;&nbsp;copy-one-header</a></h3>
<p>
Commands&nbsp;for&nbsp;copying&nbsp;files&nbsp;<br/>
Define&nbsp;a&nbsp;rule&nbsp;to&nbsp;copy&nbsp;a&nbsp;header.&nbsp;&nbsp;Used&nbsp;via&nbsp;$(eval)&nbsp;by&nbsp;copy_headers.make.<br/>
$(1):&nbsp;source&nbsp;header<br/>
$(2):&nbsp;destination&nbsp;header<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-one-file">Function:&nbsp;&nbsp;copy-one-file</a></h3>
<p>
Define&nbsp;a&nbsp;rule&nbsp;to&nbsp;copy&nbsp;a&nbsp;file.&nbsp;&nbsp;For&nbsp;use&nbsp;via&nbsp;$(eval).<br/>
$(1):&nbsp;source&nbsp;file<br/>
$(2):&nbsp;destination&nbsp;file<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-many-files">Function:&nbsp;&nbsp;copy-many-files</a></h3>
<p>
Copies&nbsp;many&nbsp;files.<br/>
$(1):&nbsp;The&nbsp;files&nbsp;to&nbsp;copy.&nbsp;&nbsp;Each&nbsp;entry&nbsp;is&nbsp;a&nbsp;':'&nbsp;separated&nbsp;src:dst&nbsp;pair<br/>
Evaluates&nbsp;to&nbsp;the&nbsp;list&nbsp;of&nbsp;the&nbsp;dst&nbsp;files&nbsp;(ie&nbsp;suitable&nbsp;for&nbsp;a&nbsp;dependency&nbsp;list)<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-xml-file-checked">Function:&nbsp;&nbsp;copy-xml-file-checked</a></h3>
<p>
Copy&nbsp;the&nbsp;file&nbsp;only&nbsp;if&nbsp;it's&nbsp;a&nbsp;well-formed&nbsp;xml&nbsp;file.&nbsp;For&nbsp;use&nbsp;via&nbsp;$(eval).<br/>
$(1):&nbsp;source&nbsp;file<br/>
$(2):&nbsp;destination&nbsp;file,&nbsp;must&nbsp;end&nbsp;with&nbsp;.xml.<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-target">Function:&nbsp;&nbsp;copy-file-to-target</a></h3>
<p>
The&nbsp;-t&nbsp;option&nbsp;to&nbsp;acp&nbsp;and&nbsp;the&nbsp;-p&nbsp;option&nbsp;to&nbsp;cp&nbsp;is<br/>
required&nbsp;for&nbsp;OSX.&nbsp;&nbsp;OSX&nbsp;has&nbsp;a&nbsp;ridiculous&nbsp;restriction<br/>
where&nbsp;it's&nbsp;an&nbsp;error&nbsp;for&nbsp;a&nbsp;.a&nbsp;file's&nbsp;modification&nbsp;time<br/>
to&nbsp;disagree&nbsp;with&nbsp;an&nbsp;internal&nbsp;timestamp,&nbsp;and&nbsp;this<br/>
macro&nbsp;is&nbsp;used&nbsp;to&nbsp;install&nbsp;.a&nbsp;files&nbsp;(among&nbsp;other&nbsp;things).<br/>
Copy&nbsp;a&nbsp;single&nbsp;file&nbsp;from&nbsp;one&nbsp;place&nbsp;to&nbsp;another,<br/>
preserving&nbsp;permissions&nbsp;and&nbsp;overwriting&nbsp;any&nbsp;existing<br/>
file.<br/>
We&nbsp;disable&nbsp;the&nbsp;"-t"&nbsp;option&nbsp;for&nbsp;acp&nbsp;cannot&nbsp;handle<br/>
high&nbsp;resolution&nbsp;timestamp&nbsp;correctly&nbsp;on&nbsp;file&nbsp;systems&nbsp;like&nbsp;ext4.<br/>
Therefore&nbsp;copy-file-to-target&nbsp;is&nbsp;the&nbsp;same&nbsp;as&nbsp;copy-file-to-new-target.<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-target-with-cp">Function:&nbsp;&nbsp;copy-file-to-target-with-cp</a></h3>
<p>
The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;local<br/>
cp&nbsp;command&nbsp;instead&nbsp;of&nbsp;acp.<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-target-with-zipalign">Function:&nbsp;&nbsp;copy-file-to-target-with-zipalign</a></h3>
<p>
The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;zipalign&nbsp;tool&nbsp;to&nbsp;do&nbsp;so.<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-target-strip-comments">Function:&nbsp;&nbsp;copy-file-to-target-strip-comments</a></h3>
<p>
The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;strip&nbsp;out&nbsp;"#&nbsp;comment"-style<br/>
comments&nbsp;(for&nbsp;config&nbsp;files&nbsp;and&nbsp;such).<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-new-target">Function:&nbsp;&nbsp;copy-file-to-new-target</a></h3>
<p>
The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;don't&nbsp;preserve<br/>
the&nbsp;old&nbsp;modification&nbsp;time.<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-file-to-new-target-with-cp">Function:&nbsp;&nbsp;copy-file-to-new-target-with-cp</a></h3>
<p>
The&nbsp;same&nbsp;as&nbsp;copy-file-to-new-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;local<br/>
cp&nbsp;command&nbsp;instead&nbsp;of&nbsp;acp.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-prebuilt-to-target">Function:&nbsp;&nbsp;transform-prebuilt-to-target</a></h3>
<p>
Copy&nbsp;a&nbsp;prebuilt&nbsp;file&nbsp;to&nbsp;a&nbsp;target&nbsp;location.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-prebuilt-to-target-with-zipalign">Function:&nbsp;&nbsp;transform-prebuilt-to-target-with-zipalign</a></h3>
<p>
Copyaprebuiltfiletoatargetlocation,usingzipalignonit.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-prebuilt-to-target-strip-comments">Function:&nbsp;&nbsp;transform-prebuilt-to-target-strip-comments</a></h3>
<p>
Copy&nbsp;a&nbsp;prebuilt&nbsp;file&nbsp;to&nbsp;a&nbsp;target&nbsp;location,&nbsp;stripping&nbsp;"#&nbsp;comment"&nbsp;comments.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-host-ranlib-copy-hack">Function:&nbsp;&nbsp;transform-host-ranlib-copy-hack</a></h3>
<p>
Onsomeplatforms(MacOS),aftercopyingastatic<br/>
library,ranlibmustberuntoupdateaninternal<br/>
timestamp!?!?!<br/>
</p>
</div>
<div class="function">
<h3><a id="proguard-disabled-commands">Function:&nbsp;&nbsp;proguard-disabled-commands</a></h3>
<p>
Commands&nbsp;to&nbsp;call&nbsp;Proguard<br/>
Command&nbsp;to&nbsp;copy&nbsp;the&nbsp;file&nbsp;with&nbsp;acp,&nbsp;if&nbsp;proguard&nbsp;is&nbsp;disabled.<br/>
</p>
</div>
<div class="function">
<h3><a id="proguard-enabled-commands">Function:&nbsp;&nbsp;proguard-enabled-commands</a></h3>
<p>
Command&nbsp;to&nbsp;copy&nbsp;the&nbsp;file&nbsp;with&nbsp;acp,&nbsp;if&nbsp;proguard&nbsp;is&nbsp;disabled.<br/>
</p>
</div>
<div class="function">
<h3><a id="get-instrumentation-proguard-flags">Function:&nbsp;&nbsp;get-instrumentation-proguard-flags</a></h3>
<p>
Figure&nbsp;out&nbsp;the&nbsp;proguard&nbsp;dictionary&nbsp;file&nbsp;of&nbsp;the&nbsp;module&nbsp;that&nbsp;is&nbsp;instrumentationed&nbsp;for.<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-jar-to-proguard">Function:&nbsp;&nbsp;transform-jar-to-proguard</a></h3>
<p>
将jar混淆<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-generated-source">Function:&nbsp;&nbsp;transform-generated-source</a></h3>
<p>
Stuffsourcegeneratedfromone-offtools<br/>
</p>
</div>
<div class="function">
<h3><a id="image-size-from-data-size">Function:&nbsp;&nbsp;image-size-from-data-size</a></h3>
<p>
将data分区大小(在/proc/mtd里存储)转为能够刷入该分区的img文件大小<br/>
&nbsp;&nbsp;Convert&nbsp;a&nbsp;partition&nbsp;data&nbsp;size&nbsp;(eg,&nbsp;as&nbsp;reported&nbsp;in&nbsp;/proc/mtd)&nbsp;to&nbsp;the<br/>
&nbsp;&nbsp;size&nbsp;of&nbsp;the&nbsp;image&nbsp;used&nbsp;to&nbsp;flash&nbsp;that&nbsp;partition&nbsp;(which&nbsp;includes&nbsp;a<br/>
&nbsp;&nbsp;spare&nbsp;area&nbsp;for&nbsp;each&nbsp;page).<br/>
&nbsp;&nbsp;$(1):&nbsp;the&nbsp;partition&nbsp;data&nbsp;size<br/>
</p>
</div>
<div class="function">
<h3><a id="assert-max-file-size">Function:&nbsp;&nbsp;assert-max-file-size</a></h3>
<p>
确保文件大小不超过某个数值<br/>
&nbsp;&nbsp;$(1):&nbsp;The&nbsp;file(s)&nbsp;to&nbsp;check&nbsp;(often&nbsp;$@)<br/>
&nbsp;&nbsp;$(2):&nbsp;The&nbsp;maximum&nbsp;total&nbsp;image&nbsp;size,&nbsp;in&nbsp;decimal&nbsp;bytes<br/>
&nbsp;&nbsp;$(3):&nbsp;the&nbsp;type&nbsp;of&nbsp;filesystem&nbsp;"yaffs"&nbsp;or&nbsp;"raw"<br/>
&nbsp;&nbsp;If&nbsp;$(2)&nbsp;is&nbsp;empty,&nbsp;evaluates&nbsp;to&nbsp;"true"&nbsp;&nbsp;<br/>
&nbsp;&nbsp;Reserve&nbsp;bad&nbsp;blocks.&nbsp;&nbsp;Make&nbsp;sure&nbsp;that&nbsp;MAX(1%&nbsp;of&nbsp;partition&nbsp;size,&nbsp;2&nbsp;blocks)<br/>
&nbsp;&nbsp;is&nbsp;left&nbsp;over&nbsp;after&nbsp;the&nbsp;image&nbsp;has&nbsp;been&nbsp;flashed.&nbsp;&nbsp;Round&nbsp;the&nbsp;1%&nbsp;up&nbsp;to&nbsp;the<br/>
&nbsp;&nbsp;next&nbsp;whole&nbsp;flash&nbsp;block&nbsp;size.<br/>
</p>
</div>
<div class="function">
<h3><a id="assert-max-image-size">Function:&nbsp;&nbsp;assert-max-image-size</a></h3>
<p>
确保image大小不超过某个数值<br/>
&nbsp;&nbsp;Like&nbsp;assert-max-file-size,&nbsp;but&nbsp;the&nbsp;second&nbsp;argument&nbsp;is&nbsp;a&nbsp;partition<br/>
&nbsp;&nbsp;size,&nbsp;which&nbsp;we'll&nbsp;convert&nbsp;to&nbsp;a&nbsp;max&nbsp;image&nbsp;size&nbsp;before&nbsp;checking&nbsp;it<br/>
&nbsp;&nbsp;against&nbsp;the&nbsp;files.&nbsp;<br/>
&nbsp;&nbsp;$(1):&nbsp;The&nbsp;file(s)&nbsp;to&nbsp;check&nbsp;(often&nbsp;$@)<br/>
&nbsp;&nbsp;$(2):&nbsp;The&nbsp;partition&nbsp;size.<br/>
</p>
</div>
<div class="function">
<h3><a id="add-radio-file">Function:&nbsp;&nbsp;add-radio-file</a></h3>
<p>
添加radio包<br/>
&nbsp;Define&nbsp;device-specific&nbsp;radio&nbsp;files<br/>
&nbsp;&nbsp;Copy&nbsp;a&nbsp;radio&nbsp;image&nbsp;file&nbsp;to&nbsp;the&nbsp;output&nbsp;location,&nbsp;and&nbsp;add&nbsp;it&nbsp;to<br/>
&nbsp;&nbsp;INSTALLED_RADIOIMAGE_TARGET.<br/>
&nbsp;&nbsp;$(1):&nbsp;filename&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="add-radio-file-checked">Function:&nbsp;&nbsp;add-radio-file-checked</a></h3>
<p>
Version&nbsp;of&nbsp;add-radio-file&nbsp;that&nbsp;also&nbsp;arranges&nbsp;for&nbsp;the&nbsp;version&nbsp;of&nbsp;the<br/>
file&nbsp;to&nbsp;be&nbsp;checked&nbsp;against&nbsp;the&nbsp;contents&nbsp;of<br/>
$(TARGET_BOARD_INFO_FILE).<br/>
$(1):&nbsp;filename<br/>
$(2):&nbsp;name&nbsp;of&nbsp;version&nbsp;variable&nbsp;in&nbsp;board-info&nbsp;(eg,&nbsp;"version-baseband")<br/>
</p>
</div>
<div class="function">
<h3><a id="inherit-package">Function:&nbsp;&nbsp;inherit-package</a></h3>
<p>
Override&nbsp;the&nbsp;package&nbsp;defined&nbsp;in&nbsp;$(1),&nbsp;setting&nbsp;the<br/>
variables&nbsp;listed&nbsp;below&nbsp;differently.<br/>
$(1):&nbsp;The&nbsp;makefile&nbsp;to&nbsp;override&nbsp;(relative&nbsp;to&nbsp;the&nbsp;source<br/>
tree&nbsp;root)<br/>
$(2):&nbsp;Old&nbsp;LOCAL_PACKAGE_NAME&nbsp;value.<br/>
$(3):&nbsp;New&nbsp;LOCAL_PACKAGE_NAME&nbsp;value.<br/>
$(4):&nbsp;New&nbsp;LOCAL_MANIFEST_PACKAGE_NAME&nbsp;value.<br/>
$(5):&nbsp;New&nbsp;LOCAL_CERTIFICATE&nbsp;value.<br/>
$(6):&nbsp;New&nbsp;LOCAL_INSTRUMENTATION_FOR&nbsp;value.<br/>
$(7):&nbsp;New&nbsp;LOCAL_MANIFEST_INSTRUMENTATION_FOR&nbsp;value.<br/>
&nbsp;Note&nbsp;that&nbsp;LOCAL_PACKAGE_OVERRIDES&nbsp;is&nbsp;NOT&nbsp;cleared&nbsp;in<br/>
&nbsp;clear_vars.mk.<br/>
</p>
</div>
<div class="function">
<h3><a id="set-inherited-package-variables">Function:&nbsp;&nbsp;set-inherited-package-variables</a></h3>
<p>
To&nbsp;be&nbsp;used&nbsp;with&nbsp;inherit-package&nbsp;above<br/>
Evalutes&nbsp;to&nbsp;true&nbsp;if&nbsp;the&nbsp;package&nbsp;was&nbsp;overridden<br/>
</p>
</div>
<div class="function">
<h3><a id="keep-or-override">Function:&nbsp;&nbsp;keep-or-override</a></h3>
<p>
参见inherit-package<br/>
</p>
</div>
<div class="function">
<h3><a id="expand-required-modules">Function:&nbsp;&nbsp;expand-required-modules</a></h3>
<p>
Expand&nbsp;a&nbsp;module&nbsp;name&nbsp;list&nbsp;with&nbsp;REQUIRED&nbsp;modules<br/>
$(1):&nbsp;The&nbsp;variable&nbsp;name&nbsp;that&nbsp;holds&nbsp;the&nbsp;initial&nbsp;module&nbsp;name&nbsp;list.<br/>
&nbsp;&nbsp;the&nbsp;variable&nbsp;will&nbsp;be&nbsp;modified&nbsp;to&nbsp;hold&nbsp;the&nbsp;expanded&nbsp;results.<br/>
$(2):&nbsp;The&nbsp;initial&nbsp;module&nbsp;name&nbsp;list.<br/>
Returns&nbsp;empty&nbsp;string&nbsp;(maybe&nbsp;with&nbsp;some&nbsp;whitespaces).<br/>
</p>
</div>
<div class="function">
<h3><a id="check-api">Function:&nbsp;&nbsp;check-api</a></h3>
<p>
API&nbsp;Check<br/>
&nbsp;eval&nbsp;this&nbsp;to&nbsp;define&nbsp;a&nbsp;rule&nbsp;that&nbsp;runs&nbsp;apicheck.&nbsp;<br/>
&nbsp;Args:<br/>
&nbsp;$(1)&nbsp;&nbsp;target<br/>
&nbsp;$(2)&nbsp;&nbsp;stable&nbsp;api&nbsp;file<br/>
&nbsp;$(3)&nbsp;&nbsp;api&nbsp;file&nbsp;to&nbsp;be&nbsp;tested<br/>
&nbsp;$(4)&nbsp;&nbsp;arguments&nbsp;for&nbsp;apicheck<br/>
&nbsp;$(5)&nbsp;&nbsp;command&nbsp;to&nbsp;run&nbsp;if&nbsp;apicheck&nbsp;failed<br/>
&nbsp;$(6)&nbsp;&nbsp;target&nbsp;dependent&nbsp;on&nbsp;this&nbsp;api&nbsp;check<br/>
&nbsp;$(7)&nbsp;&nbsp;additional&nbsp;dependencies&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
