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
<h3>build/core/host_native_test.mk</h3>
<p>
A&nbsp;thin&nbsp;wrapper&nbsp;around&nbsp;BUILD_HOST_EXECUTABLE&nbsp;Common&nbsp;flags&nbsp;for&nbsp;host&nbsp;native&nbsp;tests&nbsp;are&nbsp;added.<br/>
本机可执行文件测试程序&nbsp;<br/>
为LOCAL_CFLAGS添加了一些Flag<br/>
也为LOCAL_C_INCLUDES添加了一些头文件目录<br/>
也为LOCAL_STATIC_LIBRARIES添加链接的静态库<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
