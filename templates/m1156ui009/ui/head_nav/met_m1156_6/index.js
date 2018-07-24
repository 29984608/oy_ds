
METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss',
	winslide: $('.$uicss').nextAll('section:not(.not-slide),div:not(.not-slide),footer:not(.not-slide)'),
	pageset: window.location.href.indexOf('pageset=1')>0,
	clickfun: function(e){
		if(e){
			e.click(function(){
				if($(this).hasClass('hover')&&$(this).find('.hover').length==0){
					$(this).removeClass('hover');
					$(this).find('.hover').removeClass('hover');
				}else{
					$(this).addClass('hover');
				}
			}).hover(function(){
				if(Breakpoints.is('lg')){
					$(this).addClass('hover');
				}
			},function(){
				$(this).removeClass('hover');
				$(this).find('.hover').removeClass('hover');
			});
		}
	},
	resize: function(res){
		if(!res){
			navli=[];
			navul=METUI['$uicss'].find('.nav-box').children('ul')[0].outerHTML;
			METUI['$uicss'].find('.nav-box').children('ul').children('li').each(function(i){
				navli[i]=[$(this)[0].outerHTML];
			});
		}else{
			METUI['$uicss'].find('.nav-box').html(navul);
		}
		
		METUI['$uicss'].removeClass('nav-easy mobile-box');
		METUI['$uicss'].find('.logo-box img,.nav-box>ul>li>ul').removeAttr('style');
		if(!Breakpoints.is('xs')){
			var navhtm=[];
				navhtm[0]=Math.floor(
						  METUI['$uicss'].find('.container,.container-fluid').width()-
						  METUI['$uicss'].find('.logo-box').outerWidth()-
						  METUI['$uicss'].find('.user-box').outerWidth()-
						  METUI['$uicss'].find('.user-button').outerWidth()-
						  METUI['$uicss'].find('.lang-box').outerWidth()-
						  METUI['$uicss'].find('.search-box').outerWidth()-
						  METUI['$uicss'].find('.font-box').outerWidth()),
				navhtm[1]=0,
				navhtm[2]=navhtm[3]='',
				navhtm[4]=navli.length;
			for(var i=0;i<navhtm[4];i++){
				navthis=METUI['$uicss'].find('.nav-box').children('ul').children('li').eq(i);
				navhtm[1]+=navthis.outerWidth()+navthis.css('margin-right').replace('px','')*1;
				if(navhtm[1]<navhtm[0]){
					if(navhtm[1]+52<=navhtm[0]||i+1==navhtm[4]){
						navhtm[2]+=navli[i][0];
					}else{
						navhtm[3]+=navli[i][0];
					}
				}else{
					navhtm[3]+=navli[i][0];
				}
			}
			if(navhtm[3]!=''){
				if(navhtm[2].split('<li').length>3){
					navhtm[2]+=
					'<li>'+
					  '<a class="nav-other" href="javascript:void(0);">'+
						'<i class="icon wb-more-horizontal"></i>'+
					  '</a>'+
					  '<ul>'+navhtm[3]+'</ul>'+
					'</li>';
				}else{
					navhtm[2]=
					'<li>'+
					  '<a class="nav-menu" href="javascript:void(0);">'+
						'<i class="icon wb-menu"></i>'+
					  '</a>'+
					  '<ul>'+navhtm[2]+navhtm[3]+'</ul>'+
					'</li>';
					METUI['$uicss'].addClass('nav-easy');
				}
			}
			METUI['$uicss'].find('.nav-box').html('<ul>'+navhtm[2]+'</ul>');
		}else{
			var navhtm=
				'<li>'+
				  '<a class="nav-menu" href="javascript:void(0);">'+
					'<i class="icon wb-menu"></i>'+
				  '</a>'+
				  '<ul>';
			for(var i=0;i<navli.length;i++){
				navhtm+=navli[i][0];
			}
			navhtm+=
				  '</ul>'+
				'</li>';
			METUI['$uicss'].addClass('nav-easy');
			METUI['$uicss'].find('.nav-box').html('<ul>'+navhtm+'</ul>');
			METUI['$uicss'].find('.logo-box img').css('max-width',
				Math.floor(
					METUI['$uicss'].find('.container,.container-fluid').width()-
					METUI['$uicss'].find('.nav-box').outerWidth()-
					METUI['$uicss'].find('.user-box').outerWidth()-
					METUI['$uicss'].find('.user-button').outerWidth()-
					METUI['$uicss'].find('.lang-box').outerWidth()-
					METUI['$uicss'].find('.search-box').outerWidth()-
					METUI['$uicss'].find('.font-box').outerWidth()-20
				)
			);
			METUI['$uicss'].find('.nav-box>ul>li>ul').css(
				'max-height',
				$(window).height()-
				METUI['$uicss'].find('.container,.container-fluid').height()-10
			);
		}
		if(!Breakpoints.is('lg')){
			METUI['$uicss'].addClass('mobile-box');
			METUI['$uicss'].find('.nav-box ul').parent('li').children('a').each(function(){
				$(this).removeAttr('href');
			});
		}
		
		METUI['$uicss_x'].clickfun(METUI['$uicss'].find('.nav-box li'));
		
		METUI['$uicss'].find('.nav-box a').click(function(){
			if(!METUI['$uicss'].hasClass('nav-easy')){
				var navsul=$(this).next('ul');
				var navtaf=navsul.css('transform');					
				if(navsul.length>0&&!$(this).hasClass('right')){
					if($(window).width()-
						navsul.offset().left-navsul.width()-
						navtaf.match(/matrix\(\d+, \d+, \d+, \d+, (\d+), \d+\)/)[1]<0){
						$(this).parent('li').addClass('right');
					}
				}
			}				
		});
		
		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	class: function(){
		this.winslide.each(function(index,element){
			that=$(this);
			if(typeof(that.attr('data-background'))=='undefined'){
				that.attr('data-background','');
			}
			m_class=that.attr('class').split(' ');
			for(var i in m_class){
				if(m_class[i].indexOf('_met_')>0){
					that.attr('m-class',m_class[i]);
					break;
				}
			}
		});
	},
	scroll: function(res){ 
		METUI['$uicss'].find('.hover').removeClass('hover');
		
		var wnHeg=$(window).height();
		var scTop=$(window).scrollTop();
		METUI['$uicss_x'].winslide.each(function(){
			var that=$(this);
			if(that.css('position')!='absolute'&&that.css('position')!='fixed'&&that.css('display')!='none'){
				var uiHeg=that.height();
				var uiTop=that.offset().top;
				var uiCls=that.attr('m-class');
				if(uiTop-wnHeg<scTop&&uiTop+uiHeg>scTop){
					if(!that.hasClass('now')){
						if(!that.hasClass('new')){
							that.addClass('new');
							METUI['$uicss_x'].fun(uiCls,1);
						}else{
							METUI['$uicss_x'].fun(uiCls,2);
						}
						that.addClass('now');
					}
					that.removeClass('out');
				}else{
					if(!that.hasClass('out')){
						if(that.hasClass('new')){
							METUI['$uicss_x'].fun(uiCls,3);
						}
						that.addClass('out');
					}
					that.removeClass('now');
				}
			}
		});
		if(!res){
			banner=METUI['$uicss'].next('[class*="banner_met_"]');
			banif=banner.length>0 && banner.css('display')!='none';
		}
		if(banif){
			if(scTop<banner.height()){
				METUI['$uicss'].removeClass('scroll');
			}else{
				METUI['$uicss'].addClass('scroll');
				if(typeof(oldTop)!='undefined'){
					if(scTop>oldTop){
						METUI['$uicss'].removeClass('top');
					}else{
						METUI['$uicss'].addClass('top');
					}
				}
			}
		}else{
			METUI['$uicss'].addClass('scroll top').find('.box-ok').show();
		}
		
		oldTop=scTop;
		if(!res) $(window).scroll(function(){ METUI['$uicss_x'].scroll(true); });
	},
	fun: function(cls,num){
		if(cls){
			if(num==1){
				times=window.setTimeout(function(){
					//try{
						METUI[cls+'_x'].slide(num);
					//}catch(e){}
				},100);
			}else{
				//try{
					METUI[cls+'_x'].slide(num);
				//}catch(e){}
			}
		}
	},
	simplified: function(){
    	var isSimplified = true;
		$('.font-box i').click(function() {
			if(isSimplified){
				$('body').s2t();
				isSimplified=false;
				$(this).text('简');
			}else{
				$('body').t2s();
				isSimplified=true;
				$(this).text('繁');
			}
		});
	},
	over: function(){
		METUI['$uicss_x'].clickfun(METUI['$uicss'].find('.search-box,.search-box form,.user-box,.lang-box'));
		METUI['$uicss'].find('.nav-box').removeClass('nav-fix');
	}
}
var x=new metui(METUI_FUN['$uicss']);