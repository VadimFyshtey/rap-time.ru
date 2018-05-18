@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Обновление роли: {{ $role->name }}</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminRoleIndex') }}">Роли</a></li>
                <li class="active">Обновление роли: {{ $role->name }}</li>
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
            <form action="{{ route('adminRoleUpdate', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nameRole">Название</label>
                    <input type="text" class="form-control" id="nameRole" minlength="2" maxlength="255" name="name" placeholder="Название" required value="{{ $role->name }}"/>
                </div>
                <div class="form-group">
                    <label for="descriptionRole">Описание</label>
                    <textarea class="form-control" id="descriptionRole" name="description"  minlength="2" maxlength="255" placeholder="Описание" rows="3" required>{{ $role->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </section>

    </div>
@show

@include('admin.layouts.section.footer')