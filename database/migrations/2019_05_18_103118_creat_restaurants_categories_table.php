<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRestaurantsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('restaurants_categories', function (Blueprint $table) {
          $table->Increments('id');
          $table->unsignedInteger('restaurant_id');
          $table->unsignedInteger('category_id');
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        //
    }
}
