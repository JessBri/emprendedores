<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->bigIncrements('idElemento');
            $table->string('nombreElemento');
            $table->longText('descripcionElemento');
            $table->decimal('precioElemento', 10, 2);
            $table->boolean('estadoElemento');
            $table->string('tipoElemento');
            $table->date('fechaInicioElemento')->nullable();
            $table->date('fechaFinElemento')->nullable();
            $table->unsignedBigInteger('idCategoria');
            $table
                ->foreign('idCategoria')
                ->references('idCategoria')
                ->on('categorias');
            $table->unsignedBigInteger('idEmprendedor');
            $table
                ->foreign('idEmprendedor')
                ->references('idEmprendedor')
                ->on('emprendedors');
            $table->integer('cantidadElemento');
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
        Schema::dropIfExists('elementos');
    }
}
