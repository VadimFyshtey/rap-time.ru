<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->index();
            $table->integer('artist_id')->unsigned()->index();

            $table->unique(['article_id', 'artist_id']);
        });

        Schema::table('articles_artists', function($table) {
            $table->foreign('article_id')->references('id')->on('articles');
        });

        Schema::table('articles_artists', function($table) {
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
        Schema::dropIfExists('articles_artists');
    }
}
