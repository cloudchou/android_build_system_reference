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
<h3>build/core/combo/arch/x86/x86.mk</h3>
<p>
This&nbsp;file&nbsp;contains&nbsp;feature&nbsp;macro&nbsp;definitions&nbsp;specific&nbsp;to&nbsp;the<br/>
base&nbsp;'x86'&nbsp;platform&nbsp;ABI.&nbsp;This&nbsp;one&nbsp;must&nbsp;*strictly*&nbsp;match&nbsp;the&nbsp;NDK&nbsp;x86&nbsp;ABI<br/>
which&nbsp;mandates&nbsp;specific&nbsp;CPU&nbsp;extensions&nbsp;to&nbsp;be&nbsp;available.<br/>
It&nbsp;is&nbsp;also&nbsp;used&nbsp;to&nbsp;build&nbsp;full_x86-eng&nbsp;/&nbsp;sdk_x86-eng&nbsp;platform&nbsp;images&nbsp;that<br/>
are&nbsp;run&nbsp;in&nbsp;the&nbsp;emulator&nbsp;under&nbsp;KVM&nbsp;emulation&nbsp;(i.e.&nbsp;running&nbsp;directly&nbsp;on<br/>
the&nbsp;host&nbsp;development&nbsp;machine's&nbsp;CPU).<br/>
If&nbsp;your&nbsp;target&nbsp;device&nbsp;doesn't&nbsp;support&nbsp;the&nbsp;four&nbsp;following&nbsp;features,&nbsp;then<br/>
it&nbsp;cannot&nbsp;be&nbsp;compatible&nbsp;with&nbsp;the&nbsp;NDK&nbsp;x86&nbsp;ABI.&nbsp;You&nbsp;should&nbsp;define&nbsp;a&nbsp;new<br/>
target&nbsp;arch&nbsp;variant&nbsp;(e.g.&nbsp;"x86-mydevice")&nbsp;and&nbsp;a&nbsp;corresponding&nbsp;file<br/>
under&nbsp;build/core/combo/arch/x86/<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_MMX">ARCH_X86_HAVE_MMX</a></h3>
<p>
ARCH_X86_HAVE_MMX&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_SSE">ARCH_X86_HAVE_SSE</a></h3>
<p>
ARCH_X86_HAVE_SSE&nbsp;&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_SSE2">ARCH_X86_HAVE_SSE2</a></h3>
<p>
ARCH_X86_HAVE_SSE2&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_SSE3">ARCH_X86_HAVE_SSE3</a></h3>
<p>
ARCH_X86_HAVE_SSE3&nbsp;&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_SSSE3">ARCH_X86_HAVE_SSSE3</a></h3>
<p>
ARCH_X86_HAVE_SSSE3&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_MOVBE">ARCH_X86_HAVE_MOVBE</a></h3>
<p>
ARCH_X86_HAVE_MOVBE&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_POPCNT">ARCH_X86_HAVE_POPCNT</a></h3>
<p>
ARCH_X86_HAVE_POPCNT&nbsp;:=&nbsp;false<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;-march=i686<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
