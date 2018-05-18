@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление интервью: {{ $interview->title }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminInterviewIndex') }}">Интервью</a></li>
                <li class="active">Обновление интервью: {{ $interview->title }}</li>
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
            <form action="{{ route('adminInterviewUpdate', ['id' => $interview->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="titleInterview">Название</label>
                    <input type="text" class="form-control" id="titleInterview" minlength="5" maxlength="255" name="title" placeholder="Название" required value="{{ $interview->title }}" />
                </div>
                <div class="form-group">
                    <label for="shortTextInterview">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextInterview" minlength="3" name="short_text" placeholder="Короткий текст" value="{{ $interview->short_text }}" />
                    <p class="help-block">Что-то что отражает суть интервью.</p>
                </div>
                <div class="form-group">
                    <label for="shortContentInterview">Короткое описание</label>
                    <textarea class="form-control" id="shortContentInterview"  name="short_content" minlength="5" maxlength="255" placeholder="Короткое описание" rows="5" required>{{ $interview->short_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="fullContentInterview">Полное описание</label>
                    <textarea class="form-control" id="fullContentInterview" name="full_content" minlength="5" placeholder="Полное описание" rows="7" required>{{ $interview->full_content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imageInterview">Изображение</label>
                    <div class="clearfix"></div>
                    <img class="edit-image-admin" src="{{ asset("img/interviews/{$interview->image}") }}" alt="Rap-Time" title="Rap-Time" />
                    <div class="clearfix"></div>
                    <input type="file" id="imageInterview" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasInterview">Ссылка</label>
                    <input type="text" class="form-control" id="aliasInterview" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required value="{{ $interview->alias }}" />
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group artist-group">
                    <label for="artistInterview">Исполнители</label>
                    <select id="artistInterview" class="form-control" multiple="multiple" name="artistInterview[]">
                        @foreach($interview->artists as $artist)
                            <option value="{{ $artist->id }}" selected>{{ $artist->nickname }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Введите имя исполнителя.</p>
                </div>
                <div class="form-group">
                    <label for="categoryInterview">Категория</label>
                    <select class="form-control" id="categoryInterview" name="category_id">
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
                        <input type="checkbox" name="status" {{ $interview->status ? 'checked' : '' }}/> Отображать
                    </label>
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoInterview">Title</label>
                    <input type="text" class="form-control" id="titleSeoInterview" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required value="{{ $interview->description_seo }}" />
                </div>
                <div class="form-group">
                    <label for="descriptionSeoInterview">Description</label>
                    <textarea class="form-control" id="descriptionSeoInterview" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required>{{ $interview->description_seo }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'fullContentInterview' );
</script>
@include('admin.layouts.section.footer')