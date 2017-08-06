<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('played_games')->unsigned()->default(0);
            $table->integer('games_won')->unsigned()->default(0);
            $table->integer('games_lost')->unsigned()->default(0);
            $table->integer('games_drawn')->unsigned()->default(0);
            $table->integer('goals_scored')->unsigned()->default(0);
            $table->integer('goals_against')->unsigned()->default(0);
            $table->integer('goal_difference')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
