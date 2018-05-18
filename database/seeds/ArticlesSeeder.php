<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
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
        Article::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            Article::create([
                'title' => $this->faker->randomElement(
                    [
                        'Статьи о Eminem',
                        'Статьи о Lil pump',
                        'Статьи о Kizaru',
                        'Статьи о Каста',
                        'Статьи о Lil peep',
                        'Статьи о Баста'
                    ]),
                'short_text' => 'Что-то заглавное.',
                'short_content' => 'Короткий текст статьи.',
                'full_content' => 'Полный текст статьи.',
                'image' => 'no-image.png',
                'alias' => $this->faker->unique()->randomNumber(),
                'status' => 1,
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'title_seo' => 'title статьи',
                'description_seo' => 'description статьи',
            ]);
        }
    }
}
