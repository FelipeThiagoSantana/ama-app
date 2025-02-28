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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['agendado', 'em andamento', 'concluído', 'cancelado', 'confirmado'])->default('agendado');
            $table->decimal('valor_atendimento', 10, 2)->default(0.00);
            $table->string('tipo_atendimento')->nullable(); // Tipo de atendimento
            $table->text('observacoes')->nullable(); // Observações do atendimento
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
