@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление категории: {{ $category->title }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminCategoryIndex') }}">Категории</a></li>
                <li class="active">Обновление категории: {{ $category->title }}</li>
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
            <form action="{{ route('adminCategoryUpdate', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="titleCategory">Название</label>
                    <input type="text" class="form-control" id="titleCategory" minlength="2" maxlength="255" name="title" placeholder="Название" required value="{{ $category->title }}" />
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" {{ $category->status ? 'checked' : '' }} /> Отображать
                    </label>
                </div>
                <div class="form-group">
                    <label for="aliasCategory">Ссылка</label>
                    <input type="text" class="form-control" id="aliasCategory" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required value="{{ $category->alias }}" />
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')