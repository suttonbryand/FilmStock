<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('rating_id')->unsigned()->nullable();

            $table->integer('parent_comment_id')->unsigned()->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('movie_id')->unsigned()->nullable();

            // For episode ratings
            $table->integer('episode_number')->nullable();
            $table->integer('season_number')->nullable();
            $table->integer('tv_id')->nullable();            

            $table->text('body')->nullable();
            $table->boolean('is_like')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
