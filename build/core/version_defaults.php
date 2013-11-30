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
<h3>build/core/version_defaults.mk</h3>
<p>
Handle&nbsp;various&nbsp;build&nbsp;version&nbsp;information.<br/>
Guarantees&nbsp;that&nbsp;the&nbsp;following&nbsp;are&nbsp;defined:<br/>
PLATFORM_VERSION<br/>
PLATFORM_SDK_VERSION<br/>
PLATFORM_VERSION_CODENAME<br/>
DEFAULT_APP_TARGET_SDK<br/>
BUILD_ID<br/>
BUILD_NUMBER&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_BUILD_ID_MAKEFILE">■ &nbsp;&nbsp;INTERNAL_BUILD_ID_MAKEFILE</a></h3>
<p>
Look&nbsp;for&nbsp;an&nbsp;optional&nbsp;file&nbsp;containing&nbsp;overrides&nbsp;of&nbsp;the&nbsp;defaults,<br/>
but&nbsp;don't&nbsp;cry&nbsp;if&nbsp;we&nbsp;don't&nbsp;find&nbsp;it.&nbsp;&nbsp;We&nbsp;could&nbsp;just&nbsp;use&nbsp;-include,&nbsp;but<br/>
the&nbsp;build.prop&nbsp;target&nbsp;also&nbsp;wants&nbsp;INTERNAL_BUILD_ID_MAKEFILE&nbsp;to&nbsp;be&nbsp;set<br/>
if&nbsp;the&nbsp;file&nbsp;exists.<br/>
INTERNAL_BUILD_ID_MAKEFILE&nbsp;:=&nbsp;$(wildcard&nbsp;$(BUILD_SYSTEM)/build_id.mk)<br/>
ifneq&nbsp;""&nbsp;"$(INTERNAL_BUILD_ID_MAKEFILE)"<br/>
&nbsp;include&nbsp;$(INTERNAL_BUILD_ID_MAKEFILE)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="PLATFORM_VERSION">■ &nbsp;&nbsp;PLATFORM_VERSION</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(PLATFORM_VERSION)"<br/>
&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;canonical&nbsp;definition&nbsp;of&nbsp;the&nbsp;platform&nbsp;version<br/>
&nbsp;&nbsp;&nbsp;which&nbsp;is&nbsp;the&nbsp;version&nbsp;that&nbsp;we&nbsp;reveal&nbsp;to&nbsp;the&nbsp;end&nbsp;user.<br/>
&nbsp;&nbsp;&nbsp;Update&nbsp;this&nbsp;value&nbsp;when&nbsp;the&nbsp;platform&nbsp;version&nbsp;changes&nbsp;(rather<br/>
&nbsp;&nbsp;&nbsp;than&nbsp;overriding&nbsp;it&nbsp;somewhere&nbsp;else).&nbsp;&nbsp;Can&nbsp;be&nbsp;an&nbsp;arbitrary&nbsp;string.<br/>
&nbsp;&nbsp;PLATFORM_VERSION&nbsp;:=&nbsp;4.2.2<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PLATFORM_SDK_VERSION">■ &nbsp;&nbsp;PLATFORM_SDK_VERSION</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(PLATFORM_SDK_VERSION)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;canonical&nbsp;definition&nbsp;of&nbsp;the&nbsp;SDK&nbsp;version,&nbsp;which&nbsp;defines<br/>
&nbsp;&nbsp;&nbsp;&nbsp;the&nbsp;set&nbsp;of&nbsp;APIs&nbsp;and&nbsp;functionality&nbsp;available&nbsp;in&nbsp;the&nbsp;platform.&nbsp;&nbsp;It<br/>
&nbsp;&nbsp;&nbsp;&nbsp;is&nbsp;a&nbsp;single&nbsp;integer&nbsp;that&nbsp;increases&nbsp;monotonically&nbsp;as&nbsp;updates&nbsp;to<br/>
&nbsp;&nbsp;&nbsp;&nbsp;the&nbsp;SDK&nbsp;are&nbsp;released.&nbsp;&nbsp;It&nbsp;should&nbsp;only&nbsp;be&nbsp;incremented&nbsp;when&nbsp;the&nbsp;APIs&nbsp;for<br/>
&nbsp;&nbsp;&nbsp;&nbsp;the&nbsp;new&nbsp;release&nbsp;are&nbsp;frozen&nbsp;(so&nbsp;that&nbsp;developers&nbsp;don't&nbsp;write&nbsp;apps&nbsp;against<br/>
&nbsp;&nbsp;&nbsp;&nbsp;intermediate&nbsp;builds).&nbsp;&nbsp;During&nbsp;development,&nbsp;this&nbsp;number&nbsp;remains&nbsp;at&nbsp;the<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SDK&nbsp;version&nbsp;the&nbsp;branch&nbsp;is&nbsp;based&nbsp;on&nbsp;and&nbsp;PLATFORM_VERSION_CODENAME&nbsp;holds<br/>
&nbsp;&nbsp;&nbsp;&nbsp;the&nbsp;code-name&nbsp;of&nbsp;the&nbsp;new&nbsp;development&nbsp;work.<br/>
&nbsp;&nbsp;PLATFORM_SDK_VERSION&nbsp;:=&nbsp;17<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="PLATFORM_VERSION_CODENAME">■ &nbsp;&nbsp;PLATFORM_VERSION_CODENAME</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(PLATFORM_VERSION_CODENAME)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;current&nbsp;development&nbsp;code-name,&nbsp;if&nbsp;the&nbsp;build&nbsp;is&nbsp;not&nbsp;a&nbsp;final<br/>
&nbsp;&nbsp;&nbsp;&nbsp;release&nbsp;build.&nbsp;&nbsp;If&nbsp;this&nbsp;is&nbsp;a&nbsp;final&nbsp;release&nbsp;build,&nbsp;it&nbsp;is&nbsp;simply&nbsp;"REL".<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PLATFORM_VERSION_CODENAME&nbsp;:=&nbsp;REL<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEFAULT_APP_TARGET_SDK">■ &nbsp;&nbsp;DEFAULT_APP_TARGET_SDK</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(DEFAULT_APP_TARGET_SDK)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;default&nbsp;minSdkVersion&nbsp;and&nbsp;targetSdkVersion&nbsp;to&nbsp;use&nbsp;for<br/>
&nbsp;&nbsp;&nbsp;&nbsp;all&nbsp;.apks&nbsp;created&nbsp;by&nbsp;the&nbsp;build&nbsp;system.&nbsp;&nbsp;It&nbsp;can&nbsp;be&nbsp;overridden&nbsp;by&nbsp;explicitly<br/>
&nbsp;&nbsp;&nbsp;&nbsp;setting&nbsp;these&nbsp;in&nbsp;the&nbsp;.apk's&nbsp;AndroidManifest.xml.&nbsp;&nbsp;It&nbsp;is&nbsp;either&nbsp;the&nbsp;code<br/>
&nbsp;&nbsp;&nbsp;&nbsp;name&nbsp;of&nbsp;the&nbsp;development&nbsp;build&nbsp;or,&nbsp;if&nbsp;this&nbsp;is&nbsp;a&nbsp;release&nbsp;build,&nbsp;the&nbsp;official<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SDK&nbsp;version&nbsp;of&nbsp;this&nbsp;release.<br/>
&nbsp;&nbsp;ifeq&nbsp;"REL"&nbsp;"$(PLATFORM_VERSION_CODENAME)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DEFAULT_APP_TARGET_SDK&nbsp;:=&nbsp;$(PLATFORM_SDK_VERSION)<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DEFAULT_APP_TARGET_SDK&nbsp;:=&nbsp;$(PLATFORM_VERSION_CODENAME)<br/>
&nbsp;&nbsp;endif<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_ID">■ &nbsp;&nbsp;BUILD_ID</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(BUILD_ID)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Used&nbsp;to&nbsp;signify&nbsp;special&nbsp;builds.&nbsp;&nbsp;E.g.,&nbsp;branches&nbsp;and/or&nbsp;releases,<br/>
&nbsp;&nbsp;&nbsp;&nbsp;like&nbsp;"M5-RC7".&nbsp;&nbsp;Can&nbsp;be&nbsp;an&nbsp;arbitrary&nbsp;string,&nbsp;but&nbsp;must&nbsp;be&nbsp;a&nbsp;single<br/>
&nbsp;&nbsp;&nbsp;&nbsp;word&nbsp;and&nbsp;a&nbsp;valid&nbsp;file&nbsp;name.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;If&nbsp;there&nbsp;is&nbsp;no&nbsp;BUILD_ID&nbsp;set,&nbsp;make&nbsp;it&nbsp;obvious.<br/>
&nbsp;&nbsp;BUILD_ID&nbsp;:=&nbsp;UNKNOWN<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_NUMBER">■ &nbsp;&nbsp;BUILD_NUMBER</a></h3>
<p>
ifeq&nbsp;""&nbsp;"$(BUILD_NUMBER)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;BUILD_NUMBER&nbsp;should&nbsp;be&nbsp;set&nbsp;to&nbsp;the&nbsp;source&nbsp;control&nbsp;value&nbsp;that<br/>
&nbsp;&nbsp;&nbsp;&nbsp;represents&nbsp;the&nbsp;current&nbsp;state&nbsp;of&nbsp;the&nbsp;source&nbsp;code.&nbsp;&nbsp;E.g.,&nbsp;a<br/>
&nbsp;&nbsp;&nbsp;&nbsp;perforce&nbsp;changelist&nbsp;number&nbsp;or&nbsp;a&nbsp;git&nbsp;hash.&nbsp;&nbsp;Can&nbsp;be&nbsp;an&nbsp;arbitrary&nbsp;string<br/>
&nbsp;&nbsp;&nbsp;&nbsp;(to&nbsp;allow&nbsp;for&nbsp;source&nbsp;control&nbsp;that&nbsp;uses&nbsp;something&nbsp;other&nbsp;than&nbsp;numbers),<br/>
&nbsp;&nbsp;&nbsp;&nbsp;but&nbsp;must&nbsp;be&nbsp;a&nbsp;single&nbsp;word&nbsp;and&nbsp;a&nbsp;valid&nbsp;file&nbsp;name.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;If&nbsp;no&nbsp;BUILD_NUMBER&nbsp;is&nbsp;set,&nbsp;create&nbsp;a&nbsp;useful&nbsp;"I&nbsp;am&nbsp;an&nbsp;engineering&nbsp;build<br/>
&nbsp;&nbsp;&nbsp;&nbsp;from&nbsp;this&nbsp;date/time"&nbsp;value.&nbsp;&nbsp;Make&nbsp;it&nbsp;start&nbsp;with&nbsp;a&nbsp;non-digit&nbsp;so&nbsp;that<br/>
&nbsp;&nbsp;&nbsp;&nbsp;anyone&nbsp;trying&nbsp;to&nbsp;parse&nbsp;it&nbsp;as&nbsp;an&nbsp;integer&nbsp;will&nbsp;probably&nbsp;get&nbsp;"0".<br/>
&nbsp;&nbsp;BUILD_NUMBER&nbsp;:=&nbsp;eng.$(USER).$(shell&nbsp;date&nbsp;+%Y%m%d.%H%M%S)<br/>
endif&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
