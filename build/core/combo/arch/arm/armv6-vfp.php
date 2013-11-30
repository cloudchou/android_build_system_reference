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
<h3>build/core/combo/arch/arm/armv6-vfp.mk</h3>
<p>
armv6-vfp&nbsp;相关配置<br/>
Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;ARM.<br/>
Generating&nbsp;binaries&nbsp;for&nbsp;the&nbsp;ARMv6-VFP&nbsp;architecture&nbsp;and&nbsp;higher<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_THUMB_SUPPORT">■ &nbsp;&nbsp;ARCH_ARM_HAVE_THUMB_SUPPORT</a></h3>
<p>
ARCH_ARM_HAVE_THUMB_SUPPORT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_FAST_INTERWORKING">■ &nbsp;&nbsp;ARCH_ARM_HAVE_FAST_INTERWORKING</a></h3>
<p>
ARCH_ARM_HAVE_FAST_INTERWORKING&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_64BIT_DATA">■ &nbsp;&nbsp;ARCH_ARM_HAVE_64BIT_DATA</a></h3>
<p>
ARCH_ARM_HAVE_64BIT_DATA:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_HALFWORD_MULTIPLY">■ &nbsp;&nbsp;ARCH_ARM_HAVE_HALFWORD_MULTIPLY</a></h3>
<p>
ARCH_ARM_HAVE_HALFWORD_MULTIPLY&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_CLZ">■ &nbsp;&nbsp;ARCH_ARM_HAVE_CLZ</a></h3>
<p>
ARCH_ARM_HAVE_CLZ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_FFS">■ &nbsp;&nbsp;ARCH_ARM_HAVE_FFS</a></h3>
<p>
ARCH_ARM_HAVE_FFS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_VFP">■ &nbsp;&nbsp;ARCH_ARM_HAVE_VFP</a></h3>
<p>
ARCH_ARM_HAVE_VFP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT_FPU">■ &nbsp;&nbsp;TARGET_ARCH_VARIANT_FPU</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_FPU)),)<br/>
TARGET_ARCH_VARIANT_FPU&nbsp;&nbsp;&nbsp;:=&nbsp;vfp<br/>
endif<br/>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_CPU)),)<br/>
TARGET_ARCH_VARIANT_CPU&nbsp;&nbsp;&nbsp;:=&nbsp;arm1136jf-s<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="arch_variant_cflags">■ &nbsp;&nbsp;arch_variant_cflags</a></h3>
<p>
Note:&nbsp;Hard&nbsp;coding&nbsp;the&nbsp;'tune'&nbsp;value&nbsp;here&nbsp;is&nbsp;probably&nbsp;not&nbsp;ideal,&nbsp;&nbsp;<br/>
&nbsp;&nbsp;and&nbsp;a&nbsp;better&nbsp;solution&nbsp;should&nbsp;be&nbsp;found&nbsp;in&nbsp;the&nbsp;future.<br/>
&nbsp;&nbsp;arch_variant_cflags&nbsp;:=&nbsp;\<br/>
-mcpu=$(TARGET_ARCH_VARIANT_CPU)&nbsp;\<br/>
-mfloat-abi=softfp&nbsp;\<br/>
-mfpu=$(TARGET_ARCH_VARIANT_FPU)&nbsp;\<br/>
-D__ARM_ARCH_5__&nbsp;\<br/>
-D__ARM_ARCH_5T__&nbsp;\<br/>
-D__ARM_ARCH_5E__&nbsp;\<br/>
-D__ARM_ARCH_5TE__<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
