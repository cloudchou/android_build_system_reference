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
<h3>build/core/linaro_compilerchecks.mk</h3>
<p>
定义了try-run,&nbsp;cc-version,&nbsp;cc-ifversion&nbsp;and&nbsp;cc-option&nbsp;等宏函数变量，在linux内核编译系统中也定义了这些变量<br/>
The&nbsp;implementations&nbsp;here&nbsp;are&nbsp;rewritten&nbsp;to&nbsp;avoid&nbsp;license&nbsp;clashes,&nbsp;and<br/>
they're&nbsp;a&nbsp;lot&nbsp;simpler&nbsp;than&nbsp;their&nbsp;kernel&nbsp;counterparts&nbsp;because,&nbsp;at&nbsp;least<br/>
for&nbsp;now,&nbsp;we&nbsp;don't&nbsp;need&nbsp;to&nbsp;support&nbsp;all&nbsp;the&nbsp;compilers&nbsp;the&nbsp;kernel&nbsp;supports,<br/>
and&nbsp;we&nbsp;don't&nbsp;need&nbsp;to&nbsp;be&nbsp;aware&nbsp;of&nbsp;all&nbsp;the&nbsp;details&nbsp;the&nbsp;kernel&nbsp;checks&nbsp;for.<br/>
Usage&nbsp;examples:<br/>
&nbsp;echo&nbsp;"GCC&nbsp;version&nbsp;$(cc-version)"&nbsp;[e.g.&nbsp;46&nbsp;for&nbsp;4.6]<br/>
&nbsp;echo&nbsp;$(call&nbsp;cc-ifversion,&nbsp;-lt,&nbsp;46,&nbsp;GCC&nbsp;older&nbsp;than&nbsp;4.6)<br/>
&nbsp;#&nbsp;Use&nbsp;-mcpu=cortex-a9&nbsp;if&nbsp;supported,&nbsp;otherwise&nbsp;-mcpu=cortex-a8<br/>
&nbsp;echo&nbsp;$(call&nbsp;cc-option,&nbsp;-mcpu=cortex-a9,&nbsp;-mcpu=cortex-a8)<br/>
&nbsp;#&nbsp;Use&nbsp;-mcpu=cortex-a9&nbsp;if&nbsp;supported,&nbsp;otherwise&nbsp;-mcpu=cortex-a8<br/>
&nbsp;#&nbsp;if&nbsp;supported,&nbsp;otherwise&nbsp;nothing<br/>
&nbsp;echo&nbsp;$(call&nbsp;cc-option,&nbsp;-mcpu=cortex-a9,&nbsp;$(call&nbsp;cc-option,&nbsp;-mcpu=cortex-a8))<br/>
</p>
</div>
<div class="variable">
<h3><a id="LINARO_COMPILERCHECK_CC">LINARO_COMPILERCHECK_CC</a></h3>
<p>
We&nbsp;have&nbsp;to&nbsp;do&nbsp;our&nbsp;own&nbsp;version&nbsp;of&nbsp;setting&nbsp;TARGET_CC&nbsp;because&nbsp;we&nbsp;can&nbsp;be<br/>
included&nbsp;before&nbsp;TARGET_CC&nbsp;is&nbsp;set,&nbsp;but&nbsp;we&nbsp;may&nbsp;want&nbsp;to&nbsp;use&nbsp;cc-option&nbsp;and<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;friends&nbsp;in&nbsp;the&nbsp;same&nbsp;file&nbsp;that&nbsp;sets&nbsp;TARGET_CC...&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ifeq&nbsp;($(strip&nbsp;$(TARGET_TOOLS_PREFIX)),)<br/>
&nbsp;&nbsp;LINARO_COMPILERCHECK_CC&nbsp;:=&nbsp;prebuilts/gcc/$(HOST_PREBUILT_TAG)/arm/arm-linux-androideabi-4.6/bin/arm-linux-androideabi-gcc$(HOST_EXECUTABLE_SUFFIX)<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;LINARO_COMPILERCHECK_CC&nbsp;:=&nbsp;$(TARGET_TOOLS_PREFIX)gcc$(HOST_EXECUTABLE_SUFFIX)<br/>
&nbsp;&nbsp;endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="try-run">try-run</a></h3>
<p>
try-run&nbsp;=&nbsp;$(shell&nbsp;set&nbsp;-e;&nbsp;\<br/>
if&nbsp;($(1))&nbsp;>/dev/null&nbsp;2>&1;&nbsp;then&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;echo&nbsp;"$(2)";&nbsp;\<br/>
else&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;echo&nbsp;"$(3)";&nbsp;\<br/>
fi)<br/>
</p>
</div>
<div class="variable">
<h3><a id="cc-version">cc-version</a></h3>
<p>
cc-version&nbsp;=&nbsp;$(shell&nbsp;echo&nbsp;'__GNUC__&nbsp;__GNUC_MINOR__'&nbsp;\<br/>
|$(LINARO_COMPILERCHECK_CC)&nbsp;-E&nbsp;-xc&nbsp;-&nbsp;|tail&nbsp;-n1&nbsp;|sed&nbsp;-e&nbsp;'s,&nbsp;,,g')<br/>
</p>
</div>
<div class="variable">
<h3><a id="cc-ifversion">cc-ifversion</a></h3>
<p>
$(shell&nbsp;[&nbsp;$(call&nbsp;cc-version)&nbsp;$(1)&nbsp;$(2)&nbsp;]&nbsp;&&&nbsp;echo&nbsp;$(3))<br/>
</p>
</div>
<div class="variable">
<h3><a id="cc-option">cc-option</a></h3>
<p>
cc-option&nbsp;=&nbsp;$(call&nbsp;try-run,&nbsp;echo&nbsp;-e&nbsp;"$(1)"&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;|$(LINARO_COMPILERCHECK_CC)&nbsp;$(1)&nbsp;-c&nbsp;-xc&nbsp;/dev/null&nbsp;-o&nbsp;/dev/null,$(1),$(2))<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
