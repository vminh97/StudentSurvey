<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NameBranch');
            $table->integer('id_faculty')->unsigned();
            $table->foreign('id_faculty')->references('id')->on('faculty_tables')->onDelete('cascade');  
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
        Schema::dropIfExists('branch');
    }
}
