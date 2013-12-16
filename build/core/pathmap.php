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
<h3>build/core/pathmap.mk</h3>
<p>
A&nbsp;central&nbsp;place&nbsp;to&nbsp;define&nbsp;mappings&nbsp;to&nbsp;paths,&nbsp;to&nbsp;avoid&nbsp;hard-coding&nbsp;them&nbsp;in&nbsp;Android.mk&nbsp;files.<br/>
将一些路径做了一个映射，比如recovery工程的路径为bootable/recovery，为之做了一个映射&nbsp;recovery:bootable/recovery<br/>
这样在引用该路径时不需要硬编码路径名字。可以通过include-path-for引用该路径<br/>
示例：<br/>
include&nbsp;$(call&nbsp;include-path-for&nbsp;bootloader)<br/>
</p>
</div>
<div class="variable">
<h3><a id="pathmap_INCL">pathmap_INCL</a></h3>
<p>
一个map映射，将一些简短的名字映射到include的目录&nbsp;<br/>
pathmap_INCL&nbsp;:=&nbsp;\<br/>
&nbsp;bootloader:bootable/bootloader/legacy/include&nbsp;\<br/>
&nbsp;camera:system/media/camera/include&nbsp;\<br/>
&nbsp;corecg:external/skia/include/core&nbsp;\<br/>
&nbsp;dbus:external/dbus&nbsp;\<br/>
&nbsp;frameworks-base:frameworks/base/include&nbsp;\<br/>
&nbsp;frameworks-native:frameworks/native/include&nbsp;\<br/>
&nbsp;graphics:external/skia/include/core&nbsp;\<br/>
&nbsp;libc:bionic/libc/include&nbsp;\<br/>
&nbsp;libdrm1:frameworks/base/media/libdrm/mobile1/include&nbsp;\<br/>
&nbsp;libhardware:hardware/libhardware/include&nbsp;\<br/>
&nbsp;libhardware_legacy:hardware/libhardware_legacy/include&nbsp;\<br/>
&nbsp;libhost:build/libs/host/include&nbsp;\<br/>
&nbsp;libm:bionic/libm/include&nbsp;\<br/>
&nbsp;libnativehelper:libnativehelper/include&nbsp;\<br/>
&nbsp;libpagemap:system/extras/libpagemap/include&nbsp;\<br/>
&nbsp;libril:hardware/ril/include&nbsp;\<br/>
&nbsp;libstdc++:bionic/libstdc++/include&nbsp;\<br/>
&nbsp;libthread_db:bionic/libthread_db/include&nbsp;\<br/>
&nbsp;mkbootimg:system/core/mkbootimg&nbsp;\<br/>
&nbsp;opengl-tests-includes:frameworks/native/opengl/tests/include&nbsp;\<br/>
&nbsp;recovery:bootable/recovery&nbsp;\<br/>
&nbsp;system-core:system/core/include&nbsp;\<br/>
&nbsp;audio-effects:system/media/audio_effects/include&nbsp;\<br/>
&nbsp;audio-utils:system/media/audio_utils/include&nbsp;\<br/>
&nbsp;wilhelm:frameworks/wilhelm/include&nbsp;\<br/>
&nbsp;wilhelm-ut:frameworks/wilhelm/src/ut&nbsp;\<br/>
&nbsp;speex:external/speex/include<br/>
</p>
</div>
<div class="function">
<h3><a id="include-path-for">Function:&nbsp;&nbsp;include-path-for</a></h3>
<p>
返回请求的模块的头文件目录路径，这个路径是相对于源代码的根路径的&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(1):&nbsp;a&nbsp;list&nbsp;of&nbsp;modules&nbsp;(or&nbsp;other&nbsp;named&nbsp;entities)&nbsp;to&nbsp;find&nbsp;the&nbsp;includes&nbsp;for<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;示例：<br/>
&nbsp;$(call&nbsp;include-path-for&nbsp;bootloader)<br/>
</p>
</div>
<div class="variable">
<h3><a id="JNI_H_INCLUDE">JNI_H_INCLUDE</a></h3>
<p>
Many&nbsp;modules&nbsp;expect&nbsp;to&nbsp;be&nbsp;able&nbsp;to&nbsp;say&nbsp;"#include&nbsp;<jni.h>",<br/>
so&nbsp;make&nbsp;it&nbsp;easy&nbsp;for&nbsp;them&nbsp;to&nbsp;find&nbsp;the&nbsp;correct&nbsp;path.<br/>
&nbsp;&nbsp;JNI_H_INCLUDE&nbsp;:=&nbsp;$(call&nbsp;include-path-for,libnativehelper)/nativehelper<br/>
</p>
</div>
<div class="variable">
<h3><a id="FRAMEWORKS_BASE_SUBDIRS">FRAMEWORKS_BASE_SUBDIRS</a></h3>
<p>
A&nbsp;list&nbsp;of&nbsp;all&nbsp;source&nbsp;roots&nbsp;under&nbsp;frameworks/base,&nbsp;which&nbsp;will&nbsp;be<br/>
built&nbsp;into&nbsp;the&nbsp;android.jar.<br/>
Note&nbsp;-&nbsp;"common"&nbsp;is&nbsp;included&nbsp;here,&nbsp;even&nbsp;though&nbsp;it&nbsp;is&nbsp;also&nbsp;built<br/>
into&nbsp;a&nbsp;static&nbsp;library&nbsp;(android-common)&nbsp;for&nbsp;unbundled&nbsp;use.&nbsp;&nbsp;This<br/>
is&nbsp;so&nbsp;common&nbsp;and&nbsp;the&nbsp;other&nbsp;framework&nbsp;libraries&nbsp;can&nbsp;have&nbsp;mutual&nbsp;<br/>
interdependencies.<br/>
FRAMEWORKS_BASE_SUBDIRS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(addsuffix&nbsp;/java,&nbsp;\<br/>
&nbsp;core&nbsp;\<br/>
&nbsp;graphics&nbsp;\<br/>
&nbsp;location&nbsp;\<br/>
&nbsp;media&nbsp;\<br/>
&nbsp;media/mca/effect&nbsp;\<br/>
&nbsp;media/mca/filterfw&nbsp;\<br/>
&nbsp;media/mca/filterpacks&nbsp;\<br/>
&nbsp;drm&nbsp;\<br/>
&nbsp;opengl&nbsp;\<br/>
&nbsp;sax&nbsp;\<br/>
&nbsp;telephony&nbsp;\<br/>
&nbsp;wifi&nbsp;\<br/>
&nbsp;keystore&nbsp;\<br/>
&nbsp;icu4j&nbsp;\<br/>
&nbsp;voip&nbsp;\<br/>
&nbsp;fmradio&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;)<br/>
</p>
</div>
<div class="variable">
<h3><a id="FRAMEWORKS_BASE_JAVA_SRC_DIRS">FRAMEWORKS_BASE_JAVA_SRC_DIRS</a></h3>
<p>
A&nbsp;version&nbsp;of&nbsp;FRAMEWORKS_BASE_SUBDIRS&nbsp;that&nbsp;is&nbsp;expanded&nbsp;to&nbsp;full&nbsp;paths&nbsp;from<br/>
the&nbsp;root&nbsp;of&nbsp;the&nbsp;tree.&nbsp;&nbsp;This&nbsp;currently&nbsp;needs&nbsp;to&nbsp;be&nbsp;here&nbsp;so&nbsp;that&nbsp;other&nbsp;libraries<br/>
and&nbsp;apps&nbsp;can&nbsp;find&nbsp;the&nbsp;.aidl&nbsp;files&nbsp;in&nbsp;the&nbsp;framework,&nbsp;though&nbsp;we&nbsp;should&nbsp;really<br/>
figure&nbsp;out&nbsp;a&nbsp;better&nbsp;way&nbsp;to&nbsp;do&nbsp;this.&nbsp;&nbsp;&nbsp;<br/>
&nbsp;FRAMEWORKS_BASE_JAVA_SRC_DIRS&nbsp;:=&nbsp;\<br/>
$(addprefix&nbsp;frameworks/base/,$(FRAMEWORKS_BASE_SUBDIRS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="FRAMEWORKS_SUPPORT_SUBDIRS">FRAMEWORKS_SUPPORT_SUBDIRS</a></h3>
<p>
A&nbsp;list&nbsp;of&nbsp;all&nbsp;source&nbsp;roots&nbsp;under&nbsp;frameworks/support<br/>
FRAMEWORKS_SUPPORT_SUBDIRS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;v4&nbsp;\<br/>
v13&nbsp;\&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="FRAMEWORKS_SUPPORT_JAVA_SRC_DIRS">FRAMEWORKS_SUPPORT_JAVA_SRC_DIRS</a></h3>
<p>
A&nbsp;version&nbsp;of&nbsp;FRAMEWORKS_SUPPORT_SUBDIRS&nbsp;that&nbsp;is&nbsp;expanded&nbsp;to&nbsp;full&nbsp;paths&nbsp;from<br/>
&nbsp;&nbsp;&nbsp;&nbsp;the&nbsp;root&nbsp;of&nbsp;the&nbsp;tree.<br/>
FRAMEWORKS_SUPPORT_JAVA_SRC_DIRS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(addprefix&nbsp;frameworks/support/,$(FRAMEWORKS_SUPPORT_SUBDIRS))&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
