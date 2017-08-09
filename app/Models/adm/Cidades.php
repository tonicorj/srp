<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Cidades
 *
 * @property int $ID_CIDADE
 * @property string $UF
 * @property int $ID_PAIS
 * @property string $CIDADE_NOME
 * @property-read \SRP\Models\adm\Paises $pais
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cidades whereCIDADENOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cidades whereIDCIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cidades whereIDPAIS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cidades whereUF($value)
 * @mixin \Eloquent
 */
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
