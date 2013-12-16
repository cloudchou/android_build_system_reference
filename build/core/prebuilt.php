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
<h3>build/core/prebuilt.mk</h3>
<p>
Standard&nbsp;rules&nbsp;for&nbsp;copying&nbsp;files&nbsp;that&nbsp;are&nbsp;prebuilt<br/>
对应编译变量BUILD_PREBUILT<br/>
主要用来拷贝已经编译好的文件<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;bootable/recovery/Android.mk:149:include&nbsp;$(BUILD_PREBUILT)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CERTIFICATE">LOCAL_CERTIFICATE</a></h3>
<p>
签名证书<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
