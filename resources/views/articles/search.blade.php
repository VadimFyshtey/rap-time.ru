@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>Поиск по статьям: {{ $q }}</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('articleIndex') }}">Статьи</a></li>
                        <li class="active">{{ $q }}</li>
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
                        <a href="{{ route('articleView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
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
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="news-all">
                    @if(count($articles) >= 1)
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
                                <a class="button-detail" href="{{ route('articleView', ['alias' => $article->alias, 'id' => $article->id]) }}">Читать далее</a>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                        @endforeach
                            <div class="clearfix"></div>
                            <div class="my-pagination">
                                {{  $articles->render() }}
                            </div>
                    @else
                        <h5>Поиск не дал результатов.</h5>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')