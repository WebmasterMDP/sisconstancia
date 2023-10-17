<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombreUbicacion');
            $table->string('zona');
            $table->string('observacion');
            $table->string('usuario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubicacions');
    }
};
