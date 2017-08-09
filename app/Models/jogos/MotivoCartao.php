<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\MotivoCartao
 *
 * @property int $ID_MOTIVO_CARTAO
 * @property string $MOTIVO_CARTAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\MotivoCartao whereIDMOTIVOCARTAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\MotivoCartao whereMOTIVOCARTAO($value)
 * @mixin \Eloquent
 */
class MotivoCartao extends Model
{
    protected $table      = 'MOTIVO_CARTAO';
    protected $fillable   = ['ID_MOTIVO_CARTAO', 'MOTIVO_CARTAO'];
    protected $primaryKey = 'ID_MOTIVO_CARTAO';

    public $timestamps = false;

    public static $rules = array(
        'MOTIVO_CARTAO'   => 'required|min:3',
    );

}
