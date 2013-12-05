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
<h3>build/core/Makefile.mk</h3>
<p>
在main.mk里定义了许多目标，而Makefile定义了各个目标的生成规则<br/>
</p>
</div>
<div class="variable">
<h3><a id="CL_RED">CL_RED</a></h3>
<p>
编译输出用的颜色，类似的还有&nbsp;&nbsp;&nbsp;CL_GRN&nbsp;&nbsp;CL_YLW&nbsp;&nbsp;CL_BLU&nbsp;&nbsp;CL_MAG&nbsp;CL_CYN&nbsp;CL_RST<br/>
CL_RED表示用echo输出时使用红色作为前景色<br/>
</p>
</div>
<div class="variable">
<h3><a id="FILE_NAME_TAG">FILE_NAME_TAG</a></h3>
<p>
输出的文件名的tag,文件名中会含有该Tag,比如ota包的名字<br/>
#&nbsp;Pick&nbsp;a&nbsp;reasonable&nbsp;string&nbsp;to&nbsp;use&nbsp;to&nbsp;identify&nbsp;files.<br/>
ifneq&nbsp;""&nbsp;"$(filter&nbsp;eng.%,$(BUILD_NUMBER))"<br/>
&nbsp;&nbsp;#&nbsp;BUILD_NUMBER&nbsp;has&nbsp;a&nbsp;timestamp&nbsp;in&nbsp;it,&nbsp;which&nbsp;means&nbsp;that<br/>
&nbsp;&nbsp;#&nbsp;it&nbsp;will&nbsp;change&nbsp;every&nbsp;time.&nbsp;&nbsp;Pick&nbsp;a&nbsp;stable&nbsp;value.<br/>
&nbsp;&nbsp;FILE_NAME_TAG&nbsp;:=&nbsp;eng.$(USER)<br/>
else<br/>
&nbsp;&nbsp;FILE_NAME_TAG&nbsp;:=&nbsp;$(BUILD_NUMBER)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="is_tests_build">is_tests_build</a></h3>
<p>
编译目标类型是不是tests<br/>
如果编译目标里含有tests则该值为true<br/>
</p>
</div>
<div class="function">
<h3><a id="check-product-copy-files">Function:&nbsp;&nbsp;check-product-copy-files</a></h3>
<p>
检验需要拷贝的产品文件集合里是否含有apk文件，如果有apk，会提示出错，并告诉用户需要使用BUILD_PREBUILT代替<br/>
$(1):需要检验的文件集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="unique_product_copy_files_pairs">unique_product_copy_files_pairs</a></h3>
<p>
过滤重复的&nbsp;sourcefile:detstfile&nbsp;对<br/>
在devcie配置时，将使用PRODUCT_COPY_FILES，表示需要拷贝到目标机上的文件<br/>
格式为:<br/>
PRODCUT_COPY_FILES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;sourcefile&nbsp;:&nbsp;destfile<br/>
</p>
</div>
<div class="variable">
<h3><a id="unique_product_copy_files_destinations">unique_product_copy_files_destinations</a></h3>
<p>
拷贝至手机的文件集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_DOCS">ALL_DOCS</a></h3>
<p>
所有要生成的文档集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_DEFAULT_PROP_TARGET">INSTALLED_DEFAULT_PROP_TARGET</a></h3>
<p>
INSTALLED_DEFAULT_PROP_TARGET&nbsp;:=&nbsp;$(TARGET_ROOT_OUT)/default.prop<br/>
示例：out/target/product/i9100/root/default.prop<br/>
</p>
</div>
<div class="variable">
<h3><a id="ALL_DEFAULT_INSTALLED_MODULES">ALL_DEFAULT_INSTALLED_MODULES</a></h3>
<p>
所有默认将安装的模块<br/>
ALL_DEFAULT_INSTALLED_MODULES&nbsp;+=&nbsp;$(INSTALLED_DEFAULT_PROP_TARGET)<br/>
ALL_DEFAULT_INSTALLED_MODULES&nbsp;+=&nbsp;$(INSTALLED_BUILD_PROP_TARGET)<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDITIONAL_DEFAULT_PROPERTIES">ADDITIONAL_DEFAULT_PROPERTIES</a></h3>
<p>
default.prop里要用到的属性集合<br/>
ADDITIONAL_DEFAULT_PROPERTIES&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;collapse-pairs,&nbsp;$(ADDITIONAL_DEFAULT_PROPERTIES))<br/>
ADDITIONAL_DEFAULT_PROPERTIES&nbsp;+=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(call&nbsp;collapse-pairs,&nbsp;$(PRODUCT_DEFAULT_PROPERTY_OVERRIDES))<br/>
ADDITIONAL_DEFAULT_PROPERTIES&nbsp;:=&nbsp;$(call&nbsp;uniq-pairs-by-first-component,&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(ADDITIONAL_DEFAULT_PROPERTIES),=)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_DEFAULT_PROP_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_DEFAULT_PROP_TARGET)</a></h3>
<p>
该目标就是将ADDITIONAL_DEFAULT_PROPERTIES的属性集合输出到default.prop文件里<br/>
然后调用build/tools/post_process_prps.py脚本对default.prop文件做去重处理<br/>
并且如果ro.debuggable为1,将设置persist.sys.usb.config的属性为adb<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_BUILD_PROP_TARGET">INSTALLED_BUILD_PROP_TARGET</a></h3>
<p>
INSTALLED_BUILD_PROP_TARGET&nbsp;:=&nbsp;$(TARGET_OUT)/build.prop<br/>
示例：out/target/product/i9100/system/build.prop<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDITIONAL_BUILD_PROPERTIES">ADDITIONAL_BUILD_PROPERTIES</a></h3>
<p>
额外的编译属性<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_VERSION_TAGS">BUILD_VERSION_TAGS</a></h3>
<p>
ifeq&nbsp;($(DEFAULT_SYSTEM_DEV_CERTIFICATE),build/target/product/security/testkey)<br/>
BUILD_VERSION_TAGS&nbsp;+=&nbsp;test-keys<br/>
else<br/>
BUILD_VERSION_TAGS&nbsp;+=&nbsp;dev-keys<br/>
endif<br/>
BUILD_VERSION_TAGS&nbsp;:=&nbsp;$(subst&nbsp;$(space),$(comma),$(sort&nbsp;$(BUILD_VERSION_TAGS)))<br/>
一个约定的tag列表用于描述编译配置，将用来生成build_desc，和BUILD_FINGERPRINT<br/>
示例：&nbsp;debug,dev-keys<br/>
</p>
</div>
<div class="variable">
<h3><a id="build_desc">build_desc</a></h3>
<p>
一个可读的字符串用于描述编译细节<br/>
build_desc&nbsp;:=&nbsp;$(TARGET_PRODUCT)-$(TARGET_BUILD_VARIANT)&nbsp;$(PLATFORM_VERSION)&nbsp;$(BUILD_ID)&nbsp;$(BUILD_NUMBER)&nbsp;$(BUILD_VERSION_TAGS)<br/>
对应BUILD_DISPLAY_ID<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_FINGERPRINT">BUILD_FINGERPRINT</a></h3>
<p>
用于唯一标志某次BUILD的字符串，被ota&nbsp;server使用<br/>
示例：OPPO/oppo_12069/FIND5:4.1.1/JRO03L/1362469752:user/release-keys<br/>
ifeq&nbsp;(,$(strip&nbsp;$(BUILD_FINGERPRINT)))<br/>
&nbsp;&nbsp;BUILD_FINGERPRINT&nbsp;:=&nbsp;$(PRODUCT_BRAND)/$(TARGET_PRODUCT)/$(TARGET_DEVICE):$(PLATFORM_VERSION)/$(BUILD_ID)/$(BUILD_NUMBER):$(TARGET_BUILD_VARIANT)/$(BUILD_VERSION_TAGS)<br/>
endif<br/>
ifneq&nbsp;($(words&nbsp;$(BUILD_FINGERPRINT)),1)<br/>
&nbsp;&nbsp;$(error&nbsp;BUILD_FINGERPRINT&nbsp;cannot&nbsp;contain&nbsp;spaces:&nbsp;"$(BUILD_FINGERPRINT)")<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_DISPLAY_ID">BUILD_DISPLAY_ID</a></h3>
<p>
当用户打开设置&nbsp;关于手机时&nbsp;显示的&nbsp;参数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
示例：cm_find5-userdebug&nbsp;4.2.2&nbsp;JDQ39E&nbsp;eng.cloud.20130814.132653&nbsp;test-keys<br/>
&nbsp;&nbsp;ifeq&nbsp;($(TARGET_BUILD_VARIANT),user)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;User&nbsp;builds&nbsp;should&nbsp;show:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;release&nbsp;build&nbsp;number&nbsp;or&nbsp;branch.buld_number&nbsp;non-release&nbsp;builds<br/>
&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;Dev.&nbsp;branches&nbsp;should&nbsp;have&nbsp;DISPLAY_BUILD_NUMBER&nbsp;set<br/>
&nbsp;&nbsp;&nbsp;&nbsp;ifeq&nbsp;"true"&nbsp;"$(DISPLAY_BUILD_NUMBER)"<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUILD_DISPLAY_ID&nbsp;:=&nbsp;$(BUILD_ID).$(BUILD_NUMBER)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUILD_DISPLAY_ID&nbsp;:=&nbsp;$(BUILD_ID)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;endif<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;Non-user&nbsp;builds&nbsp;should&nbsp;show&nbsp;detailed&nbsp;build&nbsp;information<br/>
&nbsp;&nbsp;&nbsp;&nbsp;BUILD_DISPLAY_ID&nbsp;:=&nbsp;$(build_desc)<br/>
&nbsp;&nbsp;endif&nbsp;&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="product_property_override_locale_language">product_property_override_locale_language</a></h3>
<p>
如果产品配置在&nbsp;PRODUCT_PROPERTY_OVERRIDES变量里添加ro.product.locale.language<br/>
那么product_property_override_locale_language将使用该语言<br/>
</p>
</div>
<div class="variable">
<h3><a id="product_property_overrides_locale_region">product_property_overrides_locale_region</a></h3>
<p>
如果产品配置在&nbsp;PRODUCT_PROPERTY_OVERRIDES变量里添加ro.product.locale.region<br/>
那么product_property_overrides_locale_region将使用该区域<br/>
</p>
</div>
<div class="function">
<h3><a id="default-locale">Function:&nbsp;&nbsp;default-locale</a></h3>
<p>
从列表里选择第一个locale作为参数，&nbsp;并且把它分割为lanague和区域<br/>
</p>
</div>
<div class="function">
<h3><a id="default-locale-language">Function:&nbsp;&nbsp;default-locale-language</a></h3>
<p>
获取默认语言，默认语言设置通过在&nbsp;PRODUCT_PROPERTY_OVERRIDES变量里添加ro.product.locale.language<br/>
</p>
</div>
<div class="function">
<h3><a id="default-locale-region">Function:&nbsp;&nbsp;default-locale-region</a></h3>
<p>
获取默认区域&nbsp;默认区域设置通过在&nbsp;PRODUCT_PROPERTY_OVERRIDES变量里添加ro.product.locale.locale<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILDINFO_SH">BUILDINFO_SH</a></h3>
<p>
生成build.prop的工具<br/>
BUILDINFO_SH&nbsp;:=&nbsp;build/tools/buildinfo.sh<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_BUILD_PROP_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_BUILD_PROP_TARGET)</a></h3>
<p>
生成步骤：<br/>
1)设置好TARGET_BUILD_TYPE，TARGET_DEVICE&nbsp;等变量后，调用buildinfo.sh生成build.prop文件<br/>
2)如果有system.prop，则将system.prop的属性追加到build.prop文件<br/>
3)如果还有额外的$(ADDITIONAL_BUILD_PROPERTIES)，将其追加到build.prop文件<br/>
4)调用build/tools/post_process_props.py对build.prop做去重处理<br/>
</p>
</div>
<div class="variable">
<h3><a id="sdk_build_prop_remove">sdk_build_prop_remove</a></h3>
<p>
需要充build.prop里移除的属性集合，生成sdk-build.prop并不需要这些属性<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_SDK_BUILD_PROP_TARGET">INSTALLED_SDK_BUILD_PROP_TARGET</a></h3>
<p>
INSTALLED_SDK_BUILD_PROP_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/sdk/sdk-build.prop<br/>
示例：out/target/product/i9100/sdk/sdk-build.prop<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_SDK_BUILD_PROP_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_SDK_BUILD_PROP_TARGET)</a></h3>
<p>
从build.prop里移除sdk_build_prop_remove所指的属性集，便得到sdk-build.prop文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="PACKAGE_STATS_FILE">PACKAGE_STATS_FILE</a></h3>
<p>
安装包&nbsp;统计文件<br/>
PACKAGE_STATS_FILE&nbsp;:=&nbsp;$(PRODUCT_OUT)/package-stats.txt<br/>
示例：out/target/product/i9100/package-stats.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="PACKAGES_TO_STAT">PACKAGES_TO_STAT</a></h3>
<p>
从$(ALL_DEFAULT_INSTALLED_MODULES)获取%.jar&nbsp;%.apk之类的文件<br/>
便得到需要统计的package<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(PACKAGE_STATS_FILE)">Target:&nbsp;&nbsp;$(PACKAGE_STATS_FILE)</a></h3>
<p>
调用build/tools/dump-package-stats脚本对所有的jar和apk文件进行统计<br/>
</p>
</div>
<div class="variable">
<h3><a id="_apkcerts_echo_with_newline">_apkcerts_echo_with_newline</a></h3>
<p>
包和给包签名的密钥之间的映射.&nbsp;将被post-build&nbsp;签名工具所用<br/>
只是给输入参数添加了一个回车符<br/>
$(1)&nbsp;包和签名的密钥之间的映射<br/>
</p>
</div>
<div class="variable">
<h3><a id="APKCERTS_FILE">APKCERTS_FILE</a></h3>
<p>
示例：<br/>
out/target/product/find5/obj/PACKAGING/apkcerts_intermediates/cm_find5-apkcerts-eng.cloud.txt<br/>
内容示例：<br/>
name="ThemeManagerTests.apk"&nbsp;certificate="build/target/product/security/testkey.x509.pem"&nbsp;private_key="build/target/product/security/testkey.pk8"<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(APKCERTS_FILE)">Target:&nbsp;&nbsp;$(APKCERTS_FILE)</a></h3>
<p>
生成规则：<br/>
每个PACKAGE会被添加至$(PACKAGES)<br/>
如果为某个PACKAGE设置了key，那么$(PACKAGES.$(p).EXTERNAL_KEY将为true)，<br/>
将所有package的签名密钥输出到$(APKCERTS_FILE)里<br/>
</p>
</div>
<div class="build_target">
<h3><a id="apkcerts-list">Target:&nbsp;&nbsp;apkcerts-list</a></h3>
<p>
伪目标，如果是用该目标将生成$(APKCERTS_FILE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="CREATE_MODULE_INFO_FILE">CREATE_MODULE_INFO_FILE</a></h3>
<p>
是否生成模块信息<br/>
若定义了该变量，可输出所有模块的信息<br/>
</p>
</div>
<div class="variable">
<h3><a id="MODULE_INFO_FILE">MODULE_INFO_FILE</a></h3>
<p>
MODULE_INFO_FILE&nbsp;:=&nbsp;$(PRODUCT_OUT)/module-info.txt<br/>
示例：&nbsp;&nbsp;&nbsp;out/target/product/find5/module-info.txt<br/>
里面的内容有:<br/>
&nbsp;"NAME=\"$(m)\""<br/>
&nbsp;"PATH=\"$(strip&nbsp;$(ALL_MODULES.$(m).PATH))\""<br/>
&nbsp;"TAGS=\"$(strip&nbsp;$(filter-out&nbsp;_%,$(ALL_MODULES.$(m).TAGS)))\""&nbsp;\<br/>
&nbsp;"BUILT=\"$(strip&nbsp;$(ALL_MODULES.$(m).BUILT))\""&nbsp;\<br/>
&nbsp;"INSTALLED=\"$(strip&nbsp;$(ALL_MODULES.$(m).INSTALLED))\""&nbsp;>>&nbsp;$(MODULE_INFO_FILE)))<br/>
</p>
</div>
<div class="variable">
<h3><a id="DEFAULT_KEY_CERT_PAIR">DEFAULT_KEY_CERT_PAIR</a></h3>
<p>
dev&nbsp;key&nbsp;用于给package以及Ota包签名<br/>
产品交付时将被重新签名，我们希望签名用的密钥文件的后缀是.pk8和.x509.pem<br/>
DEFAULT_KEY_CERT_PAIR&nbsp;:=&nbsp;$(DEFAULT_SYSTEM_DEV_CERTIFICATE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="OTA_PACKAGE_SIGNING_KEY">OTA_PACKAGE_SIGNING_KEY</a></h3>
<p>
在Device配置文件里可定义该变量，变量值为给包签名的密钥的名称<br/>
ifneq&nbsp;($(OTA_PACKAGE_SIGNING_KEY),)<br/>
&nbsp;DEFAULT_KEY_CERT_PAIR&nbsp;:=&nbsp;$(OTA_PACKAGE_SIGNING_KEY)<br/>
endif<br/>
</p>
</div>
<div class="build_target">
<h3><a id="systemimage">Target:&nbsp;&nbsp;systemimage</a></h3>
<p>
生成system.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="event-log-tags">Target:&nbsp;&nbsp;event-log-tags</a></h3>
<p>
生成event-log-tags<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_event_log_tags_file">all_event_log_tags_file</a></h3>
<p>
为我们知道的一切生成一个event&nbsp;log&nbsp;tags文件<br/>
all_event_log_tags_file&nbsp;:=&nbsp;$(TARGET_OUT_COMMON_INTERMEDIATES)/all-event-log-tags.txt<br/>
示例：out/target/common/obj/all-event-log-tags.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="event_log_tags_file">event_log_tags_file</a></h3>
<p>
为我们知道的要安装的东西生成一个event&nbsp;log&nbsp;tags文件<br/>
&nbsp;event_log_tags_file&nbsp;:=&nbsp;$(TARGET_OUT)/etc/event-log-tags<br/>
&nbsp;示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/i9100/etc/event-log-tags<br/>
</p>
</div>
<div class="variable">
<h3><a id="all_event_log_tags_src">all_event_log_tags_src</a></h3>
<p>
Include&nbsp;tags&nbsp;from&nbsp;all&nbsp;packages&nbsp;that&nbsp;we&nbsp;know&nbsp;about<br/>
all_event_log_tags_src&nbsp;:=&nbsp;\<br/>
&nbsp;$(sort&nbsp;$(foreach&nbsp;m,&nbsp;$(ALL_MODULES),&nbsp;$(ALL_MODULES.$(m).EVENT_LOG_TAGS)))<br/>
</p>
</div>
<div class="variable">
<h3><a id="pdk_fusion_log_tags_file">pdk_fusion_log_tags_file</a></h3>
<p>
PDK&nbsp;builds&nbsp;will&nbsp;already&nbsp;have&nbsp;a&nbsp;full&nbsp;list&nbsp;of&nbsp;tags&nbsp;that&nbsp;needs&nbsp;to&nbsp;get&nbsp;merged<br/>
in&nbsp;with&nbsp;the&nbsp;ones&nbsp;from&nbsp;source<br/>
pdk_fusion_log_tags_file&nbsp;:=&nbsp;$(patsubst&nbsp;$(PRODUCT_OUT)/%,$(_pdk_fusion_intermediates)/%,$(filter&nbsp;$(event_log_tags_file),$(ALL_PDK_FUSION_FILES)))<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(all_event_log_tags_file)">Target:&nbsp;&nbsp;$(all_event_log_tags_file)</a></h3>
<p>
调用build/tools/merge-event-log-tags.py对$(all_event_log_tags_src)进行处理得到<br/>
文件内容示例：<br/>
&nbsp;205011&nbsp;google_mail_switch&nbsp;(direction|1)<br/>
</p>
</div>
<div class="variable">
<h3><a id="$(event_log_tags_file)">$(event_log_tags_file)</a></h3>
<p>
调用build/tools/merge-event-log-tags.py对$(event_log_tags_src)等文件进行处理得到<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_RAMDISK_FILES">INTERNAL_RAMDISK_FILES</a></h3>
<p>
生成ramdisk的文件集合，这些文件都位于out/target/product/i9100/root<br/>
INTERNAL_RAMDISK_FILES&nbsp;:=&nbsp;$(filter&nbsp;$(TARGET_ROOT_OUT)/%,&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(ALL_PREBUILT)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(ALL_COPIED_HEADERS)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(ALL_GENERATED_SOURCES)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(ALL_DEFAULT_INSTALLED_MODULES))&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILT_RAMDISK_TARGET">BUILT_RAMDISK_TARGET</a></h3>
<p>
BUILT_RAMDISK_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/ramdisk.img<br/>
示例：out/target/product/i9100/ramdisk.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_RAMDISK_TARGET">INSTALLED_RAMDISK_TARGET</a></h3>
<p>
INSTALLED_RAMDISK_TARGET&nbsp;:=&nbsp;$(BUILT_RAMDISK_TARGET)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_RAMDISK_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_RAMDISK_TARGET)</a></h3>
<p>
调用mkbootfs程序对out/target/product/i9100/root处理然后再调用minigzip程序处理即得到ramdisk.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_BOOTIMAGE_ARGS">INTERNAL_BOOTIMAGE_ARGS</a></h3>
<p>
调用mkbootimg程序时传递的参数，需特别小心，在Device配置文件可直接为该变量添加参数<br/>
INTERNAL_BOOTIMAGE_ARGS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(addprefix&nbsp;--second&nbsp;,$(INSTALLED_2NDBOOTLOADER_TARGET))&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;--kernel&nbsp;$(INSTALLED_KERNEL_TARGET)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;--ramdisk&nbsp;$(INSTALLED_RAMDISK_TARGET)&nbsp;&nbsp;&nbsp;<br/>
ifdef&nbsp;BOARD_KERNEL_CMDLINE<br/>
&nbsp;&nbsp;INTERNAL_BOOTIMAGE_ARGS&nbsp;+=&nbsp;--cmdline&nbsp;"$(BOARD_KERNEL_CMDLINE)"<br/>
endif<br/>
ifdef&nbsp;BOARD_KERNEL_BASE<br/>
&nbsp;&nbsp;INTERNAL_BOOTIMAGE_ARGS&nbsp;+=&nbsp;--base&nbsp;$(BOARD_KERNEL_BASE)<br/>
endif<br/>
BOARD_KERNEL_PAGESIZE&nbsp;:=&nbsp;$(strip&nbsp;$(BOARD_KERNEL_PAGESIZE))<br/>
ifdef&nbsp;BOARD_KERNEL_PAGESIZE<br/>
&nbsp;&nbsp;INTERNAL_BOOTIMAGE_ARGS&nbsp;+=&nbsp;--pagesize&nbsp;$(BOARD_KERNEL_PAGESIZE)<br/>
endif&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_BOOTIMAGE_FILES">INTERNAL_BOOTIMAGE_FILES</a></h3>
<p>
生成boot.img需要的文件集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_KERNEL_CMDLINE">BOARD_KERNEL_CMDLINE</a></h3>
<p>
内核启动参数，这个在Devcie配置文件BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_KERNEL_BASE">BOARD_KERNEL_BASE</a></h3>
<p>
内核基址，这个在Devcie配置文件BoardConfig.mk里配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_FORCE_RAMDISK_ADDRESS">BOARD_FORCE_RAMDISK_ADDRESS</a></h3>
<p>
以前的版本使用该参数强制设置ramdisk的地址<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_MKBOOTIMG_ARGS">BOARD_MKBOOTIMG_ARGS</a></h3>
<p>
现在需要使用BOARD_MKBOOTIMG_ARGS添加制作boot.img的参数<br/>
BOARD_MKBOOTIMG_ARGS&nbsp;:=&nbsp;--ramdisk_offset&nbsp;0x02000000<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_BOOTIMAGE_TARGET">INSTALLED_BOOTIMAGE_TARGET</a></h3>
<p>
INSTALLED_BOOTIMAGE_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/boot.img<br/>
out/target/product/i9100/boot.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BOOTIMAGE_USE_EXT2">TARGET_BOOTIMAGE_USE_EXT2</a></h3>
<p>
boot.img是否使用ext2格式<br/>
</p>
</div>
<div class="variable">
<h3><a id="tmp_dir_for_image">tmp_dir_for_image</a></h3>
<p>
tmp_dir_for_image&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,EXECUTABLES,boot_img)/bootimg<br/>
示例：<br/>
&nbsp;&nbsp;out/target/product/find5/obj/EXECUTABLES/boot_img_indeterminates<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_BOOTIMAGE_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_BOOTIMAGE_TARGET)</a></h3>
<p>
如果定义TARGET_BOOTIMAGE_USE_EXT2为true<br/>
&nbsp;&nbsp;那么使用external/genext2fs/mkbootimg_ext2.sh&nbsp;程序&nbsp;并传递参数$(INTERNAL_BOOTIMAGE_ARGS)&nbsp;&nbsp;生成boot.img<br/>
否则<br/>
&nbsp;&nbsp;&nbsp;调用mkbootimg程序并传递参数$(INTERNAL_BOOTIMAGE_ARGS)&nbsp;&nbsp;生成boot.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="notice_files">Target:&nbsp;&nbsp;notice_files</a></h3>
<p>
生成notice_files文件<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
