<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolucao extends Model
{
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function Atendimento()
    {
        return $this->belongsTo(Cliente::class, 'atendimento_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = ['evolucao', 'user_id', 'cliente_id', 'atendimento_id'];


}
