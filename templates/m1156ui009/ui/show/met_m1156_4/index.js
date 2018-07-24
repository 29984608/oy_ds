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
				if(METUI['$uicss'].find(".met-editor img").length){
					if (!METUI['$uicss'].find(".met-editor.no-gallery").length) {
						METUI['$uicss'].find(".met-editor").wrapInner("<div class='editorlightgallery'></div>");
						METUI['$uicss'].find(".met-editor").each(function() {
							var img_gallery_open=1,
								this_editor=this;
							METUI['$uicss'].find("img",this).one('click',function() {
								if(img_gallery_open){
									METUI['$uicss'].find('img',this_editor).each(function() {
										if($(this).parent("a").length==0){
											var data_thumb=data_src = ($(this).attr("data-original")||$(this).attr("src"));
											$(this).wrap("<div class='lg-item-box' data-src='"+data_src+"' data-exthumbimage='"+data_thumb+"'></div>");
										}
									});
									METUI['$uicss'].find('.editorlightgallery',this_editor).galleryLoad();
									$(this).parent('.lg-item-box').trigger('click');
									img_gallery_open=0;
								}
							});
						});
					}
				}
			break;
			case 2:
			
			break;
			case 3:
			
			break;
		}
	}
}
var x=new metui(METUI_FUN['$uicss']);
