<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->unsigned()->index();
            $table->integer('artist_id')->unsigned()->index();

            $table->unique(['news_id', 'artist_id']);
        });

        Schema::table('news_artists', function($table) {
            $table->foreign('news_id')->references('id')->on('news');
        });

        Schema::table('news_artists', function($table) {
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
        Schema::dropIfExists('news_artists');
    }
}
