<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendedors', function (Blueprint $table) {
            $table->bigIncrements('idEmprendedor');
            $table->string('identificacionEmprendedor');
            $table->string('nombreEmprendedor')->nullable();
            $table->string('apellidoEmprendedor')->nullable();
            $table->string('correoEmprendedor')->unique();
            $table->boolean('estadoEmprendedor');
            $table->string('razonSocialEmprendedor')->nullable();
            $table->string('contrasenaEmprendedor');
            $table->string('tipoEmprendedor');
            $table->string('codigoEmprendedor')->nullable();
            $table->string('paginaWebEmprendedor')->nullable();
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
        Schema::dropIfExists('emprendedors');
    }
}
