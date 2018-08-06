$(function() {
	
	$("body").addClass("jsOn");
	
	$(".jsHbm").on("click",function(){
		if($(this).hasClass("on")) {
			$(this).removeClass("on");
			$("#gn").removeClass("on");
		} else {
			$(this).addClass("on");
			$("#gn").addClass("on");
		}
	});
	
	$(".jsSchoolList").on("click",function(){
		if($(this).hasClass("on")) {
			$(this).removeClass("on");
		} else {
			$(this).addClass("on");
		}		
	});
	
	$(".jsSearchBtn").on("click",function(){
		$("#searchBox").slideToggle(250);
	});
	
	$(".jsSearchClose").on("click",function(){
		$("#searchBox").slideToggle(250);
	});
	

	$(".shorten").on("click",function(){
		$(this).addClass("open");
	});

	//new Scroll_manager();
		
});



function Scroll_manager() {

	this.y = 0;
	this.timerId = 0;
	
	this.scroll_process();
	this.set_scroll_event();

}

Scroll_manager.prototype = {

	set_scroll_event: function () {

		var ins = this;

		$(window).scroll(function () {
			ins.scroll_process();
		});
			
	},
	
	scroll_process: function() {

		var ins	= this;
		var y 	= $(window).scrollTop();
		var wh 	= $(window).height();
		var $elm,top,top2;
		
		
		if(y > ins.y) {
			$("#btn_top").removeClass("show");
			clearInterval(ins.timerId);
		}
		
		if(y > wh) {
			if(!$("#btn_top").hasClass("show")) {
				clearInterval(ins.timerId);
				ins.timerId = setTimeout(function(){
					$("#btn_top").addClass("show");
				},1000);
			}
		} else {
			$("#btn_top").removeClass("show");
		}
		
		$(".jsLoaded_target").each(function(){
			var top = $(this).offset().top;
			if(y + wh >= top) {
				$(this).addClass("loaded");
			} else {
				$(this).removeClass("loaded");
			}
		});

		
		$("main > section.bg").each(function(){
			
			var $elm			= $(this);
			var top			= $elm.offset().top;
			var top2			= $(".outer",$elm).offset().top;
			var def_bgp		= "65% top";

			if(y >= top) {
				var n = (y - top) * 0.5;
				$elm.css("background-position","65% " + n + "px");
			} else {
				$elm.css("background-position",def_bgp);
			}

			if(y >= top2) {
				$elm.css("background-position",def_bgp);
			}
		});

		$("#product img.nanocare").each(function(){
			var top = $(this).offset().top;
			if(y + wh >= top) {
				$(this).addClass("loaded");
			} else {
				$(this).removeClass("loaded");
			}
		});

		
		$("img.zoom").each(function(){
			var top = $(this).offset().top;
			if(y + wh*0.666 >= top && y < top) {
				$(this).addClass("active");
			} else {
				$(this).removeClass("active");
			}			
		});
		
		$("#result .graph").each(function(){
			var top = $(this).offset().top;
			if(y + wh*0.75 >= top) {
				if(!$(this).hasClass("loaded")) {
					$(this).addClass("loaded");
					$("ul.chart li.bar",$(this)).each(function(){
						Graph.show($(this));
					});
				}
			/*
			} else {
				if($(this).hasClass("loaded")) {
					$(this).removeClass("loaded");
					$("ul.chart li",$(this)).each(function(){
						Graph.hide($(this));
					});
				}*/
			}			
		});
		
		$elm	= $("#scene section.scene");
		top 	= $elm.offset().top;
		if(y + wh >= top) {
			$elm.addClass("loaded");
		} else {
			$elm.removeClass("loaded");
		}
				
		ins.y = y;
			
	},
	
}
