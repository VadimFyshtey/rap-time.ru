<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLyricsArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lyrics_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lyrics_id')->unsigned()->index();
            $table->integer('artist_id')->unsigned()->index();

            $table->unique(['lyrics_id', 'artist_id']);
        });

        Schema::table('lyrics_artists', function($table) {
            $table->foreign('lyrics_id')->references('id')->on('lyrics');
        });

        Schema::table('lyrics_artists', function($table) {
            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lyrics_artists');
    }
}
