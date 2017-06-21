<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    protected $table      = 'PONTUACAO';
    protected $fillable   = ['ID_PONTUACAO'
        , 'PONT_NOME'
        , 'PONT_VITORIA'
        , 'PONT_EMPATE'
        , 'PONT_EMPATE0'
        , 'PONT_VITORIA_PEN'
        , 'PONT_DIF_GOLS'
        , 'PONT_VIT_GOLS'
    ];
    protected $primaryKey = 'ID_PONTUACAO';

    public $timestamps = false;

    public static $rules = array(
        'PONT_NOME'   => 'required|min:3',
    );
}
