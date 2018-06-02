@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Альбомы</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Альбомы</li>
            </ol>
            <a href="{{ route('adminAlbumAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить альбом <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
            <form method="post" accept-charset="" action="{{ route('adminAlbumSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по альбомам" name="q" />
                <input type="submit" value="" />
            </form>
            <div class="clearfix"></div>
            <form method="post" accept-charset="" action="{{ route('adminAlbumFilter') }}" id="h-search" name="searchFilter" class="pull-right">
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
                    <th>Исполнитель</th>
                    <th>Альбом</th>
                    <th>Изображение</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                @if(count($albums) > 0)
                <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td>#{{ $album->id }}</td>
                        <td><a href="{{ route('adminAlbumEdit', ['id' => $album->id]) }}">{{ $album->artist_name }}</a></td>
                        <td><a href="{{ route('adminAlbumEdit', ['id' => $album->id]) }}">{{ $album->album_name }}</a></td>
                        <td><img class="admin-list-image" src="{{ asset("img/albums/$album->image") }}" alt="{{ $album->artist_name }} - {{ $album->album_name }}" title="{{ $album->artist_name }} - {{ $album->album_name }}" /></td>
                        <td>{{ $album->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                        <td class="action-admin">
                            <a href="{{ route('adminAlbumDelete', ['id' => $album->id]) }}" onclick="return confirm('Вы действительно хотите удалить этот альбом?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a href="{{ route('adminAlbumEdit', ['id' => $album->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            @if(count($albums) === 0)
                <h4>Фильтрация не дала результатов.</h4>
            @endif
            <div class="paginate-admin">
                {{ $albums->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')