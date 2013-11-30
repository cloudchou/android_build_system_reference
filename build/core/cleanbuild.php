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
<h3><a id="INTERNAL_CLEAN_STEPS">■ &nbsp;&nbsp;INTERNAL_CLEAN_STEPS</a></h3>
<p>
清除步骤&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="add-clean-step">■ &nbsp;&nbsp;add-clean-step</a></h3>
<p>
Builds&nbsp;up&nbsp;a&nbsp;list&nbsp;of&nbsp;clean&nbsp;steps.&nbsp;&nbsp;Creates&nbsp;a&nbsp;unique<br/>
id&nbsp;for&nbsp;each&nbsp;step&nbsp;by&nbsp;taking&nbsp;makefile&nbsp;path,&nbsp;INTERNAL_CLEAN_BUILD_VERSION<br/>
and&nbsp;appending&nbsp;an&nbsp;increasing&nbsp;number&nbsp;of&nbsp;'@'&nbsp;characters<br/>
$(1):&nbsp;shell&nbsp;command&nbsp;to&nbsp;run<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_CLEAN_BUILD_VERSION">■ &nbsp;&nbsp;INTERNAL_CLEAN_BUILD_VERSION</a></h3>
<p>
Defines&nbsp;INTERNAL_CLEAN_BUILD_VERSION&nbsp;and&nbsp;the&nbsp;individual&nbsp;clean&nbsp;steps.<br/>
cleanspec.mk&nbsp;is&nbsp;outside&nbsp;of&nbsp;the&nbsp;core&nbsp;directory&nbsp;so&nbsp;that&nbsp;more&nbsp;people<br/>
&nbsp;can&nbsp;have&nbsp;permission&nbsp;to&nbsp;touch&nbsp;it.<br/>
</p>
</div>
<div class="variable">
<h3><a id="CURRENT_CLEAN_BUILD_VERSION">■ &nbsp;&nbsp;CURRENT_CLEAN_BUILD_VERSION</a></h3>
<p>
If&nbsp;the&nbsp;clean_steps.mk&nbsp;file&nbsp;is&nbsp;missing&nbsp;(usually&nbsp;after&nbsp;a&nbsp;clean&nbsp;build)<br/>
then&nbsp;we&nbsp;won't&nbsp;do&nbsp;anything.<br/>
</p>
</div>
<div class="variable">
<h3><a id="installclean_files">■ &nbsp;&nbsp;installclean_files</a></h3>
<p>
需要清除的安装目录文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="dataclean_files">■ &nbsp;&nbsp;dataclean_files</a></h3>
<p>
需要清除的data文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[[dataclean]]">■ &nbsp;&nbsp;[[dataclean]]</a></h3>
<p>
清除data/*&nbsp;/data-qemu/*&nbsp;userdata-qemu.img文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="[[installclean]]">■ &nbsp;&nbsp;[[installclean]]</a></h3>
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
