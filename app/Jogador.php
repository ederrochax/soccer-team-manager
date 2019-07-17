<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';
    protected $fillable = [
        'id_time',
        'nome',
        'altura',
        'peso',
        'categoria'
    ];
    
    protected $categorias = ['Sub-15', 'Sub-17', 'Sub-20', 'Profissional'];
}
