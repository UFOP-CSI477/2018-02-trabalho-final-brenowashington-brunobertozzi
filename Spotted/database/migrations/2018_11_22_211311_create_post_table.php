<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('cod_post');
            $table->integer('id');
            $table->foreign('id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->mediumText('texto');
            $table->integer('cod_img')->nullable();
            $table->foreign('cod_img')->references('cod_img')->on('fotos')->onDelete('cascade');
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
        Schema::dropIfExists('post');
    }
}
