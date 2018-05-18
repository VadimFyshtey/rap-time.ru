<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>{{ MetaTag::get('title') }}</title>
    {!! MetaTag::tag('description') !!}
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/ie.js') }}" defer></script>
    <![endif]-->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div id="load"></div>