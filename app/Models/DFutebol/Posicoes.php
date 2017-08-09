<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\Posicoes
 *
 * @property string $POSICAO
 * @property string $POSICAO_DESCRICAO
 * @property int $POSICAO_ORDEM
 * @property string $POSICAO_CAMPO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Posicoes wherePOSICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Posicoes wherePOSICAOCAMPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Posicoes wherePOSICAODESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Posicoes wherePOSICAOORDEM($value)
 * @mixin \Eloquent
 */
class Posicoes extends Model
{
    protected $table      = 'posicao';
    protected $fillable   = ['POSICAO', 'POSICAO_DESCRICAO', 'POSICAO_ORDEM', 'POSICAO_CAMPO'];
    protected $primaryKey = 'POSICAO';
    protected $keyType    = 'string';

    public $timestamps = false;

    public static $rules = array(
        'POSICAO'           => 'max:5|min:2',
        'POSICAO_DESCRICAO' => 'required|min:5',
    );
}
