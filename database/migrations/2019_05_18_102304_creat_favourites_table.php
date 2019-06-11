<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('favourites', function (Blueprint $table) {
          $table->Increments('id');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('restaurant_id');
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        //
    }
}
