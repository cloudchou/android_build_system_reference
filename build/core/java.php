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
<h3>build/core/java.mk</h3>
<p>
被$(BUILD_PACKAGE)，$(BUILD_STATIC_JAVA_LIBRARY)，$(BUILD_JAVA_LIBRARY)等编译方式包含，<br/>
主要用于编译java代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SDK_VERSION">LOCAL_SDK_VERSION</a></h3>
<p>
用于设置当前工程用的android&nbsp;sdk的版本<br/>
示例：<br/>
LOCAL_SDK_VERSION&nbsp;:=&nbsp;9<br/>
:LOCAL_SDK_VERSION&nbsp;:=&nbsp;current<br/>
</p>
</div>
<div class="variable">
<h3><a id="PDK_BUILD_SDK_VERSION">PDK_BUILD_SDK_VERSION</a></h3>
<p>
build/core/pdk_config.mk:148:PDK_BUILD_SDK_VERSION&nbsp;:=&nbsp;$(lastword&nbsp;$(TARGET_AVAILABLE_SDK_VERSIONS))&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_NO_STANDARD_LIBRARIES">LOCAL_NO_STANDARD_LIBRARIES</a></h3>
<p>
表示不使用标准库<br/>
frameworks/base/Android.mk:254:LOCAL_NO_STANDARD_LIBRARIES&nbsp;:=&nbsp;true<br/>
libcore/JavaLibrary.mk:79:LOCAL_NO_STANDARD_LIBRARIES&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BUILD_APPS">TARGET_BUILD_APPS</a></h3>
<p>
build/core/product_config.mk&nbsp;<br/>
TARGET_BUILD_APPS&nbsp;:=&nbsp;$(strip&nbsp;$(subst&nbsp;-,&nbsp;,$(patsubst&nbsp;APP-%,%,$(unbundled_goals))))<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_LIBRARIES">LOCAL_JAVA_LIBRARIES</a></h3>
<p>
ifneq&nbsp;($(LOCAL_SDK_VERSION),)<br/>
&nbsp;&nbsp;&nbsp;.......<br/>
ifeq&nbsp;($(LOCAL_SDK_VERSION)$(TARGET_BUILD_APPS),current)<br/>
&nbsp;&nbsp;#&nbsp;Use&nbsp;android_stubs_current&nbsp;if&nbsp;LOCAL_SDK_VERSION&nbsp;is&nbsp;current&nbsp;and&nbsp;no&nbsp;TARGET_BUILD_APPS.<br/>
&nbsp;&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;android_stubs_current&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
else<br/>
&nbsp;&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;sdk_v$(LOCAL_SDK_VERSION)&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
endif<br/>
&nbsp;&nbsp;&nbsp;.............<br/>
&nbsp;&nbsp;else<br/>
ifneq&nbsp;($(LOCAL_NO_STANDARD_LIBRARIES),true)<br/>
&nbsp;&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;core&nbsp;core-junit&nbsp;ext&nbsp;framework&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
endif<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROGUARD_ENABLED">LOCAL_PROGUARD_ENABLED</a></h3>
<p>
是否启用混淆<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_TARGETS">LOCAL_INTERMEDIATE_TARGETS</a></h3>
<p>
编译的中间结果集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_SOURCE_DIR">LOCAL_INTERMEDIATE_SOURCE_DIR</a></h3>
<p>
编译生成的源代码存放的目录<br/>
LOCAL_INTERMEDIATE_SOURCE_DIR&nbsp;:=&nbsp;$(intermediates.COMMON)/src<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_CC">LOCAL_RENDERSCRIPT_CC</a></h3>
<p>
编译rs,fs用的编译器<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RENDERSCRIPT_INCLUDES">LOCAL_RENDERSCRIPT_INCLUDES</a></h3>
<p>
RenderScript&nbsp;system&nbsp;include&nbsp;path<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).CHECKED">ALL_MODULES.$(LOCAL_MODULE).CHECKED</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).CHECKED&nbsp;:=&nbsp;$(full_classes_compiled_jar)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EMMA_INSTRUMENT">LOCAL_EMMA_INSTRUMENT</a></h3>
<p>
是否使用emmma进行代码覆盖测试<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EMMA_COVERAGE_FILTER">LOCAL_EMMA_COVERAGE_FILTER</a></h3>
<p>
LOCAL_EMMA_COVERAGE_FILTER&nbsp;:=&nbsp;+com.android.emailcommon.*,+com.android.email.*,&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_MODULES.$(LOCAL_MODULE).PROGUARD_ENABLED">ALL_MODULES.$(LOCAL_MODULE).PROGUARD_ENABLED</a></h3>
<p>
ALL_MODULES.$(LOCAL_MODULE).PROGUARD_ENABLED:=$(LOCAL_PROGUARD_ENABLED)<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_FINDBUGS_FILES">ALL_FINDBUGS_FILES</a></h3>
<p>
ALL_FINDBUGS_FILES&nbsp;+=&nbsp;$(findbugs_xml)<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
