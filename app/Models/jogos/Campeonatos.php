<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;

/**
 * SRP\Models\jogos\Campeonatos
 *
 * @property int $ID_CAMPEONATO
 * @property string $CAMP_NOME
 * @property string $CAMP_ANO
 * @property int $ID_CRITERIO_01
 * @property int $ID_CRITERIO_02
 * @property int $ID_CRITERIO_03
 * @property int $ID_CRITERIO_04
 * @property int $ID_CRITERIO_05
 * @property int $ID_CRITERIO_06
 * @property int $ID_PONTUACAO
 * @property int $ID_TIME_CAMPEAO
 * @property int $ID_TIME_VICE
 * @property int $ID_TIPOCAMP
 * @property int $CAMP_NUM_REBAIXA
 * @property int $CAMP_CLASSIF_1
 * @property int $CAMP_CLASSIF_2
 * @property int $ID_TIPOCAMP_1
 * @property int $ID_TIPOCAMP_2
 * @property int $ID_CATEGORIA
 * @property int $TMP_PARTIDA
 * @property string $CAMP_DATA_INICIAL
 * @property string $CAMP_DATA_FINAL
 * @property string $CAMP_DATA_INSCRICAO
 * @property int $CAMP_NUMERO_CA
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\jogos\TipoCampeonato $tipo_campeonato
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPANO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPCLASSIF1($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPCLASSIF2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPDATAFINAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPDATAINICIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPDATAINSCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPNUMEROCA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereCAMPNUMREBAIXA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCAMPEONATO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO01($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO02($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO03($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO04($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO05($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDCRITERIO06($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDPONTUACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDTIMECAMPEAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDTIMEVICE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDTIPOCAMP($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDTIPOCAMP1($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereIDTIPOCAMP2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Campeonatos whereTMPPARTIDA($value)
 * @mixin \Eloquent
 */
class Campeonatos extends Model
{
    protected $table      = 'CAMPEONATO';
    protected $fillable   = ['ID_CAMPEONATO'
        , 'CAMP_ANO'
        , 'ID_CRITERIO_01'
        , 'ID_CRITERIO_02'
        , 'ID_CRITERIO_03'
        , 'ID_CRITERIO_04'
        , 'ID_CRITERIO_05'
        , 'ID_CRITERIO_06'
        , 'ID_PONTUACAO'
        , 'ID_TIME_CAMPEAO'
        , 'ID_TIME_VICE'
        , 'ID_TIPOCAMP'
        , 'CAMP_NUM_REBAIXA'
        , 'CAMP_CLASSIF_1'
        , 'CAMP_CLASSIF_2'
        , 'ID_TIPOCAMP_1'
        , 'ID_TIPOCAMP_2'
        , 'ID_CATEGORIA'
        , 'TMP_PARTIDA'
        , 'CAMP_DATA_INICIAL'
        , 'CAMP_DATA_FINAL'
        , 'CAMP_DATA_INSCRICAO'
    ];
    protected $primaryKey = 'ID_CAMPEONATO';

    public $timestamps = false;

    public static $rules = array(
        'CAMP_ANO'   => 'required|min:4',
        'ID_TIPOCAMP' => 'required',
        'ID_CATEGORIA' => 'required',
    );

    public function tipo_campeonato(){
        return $this->belongsTo(TipoCampeonato::class, 'ID_TIPOCAMP', 'ID_TIPOCAMP');
    }

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }
}
