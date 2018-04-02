@include('layouts.section.header_home')
@include('layouts.menu')

@section('content')
    <section>
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs pull-left">
            <img class="pull-left" src="/img/2pac.png" alt="" />
        </div>
        <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 center-text">
            <h1>RAP-TIME - Сайт о Хип-Хопе</h1>
            <p>
                Добро пожаловать на сайт посвященный оригинальному и действительно неповторимому музыкальному стилю - рэп.
                В нас на сайте есть всьо о твоем любимом рэпере - биография, новости, альбомы и многое другое.
                Узнай историю Хип-Хопа, историю войны запада и востока, в нас есть все от 2pac-а до kizaru.
                Будь в курсе всех новостий из мира рэпа, все самое актуальное и новое в нас на сайте.
                Настоящий ценитель Хип-Хоп культуры точно найдет для себя очень много чего полезного.
            </p>
        </div>
        <div class="col-lg-2 pull-right hidden-md hidden-sm hidden-xs">
            <img class="pull-right" src="/img/big.png" alt="" />
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="popul-block">
        <h2>Популярные исполнители</h2>
    </div>
    <section>
        <div class="container">
            <div class="carusel-artist">
                <div class="artiste-popul-one">
                    <a href="#">
                        <img src={{ asset('img/1.jpg') }}>
                        <span>Kizaru</span>
                    </a>
                </div>
                <div class="artiste-popul-one">
                    <a href="#">
                        <img src="img/2.jpg">
                        <span>ATL</span>
                    </a>
                </div>
                <div class="artiste-popul-one">
                    <a href="#">
                        <img src="img/3.jpg">
                        <span>Oxxxymiron</span>
                    </a>
                </div>
                <div class="artiste-popul-one">
                    <a href="#">
                        <img src="img/4.jpg">
                        <span>Migos</span>
                    </a>
                </div>
                <div class="artiste-popul-one">
                    <a href="#">
                        <img src="img/5.jpg">
                        <span>Lil pump</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="col-lg-12">
                <div class="popul-block">
                    <h3>Популярные альбомы</h3>
                </div>
                <div class="carusel-album">
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb1.jpg">
                            <span>
                                <?= mb_strimwidth('Guf & Slim - Gulsi2ssaddassad2222daasd22', 0, 20, "...") ?>
                            </span>
                        </a>
                    </div>
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb2.jpg"><span>Грот - Ледокол ВЕГА</span></a>
                    </div>
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb3.jpg"><span>Kizaru - Яд</span></a>
                    </div>
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb4.jpg"><span>ATL - Дисторшн</span></a>
                    </div>
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb3.jpg"><span>Kizaru - Яд</span></a>
                    </div>
                    <div class="album-popul-one">
                        <a href="#"><img src="img/alb2.jpg"><span>Грот - Ледокол ВЕГА</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="popul-block">
                    <h3>Последние новости</h3>
                </div>
                <div class="last-news">
                    <div class="one-last-news">
                        <h4><a href="#">Сегодня рэпер Кизару выпустил альбом "Яд". sadsdasad asdsdasdadsa  assad</a></h4>
                        <img class="one-last-news-img" src="img/alb3.jpg">
                        <div class="short-text">
                            <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 455, "...") ?>
                        </div>
                        <div class="clearfix"></div>
                        <span class="detail-other pull-left">
                            <i class="fa far fa-eye"> 22</i>  |
                            <i class="fa far fa-calendar"> 2018-03-22</i> |
                            <i class="fa fas fa-heart"> 2</i>
                        </span>
                        <span class="detail-other pull-right">
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                        </span>
                        <div class="clearfix"></div>
                        <a href="#"><div class="detail-news-button">Читать далее</div></a>
                    </div>
                    <div class="one-last-news">
                        <h4><a href="#">Сегодня рэпер Кизару выпустил альбом "Яд".</a></h4>
                        <img class="one-last-news-img" src="img/alb3.jpg">
                        <div class="short-text">
                            <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 455, "...") ?>
                        </div>
                        <div class="clearfix"></div>
                        <span class="detail-other pull-left">
                            <i class="fa far fa-eye"> 22</i>  |
                            <i class="fa far fa-calendar"> 2018-03-22</i> |
                            <i class="fa fas fa-heart"> 2</i>
                        </span>
                        <span class="detail-other pull-right">
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                        </span>
                        <div class="clearfix"></div>
                        <a href="#"><div class="detail-news-button">Читать далее</div></a>
                    </div>
                    <div class="one-last-news">
                        <h4><a href="#">Сегодня рэпер Кизару выпустил альбом "Яд".</a></h4>
                        <img class="one-last-news-img" src="img/alb3.jpg">
                        <div class="short-text">
                            <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 455, "...") ?>
                        </div>
                        <div class="clearfix"></div>
                        <span class="detail-other pull-left">
                            <i class="fa far fa-eye"> 22</i>  |
                            <i class="fa far fa-calendar"> 2018-03-22</i> |
                            <i class="fa fas fa-heart"> 2</i>
                        </span>
                        <span class="detail-other pull-right">
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                        </span>
                        <div class="clearfix"></div>
                        <a href="#"><div class="detail-news-button">Читать далее</div></a>
                    </div>
                    <div class="one-last-news">
                        <h4><a href="#">Сегодня рэпер Кизару выпустил альбом "Яд".</a></h4>
                        <img class="one-last-news-img" src="img/alb3.jpg">
                        <div class="short-text">
                        <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 455, "...") ?>
                        </div>
                        <div class="clearfix"></div>
                        <span class="detail-other pull-left">
                            <i class="fa far fa-eye"> 22</i>  |
                            <i class="fa far fa-calendar"> 2018-03-22</i> |
                            <i class="fa fas fa-heart"> 2</i>
                        </span>
                        <span class="detail-other pull-right">
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                            <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                        </span>
                        <div class="clearfix"></div>
                        <a href="#"><div class="detail-news-button">Читать далее</div></a>
                     </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="last-interview">
                    <div class="popul-block">
                        <h3>Последние интервью</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-interview">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                                <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-interview-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-interview">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-interview-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-interview">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-interview-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-interview">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-interview-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                </div>
                <div class="last-text">
                    <div class="popul-block">
                        <h3>Популярные тексты песен</h3>
                    </div>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>
                    <a href="#">
                        <?= mb_strimwidth('Kizaru - Делаю все ч213213213123 фыввфы то хочу', 0, 40, "...") ?>
                        <span class="hidden-xs pull-right view"><i class="fa far fa-eye"></i> 22</span>
                    </a>

                </div>
                <div class="last-article">
                    <div class="popul-block">
                        <h3>Популярные статьи</h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-article">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-article-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-article">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-article-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-article">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-article-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="one-last-article">
                            <h4>
                                <a href="#">
                                    <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 50, "...") ?>
                                </a>
                            </h4>
                            <img src="img/alb3.jpg" alt="">
                            <div class="short-text">
                                <?= mb_strimwidth(' Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!Наконецто дождалить мы альбома ЯД, целых три переноса
                        релиза и сегодня наконецто выходит долгожданный альбом. Наконецто дождалить мы альбома ЯД, целых три переноса
                        Поздравляю фанатов!!', 0, 130, "...") ?>
                            </div>
                            <div class="clearfix"></div>
                            <span class="detail-other pull-left">
                                <i class="fa far fa-eye"> 22</i>  |
                                <i class="fa fas fa-heart"> 2</i>
                            </span>
                            <span class="detail-other pull-right">
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-up"></i></button>
                                <button class="btn btn-default"><i class="fa fas fa-thumbs-down"></i></button>
                            </span>
                            <div class="clearfix"></div>
                            <a href="#"><div class="detail-article-button">Подробнее</div></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <br/>
@show

@include('layouts.section.footer')