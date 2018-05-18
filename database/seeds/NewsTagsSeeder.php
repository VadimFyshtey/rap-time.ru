<?php

use Illuminate\Database\Seeder;
use App\Models\Relationships\NewsTags;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class NewsTagsSeeder extends Seeder
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
        NewsTags::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            NewsTags::create([
                'news_id' =>  $this->faker->unique()->numberBetween($min = 1, $max = 50),
                'tag' =>  $this->faker->randomElement(['Versus', 'lil uzi', 'bloods', 'crips', 'gang', 'rip', 'best rapper', 'xxl']),
            ]);
        }
    }
}
