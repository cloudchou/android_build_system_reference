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

<div class="">
<h3><a id="">Target:&nbsp;&nbsp;</a></h3>
<p>
</p>
</div>
<div class="function">
<h3><a id="__this_file">Function:&nbsp;&nbsp;__this_file</a></h3>
<p>
定于了设备变量列表的变量以及设备相关函数，<br/>
</p>
</div>
<div class="variable">
<h3><a id="_device_var_list">_device_var_list</a></h3>
<p>
设备变量列表<br/>
_device_var_list&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DEVICE_NAME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DEVICE_BOARD&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DEVICE_REGION<br/>
</p>
</div>
<div class="function">
<h3><a id="dump-device">Function:&nbsp;&nbsp;dump-device</a></h3>
<p>
打印设备变量<br/>
$1&nbsp;设备名字<br/>
</p>
</div>
<div class="function">
<h3><a id="dump-devices">Function:&nbsp;&nbsp;dump-devices</a></h3>
<p>
打印所有设备的设备变量&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="inherit-device">Function:&nbsp;&nbsp;inherit-device</a></h3>
<p>
继承设备<br/>
$(1)&nbsp;device&nbsp;to&nbsp;inherit<br/>
</p>
</div>
<div class="function">
<h3><a id="import-devices">Function:&nbsp;&nbsp;import-devices</a></h3>
<p>
导入设备变量<br/>
&nbsp;&nbsp;&nbsp;$(1):&nbsp;device&nbsp;makefile&nbsp;list<br/>
</p>
</div>
<div class="function">
<h3><a id="resolve-short-device-name">Function:&nbsp;&nbsp;resolve-short-device-name</a></h3>
<p>
获取设备的名字<br/>
$(1):&nbsp;short&nbsp;device&nbsp;name&nbsp;like&nbsp;"sooner"<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
