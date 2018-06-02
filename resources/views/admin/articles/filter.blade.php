@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Статьи</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Статьи</li>
            </ol>
            <a href="{{ route('adminArticleAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить статью <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
            <form method="post" accept-charset="" action="{{ route('adminArticleSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по статьям" name="q" />
                <input type="submit" value="" />
            </form>
            <div class="clearfix"></div>
            <form method="post" accept-charset="" action="{{ route('adminArticleFilter') }}" id="h-search" name="searchFilter" class="pull-right">
                {{ csrf_field() }}
                <select name="filterStatus" class="filter-status">
                    <option>Статус</option>
                    <option value="0">Не отображать</option>
                    <option value="1">Отображать</option>
                </select>
            </form>
        </section>
        <div class="clearfix"></div>
        @if(session('status'))
            <div class="my-alert-block">
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <section class="content">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Короткое описание</th>
                    <th>Изображение</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                @if(count($articles) > 0)
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>#{{ $article->id }}</td>
                        <td><a href="{{ route('adminArticleEdit', ['id' => $article->id]) }}">{{ $article->title }}</a></td>
                        <td>{{ $article->short_content }}</td>
                        <td><img class="admin-list-image" src="{{ asset("img/articles/{$article->image}") }}" alt="{{ $article->title }}" title="{{ $article->title }}" /></td>
                        <td>{{ $article->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                        <td class="action-admin">
                            <a href="{{ route('adminArticleDelete', ['id' => $article->id]) }}" onclick="return confirm('Вы действительно хотите удалить эту статью?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a href="{{ route('adminArticleEdit', ['id' => $article->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            @if(count($articles) === 0)
                <h4>Фильтрация не дала результатов.</h4>
            @endif
            <div class="paginate-admin">
                {{ $articles->render() }}
            </div>
        </section>
    </div>
@show
@include('admin.layouts.section.footer')