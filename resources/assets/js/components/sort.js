$(document).ready(function(){

    // Sort
    $('.sort-item').on('click', function (e) {
       e.preventDefault();
       var sort = $(this).attr('data-sort');
       var by = $(this).attr('data-by');
       var url = window.location.pathname;
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'GET',
                data: {
                    'sort' : sort,
                    'by' : by
                },
                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut  (100);
                    var str = url + '?sort=' + sort + '&by=' + by;
                    history.pushState(null, null, str);
                },
                error: function (data) {
                    $('#load').fadeOut  (100);
                }
            });
        });
    });

});
