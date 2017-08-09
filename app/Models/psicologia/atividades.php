<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\psicologia\atividades
 *
 * @property int $ID_ATIV_PSICOLOGIA
 * @property string $ATIV_PSICOLOGIA_DESCR
 * @property string $FLAG_ATIVO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atividades whereATIVPSICOLOGIADESCR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atividades whereFLAGATIVO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\atividades whereIDATIVPSICOLOGIA($value)
 * @mixin \Eloquent
 */
class atividades extends Model
{
    protected $table      = 'ATIVIDADES_PSICOLOGIA';
    protected $fillable   = ['ID_ATIV_PSICOLOGIA', 'ATIV_PSICOLOGIA_DESCR'];
    protected $primaryKey = 'ID_ATIV_PSICOLOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_PSICOLOGIA_DESCR'   => 'required|min:3',
    );
}
