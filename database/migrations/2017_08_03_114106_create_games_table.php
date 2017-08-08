<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    protected $_defaultRatingChange = '0';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_a_id')->unsigned();
            $table->integer('user_b_id')->unsigned();
            $table->integer('user_a_score');
            $table->integer('user_b_score');
            $table->double('user_a_rating_change')->default($this->_defaultRatingChange);
            $table->double('user_b_rating_change')->default($this->_defaultRatingChange);
            $table->timestamps();

            $table->foreign('user_a_id')->references('id')->on('users');
            $table->foreign('user_b_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
