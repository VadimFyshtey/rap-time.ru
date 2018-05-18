<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned()->index();
            $table->integer('artist_id')->unsigned()->index();

            $table->unique(['album_id', 'artist_id']);
        });

        Schema::table('albums_artists', function($table) {
            $table->foreign('album_id')->references('id')->on('albums');
        });

        Schema::table('albums_artists', function($table) {
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
        Schema::dropIfExists('albums_artists');
    }
}
