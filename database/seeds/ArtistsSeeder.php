<?php

use Illuminate\Database\Seeder;
use App\Models\Artists;
use Faker\Factory;

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
        Artists::truncate();

        $i = 0;
        while ($i++ < 20) {
            Artists::create([
                'nickname' => $this->faker->randomElement(['Eminem', 'Lil pump', 'Kizaru', 'Каста', 'Lil peep', 'Баста']),
                'full_name' => $this->faker->randomElement(['Иван Грозный', 'Микола Файный', 'Игор Далекий', 'Миша Вареный', 'Гриша Небесный']),
                'birthday' => $this->faker->date('Y-m-d'),
                'location' => $this->faker->randomElement(['Украина', 'Россия', 'США', 'Канада', 'Австралия']),
                'short_text' => 'Здесь будет что-то остроумное',
                'biography' => 'Здесь будет биография твоего любимого рэперка',
                'image' => 'no-image.png',
                'official_site' => 'http://www.eminem.com/',
                'fan_site' => 'http://kizaru.com.ru/',
                'social_vk' => 'https://vk.com/k_i_z_a_r_u',
                'social_facebook' => 'https://www.facebook.com/eminem',
                'social_instagram' => 'https://www.instagram.com/eminem/',
                'social_twitter' => 'https://twitter.com/eminem',
                'social_soundcloud' => 'https://soundcloud.com/search?q=eminem',
                'social_youtube' => 'https://www.youtube.com/user/EminemVEVO',
                'status' => 1,
            ]);
        }
    }
}
