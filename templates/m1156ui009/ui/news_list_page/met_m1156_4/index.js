
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
				if($('.news-headlines .slick-slide').length>1){		
					  new Swiper('.news-headlines',{
						  wrapperClass: 'news-wrapper',
						  slideClass: 'slick-slide',
						  autoplay: 3500,
						  loop: true,
						  observer:true,
						  observeParents:true,
						  lazyLoadingClass: 'slick-lazy',
						  lazyLoading: true,
						  lazyLoadingOnTransitionStart: true,
						  prevButton: '.swiper-button-prev',
						  nextButton: '.swiper-button-next',
						  pagination: '.swiper-pagination',
						  slidesPerView: 'auto'
					  });
				}else{
					hs=$('.news-headlines img');
					hs.attr('src',hs.attr('data-src')).removeAttr('data-src');
					$('.news-headlines .swiper-button-white').remove();
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
