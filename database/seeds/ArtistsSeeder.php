<?php

use Illuminate\Database\Seeder;
use App\Models\Artist;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ArtistsSeeder extends Seeder
{

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('ru_RU');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Artist::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            Artist::create([
                'nickname' => $this->faker->randomElement(['Eminem', 'Lil pump', 'Kizaru', 'Каста', 'Lil peep', 'Баста']),
                'full_name' => $this->faker->randomElement(['Иван Грозный', 'Микола Файный', 'Игор Далекий', 'Миша Вареный', 'Гриша Небесный']),
                'birthday' => $this->faker->date('Y-m-d'),
                'location' => $this->faker->randomElement(['Украина', 'Россия', 'США', 'Канада', 'Австралия']),
                'short_text' => 'Здесь будет что-то остроумное',
                'biography' => 'Здесь будет биография твоего любимого рэперка',
                'image' => 'no-image.png',
                'alias' => $this->faker->unique()->randomNumber(),
                'official_site' => 'http://www.eminem.com/',
                'fan_site' => 'http://kizaru.com.ru/',
                'social_vk' => 'https://vk.com/k_i_z_a_r_u',
                'social_facebook' => 'https://www.facebook.com/eminem',
                'social_instagram' => 'https://www.instagram.com/eminem/',
                'social_twitter' => 'https://twitter.com/eminem',
                'social_soundcloud' => 'https://soundcloud.com/search?q=eminem',
                'social_youtube' => 'https://www.youtube.com/user/EminemVEVO',
                'status' => 1,
                'category_id' => $this->faker->randomElement(['1', '2']),
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'title_seo' => 'title артиста',
                'description_seo' => 'description артиста',
            ]);
        }
    }
}
