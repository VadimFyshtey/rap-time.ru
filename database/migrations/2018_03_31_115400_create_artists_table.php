<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->string('full_name');
            $table->date('birthday')->nullable();
            $table->string('location')->nullable();
            $table->string('short_text')->nullable();
            $table->text('biography')->nullable();
            $table->string('image')->nullable();
            $table->string('alias')->nullable()->unique()->index();
            $table->string('official_site')->nullable();
            $table->string('fan_site')->nullable();
            $table->string('social_vk')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_soundcloud')->nullable();
            $table->string('social_youtube')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
}
