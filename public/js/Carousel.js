function Carousel_init() {

	var ua 	= navigator.userAgent;
	var td 	= false;
	var e		= {};
	
	if(typeof window.ontouchstart !== 'undefined') {
		if(ua.search(/iPhone/) != -1 || ua.search(/iPad/) != -1 || ua.search(/iPod/) != -1) {
			e.down	= 'touchstart';
			e.move	= 'touchmove';
			e.up		= 'touchend';
		} else {
			e.down	+= ' touchstart';
			e.move	+= ' touchmove';
			e.up		+= ' touchend';
		}
		td = true;
	} else if(window.navigator.msPointerEnabled) {
		e.down	= 'pointerdown';
		e.move 	= 'pointermove';
		e.up		= 'pointerup';
		td 		= true;
	}

	//if(td) {
		$(".jsCarousel").each(function(){
			new Carousel($(this),e);
		});
	//}
	
}

function Carousel($parent,e) {
	
	this.event = {};
	
	this.$outer 	= $(".jsCarousel_outer",$parent);;
	this.$inner		= $(".jsCarousel_inner",$parent);
	this.$prev		= $(".prev",$parent);
	this.$next		= $(".next",$parent);
	this.mostLeft 	= 0;
	this.mostRight = 0;
	this.ow			= 0;
	this.cw			= 0;
	this.dragspeed = 500;
	this.draged		= false;
	this.event		= e;
	this.active		= 0;		
	this.sp_event 	= false;
	this.active		= 0;
	this.startX = this.startY = this.lastX = this.lastY = 0;
	
	this.init();
	
}

Carousel.prototype = {
	
	init:function(){
		
		var ins = this;

		ins.$prev.addClass("op_0");
		
		ins.$inner.bind(ins.event.down, function (e) {
			ins.bind_down_event(e);
		});
		
		//ins.calc();
		
	},

	calc: function(){

		var ins = this;
		
		ins.ow = ins.$outer.width();
		ins.cw = ins.$inner.innerWidth();
		ins.mostRight = -(ins.$inner.width() - ins.ow);
		
	},
	
	
	bind_down_event: function(e) {

		var ins = this;

		ins.calc();
		
		ins.startX = ins.lastX = ins.get_pageX(e);
		ins.startY = ins.lastY = ins.get_pageY(e);
		
		ins.bind_move_event();
		ins.bind_up_event();		

		//上下に動さない場合は有効にする
		//event.preventDefault();
		
				
	},

	bind_move_event: function () {

		var ins 	= this;

		//move
		ins.$inner.bind(ins.event.move, function (e) {
			
			var x = ins.get_pageX(e);
			var y = ins.get_pageY(e);
			
			if(Math.abs(ins.lastX - x) > Math.abs(ins.lastY - y)) {
		
				var d = ((x - ins.lastX) / $(window).width()) * ins.dragspeed;
				var l = parseInt(ins.$inner.css("margin-left")) + d;
				l = Math.min(l,ins.mostLeft);
				l = Math.max(l,ins.mostRight);
				ins.$inner.css("margin-left",l + "px");
		
				ins.lastX = x;
				ins.lastY = y;
				
				ins.$prev.addClass("op_0");
				ins.$next.addClass("op_0");
				
				if(l<0) {
					ins.$prev.removeClass("op_0");
				}
				
				if(l>ins.mostRight) {
					ins.$next.removeClass("op_0");
				}

		
				//<img>などがドラッグできる問題解決用
				return false;

			}
			
			ins.lastX = x;
			ins.lastY = y;
		


		});

	},

	bind_up_event: function () {

		var ins = this;

		$(document).bind(ins.event.up, function (e) {

			var ww = $(window).width();
			
			ins.$inner.unbind(ins.event.move);
			$(document).unbind(ins.event.up);

		});

	},
		
	get_pageX: function(e){

		if(e.type.match(/^touch/)) {
			return event.changedTouches[0].pageX;
		} else {
			return e.pageX;
		}

	},

	get_pageY: function(e){ 

		if(e.type.match(/^touch/)) {
			return event.changedTouches[0].pageY;
		} else {
			return e.pageY;
		}

	}
	
}