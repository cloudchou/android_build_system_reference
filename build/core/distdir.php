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
<h3>build/core/distdir.mk</h3>
<p>
如果用户指定了dist目标，那么用户要求将重要文件拷贝到DIST_DIR目录下&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="dist">Target:&nbsp;&nbsp;dist</a></h3>
<p>
先按默认目标编译，然后将重要文件会拷贝到DIST_DIR下，<br/>
在Makefile和main.mk里经常调用dist-for-goals，<br/>
在这种情况下的文件便会被拷贝至$(DIST_DIR)下<br/>
</p>
</div>
<div class="variable">
<h3><a id="DIST_DIR">DIST_DIR</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;　out/dist<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-one-dist-file">Function:&nbsp;&nbsp;copy-one-dist-file</a></h3>
<p>
$(1):&nbsp;source&nbsp;file<br/>
$(2):&nbsp;destination&nbsp;file<br/>
$(3):&nbsp;goals&nbsp;that&nbsp;should&nbsp;copy&nbsp;the&nbsp;file<br/>
</p>
</div>
<div class="variable">
<h3><a id="dist-for-goals">dist-for-goals</a></h3>
<p>
$(1):&nbsp;a&nbsp;list&nbsp;of&nbsp;goals&nbsp;&nbsp;(e.g.&nbsp;droid,&nbsp;sdk,&nbsp;pdk,&nbsp;ndk)<br/>
$(2):&nbsp;the&nbsp;dist&nbsp;files&nbsp;to&nbsp;add&nbsp;to&nbsp;those&nbsp;goals.&nbsp;&nbsp;If&nbsp;the&nbsp;file&nbsp;contains&nbsp;':',<br/>
the&nbsp;text&nbsp;following&nbsp;the&nbsp;colon&nbsp;is&nbsp;the&nbsp;name&nbsp;that&nbsp;the&nbsp;file&nbsp;is&nbsp;copied<br/>
to&nbsp;under&nbsp;the&nbsp;dist&nbsp;directory.&nbsp;&nbsp;Subdirs&nbsp;are&nbsp;ok,&nbsp;and&nbsp;will&nbsp;be&nbsp;created<br/>
at&nbsp;copy&nbsp;time&nbsp;if&nbsp;necessary.<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
