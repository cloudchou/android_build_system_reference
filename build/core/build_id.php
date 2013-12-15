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
<h3>build/core/build_id.mk</h3>
<p>
定义变量BUILD_ID<br/>
export&nbsp;BUILD_ID=JDQ39E<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_ID">BUILD_ID</a></h3>
<p>
BUILD_ID通常用来指定分支名字.<br/>
它通常只是一个单词，并且有约定俗成的命名规则<br/>
BUILD_ID&nbsp;is&nbsp;usually&nbsp;used&nbsp;to&nbsp;specify&nbsp;the&nbsp;branch&nbsp;name<br/>
(like&nbsp;"MAIN")&nbsp;or&nbsp;a&nbsp;branch&nbsp;name&nbsp;and&nbsp;a&nbsp;release&nbsp;candidate<br/>
(like&nbsp;"CRB01").&nbsp;&nbsp;It&nbsp;must&nbsp;be&nbsp;a&nbsp;single&nbsp;word,&nbsp;and&nbsp;is<br/>
capitalized&nbsp;by&nbsp;convention<br/>
export&nbsp;BUILD_ID=JDQ39E&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
