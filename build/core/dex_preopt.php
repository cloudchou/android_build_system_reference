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
<h3>build/core/dex_preopt.mk</h3>
<p>
针对boot的jar对dex代码进行前置优化<br/>
Dexpreopt&nbsp;on&nbsp;the&nbsp;boot&nbsp;jars<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BOOT_JARS">DEXPREOPT_BOOT_JARS</a></h3>
<p>
DEXPREOPT_BOOT_JARS&nbsp;:=&nbsp;core:core-junit:bouncycastle:ext:framework:telephony-common:mms-common:android.policy:services:apache-xml<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BOOT_JARS_MODULES">DEXPREOPT_BOOT_JARS_MODULES</a></h3>
<p>
DEXPREOPT_BOOT_JARS_MODULES&nbsp;:=&nbsp;$(subst&nbsp;:,&nbsp;,$(DEXPREOPT_BOOT_JARS))<br/>
dex代码前置优化模块名<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BUILD_DIR">DEXPREOPT_BUILD_DIR</a></h3>
<p>
编译输出目录<br/>
&nbsp;DEXPREOPT_BUILD_DIR&nbsp;:=&nbsp;$(OUT_DIR)<br/>
&nbsp;例：/home/cloud/tmp/android_out/Cyanogenmod<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_PRODUCT_DIR">DEXPREOPT_PRODUCT_DIR</a></h3>
<p>
产品目录<br/>
&nbsp;&nbsp;&nbsp;DEXPREOPT_PRODUCT_DIR&nbsp;:=&nbsp;$(patsubst&nbsp;$(DEXPREOPT_BUILD_DIR)/%,%,$(PRODUCT_OUT))/dex_bootjars<br/>
&nbsp;&nbsp;&nbsp;例：target/product/m7ul/dex_bootjars<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BOOT_JAR_DIR">DEXPREOPT_BOOT_JAR_DIR</a></h3>
<p>
DEXPREOPT_BOOT_JAR_DIR&nbsp;:=&nbsp;system/framework<br/>
例：system/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_DEXOPT">DEXPREOPT_DEXOPT</a></h3>
<p>
DEXPREOPT_DEXOPT&nbsp;:=&nbsp;$(patsubst&nbsp;$(DEXPREOPT_BUILD_DIR)/%,%,$(DEXOPT))<br/>
例：host/linux-x86/bin/dexopt<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BOOT_JAR_DIR_FULL_PATH">DEXPREOPT_BOOT_JAR_DIR_FULL_PATH</a></h3>
<p>
DEXPREOPT_BOOT_JAR_DIR_FULL_PATH&nbsp;:=&nbsp;$(DEXPREOPT_BUILD_DIR)/$(DEXPREOPT_PRODUCT_DIR)/$(DEXPREOPT_BOOT_JAR_DIR)<br/>
例：out/target/target/product/m7ul/dex_bootjars/system/framework<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_BOOT_ODEXS">DEXPREOPT_BOOT_ODEXS</a></h3>
<p>
DEXPREOPT_BOOT_ODEXS&nbsp;:=&nbsp;$(foreach&nbsp;b,$(DEXPREOPT_BOOT_JARS_MODULES),\<br/>
&nbsp;$(DEXPREOPT_BOOT_JAR_DIR_FULL_PATH)/$(b).odex)<br/>
例：&nbsp;/home/cloud/tmp/android_out/Cyanogenmod/target/product/m7ul/dex_bootjars/system/framework/core.odex&nbsp;&nbsp;/home/cloud/tmp/android_out/Cyanogenmod/target/product/m7ul/dex_bootjars/system/framework/core-junit.odex&nbsp;&nbsp;/home/cloud/tmp/android_out/Cyanogenmod/target/product/m7ul/dex_bootjars/system/framework/bouncycastle.odex&nbsp;&nbsp;/home/cloud/tmp/android_out/Cyanogenmod/target/product/m7ul/dex_bootjars/system/framework/ext.odex<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEXPREOPT_UNIPROCESSOR">DEXPREOPT_UNIPROCESSOR</a></h3>
<p>
If&nbsp;the&nbsp;target&nbsp;is&nbsp;a&nbsp;uniprocessor,&nbsp;then&nbsp;explicitly&nbsp;tell&nbsp;the&nbsp;preoptimizer<br/>
&nbsp;that&nbsp;fact.&nbsp;(By&nbsp;default,&nbsp;it&nbsp;always&nbsp;optimizes&nbsp;for&nbsp;an&nbsp;SMP&nbsp;target.)<br/>
&nbsp;&nbsp;&nbsp;ifeq&nbsp;($(TARGET_CPU_SMP),true)<br/>
&nbsp;&nbsp;DEXPREOPT_UNIPROCESSOR&nbsp;:=<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;DEXPREOPT_UNIPROCESSOR&nbsp;:=&nbsp;--uniprocessor<br/>
&nbsp;&nbsp;endif&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="dexpreopt-remove-classes.dex">Function:&nbsp;&nbsp;dexpreopt-remove-classes.dex</a></h3>
<p>
移除classes.dex<br/>
&nbsp;&nbsp;&nbsp;$(1):&nbsp;the&nbsp;.jar&nbsp;or&nbsp;.apk&nbsp;to&nbsp;remove&nbsp;classes.dex<br/>
</p>
</div>
<div class="function">
<h3><a id="dexpreopt-one-file">Function:&nbsp;&nbsp;dexpreopt-one-file</a></h3>
<p>
将apk转为优化后格式，及专为.odex和只有资源文件的apk文件<br/>
$(1):&nbsp;the&nbsp;input&nbsp;.jar&nbsp;or&nbsp;.apk&nbsp;file<br/>
$(2):&nbsp;the&nbsp;output&nbsp;.odex&nbsp;file<br/>
</p>
</div>
<div class="function">
<h3><a id="_dexpreopt-boot-jar">Function:&nbsp;&nbsp;_dexpreopt-boot-jar</a></h3>
<p>
对所有boot的jar进行优化<br/>
&nbsp;$(1):boot&nbsp;jar&nbsp;module&nbsp;name<br/>
</p>
</div>
<div class="function">
<h3><a id="_build-dexpreopt-boot-jar-dependency-pair">Function:&nbsp;&nbsp;_build-dexpreopt-boot-jar-dependency-pair</a></h3>
<p>
系统apk优化相关函数<br/>
$(1):&nbsp;the&nbsp;rest&nbsp;list&nbsp;of&nbsp;boot&nbsp;jars<br/>
</p>
</div>
<div class="function">
<h3><a id="_build-dexpreopt-boot-jar-dependency">Function:&nbsp;&nbsp;_build-dexpreopt-boot-jar-dependency</a></h3>
<p>
系统apk优化相关函数<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
