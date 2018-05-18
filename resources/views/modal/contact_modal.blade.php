<div class="modal fade modal-contact" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                <h4>Обратная связь</h4>
                <section class="col-lg-8 col-lg-offset-2">
                    <form action="{{ route('contact') }}" method="post" class="form-contact" name="form-contact">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="col">
                                <label for="contact-email">E-mail:</label>
                                <input type="email" id="contact-email" name="contactEmail" class="form-control" placeholder="Ваш e-mail" value="{{ Auth::check() ? Auth::user()->email : '' }}" required/>
                            </div>
                            <div class="col">
                                <label for="subject">Тема письма:</label>
                                <input minlength="5" maxlength="100" type="text" id="subject" name="contactSubject" class="form-control" placeholder="Тема письма" required/>
                            </div>
                            <div class="col">
                                <label for="contact-text">Текст сообщения:</label>
                                <textarea minlength="10" maxlength="2000" id="contact-text" name="contactText" class="form-control" placeholder="Ваше сообщение..." rows="6" required></textarea>
                            </div>
                            <br/>
                            <input type="submit" value="Отправить" class="btn btn-primary" />
                        </div>
                    </form>
                </section>
            </div>
            <div class="clearfix"></div>
            <br />
        </div>
    </div>
</div>
