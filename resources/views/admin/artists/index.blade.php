@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Исполнители</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Исполнители</li>
            </ol>
            <a href="{{ route('adminArtistAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить исполнителя <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
            <form method="post" accept-charset="" action="{{ route('adminArtistSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по исполнителям" name="q" />
                <input type="submit" value="" />
            </form>
            <div class="clearfix"></div>
            <form method="post" accept-charset="" action="{{ route('adminArtistFilter') }}" id="h-search" name="searchFilter" class="pull-right">
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
                    <th>Изображение</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($artists as $artist)
                <tr>
                    <td>#{{ $artist->id }}</td>
                    <td><a href="{{ route('adminArtistEdit', ['id' => $artist->id]) }}">{{ $artist->nickname }}</a></td>
                    <td><img class="admin-list-image" src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" /></td>
                    <td>{{ $artist->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                    <td class="action-admin">
                        <a href="{{ route('adminArtistDelete', ['id' => $artist->id]) }}" onclick="return confirm('Вы действительно хотите удалить исполнителя(группу)?')"><i class="glyphicon glyphicon-remove"></i></a>
                        <a href="{{ route('adminArtistEdit', ['id' => $artist->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-admin">
                {{ $artists->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')