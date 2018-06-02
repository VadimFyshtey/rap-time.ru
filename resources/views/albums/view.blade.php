@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-view">
            <div class="col-lg-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('albumIndex') }}">Альбомы</a></li>
                    <li class="active">{{ $album->artist_name }} - {{ $album->album_name }}</li>
                </ol>
                <div class="clearfix"></div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 news-view-block">
                    <h1>{{ $album->artist_name }} - {{ $album->album_name }}</h1>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-left news-info-image">
                        <img src="{{ asset("img/albums/{$album->image}") }}" alt="{{ $album->artist_name }} - {{ $album->album_name }}" title="{{ $album->artist_name }} - {{ $album->album_name }}" />
                    </div>
                    @if(!empty($album->short_text))
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                            {{ $album->short_text }}
                        </div>
                    @endif
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                        <span class="detail-other-view pull-left">
                            <i class="fa fas fa-heart"> {{ $album->rate_count }}</i>
                        </span>
                        <span class="detail-other detail-other-like pull-right">
                            @if($album->ratingAlbums === null || $album->ratingAlbums->user_id !== Auth::id())
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-album' : '' }}" data-album-id="{{ $album->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-album' : '' }}" data-album-id="{{ $album->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                            @elseif($album->ratingAlbums->user_id === Auth::id())
                                <button class="pull-right btn btn-default {{ $album->ratingAlbums->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                                <button class="pull-right btn btn-default {{ $album->ratingAlbums->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                            @endif
                        </span>
                        <span class="clearfix"></span>
                        <span class="detail-other-view pull-left">
                            <p><b>Просмотры: </b>{{ $album->view }}</p>
                            <p><b>Дата публикации: </b>{{ \Carbon\Carbon::parse($album->updated_at)->format('Y-m-d')}}</p>
                        </span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full-content">
                        {!! $album->full_content !!}
                    </div>
                    <div class="clearfix"></div>
                    <div class="link-block">
                        <h2>Скачать альбом {{ $album->artist_name }} - {{ $album->album_name }}: </h2>
                        @if(!empty($album->link_first))
                            <a href="{{ $album->link_first }}" class="button-save" rel="nofollow" target="_blank">Скачать #1</a>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"></div>
                        @endif
                        @if(!empty($album->link_second))
                            <a href="{{ $album->link_second }}" class="button-save" rel="nofollow" target="_blank">Скачать #2</a>
                        @endif
                        <div class="clearfix"></div>
                        <br />
                    </div>
                    <hr />
                    <div class="other-item">
                        <p>Возможно Вам будет интересно:</p>
                        <ul>
                            @foreach($otherAlbums as $otherAlbum)
                                <a href="{{ route('albumView', ['alias' => $otherAlbum->alias, 'id' => $otherAlbum->id]) }}"><li>{{ $otherAlbum->artist_name }} - {{ $otherAlbum->album_name }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
                        <div class="clearfix"></div>
                        <a href="{{ route('adminAlbumEdit', ['id' => $album->id]) }}" rel="nofollow" target="_blank" class="edit-admin-link">
                            <i class="glyphicon glyphicon-edit"></i>
                            Редактировать
                        </a>
                    @endif
                    <div class="clearfix"></div>
                    <hr />
                    <div class="comments">
                        @if(Auth::check() && Auth::user()->is_banned === 0)
                            @include('layouts.components.comments.comment-form', ['item' => $album, 'route' => 'albumCommentSave'])
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
                        <p>Коментарии ({{ count($album->comments) }})</p>
                        @if(count($album->comments) > 0)
                            @foreach($comments as $k => $comment)
                                @if($k !== 0)
                                    @break
                                @endif
                                @include('layouts.components.comments.comment', ['items' => $comment, 'post_id' => 'album_id', 'routeDelete' => 'albumCommentDelete'])
                            @endforeach
                        @elseif (count($album->comments) === 0)
                            <p class="no-auth-comment"> Ваш комментарий будет первым.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 com-sm-12 col-xs-12">
                    @if(count($album->artists) > 0)
                        <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                            <h3>{{ count($album->artists) === 1 ? 'Исполнитель' : 'Исполнители' }}</h3>
                            @foreach($album->artists as $artist)
                                <a href="{{ route('artistView', ['alias' => $artist-> alias]) }}"><img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" /></a>
                                <h4><a href="{{ route('artistView', ['alias' => $artist-> alias]) }}">{{ $artist->nickname }}</a></h4>
                                <hr />
                            @endforeach
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                        <h3>Популярные альбомы</h3>
                        @foreach($popularAlbums as $popular)
                            <h5>
                                <a href="{{ route('albumView', ['alias' => $popular->alias, 'id' => $popular->id]) }}"><?= mb_strimwidth($popular->artist_name . ' - ' . $popular->album_name , 0, 55, "...") ?></a>
                            </h5>
                            <a rel="nofollow" href="{{ route('albumView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <img src="{{ asset("img/albums/{$popular->image}") }}" alt="{{ $popular->artist_name }} - {{ $popular->album_name }}" title="{{ $popular->artist_name }} - {{ $popular->album_name }}"  />
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
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 news-view-sidebar hidden-sm hidden-xs pull-right">
                        <h3>Реклама</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
@show

@include('layouts.section.footer')