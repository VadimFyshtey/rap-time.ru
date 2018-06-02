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
        <h2>Информация о проекте.</h2>
    </div>
    <section>
        <div class="col-lg-12">
            <div class="errors-block">
                <p>Проект был создан в 2018 году.</p>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <br/>
@show

@include('layouts.section.footer')