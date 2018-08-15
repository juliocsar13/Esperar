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
            $table->increments('plac_id');
            $table->string('name');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('valoration');
            $table->string('calification');
            $table->string('description');
            $table->string('slug');
            $table->rememberToken();
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
