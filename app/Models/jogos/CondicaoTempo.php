<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\CondicaoTempo
 *
 * @property int $ID_CONDICAO_TEMPO
 * @property string $CONDICAO_TEMPO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\CondicaoTempo whereCONDICAOTEMPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\CondicaoTempo whereIDCONDICAOTEMPO($value)
 * @mixin \Eloquent
 */
class CondicaoTempo extends Model
{
    protected $table      = 'CONDICAO_TEMPO';
    protected $fillable   = ['ID_CONDICAO_TEMPO', 'CONDICAO_TEMPO'];
    protected $primaryKey = 'ID_CONDICAO_TEMPO';

    public $timestamps = false;

    public static $rules = array(
        'CONDICAO_TEMPO'   => 'required|min:3',
    );
}
