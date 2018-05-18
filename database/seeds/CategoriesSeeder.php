<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
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
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Category::create([
            'title' => 'Русские',
            'status' => 1,
            'alias' => 'russkiye',

        ]);

        Category::create([
            'title' => 'Зарубежные',
            'status' => 1,
            'alias' => 'zarubezhnyye',
        ]);
    }
}
