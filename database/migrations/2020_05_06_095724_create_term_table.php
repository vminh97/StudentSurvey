<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameTerm');
            $table->integer('id_branch')->unsigned();
            $table->foreign('id_branch')->references('id')->on('branch')->onDelete('cascade');
            $table->integer('NumberCredit');
            $table->integer('NumberTheory');
            $table->integer('NumberPractice');
            $table->integer('NumberExam');
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
        Schema::dropIfExists('term');
    }
}
