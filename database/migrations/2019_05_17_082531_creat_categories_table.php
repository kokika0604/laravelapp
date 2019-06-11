<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categories', function (Blueprint $table) {
          $table->Increments('id');
          $table->string('name',100)->unique();
          $table->text('description')->nullable();
          $table->text('pic')->nullable();
          $table->unsignedInteger('parent_id')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('parent_id')->references('id')->on('categories');
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
