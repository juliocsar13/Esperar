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
            $table->increments('revi_id');
            $table->string('name');
            $table->string('calification');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('description');
            $table->string('plac_id');
            $table->string('cate_id');
            $table->string('valoration');
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
