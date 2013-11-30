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
<h3>build/core/java_library.mk</h3>
<p>
编译为Java库<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_SUFFIX">LOCAL_MODULE_SUFFIX</a></h3>
<p>
LOCAL_MODULE_SUFFIX&nbsp;:=&nbsp;$(COMMON_JAVA_PACKAGE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
LOCAL_MODULE_CLASS&nbsp;:=&nbsp;JAVA_LIBRARIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_BUILT_MODULE_STEM">LOCAL_BUILT_MODULE_STEM</a></h3>
<p>
LOCAL_BUILT_MODULE_STEM&nbsp;:=&nbsp;javalib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DEX_PREOPT">LOCAL_DEX_PREOPT</a></h3>
<p>
ifneq&nbsp;(true,$(WITH_DEXPREOPT))<br/>
如果编译为userm模式WITH_DEXPREOPT在main.mk里默认设置为true，也就是说会进行Dalvik&nbsp;preoptimization<br/>
最后会生成odex格式<br/>
LOCAL_DEX_PREOPT&nbsp;:=<br/>
else<br/>
ifeq&nbsp;(,$(TARGET_BUILD_APPS))<br/>
ifndef&nbsp;LOCAL_DEX_PREOPT<br/>
LOCAL_DEX_PREOPT&nbsp;:=&nbsp;true<br/>
endif<br/>
endif<br/>
endif<br/>
ifeq&nbsp;(false,$(LOCAL_DEX_PREOPT))<br/>
LOCAL_DEX_PREOPT&nbsp;:=<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_EMMA_INSTRUMENT">LOCAL_EMMA_INSTRUMENT</a></h3>
<p>
ifeq&nbsp;(true,$(EMMA_INSTRUMENT))<br/>
ifeq&nbsp;(true,$(LOCAL_EMMA_INSTRUMENT))<br/>
ifeq&nbsp;(true,$(EMMA_INSTRUMENT_STATIC))<br/>
LOCAL_STATIC_JAVA_LIBRARIES&nbsp;+=&nbsp;emma<br/>
endif&nbsp;#&nbsp;LOCAL_EMMA_INSTRUMENT<br/>
endif&nbsp;#&nbsp;EMMA_INSTRUMENT_STATIC<br/>
else<br/>
LOCAL_EMMA_INSTRUMENT&nbsp;:=&nbsp;false<br/>
endif&nbsp;#&nbsp;EMMA_INSTRUMENT&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
