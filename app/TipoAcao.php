<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\TipoAcao
 *
 * @property int $ID_TIPO_ACAO_MARKETING
 * @property string $TIPO_ACAO_MARKETING_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\TipoAcao whereIDTIPOACAOMARKETING($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\TipoAcao whereTIPOACAOMARKETINGDESCRICAO($value)
 * @mixin \Eloquent
 */
class TipoAcao extends Model
{
    protected $table      = 'TIPO_ACAO_MARKETING';
    protected $fillable   = ['ID_TIPO_ACAO_MARKETING', 'TIPO_ACAO_MARKETING_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_ACAO_MARKETING';

    public $timestamps = false;

    public static $rules = array(
        'TIPO_ACAO_MARKETING_DESCRICAO'   => 'required|min:3',
    );
}
