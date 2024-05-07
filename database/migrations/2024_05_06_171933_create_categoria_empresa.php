<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->unsignedBigInteger('id_categorias_empresa')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_empresa')->references('id')->on('empresa');
            $table->foreign('id_categorias_empresa')->references('id')->on('categorias_empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_empresa');
    }
}
