<?php

namespace SRP\Models\ssocial;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class AtividadesSS extends Model implements TableInterface
{
    protected $table      = 'atividades_assist_social';
    protected $fillable   = ['ID_ATIV_ASSIST_SOCIAL', 'ATIV_ASSIST_SOCIAL_DESCR'];
    protected $primaryKey = 'ID_ATIV_ASSIST_SOCIAL';

    public $timestamps = false;

    private $titulos;
    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_motivoatendimento')
        );
        parent::__construct($attributes);
    }

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
            case $this->titulos[0]:   return $this->ID_ATIV_ASSIST_SOCIAL;
            case $this->titulos[1]:   return $this->ATIV_ASSIST_SOCIAL_DESCR;
        }
    }
}
