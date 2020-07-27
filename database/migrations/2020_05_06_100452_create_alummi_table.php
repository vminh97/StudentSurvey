<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlummiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alummi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_branch')->unsigned();
            $table->foreign('id_branch')->references('id')->on('branch')->onDelete('cascade');
            $table->year('Course');
            $table->text('NameAlummi',50);
            $table->date('DateBirth');
            $table->integer('Phone',10);
            $table->text('Email');
            $table->boolean('Work');
            $table->integer('id_company')->unsigned();
            $table->foreign('id_company')->references('id')->on('company')->onDelete('cascade');
            $table->text('AddressCompany');
            $table->text('wordcv');
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
        Schema::dropIfExists('alummi');
    }
}
