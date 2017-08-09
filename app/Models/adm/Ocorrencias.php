<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Ocorrencias
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
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereIDJOGADOROCORRENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereIDPUNICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereOCORRDATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereOCORRDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereOCORRPERCENTUAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereOCORRTIPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Ocorrencias whereOCORRVALOR($value)
 * @mixin \Eloquent
 */
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
