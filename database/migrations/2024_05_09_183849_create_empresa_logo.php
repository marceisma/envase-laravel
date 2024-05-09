<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_logo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_empresa')->nullable();

            $table->string('name')->nullable();
            $table->string('path')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_empresa')->references('id')->on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_logo');
    }
}
