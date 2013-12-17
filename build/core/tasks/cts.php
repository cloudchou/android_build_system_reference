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
<h3>build/core/tasks/cts.mk</h3>
<p>
生成cts，&nbsp;cts&nbsp;是&nbsp;compatibility&nbsp;test&nbsp;suite<br/>
</p>
</div>
<div class="variable">
<h3><a id="cts_dir">cts_dir</a></h3>
<p>
cts_dir&nbsp;:=&nbsp;$(HOST_OUT)/cts<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;oust/host/linux-x86/cts<br/>
</p>
</div>
<div class="variable">
<h3><a id="cts_tools_src_dir">cts_tools_src_dir</a></h3>
<p>
cts_tools_src_dir&nbsp;:=&nbsp;cts/tools<br/>
</p>
</div>
<div class="variable">
<h3><a id="cts_name">cts_name</a></h3>
<p>
cts_name&nbsp;:=&nbsp;android-cts<br/>
</p>
</div>
<div class="variable">
<h3><a id="DDMLIB_JAR">DDMLIB_JAR</a></h3>
<p>
DDMLIB_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/ddmlib-prebuilt.jar<br/>
示例:<br/>
&nbsp;out/host/linux-x86/framework/ddmlib-prebuilt.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="junit_host_jar">junit_host_jar</a></h3>
<p>
junit_host_jar&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/junit.jar<br/>
示例:<br/>
out/host/linux-x86/framework/junit.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOSTTESTLIB_JAR">HOSTTESTLIB_JAR</a></h3>
<p>
HOSTTESTLIB_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/hosttestlib.jar<br/>
示例:<br/>
&nbsp;out/host/linux-x86/framework/hosttestlib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="TF_JAR">TF_JAR</a></h3>
<p>
TF_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/tradefed-prebuilt.jar<br/>
示例:<br/>
out/host/linux-x86/framework/tradefed-prebuilt.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="CTS_TF_JAR">CTS_TF_JAR</a></h3>
<p>
CTS_TF_JAR&nbsp;:=&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/cts-tradefed.jar<br/>
示例:<br/>
out/host/linux-x86/framework/cts-tradefed.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="CTS_TF_EXEC_PATH">CTS_TF_EXEC_PATH</a></h3>
<p>
CTS_TF_EXEC_PATH&nbsp;:=&nbsp;$(HOST_OUT_EXECUTABLES)/cts-tradefed<br/>
示例:<br/>
out/host/linux-x86/bin/cts-tradefed<br/>
</p>
</div>
<div class="variable">
<h3><a id="CTS_TF_README_PATH">CTS_TF_README_PATH</a></h3>
<p>
CTS_TF_README_PATH&nbsp;:=&nbsp;$(cts_tools_src_dir)/tradefed-host/README<br/>
示例:<br/>
cts/tools/tradefed-host/README<br/>
</p>
</div>
<div class="variable">
<h3><a id="VMTESTSTF_INTERMEDIATES">VMTESTSTF_INTERMEDIATES</a></h3>
<p>
VMTESTSTF_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,vm-tests-tf,HOST)<br/>
示例:<br/>
out/host/linux-x86/framework/hosttestlib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="VMTESTSTF_JAR">VMTESTSTF_JAR</a></h3>
<p>
VMTESTSTF_JAR&nbsp;:=&nbsp;$(VMTESTSTF_INTERMEDIATES)/android.core.vm-tests-tf.jar<br/>
示例:<br/>
out/host/linux-x86/framework/hosttestlib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="CORE_INTERMEDIATES">CORE_INTERMEDIATES</a></h3>
<p>
CORE_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,core,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/core_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="BOUNCYCASTLE_INTERMEDIATES">BOUNCYCASTLE_INTERMEDIATES</a></h3>
<p>
BOUNCYCASTLE_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,bouncycastle,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/bouncycastle_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="APACHEXML_INTERMEDIATES">APACHEXML_INTERMEDIATES</a></h3>
<p>
APACHEXML_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,apache-xml,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/apache-xml_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="SQLITEJDBC_INTERMEDIATES">SQLITEJDBC_INTERMEDIATES</a></h3>
<p>
SQLITEJDBC_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,sqlite-jdbc,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/sqlite-jdbc_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="JUNIT_INTERMEDIATES">JUNIT_INTERMEDIATES</a></h3>
<p>
JUNIT_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,core-junit,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/core-junit_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="CORETESTS_INTERMEDIATES">CORETESTS_INTERMEDIATES</a></h3>
<p>
CORETESTS_INTERMEDIATES&nbsp;:=&nbsp;$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,core-tests,,COMMON)<br/>
示例:<br/>
out/host/common/obj/JAVA_LIBRARIES/core-tests_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="GEN_CLASSPATH">GEN_CLASSPATH</a></h3>
<p>
GEN_CLASSPATH&nbsp;:=&nbsp;$(CORE_INTERMEDIATES)/classes.jar:$(BOUNCYCASTLE_INTERMEDIATES)/classes.jar:$(APACHEXML_INTERMEDIATES)/classes.jar:$(JUNIT_INTERMEDIATES)/classes.jar:$(SQLITEJDBC_INTERMEDIATES)/javalib.jar:$(CORETESTS_INTERMEDIATES)/javalib.jar<br/>
</p>
</div>
<div class="variable">
<h3><a id="CTS_CORE_XMLS">CTS_CORE_XMLS</a></h3>
<p>
CTS_CORE_XMLS&nbsp;:=&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.dalvik.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.com.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.sun.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.tests.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.org.xml&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;$(CTS_TESTCASES_OUT)/android.core.tests.libcore.package.libcore.xml&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(CTS_CORE_XMLS)">Target:&nbsp;&nbsp;$(CTS_CORE_XMLS)</a></h3>
<p>
Why&nbsp;does&nbsp;this&nbsp;depend&nbsp;on&nbsp;javalib.jar&nbsp;instead&nbsp;of&nbsp;classes.jar?&nbsp;&nbsp;Because<br/>
&nbsp;even&nbsp;though&nbsp;the&nbsp;tool&nbsp;will&nbsp;operate&nbsp;on&nbsp;the&nbsp;classes.jar&nbsp;files,&nbsp;the<br/>
&nbsp;build&nbsp;system&nbsp;requires&nbsp;that&nbsp;dependencies&nbsp;use&nbsp;javalib.jar.&nbsp;&nbsp;If<br/>
javalib.jar&nbsp;is&nbsp;up-to-date,&nbsp;then&nbsp;classes.jar&nbsp;is&nbsp;as&nbsp;well.&nbsp;&nbsp;Depending<br/>
on&nbsp;classes.jar&nbsp;will&nbsp;build&nbsp;the&nbsp;files&nbsp;incorrectly.<br/>
依赖：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(CTS_CORE_CASES)&nbsp;$(HOST_OUT_JAVA_LIBRARIES)/descGen.jar&nbsp;$(CORE_INTERMEDIATES)/javalib.jar&nbsp;$(BOUNCYCASTLE_INTERMEDIATES)/javalib.jar&nbsp;$(APACHEXML_INTERMEDIATES)/javalib.jar&nbsp;$(SQLITEJDBC_INTERMEDIATES)/javalib.jar&nbsp;$(JUNIT_INTERMEDIATES)/javalib.jar&nbsp;$(CORETESTS_INTERMEDIATES)/javalib.jar&nbsp;|&nbsp;$(ACP)<br/>
规则：<br/>
&nbsp;调用generate-core-test-description生成所有目标<br/>
</p>
</div>
<div class="variable">
<h3><a id="CORE_VM_TEST_TF_DESC">CORE_VM_TEST_TF_DESC</a></h3>
<p>
CORE_VM_TEST_TF_DESC&nbsp;:=&nbsp;$(CTS_TESTCASES_OUT)/android.core.vm-tests-tf.xml<br/>
</p>
</div>
<div class="variable">
<h3><a id="CORE_INTERMEDIATES">CORE_INTERMEDIATES</a></h3>
<p>
CORE_INTERMEDIATES&nbsp;:=$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,core,,COMMON)&nbsp;&nbsp;&nbsp;<br/>
示例：<br/>
&nbsp;&nbsp;out/host/common/obj/JAVA_LIBRARIES/core_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="JUNIT_INTERMEDIATES">JUNIT_INTERMEDIATES</a></h3>
<p>
JUNIT_INTERMEDIATES&nbsp;:=$(call&nbsp;intermediates-dir-for,JAVA_LIBRARIES,core-junit,,COMMON)<br/>
示例：<br/>
&nbsp;&nbsp;out/host/common/obj/JAVA_LIBRARIES/core-junit_intermediates<br/>
</p>
</div>
<div class="variable">
<h3><a id="GEN_CLASSPATH">GEN_CLASSPATH</a></h3>
<p>
GEN_CLASSPATH&nbsp;:=&nbsp;$(CORE_INTERMEDIATES)/classes.jar:$(JUNIT_INTERMEDIATES)/classes.jar:$(VMTESTSTF_JAR):$(DDMLIB_JAR):$(TF_JAR)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(CORE_VM_TEST_TF_DESC)">Target:&nbsp;&nbsp;$(CORE_VM_TEST_TF_DESC)</a></h3>
<p>
调用generate-core-test-description&nbsp;生成<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_CTS_TARGET">INTERNAL_CTS_TARGET</a></h3>
<p>
INTERNAL_CTS_TARGET&nbsp;:=&nbsp;$(cts_dir)/$(cts_name).zip<br/>
示例：<br/>
&nbsp;&nbsp;&nbsp;oust/host/linux-x86/cts/android-cts.zip<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(INTERNAL_CTS_TARGET)">Target:&nbsp;&nbsp;$(INTERNAL_CTS_TARGET)</a></h3>
<p>
打包$(cts_dir)的文件得到<br/>
</p>
</div>
<div class="build_target">
<h3><a id="cts">Target:&nbsp;&nbsp;cts</a></h3>
<p>
生成compalability&nbsp;test&nbsp;suites，<br/>
依赖&nbsp;<br/>
&nbsp;&nbsp;&nbsp;$(INTERNAL_CTS_TARGET)&nbsp;adb<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-testcase-apk">Function:&nbsp;&nbsp;copy-testcase-apk</a></h3>
<p>
拷贝测试用例apk<br/>
</p>
</div>
<div class="function">
<h3><a id="copy-testcase">Function:&nbsp;&nbsp;copy-testcase</a></h3>
<p>
拷贝测试用例&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
