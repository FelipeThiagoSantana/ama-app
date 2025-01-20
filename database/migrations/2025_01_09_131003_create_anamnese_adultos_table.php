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
            $table->string('escolaridade');
            $table->string('profissao');
            $table->string('religiao');
            $table->string('estadoCivil');
            $table->string('queixa');
            $table->string('conjuge');
            $table->string('filhos');
            $table->string('constituicaoFamiliar');
            $table->string('relacaoComFamiliares');
            $table->string('historiaPatologicaPregressa');
            $table->string('alimentacao');
            $table->string('sono');
            $table->string('historiaSaudeAtual');
            $table->string('medicacao');
            $table->string('rotina');
            $table->string('observacao');
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
