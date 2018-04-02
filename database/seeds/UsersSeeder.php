<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Admin',
            'email' => 'test@mail.ru',
            'password' => '11111111'
        ]);
    }
}