@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Добавить альбом</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminAlbumIndex') }}">Альбомы</a></li>
                <li class="active">Добавить альбом</li>
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
            <form action="{{ route('adminAlbumCreate') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="artistNameAlbum">Название исполнителя (группи)</label>
                    <input type="text" class="form-control" id="artistNameAlbum" minlength="1" maxlength="255" name="artist_name" placeholder="Название исполнителя (группи)" required/>
                </div>
                <div class="form-group">
                    <label for="albumNameAlbum">Название альбома</label>
                    <input type="text" class="form-control" id="albumNameAlbum" minlength="1" maxlength="255" name="album_name" placeholder="Название альбома" required/>
                </div>
                <div class="form-group">
                    <label for="shortTextAlbum">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextAlbum" minlength="3" name="short_text" placeholder="Короткий текст" />
                    <p class="help-block">Что-то что отражает суть альбома.</p>
                </div>
                <div class="form-group">
                    <label for="shortContentAlbum">Короткое описание</label>
                    <textarea class="form-control" id="shortContentAlbum"  name="short_content" minlength="5" maxlength="255" placeholder="Короткое описание" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fullContentAlbum">Полное описание</label>
                    <textarea class="form-control" id="fullContentAlbum" name="full_content" minlength="5" placeholder="Полное описание" rows="7" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imageAlbum">Изображение</label>
                    <input type="file" id="imageAlbum" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasAlbum">Ссылка</label>
                    <input type="text" class="form-control" id="aliasAlbum" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required/>
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group">
                    <label for="artistAlbum">Исполнители</label>
                    <select id="artistAlbum" class="form-control" multiple="multiple" name="artistAlbum[]"></select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="categoryAlbum">Категория</label>
                    <select class="form-control" id="categoryAlbum" name="category_id">
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
                <hr />
                <h4>Ссылки на скачивание</h4>
                <div class="form-group">
                    <label for="linkFirstAlbum">Первая ссылка</label>
                    <input type="text" class="form-control" id="linkFirstAlbum" minlength="5" maxlength="255" name="link_first" placeholder="Первая ссылка" />
                </div>
                <div class="form-group">
                    <label for="linkSecondAlbum">Вторая ссылка</label>
                    <input type="text" class="form-control" id="linkSecondAlbum" minlength="5" maxlength="255" name="link_second" placeholder="Вторая ссылка" />
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoAlbum">Title</label>
                    <input type="text" class="form-control" id="titleSeoAlbum" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required/>
                </div>
                <div class="form-group">
                    <label for="descriptionSeoAlbum">Description</label>
                    <textarea class="form-control" id="descriptionSeoAlbum" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'fullContentAlbum' );
</script>
@include('admin.layouts.section.footer')