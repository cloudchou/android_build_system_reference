<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../../header.php';?> 
<div id="content">

<div class="file">
<h3>build/core/combo/HOST_windows-x86.mk</h3>
<p>
Configuration&nbsp;for&nbsp;builds&nbsp;hosted&nbsp;on&nbsp;windows-x86.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Included&nbsp;by&nbsp;combo/select.mk<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在Windows上的编译配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="TOOLS_PREFIX">TOOLS_PREFIX</a></h3>
<p>
TOOLS_PREFIX&nbsp;:=&nbsp;#prebuilt/windows/host/bin/<br/>
</p>
</div>
<div class="variable">
<h3><a id="TOOLS_EXE_SUFFIX">TOOLS_EXE_SUFFIX</a></h3>
<p>
TOOLS_EXE_SUFFIX&nbsp;:=&nbsp;.exe<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CFLAGS">HOST_GLOBAL_CFLAGS</a></h3>
<p>
HOST_GLOBAL_CFLAGS&nbsp;+=&nbsp;-DUSE_MINGW<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CC">HOST_CC</a></h3>
<p>
HOST_CC&nbsp;:=&nbsp;$(TOOLS_PREFIX)gcc$(TOOLS_EXE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_CXX">HOST_CXX</a></h3>
<p>
HOST_CXX&nbsp;:=&nbsp;$(TOOLS_PREFIX)g++$(TOOLS_EXE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_AR">HOST_AR</a></h3>
<p>
HOST_AR&nbsp;:=&nbsp;$(TOOLS_PREFIX)ar$(TOOLS_EXE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_SHLIB_SUFFIX">HOST_SHLIB_SUFFIX</a></h3>
<p>
HOST_SHLIB_SUFFIX&nbsp;:=&nbsp;.dll<br/>
</p>
</div>
<div class="variable">
<h3><a id="get-file-size">get-file-size</a></h3>
<p>
$(1):&nbsp;The&nbsp;file&nbsp;to&nbsp;check<br/>
TODO:&nbsp;find&nbsp;out&nbsp;what&nbsp;format&nbsp;cygwin's&nbsp;stat(1)&nbsp;uses<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;define&nbsp;get-file-size<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;999999999<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;endef<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
