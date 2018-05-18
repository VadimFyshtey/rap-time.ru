<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class CreateUsersTable extends Migration
{

    const ROLE_ID = 3;

    public function getRoleId($role = 'User')
    {
        $roleId = Role::where('name', $role)->pluck('id')->first();
        if(empty($roleId)) {
            $roleId = self::ROLE_ID;
        }
        return $roleId;
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password', 60)->nullable();
            $table->string('avatar')->nullable()->default('/img/uploads/profile/avatar.png');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('role_id')->unsigned()->default($this->getRoleId('User'));
            $table->boolean('is_banned')->nullable()->unsigned()->default(0);
            $table->string('comment')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
