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
        Schema::create('parametros_urbs', function (Blueprint $table) {
            $table->id();

            $table->string('titular');
            $table->string('numdoc');
            $table->string('expediente');
            $table->string('fecha_emision');
            $table->string('direccion');
            $table->string('partida');
            $table->string('num_informe');
            $table->string('fecha_vencimiento');

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
        Schema::dropIfExists('parametros_urbs');
    }
};
