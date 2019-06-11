<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('menus', function (Blueprint $table) {
          $table->Increments('id');
          $table->text('name');
          $table->integer('price');
          $table->integer('tax_excluded_flg')->default('0');
          $table->text('description')->nullable();
          $table->text('pic')->nullable();
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
