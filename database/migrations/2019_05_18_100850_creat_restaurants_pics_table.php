<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRestaurantsPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('restaurant_pics', function (Blueprint $table) {
          $table->Increments('id');
          $table->integer('rank');
          $table->text('pic');
          $table->integer('main_flg')->default('0');
          $table->unsignedInteger('restaurant_id');
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');

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
