@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление статьи: {{ $article->title }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminArticleIndex') }}">Статьи</a></li>
                <li class="active">Обновление статьи: {{ $article->title }}</li>
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
            <form action="{{ route('adminArticleUpdate', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="titleArticle">Название</label>
                    <input type="text" class="form-control" id="titleArticle" minlength="5" maxlength="255" name="title" placeholder="Название" required value="{{ $article->title }}" />
                </div>
                <div class="form-group">
                    <label for="shortTextArticle">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextArticle" minlength="3" name="short_text" placeholder="Короткий текст" value="{{ $article->short_text }}" />
                    <p class="help-block">Что-то что отражает суть статьи.</p>
                </div>
                <div class="form-group">
                    <label for="shortContentArticle">Короткое описание</label>
                    <textarea class="form-control" id="shortContentArticle"  name="short_content" minlength="5" maxlength="255" placeholder="Короткое описание" rows="5" required>{{ $article->short_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="fullContentArticle">Полное описание</label>
                    <textarea class="form-control" id="fullContentArticle" name="full_content" minlength="5" placeholder="Полное описание" rows="7" required>{{ $article->full_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imageArticle">Изображение</label>
                    <div class="clearfix"></div>
                    <img class="edit-image-admin" src="{{ asset("img/articles/{$article->image}") }}" alt="Rap-Time" title="Rap-Time" />
                    <div class="clearfix"></div>
                    <input type="file" id="imageArticle" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasArticle">Ссылка</label>
                    <input type="text" class="form-control" id="aliasArticle" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required value="{{ $article->alias }}" />
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group artist-group">
                    <label for="artistArticle">Исполнители</label>
                    <select id="artistArticle" class="form-control" multiple="multiple" name="artistArticle[]">
                        @foreach($article->artists as $artist)
                            <option value="{{ $artist->id }}" selected>{{ $artist->nickname }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="tagsArticle">Теги</label>
                    <select class="form-control" id="tagsArticle" multiple="multiple" name="tagsArticle[]">
                        @foreach($article->tags as $tag)
                            <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Теги добавлять через запятую или нажатием кнопки "Enter".</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" {{ $article->status ? 'checked' : '' }}/> Отображать
                    </label>
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoArticle">Title</label>
                    <input type="text" class="form-control" id="titleSeoArticle" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required value="{{ $article->description_seo }}" />
                </div>
                <div class="form-group">
                    <label for="descriptionSeoArticle">Description</label>
                    <textarea class="form-control" id="descriptionSeoArticle" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required>{{ $article->description_seo }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'fullContentArticle' );
</script>
@include('admin.layouts.section.footer')