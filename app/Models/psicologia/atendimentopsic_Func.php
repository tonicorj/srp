<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\psicologia\atendimentopsic_Func
 *
 * @property int $ID_ATENDIMENTO_PSICOLOGIA
 * @property string $ATENDIMENTO_DATA
 * @property string $NOME
 * @property string $ATENDIMENTO_OBS
 * @property int $ID_ORIGEM_PSICOLOGIA
 * @property int $ID_ATIV_PSICOLOGIA
 * @property string $LOGIN_USUARIO
 * @property string $DATA_GRAVACAO
 * @property int $ID_JOGADOR
 * @property string $EM_TRATAMENTO
 * @property string $ENCERRADO
 * @property int $ID_CATEGORIA
 * @property-read \SRP\Models\psicologia\atividades $motivo_atendimento
 * @property-read \SRP\Models\psicologia\origem $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereATENDIMENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereATENDIMENTOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereDATAGRAVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereEMTRATAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereENCERRADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereIDATENDIMENTOPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereIDATIVPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereIDORIGEMPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereLOGINUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic_Func whereNOME($value)
 * @mixin \Eloquent
 */
class atendimentopsic_Func extends Model
{
    protected $table      = 'ATENDIMENTO_PSICOLOGIA';
    protected $primaryKey = 'ID_ATENDIMENTO_PSICOLOGIA';

    protected $fillable   = ['ID_ATENDIMENTO_PSICOLOGIA'
        ,'ATENDIMENTO_DATA'
        ,'ID_JOGADOR'
        ,'ID_ATIV_PSICOLOGIA'
        ,'ID_ORIGEM_PSICOLOGIA'
        ,'ID_CATEGORIA'
        ,'LOGIN_USUARIO'
        ,'DATA_GRAVACAO'
        ,'NOME_USUARIO'
        ,'NOME'
        ,'EM_TRATAMENTO'
        ,'ENCERRADO'
        ,'ATENDIMENTO_OBS'];

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
        return $this->belongsTo(atividades::class, 'ID_ATIV_PSICOLOGIA', 'ID_ATIV_PSICOLOGIA');
    }

    // origem de atendimento
    public function origem_atendimento() {
        return $this->belongsTo(origem::class, 'ID_ORIGEM_PSICOLOGIA', 'ID_ORIGEM_PSICOLOGIA');
    }
}
