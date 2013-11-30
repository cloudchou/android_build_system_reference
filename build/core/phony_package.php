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
<h3>build/core/phony_package.mk</h3>
<p>
生成apk文件的伪目标，只是创建那个目标文件而已<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;对应编译目标&nbsp;&nbsp;&nbsp;&nbsp;BUILD_PHONY_PACKAGE<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;使用示例：<br/>
&nbsp;&nbsp;./system/core/charger/Android.mk:69:include&nbsp;$(BUILD_PHONY_PACKAGE)<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
