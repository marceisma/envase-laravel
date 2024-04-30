<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('nombre_fantasía')->nullable();
            $table->string('cuit');
            $table->string('codigo_iae')->nullable();
            $table->string('dirección_postal')->nullable();
            $table->string('pagina_web')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->string('redes_sociales');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
