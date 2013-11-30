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
<h3>build/core/combo/javac.mk</h3>
<p>
Selects&nbsp;a&nbsp;Java&nbsp;compiler.<br/>
Inputs:<br/>
CUSTOM_JAVA_COMPILER&nbsp;--&nbsp;"eclipse",&nbsp;"openjdk".&nbsp;or&nbsp;nothing&nbsp;for&nbsp;the&nbsp;system&nbsp;<br/>
default<br/>
Outputs:<br/>
COMMON_JAVAC&nbsp;--&nbsp;Java&nbsp;compiler&nbsp;command&nbsp;with&nbsp;common&nbsp;arguments<br/>
</p>
</div>
<div class="variable">
<h3><a id="COMMON_JAVAC">COMMON_JAVAC</a></h3>
<p>
ifeq&nbsp;($(BUILD_OS),&nbsp;windows)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;COMMON_JAVAC&nbsp;:=&nbsp;development/host/windows/prebuilt/javawrap.exe&nbsp;-J-Xmx256m&nbsp;\<br/>
&nbsp;&nbsp;-target&nbsp;1.5&nbsp;-source&nbsp;1.5&nbsp;-Xmaxerrs&nbsp;9999999<br/>
else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;COMMON_JAVAC&nbsp;:=&nbsp;javac&nbsp;-J-Xmx512M&nbsp;-target&nbsp;1.5&nbsp;-source&nbsp;1.5&nbsp;-Xmaxerrs&nbsp;9999999<br/>
endif<br/>
#&nbsp;Eclipse.<br/>
ifeq&nbsp;($(CUSTOM_JAVA_COMPILER),&nbsp;eclipse)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;COMMON_JAVAC&nbsp;:=&nbsp;java&nbsp;-Xmx256m&nbsp;-jar&nbsp;prebuilt/common/ecj/ecj.jar&nbsp;-5&nbsp;\<br/>
&nbsp;&nbsp;-maxProblems&nbsp;9999999&nbsp;-nowarn<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(info&nbsp;CUSTOM_JAVA_COMPILER=eclipse)<br/>
endif<br/>
#&nbsp;OpenJDK.<br/>
ifeq&nbsp;($(CUSTOM_JAVA_COMPILER),&nbsp;openjdk)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;We&nbsp;set&nbsp;the&nbsp;VM&nbsp;options&nbsp;(like&nbsp;-Xmx)&nbsp;in&nbsp;the&nbsp;javac&nbsp;script.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;COMMON_JAVAC&nbsp;:=&nbsp;prebuilt/common/openjdk/bin/javac&nbsp;-target&nbsp;1.5&nbsp;\<br/>
&nbsp;&nbsp;-source&nbsp;1.5&nbsp;-Xmaxerrs&nbsp;9999999<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(info&nbsp;CUSTOM_JAVA_COMPILER=openjdk)<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="HOST_JAVAC">HOST_JAVAC</a></h3>
<p>
HOST_JAVAC&nbsp;?=&nbsp;$(COMMON_JAVAC)<br/>
</p>
</div>
<div class="variable">
<h3><a id="TARGET_JAVAC">TARGET_JAVAC</a></h3>
<p>
TARGET_JAVAC&nbsp;?=&nbsp;$(COMMON_JAVAC)<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
