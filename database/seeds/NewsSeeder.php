<?php

use Illuminate\Database\Seeder;
use App\Models\News;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
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
        News::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            News::create([
                'title' => $this->faker->randomElement(
                    [
                        'Eminem выпуснил новый сингл',
                        'Lil pump выпуснил новый сингл',
                        'Kizaru выпуснил новый сингл',
                        'Каста выпуснил новый сингл',
                        'Lil peep выпуснил новый сингл',
                        'Баста выпуснил новый сингл'
                    ]),
                'short_text' => 'Что-то заглавное.',
                'short_content' => 'Короткий текст новости.',
                'full_content' => 'Полный текст новости.',
                'alias' => $this->faker->unique()->randomNumber(),
                'status' => 1,
                'category_id' => $this->faker->randomElement(['1', '2']),
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'title_seo' => 'title новости',
                'description_seo' => 'description новости',
            ]);
        }
    }
}
