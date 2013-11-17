<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<script
	src="http://www.cloudchou.com/wp-content/themes/tangstyle/jquery.min.js"
	type="text/javascript">
</script>
<script src="./functions.js">
</script>
<style type="text/css">
body {
	font: 14px/21px Microsoft YaHei, Tahoma, Arial;
	background-color: #eceef0;
}

#container {
	width: 980px;
	margin: 0 auto;
}

#header,#footer {
	clear: both;
}

#header {
	border-bottom: 2px dashed #CCCCCC;
	line-height: 200%;
	padding: 0 1em;
}

#header h1 {
	color: #666666;
	font-size: 32px;
	text-shadow: 2px 2px 1px #CCCCCC;
	font-weight: normal;
}

#content {
	float: left;
	width: 68%;
	padding: 1em;
}

#content h2 {
	font-weight: 500;
}

#sidebar {
	float: right;
	width: 29%;
	background-color: #FFFFFF;
	border-bottom: 2px solid #CCCCCC;
	box-shadow: 0 1px 2px #CCCCCC;
	margin-top: 30px;
}

#variable {
	height: 500px;
}

#search {
	margin: 10px 10px;
}

#s {
	font-size: 16px;
	padding: 0 5px; background : none repeat scroll 0 0 rgba( 0, 0, 0, 0);
	border: 0 none;
	border-bottom: 1px solid #CCCCCC;
	height: 20px;
	display: inline;
	width: 200px;
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
}

.s_left,.s_right {
	display: inline;
	height: 5px;
	width: 1px;
	padding-bottom: 6px;
	font-size: 0px;
}

.s_left {
	border-right: 1px solid #CCCCCC;
}

.s_right {
	border-left: 1px solid #CCCCCC;
	margin-right: -2px;
}

.widget h3 {
	border-bottom: 1px solid #E5E5E5;
	color: #333333;
	font-size: 18px;
	margin: 0 -10px;
	padding: 5px 0 5px 20px;
	text-shadow: 0 2px 0 #EEEEEE;
	font-weight: 500;
}

#footer {
	text-align: center;
	padding: 1em 0;
}
</style>
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
					<div class="s_left"></div>
					<input id="s" type="text" size="30" value="检索一下">
					<div class="s_right"></div>
				</div>
				<ul>
					<li>BUILD_JAVA <span>build/core/definitions</span></li>
					<li>BUILD_STATIC_LIB</li>
					<li>BUILD_EXECTUABLE</li>
					<li>BUILD_JAVA</li>
					<li>BUILD_STATIC_LIB</li>
					<li>BUILD_EXECTUABLE</li>
				</ul>
			</div>

			<div id="file" class="widget">
				<h3>Makefile文件</h3>
				<ul>
					<li>BUILD_JAVA <span>build/core/definitions</span></li>
					<li>BUILD_STATIC_LIB</li>
					<li>BUILD_EXECTUABLE</li>
					<li>BUILD_JAVA</li>
					<li>BUILD_STATIC_LIB</li>
					<li>BUILD_EXECTUABLE</li>
				</ul>
			</div>
		</div>

		<div id="footer">Copyright©软件架构师成长之路</div>
	</div>
</body>
</html>
