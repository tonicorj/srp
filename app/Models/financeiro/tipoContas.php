<?php

namespace SRP\Models\financeiro;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\financeiro\tipoContas
 *
 * @property int $TIPO_CONTA_ID
 * @property string $TIPO_CONTA_DESCRICAO
 * @property string $TIPO_CONTA_TIPO
 * @property int $TIPO_CONTA_NUM
 * @property string $TIPO_CONTA_RECEBIMENTO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\tipoContas whereTIPOCONTADESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\tipoContas whereTIPOCONTAID($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\tipoContas whereTIPOCONTANUM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\tipoContas whereTIPOCONTARECEBIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\tipoContas whereTIPOCONTATIPO($value)
 * @mixin \Eloquent
 */
class tipoContas extends Model
{
    protected $table      = 'TIPO_CONTA';
    protected $fillable   = ['TIPO_CONTA_ID', 'TIPO_CONTA_DESCRICAO', 'TIPO_CONTA_TIPO', 'TIPO_CONTA_NUM', 'TIPO_CONTA_RECEBIMENTO'];
    protected $primaryKey = 'TIPO_CONTA_ID';

    public $timestamps = false;

    public static $rules = array(
        'TIPO_CONTA_DESCRICAO'   => 'required|min:3',
        'TIPO_CONTA_NUM' => 'required'
    );
}
