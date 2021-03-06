<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKsteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kste', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_teacher')->unsigned();
            $table->foreign('id_teacher')->references('id')->on('teacher')->onDelete('cascade');
            $table->integer('id_question')->unsigned();
            $table->foreign('id_question')->references('id')->on('question')->onDelete('cascade');
            $table->integer('id_survey')->unsigned();
            $table->foreign('id_survey')->references('id')->on('survey')->onDelete('cascade');
            $table->text('answer'); 
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
        Schema::dropIfExists('kste');
    }
}
