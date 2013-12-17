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
<h3>build/core/tasks/product-graph.mk</h3>
<p>
定义生成生成产品继承图的规则<br/>
</p>
</div>
<div class="function">
<h3><a id="gather-all-products">Function:&nbsp;&nbsp;gather-all-products</a></h3>
<p>
得到所有产品<br/>
the&nbsp;foreach&nbsp;and&nbsp;the&nbsp;if&nbsp;remove&nbsp;the&nbsp;single&nbsp;space&nbsp;entries&nbsp;that&nbsp;creep&nbsp;in&nbsp;because&nbsp;of&nbsp;the&nbsp;evals<br/>
</p>
</div>
<div class="variable">
<h3><a id="this_makefile">this_makefile</a></h3>
<p>
this_makefile&nbsp;:=&nbsp;build/core/tasks/product-graph.mk<br/>
</p>
</div>
<div class="variable">
<h3><a id="products_svg">products_svg</a></h3>
<p>
products_svg&nbsp;:=&nbsp;$(OUT_DIR)/products.svg<br/>
示例：<br/>
&nbsp;&nbsp;out/products.svg<br/>
</p>
</div>
<div class="variable">
<h3><a id="products_pdf">products_pdf</a></h3>
<p>
products_pdf&nbsp;:=&nbsp;$(OUT_DIR)/products.pdf<br/>
out/products.pdf<br/>
</p>
</div>
<div class="variable">
<h3><a id="products_graph">products_graph</a></h3>
<p>
products_graph&nbsp;:=&nbsp;$(OUT_DIR)/products.dot<br/>
out/products.dot<br/>
</p>
</div>
<div class="variable">
<h3><a id="products_list">products_list</a></h3>
<p>
ifeq&nbsp;($(strip&nbsp;$(ANDROID_PRODUCT_GRAPH)),)<br/>
products_list&nbsp;:=&nbsp;$(INTERNAL_PRODUCT)<br/>
else<br/>
ifeq&nbsp;($(strip&nbsp;$(ANDROID_PRODUCT_GRAPH)),--all)<br/>
products_list&nbsp;:=&nbsp;--all<br/>
else<br/>
products_list&nbsp;:=&nbsp;$(foreach&nbsp;prod,$(ANDROID_PRODUCT_GRAPH),$(call&nbsp;resolve-short-product-name,$(prod)))<br/>
endif<br/>
endif<br/>
</p>
</div>
<div class="variable">
<h3><a id="really_all_products">really_all_products</a></h3>
<p>
所有产品<br/>
really_all_products&nbsp;:=&nbsp;$(call&nbsp;gather-all-products)<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(products_graph)">Target:&nbsp;&nbsp;$(products_graph)</a></h3>
<p>
生成产品继承图products.dot<br/>
</p>
</div>
<div class="function">
<h3><a id="product-debug-filename">Function:&nbsp;&nbsp;product-debug-filename</a></h3>
<p>
Evaluates&nbsp;to&nbsp;the&nbsp;name&nbsp;of&nbsp;the&nbsp;product&nbsp;file<br/>
$(1)&nbsp;product&nbsp;file<br/>
</p>
</div>
<div class="function">
<h3><a id="transform-product-debug">Function:&nbsp;&nbsp;transform-product-debug</a></h3>
<p>
打印PRODUCT的PRODUCTU_*变量&nbsp;&nbsp;&nbsp;<br/>
Makes&nbsp;a&nbsp;rule&nbsp;for&nbsp;the&nbsp;product&nbsp;debug&nbsp;info<br/>
&nbsp;$(1)&nbsp;product&nbsp;file<br/>
</p>
</div>
<div class="variable">
<h3><a id="product_debug_files">product_debug_files</a></h3>
<p>
product_debug_files:=<br/>
&nbsp;&nbsp;&nbsp;$(foreach&nbsp;p,$(really_all_products),&nbsp;\<br/>
$(eval&nbsp;$(call&nbsp;transform-product-debug,&nbsp;$(p)))&nbsp;\<br/>
$(eval&nbsp;product_debug_files&nbsp;+=&nbsp;$(call&nbsp;product-debug-filename,&nbsp;$(p)))&nbsp;\<br/>
)&nbsp;<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(products_pdf)">Target:&nbsp;&nbsp;$(products_pdf)</a></h3>
<p>
生成product继承图的pdf版本<br/>
</p>
</div>
<div class="build_target">
<h3><a id="$(products_svg)">Target:&nbsp;&nbsp;$(products_svg)</a></h3>
<p>
生成product继承图的svg版本<br/>
</p>
</div>
<div class="build_target">
<h3><a id="product-graph">Target:&nbsp;&nbsp;product-graph</a></h3>
<p>
生成product-graph<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
