<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->bigIncrements('idDireccion');
            $table->string('nombreDireccion');
            $table->string('direccionDireccion');
            $table->string('telefonoDireccion');
            $table->string('nombreDireccion');
            $table->unsignedBigInteger('idCiudad');
            $table
                ->foreign('idCiudad')
                ->references('idCiudad')
                ->on('ciudads');
            $table->unsignedBigInteger('idEmprendedor');
            $table
                ->foreign('idEmprendedor')
                ->references('idEmprendedor')
                ->on('emprendedors');
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
        Schema::dropIfExists('direccions');
    }
}
