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
<h3>build/core/combo/arch/arm/armv7-a.mk</h3>
<p>
armv7-a&nbsp;相关配置<br/>
Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;ARM.<br/>
Generating&nbsp;binaries&nbsp;for&nbsp;the&nbsp;ARMv7-a&nbsp;architecture&nbsp;and&nbsp;higher<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_THUMB_SUPPORT">ARCH_ARM_HAVE_THUMB_SUPPORT</a></h3>
<p>
ARCH_ARM_HAVE_THUMB_SUPPORT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_FAST_INTERWORKING">ARCH_ARM_HAVE_FAST_INTERWORKING</a></h3>
<p>
ARCH_ARM_HAVE_FAST_INTERWORKING&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_64BIT_DATA">ARCH_ARM_HAVE_64BIT_DATA</a></h3>
<p>
ARCH_ARM_HAVE_64BIT_DATA:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_HALFWORD_MULTIPLY">ARCH_ARM_HAVE_HALFWORD_MULTIPLY</a></h3>
<p>
ARCH_ARM_HAVE_HALFWORD_MULTIPLY&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_CLZ">ARCH_ARM_HAVE_CLZ</a></h3>
<p>
ARCH_ARM_HAVE_CLZ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_FFS">ARCH_ARM_HAVE_FFS</a></h3>
<p>
ARCH_ARM_HAVE_FFS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_ARMV7A">ARCH_ARM_HAVE_ARMV7A</a></h3>
<p>
ARCH_ARM_HAVE_ARMV7A&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_TLS_REGISTER">ARCH_ARM_HAVE_TLS_REGISTER</a></h3>
<p>
ARCH_ARM_HAVE_TLS_REGISTER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_VFP">ARCH_ARM_HAVE_VFP</a></h3>
<p>
ifneq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_FPU)),)<br/>
ARCH_ARM_HAVE_VFP&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
else<br/>
ARCH_ARM_HAVE_VFP&nbsp;&nbsp;&nbsp;:=&nbsp;false<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_VFP_D32">ARCH_ARM_HAVE_VFP_D32</a></h3>
<p>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_FPU),&nbsp;neon)<br/>
ARCH_ARM_HAVE_VFP_D32&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
ARCH_ARM_HAVE_NEON&nbsp;&nbsp;:=&nbsp;true<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_ARM_HAVE_NEON">ARCH_ARM_HAVE_NEON</a></h3>
<p>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_FPU),&nbsp;neon)<br/>
&nbsp;&nbsp;ARCH_ARM_HAVE_VFP_D32&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
&nbsp;&nbsp;ARCH_ARM_HAVE_NEON&nbsp;&nbsp;:=&nbsp;true<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="arch_variant_cflags">arch_variant_cflags</a></h3>
<p>
arch_variant_cflags&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-march=armv7-a&nbsp;<br/>
ifneq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_CPU)),)<br/>
arch_variant_cflags&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;-mtune=$(strip&nbsp;$(TARGET_ARCH_VARIANT_CPU))<br/>
endif&nbsp;<br/>
ifneq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_FPU)),)<br/>
arch_variant_cflags&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-mfloat-abi=softfp&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-mfpu=$(strip&nbsp;$(TARGET_ARCH_VARIANT_FPU))<br/>
else<br/>
#&nbsp;fall&nbsp;back&nbsp;on&nbsp;soft&nbsp;tunning&nbsp;if&nbsp;fpu&nbsp;is&nbsp;not&nbsp;specified<br/>
arch_variant_cflags&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-mfloat-abi=soft<br/>
endif&nbsp;<br/>
ifeq&nbsp;($(strip&nbsp;$(TARGET_ARCH_VARIANT_CPU)),cortex-a8)<br/>
arch_variant_ldflags&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;-Wl,--fix-cortex-a8<br/>
else<br/>
arch_variant_ldflags&nbsp;:=<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
