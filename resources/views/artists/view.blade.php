@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="artist-view">
            <div class="col-lg-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('artistIndex') }}">Исполнители</a></li>
                    <li class="active">{{ $artist->nickname }}</li>
                </ol>
                <div class="clearfix"></div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 artist-view-block pull-left">
                    <h1>{{ $artist->nickname }}</h1>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-left artist-info-image">
                        <img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" />
                    </div>
                    @if(!empty($artist->short_text))
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                        {{ $artist->short_text }}
                    </div>
                    @endif
                    @if(empty($artist->full_name) && empty($artist->birthday) && empty($artist->location))
                    @else
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pull-left artist-info artist-info-detail">
                        @if(!empty($artist->full_name))
                            <p><b>Имя:</b> <i>{{ $artist->full_name }}</i></p>
                        @endif
                        @if(!empty($artist->birthday))
                            <p><b>Дата рождения:</b>  <i>{{ $artist->birthday }}</i></p>
                        @endif
                        @if(!empty($artist->location))
                            <p><b>Место рождения:</b>  <i>{{ $artist->location }}</i></p>
                        @endif
                    </div>
                    @endif
                    <div class="{{ empty($artist->full_name) && empty($artist->birthday) && empty($artist->location) ? 'col-lg-7 col-md-6 col-sm-6 col-xs-12' : 'col-lg-3 col-md-3 col-sm-3 col-xs-12' }} pull-right artist-info artist-info-like">
                        <span class="detail-other-view pull-left">
                            <i class="fa fas fa-heart"> {{ $artist->rate_count }}</i>
                        </span>
                        <div class="hidden-lg hidden-sm hidden-md clearfix"></div>
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
                        <br/>
                        <br/>
                        <span class="detail-other-view pull-left">
                            <b>Просмотры: </b>{{ $artist->view }}
                        </span>
                    </div>
                    @if(empty($artist->official_site) && empty($artist->fan_site))
                    @else
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 pull-right artist-info artist-info-site hidden-xs">
                            @if(!empty($artist->official_site))
                                <p><a href="{{ $artist->official_site }}" target="_blank" rel="nofollow">Официальный сайт</a></p>
                            @endif
                            @if(!empty($artist->fan_site))<p><a href="{{ $artist->fan_site }}" target="_blank" rel="nofollow">Фан сайт</a></p>@endif
                        </div>
                        <div class="clearfix hidden-lg"></div>
                    @endif
                    @if(empty($artist->social_vk) && empty($artist->social_facebook) && empty($artist->social_youtube) && empty($artist->social_twitter) && empty($artist->social_instagram) && empty($artist->social_soundcloud))
                    @else
                        <div class="{{ empty($artist->official_site) && empty($artist->fan_site) ? 'col-lg-7 col-md-6 col-sm-6 col-xs-12' : 'col-lg-4 col-md-6 col-sm-6 col-xs-12'}} pull-left artist-info artist-info-social">
                            <h6>{{ $artist->nickname }} в соц. сетях</h6>
                            @if(!empty($artist->social_vk))
                                <a href="{{ $artist->social_vk }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/vk.png") }}" alt="{{ $artist->nickname }} - vkontakte" title="{{ $artist->nickname }} - vkontakte" /></a>
                            @endif
                            @if(!empty($artist->social_facebook))
                                <a href="{{ $artist->social_facebook }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/facebook.png") }}" alt="{{ $artist->nickname }} - facebook" title="{{ $artist->nickname }} - facebook" /></a>
                            @endif
                            @if(!empty($artist->social_youtube))
                                <a href="{{ $artist->social_youtube }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/youtube.png") }}" alt="{{ $artist->nickname }} - youtube" title="{{ $artist->nickname }} - youtube" /></a>
                            @endif
                            @if(!empty($artist->social_twitter))
                                <a href="{{ $artist->social_twitter }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/twitter.png") }}" alt="{{ $artist->nickname }} - twitter" title="{{ $artist->nickname }} - twitter" /></a>
                            @endif
                            @if(!empty($artist->social_instagram))
                                <a href="{{ $artist->social_instagram }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/instagram.png") }}" alt="{{ $artist->nickname }} - instagram" title="{{ $artist->nickname }} - instagram" /></a>
                            @endif
                            @if(!empty($artist->social_soundcloud))
                                <a href="{{ $artist->social_soundcloud }}" target="_blank" rel="nofollow"><img src="{{ asset("img/social/soundcloud.png") }}" alt="{{ $artist->nickname }} - soundcloud" title="{{ $artist->nickname }} - soundcloud" /></a>
                            @endif
                        </div>
                    @endif
                    <div class="clearfix"></div>
                    <h2>{{ $artist->nickname }} - биография</h2>
                    <div class="full-content">
                        {!! $artist->biography !!}
                    </div>
                    <br />
                    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
                        <div class="clearfix"></div>
                        <a href="{{ route('adminArtistEdit', ['id' => $artist->id]) }}" rel="nofollow" target="_blank" class="edit-admin-link">
                            <i class="glyphicon glyphicon-edit"></i>
                            Редактировать
                        </a>
                    @endif
                    <div class="clearfix"></div>
                    <hr />
                    <div class="comments">
                        @if(Auth::check() && Auth::user()->is_banned === 0)
                            @include('layouts.components.comments.comment-form', ['item' => $artist, 'route' => 'artistCommentSave'])
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
                        <p>Коментарии ({{ count($artist->comments) }})</p>
                        @if(count($artist->comments) > 0)
                            @foreach($comments as $k => $comment)
                                @if($k !== 0)
                                    @break
                                @endif
                                @include('layouts.components.comments.comment', ['items' => $comment, 'post_id' => 'artist_id', 'routeDelete' => 'artistCommentDelete'])
                            @endforeach
                        @elseif (count($artist->comments) === 0)
                            <p class="no-auth-comment"> Ваш комментарий будет первым.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 com-sm-12 col-xs-12 pull-right">
                @if(count($artist->albums) > 0)
                <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 artist-view-sidebar pull-right">
                    <h3>Последние альбомы</h3>
                    @foreach($artist->albums as $album)
                        <a rel="nofollow"  href="{{ route('albumView', ['alias' => $album->alias, 'id' => $album->id]) }}">
                            <img src="{{ asset("img/albums/{$album->image}") }}" title="{{ $album->artist_name }} - {{ $album->album_name }}" alt="{{ $album->artist_name }} - {{ $album->album_name }}"/>
                        </a>
                        <h4>
                            <a rel="nofollow"  href="{{ route('albumView', ['alias' => $album->alias, 'id' => $album->id]) }}">{{ $album->album_name }}</a>
                        </h4>
                        <hr />
                    @endforeach
                    <a class="all-album-button" rel="nofollow" href="{{ route('artistAlbums', ['alias' => $artist->alias]) }}">Все альбомы</a>
                </div>
                    <div class="clearfix"></div>
                @endif

                @if(count($artist->interviews) > 0)
                <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 artist-view-sidebar artist-view-sidebar-article pull-right">
                    <h3>Последние интервью</h3>
                    @foreach($artist->interviews as $interview)
                        <h4>
                            <a rel="nofollow" href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}">{{ $interview->title }}</a>
                        </h4>
                        <a rel="nofollow" href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}">
                            <img src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}" />
                        </a>
                        <p>
                            <?= mb_strimwidth($interview->short_content, 0, 60, "...") ?>
                        </p>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                    <a rel="nofollow" class="all-album-button" href="{{ route('artistInterviews', ['alias' => $artist->alias]) }}">Все интервью</a>
                </div>
                    <div class="clearfix"></div>
                @endif

                @if(count($artist->news) > 0)
                <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 artist-view-sidebar artist-view-sidebar-article pull-right">
                    <h3>Последние новости</h3>
                    @foreach($artist->news as $news)
                        <h4>
                            <a rel="nofollow" href="{{ route('newsView', ['alias' => $news->alias, 'id' => $news->id]) }}">{{ $news->title }}</a>
                        </h4>
                        <a rel="nofollow" href="{{ route('newsView', ['alias' => $news->alias, 'id' => $news->id]) }}">
                            <img src="{{ asset("img/news/{$news->image}") }}" alt="{{ $news->title }}" title="{{ $news->title }}" />
                        </a>
                        <p>
                            <?= mb_strimwidth($news->short_content, 0, 60, "...") ?>
                        </p>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                    <a class="all-album-button" rel="nofollow" href="{{ route('artistNews', ['alias' => $artist->alias]) }}">Все новости</a>
                </div>
                    <div class="clearfix"></div>
                @endif

                @if(count($artist->lyrics) > 0)
                <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 artist-view-sidebar artist-view-sidebar-article artist-view-sidebar-text pull-right">
                    <h3>Тексты песен</h3>
                    @foreach($artist->lyrics as $lyrics)
                        <h4>
                            <a rel="nofollow" href="{{ route('lyricsView', ['alias' => $lyrics->alias, 'id' => $lyrics->id]) }}">
                                {{ $lyrics->lyrics_name }}
                            </a>
                        </h4>
                        <hr />
                    @endforeach
                    <a class="all-album-button" rel="nofollow" href="{{ route('artistLyrics', ['alias' => $artist->alias]) }}">Все тексты песен</a>
                </div>
                    <div class="clearfix"></div>
                @endif
                    <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 artist-view-sidebar artist-view-sidebar-article artist-view-sidebar-text pull-right">
                        <h3>Реклама</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
@show

@include('layouts.section.footer')