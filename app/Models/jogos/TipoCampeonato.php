<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\TipoCampeonato
 *
 * @property int $ID_TIPOCAMP
 * @property string $TCAMP_DESCRICAO
 * @property string $TCAMP_FLGATIVO
 * @property int $ID_ESCOPO
 * @property string $TCAMP_SIGLA
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\TipoCampeonato whereIDESCOPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\TipoCampeonato whereIDTIPOCAMP($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\TipoCampeonato whereTCAMPDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\TipoCampeonato whereTCAMPFLGATIVO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\TipoCampeonato whereTCAMPSIGLA($value)
 * @mixin \Eloquent
 */
class TipoCampeonato extends Model
{
    protected $table      = 'TIPOCAMPEONATO';
    protected $fillable   = ['ID_TIPOCAMP', 'TCAMP_DESCRICAO', 'ID_ESCOPO'];
    protected $primaryKey = 'ID_TIPOCAMP';

    public $timestamps = false;

    public static $rules = array(
        'TCAMP_DESCRICAO'   => 'required|min:3',
    );
}
