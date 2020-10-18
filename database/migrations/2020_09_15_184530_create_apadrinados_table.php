<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApadrinadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apadrinados', function (Blueprint $table) {
            $table->bigIncrements('idApadrinado');
            $table->string('nombre');
            $table->string('feEdad');
            $table->decimal('edad');
            $table->string('dpi');
            $table->string('direccion');
            $table->string('telefono');
            $table->unsignedBigInteger('idAyuda');
            $table->foreign('idAyuda')->references('idAyuda')->on('tipo_ayudas');
            $table->unsignedBigInteger('idPadrinos');
            $table->foreign('idPadrinos')->references('idPadrinos')->on('padrinos');
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
        Schema::dropIfExists('apadrinados');
    }
}
