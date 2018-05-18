$(document).ready(function(){

    // Categories
    $('#categoryLyrics').select2({
        placeholder: "Выберите категорию",
        allowClear: true
    });

    // Artists
    $('#artistLyrics').select2({
        placeholder: "Выберите исполнителей",
        ajax : {
            url : '/api/artists',
            dataType : 'json',
            delay : 100,
            data : function(params){
                return {
                    q : params.term,
                    page : params.page
                };
            },
            processResults : function(data, params){
                params.page = params.page || 1;
                return {
                    results : data.data,
                    pagination: {
                        more : (params.page  * 10) < data.total
                    }
                };
            }
        },
        minimumInputLength : 1,
        templateResult : function (repo)
        {
            if(repo.loading) {
                return repo.nickname;
            }
            var markup = "<img class='select-artist-image' src="+ '/img/artists/' + repo.image+" /> &nbsp; "+ repo.nickname;
            return markup;
        },
        templateSelection : function(repo)
        {
            return repo.nickname || repo.text;
        },
        escapeMarkup : function(markup)
        {
            return markup;
        }
    });

});

