@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-list">
            <h1>Интервью рэперов</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-block">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        <li class="active">Интервью</li>
                    </ol>
                    @include('layouts.components.sort')
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
                <div class="news-sidebar">
                    <h3>Поиск по интервью</h3>
                    <form method="get" accept-charset="" action="{{ route('interviewSearch') }}" id="h-search">
                        <input id='search' type="text" placeholder="Введите что-то" name="q" />
                        <input type="submit" value="" />
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="news-sidebar">
                    <h3>Категории</h3>
                    @foreach($categories as $category)
                        <a rel="nofollow" href="{{ route('interviewCategory', ['alias' => $category->alias, 'id' => $category->id]) }}">{{ $category->title }}</a>
                        <div class="clearfix"></div>
                    @endforeach
                </div>
                <div class="news-sidebar popular-news hidden-sm hidden-xs">
                    <h3>Популярные интервью</h3>
                    @foreach($popularInterviews as $popular)
                        <h5>
                            <a rel="nofollow" href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}"><?= mb_strimwidth($popular->title , 0, 45, "...") ?></a>
                        </h5>
                        <a rel="nofollow" href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
                            <img src="{{ asset("img/interviews/{$popular->image}") }}" alt="{{ $popular->title }}" title="{{ $popular->title }}"  />
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
                @foreach($interviews as $interview)
                    <div class="news-one col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a rel="nofollow" class="news-title" href="{{ route('interviewView', ['alias' => $interview->alias, 'id' => $interview->id]) }}" title="{{ $interview->title }}">
                            {{ $interview->title }}
                        </a>
                        <img class="pull-left" src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}"  />
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
                    <div class="clearfix"></div>
                    <div class="my-pagination">
                        {{  $interviews->render() }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </div>
    <br/>
@show

@include('layouts.section.footer')