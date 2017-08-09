<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\Selecoes
 *
 * @property int $ID_SELECAO
 * @property string $DESCRICAO_SELECAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Selecoes whereDESCRICAOSELECAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Selecoes whereIDSELECAO($value)
 * @mixin \Eloquent
 */
class Selecoes extends Model
{
    protected $table      = 'SELECAO';
    protected $fillable   = ['ID_SELECAO'
        , 'DESCRICAO_SELECAO'
    ];
    protected $primaryKey = 'ID_SELECAO';

    public $timestamps = false;

    public static $rules = array(
        'DESCRICAO_SELECAO'   => 'required|min:3',
    );
}
