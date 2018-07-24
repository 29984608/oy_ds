
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
				
				
				
				if(METUI['$uicss'].find('.multi-slide').length>1){
					METUI['$uicss_multi']=new Swiper('.$uicss .multi-move',{
						wrapperClass: 'multi-wrapper',
						slideClass: 'multi-slide',
						slidesPerView: 1, 
						virtualTranslate: true,
						speed: 1000,
						loop: true, 
						autoplay: 5500,
						autoplayDisableOnInteraction: true,
						lazyLoading: true,
						lazyLoadingInPrevNext: true,
						lazyLoadingInPrevNextAmount: 20,
						lazyLoadingClass: 'multi-lazy', 
						roundLengths: true,
						observer:true,
						observeParents:true,
						watchSlidesProgress : true,
						watchSlidesVisibility : true
					}); 
					n=1;
					METUI['$uicss'].find('.multi-left').click(function(){
						n--;
						if(n<1) n=METUI['$uicss'].find('.multi-slide').length-2;
						METUI['$uicss_multi'].slideTo(n);
					});
					METUI['$uicss'].find('.multi-right').click(function(){
						n++;
						if(n>METUI['$uicss'].find('.multi-slide').length-1) n=2;
						METUI['$uicss_multi'].slideTo(n);
					});
					
				}else{
					METUI['$uicss']
						.find('.multi-slide')
						.addClass('swiper-slide-active')
						.find('.multi-lazy')
						.css('background-image','url('+METUI['$uicss'].find('.multi-lazy').attr('data-background')+')');
					METUI['$uicss'].find('.multi-left,.multi-right').remove();
				}
				
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
