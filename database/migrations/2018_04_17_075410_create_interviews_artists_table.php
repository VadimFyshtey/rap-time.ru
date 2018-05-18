<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews_artists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interview_id')->unsigned()->index();
            $table->integer('artist_id')->unsigned()->index();

            $table->unique(['interview_id', 'artist_id']);
        });

        Schema::table('interviews_artists', function($table) {
            $table->foreign('interview_id')->references('id')->on('interviews');
        });

        Schema::table('interviews_artists', function($table) {
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
        Schema::dropIfExists('interviews_artists');
    }
}
