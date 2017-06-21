<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class JogadorOcorrencias extends Model
{
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

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'ID_JOGADOR'        =>  'required'
        ,'OCORR_DATA'       =>  'required'
        ,'OCORR_DESCRICAO'  =>  'required'
        ,'OCORR_TIPO'       =>  'required'
    );
}
