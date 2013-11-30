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
<h3>build/target/product/full.mk</h3>
<p>
This&nbsp;is&nbsp;a&nbsp;build&nbsp;configuration&nbsp;for&nbsp;a&nbsp;full-featured&nbsp;build&nbsp;of&nbsp;the<br/>
Open-Source&nbsp;part&nbsp;of&nbsp;the&nbsp;tree.&nbsp;It's&nbsp;geared&nbsp;toward&nbsp;a&nbsp;US-centric<br/>
build&nbsp;quite&nbsp;specifically&nbsp;for&nbsp;the&nbsp;emulator,&nbsp;and&nbsp;might&nbsp;not&nbsp;be<br/>
entirely&nbsp;appropriate&nbsp;to&nbsp;inherit&nbsp;from&nbsp;for&nbsp;on-device&nbsp;configurations.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">■ &nbsp;&nbsp;PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;full<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">■ &nbsp;&nbsp;PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">■ &nbsp;&nbsp;PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;Android<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_MODEL">■ &nbsp;&nbsp;PRODUCT_MODEL</a></h3>
<p>
PRODUCT_MODEL&nbsp;:=&nbsp;Full&nbsp;Android&nbsp;on&nbsp;Emulator<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
