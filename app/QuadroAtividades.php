<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\QuadroAtividades
 *
 * @property int $ID_QUADRO_ATIVIDADE
 * @property int $ID_CATEGORIA
 * @property string $QUADRO_ATIVIDADE_DATA
 * @property int $QUADRO_ATIVIDADE_POSICAO
 * @property string $QUADRO_ATIVIDADE_HORA
 * @property int $ID_ATIVIDADE
 * @property int $ID_ATIVIDADE2
 * @property int $ID_ATIVIDADE3
 * @property int $ID_LOCAL_ATIVIDADE
 * @property string $QUADRO_ATIVIDADE_LOCAL
 * @property string $QUADRO_ATIVIDADE_COMPLEMENTO
 * @property string $QUADRO_ATIVIDADE_OBS
 * @property string $QUADRO_ATIVIDADE_OBS1
 * @property string $QUADRO_ATIVIDADE_OBS2
 * @property string $QUADRO_ATIVIDADE_OBS3
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDATIVIDADE2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDATIVIDADE3($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDLOCALATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereIDQUADROATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADECOMPLEMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEDATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEHORA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADELOCAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEOBS1($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEOBS2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEOBS3($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\QuadroAtividades whereQUADROATIVIDADEPOSICAO($value)
 * @mixin \Eloquent
 */
class QuadroAtividades extends Model
{
    protected $table      = 'QUADRO_ATIVIDADES';
    protected $fillable   = ['ID_QUADRO_ATIVIDADE'
        , 'ID_CATEGORIA'
        , 'QUADRO_ATIVIDADE_DATA'
        , 'QUADRO_ATIVIDADE_POSICAO'
        , 'QUADRO_ATIVIDADE_HORA'
        , 'ID_ATIVIDADE'
        , 'ID_ATIVIDADE2'
        , 'ID_ATIVIDADE3'
        , 'ID_LOCAL_ATIVIDADE'
        , 'QUADRO_ATIVIDADE_LOCAL'
        , 'QUADRO_ATIVIDADE_COMPLEMENTO'
        , 'QUADRO_ATIVIDADE_OBS'
        , 'QUADRO_ATIVIDADE_OBS1'
        , 'QUADRO_ATIVIDADE_OBS2'
        , 'QUADRO_ATIVIDADE_OBS3'
    ];
    protected $primaryKey = 'ID_QUADRO_ATIVIDADE';

    public $timestamps = false;

    //public static $rules = array(
    //);
}
