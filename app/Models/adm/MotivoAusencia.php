<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\MotivoAusencia
 *
 * @property int $ID_MOTIVO_AUSENCIA
 * @property string $MOTIVO_AUSENCIA_DESCRICAO
 * @property string $MOTIVO_AUSENCIA_LETRA
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\MotivoAusencia whereIDMOTIVOAUSENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\MotivoAusencia whereMOTIVOAUSENCIADESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\MotivoAusencia whereMOTIVOAUSENCIALETRA($value)
 * @mixin \Eloquent
 */
class MotivoAusencia extends Model
{
    //
    protected $table      = 'motivo_ausencia';
    protected $fillable   = ['ID_MOTIVO_AUSENCIA', 'MOTIVO_AUSENCIA_DESCRICAO'];
    protected $primaryKey = 'ID_MOTIVO_AUSENCIA';

    public $timestamps = false;

    public static $rules = array(
        'MOTIVO_AUSENCIA_DESCRICAO'    => 'required|min:3',
    );
}
