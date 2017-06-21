<?php

namespace SRP\Models\SSocial;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class origemservsocial extends Model implements TableInterface
{
    protected $table      = 'ORIGEM_SERVSOCIAL';
    protected $fillable   = ['ID_ORIGEM_SERVSOCIAL', 'ORIGEM_SERVSOCIAL_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_SERVSOCIAL';

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ORIGEM_SERVSOCIAL_DESCRICAO'   => 'required|min:3',
    );

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ;    //$this->titulos;
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
        /*
        switch ($header){
            case $this->titulos[0]:   return $this->ORIGEM_SERVSOCIAL_DESCRICAO;
        }
        */
        return ;
    }
}
