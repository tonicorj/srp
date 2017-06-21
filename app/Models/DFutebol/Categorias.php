<?php

namespace SRP\Models\DFutebol;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model implements TableInterface
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
        $this->titulos = array(
         trans('messages.tit_categoria')
        ,trans('messages.tit_categ_idade_ini' )
        ,trans('messages.tit_categ_idade_fin')
        ,trans('messages.tit_clube')
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

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return $this->titulos;
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case $this->titulos[0]:   return $this->CATEG_DESCRICAO;
            case $this->titulos[1]:   return $this->CATEG_IDADE_INI;
            case $this->titulos[2]:   return $this->CATEG_IDADE_FIN;
            case $this->titulos[3]:   return $this->ID_TIME;
            case $this->titulos[4]:   return $this->CATEG_TEMPO_JOGO;
        }
    }

    public function time() {
        //return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

}
