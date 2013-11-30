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
<h3>build/core/multi_prebuilt.mk</h3>
<p>
定义多个预编译目标,包括STATIC_LIBRARIES，SHARED_LIBRARIES，EXECUTABLES，JAVA_LIBRARIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_static_libs">■ &nbsp;&nbsp;prebuilt_static_libs</a></h3>
<p>
prebuilt_static_libs&nbsp;:=&nbsp;$(filter&nbsp;%.a,$(LOCAL_PREBUILT_LIBS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_shared_libs">■ &nbsp;&nbsp;prebuilt_shared_libs</a></h3>
<p>
prebuilt_shared_libs&nbsp;:=&nbsp;$(filter-out&nbsp;%.a,$(LOCAL_PREBUILT_LIBS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_executables">■ &nbsp;&nbsp;prebuilt_executables</a></h3>
<p>
prebuilt_executables&nbsp;:=&nbsp;$(LOCAL_PREBUILT_EXECUTABLES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_java_libraries">■ &nbsp;&nbsp;prebuilt_java_libraries</a></h3>
<p>
prebuilt_java_libraries&nbsp;:=&nbsp;$(LOCAL_PREBUILT_JAVA_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_static_java_libraries">■ &nbsp;&nbsp;prebuilt_static_java_libraries</a></h3>
<p>
prebuilt_static_java_libraries&nbsp;:=&nbsp;$(LOCAL_PREBUILT_STATIC_JAVA_LIBRARIES)<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_is_host">■ &nbsp;&nbsp;prebuilt_is_host</a></h3>
<p>
prebuilt_is_host&nbsp;:=&nbsp;$(LOCAL_IS_HOST_MODULE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_module_tags">■ &nbsp;&nbsp;prebuilt_module_tags</a></h3>
<p>
prebuilt_module_tags&nbsp;:=&nbsp;$(LOCAL_MODULE_TAGS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="prebuilt_strip_module">■ &nbsp;&nbsp;prebuilt_strip_module</a></h3>
<p>
prebuilt_strip_module&nbsp;:=&nbsp;$(LOCAL_STRIP_MODULE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="auto-prebuilt-boilerplate">■ &nbsp;&nbsp;auto-prebuilt-boilerplate</a></h3>
<p>
Elements&nbsp;in&nbsp;the&nbsp;file&nbsp;list&nbsp;may&nbsp;be&nbsp;bare&nbsp;filenames,<br/>
&nbsp;or&nbsp;of&nbsp;the&nbsp;form&nbsp;"<modulename>:<filename>".<br/>
&nbsp;If&nbsp;the&nbsp;module&nbsp;name&nbsp;is&nbsp;not&nbsp;specified,&nbsp;the&nbsp;module<br/>
name&nbsp;will&nbsp;be&nbsp;the&nbsp;filename&nbsp;with&nbsp;the&nbsp;suffix&nbsp;removed.<br/>
$(1):&nbsp;file&nbsp;list<br/>
$(2):&nbsp;IS_HOST_MODULE<br/>
$(3):&nbsp;MODULE_CLASS<br/>
$(4):&nbsp;MODULE_TAGS<br/>
$(5):&nbsp;OVERRIDE_BUILT_MODULE_PATH<br/>
$(6):&nbsp;UNINSTALLABLE_MODULE&nbsp;<br/>
$(7):&nbsp;BUILT_MODULE_STEM<br/>
$(8):&nbsp;LOCAL_STRIP_MODULE<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
