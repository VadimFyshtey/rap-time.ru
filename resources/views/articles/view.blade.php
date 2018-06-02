@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-view">
            <div class="col-lg-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li><a href="{{ route('articleIndex') }}">Статьи</a></li>
                    <li class="active">{{ $article->title }}</li>
                </ol>
                <div class="clearfix"></div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 news-view-block">
                    <h1>{{ $article->title }}</h1>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-left news-info-image">
                        <img src="{{ asset("img/articles/{$article->image}") }}" alt="{{ $article->title }}" title="{{ $article->title }}" />
                    </div>
                    @if(!empty($article->short_text))
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                            {{ $article->short_text }}
                        </div>
                    @endif
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                        <span class="detail-other-view pull-left">
                            <i class="fa fas fa-heart"> {{ $article->rate_count }}</i>
                        </span>
                        <span class="detail-other detail-other-like pull-right">
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
                        <span class="clearfix"></span>
                        <span class="detail-other-view pull-left">
                            <p><b>Просмотры: </b>{{ $article->view }}</p>
                            <p><b>Дата публикации: </b>{{ \Carbon\Carbon::parse($article->updated_at)->format('Y-m-d')}}</p>
                        </span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full-content">
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

                         {!! $article->full_content !!}
                    </div>
                    @if(count($article->tags) > 0)
                        <div class="tag-box">
                            <div class="clearfix"></div>
                            <b>Теги:</b>
                            @foreach($article->tags as $tag)
                                    <a rel="nofollow" class="one-tag" href="{{ route('articleTags', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a>
                            @endforeach
                        </div>
                    @endif
                    <hr />
                    <!-- rap-time reklama -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2586863288185463"
                         data-ad-slot="2078150076"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <div class="other-item">
                        <p>Возможно Вам будет интересно:</p>
                        <ul>
                            @foreach($otherArticles as $otherArticle)
                                <a href="{{ route('articleView', ['alias' => $otherArticle->alias, 'id' => $otherArticle->id]) }}"><li>{{ $otherArticle->title }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
                        <div class="clearfix"></div>
                        <a href="{{ route('adminArticleEdit', ['id' => $article->id]) }}" rel="nofollow" target="_blank" class="edit-admin-link">
                            <i class="glyphicon glyphicon-edit"></i>
                            Редактировать
                        </a>
                    @endif
                    <div class="clearfix"></div>
                    <hr />
                    <div class="comments">
                        @if(Auth::check() && Auth::user()->is_banned === 0)
                            @include('layouts.components.comments.comment-form', ['item' => $article, 'route' => 'articleCommentSave'])
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
                        <p>Коментарии ({{ count($article->comments) }})</p>
                        @if(count($article->comments) > 0)
                            @foreach($comments as $k => $comment)
                                @if($k !== 0)
                                    @break
                                @endif
                                @include('layouts.components.comments.comment', ['items' => $comment, 'post_id' => 'article_id', 'routeDelete' => 'articleCommentDelete'])
                            @endforeach
                        @elseif (count($article->comments) === 0)
                            <p class="no-auth-comment"> Ваш комментарий будет первым.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 com-sm-12 col-xs-12">
                    @if(count($article->artists) > 0)
                        <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                            <h3>{{ count($article->artists) === 1 ? 'Исполнитель' : 'Исполнители' }}</h3>
                            @foreach($article->artists as $artist)
                                <a href="{{ route('artistView', ['alias' => $artist-> alias]) }}"><img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" /></a>
                                <h4><a href="{{ route('artistView', ['alias' => $artist-> alias]) }}">{{ $artist->nickname }}</a></h4>
                                <hr />
                            @endforeach
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                        <h3>Популярные статьи</h3>
                        @foreach($popularArticles as $popular)
                            <h5>
                                <a href="{{ route('articleView', ['alias' => $popular->alias, 'id' => $popular->id]) }}"><?= mb_strimwidth($popular->title , 0, 45, "...") ?></a>
                            </h5>
                            <a rel="nofollow" href="{{ route('articleView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <img src="{{ asset("img/articles/{$popular->image}") }}" alt="{{ $popular->title }}" title="{{ $popular->title }}"  />
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