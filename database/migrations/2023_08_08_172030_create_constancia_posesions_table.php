<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constancia_posesions', function (Blueprint $table) {
            $table->id();
            
            $table->string('codConstancia');
            $table->string('nombreCompleto');
            $table->string('numdoc');
            $table->string('numInforme');
            $table->string('fechaInforme');
            $table->string('numExpediente');
            $table->string('fechaExpediente');
            $table->string('fechaIngreso');
            $table->string('estadoCivil');
            $table->string('partner');
            $table->string('dniPartner');
            $table->string('areaPredio');
            $table->string('lote');
            $table->string('manzana');
            $table->string('zona');
            $table->string('ubicacion');

            $table->string('periodo');
            $table->string('_token');
            $table->string('user');
            $table->string('print');
            $table->string('estado');

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
        Schema::dropIfExists('constancia_posesions');
    }
};
