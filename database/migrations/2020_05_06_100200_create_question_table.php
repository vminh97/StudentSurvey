<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_survey')->unsigned();
            $table->foreign('id_survey')->references('id')->on('survey')->onDelete('cascade'); 
            $table->text('NameQuestion',250);
            $table->text('PAA',250);
            $table->text('PAB',250);
            $table->text('PAC',250);
            $table->text('PAD',250);
            $table->text('PAE',250);
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
        Schema::dropIfExists('question');
    }
}
