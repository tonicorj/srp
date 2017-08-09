<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;


/**
 * SRP\Models\ssocial\atendimentoSS_Grupo
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
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\ssocial\AtividadesSS $motivo_atendimento
 * @property-read \SRP\Models\ssocial\origemservsocial $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDATENDASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDATIVASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDORIGEMSERVSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereIDUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereNOMEUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereOBSATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS_Grupo whereVISITADATA($value)
 * @mixin \Eloquent
 */
class atendimentoSS_Grupo extends Model
{
    protected $table = 'ATENDIMENTO_ASSIST_SOCIAL';
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );

        parent::__construct($attributes);
    }

    protected $fillable   = [
         'ID_ATEND_ASSIST_SOCIAL'
        ,'VISITA_DATA'
        ,'ID_ATIV_ASSIST_SOCIAL'
        ,'ID_ORIGEM_SERVSOCIAL'
        ,'ID_CATEGORIA'
        ,'ID_USUARIO'
        ,'OBS_ATIVIDADE'];

    protected $primaryKey = 'ID_ATEND_ASSIST_SOCIAL';

    public $timestamps = false;

    public static $rules = array();

    // campos de relacionamento
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function motivo_atendimento() {
        return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    // origem de atendimento
    public function origem_atendimento() {
        return $this->belongsTo(origemservsocial::class, 'ID_ORIGEM_SERVSOCIAL', 'ID_ORIGEM_SERVSOCIAL');
    }
}
