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
<h3>build/core/host_java_library.mk</h3>
<p>
编译为主机上的java库<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">■ &nbsp;&nbsp;LOCAL_MODULE_CLASS</a></h3>
<p>
LOCAL_MODULE_CLASS&nbsp;:=&nbsp;JAVA_LIBRARIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">■ &nbsp;&nbsp;LOCAL_MODULE_SUFFIX</a></h3>
<p>
LOCAL_MODULE_SUFFIX&nbsp;:=&nbsp;$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_IS_HOST_MODULE">■ &nbsp;&nbsp;LOCAL_IS_HOST_MODULE</a></h3>
<p>
LOCAL_IS_HOST_MODULE&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE_STEM">■ &nbsp;&nbsp;LOCAL_BUILT_MODULE_STEM</a></h3>
<p>
LOCAL_BUILT_MODULE_STEM&nbsp;:=&nbsp;javalib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_INTERMEDIATE_SOURCE_DIR">■ &nbsp;&nbsp;LOCAL_INTERMEDIATE_SOURCE_DIR</a></h3>
<p>
LOCAL_INTERMEDIATE_SOURCE_DIR&nbsp;:=&nbsp;$(intermediates.COMMON)/src<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILD_HOST_DEX">■ &nbsp;&nbsp;LOCAL_BUILD_HOST_DEX</a></h3>
<p>
host的java库也转为dex格式<br/>
&nbsp;示例：<br/>
&nbsp;./libcore/JavaLibrary.mk:137:&nbsp;LOCAL_BUILD_HOST_DEX&nbsp;:=&nbsp;true<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
