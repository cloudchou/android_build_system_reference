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
<h3>build/target/product/sdk.mk</h3>
<p>
sdk&nbsp;product<br/>
继承自：<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangDeDeInSystem.mk<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangEnGBInSystem.mk<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangEnUsInSystem.mk<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangEsEsInSystem.mk<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangFrFrInSystem.mk<br/>
&nbsp;&nbsp;external/svox/pico/lang/PicoLangItItInSystem.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_POLICY">PRODUCT_POLICY</a></h3>
<p>
PRODUCT_POLICY&nbsp;:=&nbsp;android.policy_phone<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
PRODUCT_PROPERTY_OVERRIDES&nbsp;:=<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Calculator&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;DeskClock&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Email2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Exchange2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;FusedLocation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Gallery&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Music&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Mms&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;OpenWnn&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libWnnEngDic&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libWnnJpnDic&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libwnndict&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Phone&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;PinyinIME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;libjni_pinyinime&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Protips&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;SoftKeyboard&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;SystemUI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Launcher2&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Development&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;DevelopmentSettings&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;DrmProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Fallback&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Settings&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;SdkSetup&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;CustomLocale&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;sqlite3&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;InputDevices&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;LatinIME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;CertInstaller&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;LiveWallpapersPicker&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ApiDemos&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;GestureBuilder&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;CubeLiveWallpapers&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;QuickSearchBox&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;WidgetPreview&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;monkeyrunner&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;guavalib&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;jsr305lib&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;jython&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;jsilver&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;librs_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ConnectivityTest&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;GpsLocationTest&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;CalendarProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;Calendar&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;SmokeTest&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;SmokeTestApp&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;rild&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;LegacyCamera<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;audio.primary.goldfish&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;audio_policy.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;local_time.default<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGE_OVERLAYS">PRODUCT_PACKAGE_OVERLAYS</a></h3>
<p>
PRODUCT_PACKAGE_OVERLAYS&nbsp;:=&nbsp;development/sdk_overlay<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_COPY_FILES">PRODUCT_COPY_FILES</a></h3>
<p>
PRODUCT_COPY_FILES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;device/generic/goldfish/data/etc/apns-conf.xml:system/etc/apns-conf.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;system/core/rootdir/etc/vold.fstab:system/etc/vold.fstab&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/base/data/sounds/effects/ogg/camera_click.ogg:system/media/audio/ui/camera_click.ogg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/base/data/sounds/effects/ogg/VideoRecord.ogg:system/media/audio/ui/VideoRecord.ogg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/handheld_core_hardware.xml:system/etc/permissions/handheld_core_hardware.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;development/tools/emulator/system/camera/media_profiles.xml:system/etc/media_profiles.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;development/tools/emulator/system/camera/media_codecs.xml:system/etc/media_codecs.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.touchscreen.multitouch.jazzhand.xml:system/etc/permissions/android.hardware.touchscreen.multitouch.jazzhand.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.camera.autofocus.xml:system/etc/permissions/android.hardware.camera.autofocus.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;frameworks/av/media/libeffects/data/audio_effects.conf:system/etc/audio_effects.conf&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;hardware/libhardware_legacy/audio/audio_policy.conf:system/etc/audio_policy.conf<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
<p>
PRODUCT_LOCALES&nbsp;=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_US&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ldpi&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;hdpi&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;mdpi&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;xhdpi&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ar_EG&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ar_IL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;bg_BG&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ca_ES&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;cs_CZ&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;da_DK&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;de_AT&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;de_CH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;de_DE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;de_LI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;el_GR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_AU&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_CA&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_GB&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_IE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_IN&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_NZ&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_SG&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_US&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;en_ZA&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;es_ES&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;es_US&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;fi_FI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;fr_BE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;fr_CA&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;fr_CH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;fr_FR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;he_IL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;hi_IN&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;hr_HR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;hu_HU&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;id_ID&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;it_CH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;it_IT&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ja_JP&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ko_KR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lt_LT&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;lv_LV&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;nb_NO&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;nl_BE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;nl_NL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;pl_PL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;pt_BR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;pt_PT&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ro_RO&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;ru_RU&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;sk_SK&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;sl_SI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;sr_RS&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;sv_SE&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;th_TH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;tl_PH&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;tr_TR&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;uk_UA&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;vi_VN&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;zh_CN&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;zh_TW<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
