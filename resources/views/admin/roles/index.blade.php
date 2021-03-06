@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Роли</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Роли</li>
            </ol>
            <a href="{{ route('adminRoleAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить роль <i class="glyphicon glyphicon-plus"></i>
                </button>
            </a>
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
                    <th>Описание</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>#{{ $role->id }}</td>
                    <td><a href="{{ route('adminRoleEdit', ['id' => $role->id]) }}">{{ $role->name }}</a></td>
                    <td>{{ $role->description }}</td>
                    <td class="action-admin">
                        <a href="{{ route('adminRoleDelete', ['id' => $role->id]) }}" onclick="return confirm('Вы действительно хотите удалить эту роль?')"><i class="glyphicon glyphicon-remove"></i></a>
                        <a href="{{ route('adminRoleEdit', ['id' => $role->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-admin">
                {{ $roles->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')