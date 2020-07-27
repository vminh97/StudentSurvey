<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKssvoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kssvo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_stterm')->unsigned();
            $table->foreign('id_stterm')->references('id')->on('stterm')->onDelete('cascade');
            $table->integer('id_question')->unsigned();
            $table->foreign('id_question')->references('id')->on('question')->onDelete('cascade');
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
        Schema::dropIfExists('kssvo');
    }
}
