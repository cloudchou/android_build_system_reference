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
<div class="function">
<h3><a id="combine-notice-files">Function:&nbsp;&nbsp;combine-notice-files</a></h3>
<p>
Create&nbsp;the&nbsp;rule&nbsp;to&nbsp;combine&nbsp;the&nbsp;files&nbsp;into&nbsp;text&nbsp;and&nbsp;html&nbsp;forms<br/>
&nbsp;$(1)&nbsp;-&nbsp;Plain&nbsp;text&nbsp;output&nbsp;file<br/>
&nbsp;$(2)&nbsp;-&nbsp;HTML&nbsp;output&nbsp;file<br/>
&nbsp;$(3)&nbsp;-&nbsp;File&nbsp;title<br/>
&nbsp;$(4)&nbsp;-&nbsp;Directory&nbsp;to&nbsp;use.&nbsp;&nbsp;Notice&nbsp;files&nbsp;are&nbsp;all&nbsp;$(4)/src.&nbsp;&nbsp;Other<br/>
&nbsp;&nbsp;&nbsp;directories&nbsp;in&nbsp;there&nbsp;will&nbsp;be&nbsp;used&nbsp;for&nbsp;scratch&nbsp;&nbsp;&nbsp;&nbsp;<br/>
&nbsp;$(5)&nbsp;-&nbsp;Dependencies&nbsp;for&nbsp;the&nbsp;output&nbsp;files<br/>
The&nbsp;algorithm&nbsp;here&nbsp;is&nbsp;that&nbsp;we&nbsp;go&nbsp;collect&nbsp;a&nbsp;hash&nbsp;for&nbsp;each&nbsp;of&nbsp;the&nbsp;notice<br/>
files&nbsp;and&nbsp;write&nbsp;the&nbsp;names&nbsp;of&nbsp;the&nbsp;files&nbsp;that&nbsp;match&nbsp;that&nbsp;hash.&nbsp;&nbsp;Then<br/>
to&nbsp;generate&nbsp;the&nbsp;real&nbsp;files,&nbsp;we&nbsp;go&nbsp;print&nbsp;out&nbsp;all&nbsp;of&nbsp;the&nbsp;files&nbsp;and&nbsp;their<br/>
&nbsp;hashes.<br/>
These&nbsp;rules&nbsp;are&nbsp;fairly&nbsp;complex,&nbsp;so&nbsp;they&nbsp;depend&nbsp;on&nbsp;this&nbsp;makefile&nbsp;so&nbsp;if<br/>
it&nbsp;changes,&nbsp;they'll&nbsp;run&nbsp;again.<br/>
</p>
</div>
<div class="variable">
<h3><a id="target_notice_file_txt">target_notice_file_txt</a></h3>
<p>
target_notice_file_txt&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/NOTICE.txt<br/>
示例：out/target/product/i9100/obj/NOTICE.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="target_notice_file_html">target_notice_file_html</a></h3>
<p>
target_notice_file_html&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/NOTICE.html<br/>
示例：out/target/product/i9100/obj/NOTICE.html<br/>
</p>
</div>
<div class="variable">
<h3><a id="target_notice_file_html_gz">target_notice_file_html_gz</a></h3>
<p>
target_notice_file_html_gz&nbsp;:=&nbsp;$(TARGET_OUT_INTERMEDIATES)/NOTICE.html.gz<br/>
示例：out/target/product/i9100/obj/NOTICE.html.gz<br/>
</p>
</div>
<div class="variable">
<h3><a id="tools_notice_file_txt">tools_notice_file_txt</a></h3>
<p>
tools_notice_file_txt&nbsp;:=&nbsp;$(HOST_OUT_INTERMEDIATES)/NOTICE.txt<br/>
示例：:out/host/linux-x86/obj/NOTICE.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="tools_notice_file_html">tools_notice_file_html</a></h3>
<p>
tools_notice_file_html&nbsp;:=&nbsp;$(HOST_OUT_INTERMEDIATES)/NOTICE.html<br/>
示例：out/host/linux-x86/obj/NOTICE.html<br/>
</p>
</div>
<div class="variable">
<h3><a id="kernel_notice_file">kernel_notice_file</a></h3>
<p>
kernel_notice_file&nbsp;:=&nbsp;$(TARGET_OUT_NOTICE_FILES)/src/kernel.txt<br/>
示例：out/target/product/i9100/obj/NOTICE_FILES/src/kernel.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="pdk_fusion_notice_files">pdk_fusion_notice_files</a></h3>
<p>
pdk_fusion_notice_files&nbsp;:=&nbsp;$(filter&nbsp;$(TARGET_OUT_NOTICE_FILES)/%,&nbsp;$(ALL_PDK_FUSION_FILES))<br/>
ALL_PDK_FUSION_FILES里得到符合$(TARGET_OUT_NOTICE_FILES)/%的文件<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(target_notice_file_html_gz)">Target:&nbsp;&nbsp;$(target_notice_file_html_gz)</a></h3>
<p>
利用minigzip将$(target_notice_file_html)压缩生成out/target/product/i9100/obj/NOTICE.html.gz<br/>
</p>
</div>
<div class="variable">
<h3><a id="installed_notice_html_gz">installed_notice_html_gz</a></h3>
<p>
installed_notice_html_gz&nbsp;:=&nbsp;$(TARGET_OUT)/etc/NOTICE.html.gz<br/>
示例：out/target/product/i9100/system/etc/NOTICE.html.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(installed_notice_html_gz)">Target:&nbsp;&nbsp;$(installed_notice_html_gz)</a></h3>
<p>
生成规则：<br/>
&nbsp;将$(target_notice_file_html_gz)拷贝至system/etc/NOTICE.html.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(kernel_notice_file)">Target:&nbsp;&nbsp;$(kernel_notice_file)</a></h3>
<p>
The&nbsp;kernel&nbsp;isn't&nbsp;really&nbsp;a&nbsp;module,&nbsp;so&nbsp;to&nbsp;get&nbsp;its&nbsp;module&nbsp;file&nbsp;in&nbsp;there,&nbsp;we<br/>
&nbsp;&nbsp;&nbsp;make&nbsp;the&nbsp;target&nbsp;NOTICE&nbsp;files&nbsp;depend&nbsp;on&nbsp;this&nbsp;particular&nbsp;file&nbsp;too,&nbsp;which&nbsp;will<br/>
then&nbsp;be&nbsp;in&nbsp;the&nbsp;right&nbsp;directory&nbsp;for&nbsp;the&nbsp;find&nbsp;in&nbsp;combine-notice-files&nbsp;to&nbsp;work.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生成规则：<br/>
&nbsp;&nbsp;将prebuilts/qemu-kernel/arm/LINUX_KERNEL_COPYING拷贝生成$(kernel_notice_file)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="otacerts">Target:&nbsp;&nbsp;otacerts</a></h3>
<p>
伪目标，用于生成在out/target/product/i9100/system/etc/otacerts.zip<br/>
生成规则：<br/>
&nbsp;&nbsp;&nbsp;将$(DEFAULT_KEY_CERT_PAIR).x509.pem打包为otacerts.zip<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_USERIMAGES_EXT_VARIANT">INTERNAL_USERIMAGES_EXT_VARIANT</a></h3>
<p>
生成的img文件用的格式，可能为空，也可能为ext2,&nbsp;ext3，ext4<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_USERIMAGES_USE_EXT">INTERNAL_USERIMAGES_USE_EXT</a></h3>
<p>
生成的镜像文件格式是否启用ext类型<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_USERIMAGES_USE_EXT2">TARGET_USERIMAGES_USE_EXT2</a></h3>
<p>
是否使用ext2格式的镜像类型，<br/>
示例(在devcie目录的BoardConfig.mk里设置)：<br/>
&nbsp;&nbsp;&nbsp;TARGET_USERIMAGES_USE_EXT2&nbsp;:=&nbsp;true<br/>
如果设置为true，那么<br/>
INTERNAL_USERIMAGES_USE_EXT&nbsp;:=&nbsp;true<br/>
INTERNAL_USERIMAGES_EXT_VARIANT&nbsp;:=&nbsp;ext2<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_USERIMAGES_USE_EXT3">TARGET_USERIMAGES_USE_EXT3</a></h3>
<p>
是否使用ext3格式的镜像类型，<br/>
示例(在devcie目录的BoardConfig.mk里设置)：<br/>
&nbsp;&nbsp;&nbsp;TARGET_USERIMAGES_USE_EXT3&nbsp;:=&nbsp;true<br/>
如果设置为true，那么<br/>
INTERNAL_USERIMAGES_USE_EXT&nbsp;:=&nbsp;true<br/>
INTERNAL_USERIMAGES_EXT_VARIANT&nbsp;:=&nbsp;ext3<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_USERIMAGES_USE_EXT4">TARGET_USERIMAGES_USE_EXT4</a></h3>
<p>
是否使用ext4格式的镜像类型，<br/>
示例(在devcie目录的BoardConfig.mk里设置)：<br/>
&nbsp;&nbsp;&nbsp;TARGET_USERIMAGES_USE_EXT4&nbsp;:=&nbsp;true<br/>
如果设置为true，那么<br/>
INTERNAL_USERIMAGES_USE_EXT&nbsp;:=&nbsp;true<br/>
INTERNAL_USERIMAGES_EXT_VARIANT&nbsp;:=&nbsp;ext4<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_USERIMAGES_SPARSE_EXT_DISABLED">TARGET_USERIMAGES_SPARSE_EXT_DISABLED</a></h3>
<p>
是否关闭稀疏的ext格式<br/>
在BoardConfig.mk里设置，<br/>
&nbsp;&nbsp;&nbsp;&nbsp;TARGET_USERIMAGES_SPARSE_EXT_DISABLED&nbsp;:=&nbsp;true<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_USERIMAGES_SPARSE_EXT_FLAG">INTERNAL_USERIMAGES_SPARSE_EXT_FLAG</a></h3>
<p>
如果设置了TARGET_USERIMAGES_SPARSE_EXT_DISABLED为true<br/>
那么<br/>
&nbsp;&nbsp;&nbsp;&nbsp;INTERNAL_USERIMAGES_SPARSE_EXT_FLAG&nbsp;:=&nbsp;-s<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_USERIMAGES_DEPS">INTERNAL_USERIMAGES_DEPS</a></h3>
<p>
生成userimage依赖的文件<br/>
ifeq&nbsp;($(INTERNAL_USERIMAGES_USE_EXT),true)<br/>
INTERNAL_USERIMAGES_DEPS&nbsp;:=&nbsp;$(MKEXTUSERIMG)&nbsp;$(MAKE_EXT4FS)&nbsp;$(SIMG2IMG)&nbsp;$(E2FSCK)<br/>
else<br/>
INTERNAL_USERIMAGES_DEPS&nbsp;:=&nbsp;$(MKYAFFS2)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_USERIMAGES_BINARY_PATHS">INTERNAL_USERIMAGES_BINARY_PATHS</a></h3>
<p>
$(INTERNAL_USERIMAGES_DEPS)所指的文件&nbsp;所在的&nbsp;目录&nbsp;集合<br/>
</p>
</div>
<div class="function">
<h3><a id="generate-userimage-prop-dictionary">Function:&nbsp;&nbsp;generate-userimage-prop-dictionary</a></h3>
<p>
生成词典文件<br/>
$(1):&nbsp;the&nbsp;path&nbsp;of&nbsp;the&nbsp;output&nbsp;dictionary&nbsp;file<br/>
词典的词有：<br/>
fs_type=$(INTERNAL_USERIMAGES_EXT_VARIANT)<br/>
system_size=$(BOARD_SYSTEMIMAGE_PARTITION_SIZE)<br/>
userdata_size=$(BOARD_USERDATAIMAGE_PARTITION_SIZE)<br/>
cache_fs_type=$(BOARD_CACHEIMAGE_FILE_SYSTEM_TYPE)<br/>
cache_size=$(BOARD_CACHEIMAGE_PARTITION_SIZE)<br/>
extfs_sparse_flag=$(INTERNAL_USERIMAGES_SPARSE_EXT_FLAG)<br/>
mkyaffs2_extra_flags=$(mkyaffs2_extra_flags)<br/>
selinux_fc=$(TARGET_ROOT_OUT)/file_contexts<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_UTILITY_FILES">INTERNAL_UTILITY_FILES</a></h3>
<p>
从所有要安装的模块里选出安装在$(PRODUCT_OUT)/utilities的文件<br/>
</p>
</div>
<div class="build_target">
<h3><a id="utilities">Target:&nbsp;&nbsp;utilities</a></h3>
<p>
生成所有安装在$(PRODUCT)/utitility目录的文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_RECOVERYIMAGE_TARGET">INSTALLED_RECOVERYIMAGE_TARGET</a></h3>
<p>
INSTALLED_RECOVERYIMAGE_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/recovery.img<br/>
使用mka&nbsp;recoveryimage生成的文件<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/recovery.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RECOVERY_INITRC">TARGET_RECOVERY_INITRC</a></h3>
<p>
recovery镜像根文件系统使用的init.rc文件<br/>
在BoardConfig.mk文件里设置<br/>
示例：<br/>
&nbsp;&nbsp;TARGET_RECOVERY_INITRC&nbsp;:=&nbsp;device/samsung/i9100g/rootdir/recovery.rc<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_initrc">recovery_initrc</a></h3>
<p>
recovery镜像根文件系统是的init.rc文件，<br/>
如果设置了TARGET_RECOVERY_INITRC，那么使用TARGET_RECOVERY_INITRC作为根文件系统的init.rc<br/>
否则使用bootable/recovery/etc/init.rc作为根文件系统的init.rc<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_USES_RECOVERY_CHARGEMODE">BOARD_USES_RECOVERY_CHARGEMODE</a></h3>
<p>
是否用recovery模式做充电模式，该宏在cm10.1已经被取消了，<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_PREBUILT_RECOVERY_KERNEL">TARGET_PREBUILT_RECOVERY_KERNEL</a></h3>
<p>
预制的内核，适配设备时，常拿不到内核源码，可使用该宏设置已经编译好的内核<br/>
示例：<br/>
&nbsp;&nbsp;TARGET_PREBUILT_RECOVERY_KERNEL&nbsp;:=&nbsp;device/samsung/i9100g/kernel<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_kernel">recovery_kernel</a></h3>
<p>
编译Recovery使用的内核&nbsp;&nbsp;&nbsp;<br/>
ifneq&nbsp;($(TARGET_PREBUILT_RECOVERY_KERNEL),)<br/>
&nbsp;&nbsp;recovery_kernel&nbsp;:=&nbsp;$(TARGET_PREBUILT_RECOVERY_KERNEL)&nbsp;#&nbsp;Use&nbsp;prebuilt&nbsp;recovery&nbsp;kernel<br/>
else<br/>
&nbsp;&nbsp;recovery_kernel&nbsp;:=&nbsp;$(INSTALLED_KERNEL_TARGET)&nbsp;#&nbsp;same&nbsp;as&nbsp;a&nbsp;non-recovery&nbsp;system<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_uncompressed_ramdisk">recovery_uncompressed_ramdisk</a></h3>
<p>
recovery_uncompressed_ramdisk&nbsp;:=&nbsp;$(PRODUCT_OUT)/ramdisk-recovery.cpio<br/>
示例：<br/>
out/target/product/i9100/ramdisk-recovery.cpio<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_ramdisk">recovery_ramdisk</a></h3>
<p>
recovery使用的根文件系统<br/>
recovery_ramdisk&nbsp;:=&nbsp;$(PRODUCT_OUT)/ramdisk-recovery.img<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/i9100/ramdisk-recovery.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_build_prop">recovery_build_prop</a></h3>
<p>
recovery_build_prop&nbsp;:=&nbsp;$(INSTALLED_BUILD_PROP_TARGET)<br/>
&nbsp;示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/i9100/system/build.prop<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_binary">recovery_binary</a></h3>
<p>
recovery_binary&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,EXECUTABLES,recovery)/recovery<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/target/common/obj/EXECUTABLES/recovery_intermediates/recovery<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_resources_common">recovery_resources_common</a></h3>
<p>
recovery_resources_common&nbsp;:=&nbsp;$(call&nbsp;include-path-for,&nbsp;recovery)/res<br/>
示例：<br/>
bootable/recovery/res<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_resources_private">recovery_resources_private</a></h3>
<p>
recovery_resources_private&nbsp;:=&nbsp;$(strip&nbsp;$(wildcard&nbsp;$(TARGET_DEVICE_DIR)/recovery/res))<br/>
示例：<br/>
device/htc/pyramid/recovery/res<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_root_private">recovery_root_private</a></h3>
<p>
recovery_root_private&nbsp;:=&nbsp;$(strip&nbsp;$(wildcard&nbsp;$(TARGET_DEVICE_DIR)/recovery/root))<br/>
示例：&nbsp;&nbsp;&nbsp;<br/>
device/htc/pyramid/recovery/root<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_resource_deps">recovery_resource_deps</a></h3>
<p>
编译recovery依赖的资源文件，包括bootable/recovery/res下的图片文件，device配置目录recovery/res下的文件<br/>
,device配置目录recovery/root下的文件<br/>
recovery_resource_deps&nbsp;:=&nbsp;$(shell&nbsp;find&nbsp;$(recovery_resources_common)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(recovery_resources_private)&nbsp;$(recovery_root_private)&nbsp;-type&nbsp;f)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RECOVERY_FSTAB">TARGET_RECOVERY_FSTAB</a></h3>
<p>
可通过TARGET_RECOVERY_FSTAB设置recovery使用的分区表文件<br/>
在BoardConfig.mk里设置<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;TARGET_RECOVERY_FSTAB&nbsp;:=&nbsp;device/samsung/i9100g/recovery.fstab<br/>
</p>
</div>
<div class="variable">
<h3><a id="recovery_fstab">recovery_fstab</a></h3>
<p>
recovery使用的分区表文件，<br/>
如果未设置TARGET_RECOVERY_FSTAB，那么使用<br/>
&nbsp;&nbsp;&nbsp;$(TARGET_DEVICE_DIR)/recovery.fstab&nbsp;&nbsp;&nbsp;&nbsp;如&nbsp;device/samsung/i9100g/recovery.fstab<br/>
否则使用$(TARGET_RECOVERY_FSTAB)的值<br/>
</p>
</div>
<div class="variable">
<h3><a id="RECOVERY_RESOURCE_ZIP">RECOVERY_RESOURCE_ZIP</a></h3>
<p>
recovery资源的记录：<br/>
RECOVERY_RESOURCE_ZIP&nbsp;:=&nbsp;$(TARGET_OUT)/etc/recovery-resource.dat<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/i9100/system/etc/recovery-resource.dat<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_RECOVERYIMAGE_ARGS">INTERNAL_RECOVERYIMAGE_ARGS</a></h3>
<p>
调用mkboot程序使用的参数<br/>
其中的参数有：<br/>
--second&nbsp;,$(INSTALLED_2NDBOOTLOADER_TARGET)<br/>
--kernel&nbsp;$(recovery_kernel)<br/>
--ramdisk&nbsp;$(recovery_ramdisk)<br/>
--cmdline&nbsp;"$(BOARD_KERNEL_CMDLINE)"<br/>
--base&nbsp;$(BOARD_KERNEL_BASE)<br/>
--pagesize&nbsp;$(BOARD_KERNEL_PAGESIZE)<br/>
--ramdiskaddr&nbsp;$(BOARD_FORCE_RAMDISK_ADDRESS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_KERNEL_CMDLINE">BOARD_KERNEL_CMDLINE</a></h3>
<p>
在BoardConfig.mk里设置启动内核参数<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;BOARD_KERNEL_CMDLINE&nbsp;:=&nbsp;console=ttyHSL0,115200,n8&nbsp;androidboot.hardware=find5&nbsp;lpj=67677<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_KERNEL_BASE">BOARD_KERNEL_BASE</a></h3>
<p>
在BoardConfig.mk里设置kernel基址<br/>
BOARD_KERNEL_BASE&nbsp;:=&nbsp;0x40000000<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_KERNEL_PAGESIZE">BOARD_KERNEL_PAGESIZE</a></h3>
<p>
在BoardConfig.mk里设置页大小<br/>
BOARD_KERNEL_PAGESIZE&nbsp;:=&nbsp;4096<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_FORCE_RAMDISK_ADDRESS">BOARD_FORCE_RAMDISK_ADDRESS</a></h3>
<p>
在BoardConfig.mk里设置ramdisk地址<br/>
BOARD_FORCE_RAMDISK_ADDRESS&nbsp;:=&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_RECOVERY_FILES">INTERNAL_RECOVERY_FILES</a></h3>
<p>
从所有安装模块$(ALL_MODULES.$(module).INSTALLED)&nbsp;$(ALL_DEFAULT_INSTALLED_MODULES)<br/>
得到安装在out/target/product/i9100/recovery下的文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="OTA_PUBLIC_KEYS">OTA_PUBLIC_KEYS</a></h3>
<p>
用于给ota包签名用的公钥.&nbsp;用dev-keys来签名<br/>
OTA_PUBLIC_KEYS&nbsp;:=&nbsp;$(DEFAULT_SYSTEM_DEV_CERTIFICATE).x509.pem<br/>
ifneq&nbsp;($(OTA_PACKAGE_SIGNING_KEY),)<br/>
&nbsp;OTA_PUBLIC_KEYS&nbsp;:=&nbsp;$(OTA_PACKAGE_SIGNING_KEY).x509.pem<br/>
&nbsp;PRODUCT_EXTRA_RECOVERY_KEYS&nbsp;:=&nbsp;$(DEFAULT_SYSTEM_DEV_CERTIFICATE)<br/>
endif<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;build/target/product/security/testkey.x509.pem<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_EXTRA_RECOVERY_KEYS">PRODUCT_EXTRA_RECOVERY_KEYS</a></h3>
<p>
PRODUCT_EXTRA_RECOVERY_KEYS&nbsp;:=&nbsp;$(DEFAULT_SYSTEM_DEV_CERTIFICATE)<br/>
PRODUCT_EXTRA_RECOVERY_KEYS&nbsp;+=&nbsp;build/target/product/security/cm<br/>
</p>
</div>
<div class="variable">
<h3><a id="RECOVERY_INSTALL_OTA_KEYS">RECOVERY_INSTALL_OTA_KEYS</a></h3>
<p>
包含签名公钥的key文件，recovery&nbsp;程序将用该公钥来验证是否<br/>
RECOVERY_INSTALL_OTA_KEYS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(call&nbsp;intermediates-dir-for,PACKAGING,ota_keys)/keys<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/find5/obj/PACKAGING/ota_keys_intermediates/keys<br/>
</p>
</div>
<div class="variable">
<h3><a id="DUMPKEY_JAR">DUMPKEY_JAR</a></h3>
<p>
DUMPKEY_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/dumpkey.jar<br/>
示例：out/host/linux-x86/framework/dumpkey.jar<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(RECOVERY_INSTALL_OTA_KEYS)">Target:&nbsp;&nbsp;$(RECOVERY_INSTALL_OTA_KEYS)</a></h3>
<p>
生成规则：<br/>
&nbsp;&nbsp;&nbsp;使用dumpkey.jar程序将公钥文件转为keys，并保存为$(RECOVERY_INSTALL_OTA_KEYS)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_RECOVERY_ROOT_TIMESTAMP">TARGET_RECOVERY_ROOT_TIMESTAMP</a></h3>
<p>
root.ts文件只是一个标志文件，表示recoery根文件系统文件是否都已经生成<br/>
TARGET_RECOVERY_ROOT_TIMESTAMP&nbsp;:=&nbsp;$(TARGET_RECOVERY_OUT)/root.ts<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;out/target/product/find5/recovery/root.ts<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(TARGET_RECOVERY_ROOT_TIMESTAMP)">Target:&nbsp;&nbsp;$(TARGET_RECOVERY_ROOT_TIMESTAMP)</a></h3>
<p>
生成规则：<br/>
&nbsp;&nbsp;&nbsp;1.&nbsp;新建目录&nbsp;&nbsp;$(TARGET_RECOVERY_OUT)<br/>
&nbsp;&nbsp;&nbsp;2.&nbsp;建立目录&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/etc&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/tmp<br/>
&nbsp;&nbsp;&nbsp;3.&nbsp;拷贝root目录下的文件到recovery/root，做recovery根文件系统的底包<br/>
&nbsp;&nbsp;&nbsp;4.&nbsp;删除&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/init*.rc<br/>
&nbsp;&nbsp;&nbsp;5.&nbsp;拷贝init.rc&nbsp;为&nbsp;recovery/root/init.rc<br/>
&nbsp;&nbsp;&nbsp;6.&nbsp;拷贝init.recovery.*rc文件&nbsp;-cp&nbsp;$(TARGET_ROOT_OUT)/init.recovery.*.rc&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/<br/>
&nbsp;&nbsp;&nbsp;7.&nbsp;拷贝recovery程序放到recovery/root/sbin目录&nbsp;&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;8.&nbsp;拷贝资源文件&nbsp;cp&nbsp;-rf&nbsp;$(recovery_resources_common)&nbsp;$(TARGET_RECOVERY_ROOT_OUT)/<br/>
&nbsp;&nbsp;&nbsp;9.&nbsp;拷贝私有的资源文件&nbsp;$(recovery_resources_private)<br/>
&nbsp;&nbsp;&nbsp;10.拷贝私有的根目录文件&nbsp;$(recovery_root_private)<br/>
&nbsp;&nbsp;&nbsp;11.&nbsp;拷贝recovery.fstab文件至recovery/root/etc/recovery.fstab<br/>
&nbsp;&nbsp;&nbsp;12.&nbsp;拷贝公钥导出的key文件<br/>
&nbsp;&nbsp;&nbsp;13.利用build.prop和$(INSTALLED_DEFAULT_PROP_TARGET)生成&nbsp;recovery/root/default.prop文件<br/>
&nbsp;&nbsp;&nbsp;14.处理default.prop文件ro.build.date.utc设置为0，ro.adb.secure=1取消<br/>
&nbsp;&nbsp;&nbsp;15.&nbsp;touch&nbsp;&nbsp;$(TARGET_RECOVERY_ROOT_TIMESTAMP)，便生成了recovery镜像的根文件系统<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(recovery_uncompressed_ramdisk)">Target:&nbsp;&nbsp;$(recovery_uncompressed_ramdisk)</a></h3>
<p>
利用mkbootfs程序将recovery/root生成根文件系统未压缩的镜像<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(recovery_ramdisk)">Target:&nbsp;&nbsp;$(recovery_ramdisk)</a></h3>
<p>
利用minigzip将$(recovery_uncompressed_ramdisk)生成根文件系统镜像ramdisk-recovery.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_CUSTOM_BOOTIMG_MK">BOARD_CUSTOM_BOOTIMG_MK</a></h3>
<p>
在BoardConfig.mk里设置用于生成镜像的makfile，象索尼的机器生成boot.img比较特殊，会设置该值<br/>
指向一个makefile文件，会用该文件生成boot.img和recovery.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_RECOVERYIMAGE_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_RECOVERYIMAGE_TARGET)</a></h3>
<p>
利用mkbootimg程序将内核&nbsp;根文件系统镜像&nbsp;以及设置的参数$(INTERNAL_RECOVERYIMAGE_ARGS)<br/>
&nbsp;生成recovery镜像<br/>
&nbsp;并检验生成的镜像是否超过预设值<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(RECOVERY_RESOURCE_ZIP)">Target:&nbsp;&nbsp;$(RECOVERY_RESOURCE_ZIP)</a></h3>
<p>
将recoery/root/res下的文件打包生成&nbsp;&nbsp;&nbsp;out/target/product/i9100/system/etc/recovery-resource.dat<br/>
</p>
</div>
<div class="build_target">
<h3><a id="recoveryimage">Target:&nbsp;&nbsp;recoveryimage</a></h3>
<p>
生成recovery镜像&nbsp;recovery.img<br/>
</p>
</div>
<div class="variable">
<h3><a id="INSTALLED_RECOVERYZIP_TARGET">INSTALLED_RECOVERYZIP_TARGET</a></h3>
<p>
INSTALLED_RECOVERYZIP_TARGET&nbsp;:=&nbsp;$(PRODUCT_OUT)/utilities/update.zip<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;out/target/product/i9100/utilities/update.zip<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INSTALLED_RECOVERYZIP_TARGET)">Target:&nbsp;&nbsp;$(INSTALLED_RECOVERYZIP_TARGET)</a></h3>
<p>
生成用于更新recovery的ota包<br/>
</p>
</div>
<div class="build_target">
<h3><a id="recoveryzip">Target:&nbsp;&nbsp;recoveryzip</a></h3>
<p>
伪目标&nbsp;依赖&nbsp;$(INSTALLED_RECOVERYZIP_TARGET)<br/>
生成用于更新recovery的ota包<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_NAND_PAGE_SIZE">BOARD_NAND_PAGE_SIZE</a></h3>
<p>
在BoardConfig.mk里设置BOARD_NAND_PAGE_SIZE&nbsp;nand的page&nbsp;size<br/>
yaffs文件系统有该选项<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOARD_NAND_SPARE_SIZE">BOARD_NAND_SPARE_SIZE</a></h3>
<p>
在BoardConfig.mk里设置BOARD_NAND_PAGE_SIZE&nbsp;nand的spare&nbsp;size<br/>
yaffs文件系统有该选项<br/>
</p>
</div>
<div class="variable">
<h3><a id="mkyaffs2_extra_flags">mkyaffs2_extra_flags</a></h3>
<p>
编译yaffs文件系统的选项<br/>
mkyaffs2_extra_flags&nbsp;:=&nbsp;-c&nbsp;$(BOARD_NAND_PAGE_SIZE)&nbsp;<br/>
mkyaffs2_extra_flags&nbsp;+=&nbsp;-s&nbsp;$(BOARD_NAND_SPARE_SIZE)<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
