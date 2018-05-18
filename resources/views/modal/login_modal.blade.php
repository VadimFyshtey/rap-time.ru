<div class="modal fade modal-login" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img src="{{ asset('img/logo.png') }}" alt="Rap-Time" title="Rap-Time" />
            </div>
            <div class="modal-body">
                <div class="print-error-msg" hidden>
                    <ul></ul>
                </div>
                <h4>Вход</h4>
                <section class="col-lg-8 col-lg-offset-2">
                    <form action="{{ route('login') }}" method="POST" name="form-login" class="form-login">
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <input type="email" name="email-login" placeholder="Введите ваш email" required/>
                        </div>
                        <div class="col-lg-12">
                            <input type="password" name="password-login" placeholder="Введите ваш пароль" required/>
                        </div>
                        <div class="col-lg-12 remember-block">
                            <label>
                                <input type="checkbox" name="remember" />
                                Запомнить меня
                            </label>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">Ввойти</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modal-register">Регистрация</button>
                <button type="button" class="btn btn-warning pull-left" data-toggle="modal" data-target="#modal-forgot">Востановление пароля</button>
                <div class="social-auth pull-right">
                    <a href="{{ url('/auth/google') }}" rel="nofollow"><img src="{{ asset('img/social/google.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
                    <a href="{{ url('/auth/facebook') }}" rel="nofollow"><img src="{{ asset('img/social/facebook.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
                    <a href="{{ url('/auth/twitter') }}" rel="nofollow"><img src="{{ asset('img/social/twitter.png') }}" alt="Rap-Time" title="Rap-Time" /></a>
                </div>
            </div>
        </div>
    </div>
</div>