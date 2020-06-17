//проверка на ботов
function empty_form(){
	$('input[name=phrase]').val('megasecret');
}

$(document).ready(function(){
	
	//открыть меню в мобильной шапке
	$('body').on('click', '.header__top__hamburger.closed', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).removeClass('closed').addClass('opened');
		$('.mobile_menu').removeClass('closed').addClass('opened');
		$('.header__top__hamburger').addClass('opened');
		$('.header__top__search__btn_m').removeClass('opened').addClass('closed');
	});
	//закрыть меню в мобильной шапке
	$('body').on('click', '.header__top__hamburger.opened', function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).removeClass('opened').addClass('closed');
		$('.mobile_menu').removeClass('opened').addClass('closed');
		$('.header__top__hamburger').removeClass('opened');
		$('.header__top__search__btn_m').removeClass('closed').addClass('opened');
	});
	//не закрываем меню по кликам внутри него
	$('body').on('click', '.mobile_menu', function(e){
		$(this).removeClass('closed').addClass('opened');
		$('.mobile_menu').removeClass('closed').addClass('opened');
		$('.header__top__hamburger').addClass('opened');
		$('.header__top__search__btn_m').removeClass('opened').addClass('closed');
	});

	


	//fixed menu
	function fixedmenu() {
		var screenSize = $(window).width();

		if ($(window).scrollTop() > 50 || screenSize <= 991) {
			$('.header-sticky1').addClass('is-sticky');
			$('.header-top-two').addClass('mx_mobile');
		} else {
			$('.header-sticky1').removeClass('is-sticky');
			$('.header-top-two').removeClass('mx_mobile');
		}
	}
	
	fixedmenu();

	$(window).scroll(function () {
		fixedmenu();
	});


	//Форма страникца Сервис  
	$('#service_form').on('submit', function(e){
		console.log(e);
		e.preventDefault();
		empty_form();

		$.ajax({
	    type: 'POST',
	    url: '/include/mx/email.php',
	    data : $(this).serialize(),
	    success: function(result){
				$('#success').modal('show');
				console.log(result);
			}
		});
	});
  

	//Форма Обратный звонок  
	$('.callback_form').on('submit', function(e){
		console.log(e);
		e.preventDefault();
		empty_form();

		$.ajax({
	    type: 'POST',
	    url: '/include/mx/email.php',
	    data : $(this).serialize(),
	    success: function(result){
				$('#callback').modal('hide');
				$('#success').modal('show');
				//console.log(result);
			}
		});
	});
  
  
	//Форма Заявка на комплексное оснащение  
	$('.zayavka_form').on('submit', function(e){
		console.log(e);
		e.preventDefault();
		empty_form();

		$.ajax({
	    type: 'POST',
	    url: '/include/mx/email.php',
	    data : $(this).serialize(),
	    success: function(result){
				$('#zayavka').modal('hide');
				$('#success').modal('show');
				//console.log(result);
			}
		});
	});
  
	//Форма Контакты  
	$('#contact_form').on('submit', function(e){
		console.log(e);
		e.preventDefault();
		empty_form();

		$.ajax({
	    type: 'POST',
	    url: '/include/mx/email.php',
	    data : $(this).serialize(),
	    success: function(result){
				$('#success').modal('show');
				//console.log(result);
			}
		});
	});
  

});
