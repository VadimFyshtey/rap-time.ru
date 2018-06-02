@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Поиск по интервью: {{ $q }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminInterviewIndex') }}">Интервью</a></li>
                <li class="active">Поиск по интервью: {{ $q }}</li>
            </ol>
            <a href="{{ route('adminInterviewAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить интервью <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
            <form method="post" accept-charset="" action="{{ route('adminInterviewSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по интервью" name="q" />
                <input type="submit" value="" />
            </form>
        </section>
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
                @if(count($interviews) > 0)
                <tbody>
                @foreach($interviews as $interview)
                    <tr>
                        <td>#{{ $interview->id }}</td>
                        <td><a href="{{ route('adminInterviewEdit', ['id' => $interview->id]) }}">{{ $interview->title }}</a></td>
                        <td>{{ $interview->short_content }}</td>
                        <td><img class="admin-list-image" src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}" /></td>
                        <td>{{ $interview->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                        <td class="action-admin">
                            <a href="{{ route('adminInterviewDelete', ['id' => $interview->id]) }}" onclick="return confirm('Вы действительно хотите удалить это интервью?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a href="{{ route('adminInterviewEdit', ['id' => $interview->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
            @if(count($interviews) === 0)
                <h4>Поиск не дал результатов.</h4>
            @endif
            <div class="paginate-admin">
                {{ $interviews->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')