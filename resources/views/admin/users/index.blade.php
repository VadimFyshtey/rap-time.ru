@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Пользователи</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Пользователи</li>
            </ol>
            <form method="post" accept-charset="" action="{{ route('adminUserSearch') }}" id="h-search" name="search-admin">
                {{ csrf_field() }}
                <input id='search' type="text" placeholder="Поиск по пользователям" name="q" />
                <input type="submit" value="" />
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
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Изображение</th>
                    <th>Роль</th>
                    <th>Бан</th>
                    <th>Комментарий</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>#{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img class="admin-list-image" src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" /></td>
                        <td>{{ $user->roles->name }}</td>
                        <td>{{ $user->is_banned === 0 ? 'Не забанен' : 'Забанен' }}</td>
                        <td>{{ $user->comment }}</td>
                        <td class="action-admin">
                            <a href="{{ route('adminUserDelete', ['id' => $user->id]) }}" onclick="return confirm('Вы действительно хотите удалить этого пользователя?')"><i class="glyphicon glyphicon-remove"></i></a>
                            <a href="{{ route('adminUserEdit', ['id' => $user->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-admin">
                {{ $users->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')