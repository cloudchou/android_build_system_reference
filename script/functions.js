function GetDateDiff(startTime, endTime, diffType) {
         //将xxxx-xx-xx的时间格式，转换为 xxxx/xx/xx的格式 
         startTime = startTime.replace(/\-/g, "/");
         endTime = endTime.replace(/\-/g, "/");

         //将计算间隔类性字符转换为小写
         diffType = diffType.toLowerCase();
         var sTime = new Date(startTime);      //开始时间
         var eTime = new Date(endTime);  //结束时间
         //作为除数的数字
         var divNum = 1;
         switch (diffType) {
             case "second":
                 divNum = 1000;
                 break;
             case "minute":
                 divNum = 1000 * 60;
                 break;
             case "hour":
                 divNum = 1000 * 3600;
                 break;
             case "day":
                 divNum = 1000 * 3600 * 24;
                 break;
             default:
                 break;
         }
         return parseInt((eTime.getTime() - sTime.getTime()) / parseInt(divNum));
};

Date.prototype.format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};

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
	
   //网站计时	
    
   var date=new Date(); 
   var dateStr=date.format("yyyy-MM-dd");
   var daycount=GetDateDiff("2013-12-1",dateStr, "day");
   var str="本网站开通于2013.12.1，已运行"+daycount+"天";
   $("#daycount").text(str);
});
