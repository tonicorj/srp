<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Projetos
 *
 * @property int $PROJETO_ID
 * @property float $PROJETO_VALOR
 * @property string $PROJETO_NOME
 * @property string $PROJETO_DATA_INICIO
 * @property string $PROJETO_DATA_FINAL
 * @method static \Illuminate\Database\Query\Builder|\SRP\Projetos wherePROJETODATAFINAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Projetos wherePROJETODATAINICIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Projetos wherePROJETOID($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Projetos wherePROJETONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Projetos wherePROJETOVALOR($value)
 * @mixin \Eloquent
 */
class Projetos extends Model
{
    protected $table      = 'PROJETO';
    protected $fillable   = ['ID_PROJETO'
        , 'PROJETO_NOME'
        , 'PROJETO_VALOR'
        , 'PROJETO_DATA_INICIO'
        , 'PROJETO_DATA_FINAL'
    ];
    protected $primaryKey = 'ID_PROJETO';

    public $timestamps = false;

    public static $rules = array(
        'PROJETO_NOME'   => 'required|min:3',
    );
}
