@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <section class="profile-list">
                <h3>Профиль пользователя: {{ $user->name ? $user->name : $user->email }}</h3>
                @if($user->is_banned === 1)
                    <p class="no-auth-comment"> Вы забанены!
                        <a href="#" rel="nofollow" data-toggle="modal" data-target="#modal-contact">Напишите администрации</a>
                        возможно вас разбанят.
                        @if(!empty($user->comment))
                            <br />
                            <b>Причина:</b>
                            {{ $user->comment }}
                        @endif
                    </p>
                @endif
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    @if ($errors->any())
                        <div class="alert alert-danger errors-profile">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br />
                    <form action="{{ route('profileUpdate', ['id' => $user->id]) }}" method="POST" name="form-profile" class="form-profile" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile-form-row">
                            <label for="profile-name">Ваше имя:</label>
                            <input type="text" name="profileName" id="profile-name" class="form-control" minlength="5" maxlength="30" placeholder="Ваше имя" value="{{ $user->name }}" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile-form-row">
                            <label for="profile-email">Ваш email:</label>
                            <input type="email" name="profileEmail" id="profile-email" class="form-control" placeholder="Ваш email" value="{{ $user->email }}" disabled />
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-form-row">
                            @if(!empty($user->avatar))
                                <img src="{{ asset($user->avatar) }}" alt="Rap-Time" title="Rap-Time" />
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 profile-form-row">
                            <label for="profile-avatar">Загрузите аватар:</label>
                            <input type="file" name="profileAvatar" class="form-control-file" id="profile-avatar" />
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile-form-row profile-form-row-button">
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="logout">
                        <a href="{{ route('logout') }}">Выход</a>
                    </div>
                    <br />
                </div>
                <!-- rap-time reklama -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-2586863288185463"
                     data-ad-slot="2078150076"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 last-active">
                    <h3>Последняя активность</h3>
                    @if(count($user->ratingArtists) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Исполнители</h4>
                        @foreach($user->ratingArtists as $ratingArtist)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="one-last-active one-last-active-artists">
                                    <a class="last-active-title-artists" href="{{ route('artistView', ['alias' => $ratingArtist->artists->alias]) }}">
                                        {{  $ratingArtist->artists->nickname }}
                                    </a>
                                    <a href="{{ route('artistView', ['alias' => $ratingArtist->artists->alias]) }}">
                                        <img src="{{ asset("img/artists/{$ratingArtist->artists->image}") }}" alt="{{  $ratingArtist->artists->nickname }}" title="{{  $ratingArtist->artists->nickname }}"  />
                                    </a>
                                    <span class="detail-other-like">
                                        <button class="btn btn-default {{ $ratingArtist->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                            <i class="fa fas fa-thumbs-up"></i>
                                        </button>
                                        <button class="btn btn-default {{ $ratingArtist->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                            <i class="fa fas fa-thumbs-down"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if(count($user->ratingAlbums) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Альбомы</h4>
                        @foreach($user->ratingAlbums as $ratingAlbum)
                            <div class="one-last-active">
                                <a href="{{ route('albumView', ['alias' => $ratingAlbum->albums->alias, 'id' => $ratingAlbum->albums->id]) }}">
                                    <img src="{{ asset("img/albums/{$ratingAlbum->albums->image}") }}" alt="{{ $ratingAlbum->albums->artist_name }} - {{ $ratingAlbum->albums->album_name }}" title="{{ $ratingAlbum->albums->artist_name }} - {{ $ratingAlbum->albums->album_name }}" />
                                </a>
                                <a class="last-active-title" href="{{ route('albumView', ['alias' => $ratingAlbum->albums->alias, 'id' => $ratingAlbum->albums->id]) }}">
                                    <?= mb_strimwidth($ratingAlbum->albums->artist_name . ' - ' . $ratingAlbum->albums->album_name, 0, 35, "...") ?>
                                </a>
                                <span class="short-text hidden-sm hidden-xs"><?= mb_strimwidth($ratingAlbum->albums->short_content, 0, 55, "...") ?></span>
                                <span class="detail-other pull-right">
                                    <button class="pull-right btn btn-default {{ $ratingAlbum->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $ratingAlbum->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                </span>
                            </div>
                        @endforeach
                    @endif
                    @if(count($user->ratingNews) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Новости</h4>
                        @foreach($user->ratingNews as $ratingNews)
                            <div class="one-last-active">
                                <a href="{{ route('newsView', ['alias' => $ratingNews->news->alias, 'id' => $ratingNews->news->id]) }}">
                                    <img src="{{ asset("img/news/{$ratingNews->news->image}") }}" alt="{{ $ratingNews->news->title }}" title="{{ $ratingNews->news->title }}" />
                                </a>
                                <a class="last-active-title" href="{{ route('newsView', ['alias' => $ratingNews->news->alias, 'id' => $ratingNews->news->id]) }}">
                                    <?= mb_strimwidth($ratingNews->news->title, 0, 35, "...") ?>
                                </a>
                                <span class="short-text hidden-sm hidden-xs"><?= mb_strimwidth($ratingNews->news->short_content, 0, 55, "...") ?></span>
                                <span class="detail-other pull-right">
                                    <button class="pull-right btn btn-default {{ $ratingNews->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $ratingNews->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                </span>
                            </div>
                        @endforeach
                    @endif
                    @if(count($user->ratingNews) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Интервью</h4>
                        @foreach($user->ratingInterview as $ratingInterview)
                            <div class="one-last-active">
                                <a href="{{ route('interviewView', ['alias' => $ratingInterview->interview->alias, 'id' => $ratingInterview->interview->id]) }}">
                                    <img src="{{ asset("img/interviews/{$ratingInterview->interview->image}") }}" alt="{{ $ratingInterview->interview->title }}" title="{{ $ratingInterview->interview->title }}" />
                                </a>
                                <a class="last-active-title" href="{{ route('interviewView', ['alias' => $ratingInterview->interview->alias, 'id' => $ratingInterview->interview->id]) }}">
                                    <?= mb_strimwidth($ratingInterview->interview->title, 0, 35, "...") ?>
                                </a>
                                <span class="short-text hidden-sm hidden-xs"><?= mb_strimwidth($ratingInterview->interview->short_content, 0, 55, "...") ?></span>
                                <span class="detail-other pull-right">
                                    <button class="pull-right btn btn-default {{ $ratingInterview->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $ratingInterview->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                    @if(count($user->ratingLyrics) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Тексты песен</h4>
                        @foreach($user->ratingLyrics as $ratingLyrics)
                            <div class="one-last-active">
                                <a class="last-active-title last-active-title-lyrics" href="{{ route('lyricsView', ['alias' => $ratingLyrics->lyrics->alias, 'id' => $ratingLyrics->lyrics->id]) }}">
                                    <?= mb_strimwidth($ratingLyrics->lyrics->artist_name . ' - ' . $ratingLyrics->lyrics->lyrics_name, 0, 45, "...") ?>
                                </a>
                                <span class="detail-other detail-other-lyrics pull-right">
                                    <button class="pull-right btn btn-default {{ $ratingLyrics->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $ratingLyrics->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                    @if(count($user->ratingArticles) >= 1)
                        <div class="clearfix"></div>
                        <hr />
                        <h4>Статьи</h4>
                        @foreach($user->ratingArticles as $ratingArticle)
                            <div class="one-last-active">
                                <a href="{{ route('articleView', ['alias' => $ratingArticle->articles->alias, 'id' => $ratingArticle->articles->id]) }}">
                                    <img src="{{ asset("img/articles/{$ratingArticle->articles->image}") }}" alt="{{ $ratingArticle->articles->title }}" title="{{ $ratingArticle->articles->title }}" />
                                </a>
                                <a class="last-active-title" href="{{ route('articleView', ['alias' => $ratingArticle->articles->alias, 'id' => $ratingArticle->articles->id]) }}">
                                    <?= mb_strimwidth($ratingArticle->articles->title, 0, 35, "...") ?>
                                </a>
                                <span class="short-text hidden-sm hidden-xs"><?= mb_strimwidth($ratingArticle->articles->short_content, 0, 55, "...") ?></span>
                                <span class="detail-other pull-right">
                                    <button class="pull-right btn btn-default {{ $ratingArticle->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $ratingArticle->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        @endforeach
                    @endif
                </div>
                <div class="clearfix"></div>
            </section>
        </div>
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
@show

@include('layouts.section.footer')