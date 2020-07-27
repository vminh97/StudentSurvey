<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersoncompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personcompany', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_company')->unsigned();
            $table->foreign('id_company')->references('id')->on('company')->onDelete('cascade');
            $table->Text('Name',50);
            $table->date('DateBirth');
            $table->integer('Phone',10);
            $table->text('Email');
            $table->text('position');
            $table->text('ResponsibleWork');
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
        Schema::dropIfExists('personcompany');
    }
}
