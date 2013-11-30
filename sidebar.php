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
			$biasNum = substr_count ( $_SERVER ['REQUEST_URI'], '/' ); // 用'/'分割当前路径字符串，并计算分割后的字符串数量
			$relativePath = './'; // 初始化变量$relativePath为'./'
			for($i = 0; $i < ($biasNum - 1); $i ++) { // 循环添加'../'
				$relativePath .= '../';
			}
			require_once $relativePath . "vlist.php";
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
	<script type="text/javascript">
	$(document).ready( function() {
		$("#mklist").treeview({
			url :  "<?php echo $relativePath."json_files.php" ?>" ,
			toggle : function() {
				$("#mklist_container").jScrollPane({
					arrowScrollOnHover : true
				});
			}
		}) ;	
	});	
	</script>
</div>
