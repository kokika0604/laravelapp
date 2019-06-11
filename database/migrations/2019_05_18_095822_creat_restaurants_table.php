<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('restaurants', function (Blueprint $table) {
          $table->Increments('id');
          $table->string('name',100)->unique();
          $table->string('email',100)->unique();
          $table->string('password',300);
          $table->string('phone',15)->unique();
          $table->integer('lunch_low_cost')->nullable();
          $table->integer('lunch_high_cost')->nullable();
          $table->integer('course_low_cost')->nullable();
          $table->integer('course_high_cost')->nullable();
          $table->string('postcode',7);
          $table->unsignedInteger('mtb_prefecture_id');
          $table->text('address1');
          $table->text('address2');
          $table->text('business_hour');
          $table->string('short_description',200)->nullable();
          $table->text('long_description')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('mtb_prefecture_id')->references('id')->on('mtb_prefectures');

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
