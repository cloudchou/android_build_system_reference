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
<h3>build/core/node_fns.mk</h3>
<p>
定义了一些函数<br/>
</p>
</div>
<div class="variable">
<h3><a id="[clear-var-list]">■ &nbsp;&nbsp;[clear-var-list]</a></h3>
<p>
Clears&nbsp;a&nbsp;list&nbsp;of&nbsp;variables&nbsp;using&nbsp;":=".<br/>
#&nbsp;E.g.,<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;clear-var-list,A&nbsp;B&nbsp;C)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;would&nbsp;be&nbsp;the&nbsp;same&nbsp;as:<br/>
&nbsp;A&nbsp;:=<br/>
&nbsp;B&nbsp;:=<br/>
&nbsp;C&nbsp;:=&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(1):&nbsp;list&nbsp;of&nbsp;variable&nbsp;names&nbsp;to&nbsp;clear<br/>
</p>
</div>
<div class="variable">
<h3><a id="[copy-var-list]">■ &nbsp;&nbsp;[copy-var-list]</a></h3>
<p>
Copies&nbsp;a&nbsp;list&nbsp;of&nbsp;variables&nbsp;into&nbsp;another&nbsp;list&nbsp;of&nbsp;variables.<br/>
The&nbsp;target&nbsp;list&nbsp;is&nbsp;the&nbsp;same&nbsp;as&nbsp;the&nbsp;source&nbsp;list,&nbsp;but&nbsp;has<br/>
a&nbsp;dotted&nbsp;prefix&nbsp;affixed&nbsp;to&nbsp;it.<br/>
$(call&nbsp;copy-var-list,&nbsp;PREFIX,&nbsp;A&nbsp;B)<br/>
&nbsp;would&nbsp;be&nbsp;the&nbsp;same&nbsp;as:<br/>
&nbsp;PREFIX.A&nbsp;:=&nbsp;$(A)<br/>
&nbsp;PREFIX.B&nbsp;:=&nbsp;$(B)<br/>
&nbsp;$(1):&nbsp;destination&nbsp;prefix<br/>
&nbsp;&nbsp;$(2):&nbsp;list&nbsp;of&nbsp;variable&nbsp;names&nbsp;to&nbsp;copy<br/>
</p>
</div>
<div class="variable">
<h3><a id="[move-var-list]">■ &nbsp;&nbsp;[move-var-list]</a></h3>
<p>
Moves&nbsp;a&nbsp;list&nbsp;of&nbsp;variables&nbsp;into&nbsp;another&nbsp;list&nbsp;of&nbsp;variables.<br/>
The&nbsp;variable&nbsp;names&nbsp;differ&nbsp;by&nbsp;a&nbsp;prefix.&nbsp;&nbsp;After&nbsp;moving,&nbsp;the<br/>
source&nbsp;variable&nbsp;is&nbsp;cleared.&nbsp;&nbsp;&nbsp;&nbsp;<br/>
NOTE:&nbsp;Spaces&nbsp;are&nbsp;not&nbsp;allowed&nbsp;around&nbsp;the&nbsp;prefixes.&nbsp;&nbsp;&nbsp;&nbsp;<br/>
E.g.,<br/>
&nbsp;&nbsp;$(call&nbsp;move-var-list,SRC,DST,A&nbsp;B)<br/>
would&nbsp;be&nbsp;the&nbsp;same&nbsp;as:<br/>
&nbsp;&nbsp;DST.A&nbsp;:=&nbsp;$(SRC.A)<br/>
&nbsp;&nbsp;SRC.A&nbsp;:=<br/>
&nbsp;&nbsp;DST.B&nbsp;:=&nbsp;$(SRC.B)<br/>
&nbsp;&nbsp;SRC.B&nbsp;:=&nbsp;&nbsp;&nbsp;&nbsp;<br/>
$(1):&nbsp;source&nbsp;prefix<br/>
$(2):&nbsp;destination&nbsp;prefix<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(3):&nbsp;list&nbsp;of&nbsp;variable&nbsp;names&nbsp;to&nbsp;move<br/>
</p>
</div>
<div class="variable">
<h3><a id="[uniq-word]">■ &nbsp;&nbsp;[uniq-word]</a></h3>
<p>
$(1):&nbsp;haystack<br/>
$(2):&nbsp;needle<br/>
Guarantees&nbsp;that&nbsp;needle&nbsp;appears&nbsp;at&nbsp;most&nbsp;once&nbsp;in&nbsp;haystack,<br/>
without&nbsp;changing&nbsp;the&nbsp;order&nbsp;of&nbsp;other&nbsp;elements&nbsp;in&nbsp;haystack.<br/>
If&nbsp;needle&nbsp;appears&nbsp;multiple&nbsp;times,&nbsp;only&nbsp;the&nbsp;first&nbsp;occurrance<br/>
will&nbsp;survive.<br/>
How&nbsp;it&nbsp;works:<br/>
-&nbsp;Stick&nbsp;everything&nbsp;in&nbsp;haystack&nbsp;into&nbsp;a&nbsp;single&nbsp;word,<br/>
&nbsp;&nbsp;with&nbsp;"|||"&nbsp;separating&nbsp;the&nbsp;words.<br/>
-&nbsp;Replace&nbsp;occurrances&nbsp;of&nbsp;"|||$(needle)|||"&nbsp;with&nbsp;"|||&nbsp;|||",<br/>
&nbsp;&nbsp;breaking&nbsp;haystack&nbsp;back&nbsp;into&nbsp;multiple&nbsp;words,&nbsp;with&nbsp;spaces<br/>
&nbsp;&nbsp;where&nbsp;needle&nbsp;appeared.<br/>
-&nbsp;Add&nbsp;needle&nbsp;between&nbsp;the&nbsp;first&nbsp;and&nbsp;second&nbsp;words&nbsp;of&nbsp;haystack.<br/>
-&nbsp;Replace&nbsp;"|||"&nbsp;with&nbsp;spaces,&nbsp;breaking&nbsp;haystack&nbsp;back&nbsp;into<br/>
&nbsp;&nbsp;individual&nbsp;words.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-inherited-nodes]">■ &nbsp;&nbsp;[get-inherited-nodes]</a></h3>
<p>
Walks&nbsp;through&nbsp;the&nbsp;list&nbsp;of&nbsp;variables,&nbsp;each&nbsp;qualified&nbsp;by&nbsp;the&nbsp;prefix,<br/>
and&nbsp;finds&nbsp;instances&nbsp;of&nbsp;words&nbsp;beginning&nbsp;with&nbsp;INHERIT_TAG.&nbsp;&nbsp;Scrape<br/>
off&nbsp;INHERIT_TAG&nbsp;from&nbsp;each&nbsp;matching&nbsp;word,&nbsp;and&nbsp;return&nbsp;the&nbsp;sorted,<br/>
unique&nbsp;set&nbsp;of&nbsp;those&nbsp;words.<br/>
E.g.,&nbsp;given<br/>
&nbsp;&nbsp;PREFIX.A&nbsp;:=&nbsp;A&nbsp;$(INHERIT_TAG)aaa&nbsp;B&nbsp;C<br/>
&nbsp;&nbsp;PREFIX.B&nbsp;:=&nbsp;B&nbsp;$(INHERIT_TAG)aaa&nbsp;C&nbsp;$(INHERIT_TAG)bbb&nbsp;D&nbsp;E<br/>
Then<br/>
&nbsp;&nbsp;$(call&nbsp;get-inherited-nodes,PREFIX,A&nbsp;B)<br/>
returns<br/>
&nbsp;&nbsp;aaa&nbsp;bbb<br/>
$(1):&nbsp;variable&nbsp;prefix<br/>
$(2):&nbsp;list&nbsp;of&nbsp;variables&nbsp;to&nbsp;check<br/>
</p>
</div>
<div class="variable">
<h3><a id="[import-nodes]">■ &nbsp;&nbsp;[import-nodes]</a></h3>
<p>
$(1):&nbsp;output&nbsp;list&nbsp;variable&nbsp;name,&nbsp;like&nbsp;"PRODUCTS"&nbsp;or&nbsp;"DEVICES"<br/>
$(2):&nbsp;list&nbsp;of&nbsp;makefiles&nbsp;representing&nbsp;nodes&nbsp;to&nbsp;import<br/>
$(3):&nbsp;list&nbsp;of&nbsp;node&nbsp;variable&nbsp;names<br/>
&nbsp;&nbsp;&nbsp;示例：<br/>
&nbsp;./build/core/product.mk:144:$(call&nbsp;import-nodes,PRODUCTS,$(1),$(_product_var_list))<br/>
&nbsp;./build/core/device.mk:46:$(call&nbsp;import-nodes,DEVICES,$(1),$(_device_var_list))<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
