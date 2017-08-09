<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\nutricao\atendimentoNutricao
 *
 * @property int $ID_ATENDIMENTO_NUTRICAO
 * @property string $ATENDIMENTO_DATA
 * @property string $NOME
 * @property string $ATENDIMENTO_OBS
 * @property int $ID_ORIGEM_NUTRICAO
 * @property int $ID_ATIV_NUTRICAO
 * @property string $LOGIN_USUARIO
 * @property string $DATA_GRAVACAO
 * @property float $JOG_PESO
 * @property float $JOG_PERC_GORDURA
 * @property int $JOG_ALTURA
 * @property int $ID_JOGADOR
 * @property float $BALANCOK_NCB
 * @property float $BALANCOK_AF
 * @property float $BALANCOK_NCT
 * @property float $BALANCOK_PRESCRICAO
 * @property float $BALANCOK_RESTRICAO
 * @property float $COMPOSICAOCORP_ABDOMEN
 * @property float $COMPOSICAOCORP_SUPILIACA
 * @property float $COMPOSICAOCORP_SUBESCAPULAR
 * @property float $COMPOSICAOCORP_TRICEPS
 * @property float $COMPOSICAOCORP_BICEPS
 * @property float $COMPOSICAOCORP_SUPESC
 * @property float $COMPOSICAOCORP_AXILMEDIA
 * @property float $COMPOSICAOCORP_TX
 * @property float $COMPOSICAOCORP_CX
 * @property float $COMPOSICAOCORP_PAN
 * @property float $JOG_PESO_GORDO
 * @property float $JOG_PESO_MAGRO
 * @property float $JOG_PESO_IDEAL
 * @property float $JOG_IMC
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereATENDIMENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereATENDIMENTOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereBALANCOKAF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereBALANCOKNCB($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereBALANCOKNCT($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereBALANCOKPRESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereBALANCOKRESTRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPABDOMEN($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPAXILMEDIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPBICEPS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPCX($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPPAN($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPSUBESCAPULAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPSUPESC($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPSUPILIACA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPTRICEPS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereCOMPOSICAOCORPTX($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereDATAGRAVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereIDATENDIMENTONUTRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereIDATIVNUTRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereIDORIGEMNUTRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGALTURA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGIMC($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGPERCGORDURA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGPESO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGPESOGORDO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGPESOIDEAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereJOGPESOMAGRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereLOGINUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atendimentoNutricao whereNOME($value)
 * @mixin \Eloquent
 */
class atendimentoNutricao extends Model
{
    protected $table      = 'ATENDIMENTO_NUTRICAO';

    protected $fillable   = ['ID_ATENDIMENTO_NUTRICAO'
        ,'ATENDIMENTO_DATA'
        ,'ID_JOGADOR'
        ,'ID_ATIV_NUTRICAO'
        ,'ID_ORIGEM_NUTRICAO'
        ,'ID_CATEGORIA'
        ,'LOGIN_USUARIO'
        ,'DATA_GRAVACAO'
        ,'NOME_USUARIO'
        ,'NOME'
        ,'JOG_PESO'
        ,'JOG_PERC_GORDURA'
        ,'JOG_ALTURA'
        ,'JOG_PESO_GORDO'
        ,'JOG_PESO_MAGRO'
        ,'JOG_PESO_IDEAL'
        ,'BALANCOK_NCB'
        ,'BALANCOK_AF'
        ,'BALANCOK_NCT'
        ,'BALANCOK_PRESCRICAO'
        ,'BALANCOK_RESTRICAO'
        ,'COMPOSICAOCORP_ABDOMEN'
        ,'COMPOSICAOCORP_SUPILIACA'
        ,'COMPOSICAOCORP_SUBESCAPULAR'
        ,'COMPOSICAOCORP_TRICEPS'
        ,'COMPOSICAOCORP_BICEPS'
        ,'COMPOSICAOCORP_SUPESC'
        ,'COMPOSICAOCORP_AXILMEDIA'
        ,'COMPOSICAOCORP_TX'
        ,'COMPOSICAOCORP_CX'
        ,'COMPOSICAOCORP_PAN'
        ,'ATENDIMENTO_OBS'];

    protected $primaryKey = 'ID_ATENDIMENTO_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ATENDIMENTO_DATA'  => 'required|min:10',
        'ID_ATIV_NUTRICAO'  => 'required',
        'ID_ORIGEM_NUTRICAO' => 'required',
    );
}
