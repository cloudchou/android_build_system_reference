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
<h3>build/core/cleanspec.mk</h3>
<p>
Just&nbsp;bump&nbsp;this&nbsp;if&nbsp;you&nbsp;want&nbsp;to&nbsp;force&nbsp;a&nbsp;clean&nbsp;build.<br/>
**********************************************************************<br/>
WHEN&nbsp;DOING&nbsp;SO<br/>
1.&nbsp;DELETE&nbsp;ANY&nbsp;"add-clean-step"&nbsp;ENTRIES&nbsp;THAT&nbsp;HAVE&nbsp;PILED&nbsp;UP&nbsp;IN&nbsp;THIS&nbsp;FILE.<br/>
2.&nbsp;REMOVE&nbsp;ALL&nbsp;FILES&nbsp;NAMED&nbsp;CleanSpec.mk.<br/>
3.&nbsp;BUMP&nbsp;THE&nbsp;VERSION.<br/>
IDEALLY,&nbsp;THOSE&nbsp;STEPS&nbsp;SHOULD&nbsp;BE&nbsp;DONE&nbsp;ATOMICALLY.<br/>
**********************************************************************&nbsp;<br/>
***********************************************************************<br/>
Do&nbsp;not&nbsp;touch&nbsp;INTERNAL_CLEAN_BUILD_VERSION&nbsp;if&nbsp;you've&nbsp;added&nbsp;a&nbsp;clean&nbsp;step!<br/>
***********************************************************************<br/>
If&nbsp;you&nbsp;don't&nbsp;need&nbsp;to&nbsp;do&nbsp;a&nbsp;full&nbsp;clean&nbsp;build&nbsp;but&nbsp;would&nbsp;like&nbsp;to&nbsp;touch<br/>
a&nbsp;file&nbsp;or&nbsp;delete&nbsp;some&nbsp;intermediate&nbsp;files,&nbsp;add&nbsp;a&nbsp;clean&nbsp;step&nbsp;to&nbsp;the&nbsp;end<br/>
of&nbsp;the&nbsp;list.&nbsp;&nbsp;These&nbsp;steps&nbsp;will&nbsp;only&nbsp;be&nbsp;run&nbsp;once,&nbsp;if&nbsp;they&nbsp;haven't&nbsp;been<br/>
run&nbsp;before.<br/>
E.g.:<br/>
$(call&nbsp;add-clean-step,&nbsp;touch&nbsp;-c&nbsp;external/sqlite/sqlite3.h)<br/>
$(call&nbsp;add-clean-step,&nbsp;rm&nbsp;-rf&nbsp;$(PRODUCT_OUT)/obj/STATIC_LIBRARIES/libz_intermediates)<br/>
Always&nbsp;use&nbsp;"touch&nbsp;-c"&nbsp;and&nbsp;"rm&nbsp;-f"&nbsp;or&nbsp;"rm&nbsp;-rf"&nbsp;to&nbsp;gracefully&nbsp;deal&nbsp;with<br/>
files&nbsp;that&nbsp;are&nbsp;missing&nbsp;or&nbsp;have&nbsp;been&nbsp;moved.<br/>
Use&nbsp;$(PRODUCT_OUT)&nbsp;to&nbsp;get&nbsp;to&nbsp;the&nbsp;"out/target/product/blah/"&nbsp;directory.<br/>
Use&nbsp;$(OUT_DIR)&nbsp;to&nbsp;refer&nbsp;to&nbsp;the&nbsp;"out"&nbsp;directory.<br/>
If&nbsp;you&nbsp;need&nbsp;to&nbsp;re-do&nbsp;something&nbsp;that's&nbsp;already&nbsp;mentioned,&nbsp;just&nbsp;copy<br/>
the&nbsp;command&nbsp;and&nbsp;add&nbsp;it&nbsp;to&nbsp;the&nbsp;bottom&nbsp;of&nbsp;the&nbsp;list.&nbsp;&nbsp;E.g.,&nbsp;if&nbsp;a&nbsp;change<br/>
that&nbsp;you&nbsp;made&nbsp;last&nbsp;week&nbsp;required&nbsp;touching&nbsp;a&nbsp;file&nbsp;and&nbsp;a&nbsp;change&nbsp;you<br/>
made&nbsp;today&nbsp;requires&nbsp;touching&nbsp;the&nbsp;same&nbsp;file,&nbsp;just&nbsp;copy&nbsp;the&nbsp;old<br/>
touch&nbsp;step&nbsp;and&nbsp;add&nbsp;it&nbsp;to&nbsp;the&nbsp;end&nbsp;of&nbsp;the&nbsp;list.<br/>
************************************************<br/>
NEWER&nbsp;CLEAN&nbsp;STEPS&nbsp;MUST&nbsp;BE&nbsp;AT&nbsp;THE&nbsp;END&nbsp;OF&nbsp;THE&nbsp;LIST<br/>
************************************************<br/>
For&nbsp;example:<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;add-clean-step,&nbsp;rm&nbsp;-rf&nbsp;$(OUT_DIR)/target/common/obj/APPS/AndroidTests_intermediates)<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;add-clean-step,&nbsp;rm&nbsp;-rf&nbsp;$(OUT_DIR)/target/common/obj/JAVA_LIBRARIES/core_intermediates)<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;add-clean-step,&nbsp;find&nbsp;$(OUT_DIR)&nbsp;-type&nbsp;f&nbsp;-name&nbsp;"IGTalkSession*"&nbsp;-print0&nbsp;|&nbsp;xargs&nbsp;-0&nbsp;rm&nbsp;-f)<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;add-clean-step,&nbsp;rm&nbsp;-rf&nbsp;$(PRODUCT_OUT)/data/*)<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_CLEAN_BUILD_VERSION">INTERNAL_CLEAN_BUILD_VERSION</a></h3>
<p>
INTERNAL_CLEAN_BUILD_VERSION&nbsp;:=&nbsp;6<br/>
</p>
</div>
<div class="function">
<h3><a id="get-top-dir">Function:&nbsp;&nbsp;get-top-dir</a></h3>
<p>
Get&nbsp;the&nbsp;path&nbsp;of&nbsp;the&nbsp;top&nbsp;of&nbsp;the&nbsp;tree.<br/>
for&nbsp;example:<br/>
/home/bob/master/framework/base&nbsp;=>&nbsp;/home/bob/master<br/>
See&nbsp;function&nbsp;gettop&nbsp;in&nbsp;build/envsetup.sh.<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
