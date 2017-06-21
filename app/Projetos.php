<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    protected $table      = 'PROJETO';
    protected $fillable   = ['ID_PROJETO'
        , 'PROJETO_NOME'
        , 'PROJETO_VALOR'
        , 'PROJETO_DATA_INICIO'
        , 'PROJETO_DATA_FINAL'
    ];
    protected $primaryKey = 'ID_PROJETO';

    public $timestamps = false;

    public static $rules = array(
        'PROJETO_NOME'   => 'required|min:3',
    );
}
