<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\CondicaoGramado
 *
 * @property int $ID_CONDICAO_GRAMADO
 * @property string $CONDICAO_GRAMADO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\CondicaoGramado whereCONDICAOGRAMADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\CondicaoGramado whereIDCONDICAOGRAMADO($value)
 * @mixin \Eloquent
 */
class CondicaoGramado extends Model
{
    protected $table      = 'CONDICAO_GRAMADO';
    protected $fillable   = ['ID_CONDICAO_GRAMADO', 'CONDICAO_GRAMADO'];
    protected $primaryKey = 'ID_CONDICAO_GRAMADO';

    public $timestamps = false;

    public static $rules = array(
        'CONDICAO_GRAMADO'   => 'required|min:3',
    );
}
