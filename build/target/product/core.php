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
<h3>build/target/product/core.mk</h3>
<p>
主要配置,并从build/target/product/base.mk处继承<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_BRAND">PRODUCT_BRAND</a></h3>
<p>
PRODUCT_BRAND&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_DEVICE">PRODUCT_DEVICE</a></h3>
<p>
PRODUCT_DEVICE&nbsp;:=&nbsp;generic<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_NAME">PRODUCT_NAME</a></h3>
<p>
PRODUCT_NAME&nbsp;:=&nbsp;core<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_PACKAGES">PRODUCT_PACKAGES</a></h3>
<p>
PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;ApplicationsProvider&nbsp;\<br/>
&nbsp;&nbsp;BackupRestoreConfirmation&nbsp;\<br/>
&nbsp;&nbsp;BasicDreams&nbsp;\<br/>
&nbsp;&nbsp;Browser&nbsp;\<br/>
&nbsp;&nbsp;Contacts&nbsp;\<br/>
&nbsp;&nbsp;ContactsProvider&nbsp;\<br/>
&nbsp;&nbsp;DefaultContainerService&nbsp;\<br/>
&nbsp;&nbsp;DownloadProvider&nbsp;\<br/>
&nbsp;&nbsp;DownloadProviderUi&nbsp;\<br/>
&nbsp;&nbsp;HTMLViewer&nbsp;\<br/>
&nbsp;&nbsp;Home&nbsp;\<br/>
&nbsp;&nbsp;KeyChain&nbsp;\<br/>
&nbsp;&nbsp;MediaProvider&nbsp;\<br/>
&nbsp;&nbsp;PackageInstaller&nbsp;\<br/>
&nbsp;&nbsp;PicoTts&nbsp;\<br/>
&nbsp;&nbsp;SettingsProvider&nbsp;\<br/>
&nbsp;&nbsp;SharedStorageBackup&nbsp;\<br/>
&nbsp;&nbsp;TelephonyProvider&nbsp;\<br/>
&nbsp;&nbsp;UserDictionaryProvider&nbsp;\<br/>
&nbsp;&nbsp;VpnDialogs&nbsp;\<br/>
&nbsp;&nbsp;abcc&nbsp;\<br/>
&nbsp;&nbsp;apache-xml&nbsp;\<br/>
&nbsp;&nbsp;atrace&nbsp;\<br/>
&nbsp;&nbsp;bouncycastle&nbsp;\<br/>
&nbsp;&nbsp;bu&nbsp;\<br/>
&nbsp;&nbsp;cacerts&nbsp;\<br/>
&nbsp;&nbsp;com.android.location.provider&nbsp;\<br/>
&nbsp;&nbsp;com.android.location.provider.xml&nbsp;\<br/>
&nbsp;&nbsp;core&nbsp;\<br/>
&nbsp;&nbsp;core-junit&nbsp;\<br/>
&nbsp;&nbsp;dalvikvm&nbsp;\<br/>
&nbsp;&nbsp;dexdeps&nbsp;\<br/>
&nbsp;&nbsp;dexdump&nbsp;\<br/>
&nbsp;&nbsp;dexlist&nbsp;\<br/>
&nbsp;&nbsp;dexopt&nbsp;\<br/>
&nbsp;&nbsp;dmtracedump&nbsp;\<br/>
&nbsp;&nbsp;drmserver&nbsp;\<br/>
&nbsp;&nbsp;dx&nbsp;\<br/>
&nbsp;&nbsp;ext&nbsp;\<br/>
&nbsp;&nbsp;framework-res&nbsp;\<br/>
&nbsp;&nbsp;hprof-conv&nbsp;\<br/>
&nbsp;&nbsp;icu.dat&nbsp;\<br/>
&nbsp;&nbsp;installd&nbsp;\<br/>
&nbsp;&nbsp;ip&nbsp;\<br/>
&nbsp;&nbsp;ip-up-vpn&nbsp;\<br/>
&nbsp;&nbsp;ip6tables&nbsp;\<br/>
&nbsp;&nbsp;iptables&nbsp;\<br/>
&nbsp;&nbsp;keystore&nbsp;\<br/>
&nbsp;&nbsp;keystore.default&nbsp;\<br/>
&nbsp;&nbsp;libandroidfw&nbsp;\<br/>
&nbsp;&nbsp;libOpenMAXAL&nbsp;\<br/>
&nbsp;&nbsp;libOpenSLES&nbsp;\<br/>
&nbsp;&nbsp;libaudiopreprocessing&nbsp;\<br/>
&nbsp;&nbsp;libaudioutils&nbsp;\<br/>
&nbsp;&nbsp;libbcc&nbsp;\<br/>
&nbsp;&nbsp;libcrypto&nbsp;\<br/>
&nbsp;&nbsp;libdownmix&nbsp;\<br/>
&nbsp;&nbsp;libdvm&nbsp;\<br/>
&nbsp;&nbsp;libdrmframework&nbsp;\<br/>
&nbsp;&nbsp;libdrmframework_jni&nbsp;\<br/>
&nbsp;&nbsp;libexpat&nbsp;\<br/>
&nbsp;&nbsp;libfilterfw&nbsp;\<br/>
&nbsp;&nbsp;libfilterpack_imageproc&nbsp;\<br/>
&nbsp;&nbsp;libgabi++&nbsp;\<br/>
&nbsp;&nbsp;libanalogradiobroadcasting&nbsp;\<br/>
&nbsp;&nbsp;libicui18n&nbsp;\<br/>
&nbsp;&nbsp;libicuuc&nbsp;\<br/>
&nbsp;&nbsp;libjavacore&nbsp;\<br/>
&nbsp;&nbsp;libkeystore&nbsp;\<br/>
&nbsp;&nbsp;libmdnssd&nbsp;\<br/>
&nbsp;&nbsp;libnativehelper&nbsp;\<br/>
&nbsp;&nbsp;libnfc_ndef&nbsp;\<br/>
&nbsp;&nbsp;libportable&nbsp;\<br/>
&nbsp;&nbsp;libpowermanager&nbsp;\<br/>
&nbsp;&nbsp;libspeexresampler&nbsp;\<br/>
&nbsp;&nbsp;libsqlite_jni&nbsp;\<br/>
&nbsp;&nbsp;libssl&nbsp;\<br/>
&nbsp;&nbsp;libstagefright&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_chromium_http&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_aacdec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_aacenc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_amrdec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_amrnbenc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_amrwbenc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_flacenc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_g711dec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_h264dec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_h264enc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_mp3dec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_mpeg4dec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_mpeg4enc&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_vorbisdec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_vpxdec&nbsp;\<br/>
&nbsp;&nbsp;libstagefright_soft_rawdec&nbsp;\<br/>
&nbsp;&nbsp;libvariablespeed&nbsp;\<br/>
&nbsp;&nbsp;libwebrtc_audio_preprocessing&nbsp;\<br/>
&nbsp;&nbsp;libwilhelm&nbsp;\<br/>
&nbsp;&nbsp;libz&nbsp;\<br/>
&nbsp;&nbsp;make_ext4fs&nbsp;\<br/>
&nbsp;&nbsp;mdnsd&nbsp;\<br/>
&nbsp;&nbsp;requestsync&nbsp;\<br/>
&nbsp;&nbsp;screencap&nbsp;\<br/>
&nbsp;&nbsp;sensorservice&nbsp;\<br/>
&nbsp;&nbsp;lint&nbsp;\<br/>
&nbsp;&nbsp;uiautomator&nbsp;\<br/>
&nbsp;&nbsp;telephony-common&nbsp;\<br/>
&nbsp;&nbsp;mms-common&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo.dat&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo.idx&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo.version<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_COPY_FILES">PRODUCT_COPY_FILES</a></h3>
<p>
PRODUCT_COPY_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;system/core/rootdir/init.usb.rc:root/init.usb.rc&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;system/core/rootdir/init.trace.rc:root/init.trace.rc&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="WITH_HOST_DALVIK">WITH_HOST_DALVIK</a></h3>
<p>
ifeq&nbsp;($(WITH_HOST_DALVIK),true)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;apache-xml-hostdex&nbsp;\<br/>
&nbsp;&nbsp;bouncycastle-hostdex&nbsp;\<br/>
&nbsp;&nbsp;core-hostdex&nbsp;\<br/>
&nbsp;&nbsp;libcrypto&nbsp;\<br/>
&nbsp;&nbsp;libexpat&nbsp;\<br/>
&nbsp;&nbsp;libicui18n&nbsp;\<br/>
&nbsp;&nbsp;libicuuc&nbsp;\<br/>
&nbsp;&nbsp;libjavacore&nbsp;\<br/>
&nbsp;&nbsp;libssl&nbsp;\<br/>
&nbsp;&nbsp;libz-host&nbsp;\<br/>
&nbsp;&nbsp;dalvik&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo-host.dat&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo-host.idx&nbsp;\<br/>
&nbsp;&nbsp;zoneinfo-host.version<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="HAVE_SELINUX">HAVE_SELINUX</a></h3>
<p>
ifeq&nbsp;($(HAVE_SELINUX),true)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT_PACKAGES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;auditd&nbsp;\<br/>
&nbsp;&nbsp;sepolicy&nbsp;\<br/>
&nbsp;&nbsp;file_contexts&nbsp;\<br/>
&nbsp;&nbsp;seapp_contexts&nbsp;\<br/>
&nbsp;&nbsp;property_contexts&nbsp;\<br/>
&nbsp;&nbsp;mac_permissions.xml<br/>
endif<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
