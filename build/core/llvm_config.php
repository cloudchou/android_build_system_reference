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
<h3>build/core/llvm_config.mk</h3>
<p>
定义了CLANG相关变量，<br/>
Clang&nbsp;是&nbsp;LLVM&nbsp;的一个编译器前端，它目前支持&nbsp;C,&nbsp;C++,&nbsp;Objective-C&nbsp;以及&nbsp;Objective-C++&nbsp;等编程语言。<br/>
Clang&nbsp;对源程序进行词法分析和语义分析，并将分析结果转换为&nbsp;Abstract&nbsp;Syntax&nbsp;Tree&nbsp;(&nbsp;抽象语法树&nbsp;)&nbsp;，最后使用&nbsp;LLVM&nbsp;作为后端代码的生成器<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG">CLANG</a></h3>
<p>
CLANG&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CXX">CLANG_CXX</a></h3>
<p>
CLANG_CXX&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/clang++$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LLVM_AS">LLVM_AS</a></h3>
<p>
LLVM_AS&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-as$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="variable">
<h3><a id="LLVM_LINK">LLVM_LINK</a></h3>
<p>
LLVM_LINK&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/llvm-link$(HOST_EXECUTABLE_SUFFIX)<br/>
</p>
</div>
<div class="function">
<h3><a id="do-clang-flags-subst">Function:&nbsp;&nbsp;do-clang-flags-subst</a></h3>
<p>
define&nbsp;do-clang-flags-subst<br/>
&nbsp;&nbsp;TARGET_GLOBAL_CLANG_FLAGS&nbsp;:=&nbsp;$(subst&nbsp;$(1),$(2),$(TARGET_GLOBAL_CLANG_FLAGS))<br/>
&nbsp;&nbsp;HOST_GLOBAL_CLANG_FLAGS&nbsp;:=&nbsp;$(subst&nbsp;$(1),$(2),$(HOST_GLOBAL_CLANG_FLAGS))<br/>
endef<br/>
</p>
</div>
<div class="variable">
<h3><a id="clang-flags-subst">clang-flags-subst</a></h3>
<p>
define&nbsp;clang-flags-subst<br/>
&nbsp;&nbsp;$(eval&nbsp;$(call&nbsp;do-clang-flags-subst,$(1),$(2)))<br/>
endef<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_EXTRA_CFLAGS">CLANG_CONFIG_EXTRA_CFLAGS</a></h3>
<p>
CLANG_CONFIG_EXTRA_CFLAGS&nbsp;:=&nbsp;\<br/>
-D__compiler_offsetof=__builtin_offsetof&nbsp;\<br/>
-Dnan=__builtin_nan&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_UNKNOWN_CFLAGS">CLANG_CONFIG_UNKNOWN_CFLAGS</a></h3>
<p>
CLANG_CONFIG_UNKNOWN_CFLAGS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;-funswitch-loops<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_EXTRA_CFLAGS">CLANG_CONFIG_EXTRA_CFLAGS</a></h3>
<p>
CLANG_CONFIG_EXTRA_CFLAGS&nbsp;+=&nbsp;\<br/>
-target&nbsp;arm-linux-androideabi&nbsp;\<br/>
-nostdlibinc&nbsp;\<br/>
-B$(TARGET_TOOLCHAIN_ROOT)/arm-linux-androideabi/bin&nbsp;\<br/>
-mllvm&nbsp;-arm-enable-ehabi<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_EXTRA_LDFLAGS">CLANG_CONFIG_EXTRA_LDFLAGS</a></h3>
<p>
CLANG_CONFIG_EXTRA_LDFLAGS&nbsp;+=&nbsp;\<br/>
-target&nbsp;arm-linux-androideabi&nbsp;\<br/>
-B$(TARGET_TOOLCHAIN_ROOT)/arm-linux-androideabi/bin<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_UNKNOWN_CFLAGS">CLANG_CONFIG_UNKNOWN_CFLAGS</a></h3>
<p>
CLANG_CONFIG_UNKNOWN_CFLAGS&nbsp;+=&nbsp;\<br/>
-mthumb-interwork&nbsp;\<br/>
-fgcse-after-reload&nbsp;\<br/>
-frerun-cse-after-loop&nbsp;\<br/>
-frename-registers&nbsp;\<br/>
-fno-builtin-sin&nbsp;\<br/>
-fno-strict-volatile-bitfields&nbsp;\<br/>
-fno-align-jumps&nbsp;\<br/>
-Wa,--noexecstack<br/>
</p>
</div>
<div class="variable">
<h3><a id="CLANG_CONFIG_EXTRA_TARGET_C_INCLUDES">CLANG_CONFIG_EXTRA_TARGET_C_INCLUDES</a></h3>
<p>
CLANG_CONFIG_EXTRA_TARGET_C_INCLUDES&nbsp;:=&nbsp;external/clang/lib/include&nbsp;$(TARGET_OUT_HEADERS)/clang<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_GLOBAL_CLANG_FLAGS">TARGET_GLOBAL_CLANG_FLAGS</a></h3>
<p>
TARGET_GLOBAL_CLANG_FLAGS&nbsp;+=&nbsp;$(filter-out&nbsp;$(CLANG_CONFIG_UNKNOWN_CFLAGS),$(TARGET_GLOBAL_CFLAGS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_GLOBAL_CLANG_FLAGS">HOST_GLOBAL_CLANG_FLAGS</a></h3>
<p>
HOST_GLOBAL_CLANG_FLAGS&nbsp;+=&nbsp;$(filter-out&nbsp;$(CLANG_CONFIG_UNKNOWN_CFLAGS),$(HOST_GLOBAL_CFLAGS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_arm_CLANG_CFLAGS">TARGET_arm_CLANG_CFLAGS</a></h3>
<p>
TARGET_arm_CLANG_CFLAGS&nbsp;+=&nbsp;$(filter-out&nbsp;$(CLANG_CONFIG_UNKNOWN_CFLAGS),$(TARGET_arm_CFLAGS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_thumb_CLANG_CFLAGS">TARGET_thumb_CLANG_CFLAGS</a></h3>
<p>
TARGET_thumb_CLANG_CFLAGS&nbsp;+=&nbsp;$(filter-out&nbsp;$(CLANG_CONFIG_UNKNOWN_CFLAGS),$(TARGET_thumb_CFLAGS))<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDRESS_SANITIZER_CONFIG_EXTRA_CFLAGS">ADDRESS_SANITIZER_CONFIG_EXTRA_CFLAGS</a></h3>
<p>
</p>
</div>
<div class="variable">
<h3><a id="ADDRESS_SANITIZER_CONFIG_EXTRA_LDFLAGS">ADDRESS_SANITIZER_CONFIG_EXTRA_LDFLAGS</a></h3>
<p>
ADDRESS_SANITIZER_CONFIG_EXTRA_CFLAGS&nbsp;:=&nbsp;-faddress-sanitizer<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDRESS_SANITIZER_CONFIG_EXTRA_SHARED_LIBRARIES">ADDRESS_SANITIZER_CONFIG_EXTRA_SHARED_LIBRARIES</a></h3>
<p>
ADDRESS_SANITIZER_CONFIG_EXTRA_LDFLAGS&nbsp;:=&nbsp;-Wl,-u,__asan_preinit<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDRESS_SANITIZER_CONFIG_EXTRA_STATIC_LIBRARIES">ADDRESS_SANITIZER_CONFIG_EXTRA_STATIC_LIBRARIES</a></h3>
<p>
ADDRESS_SANITIZER_CONFIG_EXTRA_SHARED_LIBRARIES&nbsp;:=&nbsp;libdl&nbsp;libasan_preload<br/>
</p>
</div>
<div class="variable">
<h3><a id="ADDRESS_SANITIZER_CONFIG_EXTRA_STATIC_LIBRARIES">ADDRESS_SANITIZER_CONFIG_EXTRA_STATIC_LIBRARIES</a></h3>
<p>
ADDRESS_SANITIZER_CONFIG_EXTRA_STATIC_LIBRARIES&nbsp;:=&nbsp;libasan<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMPILER_RT_CONFIG_EXTRA_STATIC_LIBRARIES">COMPILER_RT_CONFIG_EXTRA_STATIC_LIBRARIES</a></h3>
<p>
COMPILER_RT_CONFIG_EXTRA_STATIC_LIBRARIES&nbsp;:=&nbsp;libcompiler-rt-extras<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
