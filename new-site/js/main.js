$(document).ready(function() {
	let cookieAccept = localStorage.getItem('cookie-accept') || 0;
	if(cookieAccept === 0) {
		$('.cookie-accept').show();
	}
	$('.accept-cookie').click(() => {
		$('.cookie-accept').hide();
		localStorage.setItem('cookie-accept', 1);
	});
	if(typeof AjaxForm != 'undefined') {
		AjaxForm.Message.success = function() {};
		AjaxForm.Message.info = function() {};
		AjaxForm.Message.error = function() {};		
	}

	$(document).on('click', '.disable-evac', function(e) {
		e.preventDefault();
		let self = $(this);
	    $.ajax({
	        type: 'POST',
	        url: 'new-site/assets/add-evac/assets/connector.php',
	        data: {action: 'product/disable', id: $(this).data('id')},
	        success: function(response){
			    let text = self.data('enable');
			    self.find('span').text(text);
			    self.removeClass('disable-evac').addClass('enable-evac');
			    self.parent().next().addClass('hidden');
		  	},
		  	error: (response) => {
		  		alert('Error disabled');
		  	}
	    });
	})

	$(document).on('click', '.enable-evac', function(e) {
		e.preventDefault();
		let self = $(this);
	    $.ajax({
	        type: 'POST',
	        url: 'new-site/assets/add-evac/assets/connector.php',
	        data: {action: 'product/enable', id: $(this).data('id')},
	        success: function(response){
				let text = self.data('disable');
			    self.find('span').text(text);
			    self.removeClass('enable-evac').addClass('disable-evac');
			    self.parent().next().removeClass('hidden');		  	},
		  	error: (response) => {
		  		alert('Error enable');
		  	}
	    });
	})

})