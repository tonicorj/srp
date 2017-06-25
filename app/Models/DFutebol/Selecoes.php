<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

class Selecoes extends Model
{
    protected $table      = 'SELECAO';
    protected $fillable   = ['ID_SELECAO'
        , 'DESCRICAO_SELECAO'
    ];
    protected $primaryKey = 'ID_SELECAO';

    public $timestamps = false;

    public static $rules = array(
        'DESCRICAO_SELECAO'   => 'required|min:3',
    );
}
