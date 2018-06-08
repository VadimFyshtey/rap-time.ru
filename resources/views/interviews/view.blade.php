@include('layouts.section.header')
@include('layouts.components.menu')

@section('content')
    <div class="container">
        <section class="news-view">
            <div class="col-lg-12">
                <div itemscope="" itemtype="http://schema.org/BreadcrumbList">
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
                                <a itemprop="item" title="Интервью" href="{{ route('interviewIndex') }}">
                                    <span itemprop="name">Интервью</span>
                                    <meta itemprop="position" content="2">
                                </a>
                            </span>
                        </li>
                        <li class="active">
                            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                <a rel="nofollow" itemprop="item" title="{{ $interview->title }}">
                                    <span itemprop="name">{{ $interview->title }}</span>
                                    <meta itemprop="position" content="3">
                                </a>
                            </span>
                        </li>
                    </ol>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 news-view-block">
                    <h1>{{ $interview->title }}</h1>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 pull-left news-info-image">
                        <img src="{{ asset("img/interviews/{$interview->image}") }}" alt="{{ $interview->title }}" title="{{ $interview->title }}" />
                    </div>
                    @if(!empty($interview->short_text))
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                            {{ $interview->short_text }}
                        </div>
                    @endif
                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 pull-right short-text">
                        <span class="detail-other-view pull-left">
                            <i class="fa fas fa-heart"> {{ $interview->rate_count }}</i>
                        </span>
                        <span class="detail-other detail-other-like pull-right">
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
                        <span class="clearfix"></span>
                        <span class="detail-other-view pull-left">
                            <p><b>Просмотры: </b>{{ $interview->view }}</p>
                            <p><b>Дата публикации: </b>{{ \Carbon\Carbon::parse($interview->updated_at)->format('Y-m-d')}}</p>
                        </span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 full-content">
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
                        {!! $interview->full_content !!}
                        <br />
                        <!-- uSocial -->
                        <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                        <div class="uSocial-Share" data-pid="77366e53d036665f56742ab6d31e844e" data-type="share" data-options="rect,style4,default,absolute,horizontal,size24,eachCounter0,counter0" data-social="vk,fb,twi,telegram,gPlus,ok,bookmarks" data-mobile="vi,wa,sms"></div>
                        <!-- /uSocial -->
                    </div>
                    <div class="clearfix"></div>
                    {{--<!-- rap-time reklama -->--}}
                    {{--<ins class="adsbygoogle"--}}
                         {{--style="display:block"--}}
                         {{--data-ad-client="ca-pub-2586863288185463"--}}
                         {{--data-ad-slot="2078150076"--}}
                         {{--data-ad-format="auto"></ins>--}}
                    {{--<script>--}}
                        {{--(adsbygoogle = window.adsbygoogle || []).push({});--}}
                    {{--</script>--}}
                    <hr />
                    <div class="other-item">
                        <p>Возможно Вам будет интересно:</p>
                        <ul>
                            @foreach($otherInterviews as $otherInterview)
                                <a href="{{ route('interviewView', ['alias' => $otherInterview->alias, 'id' => $otherInterview->id]) }}"><li>{{ $otherInterview->title }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 2))
                        <div class="clearfix"></div>
                        <a href="{{ route('adminInterviewEdit', ['id' => $interview->id]) }}" rel="nofollow" target="_blank" class="edit-admin-link">
                            <i class="glyphicon glyphicon-edit"></i>
                            Редактировать
                        </a>
                    @endif
                    <div class="clearfix"></div>
                    <hr />
                    <div class="comments">
                        @if(Auth::check() && Auth::user()->is_banned === 0)
                            @include('layouts.components.comments.comment-form', ['item' => $interview, 'route' => 'interviewCommentSave'])
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
                        <p>Коментарии ({{ count($interview->comments) }})</p>
                        @if(count($interview->comments) > 0)
                            @foreach($comments as $k => $comment)
                                @if($k !== 0)
                                    @break
                                @endif
                                @include('layouts.components.comments.comment', ['items' => $comment, 'post_id' => 'interview_id', 'routeDelete' => 'interviewCommentDelete'])
                            @endforeach
                        @elseif (count($interview->comments) === 0)
                            <p class="no-auth-comment"> Ваш комментарий будет первым.</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 com-sm-12 col-xs-12">
                    @if(count($interview->artists) > 0)
                        <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                            <h3>{{ count($interview->artists) === 1 ? 'Исполнитель' : 'Исполнители' }}</h3>
                            @foreach($interview->artists as $artist)
                                <a href="{{ route('artistView', ['alias' => $artist-> alias]) }}"><img src="{{ asset("img/artists/{$artist->image}") }}" alt="{{ $artist->nickname }}" title="{{ $artist->nickname }}" /></a>
                                <h4><a href="{{ route('artistView', ['alias' => $artist-> alias]) }}">{{ $artist->nickname }}</a></h4>
                                <hr />
                            @endforeach
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 com-sm-12 col-xs-12 news-view-sidebar pull-right">
                        <h3>Популярные интервью</h3>
                        @foreach($popularInterviews as $popular)
                            <h5>
                                <a href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}"><?= mb_strimwidth($popular->title , 0, 45, "...") ?></a>
                            </h5>
                            <a href="{{ route('interviewView', ['alias' => $popular->alias, 'id' => $popular->id]) }}">
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
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 news-view-sidebar hidden-sm hidden-xs pull-right">
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
            </div>
        </section>
    </div>
@show

@include('layouts.section.footer')