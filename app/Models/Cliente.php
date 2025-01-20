<?php

namespace App\Models;

use App\Http\Controllers\AnamneseAdultoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->hasMany(anamnese_adulto::class);
    }

    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'sexo',
        'cpf',
        'telefone',
        'status',
        'dataNascimento',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function anamnese()
    {
        return $this->hasOne(anamnese_adulto::class);
    }




}
