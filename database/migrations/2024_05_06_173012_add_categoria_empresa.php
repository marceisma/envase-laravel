<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_empresa', function (Blueprint $table) {

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_empresa')->references('id')->on('empresa');
            $table->foreign('id_categorias_empresa')->references('id')->on('categorias_empresa');
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
