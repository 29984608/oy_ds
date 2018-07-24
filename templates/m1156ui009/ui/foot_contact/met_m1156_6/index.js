
METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss', 
	init: function(){
		
		
	},
	resize: function(res){

		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	slide: function(str){
		switch (str){
			case 1:
				
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
