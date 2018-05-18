@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Добавить интервью</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminInterviewIndex') }}">Интервью</a></li>
                <li class="active">Добавить интервью</li>
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
            <form action="{{ route('adminInterviewCreate') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="titleInterview">Название</label>
                    <input type="text" class="form-control" id="titleInterview" minlength="5" maxlength="255" name="title" placeholder="Название" required/>
                </div>
                <div class="form-group">
                    <label for="shortTextInterview">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextInterview" minlength="3" name="short_text" placeholder="Короткий текст" />
                    <p class="help-block">Что-то что отражает суть интервью.</p>
                </div>
                <div class="form-group">
                    <label for="shortContentInterview">Короткое описание</label>
                    <textarea class="form-control" id="shortContentInterview"  name="short_content" minlength="5" maxlength="255" placeholder="Короткое описание" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fullContentInterview">Полное описание</label>
                    <textarea class="form-control" id="fullContentInterview" name="full_content" minlength="5" placeholder="Полное описание" rows="7" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imageInterview">Изображение</label>
                    <input type="file" id="imageInterview" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasInterview">Ссылка</label>
                    <input type="text" class="form-control" id="aliasInterview" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required/>
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group">
                    <label for="artistInterview">Исполнители</label>
                    <select id="artistInterview" class="form-control" multiple="multiple" name="artistInterview[]"></select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="categoryInterview">Категория</label>
                    <select class="form-control" id="categoryInterview" name="category_id">
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
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoInterview">Title</label>
                    <input type="text" class="form-control" id="titleSeoInterview" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required/>
                </div>
                <div class="form-group">
                    <label for="descriptionSeoInterview">Description</label>
                    <textarea class="form-control" id="descriptionSeoInterview" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'fullContentInterview' );
</script>
@include('admin.layouts.section.footer')