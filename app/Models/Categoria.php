<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categoria extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'nome_categoria',
        'tipo_categoria',
    ];
}
