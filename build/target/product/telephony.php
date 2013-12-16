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
<h3>build/target/product/telephony.mk</h3>
<p>
这是针对product级别的设置&nbsp;针对那些有&nbsp;通话硬件的&nbsp;产品<br/>
&nbsp;&nbsp;&nbsp;&nbsp;This&nbsp;is&nbsp;the&nbsp;list&nbsp;of&nbsp;product-level&nbsp;settings&nbsp;that&nbsp;are&nbsp;specific<br/>
&nbsp;&nbsp;&nbsp;&nbsp;to&nbsp;products&nbsp;that&nbsp;have&nbsp;telephony&nbsp;hardware.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Mms&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;rild<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
