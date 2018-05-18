<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::create([
            'name' => 'SuperAdmin',
            'description' => 'SuperAdmin role'
        ]);

        Role::create([
            'name' => 'Administrator',
            'description' => 'Administrator role'
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'User role'
        ]);

    }
}
