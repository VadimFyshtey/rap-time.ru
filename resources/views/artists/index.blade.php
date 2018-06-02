@include('layouts.section.header')
@include('layouts.components.menu')

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
                    @include('layouts.components.sort')
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="artists-sidebar">
                    <h3>Поиск по исполнителям</h3>
                    <form method="get" accept-charset="" action="{{ route('artistSearch') }}" id="h-search">
                        <input id='search' type="text" placeholder="Введите имя" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="artists-sidebar">
                    <h3>Категории</h3>
                    @foreach($categories as $category)
                        <a rel="nofollow" href="{{ route('artistCategory', ['alias' => $category->alias, 'id' => $category->id]) }}">{{ $category->title }}</a>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
                <div class="artists-sidebar popular-artists hidden-sm hidden-xs">
                    <h3>Популярные рэперы</h3>
                    @foreach($popularArtists as $popularArtist)
                        <h5>
                            <a rel="nofollow" href="{{ route('artistView', ['alias' => $popularArtist->alias]) }}"><?= mb_strimwidth($popularArtist->nickname , 0, 45, "...") ?></a>
                        </h5>
                        <a rel="nofollow" href="{{ route('artistView', ['alias' => $popularArtist->alias]) }}">
                            <img src="{{ asset("img/artists/{$popularArtist->image}") }}" alt="{{ $popularArtist->nickname }}" title="{{ $popularArtist->nickname }}"  />
                        </a>
                        <div class="clearfix"></div>
                        <span class="detail-popul-other">
                            <i class="fa far fa-eye"> {{ $popularArtist->view }}</i> |
                            <i class="fa fas fa-heart"> {{ $popularArtist->rate_count }}</i>
                        </span>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                </div>
                <div class="artists-sidebar hidden-sm hidden-xs">
                    <h3>Реклама</h3>
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <!-- rap-time reklama -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-2586863288185463"
                     data-ad-slot="2078150076"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @foreach($artists as $artist)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <div class="artist-one">
                        <a href="{{ route('artistView', ['alias' => $artist->alias]) }}">
                            <img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}"  />
                        </a>
                        <div>
                            <span class="detail-other detail-other-info pull-left">
                                <a href="{{ route('artistView', ['alias' => $artist->alias]) }}">{{ $artist->nickname }}</a>
                                <span class="artist-rate-count">
                                    <i class="clearfix"></i>
                                    <i class="fa fas fa-heart"> {{ $artist->rate_count }}</i> | <i class="fa far fa-eye"> {{ $artist->view }}</i>
                                </span>
                            </span>
                            <span class="clearfix"></span>
                            <span class="detail-other detail-other-like pull-right">
                               @if($artist->ratingArtists === null || $artist->ratingArtists->user_id !== Auth::id())
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-artist' : '' }}" data-artist-id="{{ $artist->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-artist' : '' }}" data-artist-id="{{ $artist->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                               @elseif($artist->ratingArtists->user_id === Auth::id())
                                    <button class="pull-right btn btn-default {{ $artist->ratingArtists->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $artist->ratingArtists->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                               @endif
                            </span>
                        </div>
                    </div>
                </div>
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
                    <hr />
                    {{  $artists->render() }}
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')