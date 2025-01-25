<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    public static function getStatusOptions()
    {


        return ['agendado', 'em andamento', 'concluído', 'cancelado'];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function evolucoes()
    {
        return $this->hasMany(Evolucao::class, 'atendimento_id');
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
