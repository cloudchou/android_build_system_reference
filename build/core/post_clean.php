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
<h3>build/core/post_clean.mk</h3>
<p>
Clean&nbsp;steps&nbsp;that&nbsp;need&nbsp;global&nbsp;knowledge&nbsp;of&nbsp;individual&nbsp;modules.<br/>
This&nbsp;file&nbsp;must&nbsp;be&nbsp;included&nbsp;after&nbsp;all&nbsp;Android.mks&nbsp;have&nbsp;been&nbsp;loaded.<br/>
Checks&nbsp;the&nbsp;current&nbsp;build&nbsp;configurations&nbsp;against&nbsp;the&nbsp;previous&nbsp;build,<br/>
clean&nbsp;artifacts&nbsp;in&nbsp;TARGET_COMMON_OUT_ROOT&nbsp;if&nbsp;necessary.<br/>
If&nbsp;a&nbsp;package's&nbsp;resource&nbsp;overlay&nbsp;has&nbsp;been&nbsp;changed,&nbsp;its&nbsp;R&nbsp;class&nbsp;needs&nbsp;to&nbsp;be<br/>
regenerated.<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
