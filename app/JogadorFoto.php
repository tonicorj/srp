<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class JogadorFoto extends Model
{
    protected $table      = 'jogador_foto';
    protected $fillable   =
        [
             'ID_JOGADOR'
            ,'JOGADOR_FOTO'
        ];
    protected $primaryKey = 'ID_JOGADOR';
}
