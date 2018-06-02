@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Добавить текст песни</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminLyricsIndex') }}">Тексты песен</a></li>
                <li class="active">Добавить текст песни</li>
            </ol>
        </section>
        @if ($errors->any())
            <div class="my-alert-block">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <section class="content">
            <form action="{{ route('adminLyricsCreate') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="artistNameLyrics">Исполнитель</label>
                    <input type="text" class="form-control" id="artistNameLyrics" minlength="1" maxlength="255" name="artist_name" placeholder="Исполнитель или исполнители" required/>
                </div>
                <div class="form-group">
                    <label for="lyricsNameLyrics">Название песни</label>
                    <input type="text" class="form-control" id="lyricsNameLyrics" minlength="1" maxlength="255" name="lyrics_name" placeholder="Название песни" required/>
                </div>
                <div class="form-group">
                    <label for="textLyrics">Текст песни</label>
                    <textarea class="form-control" id="textLyrics" name="text" minlength="5" placeholder="Текст песни" rows="15" required></textarea>
                </div>
                <div class="form-group">
                    <label for="translateLyrics">Перевод песни</label>
                    <textarea class="form-control" id="translateLyrics" name="translate" minlength="5" placeholder="Перевод песни" rows="15"></textarea>
                    <p class="help-block">Перевод песни на русский язык, если нужно.</p>
                </div>
                <div class="form-group">
                    <label for="aliasLyrics">Ссылка</label>
                    <input type="text" class="form-control" id="aliasLyrics" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required/>
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group">
                    <label for="artistLyrics">Исполнители</label>
                    <select id="artistLyrics" class="form-control" multiple="multiple" name="artistLyrics[]"></select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="categoryLyrics">Категория</label>
                    <select class="form-control" id="categoryLyrics" name="category_id">
                        <option></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" /> Отображать
                    </label>
                </div>
                <div class="form-group">
                    <label for="videoUrlLyrics">Видео к песни</label>
                    <input type="text" class="form-control" id="videoUrlLyrics" minlength="5" maxlength="255" name="video_url" placeholder="Видео к песни" />
                    <p class="help-block">Ссылка на видео с Youtube.</p>
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoLyrics">Title</label>
                    <input type="text" class="form-control" id="titleSeoLyrics" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required/>
                </div>
                <div class="form-group">
                    <label for="descriptionSeoLyrics">Description</label>
                    <textarea class="form-control" id="descriptionSeoLyrics" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'textLyrics' );
    var editor2 = CKEDITOR.replace( 'translateLyrics' );
</script>
@include('admin.layouts.section.footer')