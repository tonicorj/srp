<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Tipo_Lesao extends Model implements TableInterface
{
    protected $table      = 'TIPO_LESAO';
    protected $fillable   = ['ID_TIPO_LESAO', 'TIPO_LESAO_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_LESAO';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_tipo_lesao') );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'TIPO_LESAO_DESCRICAO'   => 'required|min:3',
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
            case $this->titulos[0]:   return $this->TIPO_LESAO_DESCRICAO;
        }

    }
}
