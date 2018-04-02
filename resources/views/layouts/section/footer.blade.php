<footer>
    <div class="container">
        <div class="col-lg-6">
        <div class="col-lg-12 col-md-4 hidden-sm hidden-xs pull-left text-footer">
            <p>
                Hip-Hop - жанр родом из Америки.
                Места которые подарили нам это великолепный жанр в народе называют гетто.
                Иммено из родом из гетто самые лутшые рэп-исполнители всех времен.
                Когда-то и слушали рэп только "Чорные кварталы", а на данный момент
                рэп как жанр музыки очень вырос и слушают эго разные слои населенние.
            </p>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 pull-right">
            <ul>
                <h5>О ПРОЕКТЕ</h5>
                <a href="#" rel="nofollow"><li>Информация о проекте</li></a>
                <a href="#" rel="nofollow"><li>Контакты</li></a>
                <a href="#" rel="nofollow"><li>Размещение рекламы</li></a>
                <a href="#" rel="nofollow"><li>Правообладателям</li></a>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-5 pull-right footer-auth-block">
            <ul>
                <h5>ПОЛЬЗОВАТЕЛЬ</h5>
                @if(!Illuminate\Support\Facades\Auth::check())
                    <a href="{{ route('register') }}" data-toggle="modal" data-target="#modal-register" rel="nofollow"><li>Регистрация</li></a>
                    <a href="{{ route('login') }}" data-toggle="modal" data-target="#modal-login" rel="nofollow"><li>Вход</li></a>
                @else
                    <a href="#"><li>Мой аккаунт</li></a>
                @endif
                <a href="#" rel="nofollow"><li>Обратная связь</li></a>
            </ul>
        </div>
        <div class="footer-social-icon col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="pull-left animate-social-icon" href="https://t.me/rap_american" target="_blank" rel="nofollow"><img src="/img/telegram.png" alt=""></a>
            <a class="pull-left animate-social-icon" href="https://www.youtube.com/channel/UCJ86fLVg90qjqbZmnt0uyYw" target="_blank" rel="nofollow"><img src="/img/youtube.png" alt=""></a>
            <a class="pull-left animate-social-icon" href="https://vk.com/vadim_xd" target="_blank" rel="nofollow"><img src="/img/vk.png" alt=""></a>
            <a class="pull-left animate-social-icon" href="https://vk.com/vadim_xd" target="_blank" rel="nofollow"><img src="/img/facebook.png" alt=""></a>
        </div>
    </div>
    <section class="bottom-footer">
        <p>2018 - {{ date('Y') }} <a href="/">rap-time.ru</a> by <a href="#" rel="nofollow">88</a></p>
    </section>
</footer>
<!--[if lt IE 9]>
<script src="{{ asset('js/ie.js') }}"></script>
<![endif]-->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>