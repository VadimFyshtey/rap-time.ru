@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <section>
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs pull-left">
            <img class="pull-left" src="{{ asset("img/2pac.png") }}" alt="Rap-Time" title="Rap-Time" />
        </div>
        <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 center-text">
            <h1>RAP-TIME - Сайт о Хип-Хопе</h1>
            <p>
                Добро пожаловать на сайт посвященный оригинальному и действительно неповторимому музыкальному стилю - рэп.
                В нас на сайте Вы найдёте - биографии, новости, альбомы, тексты песен и многое другое.
                Будь в курсе всех новостей из мира рэпа, все самые актуальное и интересные темы в нас на сайте.
                Настоящий ценитель Хип-Хоп культуры точно найдет для себя очень много чего полезного.
            </p>
        </div>
        <div class="col-lg-2 pull-right hidden-md hidden-sm hidden-xs">
            <img class="pull-right" src="{{ asset("img/big.png") }}" alt="Rap-Time" title="Rap-Time" />
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="popul-block">
        <h2>Популярные исполнители</h2>
    </div>
    <section>
        <div class="container">
            <div class="carusel-artist">
                @foreach($artists as $artist)
                <div class="artiste-popul-one">
                    <a href="{{ route('artistView', ['alias' => $artist->alias]) }}">
                        <img src="{{ asset("img/artists/{$artist->image }") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}">
                        <span>{{ $artist->nickname }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="col-lg-12">
                <div class="popul-block">
                    <h3>Популярные альбомы</h3>
                </div>
                <div class="carusel-album">
                    @foreach($albums as $album)
                    <div class="album-popul-one">
                        <a href="{{ route('albumView', ['alias' => $album->alias, 'id' => $album->id]) }}">
                            <img src="{{ asset("img/albums/{$album->image}") }}" alt="{{ $album->artist_name }} - {{ $album->album_name }}" title="{{ $album->artist_name }} - {{ $album->album_name }}" />
                            <span>
                                <?= mb_strimwidth($album->artist_name . ' - ' . $album->album_name, 0, 20, "...") ?>
                            </span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="popul-block">
                    <h3>Последние новости</h3>
                </div>
                <div class="last-news">
                    @foreach($news as $item)
                    <div class="one-last-news">
                        <h4><a href="{{ route('newsView', ['alias' => $item->alias, 'id' => $item->id]) }}">{{ $item->title }}</a></h4>
                        <img class="one-last-news-img" src="{{ asset("img/news/$item->image") }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                        <div class="short-text">
                           {{ $item->short_content }}
                        </div>
                        <div class="clearfix"></div>
                        <span class="detail-other pull-left">
                            <i class="fa far fa-eye"> {{ $item->view }}</i>  |
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa fas fa-heart"> {{ $item->rate_count }}</i>
                        </span>
                        <span class="detail-other pull-right">
                            @if($item->ratingNews === null || $item->ratingNews->user_id !== Auth::id())
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-news' : '' }}" data-news-id="{{ $item->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                                <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-news' : '' }}" data-news-id="{{ $item->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                            @elseif($item->ratingNews->user_id === Auth::id())
                                <button class="pull-right btn btn-default {{ $item->ratingNews->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                                <button class="pull-right btn btn-default {{ $item->ratingNews->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                            @endif
                        </span>
                        <div class="clearfix"></div>
                        <a href="{{ route('newsView', ['alias' => $item->alias, 'id' => $item->id]) }}"><div class="detail-news-button">Читать далее</div></a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="last-interview">
                    <div class="popul-block">
                        <h3>Последние интервью</h3>
                    </div>
                    @foreach($interviews as $interview)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-interview">
                            <h4>
                                <a href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}">
                                    <?= mb_strimwidth($interview->title, 0, 45, "...") ?>
                                </a>
                            </h4>
                            <img src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}">
                            <div class="short-text">
                                <?= mb_strimwidth($interview->short_content, 0, 90, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> {{ $interview->view }}</i>  |
                                <i class="fa fas fa-heart"> {{ $interview->rate_count }}</i>
                            </span>
                            <span class="detail-other pull-right">
                                @if($interview->ratingInterviews === null || $interview->ratingInterviews->user_id !== Auth::id())
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-interview' : '' }}" data-interview-id="{{ $interview->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-interview' : '' }}" data-interview-id="{{ $interview->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                @elseif($interview->ratingInterviews->user_id === Auth::id())
                                    <button class="pull-right btn btn-default {{ $interview->ratingInterviews->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-down"></i>
                                    </button>
                                    <button class="pull-right btn btn-default {{ $interview->ratingInterviews->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                        <i class="fa fas fa-thumbs-up"></i>
                                    </button>
                                @endif
                            </span>
                            <div class="clearfix"></div>
                            <a href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}"><div class="detail-interview-button">Подробнее</div></a>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <br/>
                </div>
                <div class="last-text">
                    <div class="popul-block">
                        <h3>Популярные тексты песен</h3>
                    </div>
                    @foreach($lyrics as $item)
                        <a href="{{ route('lyricsView', ['alias' => $item->alias, 'id' => $item->id]) }}">
                            <?= mb_strimwidth($item->artist_name . ' - ' . $item->lyrics_name, 0, 40, "...") ?>
                            <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> {{ $item->view }}</span>
                        </a>
                    @endforeach
                </div>
                <div class="last-article">
                    <div class="popul-block">
                        <h3>Популярные статьи</h3>
                    </div>
                    @foreach($articles as $article)
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-article">
                            <h4>
                                <a href="{{ route('articleView', ['alias' => $article->alias, 'id' => $article->id]) }}">
                                    <?= mb_strimwidth($article->title, 0, 45, "...") ?>
                                </a>
                            </h4>
                            <img src="{{ asset("img/articles/{$article->image}") }}" alt="{{ $article->title }}" title="{{ $article->title }}">
                            <div class="short-text">
                                <?= mb_strimwidth($article->short_content, 0, 90, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> {{ $article->view }}</i>  |
                                <i class="fa fas fa-heart"> {{ $article->rate_count }}</i>
                            </span>
                            <span class="detail-other pull-right">
                                  @if($article->ratingArticles === null || $article->ratingArticles->user_id !== Auth::id())
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-article' : '' }}" data-article-id="{{ $article->id }}" value="1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                                    <button class="btn btn-default btn-rate {{ Auth::check() ? 'like-article' : '' }}" data-article-id="{{ $article->id }}" value="-1" {{ !Auth::check() ? 'data-toggle=modal data-target=#modal-login' : '' }}>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                                @elseif($article->ratingArticles->user_id === Auth::id())
                                    <button class="pull-right btn btn-default {{ $article->ratingArticles->rate === -1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-down"></i>
                                </button>
                                    <button class="pull-right btn btn-default {{ $article->ratingArticles->rate === 1 ? 'active' : 'no-active' }}" disabled>
                                    <i class="fa fas fa-thumbs-up"></i>
                                </button>
                                @endif
                            </span>
                            <div class="clearfix"></div>
                            <a href="{{ route('articleView', ['alias' => $article->alias, 'id' => $article->id]) }}">
                                <div class="detail-article-button">Подробнее</div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <br/>
@show

@include('layouts.section.footer')