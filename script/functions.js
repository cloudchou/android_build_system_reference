$(document).ready(function() {

	$("#s").focus(function() {
		$("#s").css("border-bottom", "1px solid #33BFE5");
		$(".s_left").css("background-color", "#33BFE5");
		$(".s_right").css("background-color", "#33BFE5");
		$("#s").css("color", "#000000");
	});
	$("#s").blur(function() {
		$("#s").css("border-bottom", "1px solid #CCCCCC");
		$(".s_left").css("background-color", "#CCCCCC");
		$(".s_right").css("background-color", "#CCCCCC");
		$("#s").css("color", "#CCCCCC");
	});

	$("#s").focus();

	$("#variable #list").jScrollPane({
		arrowScrollOnHover : true
	});

	$("#mklist").treeview({
		url : "json_files.php" ,
		toggle : function() {
			$("#mklist_container").jScrollPane({
				arrowScrollOnHover : true
			});
		}
	}); 
	
});
