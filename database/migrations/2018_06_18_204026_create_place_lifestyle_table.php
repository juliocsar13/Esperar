<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceLifestyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('place_lifestyle', function (Blueprint $table) {
          $table->increments('plli_id');
          $table->string('plac_id');
          $table->string('life_id');
          $table->string('deleted_at');
          $table->rememberToken();
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
      Schema::dropIfExists('place_lifestyle');
    }
}
