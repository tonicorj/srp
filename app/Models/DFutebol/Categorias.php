<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\Categorias
 *
 * @property int $ID_CATEGORIA
 * @property string $CATEG_DESCRICAO
 * @property int $CATEG_IDADE_INI
 * @property int $CATEG_IDADE_FIN
 * @property string $CATEG_COR
 * @property int $ID_TIME
 * @property int $CATEG_TEMPO_JOGO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereCATEGCOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereCATEGDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereCATEGIDADEFIN($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereCATEGIDADEINI($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereCATEGTEMPOJOGO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Categorias whereIDTIME($value)
 * @mixin \Eloquent
 */
class Categorias extends Model
{
    protected $table      = 'categorias';
    protected $fillable   = [
          'ID_CATEGORIA'
        , 'CATEG_DESCRICAO'
        , 'CATEG_IDADE_INI'
        , 'CATEG_IDADE_FIN'
        , 'ID_TIME'
        ,'CATEG_TEMPO_JOGO'];

    protected $primaryKey = 'ID_CATEGORIA';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_categ_idade_ini' )
        ,trans('messages.tit_categ_idade_fin')
        ,trans('messages.tit_categ_tempo_jogo')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
          'CATEG_DESCRICAO'     => 'required|min:3'
        /*
        , 'CATEG_IDADE_INI'
        , 'CATEG_IDADE_FIN'
        , 'CATEG_COR'
        , 'ID_TIME'
        , 'CATEG_TEMPO_JOGO'
        */
    );

    public function time() {
        //return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

}
