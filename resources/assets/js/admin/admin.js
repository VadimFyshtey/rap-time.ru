$(document).ready(function(){


    // Search
    $('form[name=search-admin]').on('submit', function (e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var search = $("#search").val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=search-admin]').attr('action') + '?q=' + search,
                type: 'get',
                data: {
                    '_token' : _token,
                    'q' : search
                },

                success: function(html) {
                    var str =$('form[name=search-admin]').attr('action') + '?q=' + search;
                    history.pushState(null, null, str);
                    $('#load').fadeOut(100);
                    $('body').html(html);
                },
                error: function () {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

});