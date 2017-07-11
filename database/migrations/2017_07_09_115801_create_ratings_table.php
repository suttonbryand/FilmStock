<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->tinyInteger('score');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('movie_id')->unsigned();

            $table->string('media_type');

            // For episode ratings
            $table->integer('episode_number')->nullable();
            $table->integer('season_number')->nullable();
            $table->integer('tv_id')->nullable();

            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
