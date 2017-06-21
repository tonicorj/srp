<?php

namespace SRP\Models\ADM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Alojamentos extends Model implements TableInterface
{
    protected $table      = 'alojamento';
    protected $fillable   = ['ID_ALOJAMENTO', 'ALOJAMENTO_NOME', 'ALOJAMENTO_QTD_VAGAS'];
    protected $primaryKey = 'ID_ALOJAMENTO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_alojamento'),
            trans('messages.tit_qtdvagas')
        );

        parent::__construct($attributes);
    }

    public static $rules = array(
        'ALOJAMENTO_NOME'       => 'required|min:3',
        'ALOJAMENTO_QTD_VAGAS'  => 'required:min:1'
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
            case $this->titulos[0]:   return $this->ALOJAMENTO_NOME;
            case $this->titulos[1]:   return $this->ALOJAMENTO_QTD_VAGAS;
        }
    }
}
