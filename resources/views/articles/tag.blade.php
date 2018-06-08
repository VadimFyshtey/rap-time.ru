@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>Статьи по тегу: {{ $tag }}</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <ol class="breadcrumb pull-left">
                        <li>
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Главная" href="{{ route('home') }}">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>
                        </li>
                        <li>
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a itemprop="item" title="Статьи" href="{{ route('articleIndex') }}">
                                    <span itemprop="name">Статьи</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </span>
                        </li>
                        <li class="active">
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a rel="nofollow" itemprop="item" title="{{ $tag }}">
                                    <span itemprop="name">{{ $tag }}</span>
                                    <meta itemprop="position" content="3">
                                </a>
                            </span>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="news-sidebar">
                    <h3>Поиск по статьям</h3>
                    <form method="get" accept-charset="" action="{{ route('articleSearch') }}" id="h-search">
                        <input id='search' type="text" placeholder="Введите что-то" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
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
                <div class="news-sidebar hidden-sm hidden-xs">
                    <h3>Реклама</h3>
                    {{--<br />--}}
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                    {{--<br />--}}
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                    {{--<br />--}}
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="news-all">
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                    @foreach($articles as $article)
                        <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img class="pull-left" src="{{ asset("img/articles/{$article->image}") }}" alt="{{ $article->title }}" title="{{ $article->title }}"  />
                            <a class="news-title" href="{{ route('articleView', ['alias' => $article->alias, 'id' => $article->id]) }}" title="{{ $article->title }}">
                                {{ $article->title }}
                            </a>
                            <p class="short-text">
                                {{ $article->short_content }}
                            </p>
                            <span class="detail-other pull-left">
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($article->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa far fa-eye"> {{ $article->view }}</i> |
                            <i class="fa fas fa-heart"> {{ $article->rate_count }}</i>
                        </span>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('articleView', ['alias' => $article->alias, 'id' => $article->id]) }}">Читать далее</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                        <div class="clearfix"></div>
                        <div class="my-pagination">
                            {{  $articles->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')