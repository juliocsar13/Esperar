<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('place', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('contry');
          $table->string('province');
          $table->string('city');
          $table->string('latitud');
          $table->string('longitud');
          $table->string('valoration');
          $table->string('calification');
          $table->string('description');
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
      Schema::dropIfExists('place');
    }
}
