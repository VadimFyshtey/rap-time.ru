@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление пользователя: {{ $user->name ? $user->name : $user->email }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminUserIndex') }}">Пользователи</a></li>
                <li class="active">Обновление пользователя: {{ $user->name ? $user->name : $user->email }}</li>
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
            <form action="{{ route('adminUserUpdate', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nameUser">Имя</label>
                    <input type="text" class="form-control" id="nameUser" minlength="3" maxlength="255" name="name" placeholder="Имя" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="emailUser">Email</label>
                    <input type="text" class="form-control" id="emailUser" minlength="3" name="email" placeholder="Email" value="{{ $user->email }}" />
                    <p class="help-block">Не изменять без веской причины.</p>
                </div>
                <div class="form-group">
                    <label for="avatarUser">Изображение</label>
                    <div class="clearfix"></div>
                    <img class="edit-image-admin" src="{{ asset($user->avatar) }}" alt="Rap-Time" />
                    <div class="clearfix"></div>
                    <input type="file" id="avatarUser" name="avatar" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="roleUser">Роль</label>
                    <select class="form-control" id="roleUser" name="role_id">
                        <option value="{{ $user->roles->id }}" selected >
                            {{ $user->roles->name }}
                        </option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_banned" {{ $user->is_banned ? 'checked' : '' }}/> Забанен
                    </label>
                </div>
                <div class="form-group">
                    <label for="commentUser">Комментарий</label>
                    <textarea class="form-control" id="commentUser" name="comment"  minlength="3" maxlength="255" placeholder="Комментарий" rows="3" >{{ $user->comment }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show
@include('admin.layouts.section.footer')