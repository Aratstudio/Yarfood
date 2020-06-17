//проверка на ботов
function empty_form(){
	$('input[name=phrase]').val('megasecret');
}

$(document).ready(function(){

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
