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
            $table->string('nombre', 100)->unique(); // Nombre de la institución
            $table->string('codigo_modular', 20)->unique(); // Código modular
            $table->string('direccion', 150)->nullable(); // Dirección
            $table->unsignedBigInteger('id_director')->nullable(); // Relación con tabla users
            $table->string('nivel', 50)->nullable(); // Nivel educativo
            $table->string('distrito', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('region', 50)->default('Apurímac');
            $table->timestamps();

            // 🔹 Llave foránea (director puede ser un usuario)
            $table->foreign('id_director')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
