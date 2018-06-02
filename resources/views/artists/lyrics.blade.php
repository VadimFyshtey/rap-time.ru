@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="lyrics-list">
            <h1>{{ $artistLyrics->nickname }} - Тексты песен</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('artistView', ['alias' => $artistLyrics->alias]) }}">{{ $artistLyrics->nickname }}</a></li>
                        <li class="active">Все тексты песен</li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
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
                    <br />
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <br />
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <br />
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="lyrics-all">
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    @foreach($artistLyrics->lyrics as $lyric)
                        <div class="lyrics-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="lyrics-title" href="{{ route('lyricsView', ['alias' => $lyric->alias, 'id' => $lyric->id]) }}" title="{{ $lyric->artist_name }} - {{ $lyric->lyrics_name }}">
                                {{ $lyric->artist_name }} - {{ $lyric->lyrics_name }}
                            </a>
                            <div class="clearfix"></div>
                            <div class="detail-other pull-left">
                                <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($lyric->updated_at)->format('Y-m-d')}}</i> |
                                <i class="fa far fa-eye"> {{ $lyric->view }}</i> |
                                <i class="fa fas fa-heart"> {{ $lyric->rate_count }}</i>
                            </div>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('lyricsView', ['alias' => $lyric->alias, 'id' => $lyric->id]) }}">Текст песни</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                        <div class="clearfix"></div>
                        <div class="my-pagination">
                            {{ $artistLyrics->lyrics()->paginate($limit)->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')