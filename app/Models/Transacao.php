<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Transacao extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "transacoes";
    protected $fillable = [
        'tipo_transacao',
        'pessoa',
        'categoria_financeira',
        'saldo_atual',
        'estado_transacao',
    ];
}