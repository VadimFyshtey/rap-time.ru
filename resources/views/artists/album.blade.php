@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>{{ $artistAlbums->nickname }} - Все альбомы</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('artistView', ['alias' => $artistAlbums->alias]) }}">{{ $artistAlbums->nickname }}</a></li>
                        <li class="active">Все альбомы</li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
                    <h3>Популярные альбомы</h3>
                    @foreach($popularAlbums as $popular)
                        <h5>
                            <a rel="nofollow" href="{{ route('albumView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <?= mb_strimwidth($popular->artist_name . ' - ' . $popular->album_name , 0, 55, "...") ?>
                            </a>
                        </h5>
                        <a rel="nofollow" href="{{ route('albumView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                            <img src="{{ asset("img/albums/$popular->image") }}" alt="{{ $popular->artist_name }} - {{ $popular->album_name }}" title="{{ $popular->artist_name }} - {{ $popular->album_name }}"  />
                        </a>
                        <div class="clearfix"></div>
                        <span class="detail-popul-other">
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($popular->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa far fa-eye"> {{ $popular->view }}</i>
                        </span>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                </div>
                <div class="news-sidebar hidden-sm hidden-xs">
                    <h3>Реклама</h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="news-all">
                    @foreach($artistAlbums->albums as $album)
                        <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img class="pull-left" src="{{ asset("img/albums/$album->image") }}" alt="{{ $album->artist_name }} {{ $album->album_name }}" title="{{ $album->artist_name }} {{ $album->album_name }}"  />
                            <a class="news-title" href="{{ route('albumView', ['alias' => $album->alias, 'id' => $album->id]) }}" title="{{ $album->artist_name }} {{ $album->album_name }}">
                                {{ $album->artist_name }} - {{ $album->album_name }}
                            </a>
                            <p class="short-text">
                                {{ $album->short_content }}
                            </p>
                            <span class="detail-other pull-left">
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($album->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa far fa-eye"> {{ $album->view }}</i> |
                            <i class="fa fas fa-heart"> {{ $album->rate_count }}</i>
                        </span>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('albumView', ['alias' => $album->alias, 'id' => $album->id]) }}">Подробнее</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                        <div class="clearfix"></div>
                        <div class="my-pagination">
                            {{ $artistAlbums->albums()->paginate($limit)->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')