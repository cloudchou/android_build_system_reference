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

	$("#s").keyup(function(event) {
		var branches = $("#variable #list").find("li");
		var input = $("#s").val();
		branches.each(function(i, e) {
			var v = $(e).find(".v").text();
			if (v.toLowerCase().indexOf(input.toLowerCase()) >= 0) {
				$(e).show();
			} else {
				$(e).hide();
			}
		});
		console.log(event.keyCode);
		if (event.keyCode != 116) {
			$("#variable #list").jScrollPane({
				arrowScrollOnHover : true
			});
		}
	});

	if ($(window).scrollTop() <= 0) {
		$('#back-top').hide();
	}

	// fade in #back-top
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-top a').click(function() {
			$('body,html').animate({
				scrollTop : 0
			}, 800);
			return false;
		});
	});

});
