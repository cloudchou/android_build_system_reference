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
<h3>build/core/combo/arch/x86/x86-atom.mk</h3>
<p>
This&nbsp;file&nbsp;contains&nbsp;feature&nbsp;macro&nbsp;definitions&nbsp;specific&nbsp;to&nbsp;the<br/>
'x86-atom'&nbsp;arch&nbsp;variant.&nbsp;This&nbsp;is&nbsp;an&nbsp;extension&nbsp;of&nbsp;the&nbsp;'x86'&nbsp;base&nbsp;variant<br/>
that&nbsp;adds&nbsp;Atom-specific&nbsp;features.<br/>
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
ARCH_X86_HAVE_SSSE3&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_MOVBE">ARCH_X86_HAVE_MOVBE</a></h3>
<p>
ARCH_X86_HAVE_MOVBE&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ARCH_X86_HAVE_POPCNT">ARCH_X86_HAVE_POPCNT</a></h3>
<p>
ARCH_X86_HAVE_POPCNT&nbsp;:=&nbsp;false&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CFLAGS">TARGET_GLOBAL_CFLAGS</a></h3>
<p>
TARGET_GLOBAL_CFLAGS&nbsp;+=&nbsp;-march=atom<br/>
</p>
</div>
</div>
<?php require_once '../../../../../sidebar.php';?>
<?php require_once '../../../../../footer.php';?>
</div>
</body>
</html>
