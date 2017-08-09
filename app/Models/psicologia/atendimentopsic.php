<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;
use SRP\Models\DFutebol\Jogadores;


/**
 * SRP\Models\psicologia\atendimentopsic
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
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\DFutebol\Jogadores $jogador
 * @property-read \SRP\Models\psicologia\atividades $motivo_atendimento
 * @property-read \SRP\Models\psicologia\origem $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereATENDIMENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereATENDIMENTOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereDATAGRAVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereEMTRATAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereENCERRADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereIDATENDIMENTOPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereIDATIVPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereIDORIGEMPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereLOGINUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atendimentopsic whereNOME($value)
 * @mixin \Eloquent
 */
class atendimentopsic extends Model
{
    protected $table      = 'ATENDIMENTO_PSICOLOGIA';

    private $titulos;
    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_jogador')
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );
        parent::__construct($attributes);
    }

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

    protected $primaryKey = 'ID_ATENDIMENTO_PSICOLOGIA';

    public $timestamps = false;

    public static $rules = array(
    );

    // campos de relacionamento
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function motivo_atendimento() {
        return $this->belongsTo(atividades::class, 'ID_ATIV_PSICOLOGIA', 'ID_ATIV_PSICOLOGIA');
    }

    // origem de atendimento
    public function origem_atendimento() {
        return $this->belongsTo(origem::class, 'ID_ORIGEM_PSICOLOGIA', 'ID_ORIGEM_PSICOLOGIA');
    }

    // jogadores
    public function jogador() {
            return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }
}
