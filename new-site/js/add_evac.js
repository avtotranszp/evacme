window.productId = $('#createForm [name="id"]').val() || '';
Dropzone.options.dropzone = {
	autoProcessQueue: $('#createForm [name="id"]').length > 0,
	acceptedFiles: 'image/jpg,image/jpeg,image/png',
	maxFilesize: 3,
	addRemoveLinks: true,
	sending: function(file, xhr, formData){
        formData.append('pid', window.productId);
        formData.append('action', 'gallery/upload');
    },
    init: function () {
	    this.on("complete", function (file) {
	      if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0 && window.redirect) {
	        window.location.href = $('#createForm [name="successUrl"]').val() + '?id=' + window.productId;
	      }
	    });
	    this.on("processing", function() {
            this.options.autoProcessQueue = true;
        });
    },
    removedfile: function(file) {
    	if(window.productId) {
		    var name = file.name;      
            $.ajax({
                type: 'POST',
                url: 'new-site/assets/add-evac/assets/connector.php',
                data: {action: 'gallery/delete', name: name, pid: window.productId, id: file.id},
            });
		}
		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
    }
};


Dropzone.prototype.defaultOptions.dictDefaultMessage           = "Нажмите или перетащите сюда изображение для загрузки.";
Dropzone.prototype.defaultOptions.dictFallbackMessage          = "Ваш браузер не поддерживает загрузку файлов перетаскиванием.";
Dropzone.prototype.defaultOptions.dictFileTooBig 	           = "Изображение слишком большое ({{filesize}}МБ). Максимальный размер: {{maxFilesize}}МБ.";
Dropzone.prototype.defaultOptions.dictInvalidFileType          = "Вы не можете загружать файлы этого типа.";
Dropzone.prototype.defaultOptions.dictResponseError            = "Server responded with {{statusCode}} code.";
Dropzone.prototype.defaultOptions.dictCancelUpload             = "Отменить загрузку";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Вы уверены, что хотите отменить эту загрузку?";
Dropzone.prototype.defaultOptions.dictRemoveFile               = "Удалить файл";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded         = "Вы не можете больше загружать файлы.";

