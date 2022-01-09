$('#createOrder').click(function() {
	$.ajax({
		url: 'new-site/assets/add-evac/assets/connector.php',
		type: "POST",
		cache: false,
		data: {id: $('[name="id"]').val(), action: 'order/create', month: $('[name="month"]:checked').val()},
		beforeSend: function(){				
			$('#createOrder').prop("disabled", true);
		},

		success: function(data) {
				data = JSON.parse(data);
				if(data.success) {
					$(body).append(data.data.form);
					setTimeout(() => {
						$('#liqpay').submit();
					}, 1)
				}
		},
		
		complete: function(){
			$('#createOrder').removeAttr("disabled");
		}
	});
})

$('#createOrderByBalance').click(function() {
	$.ajax({
		url: 'new-site/assets/add-evac/assets/connector.php',
		type: "POST",
		cache: false,
		data: {id: $('[name="id"]').val(), action: 'order/createByBalance', month: $('[name="month"]:checked').val()},
		beforeSend: function(){				
			$('#createOrderByBalance').prop("disabled", true);
		},
		success: function(data) {
			data = JSON.parse(data);
			if (data.data.type == 'balance') {
			    $('#paymentError').show();
			}
			if (data.data.type == 'redirect') {
			    {window.location = data.data.link}
			}
		},
		complete: function(){
			$('#createOrderByBalance').removeAttr("disabled");
		}
	});
})

$(document).on('click', '.modalClose', function(){
    $(this).parents('.popup').hide();
})