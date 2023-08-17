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
        Schema::create('conformidad_obras', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_edificacion');
            $table->string('expediente');
            $table->string('fecha_expediente');
            $table->string('propietario');
            $table->string('num_resolucion');
            $table->string('num_licencia');
            $table->string('ubicacion');
            $table->string('area_construida');
            $table->string('area_terreno');
            $table->string('valor_obra');
            $table->string('otros');
            $table->string('cantidad_pisos');

            $table->string('zonificacion_normativa');
            $table->string('area_eu_normativa');
            $table->string('altura_edif_normativa');
            $table->string('retiro_normativa');
            $table->string('area_libre_normativa');
            $table->string('densidad_normativa');
            $table->string('estacionamiento_normativa');

            $table->string('zonificacion_proyecto');
            $table->string('area_eu_proyecto');
            $table->string('altura_edif_proyecto');
            $table->string('retiro_proyecto');
            $table->string('area_libre_proyecto');
            $table->string('densidad_proyecto');
            $table->string('estacionamiento_proyecto');

            $table->string('observaciones');

            $table->string('user');
            $table->string('estado');
            $table->string('print');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conformidad_obras');
    }

    
};
