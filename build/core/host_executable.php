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
<h3>build/core/host_executable.mk</h3>
<p>
模块包含该makefile，将编译为主机上的可执行文件，对应编译变量BUILD_HOST_EXECUTABLE，<br/>
它包含binary.mk完成编译<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_IS_HOST_MODULE">LOCAL_IS_HOST_MODULE</a></h3>
<p>
如果编译为主机上的可执行文件，需要将LOCAL_IS_HOST_MODULE设置为true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
如果模块没有设置LOCAL_MODULE_CLASS，默认为EXECUTABLES<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
如果模块未设置，默认为$(HOST_EXECUTABLE_SUFFIX)，如果是linux的可执行文件，后缀为空<br/>
，如果是windows上的可执行文件则它为exe<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(LOCAL_BUILT_MODULE)">Target:&nbsp;&nbsp;$(LOCAL_BUILT_MODULE)</a></h3>
<p>
示编译链接后的目标文件(文件路径+文件名),存放在临时目录<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
