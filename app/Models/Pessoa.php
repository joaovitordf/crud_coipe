<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pessoa extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nome',
        'email',
        'celular',
        'cidade',
        'estado',
        'documento',
        'tipo',
        'ativo',
    ];

    public function transacoes() {
        return $this->hasMany(Transacao::class);
    }
}
