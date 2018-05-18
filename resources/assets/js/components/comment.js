$(document).ready(function(){

    $('form[name=comment-form]').on('submit', function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var comment_post_ID = $("input[name='comment_post_ID']").val();
        var comment_parent = $("input[name='comment_parent']").val();
        var user_id = $("input[name='user_id']").val();
        var text = $("textarea[name='text']").val();

        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $('form[name=comment-form]').attr('action'),
                type: 'POST',
                data: {
                    '_token' : _token,
                    'comment_post_ID' : comment_post_ID,
                    'comment_parent' : comment_parent,
                    'user_id' : user_id,
                    'text' : text
                },
                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut  (100);
                },
                error:function() {
                    $('#load').fadeOut  (100);
                }
            });
        });

    });
});