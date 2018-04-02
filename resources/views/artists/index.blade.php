@include('layouts.section.header_home')
@include('layouts.menu')

@section('content')
    <div class="container">
        <section class="artists-list">
            <h1>Рэп исполнители</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li class="active">Исполнители</li>
                    </ol>
                    <div class="pull-right sort-block">
                        <span class="sort-text">Сортировать по:</span>
                        <span class="sort-item">Рейтингу</span>
                        <span class="sort-item">Дате</span>
                        <span class="sort-item">Просмотрам</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="artists-sidebar">
                    <h3>Поиск по исполнителям</h3>
                    <form method="get" accept-charset="" action="" id="h-search">
                        <input id='search' type="text" placeholder="Введите имя" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="artists-sidebar">
                    <h3>Категории</h3>
                    <a rel="nofollow" href="#">Зарубежные</a>
                    <div class="clearfix"></div>
                    <a rel="nofollow" href="#">Русские</a>
                </div>
                <div class="artists-sidebar hidden-md hidden-sm hidden-xs">
                    <h3>Реклама</h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @foreach($artists as $artist)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <div class="artist-one">
                        <a href="#">
                            <img src="/img/artists/{{ $artist->image }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}"  />
                        </a>
                        <div>
                            <span class="detail-other detail-other-info pull-left">
                                <a href="#">{{ $artist->nickname }}</a>
                                <i class="clearfix"></i>
                                <i class="fa fas fa-heart"> 2</i> | <i class="fa far fa-eye"> 22</i>
                            </span>
                            <span class="detail-other detail-other-like pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')