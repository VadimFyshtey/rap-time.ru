@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h1>Главная</h1>
            <br />
            <h5>Всего записей на сайте: {{ $news + $artists + $albums + $lyrics + $interviews + $articles}}</h5>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminNewsIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Новости</span>
                                <span class="info-box-number"><small>{{ $news }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminArtistIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Исполнители</span>
                                <span class="info-box-number"><small>{{ $artists }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminAlbumIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Альбомы</span>
                                <span class="info-box-number"><small>{{ $albums }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminLyricsIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Тексты песен</span>
                                <span class="info-box-number"><small>{{ $lyrics }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminInterviewIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Интервью</span>
                                <span class="info-box-number"><small>{{ $interviews }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('adminArticleIndex') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-th"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Статьи</span>
                                <span class="info-box-number"><small>{{ $articles }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="#">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Пользователи</span>
                                <span class="info-box-number"><small>{{ $user }}</small></span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>
    </div>

@show

@include('admin.layouts.section.footer')