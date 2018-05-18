<div class="modal fade modal-forgot" id="modal-forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                <h4>Восстановление пароля</h4>
                <section class="col-lg-8 col-lg-offset-2">
                    <form action="{{ route('password.email') }}" method="POST" name="form-forgot" class="form-forgot">
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <input type="email" name="email-forgot" placeholder="Введите ваш email" required/>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">Отправить ссылку на сброс пароля</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-toggle="modal" data-target="#modal-register">Регистрация</button>
                <button type="button" class="btn btn-warning pull-left" data-toggle="modal" data-target="#modal-login">Вход</button>
            </div>
        </div>
    </div>
</div>