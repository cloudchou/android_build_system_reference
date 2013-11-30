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
<h3>build/core/host_shared_library.mk</h3>
<p>
编译为主机上动态链接库<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">■ &nbsp;&nbsp;LOCAL_MODULE_CLASS</a></h3>
<p>
如果没有设置，默认为SHARED_LIBRARIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">■ &nbsp;&nbsp;LOCAL_MODULE_SUFFIX</a></h3>
<p>
如果没有设置，默认为HOST_SHLIB_SUFFIX，如果主机是linux，那么后缀为so,如果主机是windows，后缀默认为dll<br/>
</p>
</div>
<div class="variable">
<h3><a id="OVERRIDE_BUILT_MODULE_PATH">■ &nbsp;&nbsp;OVERRIDE_BUILT_MODULE_PATH</a></h3>
<p>
OVERRIDE_BUILT_MODULE_PATH&nbsp;:=&nbsp;$(HOST_OUT_INTERMEDIATE_LIBRARIES)<br/>
设置为out/host/linux-x86/obj/SHARED_LIBRARIES<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
