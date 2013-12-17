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
<h3>build/core/tasks/factory_ramdisk.mk</h3>
<p>
定义了生成factory_ramdisk.img的规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_FACTORY_RAMDISK_OUT">TARGET_FACTORY_RAMDISK_OUT</a></h3>
<p>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_FACTORY_RAMDISK_MODULES">PRODUCT_FACTORY_RAMDISK_MODULES</a></h3>
<p>
PRODUCT_FACTORY_RAMDISK_MODULES&nbsp;由元组&nbsp;"<module_name>:<install_path>[<module_name>:<install_path>...]"&nbsp;组成<br/>
install_path&nbsp;是&nbsp;$(TARGET_FACTORY_RAMDISK_OUT)的&nbsp;相对路径&nbsp;<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;PRODUCT_FACTORY_BUNDLE_MODULES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;toolbox:system/bin/toolbox&nbsp;adbd:sbin/adbd&nbsp;adb:system/bin/adb<br/>
</p>
</div>
<div class="variable">
<h3><a id="factory_ramdisk_modules">factory_ramdisk_modules</a></h3>
<p>
factory_ramdisk_modules&nbsp;:=&nbsp;$(strip&nbsp;$(PRODUCTS.$(INTERNAL_PRODUCT).PRODUCT_FACTORY_RAMDISK_MODULES))<br/>
某一个Product的PRODUCT_FACTORY_RAMDISK_MODULES<br/>
</p>
</div>
<div class="function">
<h3><a id="install-one-factory-ramdisk-module">Function:&nbsp;&nbsp;install-one-factory-ramdisk-module</a></h3>
<p>
A&nbsp;module&nbsp;name&nbsp;may&nbsp;end&nbsp;up&nbsp;in&nbsp;multiple&nbsp;modules&nbsp;(so&nbsp;multiple&nbsp;built&nbsp;files)<br/>
with&nbsp;the&nbsp;same&nbsp;name.<br/>
This&nbsp;function&nbsp;selects&nbsp;the&nbsp;module&nbsp;built&nbsp;file&nbsp;based&nbsp;on&nbsp;the&nbsp;install&nbsp;path.<br/>
$(1):&nbsp;the&nbsp;dest&nbsp;install&nbsp;path<br/>
$(2):&nbsp;the&nbsp;module&nbsp;built&nbsp;files<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_FACTORY_RAMDISK_EXTRA_MODULES_FILES">INTERNAL_FACTORY_RAMDISK_EXTRA_MODULES_FILES</a></h3>
<p>
INTERNAL_FACTORY_RAMDISK_EXTRA_MODULES_FILES&nbsp;:=<br/>
$(foreach&nbsp;m,&nbsp;$(factory_ramdisk_modules),&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(eval&nbsp;_fr_m_tuple&nbsp;:=&nbsp;$(subst&nbsp;:,&nbsp;,$(m)))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(eval&nbsp;_fr_m_name&nbsp;:=&nbsp;$(word&nbsp;1,$(_fr_m_tuple)))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(eval&nbsp;_fr_dests&nbsp;:=&nbsp;$(wordlist&nbsp;2,999,$(_fr_m_tuple)))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(eval&nbsp;_fr_m_built&nbsp;:=&nbsp;$(filter&nbsp;$(PRODUCT_OUT)/%,&nbsp;$(ALL_MODULES.$(_fr_m_name).BUILT)))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(foreach&nbsp;d,$(_fr_dests),$(call&nbsp;install-one-factory-ramdisk-module,$(d),$(_fr_m_built)))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;)<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_FACTORY_RAMDISK_FILES">INTERNAL_FACTORY_RAMDISK_FILES</a></h3>
<p>
Files&nbsp;may&nbsp;also&nbsp;be&nbsp;installed&nbsp;via&nbsp;PRODUCT_COPY_FILES,&nbsp;PRODUCT_PACKAGES&nbsp;etc.<br/>
INTERNAL_FACTORY_RAMDISK_FILES&nbsp;:=&nbsp;$(filter&nbsp;$(TARGET_FACTORY_RAMDISK_OUT)/%,&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(ALL_DEFAULT_INSTALLED_MODULES))<br/>
$(eval&nbsp;$(call&nbsp;copy-one-file,$(TARGET_OUT)/build.prop,$(TARGET_FACTORY_RAMDISK_OUT)/system/build.prop))<br/>
&nbsp;&nbsp;&nbsp;INTERNAL_FACTORY_RAMDISK_FILES&nbsp;+=&nbsp;$(TARGET_FACTORY_RAMDISK_OUT)/system/build.prop<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILT_FACTORY_RAMDISK_FS">BUILT_FACTORY_RAMDISK_FS</a></h3>
<p>
BUILT_FACTORY_RAMDISK_FS&nbsp;:=&nbsp;$(PRODUCT_OUT)/factory_ramdisk.gz<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk.gz<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILT_FACTORY_RAMDISK_TARGET">BUILT_FACTORY_RAMDISK_TARGET</a></h3>
<p>
BUILT_FACTORY_RAMDISK_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/factory_ramdisk.img<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_FACTORY_RAMDISK_FS">INSTALLED_FACTORY_RAMDISK_FS</a></h3>
<p>
INSTALLED_FACTORY_RAMDISK_FS&nbsp;:=&nbsp;$(BUILT_FACTORY_RAMDISK_FS)<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk.gz<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_FACTORY_RAMDISK_FS">INSTALLED_FACTORY_RAMDISK_FS</a></h3>
<p>
INSTALLED_FACTORY_RAMDISK_FS&nbsp;:=&nbsp;$(BUILT_FACTORY_RAMDISK_FS)<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_FACTORY_RAMDISK_FS)">Target:&nbsp;&nbsp;$(INSTALLED_FACTORY_RAMDISK_FS)</a></h3>
<p>
用mkbootfs程序和minigzip程序对$(TARGET_FACTORY_RAMDISK_OUT)处理得到factory_ramdisk.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RAMDISK_KERNEL">TARGET_RAMDISK_KERNEL</a></h3>
<p>
TARGET_RAMDISK_KERNEL&nbsp;:=&nbsp;$(INSTALLED_KERNEL_TARGET)<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/kernel<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_FACTORY_RAMDISK_TARGET">INSTALLED_FACTORY_RAMDISK_TARGET</a></h3>
<p>
INSTALLED_FACTORY_RAMDISK_TARGET&nbsp;:=&nbsp;$(BUILT_FACTORY_RAMDISK_TARGET)<br/>
示例：<br/>
&nbsp;&nbsp;out/target/product/i9100/factory_ramdisk.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="RAMDISK_CMDLINE">RAMDISK_CMDLINE</a></h3>
<p>
ifneq&nbsp;(,$(BOARD_KERNEL_CMDLINE_FACTORY_BOOT))<br/>
&nbsp;&nbsp;RAMDISK_CMDLINE&nbsp;:=&nbsp;--cmdline&nbsp;"$(BOARD_KERNEL_CMDLINE_FACTORY_BOOT)"<br/>
else<br/>
&nbsp;&nbsp;RAMDISK_CMDLINE&nbsp;:=<br/>
endif&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_FACTORY_RAMDISK_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_FACTORY_RAMDISK_TARGET)</a></h3>
<p>
调用mkboogimg程序生成factory_ramdisk.img<br/>
$(INSTALLED_FACTORY_RAMDISK_TARGET)&nbsp;:&nbsp;$(MKBOOTIMG)&nbsp;$(TARGET_RAMDISK_KERNEL)&nbsp;$(INSTALLED_FACTORY_RAMDISK_FS)<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;pretty,"Target&nbsp;factory&nbsp;ram&nbsp;disk&nbsp;img&nbsp;format:&nbsp;$@")<br/>
&nbsp;&nbsp;&nbsp;$(MKBOOTIMG)&nbsp;--kernel&nbsp;$(TARGET_RAMDISK_KERNEL)&nbsp;--ramdisk&nbsp;$(INSTALLED_FACTORY_RAMDISK_FS)&nbsp;\<br/>
--base&nbsp;$(BOARD_KERNEL_BASE)&nbsp;$(BOARD_MKBOOTIMG_ARGS)&nbsp;$(RAMDISK_CMDLINE)&nbsp;--output&nbsp;$@&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
