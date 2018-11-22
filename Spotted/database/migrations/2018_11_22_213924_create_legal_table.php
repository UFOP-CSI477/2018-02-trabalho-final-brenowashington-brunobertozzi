<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal', function (Blueprint $table) {
            $table->increments('cod_legal');
            $table->integer('id');
            $table->foreign('id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('cod_post');
            $table->foreign('cod_post')->references('cod_post')->on('post')->onDelete('cascade');
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
        Schema::dropIfExists('legal');
    }
}
