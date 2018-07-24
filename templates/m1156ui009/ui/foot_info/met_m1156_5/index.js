METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss',
	init: function(){
		
	},
	resize: function(res){
		if(METUI['$uicss'].hasClass('lr')){
			if(Breakpoints.is('lg')||Breakpoints.is('md')){
				var left_width=METUI['$uicss'].find('.foot-left').width();
				var right_width=METUI['$uicss'].find('.foot-right').width();
				var foot_width=METUI['$uicss'].width();
				if(left_width+right_width>foot_width){
					if(left_width>right_width){
						METUI['$uicss'].find('.foot-left').css('max-width',foot_width-right_width);
					}else{
						METUI['$uicss'].find('.foot-right').css('max-width',foot_width-left_width);
					}
				}
			}else{
				METUI['$uicss'].find('.foot-left,.foot-right').css('max-width',999999);
			}
		}
		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	slide: function(str){
		switch (str){
			case 1:
			
			break;
			case 2:
			
			break;
			case 3:
			
			break;
		}
	},
	simplified: function(){
    	var isSimplified = true;
		METUI['$uicss'].find('.simplified').click(function() {
			if(isSimplified){
				$('body').s2t();
				isSimplified=false;
				$(this).attr('title',$(this).attr('title').replace('繁','简'));
				$(this).find('i').text('简');
			}else{
				$('body').t2s();
				isSimplified=true;
				$(this).attr('title',$(this).attr('title').replace('简','繁'));
				$(this).find('i').text('繁');
			}
		});
	}
}
var x=new metui(METUI_FUN['$uicss']);
