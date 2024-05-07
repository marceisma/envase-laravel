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

            $table->string('cuit')->nullable();
            $table->string('codigo_iae')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('nombre_fantasia')->nullable();

            $table->unsignedBigInteger('id_pais')->nullable();
            $table->unsignedBigInteger('id_provincia')->nullable();
            $table->unsignedBigInteger('id_ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('ciudad')->nullable();

            $table->string('codigo_postal')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('recibe_email')->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('exportador')->nullable();
            $table->boolean('importador')->nullable();
            $table->boolean('representante')->nullable();
            $table->boolean('distribuidor')->nullable();
            $table->boolean('fabricante')->nullable();
            
            //$table->string('redes_sociales');

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
