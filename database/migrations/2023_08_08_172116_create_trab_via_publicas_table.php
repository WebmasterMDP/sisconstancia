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
        Schema::create('trab_via_publicas', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_completo');
            $table->string('numdoc');
            $table->string('num_expediente');
            $table->string('fecha_expediente');
            $table->string('num_informe');
            $table->string('comprobante');

            $table->string('concepto_servicio');
            $table->string('ubicacion');
            $table->string('fecha_instalacion');
            $table->string('proveedor_servicio');

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
        Schema::dropIfExists('trab_via_publicas');
    }
};
