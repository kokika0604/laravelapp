<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRestaurantsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('restaurants_tags', function (Blueprint $table) {
          $table->Increments('id');
          $table->unsignedInteger('restaurant_id');
          $table->unsignedInteger('tag_id');
          $table->timestamp('created_at')->useCurrent();
          $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
          $table->SoftDeletes();
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
          $table->foreign('tag_id')->references('id')->on('tags');

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
