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
<h3>build/core/tasks/ide.mk</h3>
<p>
生成eclipse用的.classpath<br/>
</p>
</div>
<div class="function">
<h3><a id="filter-ide-goals">Function:&nbsp;&nbsp;filter-ide-goals</a></h3>
<p>
define&nbsp;filter-ide-goals<br/>
$(strip&nbsp;$(filter&nbsp;$(1)-%,$(MAKECMDGOALS)))<br/>
endef<br/>
</p>
</div>
<div class="function">
<h3><a id="filter-ide-modules">Function:&nbsp;&nbsp;filter-ide-modules</a></h3>
<p>
define&nbsp;filter-ide-modules<br/>
$(strip&nbsp;$(subst&nbsp;-,$(space),$(patsubst&nbsp;$(1)-%,%,$(2))))<br/>
endef<br/>
</p>
</div>
<div class="variable">
<h3><a id="eclipse_project_goals">eclipse_project_goals</a></h3>
<p>
eclipse_project_goals&nbsp;:=&nbsp;$(call&nbsp;filter-ide-goals,ECLIPSE)<br/>
</p>
</div>
<div class="variable">
<h3><a id="eclipse_project_modules">eclipse_project_modules</a></h3>
<p>
eclipse_project_modules&nbsp;:=&nbsp;$(filter-out&nbsp;lunch,$(eclipse_project_modules))<br/>
ifneq&nbsp;($(filter&nbsp;lunch,$(eclipse_project_modules)),)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;eclipse_project_modules&nbsp;:=&nbsp;$(sort&nbsp;$(eclipse_project_modules)&nbsp;$(java_modules))<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="installed_modules">installed_modules</a></h3>
<p>
installed_modules&nbsp;:=&nbsp;$(foreach&nbsp;m,$(ALL_DEFAULT_INSTALLED_MODULES),\<br/>
$(INSTALLABLE_FILES.$(m).MODULE))<br/>
</p>
</div>
<div class="variable">
<h3><a id="java_modules">java_modules</a></h3>
<p>
java_modules&nbsp;:=&nbsp;$(foreach&nbsp;m,$(installed_modules),\<br/>
$(if&nbsp;$(filter&nbsp;JAVA_LIBRARIES&nbsp;APPS,$(ALL_MODULES.$(m).CLASS)),$(m),))<br/>
</p>
</div>
<div class="variable">
<h3><a id="source_paths">source_paths</a></h3>
<p>
source_paths&nbsp;:=&nbsp;$(foreach&nbsp;m,$(eclipse_project_modules),$(ALL_MODULES.$(m).PATH))&nbsp;\<br/>
&nbsp;&nbsp;$(foreach&nbsp;m,$(eclipse_project_modules),$(ALL_MODULES.$(m).INTERMEDIATE_SOURCE_DIR))&nbsp;\<br/>
&nbsp;&nbsp;$(INTERNAL_SDK_SOURCE_DIRS)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;source_paths&nbsp;:=&nbsp;$(sort&nbsp;$(source_paths))<br/>
</p>
</div>
<div class="build_target">
<h3><a id=".classpath">Target:&nbsp;&nbsp;.classpath</a></h3>
<p>
生成eclipse用的classpath<br/>
</p>
</div>
<div class="build_target">
<h3><a id="ECLIPSE-lunch">Target:&nbsp;&nbsp;ECLIPSE-lunch</a></h3>
<p>
依赖.classpath目标<br/>
生成eclipse用的classpath&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
