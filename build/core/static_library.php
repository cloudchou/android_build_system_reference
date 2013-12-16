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
<h3>build/core/static_library.mk</h3>
<p>
编译为手机上二进制程序链接需要的静态库<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;对应编译变量&nbsp;&nbsp;&nbsp;&nbsp;BUILD_STATIC_LIBRARY<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Standard&nbsp;rules&nbsp;for&nbsp;building&nbsp;a&nbsp;static&nbsp;library.&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Additional&nbsp;inputs&nbsp;from&nbsp;base_rules.make:&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;None.&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LOCAL_MODULE_SUFFIX&nbsp;will&nbsp;be&nbsp;set&nbsp;for&nbsp;you.&nbsp;<br/>
bootalbe/recovery/applypatch/Android.mk:24:include&nbsp;$(BUILD_STATIC_LIBRARY)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(LOCAL_MODULE_CLASS)),)<br/>
LOCAL_MODULE_CLASS&nbsp;:=&nbsp;STATIC_LIBRARIES<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(LOCAL_MODULE_SUFFIX)),)<br/>
LOCAL_MODULE_SUFFIX&nbsp;:=&nbsp;.a<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_UNINSTALLABLE_MODULE">LOCAL_UNINSTALLABLE_MODULE</a></h3>
<p>
LOCAL_UNINSTALLABLE_MODULE&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_WHOLE_STATIC_LIBRARIES">LOCAL_WHOLE_STATIC_LIBRARIES</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(LOCAL_ENABLE_APROF)),true)<br/>
LOCAL_WHOLE_STATIC_LIBRARIES&nbsp;+=&nbsp;libaprof<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
