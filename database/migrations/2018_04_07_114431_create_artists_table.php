<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('full_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('location')->nullable();
            $table->string('short_text')->nullable();
            $table->text('biography')->nullable();
            $table->string('image')->nullable()->default('no-image.png');
            $table->string('alias')->unique()->index();
            $table->string('official_site')->nullable();
            $table->string('fan_site')->nullable();
            $table->string('social_vk')->nullable();
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_soundcloud')->nullable();
            $table->string('social_youtube')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('rate_count')->default(0);
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('view')->default(0);
            $table->string('title_seo', 150);
            $table->string('description_seo', 255);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('artists', function($table) {
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
        Schema::dropIfExists('artists');
    }
}
