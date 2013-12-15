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
<h3>build/core/droiddoc.mk</h3>
<p>
生成文档用的makefile，对应变量BUILD_DROIDDOC<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_src_files">full_src_files</a></h3>
<p>
全部源代码<br/>
full_src_files&nbsp;:=&nbsp;$(patsubst&nbsp;%,$(LOCAL_PATH)/%,$(LOCAL_SRC_FILES))<br/>
</p>
</div>
<div class="variable">
<h3><a id="out_dir">out_dir</a></h3>
<p>
out_dir&nbsp;:=&nbsp;$(OUT_DOCS)/$(LOCAL_MODULE)<br/>
示例：out/target/common/docs/doc-comment-check<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_target">full_target</a></h3>
<p>
full_target&nbsp;:=&nbsp;$(call&nbsp;doc-timestamp-for,$(LOCAL_MODULE))<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_SOURCE_PATH">LOCAL_DROIDDOC_SOURCE_PATH</a></h3>
<p>
ifeq&nbsp;($(LOCAL_DROIDDOC_SOURCE_PATH),)<br/>
LOCAL_DROIDDOC_SOURCE_PATH&nbsp;:=&nbsp;$(LOCAL_PATH)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR">LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR</a></h3>
<p>
ifeq&nbsp;($(LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR),)<br/>
LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR&nbsp;:=&nbsp;$(SRC_DROIDDOC_DIR)/$(LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR)<br/>
endif<br/>
示例：frameworks/base/Android.mk:591:LOCAL_DROIDDOC_CUSTOM_TEMPLATE_DIR:=build/tools/droiddoc/templates-sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_ASSET_DIR">LOCAL_DROIDDOC_ASSET_DIR</a></h3>
<p>
ifeq&nbsp;($(LOCAL_DROIDDOC_ASSET_DIR),)<br/>
LOCAL_DROIDDOC_ASSET_DIR&nbsp;:=&nbsp;assets<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DROIDDOC_CUSTOM_ASSET_DIR">LOCAL_DROIDDOC_CUSTOM_ASSET_DIR</a></h3>
<p>
ifeq&nbsp;($(LOCAL_DROIDDOC_CUSTOM_ASSET_DIR),)<br/>
LOCAL_DROIDDOC_CUSTOM_ASSET_DIR&nbsp;:=&nbsp;assets<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_JAVA_LIBRARIES">LOCAL_JAVA_LIBRARIES</a></h3>
<p>
ifneq&nbsp;($(LOCAL_SDK_VERSION),)<br/>
&nbsp;&nbsp;ifeq&nbsp;($(LOCAL_SDK_VERSION)$(TARGET_BUILD_APPS),current)<br/>
&nbsp;#&nbsp;Use&nbsp;android_stubs_current&nbsp;if&nbsp;LOCAL_SDK_VERSION&nbsp;is&nbsp;current&nbsp;and&nbsp;no&nbsp;TARGET_BUILD_APPS.<br/>
&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;android_stubs_current&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
&nbsp;&nbsp;else<br/>
&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;sdk_v$(LOCAL_SDK_VERSION)&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
&nbsp;&nbsp;endif<br/>
else<br/>
&nbsp;&nbsp;LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;core&nbsp;ext&nbsp;framework&nbsp;$(LOCAL_JAVA_LIBRARIES)<br/>
endif&nbsp;&nbsp;#&nbsp;LOCAL_SDK_VERSION<br/>
LOCAL_JAVA_LIBRARIES&nbsp;:=&nbsp;$(sort&nbsp;$(LOCAL_JAVA_LIBRARIES))<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_java_libs">full_java_libs</a></h3>
<p>
full_java_libs&nbsp;:=&nbsp;$(call&nbsp;java-lib-files,$(LOCAL_JAVA_LIBRARIES),$(LOCAL_IS_HOST_MODULE))<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_java_lib_deps">full_java_lib_deps</a></h3>
<p>
full_java_lib_deps&nbsp;:=&nbsp;$(call&nbsp;java-lib-deps,$(LOCAL_JAVA_LIBRARIES),$(LOCAL_IS_HOST_MODULE))<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(LOCAL_MODULE)-docs">Target:&nbsp;&nbsp;$(LOCAL_MODULE)-docs</a></h3>
<p>
生成某个模块的文档<br/>
</p>
</div>
<div class="variable">
<h3><a id="out_zip">out_zip</a></h3>
<p>
out_zip&nbsp;:=&nbsp;$(OUT_DOCS)/$(LOCAL_MODULE)-docs.zip<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(out_zip)]">Target:&nbsp;&nbsp;$(out_zip)]</a></h3>
<p>
生成本模块文档zip包<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
