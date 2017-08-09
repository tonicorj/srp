<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\atendimentoSS_Func
 *
 * @property int $ID_ATEND_ASSIST_SOCIAL
 * @property string $VISITA_DATA
 * @property int $ID_JOGADOR
 * @property int $ID_ATIV_ASSIST_SOCIAL
 * @property int $ID_ORIGEM_SERVSOCIAL
 * @property int $ID_CATEGORIA
 * @property string $OBS_ATIVIDADE
 * @property string $NOME_USUARIO
 * @property int $ID_USUARIO
 * @property string $NOME
 * @property-read \SRP\Models\ssocial\AtividadesSS $motivo_atendimento
 * @property-read \SRP\Models\ssocial\origemservsocial $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDATENDASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDATIVASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDORIGEMSERVSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereIDUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereNOMEUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereOBSATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Func whereVISITADATA($value)
 * @mixin \Eloquent
 */
class atendimentoSS_Func extends Model
{
    protected $table      = 'ATENDIMENTO_ASSIST_SOCIAL';
    protected $primaryKey = 'ID_ATEND_ASSIST_SOCIAL';

    protected $fillable   = ['ID_ATEND_ASSIST_SOCIAL'
        ,'VISITA_DATA'
        ,'ID_ATIV_ASSIST_SOCIAL'
        ,'ID_ORIGEM_SERVSOCIAL'
        ,'ID_USUARIO'
        ,'NOME_USUARIO'
        ,'NOME'
        ,'OBS_ATIVIDADE'];

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_nome_funcionario')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );
        parent::__construct($attributes);
    }
    public static $rules = array(
    );

    // motivo de atendimento
    public function motivo_atendimento() {
        return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    // origem de atendimento
    public function origem_atendimento() {
        return $this->belongsTo(origemservsocial::class, 'ID_ORIGEM_SERVSOCIAL', 'ID_ORIGEM_SERVSOCIAL');
    }
}
