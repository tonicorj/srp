<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
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

    public function time() {
        //return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    public function pais(){
        return $this->belongsTo(Paises::class, 'ID_PAIS', 'ID_PAIS');
    }
}
