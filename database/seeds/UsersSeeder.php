<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
            'name' => 'Admin',
            'email' => 'test@mail.ru',
            'password' => bcrypt('11111111'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Nino',
            'email' => 'test1@mail.ru',
            'password' => bcrypt('11111111'),
            'role_id' => 2
        ]);

    }
}