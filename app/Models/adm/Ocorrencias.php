<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

class Ocorrencias extends Model
{
    //
    protected $table      = 'JOGADOR_OCORRENCIA';
    protected $fillable   = ['ID_JOGADOR_OCORRENCIA'
        , 'ID_JOGADOR'
        , 'OCORR_DATA'
        , 'OCORR_TIPO'
        , 'OCORR_DESCRICAO'
        , 'ID_CATEGORIA'
        , 'ID_PUNICAO'
        , 'OCORR_PERCENTUAL'
        , 'OCORR_VALOR'
    ];
    protected $primaryKey = 'ID_JOGADOR_OCORRENCIA';

    public $timestamps = false;

    public static $rules = array(
        'ID_JOGADOR'        => 'required',
        'OCORR_TIPO'        => 'required',
        'OCORRENCIA_DATA'   => 'required',
        'OCORR_DESCRICAO'   => 'required|min:3'
    );
}
