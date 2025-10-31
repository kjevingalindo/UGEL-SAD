<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono')->nullable();
            $table->string('nivel')->nullable();
            $table->string('area')->nullable();
            $table->string('grado_estudio')->nullable();
            $table->date('fecha_ingreso')->nullable();

            // Relación con tabla users
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Relación con tabla categorias
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->nullOnDelete();

            // Relación con tabla docente_estados
            $table->foreignId('estado_id')->nullable()->constrained('docente_estados')->nullOnDelete();

            // Relación con tabla docente_validaciones
            $table->foreignId('estado_validacion_id')->nullable()->constrained('docente_validaciones')->nullOnDelete();

            // Relación con tabla instituciones
            $table->foreignId('institucion_id')->constrained('instituciones')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('docentes');
    }
};
