@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="lyrics-view">
            <div class="col-lg-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('lyricsIndex') }}">Тексты песен</a></li>
                    <li class="active">{{ $lyrics->artist_name }} - {{ $lyrics->lyrics_name }}</li>
                </ol>
                <div class="clearfix"></div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 lyrics-view-block">
                    <h1>{{ $lyrics->artist_name }} - {{ $lyrics->lyrics_name }}</h1>
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <div class="{{ $lyrics->translate === null ? 'col-lg-12 col-md-12' : 'col-lg-6 col-md-6' }} col-sm-12 col-xs-12 pull-left lyrics-text">
                        <div class="{{ $lyrics->translate === null ? 'lyrics-text-detail' : '' }}">
                            <h2>Текст песни: {{ $lyrics->artist_name }} - {{ $lyrics->lyrics_name }}</h2>
                            {!! $lyrics->text !!}
                        </div>
                    </div>
                    @if(!empty($lyrics->translate))
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left lyrics-translate">
                        <hr class="hidden-lg hidden-md" />
                        <h2>Перевод песни: {{ $lyrics->artist_name }} - {{ $lyrics->lyrics_name }}</h2>
                        {!! $lyrics->translate !!}
                    </div>
                    @endif

                    @if(!empty($lyrics->video_url))
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 lyrics-video">
                        <hr />
                        {!! $lyrics->video_url !!}
                    </div>
                    @endif

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
                    <hr />
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 ">
                        <span class="detail-other-view pull-left">
                            <i class="fa fas fa-heart"> {{ $lyrics->rate_count }}</i>
                        </span>
                        <span class="detail-other detail-other-like pull-left">
                           @if($lyrics->ratingLyrics === null || $lyrics->ratingLyrics->user_id !== Auth::id())
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-lyrics' : '' }}" data-lyrics-id="{{ $lyrics->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-lyrics' : '' }}" data-lyrics-id="{{ $lyrics->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                            @elseif($lyrics->ratingLyrics->user_id === Auth::id())
                                <span class="clearfix"></span>
                                <button class="pull-right btn btn-default {{ $lyrics->ratingLyrics->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                                <button class="pull-right btn btn-default {{ $lyrics->ratingLyrics->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                            @endif
                        </span>
                        <span class="clearfix"></span>
                        <span class="detail-other-view pull-left">
                            <p><b>Просмотры: </b>{{ $lyrics->view }}</p>
                            <p><b>Дата публикации: </b>{{ \Carbon\Carbon::parse($lyrics->updated_at)->format('Y-m-d')}}</p>
                        </span>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="other-item">
                        <p>Возможно Вам будет интересно:</p>
                        <ul>
                            @foreach($otherLyrics as $otherLyric)
                                <a href="{{ route('lyricsView', ['alias' => $otherLyric->alias, 'id' => $otherLyric->id]) }}"><li>{{ $otherLyric->artist_name }} - {{ $otherLyric->lyrics_name }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
                        <div class="clearfix"></div>
                        <a href="{{ route('adminLyricsEdit', ['id' => $lyrics->id]) }}" rel="nofollow" target="_blank" class="edit-admin-link">
                            <i class="glyphicon glyphicon-edit"></i>
                            Редактировать
                        </a>
                    @endif
                    <div class="clearfix"></div>
                    <hr />
                    <div class="comments">
                        @if(Auth::check() && Auth::user()->is_banned === 0)
                            @include('layouts.components.comments.comment-form', ['item' => $lyrics, 'route' => 'lyricsCommentSave'])
                        @elseif(Auth::check() && Auth::user()->is_banned === 1)
                            <p class="no-auth-comment"> Вы забанены! И не можете оставить комментарий.
                                <a href="#" rel="nofollow" data-toggle="modal" data-target="#modal-contact">Напишите администрации</a>
                                возможно вас разбанят.
                                @if(!empty(Auth::user()->comment))
                                    <br />
                                    <b>Причина:</b>
                                    {{ Auth::user()->comment }}
                                @endif
                            </p>
                        @elseif(!Auth::check())
                            <p class="no-auth-comment">Для того что бы оставить свой комментарий
                                <a href="#" rel="nofollow" data-toggle="modal" data-target="#modal-login">ввойдите</a> или
                                <a href="#" rel="nofollow" data-toggle="modal" data-target="#modal-register">зарегистрируйтесь.</a>
                            </p>
                        @endif
                        <p>Коментарии ({{ count($lyrics->comments) }})</p>
                        @if(count($lyrics->comments) > 0)
                            @foreach($comments as $k => $comment)
                                @if($k !== 0)
                                    @break
                                @endif
                                @include('layouts.components.comments.comment', ['items' => $comment, 'post_id' => 'lyrics_id', 'routeDelete' => 'lyricsCommentDelete'])
                            @endforeach
                        @elseif (count($lyrics->comments) === 0)
                            <p class="no-auth-comment"> Ваш комментарий будет первым.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    @if(count($lyrics->artists) > 0)
                        <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 lyrics-view-sidebar pull-right">
                            <h3>{{ count($lyrics->artists) === 1 ? 'Исполнитель' : 'Исполнители' }}</h3>
                            @foreach($lyrics->artists as $artist)
                                <a href="{{ route('artistView', ['alias' => $artist-> alias]) }}"><img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" /></a>
                                <h4><a href="{{ route('artistView', ['alias' => $artist-> alias]) }}">{{ $artist->nickname }}</a></h4>
                                <hr />
                            @endforeach
                        </div>
                    @endif
                    <div class="clearfix"></div>
                    <div class="lyrics-view-sidebar col-lg-12 col-md-12 com-sm-12 col-xs-12 hidden-sm hidden-xs pull-right">
                        <h3>Популярные песни</h3>
                        @foreach($popularLyrics as $popular)
                            <h5>
                                <a href="{{ route('lyricsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
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
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 lyrics-view-sidebar hidden-sm hidden-xs pull-right">
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
            </div>
        </section>
    </div>
@show

@include('layouts.section.footer')