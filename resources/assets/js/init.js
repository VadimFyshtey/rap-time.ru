$(document).ready(function(){

    $('.carusel-artist').slick({
        adaptiveHeight: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<button class="slick-prev"><i class="glyphicon glyphicon-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="glyphicon glyphicon-chevron-right"></i></button>',
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 990,
            settings: {
                slidesToShow: 2,
                dots: false
            }
        }, {
            breakpoint: 536,
            settings: {
                slidesToShow: 1,
                dots: false
            }
        }]
    });

    $('.carusel-album').slick({
        adaptiveHeight: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<div class="slick-prev-album"><i class="glyphicon glyphicon-chevron-left"></i></div>',
        nextArrow: '<div class="slick-next-album"><i class="glyphicon glyphicon-chevron-right"></i></div>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    infinite: true,
                    dots: false
                }
            },{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                dots: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                dots: false
            }
        }]
    });

    // prevent default link register and login
    $('a[data-toggle=modal]').on('click', function (e) {
        e.preventDefault();
        e.currentTarget.href = '';
    });

    $('#modal-login').on('shown.bs.modal', function (e) {
        e.preventDefault();
        $("input[name='email-login']").focus();
        $(".print-error-msg").css('display', 'none');
        $(".print-error-msg").find("ul").html('');
        $('body').removeAttr("style");
        $('#modal-register').modal('hide');
        $('#modal-forgot').modal('hide');
        $('#myInput').focus();
    });

    $('#modal-register').on('shown.bs.modal', function (e) {
        e.preventDefault();
        $("input[name='email-register']").focus();
        $(".print-error-msg").css('display', 'none');
        $(".print-error-msg").find("ul").html('');
        $('body').removeAttr("style");
        $('#modal-login').modal('hide');
        $('#modal-forgot').modal('hide');
        $('#myInput').focus();
    });

    $('#modal-forgot').on('shown.bs.modal', function (e) {
        e.preventDefault();
        $("input[name='email-forgot']").focus();
        $(".print-error-msg").css('display', 'none');
        $(".print-error-msg").find("ul").html('');
        $('body').removeAttr("style");
        $('#modal-login').modal('hide');
        $('#modal-register').modal('hide');
        $('#myInput').focus();
    });

    $('#modal-contact').on('shown.bs.modal', function (e) {
        e.preventDefault();
        $("input[name='contactEmail']").focus();
        $(".print-error-msg").css('display', 'none');
        $(".print-error-msg").find("ul").html('');
        $('body').removeAttr("style");
    });

});

