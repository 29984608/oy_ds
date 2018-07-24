
METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss',
	IE9: navigator.userAgent.indexOf('MSIE 9.0')>0,
	init: function(){
		if($('.swiper-header').length==0){
			METUI['$uicss_x'].slide(1);
		}		
	},
	resize: function(res){
		
		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	grid: function(){
		new AnimOnScroll( document.getElementById('met-grid'),{
			minDuration:0.4,
			maxDuration:0.7,
			viewportFactor:0.2
		});
	},
	slide: function(str){
		switch (str){
			case 1:
				if(!METUI['slide']){
					METUI['$uicss']
						.css('background-image','url('+METUI['$uicss'].attr('data-background')+')')
						.removeAttr('data-background');
				}
				if(METUI['$uicss'].find('img[data-original]').length>0){
					METUI['$uicss'].find('img[data-original]').loadlazy({
						load: function(){
							METUI['$uicss_x'].grid();
							$(this).removeClass('data-original');
						}
					});
				}
				METUI['$uicss'].addClass('active');
			break;
			case 2:
				METUI['$uicss'].addClass('active');
			break;
			case 3:
				METUI['$uicss'].removeClass('active');
			break;
		}
	}
}
var x=new metui(METUI_FUN['$uicss']);
