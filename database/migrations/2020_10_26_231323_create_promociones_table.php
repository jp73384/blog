<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('precio');
            $table->string('mensaje');
            $table->string('colors');
            $table->string('estilo');
            $table->text('descripcion');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('categorias')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('idTalla');
            $table->foreign('idTalla')->references('id')->on('tallas')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('promociones');
    }
}
