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

<div class="">
<h3><a id="">▶ &nbsp;&nbsp;</a></h3>
<p>
</p>
</div>
<div class="variable">
<h3><a id="__thisfile">■ &nbsp;&nbsp;__thisfile</a></h3>
<p>
定义了公共的编译系统变量，还定义了很多命令用来编译各种各样的目标，其它地方用来构建最终目标,build/core/main.mk，build/core/Makefile将用到这些变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_DOCS">■ &nbsp;&nbsp;ALL_DOCS</a></h3>
<p>
所有文档的全路径<br/>
ALL_DOCS的赋值在droddoc.mk里：<br/>
ALL_DOCS&nbsp;+=&nbsp;$(full_target)<br/>
full_target&nbsp;:=&nbsp;$(call&nbsp;doc-timestamp-for,$(LOCAL_MODULE))<br/>
&nbsp;&nbsp;ALL_DOCS示例：out/target/common/docs/api-stubs-timestamp&nbsp;&nbsp;out/target/common/docs/hidden-timestamp&nbsp;<br/>
如果某个模块要编译出文档，需要使用命令<br/>
include&nbsp;$(BUILD_DROIDDOC)<br/>
而BUILD_DROID_DOC变量的值是droddoc.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES">■ &nbsp;&nbsp;ALL_MODULES</a></h3>
<p>
系统的所有模块的简单名字集合<br/>
编译系统还为每一个模块还定义了其它两个变量<br/>
ALL_MODULES.$(target).BUILT：&nbsp;表示编译生成的程序存放位置<br/>
ALL_MODULES.$(target).INSTALLED：表示手机中安装该文件的位置对应到开发机上的位置<br/>
&nbsp;&nbsp;例如：手机中将安装在system/bin/recovery，那么ALL_MODULES.recovery.INSTALLED为out/target/product/find5/system/bin/recovery<br/>
BUILT变量包含了那个目标的LOCAL_BUILT_MODULE，<br/>
INSTALLED变量包含了那个目标的LOCAL_INSTALLED_MODULE<br/>
某些目标在BUILT和INSTALLED子变量里可能有多个文件<br/>
每个模块都会定义该模块的生成类型，可能是二进制文件，可能java静态库<br/>
生成这些目标的规则文件比如executable.mk用于生成手机上的可执行文件，<br/>
它对应的编译变量BUILD_EXECUTABLE<br/>
如果某个目标想要生成手机上的可执行文件，只需要用include&nbsp;$(BUILD_EXECUTABLE)即可，<br/>
而executable.mk里包含了binary.mk，而binary.mk包含了base_rules.mk<br/>
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
<h3><a id="ALL_DEFAULT_INSTALLED_MODULES">■ &nbsp;&nbsp;ALL_DEFAULT_INSTALLED_MODULES</a></h3>
<p>
Full&nbsp;paths&nbsp;to&nbsp;targets&nbsp;that&nbsp;should&nbsp;be&nbsp;added&nbsp;to&nbsp;the&nbsp;"make&nbsp;droid"&nbsp;set&nbsp;of&nbsp;installed&nbsp;targets.<br/>
droid目标将安装的所有模块的集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULE_TAGS">■ &nbsp;&nbsp;ALL_MODULE_TAGS</a></h3>
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
<h3><a id="ALL_MODULE_NAME_TAGS">■ &nbsp;&nbsp;ALL_MODULE_NAME_TAGS</a></h3>
<p>
类似于ALL_MODULE_TAGS，但是包含某个tag的所有模块名&nbsp;<br/>
例：<br/>
包含bootable/recovery/Android.mk后，<br/>
&nbsp;ALL_MODULE_NAME_TAGS.eng:&nbsp;recovery&nbsp;libbmlutils&nbsp;libdedupe&nbsp;utility_dedupe&nbsp;libcrecovery&nbsp;libmmcutils&nbsp;updater&nbsp;libapplypatch&nbsp;applypatch_static&nbsp;su.recovery<br/>
&nbsp;ALL_MODULE_NAME_TAGS.optional:&nbsp;nandroid-md5.sh&nbsp;killrecovery.sh&nbsp;dedupe&nbsp;libflashutils&nbsp;flash_image&nbsp;dump_image&nbsp;erase_image&nbsp;libflash_image&nbsp;libdump_image&nbsp;liberase_image&nbsp;<br/>
&nbsp;&nbsp;utility_dump_image&nbsp;utility_flash_image&nbsp;utility_erase_image&nbsp;libminui&nbsp;libminelf&nbsp;libminzip&nbsp;libminadbd&nbsp;libmtdutils&nbsp;edify&nbsp;libedify&nbsp;applypatch&nbsp;<br/>
&nbsp;&nbsp;imgdiff&nbsp;parted&nbsp;sdparted&nbsp;libminizip&nbsp;libmake_ext4fs&nbsp;install-su.sh&nbsp;run-su-daemon.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_HOST_INSTALLED_FILES">■ &nbsp;&nbsp;ALL_HOST_INSTALLED_FILES</a></h3>
<p>
所有安装在pc上的程序<br/>
例：<br/>
包含bootable/recovery/Android.mk后，<br/>
ALL_HOST_INSTALLED_FILES:&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/dedupe<br/>
&nbsp;&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/edify&nbsp;<br/>
&nbsp;&nbsp;&nbsp;/home/cloud/android/Cyanogenmod/out/host/linux-x86/bin/imgdiff<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_PREBUILT">■ &nbsp;&nbsp;ALL_PREBUILT</a></h3>
<p>
Full&nbsp;paths&nbsp;to&nbsp;all&nbsp;prebuilt&nbsp;files&nbsp;that&nbsp;will&nbsp;be&nbsp;copied&nbsp;(used&nbsp;to&nbsp;make&nbsp;the&nbsp;dependency&nbsp;on&nbsp;acp)<br/>
将会被拷贝的预编译文件的全路径<br/>
在system/core/Android.mk里大量使用了ALL_PREBUILT<br/>
&nbsp;ALL_PREBUILT&nbsp;+=&nbsp;$(file)<br/>
&nbsp;ALL_PREBUILT&nbsp;+=&nbsp;$(DIRS)<br/>
示例：<br/>
ALL_PREBUILT:&nbsp;out/target/product/find5/system/etc/dbus.conf&nbsp;out/target/product/find5/system/etc/hosts&nbsp;out/target/product/find5/system/etc/init.goldfish.sh<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_GENERATED_SOURCES">■ &nbsp;&nbsp;ALL_GENERATED_SOURCES</a></h3>
<p>
Full&nbsp;path&nbsp;to&nbsp;all&nbsp;files&nbsp;that&nbsp;are&nbsp;made&nbsp;by&nbsp;some&nbsp;tool<br/>
某些工具生成的所有文件的全路径，比如aidl<br/>
./build/core/binary.mk:273:ALL_GENERATED_SOURCES&nbsp;+=&nbsp;$(LOCAL_GENERATED_SOURCES)<br/>
./bionic/libc/Android.mk:735:ALL_GENERATED_SOURCES&nbsp;+=&nbsp;$(GEN)<br/>
例：<br/>
ALL_GENERATED_SOURCES：&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libRS_intermediates/rsgApiStructs.h&nbsp;<br/>
out/target/product/find5/obj/SHARED_LIBRARIES/libRS_intermediates/rsgApiFuncDecl.h&nbsp;<br/>
out/target/product/find5/obj/SHARED_LIBRARIES/libbt-vendor_intermediates/vnd_buildcfg.h<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_ORIGINAL_DYNAMIC_BINARIES">■ &nbsp;&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES</a></h3>
<p>
The&nbsp;list&nbsp;of&nbsp;dynamic&nbsp;binaries&nbsp;that&nbsp;haven't&nbsp;been&nbsp;stripped/compressed/etc<br/>
没有被优化，也没有被压缩的动态链接库<br/>
dynamic_binary.mk:&nbsp;&nbsp;ALL_ORIGINAL_DYNAMIC_BINARIES&nbsp;+=&nbsp;$(linked_module)<br/>
例：<br/>
ALL_ORIGINAL_DYNAMIC_BINARIES：out/target/product/find5/obj/EXECUTABLES/vold_intermediates/LINKED/vold<br/>
&nbsp;out/target/product/find5/obj/SHARED_LIBRARIES/libkeystore_intermediates/LINKED/libkeystore.so<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_SDK_FILES">■ &nbsp;&nbsp;ALL_SDK_FILES</a></h3>
<p>
These&nbsp;files&nbsp;go&nbsp;into&nbsp;the&nbsp;SDK&nbsp;<br/>
将会放在sdk的文件<br/>
主要赋值：./development/build/Android.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_DALVIK_MODULES">■ &nbsp;&nbsp;INTERNAL_DALVIK_MODULES</a></h3>
<p>
Files&nbsp;for&nbsp;dalvik.&nbsp;&nbsp;This&nbsp;is&nbsp;often&nbsp;build&nbsp;without&nbsp;building&nbsp;the&nbsp;rest&nbsp;of&nbsp;the&nbsp;OS<br/>
dalvik虚拟机需要的文件<br/>
在dalvik/dx/src/Android.mk&nbsp;dalvik/dx/Android.mk中有赋值<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_FINDBUGS_FILES">■ &nbsp;&nbsp;ALL_FINDBUGS_FILES</a></h3>
<p>
./build/core/java.mk:400:ALL_FINDBUGS_FILES&nbsp;+=&nbsp;$(findbugs_xml)<br/>
All&nbsp;findbugs&nbsp;xml&nbsp;files<br/>
所有findbugs的xml文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_GPL_MODULE_LICENSE_FILES">■ &nbsp;&nbsp;ALL_GPL_MODULE_LICENSE_FILES</a></h3>
<p>
GPLmodulelicensefiles<br/>
GPL模块的许可文件<br/>
在build/core/base_rules.mk里有赋值<br/>
gpl_license_file:=$(callfind-parent-file,$(LOCAL_PATH),MODULE_LICENSE*_GPL*MODULE_LICENSE*_MPL*)<br/>
ifneq($(gpl_license_file),)<br/>
LOCAL_MODULE_TAGS+=gnu<br/>
ALL_GPL_MODULE_LICENSE_FILES:=$(sort$(ALL_GPL_MODULE_LICENSE_FILES)$(gpl_license_file))<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_RESOURCE_GENERATED_CLASSES">■ &nbsp;&nbsp;ANDROID_RESOURCE_GENERATED_CLASSES</a></h3>
<p>
ANDROID_RESOURCE_GENERATED_CLASSES&nbsp;:=&nbsp;'R.class'&nbsp;'R$$*.class'&nbsp;'Manifest.class'&nbsp;'Manifest$$*.class'<br/>
在build/core/static_java_library.mk中有用到，用于排除某些文件，使其不被打包至lib文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[print-vars]">■ &nbsp;&nbsp;[print-vars]</a></h3>
<p>
Debugging;&nbsp;prints&nbsp;a&nbsp;variable&nbsp;list&nbsp;to&nbsp;stdout<br/>
用于打印变量的值<br/>
$(1):&nbsp;variable&nbsp;name&nbsp;list,&nbsp;not&nbsp;variable&nbsp;values<br/>
</p>
</div>
<div class="variable">
<h3><a id="[true-or-empty]">■ &nbsp;&nbsp;[true-or-empty]</a></h3>
<p>
如果参数含有true，则返回true，否则返回空<br/>
$(1)&nbsp;要测试的变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="[my-dir]">■ &nbsp;&nbsp;[my-dir]</a></h3>
<p>
返回当前makefile所在目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-makefiles-under]">■ &nbsp;&nbsp;[all-makefiles-under]</a></h3>
<p>
获取某个目录下的所有Android.mk<br/>
$(1):需要提取Android.mk的目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="[first-makefiles-under]">■ &nbsp;&nbsp;[first-makefiles-under]</a></h3>
<p>
在某个目录下的所有子目录中查找Android.mk，不包括当前目录<br/>
$(1):要搜索的目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-subdir-makefiles]">■ &nbsp;&nbsp;[all-subdir-makefiles]</a></h3>
<p>
查找当前目录及子目录下的所有Android.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-named-subdir-makefiles]">■ &nbsp;&nbsp;[all-named-subdir-makefiles]</a></h3>
<p>
在当前目录下的一组子目录下查找Android.mk<br/>
$(1):&nbsp;List&nbsp;of&nbsp;directories&nbsp;to&nbsp;look&nbsp;for&nbsp;under&nbsp;this&nbsp;directory<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-java-files-under]">■ &nbsp;&nbsp;[all-java-files-under]</a></h3>
<p>
找出当前makefile所在目录的指定子目录里的所有java文件<br/>
$(1)&nbsp;指定子目录<br/>
使用范例：SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-java-files-under,src&nbsp;tests)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-subdir-java-files]">■ &nbsp;&nbsp;[all-subdir-java-files]</a></h3>
<p>
从当前目录查找所有java文件<br/>
使用范例：&nbsp;SRC_FILES&nbsp;:=&nbsp;$(call&nbsp;all-subdir-java-files)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-c-files-under]">■ &nbsp;&nbsp;[all-c-files-under]</a></h3>
<p>
Findallofthecfilesunderthenameddirectories.<br/>
Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-c-files-under,srctests)<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-subdir-c-files]">■ &nbsp;&nbsp;[all-subdir-c-files]</a></h3>
<p>
Findallofthecfilesfromhere.Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-subdir-c-files)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-Iaidl-files-under]">■ &nbsp;&nbsp;[all-Iaidl-files-under]</a></h3>
<p>
Findallfilesnamed"I*.aidl"underthenameddirectories,<br/>
whichmustberelativeto$(LOCAL_PATH).Thereturnedlist<br/>
isrelativeto$(LOCAL_PATH).<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-subdir-Iaidl-files]">■ &nbsp;&nbsp;[all-subdir-Iaidl-files]</a></h3>
<p>
Findallofthe"I*.aidl"filesunder$(LOCAL_PATH).<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-logtags-files-under]">■ &nbsp;&nbsp;[all-logtags-files-under]</a></h3>
<p>
Findallofthelogtagsfilesunderthenameddirectories.<br/>
Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-logtags-files-under,src)<br/>
查找.logtag文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-proto-files-under]">■ &nbsp;&nbsp;[all-proto-files-under]</a></h3>
<p>
Findallofthe.protofilesunderthenameddirectories.<br/>
Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-proto-files-under,src)<br/>
查找.proto文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-renderscript-files-under]">■ &nbsp;&nbsp;[all-renderscript-files-under]</a></h3>
<p>
FindalloftheRenderScriptfilesunderthenameddirectories.<br/>
Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-renderscript-files-under,src)<br/>
查找.rs.fs文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-html-files-under]">■ &nbsp;&nbsp;[all-html-files-under]</a></h3>
<p>
Findallofthehtmlfilesunderthenameddirectories.<br/>
Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-html-files-under,srctests)<br/>
查找.html文件<br/>
$1:指定子目录名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[all-subdir-html-files]">■ &nbsp;&nbsp;[all-subdir-html-files]</a></h3>
<p>
Findallofthehtmlfilesfromhere.Meanttobeusedlike:<br/>
SRC_FILES:=$(callall-subdir-html-files)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-subdir-files]">■ &nbsp;&nbsp;[find-subdir-files]</a></h3>
<p>
Findallofthefilesmatchingpattern<br/>
SRC_FILES:=$(callfind-subdir-files,<pattern>)<br/>
$1根据正则表达式搜索，按find命令的正则规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-subdir-subdir-files]">■ &nbsp;&nbsp;[find-subdir-subdir-files]</a></h3>
<p>
findthefilesinthesubdirectory$1ofLOCAL_DIR<br/>
matchingpattern$2,filteringoutfiles$3<br/>
e.g.<br/>
SRC_FILES+=$(callfind-subdir-subdir-files,\<br/>
css,*.cpp,DontWantThis.cpp)<br/>
$1LOCAL_DIR的子目录<br/>
$2匹配规则<br/>
$3过滤的文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-subdir-assets]">■ &nbsp;&nbsp;[find-subdir-assets]</a></h3>
<p>
查找所有不是软链的文件，且文件名不含"."<br/>
SRC_FILES:=$(callfind-subdir-assets)<br/>
$1要进入并查找的目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-other-java-files]">■ &nbsp;&nbsp;[find-other-java-files]</a></h3>
<p>
查找java文件<br/>
$1&nbsp;要进入并查找的目录&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-other-html-files]">■ &nbsp;&nbsp;[find-other-html-files]</a></h3>
<p>
查找html文件<br/>
$1&nbsp;要进入并查找的目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-parent-file]">■ &nbsp;&nbsp;[find-parent-file]</a></h3>
<p>
Scanthrougheachdirectoryof$(1)lookingforfiles<br/>
thatmatch$(2)using$(wildcard).Usefulforseeingif<br/>
agivendirectoryoroneofitsparentscontains<br/>
aparticularfile.Returnsthefirstmatchfound,<br/>
startingfurthestfromtheroot.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-dependency]">■ &nbsp;&nbsp;[add-dependency]</a></h3>
<p>
Functionwecanevaluatetointroduceadynamicdependency<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-prebuilt-file]">■ &nbsp;&nbsp;[add-prebuilt-file]</a></h3>
<p>
Setupthedependenciesforaprebuilttarget<br/>
$(calladd-prebuilt-file,srcfile,[targetclass])<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-prebuilt-files]">■ &nbsp;&nbsp;[add-prebuilt-files]</a></h3>
<p>
domultipleprebuilts<br/>
$(calltargetclass,files...)<br/>
使用举例：<br/>
gdbserver/Android.mk:$(calladd-prebuilt-files,EXECUTABLES,$(prebuilt_files))<br/>
</p>
</div>
<div class="variable">
<h3><a id="[intermediates-dir-for]">■ &nbsp;&nbsp;[intermediates-dir-for]</a></h3>
<p>
Theintermediatesdirectory.Whereobjectfilesgofor<br/>
agiventarget.Wecouldtechnicallygetawaywithout<br/>
the"_intermediates"suffixonthedirectory,butit's<br/>
nicetobeabletogrepforthatstringtofindoutif<br/>
anyone'sabusingthesystem.<br/>
#$(1):targetclass,like"APPS"<br/>
#$(2):targetname,like"NotePad"<br/>
#$(3):ifnon-empty,thisisaHOSTtarget.<br/>
#$(4):ifnon-empty,forcetheintermediatestobeCOMMON如果是host的common，则是out/host/common，如果是target的common，则是out/target/common<br/>
使用举例：<br/>
./development/build/Android.mkframework_res_package:=$(callintermediates-dir-for,APPS,framework-res,,COMMON)/package-export.apk<br/>
./frameworks/base/core/res/Android.mk:37:framework_GENERATED_SOURCE_DIR:=$(callintermediates-dir-for,JAVA_LIBRARIES,framework,,COMMON)/src<br/>
值：out/target/product/find5/obj/STATIC_LIBRARIES/libstdc++_intermediates<br/>
out/target/common/obj/JAVA_LIBRARIES/core_intermediates<br/>
out/target/common/obj/APPS/framework-res_intermediates<br/>
out/target/common/obj/JAVA_LIBRARIES/framework_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="[local-intermediates-dir]">■ &nbsp;&nbsp;[local-intermediates-dir]</a></h3>
<p>
UsesLOCAL_MODULE_CLASS,LOCAL_MODULE,andLOCAL_IS_HOST_MODULE<br/>
todeterminetheintermediatesdirectory.<br/>
$(1):ifnon-empty,forcetheintermediatestobeCOMMON<br/>
例：LOCAL_MODULE_CLASS：EXECUTABLES<br/>
LOCAL_MODULE:recovery<br/>
LOCAL_IS_HOST_MODULEempty<br/>
$1为空<br/>
那么返回out/target/product/find5/obj/EXECUTABLES/recovery_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="[normalize-libraries]">■ &nbsp;&nbsp;[normalize-libraries]</a></h3>
<p>
Convert"path/to/libXXX.so"to"-lXXX".<br/>
Any"path/to/libXXX.a"elementspassthroughunchanged.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[normalize-host-libraries]">■ &nbsp;&nbsp;[normalize-host-libraries]</a></h3>
<p>
参见normalize-libraries<br/>
</p>
</div>
<div class="variable">
<h3><a id="[normalize-target-libraries]">■ &nbsp;&nbsp;[normalize-target-libraries]</a></h3>
<p>
参见normalize-libraries<br/>
</p>
</div>
<div class="variable">
<h3><a id="[module-built-files]">■ &nbsp;&nbsp;[module-built-files]</a></h3>
<p>
Convertalistofshortmodulenames(e.g.,"framework","Browser")<br/>
intothelistoffilesthatarebuiltforthosemodules.<br/>
NOTE:thiswon'treturnreliableresultsuntilafterall<br/>
sub-makefileshavebeenincluded.<br/>
$(1):targetlist<br/>
</p>
</div>
<div class="variable">
<h3><a id="[module-installed-files]">■ &nbsp;&nbsp;[module-installed-files]</a></h3>
<p>
Convertalistofshortmodulesnames(e.g.,"framework","Browser")<br/>
intothelistoffilesthatareinstalledforthosemodules.<br/>
NOTE:thiswon'treturnreliableresultsuntilafterall<br/>
sub-makefileshavebeenincluded.<br/>
$(1):targetlist<br/>
</p>
</div>
<div class="variable">
<h3><a id="[module-stubs-files]">■ &nbsp;&nbsp;[module-stubs-files]</a></h3>
<p>
Convertalistofshortmodulesnames(e.g.,"framework","Browser")<br/>
intothelistoffilesthatshouldbeusedwhenlinking<br/>
againstthatmoduleasapublicAPI.<br/>
TODO:AllowthisformorethanJAVA_LIBRARIESmodules<br/>
NOTE:thiswon'treturnreliableresultsuntilafterall<br/>
sub-makefileshavebeenincluded.<br/>
$(1):targetlist<br/>
</p>
</div>
<div class="variable">
<h3><a id="[doc-timestamp-for]">■ &nbsp;&nbsp;[doc-timestamp-for]</a></h3>
<p>
Evaluatestothetimestampfileforadocmodule,which<br/>
isthedependencythatshouldbeused.<br/>
$(1):docmodule<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_java-lib-dir]">■ &nbsp;&nbsp;[_java-lib-dir]</a></h3>
<p>
Convert"coreextframework"to"out/.../javalib.jar..."<br/>
返回out/target/common/JAVA_LIBRARIES/*_indeterminates<br/>
或者如果$2为host,那么返回out/host/common/JAVA_LIBRARIES/*_indeterminates<br/>
$(1):libraryname<br/>
$(2):Non-emptyifIS_HOST_MODULE<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_java-lib-full-classes.jar]">■ &nbsp;&nbsp;[_java-lib-full-classes.jar]</a></h3>
<p>
out/target/common/JAVA_LIBRARIES/*_indeterminates/classes.jar<br/>
辅助java-lib-files<br/>
</p>
</div>
<div class="variable">
<h3><a id="[java-lib-files]">■ &nbsp;&nbsp;[java-lib-files]</a></h3>
<p>
Convert&nbsp;"core&nbsp;ext&nbsp;framework"&nbsp;to&nbsp;"out/.../javalib.jar&nbsp;..."<br/>
out/target/common/JAVA_LIBRARIES/libname_indeterminates/classes.jar<br/>
out/host/common/JAVA_LIBRARIES/libname_indeterminates/classes.jar<br/>
$(1):&nbsp;library&nbsp;name&nbsp;list<br/>
$(2):&nbsp;Non-empty&nbsp;if&nbsp;IS_HOST_MODULE<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_java-lib-full-dep]">■ &nbsp;&nbsp;[_java-lib-full-dep]</a></h3>
<p>
out/target/common/JAVA_LIBRARIES/libname_indeterminates/javalib.jar<br/>
out/host/common/JAVA_LIBRARIES/libname_indeterminates/javalib.jar<br/>
$(1):&nbsp;library&nbsp;name<br/>
$(2):&nbsp;Non-empty&nbsp;if&nbsp;IS_HOST_MODULE<br/>
</p>
</div>
<div class="variable">
<h3><a id="[java-lib-deps]">■ &nbsp;&nbsp;[java-lib-deps]</a></h3>
<p>
多个javalib.jar<br/>
$(1):&nbsp;library&nbsp;name&nbsp;list<br/>
$(2):&nbsp;Non-empty&nbsp;if&nbsp;IS_HOST_MODULE<br/>
</p>
</div>
<div class="variable">
<h3><a id="[rot13]">■ &nbsp;&nbsp;[rot13]</a></h3>
<p>
Runrot13onastring<br/>
$(1):thestring.Mustbeoneline.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[streq]">■ &nbsp;&nbsp;[streq]</a></h3>
<p>
Returnstrueif$(1)and$(2)areequal.Returns<br/>
theemptystringiftheyarenotequal.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[normalize-path-list]">■ &nbsp;&nbsp;[normalize-path-list]</a></h3>
<p>
Convert"abc"into"a:b:c"<br/>
</p>
</div>
<div class="variable">
<h3><a id="[word-colon]">■ &nbsp;&nbsp;[word-colon]</a></h3>
<p>
Readthewordoutofacolon-separatedlistofwords.<br/>
Thishasthesamebehaviorasthebuilt-infunction<br/>
$(wordn,str).<br/>
Theindividualwordsmaynotcontainspaces.<br/>
将用":"分隔的字符串转化为词数组<br/>
$(1):1basedindex<br/>
$(2):valueoftheforma:b:c...<br/>
</p>
</div>
<div class="variable">
<h3><a id="[collapse-pairs]">■ &nbsp;&nbsp;[collapse-pairs]</a></h3>
<p>
Convert"a=bc=de=f"into"a=bc=de=f"<br/>
$(1):listtocollapse<br/>
$(2):ifset,separatorword;usually"=",":",or":="<br/>
Defaultsto"="ifnotset.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[uniq-pairs-by-first-component]">■ &nbsp;&nbsp;[uniq-pairs-by-first-component]</a></h3>
<p>
Given&nbsp;a&nbsp;list&nbsp;of&nbsp;pairs,&nbsp;if&nbsp;multiple&nbsp;pairs&nbsp;have&nbsp;the&nbsp;same<br/>
first&nbsp;components,&nbsp;keep&nbsp;only&nbsp;the&nbsp;first&nbsp;pair.<br/>
$(1):&nbsp;list&nbsp;of&nbsp;pairs<br/>
$(2):&nbsp;the&nbsp;separator&nbsp;word,&nbsp;such&nbsp;as&nbsp;":",&nbsp;"=",&nbsp;etc.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[modules-for-tag-list]">■ &nbsp;&nbsp;[modules-for-tag-list]</a></h3>
<p>
Givenalistofpairs,ifmultiplepairshavethesame<br/>
firstcomponents,keeponlythefirstpair.<br/>
$(1):listofpairs<br/>
$(2):theseparatorword,suchas":","=",etc.<br/>
ALL_MODULE_TAGS.eng：out/target/product/find5/system/bin/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="[module-names-for-tag-list]">■ &nbsp;&nbsp;[module-names-for-tag-list]</a></h3>
<p>
Given&nbsp;a&nbsp;list&nbsp;of&nbsp;tags,&nbsp;return&nbsp;the&nbsp;targets&nbsp;that&nbsp;specify<br/>
any&nbsp;of&nbsp;those&nbsp;tags.<br/>
$(1):&nbsp;tag&nbsp;list<br/>
ALL_MODULE_NAME_TAGS.eng:&nbsp;recovery&nbsp;libbmlutils&nbsp;libdedupe&nbsp;utility_dedupe&nbsp;libcrecovery&nbsp;libmmcutils&nbsp;updater&nbsp;libapplypatch&nbsp;applypatch_static&nbsp;su.recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-tagged-modules]">■ &nbsp;&nbsp;[get-tagged-modules]</a></h3>
<p>
Given&nbsp;an&nbsp;accept&nbsp;and&nbsp;reject&nbsp;list,&nbsp;find&nbsp;the&nbsp;matching&nbsp;set&nbsp;of&nbsp;targets.&nbsp;&nbsp;If&nbsp;a&nbsp;target&nbsp;has&nbsp;multiple&nbsp;tags&nbsp;and<br/>
any&nbsp;of&nbsp;them&nbsp;are&nbsp;rejected,&nbsp;the&nbsp;target&nbsp;is&nbsp;rejected.<br/>
Reject&nbsp;overrides&nbsp;accept.<br/>
$(1):&nbsp;list&nbsp;of&nbsp;tags&nbsp;to&nbsp;accept<br/>
$(2):&nbsp;list&nbsp;of&nbsp;tags&nbsp;to&nbsp;reject<br/>
</p>
</div>
<div class="variable">
<h3><a id="[append-path]">■ &nbsp;&nbsp;[append-path]</a></h3>
<p>
Appendaleaftoabasepath.Properlydealswith<br/>
basepathsendingin/.<br/>
$(1):basepath<br/>
$(2):leafpath<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_get-package-overrides]">■ &nbsp;&nbsp;[_get-package-overrides]</a></h3>
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
<div class="variable">
<h3><a id="[get-package-overrides]">■ &nbsp;&nbsp;[get-package-overrides]</a></h3>
<p>
参见_get-package-overrides<br/>
</p>
</div>
<div class="variable">
<h3><a id="[pretty]">■ &nbsp;&nbsp;[pretty]</a></h3>
<p>
Output&nbsp;the&nbsp;command&nbsp;lines,&nbsp;or&nbsp;not<br/>
如果编译时传递了添加了showcommands参数，调用pretty会打印正在执行的命令<br/>
如果没有传递showcommand参数，则不会打印正在执行的命令<br/>
</p>
</div>
<div class="variable">
<h3><a id="[dump-module-variables]">■ &nbsp;&nbsp;[dump-module-variables]</a></h3>
<p>
Dump&nbsp;the&nbsp;variables&nbsp;that&nbsp;are&nbsp;associated&nbsp;with&nbsp;targets<br/>
&nbsp;打印编译时的一些参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-variables]">■ &nbsp;&nbsp;[transform-variables]</a></h3>
<p>
Commands&nbsp;for&nbsp;using&nbsp;sed&nbsp;to&nbsp;replace&nbsp;given&nbsp;variable&nbsp;values<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-d-to-p-args]">■ &nbsp;&nbsp;[transform-d-to-p-args]</a></h3>
<p>
CommandsformungingthedependencyfilesGCCgenerates<br/>
$(1):theinput.dfile<br/>
$(2):theoutput.Pfile<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-d-to-p]">■ &nbsp;&nbsp;[transform-d-to-p]</a></h3>
<p>
参见&nbsp;transform-d-to-p-args&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-l-to-cpp]">■ &nbsp;&nbsp;[transform-l-to-cpp]</a></h3>
<p>
Commandsforrunninglex<br/>
举例：<br/>
ifneq($(strip$(lex_cpps)),)<br/>
$(lex_cpps):$(intermediates)/%$(LOCAL_CPP_EXTENSION):\<br/>
$(TOPDIR)$(LOCAL_PATH)/%.l<br/>
$(transform-l-to-cpp)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-y-to-cpp]">■ &nbsp;&nbsp;[transform-y-to-cpp]</a></h3>
<p>
Commandsforrunningyacc<br/>
Becausetheextensionofc++filescanchange,the<br/>
extensionmustbespecifiedin$1.<br/>
E.g,"$(calltransform-y-to-cpp,.cpp)"<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-renderscripts-to-java-and-bc]">■ &nbsp;&nbsp;[transform-renderscripts-to-java-and-bc]</a></h3>
<p>
CommandstocompileRenderScript<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-aidl-to-java]">■ &nbsp;&nbsp;[transform-aidl-to-java]</a></h3>
<p>
Commandsforrunningaidl<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-logtags-to-java]">■ &nbsp;&nbsp;[transform-logtags-to-java]</a></h3>
<p>
Commandsforrunningjava-event-log-tags.py<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-proto-to-java]">■ &nbsp;&nbsp;[transform-proto-to-java]</a></h3>
<p>
Commandsforrunningprotoctocompile.protointo.java<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-proto-to-cc]">■ &nbsp;&nbsp;[transform-proto-to-cc]</a></h3>
<p>
Commandsforrunningprotoctocompile.protointo.pb.ccand.pb.h<br/>
#<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-cpp-to-o]">■ &nbsp;&nbsp;[transform-cpp-to-o]</a></h3>
<p>
CommandsforrunninggcctocompileaC++file<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-c-or-s-to-o-no-deps]">■ &nbsp;&nbsp;[transform-c-or-s-to-o-no-deps]</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;C&nbsp;file<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-c-to-o-no-deps]">■ &nbsp;&nbsp;[transform-c-to-o-no-deps]</a></h3>
<p>
编译c文件至目标文件,无依赖的编译<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-s-to-o-no-deps]">■ &nbsp;&nbsp;[transform-s-to-o-no-deps]</a></h3>
<p>
编译汇编文件至目标文件，无依赖的编译<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-c-to-o]">■ &nbsp;&nbsp;[transform-c-to-o]</a></h3>
<p>
编译c文件至目标文件<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags&nbsp;编译参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-s-to-o]">■ &nbsp;&nbsp;[transform-s-to-o]</a></h3>
<p>
编译汇编文件至目标文件<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags，编译参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-m-to-o-no-deps]">■ &nbsp;&nbsp;[transform-m-to-o-no-deps]</a></h3>
<p>
CommandsforrunninggcctocompileanObjective-Cfile<br/>
Thisshouldneverhappenfortargetbuildsbutthis<br/>
willerroratbuildtime.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-m-to-o]">■ &nbsp;&nbsp;[transform-m-to-o]</a></h3>
<p>
编译objet&nbsp;c文件至目标文件<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags，编译参数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-cpp-to-o]">■ &nbsp;&nbsp;[transform-host-cpp-to-o]</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;C++&nbsp;file<br/>
编译cpp文件，目标代码将在主机上运行<br/>
#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-c-or-s-to-o-no-deps]">■ &nbsp;&nbsp;[transform-host-c-or-s-to-o-no-deps]</a></h3>
<p>
CommandsforrunninggcctocompileahostCfile<br/>
编译c代码或者汇编代码，目标代码将在主机上运行，无依赖的编译<br/>
#$(1):extraflags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-c-to-o-no-deps]">■ &nbsp;&nbsp;[transform-host-c-to-o-no-deps]</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;C&nbsp;file<br/>
&nbsp;编译c代码，目标代码将在主机上运行，无依赖的编译<br/>
&nbsp;#&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-s-to-o-no-deps]">■ &nbsp;&nbsp;[transform-host-s-to-o-no-deps]</a></h3>
<p>
编译汇编代码，目标代码将在主机上运行，无依赖的编译<br/>
#$(1):extraflags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-c-to-o]">■ &nbsp;&nbsp;[transform-host-c-to-o]</a></h3>
<p>
编译c代码，目标代码将在主机上运行<br/>
#$(1):extraflags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-s-to-o]">■ &nbsp;&nbsp;[transform-host-s-to-o]</a></h3>
<p>
编译汇编代码，目标代码将在主机上运行<br/>
$(1):extraflags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-m-to-o-no-deps]">■ &nbsp;&nbsp;[transform-host-m-to-o-no-deps]</a></h3>
<p>
CommandsforrunninggcctocompileahostObjective-Cfile<br/>
编译objectc代码，目标代码将在主机上运行，无依赖编译<br/>
$(1):extraflags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-m-to-o]">■ &nbsp;&nbsp;[transform-host-m-to-o]</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;compile&nbsp;a&nbsp;host&nbsp;Objective-C&nbsp;file<br/>
&nbsp;编译object&nbsp;c代码，目标代码将在主机上运行，<br/>
&nbsp;$(1):&nbsp;extra&nbsp;flags<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_concat-if-arg2-not-empty]">■ &nbsp;&nbsp;[_concat-if-arg2-not-empty]</a></h3>
<p>
Commandsforrunningar<br/>
</p>
</div>
<div class="variable">
<h3><a id="[split-long-arguments]">■ &nbsp;&nbsp;[split-long-arguments]</a></h3>
<p>
Split&nbsp;long&nbsp;argument&nbsp;list&nbsp;into&nbsp;smaller&nbsp;groups&nbsp;and&nbsp;call&nbsp;the&nbsp;command&nbsp;repeatedly<br/>
Call&nbsp;the&nbsp;command&nbsp;at&nbsp;least&nbsp;once&nbsp;even&nbsp;if&nbsp;there&nbsp;are&nbsp;no&nbsp;arguments,&nbsp;as&nbsp;otherwise<br/>
the&nbsp;output&nbsp;file&nbsp;won't&nbsp;be&nbsp;created.&nbsp;<br/>
$(1):&nbsp;the&nbsp;command&nbsp;without&nbsp;arguments<br/>
$(2):&nbsp;the&nbsp;arguments<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_extract-and-include-single-target-whole-static-lib]">■ &nbsp;&nbsp;[_extract-and-include-single-target-whole-static-lib]</a></h3>
<p>
#&nbsp;$(1):&nbsp;the&nbsp;full&nbsp;path&nbsp;of&nbsp;the&nbsp;source&nbsp;static&nbsp;library.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[extract-and-include-target-whole-static-libs]">■ &nbsp;&nbsp;[extract-and-include-target-whole-static-libs]</a></h3>
<p>
参见_extract-and-include-single-target-whole-static-lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-static-lib]">■ &nbsp;&nbsp;[transform-o-to-static-lib]</a></h3>
<p>
Explicitlydeletethearchivefirstsothatardoesn't<br/>
trytoaddtoanexistingarchive.<br/>
将目标代码打包成静态库<br/>
</p>
</div>
<div class="variable">
<h3><a id="[_extract-and-include-single-host-whole-static-lib]">■ &nbsp;&nbsp;[_extract-and-include-single-host-whole-static-lib]</a></h3>
<p>
Commandsforrunninghostar<br/>
#$(1):thefullpathofthesourcestaticlibrary.<br/>
静态库将在主机上运行<br/>
</p>
</div>
<div class="variable">
<h3><a id="[extract-and-include-host-whole-static-libs]">■ &nbsp;&nbsp;[extract-and-include-host-whole-static-libs]</a></h3>
<p>
参见_extract-and-include-single-host-whole-static-lib<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-static-lib]">■ &nbsp;&nbsp;[transform-host-o-to-static-lib]</a></h3>
<p>
将目标代码打包成在主机上运行的静态库<br/>
静态库将在主机上运行<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-shared-lib-inner]">■ &nbsp;&nbsp;[transform-host-o-to-shared-lib-inner]</a></h3>
<p>
Commandsforrunninggcctolinkasharedlibraryorpackage<br/>
ldjustseemstobesofinickywithcommandorderthatweallow<br/>
ittobeoverridenen-masseseecombo/linux-arm.makeforanexample.<br/>
将目标代码打包成在主机上运行的动态库或者包<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-shared-lib]">■ &nbsp;&nbsp;[transform-host-o-to-shared-lib]</a></h3>
<p>
参见transform-host-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-package]">■ &nbsp;&nbsp;[transform-host-o-to-package]</a></h3>
<p>
参见transform-host-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-shared-lib-inner]">■ &nbsp;&nbsp;[transform-o-to-shared-lib-inner]</a></h3>
<p>
Commandsforrunninggcctolinkasharedlibraryorpackage<br/>
#ldjustseemstobesofinickywithcommandorderthatweallow<br/>
#ittobeoverridenen-masseseecombo/linux-arm.makeforanexample.<br/>
将目标代码打包成在目标机上运行的动态库<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-shared-lib]">■ &nbsp;&nbsp;[transform-o-to-shared-lib]</a></h3>
<p>
参见transform-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-package]">■ &nbsp;&nbsp;[transform-o-to-package]</a></h3>
<p>
参见transform-o-to-shared-lib-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-to-stripped]">■ &nbsp;&nbsp;[transform-to-stripped]</a></h3>
<p>
Commands&nbsp;for&nbsp;filtering&nbsp;a&nbsp;target&nbsp;executable&nbsp;or&nbsp;library<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-executable-inner]">■ &nbsp;&nbsp;[transform-o-to-executable-inner]</a></h3>
<p>
Commandsforrunninggcctolinkanexecutable<br/>
编译成可执行文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-executable]">■ &nbsp;&nbsp;[transform-o-to-executable]</a></h3>
<p>
参见transform-o-to-executable-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-static-executable-inner]">■ &nbsp;&nbsp;[transform-o-to-static-executable-inner]</a></h3>
<p>
Commandsforrunninggcctolinkastaticallylinked<br/>
executable.Inpractice,weonlyusethisonarm,so<br/>
theotherplatformsdon'thavethe<br/>
transform-o-to-static-executabledefined<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-o-to-static-executable]">■ &nbsp;&nbsp;[transform-o-to-static-executable]</a></h3>
<p>
参见transform-o-to-static-executable-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-executable-inner]">■ &nbsp;&nbsp;[transform-host-o-to-executable-inner]</a></h3>
<p>
Commands&nbsp;for&nbsp;running&nbsp;gcc&nbsp;to&nbsp;link&nbsp;a&nbsp;host&nbsp;executable<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-o-to-executable]">■ &nbsp;&nbsp;[transform-host-o-to-executable]</a></h3>
<p>
参见transform-host-o-to-executable-inner<br/>
</p>
</div>
<div class="variable">
<h3><a id="[create-resource-java-files]">■ &nbsp;&nbsp;[create-resource-java-files]</a></h3>
<p>
Commandsforrunningjavactomake.classfiles<br/>
#@echo"Sourceintermediatesdir:$(PRIVATE_SOURCE_INTERMEDIATES_DIR)"<br/>
#@echo"Sourceintermediates:$$(find$(PRIVATE_SOURCE_INTERMEDIATES_DIR)-name'*.java')"<br/>
#ThisrulecreatestheR.javaandManifest.javafiles,bothofwhich<br/>
#arePRODUCT-neutral.Don'tpassPRIVATE_PRODUCT_AAPT_CONFIGtothisinvocation.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[emit-line]">■ &nbsp;&nbsp;[emit-line]</a></h3>
<p>
emit-line,<wordlist>,<outputfile><br/>
</p>
</div>
<div class="variable">
<h3><a id="[dump-words-to-file]">■ &nbsp;&nbsp;[dump-words-to-file]</a></h3>
<p>
dump-words-to-file,<wordlist>,<outputfile><br/>
</p>
</div>
<div class="variable">
<h3><a id="[unzip-jar-files]">■ &nbsp;&nbsp;[unzip-jar-files]</a></h3>
<p>
For&nbsp;a&nbsp;list&nbsp;of&nbsp;jar&nbsp;files,&nbsp;unzip&nbsp;them&nbsp;to&nbsp;a&nbsp;specified&nbsp;directory,<br/>
but&nbsp;make&nbsp;sure&nbsp;that&nbsp;no&nbsp;META-INF&nbsp;files&nbsp;come&nbsp;along&nbsp;for&nbsp;the&nbsp;ride.<br/>
$(1):&nbsp;files&nbsp;to&nbsp;unzip<br/>
$(2):&nbsp;destination&nbsp;directory<br/>
</p>
</div>
<div class="variable">
<h3><a id="[compile-java]">■ &nbsp;&nbsp;[compile-java]</a></h3>
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
<div class="variable">
<h3><a id="[transform-java-to-classes.jar]">■ &nbsp;&nbsp;[transform-java-to-classes.jar]</a></h3>
<p>
将java编译并打包成classes.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-classes.jar-to-emma]">■ &nbsp;&nbsp;[transform-classes.jar-to-emma]</a></h3>
<p>
emma代码覆盖率测试<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-classes.jar-to-dex]">■ &nbsp;&nbsp;[transform-classes.jar-to-dex]</a></h3>
<p>
将classes.jar转化为dex<br/>
</p>
</div>
<div class="variable">
<h3><a id="[create-empty-package]">■ &nbsp;&nbsp;[create-empty-package]</a></h3>
<p>
Create&nbsp;a&nbsp;mostly-empty&nbsp;.jar&nbsp;file&nbsp;that&nbsp;we'll&nbsp;add&nbsp;to&nbsp;later.<br/>
The&nbsp;MacOS&nbsp;jar&nbsp;tool&nbsp;doesn't&nbsp;like&nbsp;creating&nbsp;empty&nbsp;jar&nbsp;files,<br/>
so&nbsp;we&nbsp;need&nbsp;to&nbsp;give&nbsp;it&nbsp;something.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-assets-to-package]">■ &nbsp;&nbsp;[add-assets-to-package]</a></h3>
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
<div class="variable">
<h3><a id="[add-jni-shared-libs-to-package]">■ &nbsp;&nbsp;[add-jni-shared-libs-to-package]</a></h3>
<p>
将jni&nbsp;动态库打包到package<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-dex-to-package]">■ &nbsp;&nbsp;[add-dex-to-package]</a></h3>
<p>
将dex打包到package<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-java-resources-to-package]">■ &nbsp;&nbsp;[add-java-resources-to-package]</a></h3>
<p>
Add&nbsp;java&nbsp;resources&nbsp;added&nbsp;by&nbsp;the&nbsp;current&nbsp;module.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-carried-java-resources]">■ &nbsp;&nbsp;[add-carried-java-resources]</a></h3>
<p>
AddjavaresourcescarriedbystaticJavalibraries.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[sign-package]">■ &nbsp;&nbsp;[sign-package]</a></h3>
<p>
Sign&nbsp;a&nbsp;package&nbsp;using&nbsp;the&nbsp;specified&nbsp;key/cert.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[align-package]">■ &nbsp;&nbsp;[align-package]</a></h3>
<p>
Align&nbsp;STORED&nbsp;entries&nbsp;of&nbsp;a&nbsp;package&nbsp;on&nbsp;4-byte&nbsp;boundaries<br/>
to&nbsp;make&nbsp;them&nbsp;easier&nbsp;to&nbsp;mmap.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[install-dex-debug]">■ &nbsp;&nbsp;[install-dex-debug]</a></h3>
<p>
安装debug版本的dex文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-java-to-package]">■ &nbsp;&nbsp;[transform-host-java-to-package]</a></h3>
<p>
TODO(joeo):Ifwecaneverupgradetopost3.81makeandgetthe<br/>
newprebuiltrulestowork,weshouldchangethistocopythe<br/>
resourcestotheoutdirectoryandthencopytheresources.<br/>
Note:weintentionallydon'tcleanPRIVATE_CLASS_INTERMEDIATES_DIR<br/>
intransform-java-to-classesforthesakeofvm-tests.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[obfuscate-jar]">■ &nbsp;&nbsp;[obfuscate-jar]</a></h3>
<p>
Obfuscateajarfile<br/>
PRIVATE_KEEP_FILEisafilecontainingalistofclasses<br/>
PRIVATE_INTERMEDIATES_DIRisadirectorywecanusefortemporaryfiles<br/>
Themoduleusingthismustdependon<br/>
$(HOST_OUT_JAVA_LIBRARIES)/proguard-4.0.1.jar<br/>
混淆代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-one-header]">■ &nbsp;&nbsp;[copy-one-header]</a></h3>
<p>
Commandsforcopyingfiles<br/>
Definearuletocopyaheader.Usedvia$(eval)bycopy_headers.make.<br/>
$(1):sourceheader<br/>
$(2):destinationheader<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-one-file]">■ &nbsp;&nbsp;[copy-one-file]</a></h3>
<p>
Definearuletocopyafile.Forusevia$(eval).<br/>
$(1):sourcefile<br/>
$(2):destinationfile<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-many-files]">■ &nbsp;&nbsp;[copy-many-files]</a></h3>
<p>
Copiesmanyfiles.<br/>
$(1):Thefilestocopy.Eachentryisa':'separatedsrc:dstpair<br/>
Evaluatestothelistofthedstfiles(iesuitableforadependencylist)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-xml-file-checked]">■ &nbsp;&nbsp;[copy-xml-file-checked]</a></h3>
<p>
Copythefileonlyifit'sawell-formedxmlfile.Forusevia$(eval).<br/>
$(1):sourcefile<br/>
$(2):destinationfile,mustendwith.xml.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-target]">■ &nbsp;&nbsp;[copy-file-to-target]</a></h3>
<p>
#&nbsp;The&nbsp;-t&nbsp;option&nbsp;to&nbsp;acp&nbsp;and&nbsp;the&nbsp;-p&nbsp;option&nbsp;to&nbsp;cp&nbsp;is<br/>
#&nbsp;required&nbsp;for&nbsp;OSX.&nbsp;&nbsp;OSX&nbsp;has&nbsp;a&nbsp;ridiculous&nbsp;restriction<br/>
#&nbsp;where&nbsp;it's&nbsp;an&nbsp;error&nbsp;for&nbsp;a&nbsp;.a&nbsp;file's&nbsp;modification&nbsp;time<br/>
#&nbsp;to&nbsp;disagree&nbsp;with&nbsp;an&nbsp;internal&nbsp;timestamp,&nbsp;and&nbsp;this<br/>
#&nbsp;macro&nbsp;is&nbsp;used&nbsp;to&nbsp;install&nbsp;.a&nbsp;files&nbsp;(among&nbsp;other&nbsp;things).<br/>
#&nbsp;Copy&nbsp;a&nbsp;single&nbsp;file&nbsp;from&nbsp;one&nbsp;place&nbsp;to&nbsp;another,<br/>
#&nbsp;preserving&nbsp;permissions&nbsp;and&nbsp;overwriting&nbsp;any&nbsp;existing<br/>
#&nbsp;file.<br/>
#&nbsp;We&nbsp;disable&nbsp;the&nbsp;"-t"&nbsp;option&nbsp;for&nbsp;acp&nbsp;cannot&nbsp;handle<br/>
#&nbsp;high&nbsp;resolution&nbsp;timestamp&nbsp;correctly&nbsp;on&nbsp;file&nbsp;systems&nbsp;like&nbsp;ext4.<br/>
#&nbsp;Therefore&nbsp;copy-file-to-target&nbsp;is&nbsp;the&nbsp;same&nbsp;as&nbsp;copy-file-to-new-target.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-target-with-cp]">■ &nbsp;&nbsp;[copy-file-to-target-with-cp]</a></h3>
<p>
#&nbsp;The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;local<br/>
#&nbsp;cp&nbsp;command&nbsp;instead&nbsp;of&nbsp;acp.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-target-with-zipalign]">■ &nbsp;&nbsp;[copy-file-to-target-with-zipalign]</a></h3>
<p>
#&nbsp;The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;zipalign&nbsp;tool&nbsp;to&nbsp;do&nbsp;so.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-target-strip-comments]">■ &nbsp;&nbsp;[copy-file-to-target-strip-comments]</a></h3>
<p>
#&nbsp;The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;strip&nbsp;out&nbsp;"#&nbsp;comment"-style<br/>
#&nbsp;comments&nbsp;(for&nbsp;config&nbsp;files&nbsp;and&nbsp;such).<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-new-target]">■ &nbsp;&nbsp;[copy-file-to-new-target]</a></h3>
<p>
#&nbsp;The&nbsp;same&nbsp;as&nbsp;copy-file-to-target,&nbsp;but&nbsp;don't&nbsp;preserve<br/>
#&nbsp;the&nbsp;old&nbsp;modification&nbsp;time.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-file-to-new-target-with-cp]">■ &nbsp;&nbsp;[copy-file-to-new-target-with-cp]</a></h3>
<p>
#&nbsp;The&nbsp;same&nbsp;as&nbsp;copy-file-to-new-target,&nbsp;but&nbsp;use&nbsp;the&nbsp;local<br/>
#&nbsp;cp&nbsp;command&nbsp;instead&nbsp;of&nbsp;acp.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-prebuilt-to-target]">■ &nbsp;&nbsp;[transform-prebuilt-to-target]</a></h3>
<p>
#&nbsp;Copy&nbsp;a&nbsp;prebuilt&nbsp;file&nbsp;to&nbsp;a&nbsp;target&nbsp;location.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-prebuilt-to-target-with-zipalign]">■ &nbsp;&nbsp;[transform-prebuilt-to-target-with-zipalign]</a></h3>
<p>
Copyaprebuiltfiletoatargetlocation,usingzipalignonit.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-prebuilt-to-target-strip-comments]">■ &nbsp;&nbsp;[transform-prebuilt-to-target-strip-comments]</a></h3>
<p>
#&nbsp;Copy&nbsp;a&nbsp;prebuilt&nbsp;file&nbsp;to&nbsp;a&nbsp;target&nbsp;location,&nbsp;stripping&nbsp;"#&nbsp;comment"&nbsp;comments.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-host-ranlib-copy-hack]">■ &nbsp;&nbsp;[transform-host-ranlib-copy-hack]</a></h3>
<p>
Onsomeplatforms(MacOS),aftercopyingastatic<br/>
library,ranlibmustberuntoupdateaninternal<br/>
timestamp!?!?!<br/>
</p>
</div>
<div class="variable">
<h3><a id="[proguard-disabled-commands]">■ &nbsp;&nbsp;[proguard-disabled-commands]</a></h3>
<p>
Commands&nbsp;to&nbsp;call&nbsp;Proguard<br/>
Command&nbsp;to&nbsp;copy&nbsp;the&nbsp;file&nbsp;with&nbsp;acp,&nbsp;if&nbsp;proguard&nbsp;is&nbsp;disabled.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[proguard-enabled-commands]">■ &nbsp;&nbsp;[proguard-enabled-commands]</a></h3>
<p>
Command&nbsp;to&nbsp;copy&nbsp;the&nbsp;file&nbsp;with&nbsp;acp,&nbsp;if&nbsp;proguard&nbsp;is&nbsp;disabled.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-instrumentation-proguard-flags]">■ &nbsp;&nbsp;[get-instrumentation-proguard-flags]</a></h3>
<p>
Figure&nbsp;out&nbsp;the&nbsp;proguard&nbsp;dictionary&nbsp;file&nbsp;of&nbsp;the&nbsp;module&nbsp;that&nbsp;is&nbsp;instrumentationed&nbsp;for.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-jar-to-proguard]">■ &nbsp;&nbsp;[transform-jar-to-proguard]</a></h3>
<p>
将jar混淆<br/>
</p>
</div>
<div class="variable">
<h3><a id="[transform-generated-source]">■ &nbsp;&nbsp;[transform-generated-source]</a></h3>
<p>
Stuffsourcegeneratedfromone-offtools<br/>
</p>
</div>
<div class="variable">
<h3><a id="[image-size-from-data-size]">■ &nbsp;&nbsp;[image-size-from-data-size]</a></h3>
<p>
Convert&nbsp;a&nbsp;partition&nbsp;data&nbsp;size&nbsp;(eg,&nbsp;as&nbsp;reported&nbsp;in&nbsp;/proc/mtd)&nbsp;to&nbsp;the<br/>
size&nbsp;of&nbsp;the&nbsp;image&nbsp;used&nbsp;to&nbsp;flash&nbsp;that&nbsp;partition&nbsp;(which&nbsp;includes&nbsp;a<br/>
spare&nbsp;area&nbsp;for&nbsp;each&nbsp;page).<br/>
$(1):&nbsp;the&nbsp;partition&nbsp;data&nbsp;size<br/>
</p>
</div>
<div class="variable">
<h3><a id="[assert-max-file-size]">■ &nbsp;&nbsp;[assert-max-file-size]</a></h3>
<p>
$(1):&nbsp;The&nbsp;file(s)&nbsp;to&nbsp;check&nbsp;(often&nbsp;$@)<br/>
$(2):&nbsp;The&nbsp;maximum&nbsp;total&nbsp;image&nbsp;size,&nbsp;in&nbsp;decimal&nbsp;bytes<br/>
$(3):&nbsp;the&nbsp;type&nbsp;of&nbsp;filesystem&nbsp;"yaffs"&nbsp;or&nbsp;"raw"<br/>
#&nbsp;If&nbsp;$(2)&nbsp;is&nbsp;empty,&nbsp;evaluates&nbsp;to&nbsp;"true"<br/>
#<br/>
#&nbsp;Reserve&nbsp;bad&nbsp;blocks.Make&nbsp;sure&nbsp;that&nbsp;MAX(1%&nbsp;of&nbsp;partition&nbsp;size,&nbsp;2&nbsp;blocks)<br/>
#&nbsp;is&nbsp;left&nbsp;over&nbsp;after&nbsp;the&nbsp;image&nbsp;has&nbsp;been&nbsp;flashed.Round&nbsp;the&nbsp;1%&nbsp;up&nbsp;to&nbsp;the<br/>
#&nbsp;next&nbsp;whole&nbsp;flash&nbsp;block&nbsp;size.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[assert-max-image-size]">■ &nbsp;&nbsp;[assert-max-image-size]</a></h3>
<p>
Like&nbsp;assert-max-file-size,&nbsp;but&nbsp;the&nbsp;second&nbsp;argument&nbsp;is&nbsp;a&nbsp;partition<br/>
size,&nbsp;which&nbsp;we'll&nbsp;convert&nbsp;to&nbsp;a&nbsp;max&nbsp;image&nbsp;size&nbsp;before&nbsp;checking&nbsp;it<br/>
against&nbsp;the&nbsp;files.&nbsp;<br/>
$(1):&nbsp;The&nbsp;file(s)&nbsp;to&nbsp;check&nbsp;(often&nbsp;$@)<br/>
$(2):&nbsp;The&nbsp;partition&nbsp;size.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-radio-file]">■ &nbsp;&nbsp;[add-radio-file]</a></h3>
<p>
Definedevice-specificradiofiles<br/>
#Copyaradioimagefiletotheoutputlocation,andadditto<br/>
#INSTALLED_RADIOIMAGE_TARGET.<br/>
#$(1):filename<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-radio-file-internal]">■ &nbsp;&nbsp;[add-radio-file-internal]</a></h3>
<p>
参见add-radio-file<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-radio-file-checked]">■ &nbsp;&nbsp;[add-radio-file-checked]</a></h3>
<p>
#&nbsp;Version&nbsp;of&nbsp;add-radio-file&nbsp;that&nbsp;also&nbsp;arranges&nbsp;for&nbsp;the&nbsp;version&nbsp;of&nbsp;the<br/>
#&nbsp;file&nbsp;to&nbsp;be&nbsp;checked&nbsp;against&nbsp;the&nbsp;contents&nbsp;of<br/>
#&nbsp;$(TARGET_BOARD_INFO_FILE).<br/>
#&nbsp;$(1):&nbsp;filename<br/>
#&nbsp;$(2):&nbsp;name&nbsp;of&nbsp;version&nbsp;variable&nbsp;in&nbsp;board-info&nbsp;(eg,&nbsp;"version-baseband")<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-radio-file-checked-internal]">■ &nbsp;&nbsp;[add-radio-file-checked-internal]</a></h3>
<p>
参见add-radio-file-internal<br/>
</p>
</div>
<div class="variable">
<h3><a id="[inherit-package]">■ &nbsp;&nbsp;[inherit-package]</a></h3>
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
<div class="variable">
<h3><a id="[inherit-package-internal]">■ &nbsp;&nbsp;[inherit-package-internal]</a></h3>
<p>
参见inherit-package<br/>
</p>
</div>
<div class="variable">
<h3><a id="[set-inherited-package-variables]">■ &nbsp;&nbsp;[set-inherited-package-variables]</a></h3>
<p>
To&nbsp;be&nbsp;used&nbsp;with&nbsp;inherit-package&nbsp;above<br/>
Evalutes&nbsp;to&nbsp;true&nbsp;if&nbsp;the&nbsp;package&nbsp;was&nbsp;overridden<br/>
</p>
</div>
<div class="variable">
<h3><a id="[keep-or-override]">■ &nbsp;&nbsp;[keep-or-override]</a></h3>
<p>
参见inherit-package<br/>
</p>
</div>
<div class="variable">
<h3><a id="[set-inherited-package-variables-internal]">■ &nbsp;&nbsp;[set-inherited-package-variables-internal]</a></h3>
<p>
参见keep-or-override<br/>
</p>
</div>
<div class="variable">
<h3><a id="[expand-required-modules]">■ &nbsp;&nbsp;[expand-required-modules]</a></h3>
<p>
ExpandamodulenamelistwithREQUIREDmodules<br/>
$(1):Thevariablenamethatholdstheinitialmodulenamelist.<br/>
thevariablewillbemodifiedtoholdtheexpandedresults.<br/>
$(2):Theinitialmodulenamelist.<br/>
Returnsemptystring(maybewithsomewhitespaces).<br/>
</p>
</div>
<div class="variable">
<h3><a id="[check-api]">■ &nbsp;&nbsp;[check-api]</a></h3>
<p>
APICheck<br/>
#evalthistodefinearulethatrunsapicheck.<br/>
#<br/>
#Args:<br/>
#$(1)target<br/>
#$(2)stableapifile<br/>
#$(3)apifiletobetested<br/>
#$(4)argumentsforapicheck<br/>
#$(5)commandtorunifapicheckfailed<br/>
#$(6)targetdependentonthisapicheck<br/>
#$(7)additionaldependencies<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
