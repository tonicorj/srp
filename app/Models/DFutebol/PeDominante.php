<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\PeDominante
 *
 * @property int $PE_DOMINANTE
 * @property string $PE_DOMINANTE_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\PeDominante wherePEDOMINANTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\PeDominante wherePEDOMINANTEDESCRICAO($value)
 * @mixin \Eloquent
 */
class PeDominante extends Model
{
    protected $table      = 'PE_DOMINANTE';
    protected $fillable   = ['PE_DOMINANTE', 'PE_DOMINANTE_DESCRICAO'];
    protected $primaryKey = 'PE_DOMINANTE';

    public $timestamps = false;

    public static $rules = array(
        'PE_DOMINANTE'   => 'required',
        'PE_DOMINANTE_DESCRICAO'   => 'required|min:3',
    );
}
