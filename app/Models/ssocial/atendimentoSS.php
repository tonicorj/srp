<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;
use SRP\Models\DFutebol\Jogadores;

/**
 * SRP\Models\ssocial\atendimentoSS
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
 * @property-read \SRP\Models\DFutebol\Jogadores $jogador
 * @property-read \SRP\Models\ssocial\AtividadesSS $motivo_atendimento
 * @property-read \SRP\Models\ssocial\origemservsocial $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDATENDASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDATIVASSISTSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDORIGEMSERVSOCIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereIDUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereNOMEUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereOBSATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\atendimentoSS whereVISITADATA($value)
 * @mixin \Eloquent
 */
class atendimentoSS extends Model
{
    protected $table = 'ATENDIMENTO_ASSIST_SOCIAL';
    //protected $dates = ['VISITA_DATA'];
    protected $dateFormat = 'Ymd';
    //protected $casts = ['VISITA_DATA' => 'date'];

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array('#'
        , trans('messages.tit_visitadata')
        , trans('messages.tit_jogador')
        , trans('messages.tit_categoria')
        , trans('messages.tit_motivoatendimento')
        , trans('messages.tit_origematendimento')
        );
        parent::__construct($attributes);
    }

    protected $fillable = ['ID_ATEND_ASSIST_SOCIAL'
        , 'VISITA_DATA'
        , 'ID_JOGADOR'
        , 'ID_ATIV_ASSIST_SOCIAL'
        , 'ID_ORIGEM_SERVSOCIAL'
        , 'ID_CATEGORIA'
        , 'ID_USUARIO'
        , 'NOME_USUARIO'
        , 'NOME'
        , 'OBS_ATIVIDADE'];

    protected $primaryKey = 'ID_ATEND_ASSIST_SOCIAL';

    public $timestamps = false;

    public static $rules = array();

    // campos de relacionamento
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function motivo_atendimento()
    {
        return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    // origem de atendimento
    public function origem_atendimento()
    {
        return $this->belongsTo(origemservsocial::class, 'ID_ORIGEM_SERVSOCIAL', 'ID_ORIGEM_SERVSOCIAL');
    }

    // jogadores
    public function jogador()
    {
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }

    /*
    private function getVISITA_DATAvalue(){
        $dt = Carbon::createFromFormat ( 'd/m/Y', $this->attributes['VISITA_DATA']);
        return   $dt->format( $this->dateFormat );
            //date('d/m/Y', strtotime($this->attributes['VISITA_DATA']));
    }

    private function setVISITA_DATAvalue($value){
        $date_parts = explode('/', $value);
        //$this->attributes['VISITA_DATA'] = $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0];
        $this->attributes['VISITA_DATA'] = Carbon::createFromDate ( $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
    }
    */
}
