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
<h3>build/core/static_java_library.mk</h3>
<p>
编译生成java库的规则<br/>
对应编译变量：:BUILD_STATIC_JAVA_LIBRARY&nbsp;&nbsp;&nbsp;<br/>
&nbsp;Standard&nbsp;rules&nbsp;for&nbsp;building&nbsp;a&nbsp;"static"&nbsp;java&nbsp;library.<br/>
&nbsp;Static&nbsp;java&nbsp;libraries&nbsp;are&nbsp;not&nbsp;installed,&nbsp;nor&nbsp;listed&nbsp;on&nbsp;any<br/>
&nbsp;classpaths.&nbsp;&nbsp;They&nbsp;can,&nbsp;however,&nbsp;be&nbsp;included&nbsp;wholesale&nbsp;in<br/>
&nbsp;other&nbsp;java&nbsp;modules.&nbsp;<br/>
&nbsp;packages/inputmethods/PinyinIME/lib/Android.mk:10:include&nbsp;$(BUILD_STATIC_JAVA_LIBRARY)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNINSTALLABLE_MODULE">LOCAL_UNINSTALLABLE_MODULE</a></h3>
<p>
LOCAL_UNINSTALLABLE_MODULE&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_IS_STATIC_JAVA_LIBRARY">LOCAL_IS_STATIC_JAVA_LIBRARY</a></h3>
<p>
LOCAL_IS_STATIC_JAVA_LIBRARY&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAR_EXCLUDE_FILES">LOCAL_JAR_EXCLUDE_FILES</a></h3>
<p>
By&nbsp;default&nbsp;we&nbsp;should&nbsp;remove&nbsp;the&nbsp;R/Manifest&nbsp;classes&nbsp;from&nbsp;a&nbsp;static&nbsp;Java&nbsp;library,<br/>
because&nbsp;they&nbsp;will&nbsp;be&nbsp;regenerated&nbsp;in&nbsp;the&nbsp;app&nbsp;that&nbsp;uses&nbsp;it.<br/>
But&nbsp;if&nbsp;the&nbsp;static&nbsp;Java&nbsp;library&nbsp;will&nbsp;be&nbsp;used&nbsp;by&nbsp;a&nbsp;library,&nbsp;then&nbsp;we&nbsp;may&nbsp;need&nbsp;to<br/>
keep&nbsp;the&nbsp;generated&nbsp;classes&nbsp;with&nbsp;"LOCAL_JAR_EXCLUDE_FILES&nbsp;:=&nbsp;none".<br/>
ifndef&nbsp;LOCAL_JAR_EXCLUDE_FILES<br/>
LOCAL_JAR_EXCLUDE_FILES&nbsp;:=&nbsp;$(ANDROID_RESOURCE_GENERATED_CLASSES)<br/>
endif<br/>
ifeq&nbsp;(none,$(LOCAL_JAR_EXCLUDE_FILES))<br/>
LOCAL_JAR_EXCLUDE_FILES&nbsp;:=<br/>
endif<br/>
endif&nbsp;&nbsp;#&nbsp;all_resources<br/>
endif&nbsp;&nbsp;#&nbsp;LOCAL_RESOURCE_DIR<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MANIFEST_FILE">LOCAL_MANIFEST_FILE</a></h3>
<p>
LOCAL_MANIFEST_FILE&nbsp;:=&nbsp;AndroidManifest.xml<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_RES_VERSION">LOCAL_SDK_RES_VERSION</a></h3>
<p>
LOCAL_SDK_RES_VERSION:=$(strip&nbsp;$(LOCAL_SDK_RES_VERSION))<br/>
ifeq&nbsp;($(LOCAL_SDK_RES_VERSION),)<br/>
&nbsp;LOCAL_SDK_RES_VERSION:=$(LOCAL_SDK_VERSION)<br/>
endif&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
