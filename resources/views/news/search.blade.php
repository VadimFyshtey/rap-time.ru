@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>Поиск по новостям: {{ $q }}</h1>
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
                                <a itemprop="item" title="Новости" href="{{ route('newsIndex') }}">
                                    <span itemprop="name">Новости</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </span>
                        </li>
                        <li class="active">
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a rel="nofollow" itemprop="item" title="{{ $q }}">
                                    <span itemprop="name">{{ $q }}</span>
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
                    <h3>Поиск по новостям</h3>
                    <form method="get" accept-charset="" action="{{ route('newsSearch') }}" id="h-search">
                        <input id='search' type="text" placeholder="Введите что-то" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="news-sidebar">
                    <h3>Категории</h3>
                    @foreach($categories as $category)
                        <a rel="nofollow" href="{{ route('newsCategory', ['alias' => $category->alias, 'id' => $category->id]) }}">{{ $category->title }}</a>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
                    <h3>Популярные новости</h3>
                    @foreach($popularNews as $popular)
                        <h5>
                            <a href="{{ route('newsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}"><?= mb_strimwidth($popular->title , 0, 45, "...") ?></a>
                        </h5>
                        <a rel="nofollow" href="{{ route('newsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                            <img src="{{ asset("img/news/{$popular->image}") }}" alt="{{ $popular->title }}" title="{{ $popular->title }}"  />
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
                    @if(count($news) >= 1)
                        @foreach($news as $item)
                            <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <img class="pull-left" src="{{ asset("img/news/{$item->image}") }}" alt="{{ $item->title }}" title="{{ $item->title }}"  />
                                <a class="news-title" href="{{ route('newsView', ['alias' => $item->alias, 'id' => $item->id]) }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                                <p class="short-text">
                                    {{ $item->short_content }}
                                </p>
                                <span class="detail-other pull-left">
                                    <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d')}}</i> |
                                    <i class="fa far fa-eye"> {{ $item->view }}</i> |
                                    <i class="fa fas fa-heart"> {{ $item->rate_count }}</i>
                                </span>
                                <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                                <a rel="nofollow" class="button-detail" href="{{ route('newsView', ['alias' => $item->alias, 'id' => $item->id]) }}">Читать далее</a>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                        @endforeach
                            <div class="clearfix"></div>
                            <div class="my-pagination">
                                {{  $news->render() }}
                            </div>
                    @else
                        <h5>Поиск не дал результатов.</h5>
                    @endif
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')