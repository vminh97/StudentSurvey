<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTetermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teterm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_teacher')->unsigned();
            $table->foreign('id_teacher')->references('id')->on('teacher')->onDelete('cascade');  
            $table->integer('id_class')->unsigned();
            $table->foreign('id_class')->references('id')->on('class')->onDelete('cascade');  
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
        Schema::dropIfExists('teterm');
    }
}
