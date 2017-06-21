<?php

namespace SRP\Models\DFutebol;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Paises;

class Cidades extends Model implements TableInterface
{
    protected $table      = 'CIDADES';
    protected $fillable   = [
        'ID_CIDADE'
        , 'CIDADE_NOME'
        , 'ID_PAIS'
        , 'UF'
        ];

    protected $primaryKey = 'ID_CIDADE';
    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_cidade')
        ,trans('messages.tit_uf' )
        ,trans('messages.tit_pais')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'CIDADE_NOME'     => 'required|min:3',
        'ID_PAIS'         => 'required'
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
            case $this->titulos[0]:   return $this->CIDADE_NOME;
            case $this->titulos[1]:   return $this->UF;
            case $this->titulos[2]:   return $this->pais->PAIS_NOME;
        }
    }

    public function time() {
        //return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    public function pais(){
        return $this->belongsTo(Paises::class, 'ID_PAIS', 'ID_PAIS');
    }
}
