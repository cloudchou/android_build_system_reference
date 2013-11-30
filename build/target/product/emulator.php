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
<h3>build/target/product/emulator.mk</h3>
<p>
This&nbsp;file&nbsp;is&nbsp;included&nbsp;by&nbsp;other&nbsp;product&nbsp;makefiles&nbsp;to&nbsp;add&nbsp;all&nbsp;the<br/>
emulator-related&nbsp;host&nbsp;modules&nbsp;to&nbsp;PRODUCT_PACKAGES.&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator-x86&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator-arm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator-mips&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator64-x86&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator64-arm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;emulator64-mips&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libOpenglRender&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libGLES_CM_translator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libGLES_V2_translator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libEGL_translator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lib64OpenglRender&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lib64GLES_CM_translator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lib64GLES_V2_translator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lib64EGL_translator<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;egl.cfg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;gles_emul.cfg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv1_CM_emul&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv2_emul&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libEGL_emul&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libut_rendercontrol_enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;gralloc.goldfish&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv1_CM_emulation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;lib_renderControl_enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libEGL_emulation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv2_enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libOpenglSystemCommon&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv2_emulation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libGLESv1_enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;qemu-props&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;qemud&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;camera.goldfish&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;lights.goldfish&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;gps.goldfish&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;sensors.goldfish<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
