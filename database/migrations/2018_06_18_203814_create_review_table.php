<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('review', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('calification');
          $table->string('latitud');
          $table->string('longitud');
          $table->string('decription');
          $table->string('plac_id');
          $table->string('cate_id');
          $table->string('valoration');

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
      Schema::dropIfExists('review');

    }
}
