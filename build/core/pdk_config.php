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
<h3>build/core/pdk_config.mk</h3>
<p>
This&nbsp;file&nbsp;defines&nbsp;the&nbsp;rule&nbsp;to&nbsp;fuse&nbsp;the&nbsp;platform.zip&nbsp;into&nbsp;the&nbsp;current&nbsp;PDK&nbsp;build<br/>
&nbsp;&nbsp;What&nbsp;to&nbsp;build:<br/>
&nbsp;&nbsp;pdk&nbsp;fusion&nbsp;if:<br/>
&nbsp;&nbsp;1)&nbsp;PDK_FUSION_PLATFORM_ZIP&nbsp;is&nbsp;passed&nbsp;in&nbsp;from&nbsp;the&nbsp;environment<br/>
&nbsp;&nbsp;or<br/>
&nbsp;&nbsp;2)&nbsp;the&nbsp;platform.zip&nbsp;exists&nbsp;in&nbsp;the&nbsp;default&nbsp;location<br/>
&nbsp;&nbsp;or<br/>
&nbsp;&nbsp;3)&nbsp;fusion&nbsp;is&nbsp;a&nbsp;command&nbsp;line&nbsp;build&nbsp;goal,<br/>
&nbsp;&nbsp;PDK_FUSION_PLATFORM_ZIP&nbsp;is&nbsp;needed&nbsp;anyway,&nbsp;then&nbsp;do&nbsp;we&nbsp;need&nbsp;the&nbsp;'fusion'&nbsp;goal?<br/>
&nbsp;&nbsp;otherwise&nbsp;pdk&nbsp;only&nbsp;if:<br/>
&nbsp;&nbsp;1)&nbsp;pdk&nbsp;is&nbsp;a&nbsp;command&nbsp;line&nbsp;build&nbsp;goal<br/>
&nbsp;&nbsp;or<br/>
&nbsp;&nbsp;2)&nbsp;TARGET_BUILD_PDK&nbsp;is&nbsp;passed&nbsp;in&nbsp;from&nbsp;the&nbsp;environment<br/>
</p>
</div>
<div class="variable">
<h3><a id="PDK_FUSION_PLATFORM_ZIP">■ &nbsp;&nbsp;PDK_FUSION_PLATFORM_ZIP</a></h3>
<p>
platform.zip<br/>
&nbsp;ifndef&nbsp;PDK_FUSION_PLATFORM_ZIP<br/>
_pdk_fusion_default_platform_zip&nbsp;:=&nbsp;vendor/pdk/$(TARGET_DEVICE)/$(TARGET_PRODUCT)-$(TARGET_BUILD_VARIANT)/platform/platform.zip<br/>
ifneq&nbsp;(,$(wildcard&nbsp;$(_pdk_fusion_default_platform_zip)))<br/>
$(info&nbsp;$(_pdk_fusion_default_platform_zip)&nbsp;found,&nbsp;do&nbsp;a&nbsp;PDK&nbsp;fusion&nbsp;build.)<br/>
PDK_FUSION_PLATFORM&nbsp;&nbsp;&nbsp;_ZIP&nbsp;:=&nbsp;$(_pdk_fusion_default_platform_zip)<br/>
TARGET_BUILD_PDK&nbsp;:=&nbsp;true<br/>
endif<br/>
endif&nbsp;#&nbsp;!PDK_FUSION_PLATFORM_ZIP<br/>
</p>
</div>
<div class="variable">
<h3><a id="PDK_PLATFORM_JAVA_ZIP_JAVA_LIB_DIR">■ &nbsp;&nbsp;PDK_PLATFORM_JAVA_ZIP_JAVA_LIB_DIR</a></h3>
<p>
PDK_PLATFORM_JAVA_ZIP_JAVA_LIB_DIR&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/android_stubs_current_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/core_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/core-junit_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/ext_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/framework_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/android.test.runner_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/telephony-common_intermediates&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;target/common/obj/JAVA_LIBRARIES/mms-common_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="PDK_PLATFORM_JAVA_ZIP_CONTENTS">■ &nbsp;&nbsp;PDK_PLATFORM_JAVA_ZIP_CONTENTS</a></h3>
<p>
PDK_PLATFORM_JAVA_ZIP_CONTENTS&nbsp;:=&nbsp;\<br/>
target/common/obj/APPS/framework-res_intermediates/package-export.apk&nbsp;\<br/>
target/common/obj/APPS/framework-res_intermediates/src/R.stamp<br/>
PDK_PLATFORM_JAVA_ZIP_CONTENTS&nbsp;+=&nbsp;$(foreach&nbsp;lib_dir,$(PDK_PLATFORM_JAVA_ZIP_JAVA_LIB_DIR),\<br/>
&nbsp;$(lib_dir)/classes.jar&nbsp;$(lib_dir)/javalib.jar)<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_PDK_FUSION_FILES">■ &nbsp;&nbsp;ALL_PDK_FUSION_FILES</a></h3>
<p>
ALL_PDK_FUSION_FILES&nbsp;:=&nbsp;$(addprefix&nbsp;$(PRODUCT_OUT)/,&nbsp;$(_pdk_fusion_file_list))<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
