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
<h3>build/core/tasks/factory_bundle.mk</h3>
<p>
定义了生成&nbsp;factory&nbsp;bundle&nbsp;的&nbsp;规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_FACTORY_BUNDLE_MODULES">PRODUCT_FACTORY_BUNDLE_MODULES</a></h3>
<p>
PRODUCT_FACTORY_BUNDLE_MODULES&nbsp;由元组&nbsp;"<module_name>:<install_path>[<module_name>:<install_path>...]"&nbsp;组成<br/>
install_path&nbsp;是&nbsp;针对&nbsp;存储bundle的临时目录的&nbsp;相对路径<br/>
这里只有&nbsp;host模块可以被安装<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;PRODUCT_FACTORY_BUNDLE_MODULES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;adb:adb&nbsp;fastboot:fastboot<br/>
</p>
</div>
<div class="variable">
<h3><a id="requested_modules">requested_modules</a></h3>
<p>
requested_modules&nbsp;:=&nbsp;$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_FACTORY_BUNDLE_MODULES))<br/>
某一个Product的PRODUCT_FACTORY_BUNDLE_MODULES&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="root_dir">root_dir</a></h3>
<p>
root_dir&nbsp;:=&nbsp;$(PRODUCT_OUT)/factory_bundle<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_bundle<br/>
</p>
</div>
<div class="variable">
<h3><a id="leaf">leaf</a></h3>
<p>
leaf&nbsp;:=&nbsp;$(strip&nbsp;$(TARGET_PRODUCT))-factory_bundle-$(FILE_NAME_TAG)<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;cm_i9100-factory_bundle-eng.cloud<br/>
</p>
</div>
<div class="variable">
<h3><a id="named_dir">named_dir</a></h3>
<p>
named_dir&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(leaf)<br/>
示例：<br/>
&nbsp;out/target/product/i9100/factory_bundle/cm_i9100-factory_bundle-eng.cloud<br/>
</p>
</div>
<div class="variable">
<h3><a id="tarball">tarball</a></h3>
<p>
tarball&nbsp;:=&nbsp;$(PRODUCT_OUT)/$(leaf).tgz<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_bundle/cm_i9100-factory_bundle-eng.cloud.tgz<br/>
</p>
</div>
<div class="variable">
<h3><a id="copied_files">copied_files</a></h3>
<p>
copied_files&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(foreach&nbsp;_fb_m,&nbsp;$(requested_modules),&nbsp;$(strip&nbsp;\<br/>
$(eval&nbsp;_fb_m_tuple&nbsp;:=&nbsp;$(subst&nbsp;:,&nbsp;,$(_fb_m)))&nbsp;\<br/>
$(eval&nbsp;_fb_m_name&nbsp;:=&nbsp;$(word&nbsp;1,$(_fb_m_tuple)))&nbsp;\<br/>
$(eval&nbsp;_fb_dests&nbsp;:=&nbsp;$(wordlist&nbsp;2,999,$(_fb_m_tuple)))&nbsp;\<br/>
$(eval&nbsp;_fb_m_built&nbsp;:=&nbsp;$(filter&nbsp;$(HOST_OUT)/%,&nbsp;$(ALL_MODULES.$(_fb_m_name).BUILT)))&nbsp;\<br/>
$(if&nbsp;$(_fb_m_built),,$(error&nbsp;no&nbsp;built&nbsp;file&nbsp;in&nbsp;requested_modules&nbsp;for&nbsp;'$(_fb_m_built)'))\<br/>
$(foreach&nbsp;_fb_f,$(_fb_dests),$(eval&nbsp;$(call&nbsp;copy-one-file,$(_fb_m_built),$(root_dir)/$(_fb_f))))\<br/>
$(addprefix&nbsp;$(root_dir)/,$(_fb_dests))&nbsp;\<br/>
))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(filter&nbsp;$(root_dir)/%,&nbsp;$(ALL_DEFAULT_INSTALLED_MODULES))&nbsp;<br/>
$(eval&nbsp;$(call&nbsp;copy-one-file,$(TARGET_OUT)/build.prop,$(root_dir)/build.prop))<br/>
&nbsp;copied_files&nbsp;+=&nbsp;$(root_dir)/build.prop&nbsp;<br/>
$(eval&nbsp;$(call&nbsp;copy-one-file,$(PRODUCT_OUT)/factory_ramdisk.img,$(root_dir)/factory_ramdisk.img))<br/>
&nbsp;copied_files&nbsp;+=&nbsp;$(root_dir)/factory_ramdisk.img&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(tarball)">Target:&nbsp;&nbsp;$(tarball)</a></h3>
<p>
删除&nbsp;&nbsp;$(named_dir)<br/>
然后：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(hide)&nbsp;(&nbsp;cp&nbsp;-r&nbsp;$(PRIVATE_ROOT_DIR)&nbsp;$(PRIVATE_NAMED_DIR)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&&&nbsp;tar&nbsp;cfz&nbsp;$@&nbsp;-C&nbsp;$(dir&nbsp;$(PRIVATE_NAMED_DIR))&nbsp;$(notdir&nbsp;$(PRIVATE_NAMED_DIR))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&&&nbsp;rm&nbsp;-rf&nbsp;$(PRIVATE_NAMED_DIR)<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
