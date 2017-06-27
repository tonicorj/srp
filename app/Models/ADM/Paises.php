<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    //
    protected $table      = 'paises';
    protected $fillable   = ['ID_PAIS', 'PAIS_SIGLA', 'PAIS_NOME', 'PAIS_NOME_FEDERACAO'];
    protected $primaryKey = 'ID_PAIS';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
             trans('messages.tit_paisnome')
            ,trans('messages.tit_paissigla' )
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'PAIS_NOME'     => 'required|min:3',
        'PAIS_SIGLA'    => 'required|min:3|max:3'
    );

}
