<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Админ-Панель | Rap-Time</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin-app.css') }}">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/ie.js') }}" defer></script>
    <![endif]-->
    <script src="{{ asset('js/admin-app.js') }}" defer></script>
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">

    <a href="{{ route('home') }}" class="logo" rel="nofollow" target="_blank">
        <span class="logo-mini"><b>RT</b></span>
        <span class="logo-lg"><b>Rap-Time</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->avatar) }}" class="user-image" alt="Rap-Time" title="Rap-Time" />
                        <span class="hidden-xs">{{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle" alt="Rap-Time" title="Rap-Time" />
                            <p>
                                {{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profileIndex', ['id' => Auth::id()]) }}" class="btn btn-default btn-flat">Мой профиль</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Выход</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="load"></div>