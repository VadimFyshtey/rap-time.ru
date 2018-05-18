<?php

use Illuminate\Database\Seeder;
use App\Models\Album;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class AlbumsSeeder extends Seeder
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
        Album::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            Album::create([
                'artist_name' => $this->faker->randomElement(
                    [
                        'Eminem',
                        'Lil pump',
                        'Kizaru',
                        'Каста',
                        'Lil peep',
                        'Баста'
                    ]),
                'album_name' => $this->faker->randomElement(
                    [
                        'Яд',
                        'Шпек',
                        'Улица 36',
                        'Звезда',
                        'Никто не нужен',
                        'Для своих'
                    ]),
                'short_text' => 'Что-то заглавное.',
                'short_content' => 'Короткий текст альбома.',
                'full_content' => 'Полный текст альбома.',
                'image' => 'no-image.png',
                'alias' => $this->faker->unique()->randomNumber(),
                'status' => 1,
                'category_id' => $this->faker->randomElement(['1', '2']),
                'link_first' => $this->faker->randomNumber(),
                'link_second' => $this->faker->randomNumber(),
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'title_seo' => 'title альбома',
                'description_seo' => 'description альбома',
            ]);
        }
    }
}
