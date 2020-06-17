$(document).ready(function(){
	
	function width_height() {
		//var w = document.documentElement.clientWidth == 0 ? document.body.clientWidth : 		document.documentElement.clientWidth;
		var h = document.documentElement.clientHeight == 0 ? document.body.clientHeight : 		document.documentElement.clientHeight;
		var hm = $('.mobile_menu__fixed').height();
		
		$('.mobile_menu_scroll').css({
			'height':(h-hm)
		});
		
		$('.m_ul_lvl_1').css({
			'width':'80%',
			'height':'100%'
		})

	};

	width_height();

 $(window).scroll(function(){
	 width_height();
 });
 
$('.m_li_lvl_1>a.parent_a').on('click touchend', function(e){
	e.preventDefault();
	$(this).next('ul').css({
		'left': '0',
		'padding-left': '0%'
	});

});
	
	$('.mx_dropdown__mobile__back').on('click touchend', function(e){
	 e.preventDefault();
	 $(this).parent().css('padding-left', '100%').delay(200).css('left', '100%');
 });

});


