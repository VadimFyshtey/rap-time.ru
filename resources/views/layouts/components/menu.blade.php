
<div class="wrapper">
    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
        <div class="col-lg-1 hidden-md hidden-sm hidden-xs pull-left admin-header-block">
            <a href="{{ route('adminDashboardIndex') }}" rel="nofollow" target="_blank">Admin</a>
        </div>
    @endif
    <div class="container">
        <header>
            <div class="col-lg-2 hidden-md hidden-sm hidden-xs logo pull-left">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <nav class="navbar-default navbar-static-top" role="navigation">
                    <div class="navbar-brand hidden-lg">
                        <div class="col-xs-6 col-sm-8 col-md-8 logo-in-menu pull-left">
                            <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="Rap-Time" title="Rap-Time" />
                            </a>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-left">
                            <a href="{{ env('TELEGRAM_LINK') }}" target="_blank" rel="nofollow">
                                <img src="{{ asset('img/social/telegram.png') }}" alt="Rap-Time" title="Rap-Time" />
                            </a>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 pull-left">
                            <a href="{{ env('YOUTUBE_LINK') }}" target="_blank" rel="nofollow">
                                <img src="{{ asset('img/social/youtube.png') }}" alt="Rap-Time" title="Rap-Time" />
                            </a>
                        </div>
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
                                <a class="float-shadow" href="{{ route('newsIndex') }}">Новости</a>
                            </li>
                            <li>
                                <a class="float-shadow" href="{{ route('artistIndex') }}">Исполнители</a>
                            </li>
                            <li>
                                <a class="float-shadow" href="{{ route('albumIndex') }}">Альбомы</a>
                            </li>
                            <li>
                                <a class="float-shadow" href="{{ route('lyricsIndex') }}">Тексты песен</a>
                            </li>
                            <li>
                                <a class="float-shadow" href="{{ route('interviewIndex') }}">Интервью</a>
                            </li>
                            <li>
                                <a class="float-shadow" href="{{ route('articleIndex') }}">Статьи</a>
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
                                    <a href="{{ route('profileIndex', ['id' => Auth::id()]) }}" class="float-shadow" rel="nofollow">Мой аккаунт</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-1 hidden-md hidden-sm hidden-xs social-header-block">
                <a class="pull-left animate-social-icon" href="{{ env('TELEGRAM_LINK') }}" target="_blank" rel="nofollow">
                    <img src="{{ asset('img/social/telegram.png') }}" alt="Rap-Time" title="Rap-Time" />
                </a>
                <a class="pull-right animate-social-icon" href="{{ env('YOUTUBE_LINK') }}" target="_blank" rel="nofollow">
                    <img src="{{ asset('img/social/youtube.png') }}" alt="Rap-Time" title="Rap-Time" />
                </a>
            </div>
        </header>
    </div>
    <div class="col-lg-1 hidden-md hidden-sm hidden-xs pull-right auth-header-block">
        @if(!Illuminate\Support\Facades\Auth::check())
            <a href="{{ route('login') }}" data-toggle="modal" data-target="#modal-login" class="login-button" rel="nofollow">Вход</a>
            <a href="{{ route('register') }}" data-toggle="modal" data-target="#modal-register" class="register-button" rel="nofollow">Регистрация</a>
        @else
            <a rel="nofollow" href="{{ route('profileIndex', ['id' => Auth::id()]) }}">Мой аккаунт</a>
        @endif
    </div>
</div>
<div class="clearfix"></div>
@include('modal.login_modal')
@include('modal.register_modal')
@include('modal.forgot_password_modal')
@include('modal.contact_modal')