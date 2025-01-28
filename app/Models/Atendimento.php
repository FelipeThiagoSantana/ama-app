<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    public static function getStatusOptions()
    {


        return ['agendado', 'em andamento', 'concluído', 'cancelado', 'confirmado'];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function evolucoes()
    {
        return $this->hasMany(Evolucao::class, 'atendimento_id');
    }

    protected static function booted()
    {
        static::created(function ($atendimento) {
            Financeiro::create([
                'atendimento_id' => $atendimento->id,
                'cliente_id' => $atendimento->cliente_id,
                'user_id' => $atendimento->user_id,
                'valor_atendimento' => $atendimento->valor_atendimento,
                'tipo_atendimento' => $atendimento->tipo_atendimento,
                'status_pagamento' => 'pendente',
                'data_pagamento' => null
            ]);
        });
    }


    protected $fillable = [
    'cliente_id',
    'user_id',
    'status',
    'valor_atendimento',
    'data_atendimento',
    'hora_inicio',
    'hora_fim',
    'tipo_atendimento',
    'frequencia_atendimento',
     'observacoes',
    ];
}
