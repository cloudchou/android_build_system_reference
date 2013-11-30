<?php
$biasNum = substr_count ( $_SERVER ['REQUEST_URI'], '/' ); // 用'/'分割当前路径字符串，并计算分割后的字符串数量
$relativePath = './'; // 初始化变量$relativePath为'./'
for($i = 0; $i < ($biasNum - 1); $i ++) { // 循环添加'../'
	$relativePath .= '../';
} 
?>
<meta name="keywords" content="Android 编译系统参考手册,Android 编译系统,Cyanogenmod 编译,Android变量参考">
<meta name="description" content="Android编译系统参考手册，助你理解Android编译系统">
<link type="text/css" href="<?php echo $relativePath?>style/jquery.jscrollpane.css"
	rel="stylesheet" media="all" />

<link type="text/css" href="<?php echo $relativePath?>style/index.css" rel="stylesheet"
	media="all" />

<link rel="stylesheet" href="<?php echo $relativePath?>style/jquery.treeview.css" />

<script type="text/javascript" src="<?php echo $relativePath?>script/jquery.min.js ">
				</script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo $relativePath?>script/jquery.jscrollpane.min.js"></script>

<script type="text/javascript" src="<?php echo $relativePath?>script/jquery.treeview.js" ></script>

<script type="text/javascript" src="<?php echo $relativePath?>script/functions.js" ></script>