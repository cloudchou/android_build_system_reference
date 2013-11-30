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
<h3>build/core/combo/select.mk</h3>
<p>
Select&nbsp;a&nbsp;combo&nbsp;based&nbsp;on&nbsp;the&nbsp;compiler&nbsp;being&nbsp;used.<br/>
Inputs:<br/>
combo_target&nbsp;--&nbsp;prefix&nbsp;for&nbsp;final&nbsp;variables&nbsp;(HOST_&nbsp;or&nbsp;TARGET_)<br/>
</p>
</div>
<div class="variable">
<h3><a id="combo_os_arch">■ &nbsp;&nbsp;combo_os_arch</a></h3>
<p>
Build&nbsp;a&nbsp;target&nbsp;string&nbsp;like&nbsp;"linux-arm"&nbsp;or&nbsp;"darwin-x86".&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)CC">■ &nbsp;&nbsp;$(combo_target)CC</a></h3>
<p>
$(combo_target)CC&nbsp;:=&nbsp;$(CC)<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)CXX">■ &nbsp;&nbsp;$(combo_target)CXX</a></h3>
<p>
$(combo_target)CXX&nbsp;:=&nbsp;$(CXX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)AR">■ &nbsp;&nbsp;$(combo_target)AR</a></h3>
<p>
$(combo_target)AR&nbsp;:=&nbsp;$(AR)<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)STRIP">■ &nbsp;&nbsp;$(combo_target)STRIP</a></h3>
<p>
$(combo_target)STRIP&nbsp;:=&nbsp;$(STRIP)<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)BINDER_MINI">■ &nbsp;&nbsp;$(combo_target)BINDER_MINI</a></h3>
<p>
$(combo_target)BINDER_MINI&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_EXCEPTIONS">■ &nbsp;&nbsp;$(combo_target)HAVE_EXCEPTIONS</a></h3>
<p>
$(combo_target)HAVE_EXCEPTIONS&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_UNIX_FILE_PATH">■ &nbsp;&nbsp;$(combo_target)HAVE_UNIX_FILE_PATH</a></h3>
<p>
$(combo_target)HAVE_UNIX_FILE_PATH&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_WINDOWS_FILE_PATH">■ &nbsp;&nbsp;$(combo_target)HAVE_WINDOWS_FILE_PATH</a></h3>
<p>
$(combo_target)HAVE_WINDOWS_FILE_PATH&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_RTTI">■ &nbsp;&nbsp;$(combo_target)HAVE_RTTI</a></h3>
<p>
$(combo_target)HAVE_RTTI&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_CALL_STACKS">■ &nbsp;&nbsp;$(combo_target)HAVE_CALL_STACKS</a></h3>
<p>
$(combo_target)HAVE_CALL_STACKS&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_64BIT_IO">■ &nbsp;&nbsp;$(combo_target)HAVE_64BIT_IO</a></h3>
<p>
$(combo_target)HAVE_64BIT_IO&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_CLOCK_TIMERS">■ &nbsp;&nbsp;$(combo_target)HAVE_CLOCK_TIMERS</a></h3>
<p>
$(combo_target)HAVE_CLOCK_TIMERS&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_PTHREAD_RWLOCK">■ &nbsp;&nbsp;$(combo_target)HAVE_PTHREAD_RWLOCK</a></h3>
<p>
$(combo_target)HAVE_PTHREAD_RWLOCK&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_STRNLEN">■ &nbsp;&nbsp;$(combo_target)HAVE_STRNLEN</a></h3>
<p>
$(combo_target)HAVE_STRNLEN&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_STRERROR_R_STRRET">■ &nbsp;&nbsp;$(combo_target)HAVE_STRERROR_R_STRRET</a></h3>
<p>
$(combo_target)HAVE_STRERROR_R_STRRET&nbsp;:=&nbsp;1<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_STRLCPY">■ &nbsp;&nbsp;$(combo_target)HAVE_STRLCPY</a></h3>
<p>
$(combo_target)HAVE_STRLCPY&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_STRLCAT">■ &nbsp;&nbsp;$(combo_target)HAVE_STRLCAT</a></h3>
<p>
$(combo_target)HAVE_STRLCAT&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)HAVE_KERNEL_MODULES">■ &nbsp;&nbsp;$(combo_target)HAVE_KERNEL_MODULES</a></h3>
<p>
$(combo_target)HAVE_KERNEL_MODULES&nbsp;:=&nbsp;0<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)GLOBAL_CFLAGS">■ &nbsp;&nbsp;$(combo_target)GLOBAL_CFLAGS</a></h3>
<p>
$(combo_target)GLOBAL_CFLAGS&nbsp;:=&nbsp;-fno-exceptions&nbsp;-Wno-multichar<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)RELEASE_CFLAGS">■ &nbsp;&nbsp;$(combo_target)RELEASE_CFLAGS</a></h3>
<p>
$(combo_target)RELEASE_CFLAGS&nbsp;:=&nbsp;-O2&nbsp;-g&nbsp;-fno-strict-aliasing<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)GLOBAL_LDFLAGS">■ &nbsp;&nbsp;$(combo_target)GLOBAL_LDFLAGS</a></h3>
<p>
$(combo_target)GLOBAL_LDFLAGS&nbsp;:=<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)GLOBAL_ARFLAGS">■ &nbsp;&nbsp;$(combo_target)GLOBAL_ARFLAGS</a></h3>
<p>
$(combo_target)GLOBAL_ARFLAGS&nbsp;:=&nbsp;crsP<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(combo_target)EXECUTABLE_SUFFIX">■ &nbsp;&nbsp;$(combo_target)EXECUTABLE_SUFFIX</a></h3>
<p>
$(combo_target)EXECUTABLE_SUFFIX&nbsp;:=&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="CCACHE_COMPILERCHECK">■ &nbsp;&nbsp;CCACHE_COMPILERCHECK</a></h3>
<p>
The&nbsp;default&nbsp;check&nbsp;uses&nbsp;size&nbsp;and&nbsp;modification&nbsp;time,&nbsp;causing&nbsp;false&nbsp;misses<br/>
since&nbsp;the&nbsp;mtime&nbsp;depends&nbsp;when&nbsp;the&nbsp;repo&nbsp;was&nbsp;checked&nbsp;out<br/>
&nbsp;&nbsp;&nbsp;export&nbsp;CCACHE_COMPILERCHECK&nbsp;:=&nbsp;content<br/>
</p>
</div>
<div class="variable">
<h3><a id="CCACHE_SLOPPINESS">■ &nbsp;&nbsp;CCACHE_SLOPPINESS</a></h3>
<p>
See&nbsp;man&nbsp;page,&nbsp;optimizations&nbsp;to&nbsp;get&nbsp;more&nbsp;cache&nbsp;hits<br/>
implies&nbsp;that&nbsp;__DATE__&nbsp;and&nbsp;__TIME__&nbsp;are&nbsp;not&nbsp;critical&nbsp;for&nbsp;functionality.<br/>
Ignore&nbsp;include&nbsp;file&nbsp;modification&nbsp;time&nbsp;since&nbsp;it&nbsp;will&nbsp;depend&nbsp;on&nbsp;when<br/>
the&nbsp;repo&nbsp;was&nbsp;checked&nbsp;out<br/>
&nbsp;&nbsp;export&nbsp;CCACHE_SLOPPINESS&nbsp;:=&nbsp;time_macros,include_file_mtime,file_macro&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="CCACHE_BASEDIR">■ &nbsp;&nbsp;CCACHE_BASEDIR</a></h3>
<p>
Turn&nbsp;all&nbsp;preprocessor&nbsp;absolute&nbsp;paths&nbsp;into&nbsp;relative&nbsp;paths.<br/>
Fixes&nbsp;absolute&nbsp;paths&nbsp;in&nbsp;preprocessed&nbsp;source&nbsp;due&nbsp;to&nbsp;use&nbsp;of&nbsp;-g.<br/>
We&nbsp;don't&nbsp;really&nbsp;use&nbsp;system&nbsp;headers&nbsp;much&nbsp;so&nbsp;the&nbsp;rootdir&nbsp;is<br/>
fine;&nbsp;ensures&nbsp;these&nbsp;paths&nbsp;are&nbsp;relative&nbsp;for&nbsp;all&nbsp;Android&nbsp;trees<br/>
on&nbsp;a&nbsp;workstation.<br/>
&nbsp;&nbsp;export&nbsp;CCACHE_BASEDIR&nbsp;:=&nbsp;/&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="CCACHE_HOST_TAG">■ &nbsp;&nbsp;CCACHE_HOST_TAG</a></h3>
<p>
If&nbsp;we&nbsp;are&nbsp;cross-compiling&nbsp;Windows&nbsp;binaries&nbsp;on&nbsp;Linux<br/>
then&nbsp;use&nbsp;the&nbsp;linux&nbsp;ccache&nbsp;binary&nbsp;instead.<br/>
&nbsp;&nbsp;ifeq&nbsp;($(HOST_OS)-$(BUILD_OS),windows-linux)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;CCACHE_HOST_TAG&nbsp;:=&nbsp;linux-$(BUILD_ARCH)<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
