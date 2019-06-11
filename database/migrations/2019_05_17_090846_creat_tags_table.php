<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tags', function (Blueprint $table) {
          $table->Increments('id');
          $table->string('name',20)->unique();
          $table->text('description')->nullable();
          $table->text('pic')->nullable();

          $table->softDeletes();
          $table->timestamps();


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
