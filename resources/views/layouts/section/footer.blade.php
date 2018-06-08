<footer>
    <div class="container">
        <div class="col-lg-6">
        <div class="col-lg-12 col-md-4 hidden-sm hidden-xs pull-left text-footer">
            <p>
                Hip-Hop - жанр родом из Америки.
                Места, которые подарили нам это великолепный жанр в народе называют гетто.
                Именно родом из гетто одни из лутчих рэп-исполнителей всех времен.
                Когда-то рэп слушали только "чёрные кварталы", а на данный момент
                рэп как жанр музыки очень вырос и слушают эго разные слои население.
            </p>
        </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-7 pull-right">
            <ul>
                <h5>О ПРОЕКТЕ</h5>
                <a href="{{ route('info') }}" rel="nofollow"><li>Информация о проекте</li></a>
                <a href="{{ route('contactPage') }}" rel="nofollow"><li>Контакты</li></a>
                <a href="{{ route('advertising') }}" rel="nofollow"><li>Размещение рекламы</li></a>
                <a href="{{ route('copyright') }}" rel="nofollow"><li>Правообладателям</li></a>
            </ul>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-5 pull-right footer-auth-block">
            <ul>
                <h5>ПОЛЬЗОВАТЕЛЬ</h5>
                @if(!Illuminate\Support\Facades\Auth::check())
                    <a href="{{ route('register') }}" data-toggle="modal" data-target="#modal-register" rel="nofollow">
                        <li>Регистрация</li>
                    </a>
                    <a href="{{ route('login') }}" data-toggle="modal" data-target="#modal-login" rel="nofollow">
                        <li>Вход</li>
                    </a>
                @else
                    <a rel="nofollow" href="{{ route('profileIndex', ['id' => Auth::id()]) }}">
                        <li>Мой аккаунт</li>
                    </a>
                @endif
                <a data-toggle="modal" data-target="#modal-contact" rel="nofollow">
                    <li>Обратная связь</li>
                </a>
            </ul>
        </div>
        <div class="footer-social-icon col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a class="pull-left animate-social-icon" href="{{ env('TELEGRAM_LINK') }}" target="_blank" rel="nofollow"><img src="{{ asset('img/social/telegram.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
            <a class="pull-left animate-social-icon" href="{{ env('YOUTUBE_LINK') }}" target="_blank" rel="nofollow"><img src="{{ asset('img/social/youtube.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
            <a class="pull-left animate-social-icon" href="{{ env('VKONTAKTE_LINK') }}" target="_blank" rel="nofollow"><img src="{{ asset('img/social/vk.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
            <a class="pull-left animate-social-icon" href="{{ env('FACEBOOK_LINK') }}" target="_blank" rel="nofollow"><img src="{{ asset('img/social/facebook.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
        </div>
    </div>
    <section class="bottom-footer">
        <p>2018 - {{ date('Y') }} <a rel="nofollow" href="{{ route('home') }}">rap-time.ru</a> by <a href="{{ route('embit88') }}" rel="nofollow">Embit88</a></p>
    </section>
</footer>
</body>
</html>