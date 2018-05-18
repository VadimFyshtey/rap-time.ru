$(document).ready(function(){

    // Login
    $('form[name=form-login]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-login']").val();
        var password = $("input[name='password-login']").val();
        var remember = $("input[name='remember']:checked").val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=form-login]').attr('action'),
                type: 'POST',
                data: {
                    '_token' : _token,
                    'email' : email,
                    'password' : password,
                    'remember' : remember

                },

                success: function(data) {
                    $('#load').fadeOut(100);
                    location.reload();
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                    printErrorMsg(data.responseJSON.errors);
                }
            });
        });
    });

// Registration
    $('form[name=form-register]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-register']").val();
        var password = $("input[name='password-register']").val();
        var password_confirmation = $("input[name='password-confirmation-register']").val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=form-register]').attr('action'),
                type: 'POST',
                data: {
                    '_token' : _token,
                    'email' : email,
                    'password' : password,
                    'password_confirmation' : password_confirmation
                },
                success: function(data) {
                    $('#load').fadeOut(100);
                    location.reload();
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                    printErrorMsg(data.responseJSON.errors);
                }
            });
        });
    });

// Forgot password
    $('form[name=form-forgot]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-forgot']").val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=form-forgot]').attr('action'),
                type: 'POST',
                data: {
                    '_token' : _token,
                    'email' : email
                },

                success: function(data) {
                    $('#load').fadeOut(100);
                    var arr = ['Сообщение отправлено вам на почту.'];
                    printErrorMsg(arr);
                    $(".print-error-msg").css('box-shadow','0 0 0 1px green');
                    setTimeout( function () {
                        location.reload();
                    },2000);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                    printErrorMsg(data.responseJSON.errors);
                }
            });
        });
    });

// Contact
    $('form[name=form-contact]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='contactEmail']").val();
        var subject = $("input[name='contactSubject']").val();
        var text = $("textarea[name='contactText']").val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=form-contact]').attr('action'),
                type: 'POST',
                data: {
                    '_token' : _token,
                    'email' : email,
                    'subject' : subject,
                    'text' : text
                },

                success: function(data) {
                    $('#load').fadeOut(100);
                    var arr = ['Сообщение отправлено.'];
                    printErrorMsg(arr);
                    $(".print-error-msg").css('box-shadow','0 0 0 1px green');
                    setTimeout( function () {
                        location.reload();
                    },2000);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                    printErrorMsg(data.responseJSON.errors);
                }
            });
        });
    });

    // Print error function
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

});


