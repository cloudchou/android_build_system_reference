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
<h3>build/core/cleanbuild.mk</h3>
<p>
主要定义一些目标用于清除编译结果<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_CLEAN_STEPS">INTERNAL_CLEAN_STEPS</a></h3>
<p>
清除步骤&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="add-clean-step">add-clean-step</a></h3>
<p>
Builds&nbsp;up&nbsp;a&nbsp;list&nbsp;of&nbsp;clean&nbsp;steps.&nbsp;&nbsp;Creates&nbsp;a&nbsp;unique<br/>
id&nbsp;for&nbsp;each&nbsp;step&nbsp;by&nbsp;taking&nbsp;makefile&nbsp;path,&nbsp;INTERNAL_CLEAN_BUILD_VERSION<br/>
and&nbsp;appending&nbsp;an&nbsp;increasing&nbsp;number&nbsp;of&nbsp;'@'&nbsp;characters<br/>
$(1):&nbsp;shell&nbsp;command&nbsp;to&nbsp;run<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_CLEAN_BUILD_VERSION">INTERNAL_CLEAN_BUILD_VERSION</a></h3>
<p>
Defines&nbsp;INTERNAL_CLEAN_BUILD_VERSION&nbsp;and&nbsp;the&nbsp;individual&nbsp;clean&nbsp;steps.<br/>
cleanspec.mk&nbsp;is&nbsp;outside&nbsp;of&nbsp;the&nbsp;core&nbsp;directory&nbsp;so&nbsp;that&nbsp;more&nbsp;people<br/>
&nbsp;can&nbsp;have&nbsp;permission&nbsp;to&nbsp;touch&nbsp;it.<br/>
</p>
</div>
<div class="variable">
<h3><a id="CURRENT_CLEAN_BUILD_VERSION">CURRENT_CLEAN_BUILD_VERSION</a></h3>
<p>
If&nbsp;the&nbsp;clean_steps.mk&nbsp;file&nbsp;is&nbsp;missing&nbsp;(usually&nbsp;after&nbsp;a&nbsp;clean&nbsp;build)<br/>
then&nbsp;we&nbsp;won't&nbsp;do&nbsp;anything.<br/>
</p>
</div>
<div class="variable">
<h3><a id="previous_build_config_file">previous_build_config_file</a></h3>
<p>
previous_build_config_file&nbsp;:=&nbsp;$(PRODUCT_OUT)/previous_build_config.mk<br/>
示例：<br/>
&nbsp;&nbsp;out/target/product/find5/previous_build_config.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PREVIOUS_BUILD_CONFIG">PREVIOUS_BUILD_CONFIG</a></h3>
<p>
编译配置<br/>
示例：<br/>
&nbsp;&nbsp;PREVIOUS_BUILD_CONFIG&nbsp;:=&nbsp;cm_find5-userdebug-{en_US,语言和地域列表...}<br/>
如果编译时PREVIOUS_BUILD_CONFIG发生变化<br/>
&nbsp;&nbsp;&nbsp;那么会强制进行dataclean和installclean&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="installclean_files">installclean_files</a></h3>
<p>
需要清除的安装目录文件<br/>
installclean_files&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;$(HOST_OUT)/obj/NOTICE_FILES&nbsp;\<br/>
$(HOST_OUT)/sdk&nbsp;\<br/>
$(PRODUCT_OUT)/*.img&nbsp;\<br/>
$(PRODUCT_OUT)/*.txt&nbsp;\<br/>
$(PRODUCT_OUT)/*.xlb&nbsp;\<br/>
$(PRODUCT_OUT)/*.zip&nbsp;\<br/>
$(PRODUCT_OUT)/*.zip.md5sum&nbsp;\<br/>
$(PRODUCT_OUT)/data&nbsp;\<br/>
$(PRODUCT_OUT)/obj/APPS&nbsp;\<br/>
$(PRODUCT_OUT)/obj/NOTICE_FILES&nbsp;\<br/>
$(PRODUCT_OUT)/obj/PACKAGING&nbsp;\<br/>
$(PRODUCT_OUT)/recovery&nbsp;\<br/>
$(PRODUCT_OUT)/root&nbsp;\<br/>
$(PRODUCT_OUT)/system&nbsp;\<br/>
$(PRODUCT_OUT)/dex_bootjars&nbsp;\<br/>
$(PRODUCT_OUT)/obj/JAVA_LIBRARIES&nbsp;\<br/>
$(PRODUCT_OUT)/obj/FAKE<br/>
</p>
</div>
<div class="variable">
<h3><a id="dataclean_files">dataclean_files</a></h3>
<p>
需要清除的data文件<br/>
dataclean_files&nbsp;:=&nbsp;\<br/>
$(PRODUCT_OUT)/data/*&nbsp;\<br/>
$(PRODUCT_OUT)/data-qemu/*&nbsp;\<br/>
$(PRODUCT_OUT)/userdata-qemu.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="dataclean">Target:&nbsp;&nbsp;dataclean</a></h3>
<p>
清除data/*&nbsp;/data-qemu/*&nbsp;userdata-qemu.img文件<br/>
</p>
</div>
<div class="build_target">
<h3><a id="installclean">Target:&nbsp;&nbsp;installclean</a></h3>
<p>
清除安装文件及data文件<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
