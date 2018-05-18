$(document).ready(function(){

    // Fixed menu
    $(window).scroll(function(){
        var docscroll = $(document).scrollTop();
        if( docscroll > 400  ){
            $('.wrapper').addClass('fixed');
        }else{
            $('.wrapper').removeClass('fixed');
        }
    });

});
