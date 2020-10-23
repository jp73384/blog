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
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->date('nacimiento');
            $table->decimal('edad');
            $table->string('dpi');
            $table->string('direccion');
            $table->string('telefono');
            $table->unsignedBigInteger('idAyuda');
            $table->foreign('idAyuda')->references('id')->on('tipo_ayudas');
            $table->unsignedBigInteger('idPadrino');
            $table->foreign('idPadrino')->references('id')->on('padrinos');
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
