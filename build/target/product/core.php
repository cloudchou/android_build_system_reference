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
主要配置<br/>
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
ApplicationsProvider&nbsp;\<br/>
BackupRestoreConfirmation&nbsp;\<br/>
BasicDreams&nbsp;\<br/>
Browser&nbsp;\<br/>
Contacts&nbsp;\<br/>
ContactsProvider&nbsp;\<br/>
DefaultContainerService&nbsp;\<br/>
DownloadProvider&nbsp;\<br/>
DownloadProviderUi&nbsp;\<br/>
HTMLViewer&nbsp;\<br/>
Home&nbsp;\<br/>
KeyChain&nbsp;\<br/>
MediaProvider&nbsp;\<br/>
PackageInstaller&nbsp;\<br/>
PicoTts&nbsp;\<br/>
SettingsProvider&nbsp;\<br/>
SharedStorageBackup&nbsp;\<br/>
TelephonyProvider&nbsp;\<br/>
UserDictionaryProvider&nbsp;\<br/>
VpnDialogs&nbsp;\<br/>
abcc&nbsp;\<br/>
apache-xml&nbsp;\<br/>
atrace&nbsp;\<br/>
bouncycastle&nbsp;\<br/>
bu&nbsp;\<br/>
cacerts&nbsp;\<br/>
com.android.location.provider&nbsp;\<br/>
com.android.location.provider.xml&nbsp;\<br/>
core&nbsp;\<br/>
core-junit&nbsp;\<br/>
dalvikvm&nbsp;\<br/>
dexdeps&nbsp;\<br/>
dexdump&nbsp;\<br/>
dexlist&nbsp;\<br/>
dexopt&nbsp;\<br/>
dmtracedump&nbsp;\<br/>
drmserver&nbsp;\<br/>
dx&nbsp;\<br/>
ext&nbsp;\<br/>
framework-res&nbsp;\<br/>
hprof-conv&nbsp;\<br/>
icu.dat&nbsp;\<br/>
installd&nbsp;\<br/>
ip&nbsp;\<br/>
ip-up-vpn&nbsp;\<br/>
ip6tables&nbsp;\<br/>
iptables&nbsp;\<br/>
keystore&nbsp;\<br/>
keystore.default&nbsp;\<br/>
libandroidfw&nbsp;\<br/>
libOpenMAXAL&nbsp;\<br/>
libOpenSLES&nbsp;\<br/>
libaudiopreprocessing&nbsp;\<br/>
libaudioutils&nbsp;\<br/>
libbcc&nbsp;\<br/>
libcrypto&nbsp;\<br/>
libdownmix&nbsp;\<br/>
libdvm&nbsp;\<br/>
libdrmframework&nbsp;\<br/>
libdrmframework_jni&nbsp;\<br/>
libexpat&nbsp;\<br/>
libfilterfw&nbsp;\<br/>
libfilterpack_imageproc&nbsp;\<br/>
libgabi++&nbsp;\<br/>
libanalogradiobroadcasting&nbsp;\<br/>
libicui18n&nbsp;\<br/>
libicuuc&nbsp;\<br/>
libjavacore&nbsp;\<br/>
libkeystore&nbsp;\<br/>
libmdnssd&nbsp;\<br/>
libnativehelper&nbsp;\<br/>
libnfc_ndef&nbsp;\<br/>
libportable&nbsp;\<br/>
libpowermanager&nbsp;\<br/>
libspeexresampler&nbsp;\<br/>
libsqlite_jni&nbsp;\<br/>
libssl&nbsp;\<br/>
libstagefright&nbsp;\<br/>
libstagefright_chromium_http&nbsp;\<br/>
libstagefright_soft_aacdec&nbsp;\<br/>
libstagefright_soft_aacenc&nbsp;\<br/>
libstagefright_soft_amrdec&nbsp;\<br/>
libstagefright_soft_amrnbenc&nbsp;\<br/>
libstagefright_soft_amrwbenc&nbsp;\<br/>
libstagefright_soft_flacenc&nbsp;\<br/>
libstagefright_soft_g711dec&nbsp;\<br/>
libstagefright_soft_h264dec&nbsp;\<br/>
libstagefright_soft_h264enc&nbsp;\<br/>
libstagefright_soft_mp3dec&nbsp;\<br/>
libstagefright_soft_mpeg4dec&nbsp;\<br/>
libstagefright_soft_mpeg4enc&nbsp;\<br/>
libstagefright_soft_vorbisdec&nbsp;\<br/>
libstagefright_soft_vpxdec&nbsp;\<br/>
libstagefright_soft_rawdec&nbsp;\<br/>
libvariablespeed&nbsp;\<br/>
libwebrtc_audio_preprocessing&nbsp;\<br/>
libwilhelm&nbsp;\<br/>
libz&nbsp;\<br/>
make_ext4fs&nbsp;\<br/>
mdnsd&nbsp;\<br/>
requestsync&nbsp;\<br/>
screencap&nbsp;\<br/>
sensorservice&nbsp;\<br/>
lint&nbsp;\<br/>
uiautomator&nbsp;\<br/>
telephony-common&nbsp;\<br/>
mms-common&nbsp;\<br/>
zoneinfo.dat&nbsp;\<br/>
zoneinfo.idx&nbsp;\<br/>
zoneinfo.version<br/>
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
