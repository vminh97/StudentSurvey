<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKscompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kscompany', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personcom')->unsigned();
            $table->foreign('id_personcom')->references('id')->on('personcompany')->onDelete('cascade');
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
        Schema::dropIfExists('kscompany');
    }
}
