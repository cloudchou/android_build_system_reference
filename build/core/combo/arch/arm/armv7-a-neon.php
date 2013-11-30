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
<h3>build/core/combo/arch/arm/armv7-a-neon.mk</h3>
<p>
armv7-a-neon&nbsp;相关配置<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuration&nbsp;for&nbsp;Linux&nbsp;on&nbsp;ARM.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generating&nbsp;binaries&nbsp;for&nbsp;the&nbsp;ARMv7-a&nbsp;architecture&nbsp;and&nbsp;higher&nbsp;with&nbsp;NEON<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT_FPU">TARGET_ARCH_VARIANT_FPU</a></h3>
<p>
TARGET_ARCH_VARIANT_FPU&nbsp;:=&nbsp;neon<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_ARCH_VARIANT_CPU">TARGET_ARCH_VARIANT_CPU</a></h3>
<p>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_CPU),&nbsp;cortex-a15)<br/>
ARCH_ARM_HAVE_NEON_UNALIGNED_ACCESS&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
ARCH_ARM_NEON_MEMSET_DIVIDER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;132<br/>
#ARCH_ARM_NEON_MEMCPY_ALIGNMENT_DIVIDER&nbsp;:=&nbsp;224<br/>
endif<br/>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_CPU),&nbsp;cortex-a9)<br/>
ARCH_ARM_HAVE_NEON_UNALIGNED_ACCESS&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
ARCH_ARM_NEON_MEMSET_DIVIDER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;132<br/>
ARCH_ARM_NEON_MEMCPY_ALIGNMENT_DIVIDER&nbsp;:=&nbsp;224<br/>
endif<br/>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_CPU),&nbsp;cortex-a8)<br/>
ARCH_ARM_HAVE_NEON_UNALIGNED_ACCESS&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
ARCH_ARM_NEON_MEMSET_DIVIDER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;132<br/>
ARCH_ARM_NEON_MEMCPY_ALIGNMENT_DIVIDER&nbsp;:=&nbsp;224<br/>
endif<br/>
ifeq&nbsp;($(TARGET_ARCH_VARIANT_CPU),&nbsp;cortex-a5)<br/>
ARCH_ARM_HAVE_NEON_UNALIGNED_ACCESS&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
ARCH_ARM_NEON_MEMSET_DIVIDER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:=&nbsp;132<br/>
ARCH_ARM_NEON_MEMCPY_ALIGNMENT_DIVIDER&nbsp;:=&nbsp;224<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
