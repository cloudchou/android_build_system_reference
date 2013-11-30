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
<h3>build/core/combo/arch/arm/armv4t.mk</h3>
<p>
armv4t&nbsp;相关配置<br/>
ARMv4t&nbsp;support&nbsp;is&nbsp;currently&nbsp;a&nbsp;work&nbsp;in&nbsp;progress.&nbsp;It&nbsp;does&nbsp;not&nbsp;work&nbsp;right&nbsp;now!<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_THUMB_SUPPORT">ARCH_ARM_HAVE_THUMB_SUPPORT</a></h3>
<p>
ARCH_ARM_HAVE_THUMB_SUPPORT&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_THUMB_INTERWORKING">ARCH_ARM_HAVE_THUMB_INTERWORKING</a></h3>
<p>
ARCH_ARM_HAVE_THUMB_INTERWORKING&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_64BIT_DATA">ARCH_ARM_HAVE_64BIT_DATA</a></h3>
<p>
ARCH_ARM_HAVE_64BIT_DATA&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_HALFWORD_MULTIPLY">ARCH_ARM_HAVE_HALFWORD_MULTIPLY</a></h3>
<p>
ARCH_ARM_HAVE_HALFWORD_MULTIPLY&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_CLZ">ARCH_ARM_HAVE_CLZ</a></h3>
<p>
ARCH_ARM_HAVE_CLZ&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_FFS">ARCH_ARM_HAVE_FFS</a></h3>
<p>
ARCH_ARM_HAVE_FFS&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEFAULT_TARGET_CPU">DEFAULT_TARGET_CPU</a></h3>
<p>
DEFAULT_TARGET_CPU&nbsp;:=&nbsp;arm920t<br/>
</p>
</div>
<div class="variable">
<h3><a id="arch_variant_cflags">arch_variant_cflags</a></h3>
<p>
arch_variant_cflags&nbsp;:=&nbsp;-march=armv4t&nbsp;-mtune=arm920t&nbsp;-D__ARM_ARCH_4T__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
