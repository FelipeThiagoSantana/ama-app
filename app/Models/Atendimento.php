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
    protected $fillable = [
    'cliente_id',
    'user_id',
    'status',
    'frequencia_atendimento',
    'valor_atendimento',
    'tipo_atendimento',
    'data_atendimento',
     'observacao',
    ];
}