$(document).ready(function () {
	
	if($('[name="dataJson"]').length !== 0) {
		let data = JSON.parse($('[name="dataJson"]').val());
		for(name in data) {
			let input = $('input[name="'+name+'"]');
			let select = $('select[name="'+name+'"]');
			if(input.length !== 0) {
				input.val(data[name]);
			}
			if(select.length !== 0) {
				select.val(data[name]);
				select.find('option[value="'+data[name]+'"]').prop('selected', 'selected');
				select.find('option:contains("'+data[name]+'")').prop('selected', 'selected');
			}
			if(name == 'area') {
				$('[name="parent2"] option[value="'+data[name]+'"]').prop('selected', 'selected');
				$('[name="parent2"] option:contains("'+data[name]+'")').prop('selected', 'selected');
				setTimeout(() => {
					$('[name="parent2"]').trigger('change');
				},1);
			}
		}
	}
	$(".select").select2();
	$("#showPhones").click(function () {
		$("#additionalPhones").slideDown();
		$("#additionalPhonesQuestion").slideUp();
	});

	$('[name="parent2"]').change(function() {
		$.post('new-site/assets/add-evac/assets/connector.php', {action: 'cite/get', area: $(this).val()}, (response) => {
			response = JSON.parse(response);
			$('[name="parent"]').html('');
			response.forEach((element) => {
				$('[name="parent"]').append('<option value="'+element.id+'">'+element.pagetitle+'</option>');
				if($('[name="dataJson"]').length !== 0) {
					let data = JSON.parse($('[name="dataJson"]').val());
					for(name in data) {
						if(name == 'city') {
							$('[name="parent"] option[value="'+data[name]+'"]').prop('selected', 'selected');
							$('[name="parent"] option:contains("'+data[name]+'")').prop('selected', 'selected');
						}
					}
				}
			})
		})
	})

	$('.price-inp input').on("change keyup input click", function() {
		if (this.value.match(/[^0-9]/g)) {
		    this.value = this.value.replace(/[^0-9]/g, '');
		}
		if(this.value == 0) {
		    this.value = '';
		}
	});

	$('.phone input').on('change', function() {

		if(!checkNumber($(this).val()) && $(this).val() != '') {
			$(this).parent().next().removeClass('hidden').find('p').text('Некорректный номер телефона.');
		} else {
			$(this).parent().next().addClass('hidden');
		}
	})

	function checkNumber(AStr) {
		AStr = AStr.replace(/[\s\-]/g, '');
		return AStr.match(/^((\+?3)?8)?((0\(\d{2}\)?)|(\(0\d{2}\))|(0\d{2}))\d{7}$/) != null;
	}

	var wordCountConf2 = {
	    showParagraphs: false,
	    showWordCount: true,
	    showCharCount: true,
	    countSpacesAsChars: false,
	    countHTML: false,
	    maxWordCount: -1,
	    maxCharCount: 3000
	};
    CKEDITOR.replace( 'info', {
        language: $('html').prop('lang'),
        wordcount: wordCountConf2
    });
	var info = CKEDITOR.instances['info'].getData();
	$('#info').val(info);
	
	var globalError = false;
	$('#createForm').submit(function(e) {
		e.preventDefault();
		
		if(globalError) {
		    return false;
		}
		var valid = true;
	    if(checkCity() == false) {
	        return false;
	    }
	    if($('[name="pagetitle"]').val().length > 70) {
	        valid = false;
	        $('[name="pagetitle"]').parent().next().removeClass('hidden').find('p').text('Максимальная длинна заголовка 70 символов')
	    } else {
	        $('[name="pagetitle"]').parent().next().addClass('hidden')
	    }
		$('.req').each((i, el) => {
			if($(el).find('input, select').val() == '') {
				valid = false;
				$(el).find('.error').removeClass('hidden').find('p').text('Это поле обязательно к заполнению.');
			} else {
				$(el).find('.error').addClass('hidden');
			}
		})
		if(!valid) {
		    $('html, body').animate({
		        scrollTop: $("#createForm").offset().top  // класс объекта к которому приезжаем
		    }, 1000); // Скорость прокрутки
			return false;
		}

		let form = new FormData(document.forms.create);
		$('#createForm button[type="submit"]').prop('disabled', true);
		$.ajax({
		  url: 'new-site/assets/add-evac/assets/connector.php',
		  data: form,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  success: function(response){
		      $('#createForm button[type="submit"]').prop('disabled', false);
		    response = JSON.parse(response);
		    if(window.productId) {
		    	window.location.href = $('#createForm [name="successUrl"]').val() + '?id=' + window.productId + '&updated=true';
		    } else {
		    	window.productId = response.data[0].id;
				window.redirect = true;
				var myDropzone = Dropzone.forElement("#dropzone");
				if(myDropzone.getUploadingFiles().length === 0) {
				    window.location.href = $('#createForm [name="successUrl"]').val() + '?id=' + window.productId + '&updated=true';
				}
	   			myDropzone.processQueue();
		    }
			
		  }
		});
	})
	$('#city, #area').change(function() {
	    checkCity();
	})
	$('[name="phone"], [name="phone_2"], [name="phone_3"]').change(function() {
	    checkPhone([$(this).prop('name')]);
	})
	
	function checkCity() {
	    if($('[name="id"]').length > 0) {
	        return true;
	    }
	    let city = $('#city').val();
	    if(city == '') {
	        city = $('#area').val();
	    }
	    let statusCity;
	    $.ajax({
		  url: 'new-site/assets/add-evac/assets/connector.php',
		  data: {'action' : 'product/limitCity', 'parent':city},
		  type: 'POST',
		  async: false,
		  success: function(response){
		    response = JSON.parse(response);
		    statusCity = response.status;
		    if(statusCity == false) {
    	        let city2 = '#city';
        	    if($(city2).val() == '') {
        	        city2 = '#area';
        	    }
    	        $(city2).parent().next().removeClass('hidden').find('p').text('Вы исчерпали лимит объявлений в данном городе');
		    }
		  }
		});
		return statusCity;
	}
	
	function checkPhone(phones = ['phone', 'phone_2', 'phone_3']) {
	    phones.forEach((element) => {
	        element = $('[name="'+element+'"]');
	        if(element.length > 0 && element.val() !== '') {
	            let number = element.val().replace(/[^+\d]/g, '');
	            $.post('new-site/assets/add-evac/assets/connector.php', {'action' : 'check-phone', 'phone' : number, 'id' : window.productId}, (response) => {
	               response = JSON.parse(response);
	               if(response.status == false) {
	                   globalError = true;
	                   element.parent().next().removeClass('hidden').find('p').text('Вы исчерпали лимит объявлений в данном городе');
	               } else {
	                   globalError = false;
	               }
	            });
	        }
	    })
	}
});