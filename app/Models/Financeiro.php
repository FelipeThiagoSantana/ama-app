<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'atendimento_id',
        'cliente_id',
        'user_id',
        'status_pagamento',
        'valor_atendimento',
        'tipo_atendimento',
        'observacoes',
    ];

    // Relacionamento com Atendimento
    public function atendimento()
    {
        return $this->belongsTo(Atendimento::class);
    }

    // Relacionamento com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
