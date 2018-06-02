@include('admin.layouts.section.header')

@include('admin.layouts.section.aside')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <h2>Добавить исполнителя</h2>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminDashboardIndex') }}">Главная</a></li>
                <li><a href="{{ route('adminArtistIndex') }}">Исполнители</a></li>
                <li class="active">Добавить исполнителя</li>
            </ol>
        </section>
        @if ($errors->any())
            <div class="my-alert-block">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <section class="content">
            <form action="{{ route('adminArtistCreate') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4>Детальная информация</h4>
                <div class="form-group">
                    <label for="fullNameArtist">Полное имя</label>
                    <input type="text" class="form-control" id="fullNameArtist" minlength="3" maxlength="70" name="full_name" placeholder="Полное имя" />
                </div>
                <div class="form-group">
                    <label for="birthdayArtist">День рождение</label>
                    <input type="date" class="form-control" id="birthdayArtist" name="birthday" />
                </div>
                <div class="form-group">
                    <label for="locationArtist">Место рождение</label>
                    <input type="text" class="form-control" id="locationArtist" minlength="3" maxlength="100" name="location" placeholder="Место рождение" />
                </div>
                <p class="help-block">Не заполнять если это группа.</p>
                <hr />
                <div class="form-group">
                    <label for="nicknameArtist">Название артиста (группи)</label>
                    <input type="text" class="form-control" id="nicknameArtist" minlength="2" maxlength="120" name="nickname" placeholder="Название артиста (группи)" required/>
                </div>
                <div class="form-group">
                    <label for="shortTextArtist">Короткий текст</label>
                    <input type="text" class="form-control" id="shortTextArtist" minlength="3" maxlength="255" name="short_text" placeholder="Короткий текст" />
                    <p class="help-block">Что-то что отражает суть исполнителя (группи).</p>
                </div>
                <div class="form-group">
                    <label for="biographyArtist">Биография</label>
                    <textarea class="form-control" id="biographyArtist" name="biography" minlength="5" placeholder="Биография" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <label for="imageArtist">Изображение</label>
                    <input type="file" id="imageArtist" name="image" />
                    <p class="help-block">Рекомендуемый размер изображение 300х300px.</p>
                </div>
                <div class="form-group">
                    <label for="aliasArtist">Ссылка</label>
                    <input type="text" class="form-control" id="aliasArtist" name="alias"  minlength="3" maxlength="255" placeholder="Ссылка" required/>
                    <p class="help-block">Ссылка которая будет отображаться в url.</p>
                </div>
                <div class="form-group">
                    <label for="categoryArtist">Категория</label>
                    <select class="form-control" id="categoryArtist" name="category_id">
                        <option></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" /> Отображать
                    </label>
                </div>
                <hr />
                <h4>Ссылки на социальные сети и сайты</h4>
                <div class="form-group">
                    <label for="officialSiteArtist">Офицальный сайт</label>
                    <input type="text" class="form-control" id="officialSiteArtist" minlength="3" name="official_site" placeholder="Офицальный сайт" />
                </div>
                <div class="form-group">
                    <label for="fanSiteArtist">Фан-сайт</label>
                    <input type="text" class="form-control" id="fanSiteArtist" minlength="3" name="fan_site" placeholder="Фан-сайт" />
                </div>
                <div class="form-group">
                    <label for="socialVkArtist">Вконтакте</label>
                    <input type="text" class="form-control" id="socialVkArtist" minlength="3" name="social_vk" placeholder="Вконтакте" />
                </div>
                <div class="form-group">
                    <label for="socialFacebookArtist">Facebook</label>
                    <input type="text" class="form-control" id="socialFacebookArtist" minlength="3" name="social_facebook" placeholder="Facebook" />
                </div>
                <div class="form-group">
                    <label for="socialInstagramArtist">Instagram</label>
                    <input type="text" class="form-control" id="socialInstagramArtist" minlength="3" name="social_instagram" placeholder="Instagram" />
                </div>
                <div class="form-group">
                    <label for="socialTwitterArtist">Twitter</label>
                    <input type="text" class="form-control" id="socialTwitterArtist" minlength="3" name="social_twitter" placeholder="Twitter" />
                </div>
                <div class="form-group">
                    <label for="socialSoundcloudArtist">Soundcloud</label>
                    <input type="text" class="form-control" id="socialSoundcloudArtist" minlength="3" name="social_soundcloud" placeholder="Soundcloud" />
                </div>
                <div class="form-group">
                    <label for="socialYoutubeArtist">Youtube</label>
                    <input type="text" class="form-control" id="socialYoutubeArtist" minlength="3" name="social_youtube" placeholder="Youtube" />
                </div>
                <hr />
                <h4>SEO</h4>
                <div class="form-group">
                    <label for="titleSeoArtist">Title</label>
                    <input type="text" class="form-control" id="titleSeoArtist" name="title_seo"  minlength="5" maxlength="150" placeholder="Title seo" required/>
                </div>
                <div class="form-group">
                    <label for="descriptionSeoArtist">Description</label>
                    <textarea class="form-control" id="descriptionSeoArtist" name="description_seo"  minlength="5" maxlength="255" placeholder="Description seo" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </section>

    </div>
@show
<script>
    var editor = CKEDITOR.replace( 'biographyArtist' );
</script>
@include('admin.layouts.section.footer')