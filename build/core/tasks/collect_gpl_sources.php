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
<h3>build/core/tasks/collect_gpl_sources.mk</h3>
<p>
收集遵循gpl协议的源代码<br/>
</p>
</div>
<div class="variable">
<h3><a id="gpl_source_tgz">gpl_source_tgz</a></h3>
<p>
gpl_source_tgz&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,PACKAGING,gpl_source,HOST,COMMON)/gpl_source.tgz<br/>
示例：<br/>
&nbsp;&nbsp;out/host/common/obj/PACKAGING/gpl_source_intermediates/gpl_source.tgz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="gpl_source_tgz">Target:&nbsp;&nbsp;gpl_source_tgz</a></h3>
<p>
将所有遵循gpl协议的代码打包存至<br/>
&nbsp;&nbsp;&nbsp;out/host/common/obj/PACKAGING/gpl_source_intermediates/gpl_source.tgz<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
