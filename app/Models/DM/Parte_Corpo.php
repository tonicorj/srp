<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;
use Bootstrapper\Interfaces\TableInterface;

class Parte_Corpo extends Model implements TableInterface
{
    protected $table      = 'PARTE_CORPO';
    protected $fillable   = ['ID_PARTE_CORPO', 'PARTE_CORPO_DESCRICAO'];
    protected $primaryKey = 'ID_PARTE_CORPO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_parte_corpo') );
        parent::__construct($attributes);
    }


    public static $rules = array(
        'PARTE_CORPO_DESCRICAO'   => 'required|min:3',
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
            case $this->titulos[0]:   return $this->PARTE_CORPO_DESCRICAO;
        }
    }
}
