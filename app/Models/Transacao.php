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
    protected $with = ['categorias', 'pessoas'];
    protected $fillable = [
        'status_transacao',
        'tipo_transacao',
        'pessoa_id',
        'categoria_id',
        'saldo_atual',
        'data_vencimentoTitulo',
        'data_liquidacao',
    ];

    public function categorias() {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function pessoas() {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}