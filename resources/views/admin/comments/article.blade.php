@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h2>Комментарии к статьям</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li class="active">Комментарии к статьям</li>
            </ol>
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
                    <th>Текст</th>
                    <th>ID родителя</th>
                    <th>Статья</th>
                    <th>Пользователь</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>#{{ $comment->id }}</td>
                        <td>{{ $comment->text }}</td>
                        <td>{{ $comment->parent_id }}</td>
                        <td><a href="{{ route('articleView', ['alias' => $comment->articles->alias, 'id' => $comment->articles->id]) }}" rel="nofollow" target="_blank">{{ $comment->articles->title }}</a></td>
                        <td><a href="{{ route('adminUserEdit', ['id' => $comment->user->id]) }}" target="_blank" rel="nofollow">{{ $comment->user->name }}</a></td>
                        <td class="action-admin">
                            <a href="{{ route('adminCommentArticleDelete', ['id' => $comment->id]) }}" onclick="return confirm('Вы действительно хотите удалить этот комментарий?')"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="paginate-admin">
                {{ $comments->render() }}
            </div>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')