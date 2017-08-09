<?php

namespace SRP\Models\financeiro;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\financeiro\Contas
 *
 * @property int $CONTA_ID
 * @property int $TIPO_CONTA_ID
 * @property int $CONTA_NUMERO
 * @property string $CONTA_NOME
 * @property-read \SRP\Models\financeiro\tipoContas $tipo_conta
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\Contas whereCONTAID($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\Contas whereCONTANOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\Contas whereCONTANUMERO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\financeiro\Contas whereTIPOCONTAID($value)
 * @mixin \Eloquent
 */
class Contas extends Model
{
    protected $table      = 'CONTA';
    protected $fillable   = ['CONTA_ID', 'CONTA_NOME', 'TIPO_CONTA_ID', 'CONTA_NUMERO'];
    protected $primaryKey = 'CONTA_ID';

    public $timestamps = false;

    public static $rules = array(
        'CONTA_NOME'    => 'required|min:3',
        'TIPO_CONTA_ID' => 'required',
    );

    public function tipo_conta(){
        return $this->belongsTo(tipoContas::class, 'TIPO_CONTA_ID', 'TIPO_CONTA_ID');
    }

}
