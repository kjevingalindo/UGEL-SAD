<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->string('email')->unique()->after('telefono')->nullable();
            // ->nullable() para evitar errores si tienes datos existentes sin email
        });
    }

    public function down()
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
};
