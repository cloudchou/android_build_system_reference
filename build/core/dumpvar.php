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
<h3>build/core/dumpvar.mk</h3>
<p>
在envsetup.sh里的setpath终端函数利用这个文件指出添加什么到系统PATH目录<br/>
the&nbsp;setpath&nbsp;shell&nbsp;function&nbsp;in&nbsp;envsetup.sh&nbsp;uses&nbsp;this&nbsp;to&nbsp;figure&nbsp;out<br/>
&nbsp;what&nbsp;to&nbsp;add&nbsp;to&nbsp;the&nbsp;path&nbsp;given&nbsp;the&nbsp;config&nbsp;we&nbsp;have&nbsp;chosen<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_BUILD_PATHS">ANDROID_BUILD_PATHS</a></h3>
<p>
Android&nbsp;build&nbsp;toolchain&nbsp;bin&nbsp;dir&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_PREBUILTS">ANDROID_PREBUILTS</a></h3>
<p>
ANDROID_PREBUILTS&nbsp;:=&nbsp;prebuilt/$(HOST_PREBUILT_TAG)<br/>
</p>
</div>
<div class="variable">
<h3><a id="ANDROID_GCC_PREBUILTS">ANDROID_GCC_PREBUILTS</a></h3>
<p>
ANDROID_GCC_PREBUILTS&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(dumpvar_target)">Target:&nbsp;&nbsp;$(dumpvar_target)</a></h3>
<p>
如果编译目标里有dumpvar-%，形式将打印%对应的变量的值<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
