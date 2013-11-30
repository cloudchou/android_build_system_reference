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
<h3>build/core/package.mk</h3>
<p>
用于编译App,生成apk文件，对应变量BUILD_PACKAGE<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PACKAGE_NAME">LOCAL_PACKAGE_NAME</a></h3>
<p>
LOCAL_PACKAGE_NAME:&nbsp;The&nbsp;name&nbsp;of&nbsp;the&nbsp;package;&nbsp;the&nbsp;directory&nbsp;will&nbsp;be&nbsp;called&nbsp;this.<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_ANDROID_PACKAGE_SUFFIX">COMMON_ANDROID_PACKAGE_SUFFIX</a></h3>
<p>
编译Android&nbsp;package后缀名<br/>
COMMON_ANDROID_PACKAGE_SUFFIX&nbsp;:=&nbsp;.apk<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MANIFEST_FILE">LOCAL_MANIFEST_FILE</a></h3>
<p>
LOCAL_MANIFEST_FILE&nbsp;:=&nbsp;AndroidManifest.xml&nbsp;AndroidManifest文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_FULL_MANIFEST_FILE">LOCAL_FULL_MANIFEST_FILE</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(LOCAL_FULL_MANIFEST_FILE)),)<br/>
LOCAL_FULL_MANIFEST_FILE&nbsp;:=&nbsp;$(LOCAL_PATH)/$(LOCAL_MANIFEST_FILE)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_CLASS">LOCAL_MODULE_CLASS</a></h3>
<p>
LOCAL_MODULE_CLASS&nbsp;:=&nbsp;APPS<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_MODULE_TAGS">LOCAL_MODULE_TAGS</a></h3>
<p>
ifeq&nbsp;($(LOCAL_MODULE_TAGS),)<br/>
LOCAL_MODULE_TAGS&nbsp;:=&nbsp;optional<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_AAPT_FLAGS">LOCAL_AAPT_FLAGS</a></h3>
<p>
ifeq&nbsp;($(filter&nbsp;tests,&nbsp;$(LOCAL_MODULE_TAGS)),)<br/>
#&nbsp;Force&nbsp;localization&nbsp;check&nbsp;if&nbsp;it's&nbsp;not&nbsp;tagged&nbsp;as&nbsp;tests.<br/>
LOCAL_AAPT_FLAGS&nbsp;:=&nbsp;$(LOCAL_AAPT_FLAGS)&nbsp;-z<br/>
endif&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_ASSET_DIR">LOCAL_ASSET_DIR</a></h3>
<p>
ifeq&nbsp;(,$(LOCAL_ASSET_DIR))<br/>
LOCAL_ASSET_DIR&nbsp;:=&nbsp;$(LOCAL_PATH)/assets<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RESOURCE_DIR">LOCAL_RESOURCE_DIR</a></h3>
<p>
ifeq&nbsp;(,$(LOCAL_RESOURCE_DIR))<br/>
&nbsp;&nbsp;LOCAL_RESOURCE_DIR&nbsp;:=&nbsp;$(LOCAL_PATH)/res<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGE_OVERLAYS">PRODUCT_PACKAGE_OVERLAYS</a></h3>
<p>
产品配置里用于覆盖源生代码的资源文件<br/>
&nbsp;&nbsp;&nbsp;./vendor/cm/config/common.mk:203:PRODUCT_PACKAGE_OVERLAYS&nbsp;+=&nbsp;vendor/cm/overlay/dictionaries<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEVICE_PACKAGE_OVERLAYS">DEVICE_PACKAGE_OVERLAYS</a></h3>
<p>
设备配置里用于覆盖源生代码的资源文件<br/>
./device/oppo/find5/device.mk:22:DEVICE_PACKAGE_OVERLAYS&nbsp;:=&nbsp;device/oppo/find5/overlay<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_RESOURCE_DIR">LOCAL_RESOURCE_DIR</a></h3>
<p>
资源目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_PROGUARD_ENABLED">LOCAL_PROGUARD_ENABLED</a></h3>
<p>
是否启用混淆<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_DEX_PREOPT">LOCAL_DEX_PREOPT</a></h3>
<p>
是否启用dex优化<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_CERTIFICATE">LOCAL_CERTIFICATE</a></h3>
<p>
证书名称<br/>
&nbsp;&nbsp;&nbsp;&nbsp;./packages/apps/CMFileManager/Android.mk:29:LOCAL_CERTIFICATE&nbsp;:=&nbsp;platform<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
