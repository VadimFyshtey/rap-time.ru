@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Тексты песен</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Тексты песен</li>
            </ol>
            <a href="{{ route('adminLyricsAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить текст песни <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
            <form method="post" accept-charset="" action="{{ route('adminLyricsSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по текстам" name="q" />
                <input type="submit" value="" />
            </form>
            <div class="clearfix"></div>
            <form method="post" accept-charset="" action="{{ route('adminLyricsFilter') }}" id="h-search" name="searchFilter" class="pull-right">
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
                    <th>Название песни</th>
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                @if(count($lyrics) > 0)
                <tbody>
                @foreach($lyrics as $item)
                    <tr>
                        <td>#{{ $item->id }}</td>
                        <td><a href="{{ route('adminLyricsEdit', ['id' => $item->id]) }}">{{ $item->artist_name }}</a></td>
                        <td>{{ $item->lyrics_name }}</td>
                        <td>{{ $item->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                        <td class="action-admin">
                            <a href="{{ route('adminLyricsDelete', ['id' => $item->id]) }}" onclick="return confirm('Вы действительно хотите удалить этот текст песни?')">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                            <a href="{{ route('adminLyricsEdit', ['id' => $item->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            @if(count($lyrics) === 0)
                <h4>Фильрация не дала результатов.</h4>
            @endif
            <div class="paginate-admin">
                {{ $lyrics->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')