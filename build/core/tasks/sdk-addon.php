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
<h3>build/core/tasks/sdk-addon.mk</h3>
<p>
定义生成生成sdk_addon的规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="addon_name">addon_name</a></h3>
<p>
addon_name&nbsp;:=&nbsp;$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_SDK_ADDON_NAME))<br/>
</p>
</div>
<div class="variable">
<h3><a id="addon_dir_leaf">addon_dir_leaf</a></h3>
<p>
addon_dir_leaf&nbsp;:=&nbsp;$(addon_name)-$(FILE_NAME_TAG)-$(INTERNAL_SDK_HOST_OS_NAME)<br/>
</p>
</div>
<div class="variable">
<h3><a id="intermediates">intermediates</a></h3>
<p>
intermediates&nbsp;:=&nbsp;$(HOST_OUT_INTERMEDIATES)/SDK_ADDON/$(addon_name)_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="full_target">full_target</a></h3>
<p>
full_target&nbsp;:=&nbsp;$(HOST_OUT_SDK_ADDON)/$(addon_dir_leaf).zip<br/>
</p>
</div>
<div class="variable">
<h3><a id="staging">staging</a></h3>
<p>
staging&nbsp;:=&nbsp;$(intermediates)/$(addon_dir_leaf)<br/>
</p>
</div>
<div class="variable">
<h3><a id="sdk_addon_deps">sdk_addon_deps</a></h3>
<p>
sdk_addon_deps&nbsp;:=<br/>
$(foreach&nbsp;cf,$(files_to_copy),&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;_src&nbsp;:=&nbsp;$(call&nbsp;word-colon,1,$(cf)))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;_dest&nbsp;:=&nbsp;$(call&nbsp;append-path,$(staging),$(call&nbsp;word-colon,2,$(cf))))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;$(call&nbsp;copy-one-file,$(_src),$(_dest)))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;sdk_addon_deps&nbsp;+=&nbsp;$(_dest))&nbsp;\<br/>
&nbsp;)<br/>
</p>
</div>
<div class="variable">
<h3><a id="files_to_copy">files_to_copy</a></h3>
<p>
files_to_copy&nbsp;:=<br/>
</p>
</div>
<div class="function">
<h3><a id="stub-addon-jar-file">Function:&nbsp;&nbsp;stub-addon-jar-file</a></h3>
<p>
define&nbsp;stub-addon-jar-file<br/>
$(subst&nbsp;.jar,_stub-addon.jar,$(1))<br/>
endef&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="stub-addon-jar">Function:&nbsp;&nbsp;stub-addon-jar</a></h3>
<p>
define&nbsp;stub-addon-jar<br/>
$(call&nbsp;stub-addon-jar-file,$(1)):&nbsp;$(1)&nbsp;|&nbsp;mkstubs<br/>
&nbsp;&nbsp;&nbsp;$(info&nbsp;Stubbing&nbsp;addon&nbsp;jar&nbsp;using&nbsp;$(PRODUCT_SDK_ADDON_STUB_DEFS))<br/>
&nbsp;&nbsp;&nbsp;$(hide)&nbsp;java&nbsp;-jar&nbsp;$(call&nbsp;module-installed-files,mkstubs)&nbsp;$(if&nbsp;$(hide),,--v)&nbsp;\<br/>
"$$<"&nbsp;"$$@"&nbsp;@$(PRODUCT_SDK_ADDON_STUB_DEFS)<br/>
endef&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="files_to_copy">files_to_copy</a></h3>
<p>
Files&nbsp;that&nbsp;are&nbsp;built&nbsp;and&nbsp;then&nbsp;copied&nbsp;into&nbsp;the&nbsp;sdk-addon<br/>
ifneq&nbsp;($(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_SDK_ADDON_COPY_MODULES)),)<br/>
$(foreach&nbsp;cf,$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_SDK_ADDON_COPY_MODULES),&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;_src&nbsp;:=&nbsp;$(call&nbsp;module-stubs-files,$(call&nbsp;word-colon,1,$(cf))))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;$(call&nbsp;stub-addon-jar,$(_src)))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;_src&nbsp;:=&nbsp;$(call&nbsp;stub-addon-jar-file,$(_src)))&nbsp;\<br/>
&nbsp;&nbsp;$(if&nbsp;$(_src),,$(eval&nbsp;$(error&nbsp;Unknown&nbsp;or&nbsp;unlinkable&nbsp;module:&nbsp;$(call&nbsp;word-colon,1,$(cf)).&nbsp;Requested&nbsp;by&nbsp;$(INTERNAL_PRODUCT))))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;_dest&nbsp;:=&nbsp;$(call&nbsp;word-colon,2,$(cf)))&nbsp;\<br/>
&nbsp;&nbsp;$(eval&nbsp;files_to_copy&nbsp;+=&nbsp;$(_src):$(_dest))&nbsp;\<br/>
&nbsp;)<br/>
endif<br/>
files_to_copy&nbsp;+=&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_SDK_ADDON_COPY_FILES)<br/>
files_to_copy&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;$(BUILT_SYSTEMIMAGE):images/$(TARGET_CPU_ABI)/system.img&nbsp;\<br/>
&nbsp;&nbsp;$(BUILT_USERDATAIMAGE_TARGET):images/$(TARGET_CPU_ABI)/userdata.img&nbsp;\<br/>
&nbsp;&nbsp;$(BUILT_RAMDISK_TARGET):images/$(TARGET_CPU_ABI)/ramdisk.img&nbsp;\<br/>
&nbsp;&nbsp;$(PRODUCT_OUT)/system/build.prop:images/$(TARGET_CPU_ABI)/build.prop&nbsp;\<br/>
&nbsp;&nbsp;$(target_notice_file_txt):images/$(TARGET_CPU_ABI)/NOTICE.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="doc_modules">doc_modules</a></h3>
<p>
doc_modules&nbsp;:=&nbsp;$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_SDK_ADDON_DOC_MODULES))<br/>
</p>
</div>
<div class="variable">
<h3><a id="sdk_addon_deps">sdk_addon_deps</a></h3>
<p>
sdk_addon_deps&nbsp;+=&nbsp;$(foreach&nbsp;dm,&nbsp;$(doc_modules),&nbsp;$(call&nbsp;doc-timestamp-for,&nbsp;$(dm)))<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(full_target)">Target:&nbsp;&nbsp;$(full_target)</a></h3>
<p>
$(full_target):&nbsp;$(sdk_addon_deps)&nbsp;|&nbsp;$(ACP)<br/>
@echo&nbsp;-e&nbsp;${CL_GRN}"Packaging&nbsp;SDK&nbsp;Addon:"${CL_RST}"&nbsp;$@"<br/>
$(hide)&nbsp;mkdir&nbsp;-p&nbsp;$(PRIVATE_STAGING_DIR)/docs<br/>
$(hide)&nbsp;for&nbsp;d&nbsp;in&nbsp;$(PRIVATE_DOCS_DIRS);&nbsp;do&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(ACP)&nbsp;-r&nbsp;$$d&nbsp;$(PRIVATE_STAGING_DIR)/docs&nbsp;;\<br/>
&nbsp;&nbsp;done<br/>
$(hide)&nbsp;mkdir&nbsp;-p&nbsp;$(dir&nbsp;$@)<br/>
$(hide)&nbsp;(&nbsp;F=$$(pwd)/$@&nbsp;;&nbsp;cd&nbsp;$(PRIVATE_STAGING_DIR)/..&nbsp;&&&nbsp;zip&nbsp;-rq&nbsp;$$F&nbsp;*&nbsp;)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="sdk_addon">Target:&nbsp;&nbsp;sdk_addon</a></h3>
<p>
生成sdk_addon<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDON_SDK_ZIP">ADDON_SDK_ZIP</a></h3>
<p>
If&nbsp;we're&nbsp;building&nbsp;the&nbsp;sdk_repo,&nbsp;keep&nbsp;the&nbsp;name&nbsp;of&nbsp;the&nbsp;addon&nbsp;zip<br/>
around&nbsp;so&nbsp;that&nbsp;development/build/tools/sdk_repo.mk&nbsp;can&nbsp;dist&nbsp;it<br/>
at&nbsp;the&nbsp;appropriate&nbsp;location.<br/>
ADDON_SDK_ZIP&nbsp;:=&nbsp;$(full_target)<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
