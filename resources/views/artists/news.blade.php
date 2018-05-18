@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>{{ $artistNews->nickname }} все новости</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li><a href="{{ route('artistView', ['alias' => $artistNews->alias]) }}">{{ $artistNews->nickname }}</a></li>
                        <li class="active">Все новости</li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
                    <h3>Популярные новости</h3>
                    @foreach($popularNews as $popular)
                        <h5>
                            <a rel="nofollow" href="{{ route('newsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                                <?= mb_strimwidth($popular->title , 0, 55, "...") ?>
                            </a>
                        </h5>
                        <a rel="nofollow" href="{{ route('newsView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                            <img src="{{ asset("img/news/{$popular->image}") }}" alt="{{ $popular->artist_name }} - {{ $popular->album_name }}" title="{{ $popular->artist_name }} - {{ $popular->album_name }}"  />
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
                    @foreach($artistNews->news as $news)
                        <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a rel="nofollow" class="news-title" href="{{ route('newsView', ['alias' => $news->alias, 'id' => $news->id]) }}" title="{{ $news->title }}">
                                {{ $news->title }}
                            </a>
                            <img class="pull-left" src="{{ asset("img/news/{$news->image}") }}" alt="{{ $news->title }}" title="{{ $news->title }}"  />
                            <p class="short-text">
                                {{ $news->short_content }}
                            </p>
                            <span class="detail-other pull-left">
                            <i class="fa far fa-calendar"> {{ \Carbon\Carbon::parse($news->updated_at)->format('Y-m-d')}}</i> |
                            <i class="fa far fa-eye"> {{ $news->view }}</i> |
                            <i class="fa fas fa-heart"> {{ $news->rate_count }}</i>
                        </span>
                            <div class="clearfix hidden-lg hidden-md hidden-sm"><br/></div>
                            <a rel="nofollow" class="button-detail" href="{{ route('newsView', ['alias' => $news->alias, 'id' => $news->id]) }}">Читать далее</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr />
                    @endforeach
                        <div class="clearfix"></div>
                        <div class="my-pagination">
                            {{ $artistNews->news()->paginate($limit)->render() }}
                        </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')