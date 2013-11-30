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
<h3>build/core/raw_executable.mk</h3>
<p>
对应编译变量BUILD_RAW_EXECUTABLE<br/>
编译为可执行文件，不经任何优化，使用objcopy生成<br/>
示例：./external/grub/Android.mk:44:include&nbsp;$(BUILD_RAW_EXECUTABLE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
LOCAL_MODULE_CLASS&nbsp;:=&nbsp;EXECUTABLES<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
LOCAL_MODULE_SUFFIX&nbsp;:=&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FORCE_STATIC_EXECUTABLE">LOCAL_FORCE_STATIC_EXECUTABLE</a></h3>
<p>
LOCAL_FORCE_STATIC_EXECUTABLE&nbsp;:=&nbsp;true<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
