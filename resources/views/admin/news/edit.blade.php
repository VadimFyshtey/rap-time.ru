@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление новости: {{ $news->title }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminNewsIndex') }}">Новости</a></li>
                <li class="active">Обновление новости: {{ $news->title }}</li>
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
            <form action="{{ route('adminNewsUpdate', ['id' => $news->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="titleNews">Название</label>
                    <input type="text" class="form-control" id="titleNews" minlength="5" maxlength="255" name="title" placeholder="Название" required value="{{ $news->title }}" />
                </div>
                <div class="form-group">
                    <label for="shortTextNews">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextNews" minlength="3" name="short_text" placeholder="Короткий текст" value="{{ $news->short_text }}" />
                    <p class="help-block">Что-то что отражает суть новости.</p>
                </div>
                <div class="form-group">
                    <label for="shortContentNews">Короткое описание</label>
                    <textarea class="form-control" id="shortContentNews"  name="short_content" minlength="5" maxlength="255" placeholder="Короткое описание" rows="5" required>{{ $news->short_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="fullContentNews">Полное описание</label>
                    <textarea class="form-control" id="fullContentNews" name="full_content" minlength="5" placeholder="Полное описание" rows="7" required>{{ $news->full_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imageNews">Изображение</label>
                    <div class="clearfix"></div>
                    <img class="edit-image-admin" src="{{ asset("img/news/{$news->image}") }}" alt="Rap-Time" title="Rap-Time" />
                    <div class="clearfix"></div>
                    <input type="file" id="imageNews" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasNews">Ссылка</label>
                    <input type="text" class="form-control" id="aliasNews" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required value="{{ $news->alias }}" />
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group artist-group">
                    <label for="artistNews">Исполнители</label>
                    <select id="artistNews" class="form-control" multiple="multiple" name="artistNews[]">
                        @foreach($news->artists as $artist)
                            <option value="{{ $artist->id }}" selected>{{ $artist->nickname }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="tagsNews">Теги</label>
                    <select class="form-control" id="tagsNews" multiple="multiple" name="tagsNews[]">
                        @foreach($news->tags as $tag)
                            <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Теги добавлять через запятую или нажатием кнопки "Enter".</p>
                </div>
                <div class="form-group">
                    <label for="categoryNews">Категория</label>
                    <select class="form-control" id="categoryNews" name="category_id">
                        <option value="{{ $category ? $category->id : '' }}" {{ $category ? 'selected disabled' : '' }}>
                            {{ $category ? $category->title : '' }}
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" {{ $news->status ? 'checked' : '' }} /> Отображать
                    </label>
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoNews">Title</label>
                    <input type="text" class="form-control" id="titleSeoNews" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required value="{{ $news->description_seo }}" />
                </div>
                <div class="form-group">
                    <label for="descriptionSeoNews">Description</label>
                    <textarea class="form-control" id="descriptionSeoNews" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required>{{ $news->description_seo }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'fullContentNews' );
</script>
@include('admin.layouts.section.footer')