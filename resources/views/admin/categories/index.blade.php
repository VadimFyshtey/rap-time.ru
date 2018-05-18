@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Категории</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Категории</li>
            </ol>
            <a href="{{ route('adminCategoryAdd') }}" class="btn-add-post">
                <button class="btn btn-success">
                    Добавить категорию <i class="glyphicon glyphicon-plus"></i>
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
                    <th>Статус</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>#{{ $category->id }}</td>
                    <td><a href="{{ route('adminCategoryEdit', ['id' => $category->id]) }}">{{ $category->title }}</a></td>
                    <td>{{ $category->status === 0 ? 'Не отображать' : 'Отображать' }}</td>
                    <td class="action-admin">
                        <a href="{{ route('adminCategoryDelete', ['id' => $category->id]) }}" onclick="return confirm('Вы действительно хотите удалить эту категорию?')"><i class="glyphicon glyphicon-remove"></i></a>
                        <a href="{{ route('adminCategoryEdit', ['id' => $category->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-admin">
                {{ $categories->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')