$(document).ready(function(){

    // fixed menu
    $(window).scroll(function(){
        var docscroll = $(document).scrollTop();
        if( docscroll > 400  ){
            $('.wrapper').addClass('fixed');
        }else{
            $('.wrapper').removeClass('fixed');
        }
    });

    // login
    $('form[name=form-login]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-login']").val();
        var password = $("input[name='password-login']").val();
        var remember = $("input[name='remember']:checked").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                '_token' : _token,
                'email' : email,
                'password' : password,
                'remember' : remember

            },

            success: function(data) {
                location.reload();
            },
            error: function (data) {
                printErrorMsg(data.responseJSON.errors);
            }
        });
    });

    // register
    $('form[name=form-register]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-register']").val();
        var password = $("input[name='password-register']").val();
        var password_confirmation = $("input[name='password-confirmation-register']").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                '_token' : _token,
                'email' : email,
                'password' : password,
                'password_confirmation' : password_confirmation
            },

            success: function(data) {
                location.reload();
            },
            error: function (data) {
                printErrorMsg(data.responseJSON.errors);
            }
        });
    });

    // forgot password
    $('form[name=form-forgot]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var email = $("input[name='email-forgot']").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                '_token' : _token,
                'email' : email
            },

            success: function(data) {
                var arr = ['Сообщение отплавлено вам на почту.'];
                printErrorMsg(arr);
                $(".print-error-msg").css('border','1px solid green');
                setTimeout( function () {
                    location.reload();
                },2000);
            },
            error: function (data) {
                printErrorMsg(data.responseJSON.errors);
            }
        });
    });

    // print error
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
});
