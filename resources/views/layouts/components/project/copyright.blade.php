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
                В нас на сайте есть Вы найдёте - биографии, новости, альбомы, тексты песен и многое другое.
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
        <h2>Правообладателям</h2>
    </div>
    <section>
        <div class="col-lg-12">
            <div class="info-block">
                <p>Администрация ресурса негативно относится к нарушению авторских прав в любом из его проявлений.</p>

                <p>Поэтому, если Вы имеете:</p>
                <ul>
                    <li>право на воспроизведение;</li>
                    <li>право на публичный показ;</li>
                    <li>право на доведение до всеобщего сведения;</li>
                    <li>любое другое право на контект;</li>
                </ul>

                <p>
                    И эти права были нарушены на страницах ресурса rap-time.ru, мы просим
                    Вас без промедления отправить электронное письмо в службу рассмотрения жалоб.
                </p>

                <p><b>Контакты:</b></p>
                <p>Почта: <a href="mailto:{{ env('MAIL_ADMIN') }}" target="_blank" rel="nofollow">{{ env('MAIL_ADMIN') }}</a></p>
                <p>Телеграм: <a target="_blank" rel="nofollow" href="{{ env('TELEGRAM_ADMIN') }}">здесь</a></p>
                <p></p>
                <div class="clearfix"></div>



            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <br/>
@show

@include('layouts.section.footer')