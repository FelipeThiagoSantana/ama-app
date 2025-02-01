<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('atendimentos', function (Blueprint $table) {
            $table->string('frequencia_atendimento')->nullable()->after('tipo_atendimento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atendimentos', function (Blueprint $table) {
            //
        });
    }
};
