$(document).on('click', '.sendSms', function() {
    $.ajax({
        type: 'POST',
        url: '/new-site/assets/user/connector.php',
        data: {action: 'sms/send'},
        success: (response) => {
            response = JSON.parse(response);
            if(response.status) {
                $('.sendSms').prev().removeClass('hidden');
                $('.sendSms').text($('.sendSms').data('text')).removeClass('sendSms').addClass('verifySms');
            }
        }
    });
})

$(document).on('submit', '#user-settings', function() {
    $('[name="phone"]').val($('[name="phone"]').val().replace(/\D/g,""));
})

$(document).on('change', '[name="avatar"]', function() {
    $(".error-format").removeAttr('style');
    $(".error-size").removeAttr('style');
    var formData = new FormData();
    var file = $(this)[0].files[0];
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    
    if (!allowedExtensions.exec(file.name)) {
        $(".error-format").css('color', 'red');
        return false;
    }
    if(file.size > 5 * 1024 * 1024) {
        $(".error-size").css('color', 'red');
        return false; 
    }
    
    formData.append('avatar', file);
    formData.append('action', 'user/avatar');
    
    $.ajax({
        url : '/new-site/assets/user/connector.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
           // Image preview
            var reader = new FileReader();
            reader.onload = function(e) {
                $('[name="avatar"]').next().find('img').prop('src', e.target.result);
            };
              
            reader.readAsDataURL(file);
            
        }
    });
})

$(document).on('change', '[name="brand_logo"]', function() {
    $(".error-format").removeAttr('style');
    $(".error-size").removeAttr('style');
    var formData = new FormData();
    var file = $(this)[0].files[0];
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    
    if (!allowedExtensions.exec(file.name)) {
        $(".error-format").css('color', 'red');
        return false;
    }
    if(file.size > 5 * 1024 * 1024) {
        $(".error-size").css('color', 'red');
        return false; 
    }
    
    formData.append('brand_logo', file);
    formData.append('action', 'user/logo');
    
    $.ajax({
        url : '/new-site/assets/user/connector.php',
        type : 'POST',
        data : formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success : function(data) {
           // Image preview
            var reader = new FileReader();
            reader.onload = function(e) {
                $('[name="brand_logo"]').next().find('img').prop('src', e.target.result);
            };
              
            reader.readAsDataURL(file);
            
        }
    });
})

$(document).on('click', '.verifySms', function() {
    $.ajax({
        type: 'POST',
        url: '/new-site/assets/user/connector.php',
        data: {action: 'sms/verify', code: $('[name="code"]').val()},
        success: (response) => {
            response = JSON.parse(response);
            if(response.status) {
                $('.verifySms').remove();
                $('[name="code"]').remove();
                $('.verify-no').remove();
                $('.verify-yes').removeClass('hidden');
            }
        }
    });
})

// let tabLink = $(".tab-content-btn");
// let tabContent = $(".tab-content-block");
// tabLink.click(function () {
// 	let that = $(this);
// 	let idContent = "#" + that.data("target");

// 	tabLink.removeClass("tab-content-btn--active");
// 	that.addClass("tab-content-btn--active");

// 	tabContent.hide();
// 	$(idContent).show();
// });
