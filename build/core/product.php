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
<h3>build/core/product.mk</h3>
<p>
Functions&nbsp;for&nbsp;including&nbsp;AndroidProducts.mk&nbsp;files<br/>
PRODUCT_MAKEFILES&nbsp;is&nbsp;set&nbsp;up&nbsp;in&nbsp;AndroidProducts.mks.<br/>
Format&nbsp;of&nbsp;PRODUCT_MAKEFILES:<br/>
<product_name>:<path_to_the_product_makefile><br/>
If&nbsp;the&nbsp;<product_name>&nbsp;is&nbsp;the&nbsp;same&nbsp;as&nbsp;the&nbsp;base&nbsp;file&nbsp;name&nbsp;(without&nbsp;dir<br/>
and&nbsp;the&nbsp;.mk&nbsp;suffix)&nbsp;of&nbsp;the&nbsp;product&nbsp;makefile,&nbsp;"<product_name>:"&nbsp;can&nbsp;be<br/>
omitted.<br/>
示例：Cyanogenmod/device/oppo/find5/AndroidProducts.mk:<br/>
PRODUCT_MAKEFILES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(LOCAL_DIR)/full_find5.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-product-makefiles]">■ &nbsp;&nbsp;[get-product-makefiles]</a></h3>
<p>
Returns&nbsp;the&nbsp;sorted&nbsp;concatenation&nbsp;of&nbsp;PRODUCT_MAKEFILES<br/>
variables&nbsp;set&nbsp;in&nbsp;the&nbsp;given&nbsp;AndroidProducts.mk&nbsp;files.<br/>
$(1):&nbsp;the&nbsp;list&nbsp;of&nbsp;AndroidProducts.mk&nbsp;files.&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-all-product-makefiles]">■ &nbsp;&nbsp;[get-all-product-makefiles]</a></h3>
<p>
Returns&nbsp;the&nbsp;sorted&nbsp;concatenation&nbsp;of&nbsp;all&nbsp;PRODUCT_MAKEFILES<br/>
variables&nbsp;set&nbsp;in&nbsp;all&nbsp;AndroidProducts.mk&nbsp;files.<br/>
$(call&nbsp;)&nbsp;isn't&nbsp;necessary.<br/>
</p>
</div>
<div class="variable">
<h3><a id="_product_var_list">■ &nbsp;&nbsp;_product_var_list</a></h3>
<p>
产品变量列表：<br/>
&nbsp;_product_var_list&nbsp;:=&nbsp;\<br/>
PRODUCT_BUILD_PROP_OVERRIDES&nbsp;\<br/>
PRODUCT_NAME&nbsp;\<br/>
PRODUCT_MODEL&nbsp;\<br/>
PRODUCT_LOCALES&nbsp;\<br/>
PRODUCT_AAPT_CONFIG&nbsp;\<br/>
PRODUCT_AAPT_PREF_CONFIG&nbsp;\<br/>
PRODUCT_PACKAGES&nbsp;\<br/>
PRODUCT_PACKAGES_DEBUG&nbsp;\<br/>
PRODUCT_PACKAGES_ENG&nbsp;\<br/>
PRODUCT_PACKAGES_TESTS&nbsp;\<br/>
PRODUCT_DEVICE&nbsp;\<br/>
PRODUCT_MANUFACTURER&nbsp;\<br/>
PRODUCT_BRAND&nbsp;\<br/>
PRODUCT_PROPERTY_OVERRIDES&nbsp;\<br/>
PRODUCT_DEFAULT_PROPERTY_OVERRIDES&nbsp;\<br/>
PRODUCT_CHARACTERISTICS&nbsp;\<br/>
PRODUCT_COPY_FILES&nbsp;\<br/>
PRODUCT_OTA_PUBLIC_KEYS&nbsp;\<br/>
PRODUCT_EXTRA_RECOVERY_KEYS&nbsp;\<br/>
PRODUCT_PACKAGE_OVERLAYS&nbsp;\<br/>
DEVICE_PACKAGE_OVERLAYS&nbsp;\<br/>
PRODUCT_TAGS&nbsp;\<br/>
PRODUCT_SDK_ADDON_NAME&nbsp;\<br/>
PRODUCT_SDK_ADDON_COPY_FILES&nbsp;\<br/>
PRODUCT_SDK_ADDON_COPY_MODULES&nbsp;\<br/>
PRODUCT_SDK_ADDON_DOC_MODULES&nbsp;\<br/>
PRODUCT_DEFAULT_WIFI_CHANNELS&nbsp;\<br/>
PRODUCT_DEFAULT_DEV_CERTIFICATE&nbsp;\<br/>
PRODUCT_RESTRICT_VENDOR_FILES&nbsp;\<br/>
PRODUCT_VENDOR_KERNEL_HEADERS&nbsp;\<br/>
PRODUCT_FACTORY_RAMDISK_MODULES&nbsp;\<br/>
PRODUCT_FACTORY_BUNDLE_MODULES&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[dump-product]">■ &nbsp;&nbsp;[dump-product]</a></h3>
<p>
打印某个产品的所有产品变量<br/>
$(1)&nbsp;产品名称<br/>
</p>
</div>
<div class="variable">
<h3><a id="[dump-products]">■ &nbsp;&nbsp;[dump-products]</a></h3>
<p>
打印所有产品的所有产品变量<br/>
</p>
</div>
<div class="variable">
<h3><a id="[inherit-product]">■ &nbsp;&nbsp;[inherit-product]</a></h3>
<p>
Does&nbsp;three&nbsp;things:<br/>
&nbsp;1.&nbsp;Inherits&nbsp;all&nbsp;of&nbsp;the&nbsp;variables&nbsp;from&nbsp;$1.<br/>
&nbsp;2.&nbsp;Records&nbsp;the&nbsp;inheritance&nbsp;in&nbsp;the&nbsp;.INHERITS_FROM&nbsp;variable<br/>
&nbsp;3.&nbsp;Records&nbsp;that&nbsp;we've&nbsp;visited&nbsp;this&nbsp;node,&nbsp;in&nbsp;ALL_PRODUCTS<br/>
&nbsp;&nbsp;$(1):&nbsp;product&nbsp;to&nbsp;inherit<br/>
&nbsp;&nbsp;示例：./device/oppo/find5/cm.mk:15:$(call&nbsp;inherit-product,&nbsp;device/oppo/find5/full_find5.mk)<br/>
</p>
</div>
<div class="variable">
<h3><a id="[inherit-product-if-exists]">■ &nbsp;&nbsp;[inherit-product-if-exists]</a></h3>
<p>
Do&nbsp;inherit-product&nbsp;only&nbsp;if&nbsp;$(1)&nbsp;exists<br/>
</p>
</div>
<div class="variable">
<h3><a id="[import-products]">■ &nbsp;&nbsp;[import-products]</a></h3>
<p>
$(1):&nbsp;product&nbsp;makefile&nbsp;list<br/>
</p>
</div>
<div class="variable">
<h3><a id="[check-all-products]">■ &nbsp;&nbsp;[check-all-products]</a></h3>
<p>
Does&nbsp;various&nbsp;consistency&nbsp;checks&nbsp;on&nbsp;all&nbsp;of&nbsp;the&nbsp;known&nbsp;products.<br/>
Takes&nbsp;no&nbsp;parameters,&nbsp;so&nbsp;$(call&nbsp;)&nbsp;is&nbsp;not&nbsp;necessary.<br/>
</p>
</div>
<div class="variable">
<h3><a id="[resolve-short-product-name]">■ &nbsp;&nbsp;[resolve-short-product-name]</a></h3>
<p>
Returns&nbsp;the&nbsp;product&nbsp;makefile&nbsp;path&nbsp;for&nbsp;the&nbsp;product&nbsp;with&nbsp;the&nbsp;provided&nbsp;name<br/>
$(1):&nbsp;short&nbsp;product&nbsp;name&nbsp;like&nbsp;"generic"<br/>
</p>
</div>
<div class="variable">
<h3><a id="_product_stash_var_list">■ &nbsp;&nbsp;_product_stash_var_list</a></h3>
<p>
_product_stash_var_list&nbsp;:=&nbsp;$(_product_var_list)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_ARCH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_ARCH_VARIANT&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_BOARD_PLATFORM&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_BOARD_PLATFORM_GPU&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_BOARD_KERNEL_HEADERS&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_DEVICE_KERNEL_HEADERS&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_PRODUCT_KERNEL_HEADERS&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_BOOTLOADER_BOARD_NAME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_COMPRESS_MODULE_SYMBOLS&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_NO_BOOTLOADER&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_NO_KERNEL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_NO_RECOVERY&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_NO_RADIOIMAGE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_HARDWARE_3D&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_PROVIDES_INIT_RC&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_CPU_ABI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_CPU_ABI2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;TARGET_CPU_SMP&nbsp;\&nbsp;<br/>
&nbsp;&nbsp;&nbsp;_product_stash_var_list&nbsp;+=&nbsp;\<br/>
BOARD_WPA_SUPPLICANT_DRIVER&nbsp;\<br/>
BOARD_WLAN_DEVICE&nbsp;\<br/>
BOARD_USES_GENERIC_AUDIO&nbsp;\<br/>
BOARD_KERNEL_CMDLINE&nbsp;\<br/>
BOARD_KERNEL_BASE&nbsp;\<br/>
BOARD_HAVE_BLUETOOTH&nbsp;\<br/>
BOARD_HAVE_BLUETOOTH_BCM&nbsp;\<br/>
BOARD_HAVE_BLUETOOTH_QCOM&nbsp;\<br/>
BOARD_VENDOR_QCOM_AMSS_VERSION&nbsp;\<br/>
BOARD_VENDOR_USE_AKMD&nbsp;\<br/>
BOARD_EGL_CFG&nbsp;\<br/>
BOARD_BOOTIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_RECOVERYIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_SYSTEMIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_USERDATAIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_CACHEIMAGE_FILE_SYSTEM_TYPE&nbsp;\<br/>
BOARD_CACHEIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_FLASH_BLOCK_SIZE&nbsp;\<br/>
BOARD_SYSTEMIMAGE_PARTITION_SIZE&nbsp;\<br/>
BOARD_VENDOR_QCOM_GPS_LOC_API_HARDWARE&nbsp;\<br/>
BOARD_VENDOR_QCOM_GPS_LOC_API_AMSS_VERSION&nbsp;\<br/>
BOARD_INSTALLER_CMDLINE&nbsp;\<br/>
_product_stash_var_list&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;DEFAULT_SYSTEM_DEV_CERTIFICATE<br/>
</p>
</div>
<div class="variable">
<h3><a id="[stash-product-vars]">■ &nbsp;&nbsp;[stash-product-vars]</a></h3>
<p>
Stash&nbsp;vaues&nbsp;of&nbsp;the&nbsp;variables&nbsp;in&nbsp;_product_stash_var_list.<br/>
&nbsp;$(1):&nbsp;Renamed&nbsp;prefix&nbsp;&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="[assert-product-vars]">■ &nbsp;&nbsp;[assert-product-vars]</a></h3>
<p>
Assert&nbsp;that&nbsp;the&nbsp;the&nbsp;variable&nbsp;stashed&nbsp;by&nbsp;stash-product-vars&nbsp;remains&nbsp;untouched.<br/>
$(1):&nbsp;The&nbsp;prefix&nbsp;as&nbsp;supplied&nbsp;to&nbsp;stash-product-vars<br/>
</p>
</div>
<div class="variable">
<h3><a id="[add-to-product-copy-files-if-exists]">■ &nbsp;&nbsp;[add-to-product-copy-files-if-exists]</a></h3>
<p>
$(1):要拷贝的文件<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
