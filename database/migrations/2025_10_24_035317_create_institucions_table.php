<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('codigo_modular', 7)->unique();
            $table->string('direccion')->nullable();
            $table->string('director')->nullable();
            $table->string('nivel');
            $table->string('distrito');
            $table->string('provincia');
            $table->string('region')->default('Apurímac');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
