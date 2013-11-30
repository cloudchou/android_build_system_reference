<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../../../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../../../../header.php';?> 
<div id="content">

<div class="file">
<h3>build/core/combo/arch/mips/mips32r2-fp.mk</h3>
<p>
Configuration&nbsp;for&nbsp;Android&nbsp;on&nbsp;MIPS.<br/>
Generating&nbsp;binaries&nbsp;for&nbsp;MIPS32R2/hard-float/little-endian<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_MIPS_HAS_FPU">ARCH_MIPS_HAS_FPU</a></h3>
<p>
ARCH_MIPS_HAS_FPU&nbsp;&nbsp;&nbsp;:=true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_HAVE_ALIGNED_DOUBLES">ARCH_HAVE_ALIGNED_DOUBLES</a></h3>
<p>
ARCH_HAVE_ALIGNED_DOUBLES&nbsp;:=true<br/>
</p>
</div>
<div class="variable">
<h3><a id="arch_variant_cflags">arch_variant_cflags</a></h3>
<p>
arch_variant_cflags&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-EL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-march=mips32r2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-mtune=mips32r2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-mips32r2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-mhard-float<br/>
</p>
</div>
<div class="variable">
<h3><a id="arch_variant_ldflags">arch_variant_ldflags</a></h3>
<p>
arch_variant_ldflags&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-EL<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
