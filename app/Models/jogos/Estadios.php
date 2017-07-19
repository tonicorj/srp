<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\ADM\Cidades;
use SRP\Models\ADM\Paises;

class Estadios extends Model
{
    protected $table      = 'ESTADIO';
    protected $fillable   = ['ID_ESTADIO'
        , 'UF'
        , 'ID_CIDADE'
        , 'ID_PAIS'
        , 'ESTADIO_NOME'
        , 'ESTADIO_NOME_REAL'
        , 'ESTADIO_CAPACIDADE'
        , 'ESTADIO_OBS'
    ];
    protected $primaryKey = 'ID_ESTADIO';

    public $timestamps = false;

    public static $rules = array(
        'ESTADIO_NOME'   => 'required|min:4',
    );

    public function cidades(){
            $retorno = '';

            if ( !is_null($this->ID_CIDADE) )
            {  $retorno = $this->belongsTo(Cidades::class, 'ID_CIDADE', 'ID_CIDADE'); }

        return $retorno;
    }

    public function paises(){
        return $this->belongsTo(Paises::class, 'ID_PAIS', 'ID_PAIS');
    }
}
