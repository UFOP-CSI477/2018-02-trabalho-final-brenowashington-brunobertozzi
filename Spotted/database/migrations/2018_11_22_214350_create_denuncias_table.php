<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->increments('id_denuncia');
            $table->integer('id');
            $table->integer('cod_post')->nullable();
            $table->foreign('cod_post')->references('cod_post')->on('post')->onDelete('cascade');
            $table->integer('cod_sussurro')->nullable();
            $table->foreign('cod_sussurro')->references('cod_sussurro')->on('sussurros')->onDelete('cascade');
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
        Schema::dropIfExists('denuncias');
    }
}
