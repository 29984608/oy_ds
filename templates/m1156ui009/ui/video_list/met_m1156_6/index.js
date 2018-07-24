
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
						.removeAttr('data-background');
				}
				
				
				if( METUI['$uicss'].find('video').attr('data-play')==0 ){
					$('.video-content span').fadeOut();
					METUI['$uicss'].find('video').trigger('play').attr('data-play',1).attr('controls','controls');
				}
				
				
				$('.video-content span').click(function(){
					$(this).fadeOut();
					METUI['$uicss'].find('video').trigger('play').attr('controls','controls'); 
				}); 
				
		
				METUI['$uicss'].addClass('active');
			break;
			case 2:
				if(METUI['$uicss_anenst']) METUI['$uicss_anenst'].init();
				METUI['$uicss'].addClass('active');
			break;
			case 3:
				if(METUI['$uicss_anenst']) METUI['$uicss_anenst'].destroy(false);
				METUI['$uicss'].removeClass('active');
			break;
		}
	}
}
var x=new metui(METUI_FUN['$uicss']);
