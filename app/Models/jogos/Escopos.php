<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\Escopos
 *
 * @property int $ID_ESCOPO
 * @property string $ESCOPO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Escopos whereESCOPODESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Escopos whereIDESCOPO($value)
 * @mixin \Eloquent
 */
class Escopos extends Model
{
    protected $table      = 'ESCOPO';
    protected $fillable   = ['ID_ESCOPO', 'ESCOPO_DESCRICAO'];
    protected $primaryKey = 'ID_ESCOPO';

    public $timestamps = false;

    public static $rules = array(
        'ESCOPO_DESCRICAO'   => 'required|min:3',
    );
}
