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
<h3>build/core/native_test.mk</h3>
<p>
A&nbsp;thin&nbsp;wrapper&nbsp;around&nbsp;BUILD_EXECUTABLE&nbsp;Common&nbsp;flags&nbsp;for&nbsp;native&nbsp;tests&nbsp;are&nbsp;added.<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CFLAGS">LOCAL_CFLAGS</a></h3>
<p>
LOCAL_CFLAGS&nbsp;+=&nbsp;-DGTEST_OS_LINUX_ANDROID&nbsp;-DGTEST_HAS_STD_STRING<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_C_INCLUDES">LOCAL_C_INCLUDES</a></h3>
<p>
LOCAL_C_INCLUDES&nbsp;+=&nbsp;bionic&nbsp;\<br/>
bionic/libstdc++/include&nbsp;\<br/>
external/gtest/include&nbsp;\<br/>
external/stlport/stlport<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_STATIC_LIBRARIES">LOCAL_STATIC_LIBRARIES</a></h3>
<p>
LOCAL_STATIC_LIBRARIES&nbsp;+=&nbsp;libgtest&nbsp;libgtest_main<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_SHARED_LIBRARIES">LOCAL_SHARED_LIBRARIES</a></h3>
<p>
LOCAL_SHARED_LIBRARIES&nbsp;+=&nbsp;libstlport<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_PATH">LOCAL_MODULE_PATH</a></h3>
<p>
ifndef&nbsp;LOCAL_MODULE_PATH<br/>
LOCAL_MODULE_PATH&nbsp;:=&nbsp;$(TARGET_OUT_DATA_NATIVE_TESTS)/$(LOCAL_MODULE)<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
