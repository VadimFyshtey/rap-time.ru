<?php

use Illuminate\Database\Seeder;
use App\Models\Lyrics;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class LyricsSeeder extends Seeder
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
        Lyrics::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            Lyrics::create([
                'artist_name' => $this->faker->randomElement(
                    [
                        'Eminem & Lil Wayne',
                        'Lil pump',
                        'Kizaru',
                        'Каста',
                        'Lil peep',
                        'Баста и AK-47',
                        'Lil Wayne'
                    ]),
                'lyrics_name' => $this->faker->randomElement(
                    [
                        'Жулики',
                        'На районе',
                        'Мой дом',
                        'Good Night',
                        'Сучка',
                        'Курим много'
                    ]),
                'text' => 'Текст песни.',
                'translate' => 'Перевод песни.',
                'alias' => $this->faker->unique()->randomNumber(),
                'status' => 1,
                'category_id' => $this->faker->randomElement(['1', '2']),
                'view' => $this->faker->numberBetween($min = 50, $max = 99999),
                'video_url' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/-504g71bBE0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
                'title_seo' => 'title песни',
                'description_seo' => 'description песни',
            ]);
        }
    }
}
