<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short_text')->nullable();
            $table->string('short_content');
            $table->text('full_content');
            $table->string('image')->nullable()->default('no-image.png');;
            $table->string('alias')->index();
            $table->integer('category_id')->nullable()->unsigned();
            $table->boolean('status')->default(0);
            $table->integer('view')->default(0);
            $table->integer('rate_count')->default(0);
            $table->string('title_seo', 150);
            $table->string('description_seo', 255);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::table('interviews', function($table) {
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
        Schema::dropIfExists('interviews');
    }
}
