METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss',
	init: function(){
		if($('.swiper-header').length==0){
			METUI['$uicss_x'].slide(1);
		}
	},
	resize: function(res){
		
		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	slide: function(str){
		switch (str){
			case 1:
				if(!METUI['slide']){
					METUI['$uicss']
						.css('background-image','url('+METUI['$uicss'].attr('data-background')+')')
						.removeAttr('data-background')
				}
				
				METUI['$uicss'].find('.host-list dd').mouseover(function(){
					that=$(this);
					that.parent('dl').find('dd').removeClass('active');
					that.addClass('active')
					that.parents('li').find('img').attr('src',that.attr('src'));
				});
					 
				
				$('.imgloading').lazyload({
					load: function(){
						window.setTimeout(function(){
							metAnimOnScroll('met-grid');
						},400);
					}
				});
			break;
			case 2:
			
			break;
			case 3:
			
			break;
		}
	}
}
var x=new metui(METUI_FUN['$uicss']);
