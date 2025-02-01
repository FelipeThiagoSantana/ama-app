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
        Schema::create('anamnese_adultos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained();
            $table->string('nome');
            $table->string('sexo');
            $table->string('dataNascimento');
            $table->string('escolaridade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('religiao')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('queixa')->nullable();
            $table->string('conjuge')->nullable();
            $table->string('filhos')->nullable();
            $table->string('constituicaoFamiliar')->nullable();
            $table->string('relacaoComFamiliares')->nullable();
            $table->string('historiaPatologicaPregressa')->nullable();
            $table->string('alimentacao')->nullable();
            $table->string('sono')->nullable();
            $table->string('historiaSaudeAtual')->nullable();
            $table->string('medicacao')->nullable();
            $table->string('rotina')->nullable();
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anamnese_adultos');
    }
};
