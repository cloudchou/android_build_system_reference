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
<h3>build/target/product/mini.mk</h3>
<p>
Common&nbsp;configurations&nbsp;for&nbsp;mini_XXX&nbsp;lunch&nbsp;targets<br/>
This&nbsp;is&nbsp;mainly&nbsp;for&nbsp;creating&nbsp;small&nbsp;system&nbsp;image&nbsp;during&nbsp;early&nbsp;development&nbsp;stage.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;mini<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;mini<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;mini&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_AAPT_CONFIG">PRODUCT_AAPT_CONFIG</a></h3>
<p>
PRODUCT_AAPT_CONFIG&nbsp;:=&nbsp;normal&nbsp;ldpi&nbsp;mdpi&nbsp;hdpi&nbsp;xhdpi&nbsp;xxhdpi<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_AAPT_PREF_CONFIG">PRODUCT_AAPT_PREF_CONFIG</a></h3>
<p>
PRODUCT_AAPT_PREF_CONFIG:=&nbsp;hdpi<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
<p>
PRODUCT_LOCALES&nbsp;:=&nbsp;en_US<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PROPERTY_OVERRIDES">PRODUCT_PROPERTY_OVERRIDES</a></h3>
<p>
PRODUCT_PROPERTY_OVERRIDES&nbsp;:=<br/>
PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.config.notification_sound=OnTheHunt.ogg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.config.alarm_alert=Alarm_Classic.ogg<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.carrier=unknown<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_PROPERTY_OVERRIDES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.com.android.dateformat=MM-dd-yyyy&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.config.ringtone=Ring_Synth_04.ogg&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ro.config.notification_sound=pixiedust.ogg<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_COPY_FILES">PRODUCT_COPY_FILES</a></h3>
<p>
PRODUCT_COPY_FILES&nbsp;:=<br/>
PRODUCT_COPY_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/handheld_core_hardware.xml:system/etc/permissions/handheld_core_hardware.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.location.gps.xml:system/etc/permissions/android.hardware.location.gps.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.sensor.light.xml:system/etc/permissions/android.hardware.sensor.light.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.sensor.barometer.xml:system/etc/permissions/android.hardware.sensor.barometer.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.sensor.gyroscope.xml:system/etc/permissions/android.hardware.sensor.gyroscope.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/native/data/etc/android.hardware.usb.accessory.xml:system/etc/permissions/android.hardware.usb.accessory.xml<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_COPY_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;frameworks/av/media/libeffects/data/audio_effects.conf:system/etc/audio_effects.conf<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;com.android.future.usb.accessory<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ApplicationsProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ContactsProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DefaultContainerService&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DownloadProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;DownloadProviderUi&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;MediaProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PackageInstaller&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SettingsProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;TelephonyProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;UserDictionaryProvider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;abcc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;apache-xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;bouncycastle&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;bu&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;cacerts&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;com.android.location.provider&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;com.android.location.provider.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;core&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;core-junit&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dalvikvm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dexdeps&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dexdump&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dexlist&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dexopt&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dmtracedump&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;drmserver&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;dx&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ext&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;framework-res&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;hprof-conv&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;icu.dat&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;installd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ip&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ip-up-vpn&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ip6tables&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;iptables&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;keystore&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;keystore.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libandroidfw&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libOpenMAXAL&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libOpenSLES&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libaudiopreprocessing&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libaudioutils&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libbcc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libcrypto&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdownmix&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdvm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdrmframework&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdrmframework_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libexpat&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libfilterfw&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libfilterpack_imageproc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libgabi++&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libicui18n&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libicuuc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libjavacore&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libkeystore&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libmdnssd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libnativehelper&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libnfc_ndef&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libportable&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libpowermanager&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libspeexresampler&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libsqlite_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libssl&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_chromium_http&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_aacdec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_aacenc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_amrdec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_amrnbenc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_amrwbenc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_flacenc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_g711dec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_h264dec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_h264enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_mp3dec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_mpeg4dec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_mpeg4enc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_vorbisdec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_vpxdec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libstagefright_soft_rawdec&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvariablespeed&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libwebrtc_audio_preprocessing&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libwilhelm&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libz&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;lint&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;mdnsd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;mms-common&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;network&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;pand&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;requestsync&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;screencap&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;sdptool&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;sensorservice&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;telephony-common&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;wpa_supplicant<br/>
PRODUCT_COPY_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;system/core/rootdir/init.usb.rc:root/init.usb.rc&nbsp;\<br/>
#-----------------&nbsp;originally&nbsp;from&nbsp;generic_no_telephony.mk&nbsp;----------------<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Bluetooth&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;FusedLocation&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;InputDevices&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;LatinIME&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Phone&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Provision&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;hostapd&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;wpa_supplicant.conf<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;icu.dat<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;librs_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_core&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_osal&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditor_videofilters&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libvideoeditorplayer&nbsp;\<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio.primary.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;audio_policy.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;local_time.default&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;power.default<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;local_time.default&nbsp;&nbsp;&nbsp;&nbsp;<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;drmserver&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdrmframework&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libdrmframework_jni&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;WAPPushManager<br/>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;TestingCamera&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;SystemUI&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;Settings&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;libsurfaceflinger_ddmconnection<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
