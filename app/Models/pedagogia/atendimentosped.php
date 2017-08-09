<?php

namespace SRP\Models\pedagogia;

use SRP\Models\DFutebol\Categorias;
use SRP\Models\DFutebol\Jogadores;


/**
 * SRP\Models\pedagogia\atendimentosped
 *
 * @property int $ID_ATENDIMENTO_PEDAGOGIA
 * @property string $VISITA_DATA
 * @property int $ID_JOGADOR
 * @property int $ID_ATIV_PEDAGOGIA
 * @property int $ID_ORIGEM_PEDAGOGIA
 * @property int $ID_CATEGORIA
 * @property string $OBS_ATIVIDADE
 * @property string $NOME_USUARIO
 * @property int $ID_USUARIO
 * @property string $NOME
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\DFutebol\Jogadores $jogador
 * @property-read \SRP\Models\pedagogia\atividadesPed $motivo_atendimento
 * @property-read \SRP\Models\pedagogia\origemPed $origem_atendimento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDATENDIMENTOPEDAGOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDATIVPEDAGOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDORIGEMPEDAGOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereIDUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereNOMEUSUARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereOBSATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atendimentosped whereVISITADATA($value)
 * @mixin \Eloquent
 */
class atendimentosped extends Models
{
    protected $table = 'ATENDIMENTO_PEDAGOGIA';
    protected $dateFormat = 'Ymd';
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

        //parent::__construct($attributes);
    }

    protected $fillable = ['ID_ATENDIMENTO_PEDAGOGIA'
        , 'VISITA_DATA'
        , 'ID_JOGADOR'
        , 'ID_ATIV_PEDAGOGIA'
        , 'ID_ORIGEM_PEDAGOGIA'
        , 'ID_CATEGORIA'
        , 'ID_USUARIO'
        , 'NOME_USUARIO'
        , 'NOME'
        , 'OBS_ATIVIDADE'];

    protected $primaryKey = 'ID_ATENDIMENTO_PEDAGOGIA';

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
        return $this->belongsTo(atividadesPed::class, 'ID_ATIV_PEDAGOGIA', 'ID_ATIV_PEDAGOGIA');
    }

    // origem de atendimento
    public function origem_atendimento()
    {
        return $this->belongsTo(origemPed::class, 'ID_ORIGEM_PEDAGOGIA', 'ID_ORIGEM_PEDAGOGIA');
    }

    // jogadores
    public function jogador()
    {
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }
}
