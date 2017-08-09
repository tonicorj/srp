<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\JogadorOcorrencias
 *
 * @property int $ID_JOGADOR_OCORRENCIA
 * @property int $ID_JOGADOR
 * @property string $OCORR_DATA
 * @property int $OCORR_TIPO
 * @property string $OCORR_DESCRICAO
 * @property int $ID_CATEGORIA
 * @property int $ID_PUNICAO
 * @property float $OCORR_PERCENTUAL
 * @property float $OCORR_VALOR
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereIDJOGADOROCORRENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereIDPUNICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereOCORRDATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereOCORRDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereOCORRPERCENTUAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereOCORRTIPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\JogadorOcorrencias whereOCORRVALOR($value)
 * @mixin \Eloquent
 */
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
