<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('idCompra');
            $table->unsignedBigInteger('idEmprendedor');
            $table
                ->foreign('idEmprendedor')
                ->references('idEmprendedor')
                ->on('emprendedors');
            $table->unsignedBigInteger('idElemento');
            $table
                ->foreign('idElemento')
                ->references('idElemento')
                ->on('elementos');
            $table->integer('cantidadCompra');
            $table->integer('calificacionCompra')->nullable();
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
        Schema::dropIfExists('compras');
    }
}
