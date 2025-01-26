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
        Schema::create('financeiros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atendimento_id')->constrained('atendimentos')->onDelete('cascade');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('status_pagamento')->default('pendente');
            $table->decimal('valor_atendimento', 10, 2)->default(0.00);
            $table->string('tipo_atendimento')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamp('data_pagamento')->nullable();
            $table->timestamps();
            $table->index('status_pagamento');
            $table->index('cliente_id');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financeiros');
    }
};
