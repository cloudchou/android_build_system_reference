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
<h3>build/core/main.mk</h3>
<p>
检查编译环境是否符合要求<br/>
并定义了许多目标供开发者调用，比如droid，sdk等目标，但是生成这些目标的规则不在该文件定义<br/>
规则主要在Makefile里定义<br/>
</p>
</div>
<div class="variable">
<h3><a id="SHELL">SHELL</a></h3>
<p>
编译使用的Shell，&nbsp;编译Android时经常需要使用shell命令，故此定义该变量<br/>
shell需要用bash，不支持其它类型shell，可通过ANDROID_BUILD_SHELL环境变量定义bash所在位置<br/>
</p>
</div>
<div class="variable">
<h3><a id="PWD">PWD</a></h3>
<p>
当前目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="TOP">TOP</a></h3>
<p>
TOP&nbsp;:=&nbsp;.<br/>
根目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="TOPDIR">TOPDIR</a></h3>
<p>
TOPDIR&nbsp;:=&nbsp;<br/>
根目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_SYSTEM">BUILD_SYSTEM</a></h3>
<p>
BUILD_SYSTEM&nbsp;:=&nbsp;$(TOPDIR)build/core<br/>
编译系统核心所在目录<br/>
</p>
</div>
<div class="build_target">
<h3><a id="droid">Target:&nbsp;&nbsp;droid</a></h3>
<p>
默认目标，将会生成ota包<br/>
使用方法：编译时使用mka&nbsp;droid或者直接mka都可以<br/>
droid目标依赖于droidcore&nbsp;dist_files<br/>
</p>
</div>
<div class="build_target">
<h3><a id="[FORCE]">Target:&nbsp;&nbsp;[FORCE]</a></h3>
<p>
Used&nbsp;to&nbsp;force&nbsp;goals&nbsp;to&nbsp;build.&nbsp;&nbsp;Only&nbsp;use&nbsp;for&nbsp;conditionally&nbsp;defined&nbsp;goals.<br/>
强制编译某个目标，<br/>
</p>
</div>
<div class="variable">
<h3><a id="BUILD_EMULATOR">BUILD_EMULATOR</a></h3>
<p>
是否可以编译一个模拟器镜像<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_MODIFIER_TARGETS">INTERNAL_MODIFIER_TARGETS</a></h3>
<p>
用于修饰编译目标的目标，如果编译目标只有这些修饰用的目标，那么会使用默认目标<br/>
INTERNAL_MODIFIER_TARGETS&nbsp;:=&nbsp;showcommands&nbsp;checkbuild&nbsp;all&nbsp;incrementaljavac<br/>
</p>
</div>
<div class="build_target">
<h3><a id="showcommands">Target:&nbsp;&nbsp;showcommands</a></h3>
<p>
不是真正的编译目标&nbsp;&nbsp;&nbsp;&nbsp;showcommands&nbsp;用于编译时&nbsp;显示&nbsp;正在执行的命令<br/>
</p>
</div>
<div class="build_target">
<h3><a id="incrementaljavac">Target:&nbsp;&nbsp;incrementaljavac</a></h3>
<p>
用于增量编译java代码，<br/>
</p>
</div>
<div class="build_target">
<h3><a id="all">Target:&nbsp;&nbsp;all</a></h3>
<p>
如果使用all修饰编译目标，会编译所有模块<br/>
</p>
</div>
<div class="build_target">
<h3><a id="checkbuild">Target:&nbsp;&nbsp;checkbuild</a></h3>
<p>
用于检验那些需要检验的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="ENABLE_INCREMENTALJAVAC">ENABLE_INCREMENTALJAVAC</a></h3>
<p>
默认最好别启用，否则java源代码改变后不会引起依赖它的java代码的重编译<br/>
你只能通过添加incrementaljavac目标来使用增量编译&nbsp;<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BUILD_VARIANT">TARGET_BUILD_VARIANT</a></h3>
<p>
编译的变生成目标类型，只有3种，user&nbsp;userdebug&nbsp;eng<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_BUILD_JAVA_SUPPORT_LEVEL">TARGET_BUILD_JAVA_SUPPORT_LEVEL</a></h3>
<p>
Variable&nbsp;to&nbsp;check&nbsp;java&nbsp;support&nbsp;level&nbsp;inside&nbsp;PDK&nbsp;build<br/>
Not&nbsp;necessary&nbsp;if&nbsp;the&nbsp;components&nbsp;is&nbsp;not&nbsp;in&nbsp;PDK<br/>
not&nbsp;defined&nbsp;:&nbsp;not&nbsp;supported<br/>
"sdk"&nbsp;:&nbsp;sdk&nbsp;API&nbsp;only<br/>
&nbsp;&nbsp;&nbsp;"platform"&nbsp;:&nbsp;platform&nbsp;API&nbsp;supproted<br/>
</p>
</div>
<div class="variable">
<h3><a id="is_sdk_build">is_sdk_build</a></h3>
<p>
是否生成sdk，如果目标里含有sdk，win_sdk，sdk_addon，就会生成sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="HAVE_SELINUX">HAVE_SELINUX</a></h3>
<p>
是否启用selinux<br/>
如果启用了selinux,那么编译属性会添加<br/>
ADDITIONAL_BUILD_PROPERTIES&nbsp;+=&nbsp;ro.build.selinux=1<br/>
</p>
</div>
<div class="variable">
<h3><a id="user_variant">user_variant</a></h3>
<p>
是否是user模式，如果编译目标类型为user或者userdebug，那么user_variant为true<br/>
当使用user模式时，会产生一些特殊的编译属性<br/>
ADDITIONAL_DEFAULT_PROPERTIES&nbsp;+=&nbsp;ro.secure=1<br/>
</p>
</div>
<div class="variable">
<h3><a id="tags_to_install">tags_to_install</a></h3>
<p>
将安装在手机的tag集合，用户在定义模块类型时会使用LOCAL_MODULE_TAGS定义模块的tag<br/>
模块的tag为一个集合，可使用debug&nbsp;eng&nbsp;tests&nbsp;optional&nbsp;samples&nbsp;shell_ash&nbsp;shell_mksh<br/>
如果编译目标类型为userdebug,&nbsp;那么&nbsp;tags_to_install&nbsp;+=&nbsp;debug<br/>
&nbsp;ADDITIONAL_BUILD_PROPERTIES&nbsp;+=&nbsp;dalvik.vm.lockprof.threshold=500<br/>
&nbsp;enable_target_debugging为true<br/>
</p>
</div>
<div class="variable">
<h3><a id="DISABLE_DEXPREOPT">DISABLE_DEXPREOPT</a></h3>
<p>
禁止dex代码优化<br/>
</p>
</div>
<div class="variable">
<h3><a id="WITH_DEXPREOPT">WITH_DEXPREOPT</a></h3>
<p>
是否启用dex代码优化，优化后，一个apk应用会分成两部分<br/>
存放资源文件的apk，代码存放在odex文件<br/>
如果没有定义DISABLE_DEXPREOPT为true<br/>
并且编译目标类型为user，<br/>
并且编译的主机操作系统是linux,那么WITH_DEXPREOPT为true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDITIONAL_DEFAULT_PROPERTIES">ADDITIONAL_DEFAULT_PROPERTIES</a></h3>
<p>
生成的default.prop里使用的属性，<br/>
default.prop使用的属性集合有两个来源，<br/>
一部分是ADDITIONAL_BUILD_PROPERTIESp，<br/>
另一部分便是ADDITIONAL_DEFAULT_PROPERTIES<br/>
</p>
</div>
<div class="variable">
<h3><a id="enable_target_debugging">enable_target_debugging</a></h3>
<p>
允许调试目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="INCLUDE_TEST_OTA_KEYS">INCLUDE_TEST_OTA_KEYS</a></h3>
<p>
是否包含ota用的key，如果启用了enable_target_debugging，则包含ota用的key<br/>
</p>
</div>
<div class="build_target">
<h3><a id="sdk_repo">Target:&nbsp;&nbsp;sdk_repo</a></h3>
<p>
是否生成sdk的repo仓库<br/>
</p>
</div>
<div class="function">
<h3><a id="should-install-to-system">Function:&nbsp;&nbsp;should-install-to-system</a></h3>
<p>
判断tag列表所指的模块是否要安装到/system<br/>
大多数目标，只要没有被打上tests的tag，都会被安装在/system<br/>
如果编译sdk，那么只要那个模块打了samples的tag，那么该模块就会被安装在/data目录<br/>
即使那个目标还被打上了eng，debug或者user的Tag<br/>
$1:&nbsp;tag集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="dont_bother">dont_bother</a></h3>
<p>
当MAKECMDGOALS为clean，clobber，dataclean或者installclean时，dont_bother将为true，<br/>
那么不会包含整个文件夹树，即不会包含除编译系统build/下的makefile文件，<br/>
</p>
</div>
<div class="variable">
<h3><a id="SDK_ONLY">SDK_ONLY</a></h3>
<p>
表示当前系统只能编译sdk<br/>
</p>
</div>
<div class="variable">
<h3><a id="subdirs">subdirs</a></h3>
<p>
表示需要包含其中的makefile的文件夹的集合<br/>
根据编译类型不一样subdirs的值也不一样<br/>
如果编译sdk，那么subdirs将会在sdk/build/sdk_only_whitelist.mk和development/build/sdk_only_whitelist.mk里添加<br/>
并且如果主机是linux的话，还会：<br/>
subdirs&nbsp;+=&nbsp;build/tools/acp<br/>
编译其它类型时，还会不一样，如果设置BUILD_TINY_ANDROID为true的话，包含的子文件夹会比较少<br/>
一共分成3种情况，1)sdk，2)BUILD_TINY_ANDROID&nbsp;3)FULL_BUILD<br/>
</p>
</div>
<div class="variable">
<h3><a id="FULL_BUILD">FULL_BUILD</a></h3>
<p>
除了生成sdk，tiny&nbsp;android之外，就是full&nbsp;build了，那么会包含能找到的所有makefile<br/>
</p>
</div>
<div class="variable">
<h3><a id="stash_product_vars">stash_product_vars</a></h3>
<p>
在包含模块的makefile之前，暂存PRODUCT_*变量，<br/>
等将所有模块包含后，我们将校验这些产品相关变量是否更改<br/>
stash_product_vars:=true<br/>
</p>
</div>
<div class="variable">
<h3><a id="ONE_SHOT_MAKEFILE">ONE_SHOT_MAKEFILE</a></h3>
<p>
如果使用mm命令编译，那么将只包含ONE_SHOT_MAKEFILE所指的makefile<br/>
</p>
</div>
<div class="variable">
<h3><a id="CUSTOM_MODULES">CUSTOM_MODULES</a></h3>
<p>
如果使用mm命令编译,将CUSTOM_MODULES改为只include被$(ONE_SHOT_MAKEFILE)模块<br/>
作为副作用，将使得所有这些模块都会被安装<br/>
</p>
</div>
<div class="variable">
<h3><a id="subdir_makefiles">subdir_makefiles</a></h3>
<p>
所有要包含的子目录下的Android.mk文件&nbsp;<br/>
</p>
</div>
<div class="function">
<h3><a id="add-required-deps">Function:&nbsp;&nbsp;add-required-deps</a></h3>
<p>
定义模块之间的依赖<br/>
$1：依赖其它模块的模块<br/>
$2:&nbsp;被依赖的模块<br/>
</p>
</div>
<div class="function">
<h3><a id="product_MODULES">Function:&nbsp;&nbsp;product_MODULES</a></h3>
<p>
产品需要的模块，在产品makefile文件里定义，在product_config.mk包含后定义<br/>
并且会被过滤掉那些覆盖的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="product_FILES">product_FILES</a></h3>
<p>
将被安装的生成的文件<br/>
</p>
</div>
<div class="variable">
<h3><a id="debug_MODULES">debug_MODULES</a></h3>
<p>
tag为debug的模块和&nbsp;产品定义中&nbsp;tag为debug的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="eng_MODULES">eng_MODULES</a></h3>
<p>
tag为eng的模块&nbsp;和&nbsp;产品定义中&nbsp;tag为eng的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="tests_MODULES">tests_MODULES</a></h3>
<p>
tag为test的模块&nbsp;和&nbsp;产品定义中&nbsp;tag为test的模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="modules_to_install">modules_to_install</a></h3>
<p>
需要被安装的模块集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="LOCAL_OVERRIDES_PACKAGES">LOCAL_OVERRIDES_PACKAGES</a></h3>
<p>
需要被覆盖的包的集合，通常在产品device目录配置<br/>
</p>
</div>
<div class="variable">
<h3><a id="overridden_packages">overridden_packages</a></h3>
<p>
需要被覆盖的包的集合<br/>
</p>
</div>
<div class="variable">
<h3><a id="target_gnu_MODULES">target_gnu_MODULES</a></h3>
<p>
编译SDK目标时不需要gnug模块<br/>
</p>
</div>
<div class="variable">
<h3><a id="modules_to_check">modules_to_check</a></h3>
<p>
需要检验的模块<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在base_rules.mk里定义需要检验的模块<br/>
</p>
</div>
<div class="build_target">
<h3><a id="prebuilt">Target:&nbsp;&nbsp;prebuilt</a></h3>
<p>
使用mka&nbsp;prebuilt可编译需要预编译的所有目标<br/>
</p>
</div>
<div class="build_target">
<h3><a id="all_copied_headers">Target:&nbsp;&nbsp;all_copied_headers</a></h3>
<p>
一个内部目标，依赖于其它所有需要拷贝的头文件集合<br/>
其它需要被头文件的目标集合可以设置为依赖于该目标<br/>
</p>
</div>
<div class="build_target">
<h3><a id="ALL_C_CPP_ETC_OBJECTS">Target:&nbsp;&nbsp;ALL_C_CPP_ETC_OBJECTS</a></h3>
<p>
编译c或者c++代码需要的配置对象<br/>
它们需要依赖于所有头文件<br/>
$(ALL_C_CPP_ETC_OBJECTS):&nbsp;|&nbsp;all_copied_headers<br/>
</p>
</div>
<div class="build_target">
<h3><a id="files">Target:&nbsp;&nbsp;files</a></h3>
<p>
将编译prebuilt，要安装的模块集合，以及INSTALLED_ANDROID_INFO_TXT_TARGET<br/>
</p>
</div>
<div class="build_target">
<h3><a id="ramdisk">Target:&nbsp;&nbsp;ramdisk</a></h3>
<p>
生成ramdisk.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="factory_ramdisk">Target:&nbsp;&nbsp;factory_ramdisk</a></h3>
<p>
生成factory_ramdisk.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="factory_bundle">Target:&nbsp;&nbsp;factory_bundle</a></h3>
<p>
生成pyramid-factory_bundle-eng.tgz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="systemtarball">Target:&nbsp;&nbsp;systemtarball</a></h3>
<p>
生成system.tar.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="boottarball">Target:&nbsp;&nbsp;boottarball</a></h3>
<p>
生成boot.tar.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="userdataimage">Target:&nbsp;&nbsp;userdataimage</a></h3>
<p>
生成userdata.img&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="userdatatarball">Target:&nbsp;&nbsp;userdatatarball</a></h3>
<p>
生成userdata.tar.gz<br/>
</p>
</div>
<div class="build_target">
<h3><a id="cacheimage">Target:&nbsp;&nbsp;cacheimage</a></h3>
<p>
生成cache.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="bootimage">Target:&nbsp;&nbsp;bootimage</a></h3>
<p>
生成boot.img<br/>
</p>
</div>
<div class="build_target">
<h3><a id="droidcore">Target:&nbsp;&nbsp;droidcore</a></h3>
<p>
生成Rom，定义了Rom和其需要的所有文件的依赖关系<br/>
</p>
</div>
<div class="build_target">
<h3><a id="dist_files">Target:&nbsp;&nbsp;dist_files</a></h3>
<p>
只是在全编译时把库放到dist目录<br/>
</p>
</div>
<div class="variable">
<h3><a id="unbundled_build_modules">unbundled_build_modules</a></h3>
<p>
当只编译app时，将unbundled_build_modules设置为需要编译的app集合<br/>
</p>
</div>
<div class="build_target">
<h3><a id="apps_only">Target:&nbsp;&nbsp;apps_only</a></h3>
<p>
只生成app<br/>
</p>
</div>
<div class="build_target">
<h3><a id="all_modules">Target:&nbsp;&nbsp;all_modules</a></h3>
<p>
生成所有模块<br/>
</p>
</div>
<div class="build_target">
<h3><a id="docs">Target:&nbsp;&nbsp;docs</a></h3>
<p>
生成所有文档<br/>
</p>
</div>
<div class="build_target">
<h3><a id="sdk">Target:&nbsp;&nbsp;sdk</a></h3>
<p>
生成sdk<br/>
</p>
</div>
<div class="build_target">
<h3><a id="lintall">Target:&nbsp;&nbsp;lintall</a></h3>
<p>
使用lint检验代码<br/>
</p>
</div>
<div class="build_target">
<h3><a id="samplecode">Target:&nbsp;&nbsp;samplecode</a></h3>
<p>
生成sample程序<br/>
</p>
</div>
<div class="build_target">
<h3><a id="findbugs">Target:&nbsp;&nbsp;findbugs</a></h3>
<p>
依赖于&nbsp;&nbsp;&nbsp;$(INTERNAL_FINDBUGS_HTML_TARGET)&nbsp;$(INTERNAL_FINDBUGS_XML_TARGET)<br/>
生成找bug的html文档和xml文档<br/>
即：<br/>
&nbsp;findbugs.xml和findbugs.html<br/>
</p>
</div>
<div class="build_target">
<h3><a id="clean">Target:&nbsp;&nbsp;clean</a></h3>
<p>
删掉整个out目录<br/>
</p>
</div>
<div class="build_target">
<h3><a id="clobber">Target:&nbsp;&nbsp;clobber</a></h3>
<p>
删掉整个out目录和clean一样<br/>
</p>
</div>
<div class="build_target">
<h3><a id="modules">Target:&nbsp;&nbsp;modules</a></h3>
<p>
查看所有模块<br/>
</p>
</div>
<div class="build_target">
<h3><a id="nothing">Target:&nbsp;&nbsp;nothing</a></h3>
<p>
检验读取所有makefile时是否正常<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
