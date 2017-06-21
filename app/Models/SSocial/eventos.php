<?php

namespace SRP\Models\SSocial;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

use SRP\Departamentos;
use SRP\Models\DFutebol\Categorias;

class eventos extends Model implements TableInterface
{
    protected $table      = 'EVENTOS';

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
             trans('messages.tit_evento_data')
            ,trans('messages.tit_evento_titulo')
            ,trans('messages.tit_evento_local')
            ,trans('messages.tit_categoria')
            ,trans('messages.tit_evento_depto')
            ,trans('messages.tit_evento_externo')
        );
        parent::__construct($attributes);
    }

    protected $fillable   = ['ID_EVENTO'
        ,'EVENTO_DATA'
        ,'EVENTO_TITULO'
        ,'EVENTO_LOCAL'
        ,'EVENTO_EXTERNO'
        ,'ID_CATEGORIA'
        ,'ID_DEPARTAMENTO'
        ,'OBS_EVENTO'];

    protected $primaryKey = 'ID_EVENTO';

    public $timestamps = false;

    public static $rules = array(
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
            case $this->titulos[0]:   return data_display($this->EVENTO_DATA);
            case $this->titulos[1]:   return $this->EVENTO_TITULO;
            case $this->titulos[2]:   return $this->EVENTO_LOCAL;
            case $this->titulos[3]:   return ( isset($this->categoria->CATEG_DESCRICAO) )           ? $this->categoria->CATEG_DESCRICAO : '-';
            case $this->titulos[4]:   return ( isset($this->departamento->DEPARTAMENTO_DESCRICAO) ) ? $this->departamento->DEPARTAMENTO_DESCRICAO : '-';
            case $this->titulos[5]:   return $this->EVENTO_EXTERNO;
        }
    }

    // campos de relacionamento
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function departamento() {
        return $this->belongsTo(Departamentos::class, 'ID_DEPARTAMENTO', 'ID_DEPARTAMENTO');
    }
}
