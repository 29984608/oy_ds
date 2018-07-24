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
				METUI['$uicss'].find('.img-li p').click(function(){
					var imglist = $(this).data("imglist"),
						dyarr = new Array(),
						arlt = imglist.split('|');
					$.each(arlt,function(name,value){
						if(value!=''){
							var st = value.split('*'),
							key = name;
							dyarr[key] = new Array();
							dyarr[key]['src'] = st[1];
							dyarr[key]['thumb'] = st[1];
							dyarr[key]['subHtml'] = st[0];
						}
					});
					$(this).galleryLoad(dyarr);
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
