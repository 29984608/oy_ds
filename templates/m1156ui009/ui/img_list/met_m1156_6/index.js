
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
				
				
				
				if(METUI['$uicss'].find('.case-slide').length>0){
					METUI['$uicss_case']=new Swiper('.$uicss .case-container',{
						wrapperClass: 'case-wrapper',
						slideClass: 'case-slide',
						slidesPerView: 'auto', 
						loop: true, 
						autoplay: 5500, 
						lazyLoading: true,
						lazyLoadingInPrevNext: true, 
						lazyLoadingClass: 'case-lazy', 
						roundLengths: true,
						observer:true,
						observeParents:true,
						watchSlidesProgress : true,
						watchSlidesVisibility : true, 
						prevButton: '.$uicss .case-left',
						nextButton: '.$uicss .case-right'
					});  
				} 
				
					
				METUI['$uicss'].find('.case-slide a').click(function(){
					var imglist = $(this).data("imglist"),
						dyarr = new Array(),
						arlt = imglist.split('+|-');
					$.each(arlt,function(name,value){
						if(value!=''){
							var st = value.split('*-='),
							key = name;
							dyarr[key] = new Array();
							dyarr[key]['src'] = st[1];
							dyarr[key]['thumb'] = st[1];
							dyarr[key]['subHtml'] = st[0];
						}
					});
					$(this).lightGallery({
						autoplayControls:false,
						getCaptionFromTitleOrAlt:false,
						dynamic: true,
						dynamicEl: dyarr,
						thumbWidth:64,
						thumbContHeight:84,
					});
					$(this).on('onSlideClick.lg',function(){
						$('.lg-outer .lg-toolbar').toggleClass('opacity0');
						if($('.lg-outer .lg-toolbar').hasClass('opacity0')){
							$('.lg-outer').removeClass('lg-thumb-open');
						}else{
							$('.lg-outer').addClass('lg-thumb-open');
						}
						if(Breakpoints.is('xs')){
							if($('.lg-outer .lg-toolbar').hasClass('opacity0')){
								$('.lg-outer .lg-actions').addClass('hide');
							}else{
								$('.lg-outer .lg-actions').removeClass('hide');
							}
						}else{
							$('.lg-outer .lg-actions').removeClass('hide');
						}
					});
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
