<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Exames extends Model implements TableInterface
{
    protected $table      = 'EXAME';
    protected $fillable   = ['ID_EXAME', 'EXAME_NOME'];
    protected $primaryKey = 'ID_EXAME';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_exames') );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'EXAME_NOME'   => 'required|min:3',
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
            case $this->titulos[0]:   return $this->EXAME_NOME;
        }
    }
}
