@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="lyrics-list">
            <h1>Тексты песен</h1>
            <h6><b>Категория:</b> <i>{{ $category->title }}</i></h6>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('lyricsIndex') }}">Тексты песен</a></li>
                        <li class="active">{{ $category->title }}</li>
                    </ol>
                    @include('layouts.components.sort')
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="lyrics-sidebar">
                    <h3>Поиск по песням</h3>
                    <form method="get" accept-charset="" action="{{ route('lyricsSearch') }}" id="h-search">
                        <input id='search' type="text" placeholder="Введите что-то" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="lyrics-sidebar">
                    <h3>Категории</h3>
                    <a rel="nofollow" href="{{ route('lyricsIndex') }}">Все песни</a>
                    <div class="clearfix"></div>
                    @foreach($categories as $category)
                        <a rel="nofollow" href="{{ route('lyricsCategory', ['alias' => $category->alias, 'id' => $category->id]) }}">{{ $category->title }}</a>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
                <div class="lyrics-sidebar popular-lyrics hidden-sm hidden-xs">
                    <h3>Популярные песни</h3>
                    @foreach($popularLyrics as $popular)
                        <h5>
                            <a rel="nofollow" href="{{ route('lyricsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <?= mb_strimwidth($popular->artist_name . ' - ' . $popular->lyrics_name , 0, 55, "...") ?>
                            </a>
                        </h5>
                        <div class="clearfix"></div>
                        <span class="detail-popul-other">
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($popular->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa far fa-eye"> {{ $popular->view }}</i>
                        </span>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                </div>
                <div class="lyrics-sidebar hidden-sm hidden-xs">
                    <h3>Реклама</h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="lyrics-all">
                    @foreach($lyrics as $item)
                        <div class="lyrics-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a rel="nofollow" class="lyrics-title" href="{{ route('lyricsView', ['alias' => $item->alias, 'id' => $item->id]) }}" title="{{ $item->artist_name }} - {{ $item->lyrics_name }}">
                                {{ $item->artist_name }} - {{ $item->lyrics_name }}
                            </a>
                            <div class="clearfix"></div>
                            <div class="detail-other pull-left">
                                <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d')}}</i> |
                                <i class="fa far fa-eye"> {{ $item->view }}</i> |
                                <i class="fa fas fa-heart"> {{ $item->rate_count }}</i>
                            </div>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('lyricsView', ['alias' => $item->alias, 'id' => $item->id]) }}">Текст песни</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                        <div class="clearfix"></div>
                        <div class="my-pagination">
                            {{  $lyrics->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')