<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anamnese_adulto extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'nome',
        'sexo',
        'escolaridade',
        'profissao',
        'religiao',
        'estadoCivil',
        'queixa',
        'conjuge',
        'filhos',
        'constituicaoFamiliar',
        'relacaoComFamiliares',
        'historiaPatologicaPregressa',
        'alimentacao',
        'sono',
        'historiaSaudeAtual',
        'medicacao',
        'rotina',
        'observacao'
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
