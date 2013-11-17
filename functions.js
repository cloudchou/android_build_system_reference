$(document).ready(function() {
	$("#s").focus(function() {
		$("#s").css("border-bottom", "1px solid #33BFE5");
		$(".s_left").css("border-right", "1px solid #33BFE5");
		$(".s_right").css("border-left", "1px solid #33BFE5");
		$("#s").css("color", "#000000");
	})
	$("#s").blur(function() {
		$("#s").css("border-bottom", "1px solid #CCCCCC");
		$(".s_left").css("border-right", "1px solid #CCCCCC");
		$(".s_right").css("border-left", "1px solid #CCCCCC");
		$("#s").css("color", "#CCCCCC");
		$("#s").value("");
	})
	$("#s").focus();

});
