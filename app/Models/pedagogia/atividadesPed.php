<?php

namespace SRP\Models\pedagogia;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\pedagogia\atividadesPed
 *
 * @property int $ID_ATIV_PEDAGOGICA
 * @property string $ATIV_PEDAGOGICA_DESCR
 * @property string $FLAG_ATIVO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atividadesPed whereATIVPEDAGOGICADESCR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atividadesPed whereFLAGATIVO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\atividadesPed whereIDATIVPEDAGOGICA($value)
 * @mixin \Eloquent
 */
class atividadesPed extends Model
{
    protected $table      = 'ATIVIDADES_PEDAGOGICAS';
    protected $fillable   = ['ID_ATIV_PEDAGOGICA', 'ATIV_PEDAGOGICA_DESCR'];
    protected $primaryKey = 'ID_ATIV_PEDAGOGICA';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_PEDAGOGICA_DESCR'   => 'required|min:3',
    );
}
