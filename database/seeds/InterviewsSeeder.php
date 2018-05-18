<?php

use Illuminate\Database\Seeder;
use App\Models\Interview;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class InterviewsSeeder extends Seeder
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
        Interview::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            Interview::create([
                'title' => $this->faker->randomElement(
                    [
                        'Eminem интервью',
                        'Lil pump интервью',
                        'Kizaru интервью',
                        'Каста интервью',
                        'Lil peep интервью',
                        'Баста интервью'
                    ]),
                'short_text' => 'Что-то заглавное.',
                'short_content' => 'Короткий текст интервью.',
                'full_content' => 'Полный текст интервью.',
                'image' => 'no-image.png',
                'alias' => $this->faker->unique()->randomNumber(),
                'status' => 1,
                'category_id' => $this->faker->randomElement(['1', '2']),
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'title_seo' => 'title интервью',
                'description_seo' => 'description интервью',
            ]);
        }
    }
}
