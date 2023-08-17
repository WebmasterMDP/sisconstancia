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
        Schema::create('habilitacion_urbs', function (Blueprint $table) {
            $table->id();

            $table->string('denominacion');
            $table->string('expediente');
            $table->string('fecha_emision');
            $table->string('zonificacion');
            $table->string('plano_aprobado');
            $table->string('num_resolucion');
            $table->string('fecha_vencimiento');
            $table->string('propietario');
            $table->string('responsable_obra');

            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('urbanizacion_otro');
            $table->string('uc');
            $table->string('lote');
            $table->string('area_bruta_terreno');
            $table->string('area_via_metropolitana');
            $table->string('area_afecta_aportes');
            $table->string('parque_zonales');
            $table->string('servicios_publicos');
            $table->string('area_servicios');
            $table->string('area_vendible');
            $table->string('area_circulacion');

            $table->string('user');
            $table->string('estado');
            $table->string('print');

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
        Schema::dropIfExists('habilitacion_urbs');
    }
};
