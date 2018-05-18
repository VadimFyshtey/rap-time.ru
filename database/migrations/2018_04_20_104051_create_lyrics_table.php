<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateLyricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lyrics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artist_name');
            $table->string('lyrics_name');
            $table->text('text');
            $table->text('translate')->nullable();
            $table->string('alias')->index();
            $table->integer('category_id')->nullable()->unsigned();
            $table->boolean('status')->default(0);
            $table->integer('view')->default(0);
            $table->integer('rate_count')->default(0);
            $table->string('video_url')->nullable();
            $table->string('title_seo', 255)->nullable();
            $table->string('description_seo', 255)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('lyrics', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lyrics');
    }
}
