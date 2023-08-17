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
        Schema::create('pisos', function (Blueprint $table) {
            $table->id();
            $table->string('expediente_conformidad');
            $table->string('antiguedad');
            $table->string('muro_columna');
            $table->string('techos');
            $table->string('piso');
            $table->string('puerta_ventana');
            $table->string('revestimiento');
            $table->string('bano');
            $table->string('inst_elect');
            $table->string('area_construida');
            $table->string('user');
            $table->string('estado');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pisos');
    }
};
