
<div class="wrapper">
    <div class="container">
        <header>
            <div class="col-lg-2 hidden-md hidden-sm hidden-xs logo pull-left">
                <a href="/"><img src="/img/logo.png" alt="" /></a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <nav class="navbar-default navbar-static-top" role="navigation">
                    <div class="navbar-brand hidden-lg">
                        <div class="col-xs-6 col-sm-8 col-md-8 logo-in-menu pull-left"><a href="/"><img src="/img/logo.png" alt="" /></a></div>
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-left"><a href="https://t.me/rap_american" target="_blank"><img src="/img/telegram.png" alt="" rel="nofollow"></a></div>
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-left"><a href="https://www.youtube.com/channel/UCJ86fLVg90qjqbZmnt0uyYw" target="_blank" rel="nofollow"><img src="/img/youtube.png" alt=""></a></div>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
                        <ul class="nav navbar-nav">
                            <li class="hidden-lg">
                                <a rel="nofollow" class="float-shadow" href="{{ route('home') }}">Главная</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="#">Новости</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="{{ route('artistIndex') }}">Исполнители</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="#">Альбомы</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="#">Тексты песен</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="#">Интервью</a>
                            </li>
                            <li>
                                <a rel="nofollow" class="float-shadow" href="#">Статьи</a>
                            </li>
                            @if(!Auth::check())
                            <li class="hidden-lg">
                                <a href="{{ route('login') }}" class="float-shadow" data-toggle="modal" data-target="#modal-login" rel="nofollow">Вход</a>
                            </li>
                            <li class="hidden-lg">
                                <a href="{{ route('register') }}" class="float-shadow" data-toggle="modal" data-target="#modal-register" rel="nofollow">Регистрация</a>
                            </li>
                            @else
                                <li class="hidden-lg">
                                    <a href="#" class="float-shadow" rel="nofollow">Мой аккаунт</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-1 hidden-md hidden-sm hidden-xs social-header-block">
                <a class="pull-left animate-social-icon" href="https://t.me/rap_american" target="_blank" rel="nofollow"><img src="/img/telegram.png" alt=""></a>
                <a class="pull-right animate-social-icon" href="https://www.youtube.com/channel/UCJ86fLVg90qjqbZmnt0uyYw" target="_blank" rel="nofollow"><img src="/img/youtube.png" alt=""></a>
            </div>
        </header>
    </div>
    <div class="col-lg-1 hidden-md hidden-sm hidden-xs pull-right auth-header-block">
        @if(!Illuminate\Support\Facades\Auth::check())
            <a href="{{ route('login') }}" data-toggle="modal" data-target="#modal-login" class="login-button" rel="nofollow">Вход</a>
            <a href="{{ route('register') }}" data-toggle="modal" data-target="#modal-register" class="register-button" rel="nofollow">Регистрация</a>
        @else
            <a href="#">Мой аккаунт</a>
        @endif
    </div>
</div>
<div class="clearfix"></div>
@include('modal.login_modal')
@include('modal.register_modal')
@include('modal.forgot_password_modal')