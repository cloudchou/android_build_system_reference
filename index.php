<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>

<!-- styles needed by jScrollPane -->
<link type="text/css" href="style/jquery.jscrollpane.css"
	rel="stylesheet" media="all" />

<link type="text/css" href="style/index.css" rel="stylesheet"
	media="all" />

<link rel="stylesheet" href="style/jquery.treeview.css" />

<!-- latest jQuery direct from google's CDN -->
<script type="text/javascript" src="script/jquery.min.js ">
</script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="script/jquery.jscrollpane.min.js"></script>

<script src="script/jquery.treeview.js" type="text/javascript"></script>

<script src="script/functions.js" type="text/javascript"></script>

</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Android编译系统 参考手册</h1>
		</div>


		<div id="content">
			<h2>欢迎光临</h2>
			<p>您还在为阅读Android编译系统代码烦恼吗？</p>
			<p>当您面对令人头疼的千百个编译变量，而不知其意义，甚至不知其一个示例值，您是否也在打着退堂鼓，不想再继续阅读下去？</p>
			<p>可是，阅读源码对我们程序员来说非常重要，可以提升我们软件编程及设计能力</p>
			<p>面对这么一个优秀的编译框架，您真舍得不去研究研究吗？Android编译系统里将分离变化做的非常优秀，读懂它，你的设计能力可以更上一层噢!</p>
			<p>这里是Android编译系统参考手册，当您阅读源码，不知变量意义时，来这里检阅把，这里有参考值，有意义描述，可以帮您更好地理解编译系统!</p>
			<p>本网站基于Cyanogemod10.1研究</p>
		</div>

		<div id="sidebar">
			<div id="variable" class="widget">
				<h3>编译变量列表</h3>
				<div id="search">
					<p>检索变量：</p>
					<div class="s_left"></div>
					<input id="s" type="text" size="30">
					<div class="s_right"></div>
				</div>
				<div id="list"> 
					<?php
					  require_once 'vlist.php';
					?>  
				</div>
			</div>

			<div id="file" class="widget">
				<h3>Makefile文件</h3>
				<div id="mklist_container">
					<ul id="mklist">
					</ul>
				</div>
			</div>
		</div>

		<div id="footer">Copyright©软件架构师成长之路</div>
	</div>
</body>
</html>
