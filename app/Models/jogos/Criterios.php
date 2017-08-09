<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\Criterios
 *
 * @property int $ID_CRITERIO
 * @property string $CRIT_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Criterios whereCRITDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\Criterios whereIDCRITERIO($value)
 * @mixin \Eloquent
 */
class Criterios extends Model
{
    protected $table      = 'CRITERIO';
    protected $fillable   = ['ID_CRITERIO', 'CRIT_DESCRICAO'];
    protected $primaryKey = 'ID_CRITERIO';

    public $timestamps = false;

    public static $rules = array(
        'CRIT_DESCRICAO'   => 'required|min:3',
    );
}
