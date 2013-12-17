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
<h3>build/core/tasks/vendor_module_check.mk</h3>
<p>
vendor&nbsp;module&nbsp;check<br/>
</p>
</div>
<div class="variable">
<h3><a id="_vendor_owner_whitelist">_vendor_owner_whitelist</a></h3>
<p>
Restrict&nbsp;the&nbsp;vendor&nbsp;module&nbsp;owners&nbsp;here.&nbsp;&nbsp;&nbsp;<br/>
_vendor_owner_whitelist&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;asus&nbsp;\<br/>
&nbsp;&nbsp;audience&nbsp;\<br/>
&nbsp;&nbsp;broadcom&nbsp;\<br/>
&nbsp;&nbsp;csr&nbsp;\<br/>
&nbsp;&nbsp;elan&nbsp;\<br/>
&nbsp;&nbsp;google&nbsp;\<br/>
&nbsp;&nbsp;imgtec&nbsp;\<br/>
&nbsp;&nbsp;invensense&nbsp;\<br/>
&nbsp;&nbsp;lge&nbsp;\<br/>
&nbsp;&nbsp;nvidia&nbsp;\<br/>
&nbsp;&nbsp;nxp&nbsp;\<br/>
&nbsp;&nbsp;qcom&nbsp;\<br/>
&nbsp;&nbsp;samsung&nbsp;\<br/>
&nbsp;&nbsp;samsung_arm&nbsp;\<br/>
&nbsp;&nbsp;ti&nbsp;\<br/>
&nbsp;&nbsp;trusted_logic&nbsp;\<br/>
&nbsp;&nbsp;widevine<br/>
</p>
</div>
<div class="variable">
<h3><a id="_vendor_check_modules">_vendor_check_modules</a></h3>
<p>
_vendor_check_modules&nbsp;:=&nbsp;$(sort&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_PACKAGES))<br/>
$(call&nbsp;expand-required-modules,_vendor_check_modules,$(_vendor_check_modules))<br/>
</p>
</div>
<div class="variable">
<h3><a id="_vendor_check_copy_files">_vendor_check_copy_files</a></h3>
<p>
_vendor_check_copy_files&nbsp;:=&nbsp;$(filter&nbsp;vendor/%,&nbsp;$(PRODUCT_COPY_FILES))<br/>
</p>
</div>
<div class="variable">
<h3><a id="_vendor_module_owner_info">_vendor_module_owner_info</a></h3>
<p>
ifneq&nbsp;(,$(_vendor_check_copy_files))<br/>
$(foreach&nbsp;c,&nbsp;$(_vendor_check_copy_files),&nbsp;\<br/>
&nbsp;&nbsp;$(if&nbsp;$(filter&nbsp;$(_vendor_owner_whitelist),&nbsp;$(call&nbsp;word-colon,3,$(c))),,\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(error&nbsp;Error:&nbsp;vendor&nbsp;PRODUCT_COPY_FILES&nbsp;file&nbsp;"$(c)"&nbsp;has&nbsp;unknown&nbsp;owner))\<br/>
&nbsp;&nbsp;$(eval&nbsp;_vendor_module_owner_info&nbsp;+=&nbsp;$(call&nbsp;word-colon,2,$(c)):$(call&nbsp;word-colon,3,$(c))))<br/>
endif<br/>
$(foreach&nbsp;m,&nbsp;$(_vendor_check_modules),&nbsp;\<br/>
&nbsp;&nbsp;$(if&nbsp;$(filter&nbsp;vendor/%,&nbsp;$(ALL_MODULES.$(m).PATH)),\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(if&nbsp;$(filter&nbsp;$(_vendor_owner_whitelist),&nbsp;$(ALL_MODULES.$(m).OWNER)),,\<br/>
$(error&nbsp;Error:&nbsp;vendor&nbsp;module&nbsp;"$(m)"&nbsp;in&nbsp;$(ALL_MODULES.$(m).PATH)&nbsp;with&nbsp;unknown&nbsp;owner&nbsp;\<br/>
&nbsp;&nbsp;"$(ALL_MODULES.$(m).OWNER)"&nbsp;in&nbsp;product&nbsp;"$(TARGET_PRODUCT)"))\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(if&nbsp;$(ALL_MODULES.$(m).INSTALLED),\<br/>
$(eval&nbsp;_vendor_module_owner_info&nbsp;+=&nbsp;$(patsubst&nbsp;$(PRODUCT_OUT)/%,%,$(ALL_MODULES.$(m).INSTALLED)):$(ALL_MODULES.$(m).OWNER)))))<br/>
</p>
</div>
<div class="variable">
<h3><a id="_vendor_module_owner_info_txt">_vendor_module_owner_info_txt</a></h3>
<p>
_vendor_module_owner_info_txt&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,PACKAGING,vendor_owner_info)/vendor_owner_info.txt<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(_vendor_module_owner_info_txt)">Target:&nbsp;&nbsp;$(_vendor_module_owner_info_txt)</a></h3>
<p>
生成vendor_owner_info.txt<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
