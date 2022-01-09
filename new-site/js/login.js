$(document).ready(function(){
	$("#formLogin").on("submit", function(e) {
		e.preventDefault();
		$("#authErrors").text("");
		$('.incorrectEmail').addClass('hidden');
		$('.incorrectPass').addClass('hidden');
		//здесь можно допилить подсветку полей с ошибкой
		if ($(this).find('[name="username"]').val().length < 1 && $(this).find('[name="password"]').val().length < 1) {
			$('.incorrectEmail').removeClass('hidden');
			$('.incorrectPass').removeClass('hidden');
			return false;
		}
		if ($(this).find('[name="username"]').val().length < 1) {
			$('.incorrectEmail').removeClass('hidden');
			return false;
		}
		if ($(this).find('[name="password"]').val().length < 1) {
			$('.incorrectPass').removeClass('hidden');
			return false;
		}

		$.ajax({
			type: "POST",
			cache: false,
			data: $(this).serializeArray(),
			beforeSend: function(){				
				$('#formLogin').find('[type="submit"]').prop("disabled", true);
			},

			success: function(data) {
					
				var errMessage = $(data).find("#authErrors").text();
			
				if(errMessage == ""){
					window.location = $('#formLogin [name="returnUrl"]').val();
				} else{
					$(".incorrectEmail").removeClass('hidden').find('p').text(errMessage);
				}
			},
			
			complete: function(){
				$('#formLogin').find('[type="submit"]').removeAttr("disabled");
			}
		});

	});
});