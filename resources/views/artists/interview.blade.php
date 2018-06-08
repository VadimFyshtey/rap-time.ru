@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>{{ $artistInterviews->nickname }} - Все интервью</h1>
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
                                <a itemprop="item" title="{{ $artistInterviews->nickname }}" href="{{ route('artistView', ['alias' => $artistInterviews->alias]) }}">
                                    <span itemprop="name">{{ $artistInterviews->nickname }}</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </span>
                        </li>
                        <li class="active">
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a rel="nofollow" itemprop="item" title="Все интервью">
                                    <span itemprop="name">Все интервью</span>
                                    <meta itemprop="position" content="3">
                                </a>
                            </span>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
                    <h3>Популярные интервью</h3>
                    @foreach($popularInterviews as $popular)
                        <h5>
                            <a href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <?= mb_strimwidth($popular->title , 0, 55, "...") ?>
                            </a>
                        </h5>
                        <a rel="nofollow" href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                            <img src="{{ asset("img/interviews/{$popular->image}") }}" alt="{{ $popular->artist_name }} - {{ $popular->album_name }}" title="{{ $popular->artist_name }} - {{ $popular->album_name }}"  />
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
                    @foreach($artistInterviews->interviews as $interview)
                        <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <img class="pull-left" src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}"  />
                            <a class="news-title" href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}" title="{{ $interview->title }}">
                                {{ $interview->title }}
                            </a>
                            <p class="short-text">
                                {{ $interview->short_content }}
                            </p>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($interview->updated_at)->format('Y-m-d')}}</i> |
                                <i class="fa far fa-eye"> {{ $interview->view }}</i> |
                                <i class="fa fas fa-heart"> {{ $interview->rate_count }}</i>
                            </span>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}">Читать далее</a>
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
                            {{ $artistInterviews->interviews()->paginate($limit)->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')