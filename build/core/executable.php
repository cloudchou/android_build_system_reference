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
<h3>build/core/executable.mk</h3>
<p>
Standard&nbsp;rules&nbsp;for&nbsp;building&nbsp;an&nbsp;executable&nbsp;file.<br/>
Additional&nbsp;inputs&nbsp;from&nbsp;base_rules.make:<br/>
None.编译为手机上的可执行文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
如果模块没有设置，默认为EXECUTABLES，<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
如果模块没有设置，&nbsp;&nbsp;&nbsp;默认为$(TARGET_EXECUTABLE_SUFFIX)，即为空<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ENABLE_APROF">LOCAL_ENABLE_APROF</a></h3>
<p>
Add&nbsp;profiling&nbsp;libraries&nbsp;if&nbsp;aprof&nbsp;is&nbsp;turned<br/>
aprof&nbsp;is&nbsp;a&nbsp;Valgrind&nbsp;tool&nbsp;for&nbsp;performance&nbsp;profiling&nbsp;designed&nbsp;to&nbsp;help&nbsp;developers&nbsp;discover&nbsp;hidden&nbsp;asymptotic&nbsp;inefficiencies&nbsp;in&nbsp;the&nbsp;code.<br/>
From&nbsp;a&nbsp;single&nbsp;run&nbsp;of&nbsp;a&nbsp;program,&nbsp;<br/>
aprof&nbsp;measures&nbsp;how&nbsp;the&nbsp;performance&nbsp;of&nbsp;individual&nbsp;routines&nbsp;scales&nbsp;as&nbsp;a&nbsp;function&nbsp;of&nbsp;the&nbsp;input&nbsp;size,&nbsp;<br/>
yielding&nbsp;clues&nbsp;to&nbsp;its&nbsp;growth&nbsp;rate&nbsp;and&nbsp;to&nbsp;the&nbsp;"big-O"&nbsp;of&nbsp;the&nbsp;program.<br/>
如果定义LOCAL_ENABLE_APROF为true，那么将引入prof相关的库&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="linked_module">Target:&nbsp;&bsp;linked_module</a></h3>
<p>
linked_module&nbsp;:=&nbsp;$(guessed_intermediates)/LINKED/$(LOCAL_BUILT_MODULE_STEM)<br/>
编译链接后可执行文件存放目录<br/>
和LOCAL_BUILT_MODULE等价<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
