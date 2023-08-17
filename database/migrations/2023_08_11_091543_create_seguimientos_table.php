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
        Schema::create('seguimientos', function (Blueprint $table) {
            
            $table->id();

            $table->string('id_tramite');
            $table->string('tipo_tramite');
            $table->string('estado');
            $table->string('print');
            $table->string('observacion');
            $table->string('user');
            $table->string('fecha');
            $table->string('hora');
            
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
        Schema::dropIfExists('seguimientos');
    }
};
