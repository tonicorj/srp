<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Medicos extends Model implements TableInterface
{
    protected $table      = 'VW_MEDICOS';
    protected $fillable   = ['ID_USUARIO', 'NOME_USUARIO', 'FUNC_DOCUMENTO'];
    protected $primaryKey = 'ID_USUARIO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_medico'),
            trans('messages.tit_documento')
        );
        parent::__construct($attributes);
    }


    public static $rules = array(
    );


    //
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
            case $this->titulos[0]:   return $this->NOME_USUARIO;
            case $this->titulos[1]:   return $this->FUNC_DOC;
        }
    }
}
