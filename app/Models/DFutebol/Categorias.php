<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

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
