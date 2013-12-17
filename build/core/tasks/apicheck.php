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
<h3>build/core/tasks/apicheck.mk</h3>
<p>
定义了api&nbsp;check的规则，api　check&nbsp;用于确保你并没有破坏<br/>
api的兼容性&nbsp;或者&nbsp;增加&nbsp;非法的api<br/>
</p>
</div>
<div class="build_target">
<h3><a id="checkapi">Target:&nbsp;&nbsp;checkapi</a></h3>
<p>
确保你并没有破坏api的兼容性或者增加非法的api&nbsp;&nbsp;&nbsp;<br/>
默认目标droidcore依赖checkapi目标，因此会进行api的检查<br/>
</p>
</div>
<div class="variable">
<h3><a id="last_released_sdk_version">last_released_sdk_version</a></h3>
<p>
last_released_sdk_version&nbsp;:=&nbsp;$(lastword&nbsp;$(call&nbsp;numerically_sort,&nbsp;\<br/>
$(filter-out&nbsp;current,&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;$(patsubst&nbsp;$(SRC_API_DIR)/%.txt,%,&nbsp;$(wildcard&nbsp;$(SRC_API_DIR)/*.txt))&nbsp;\<br/>
&nbsp;)\<br/>
&nbsp;&nbsp;))<br/>
&nbsp;&nbsp;&nbsp;发布的sdk版本的最后一个版本号<br/>
&nbsp;&nbsp;&nbsp;示例：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17<br/>
</p>
</div>
<div class="variable">
<h3><a id="INTERNAL_PLATFORM_API_FILE">INTERNAL_PLATFORM_API_FILE</a></h3>
<p>
示例：&nbsp;out/target/common/obj/PACKAGING/public_api.txt<br/>
</p>
</div>
<div class="variable">
<h3><a id="SRC_API_DIR">SRC_API_DIR</a></h3>
<p>
示例：frameworks/base/api<br/>
</p>
</div>
<div class="build_target">
<h3><a id="update-api">Target:&nbsp;&nbsp;update-api</a></h3>
<p>
更新当前api<br/>
使用$(ACP)拷贝$(INTERNAL_PLATFORM_API_FILE)至$(SRC_API_DIR)/current.txt<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
