$(document).ready(function(){

    // Rating news
    $('.like-news').on('click', function(){

        var _token = $("input[name='_token']").val();
        var news_id = $(this).attr('data-news-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/news',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'news_id' : news_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

    // Rating artist
    $('.like-artist').on('click', function(){

        var _token = $("input[name='_token']").val();
        var artist_id = $(this).attr('data-artist-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/artist',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'artist_id' : artist_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

    // Rating albums
    $('.like-album').on('click', function(){

        var _token = $("input[name='_token']").val();
        var album_id = $(this).attr('data-album-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/album',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'album_id' : album_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

    // Rating articles
    $('.like-article').on('click', function(){

        var _token = $("input[name='_token']").val();
        var article_id = $(this).attr('data-article-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/article',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'article_id' : article_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

    // Rating interview
    $('.like-interview').on('click', function(){

        var _token = $("input[name='_token']").val();
        var interview_id = $(this).attr('data-interview-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/interview',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'interview_id' : interview_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

    // Rating lyrics
    $('.like-lyrics').on('click', function(){

        var _token = $("input[name='_token']").val();
        var lyrics_id = $(this).attr('data-lyrics-id');
        var rate = $(this).val();
        $('#load').fadeIn(200, function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/rating/lyrics',
                type: 'POST',
                data: {
                    '_token' : _token,
                    'lyrics_id' : lyrics_id,
                    'rate' : rate
                },

                success: function(html) {
                    $('body').html(html);
                    $('#load').fadeOut(100);
                },
                error: function (data) {
                    $('#load').fadeOut(100);
                }
            });
        });
    });

});
