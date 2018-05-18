<?php

use Illuminate\Database\Seeder;
use App\Models\Relationships\InterviewArtists;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class InterviewsArtistsSeeder extends Seeder
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
        InterviewArtists::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $i = 0;
        while ($i++ < 50) {
            InterviewArtists::create([
                'interview_id' =>  $this->faker->unique()->numberBetween($min = 1, $max = 50),
                'artist_id' =>  $this->faker->numberBetween($min = 1, $max = 50),
            ]);
        }
    }
}
