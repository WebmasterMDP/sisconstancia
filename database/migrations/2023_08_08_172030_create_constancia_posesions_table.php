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

            $table->string('nombre_completo');
            $table->string('numdoc');
            $table->string('num_informe');
            $table->string('num_expediente');
            $table->string('fecha_expediente');
            $table->string('ubicacion');
            $table->string('partner');
            $table->string('dni_partner');
            $table->string('area_predio');
            $table->string('plano_visado');
            $table->string('num_resolucion');
            $table->string('num_ordenanza');
            $table->string('fecha_validez');

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
