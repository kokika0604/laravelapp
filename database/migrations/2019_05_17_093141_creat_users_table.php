<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->text('name');
          $table->string('email',100)->unique();
          $table->string('password',300);
          $table->text('phone')->nullable();
          $table->string('postcode',7)->nullable();
          $table->unsignedInteger('mtb_prefecture_id')->nullable();
          $table->text('address1')->nullable();
          $table->text('address2')->nullable();
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
