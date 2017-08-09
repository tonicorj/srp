<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\psicologia\origem
 *
 * @property int $ID_ORIGEM_PSICOLOGIA
 * @property string $ORIGEM_PSICOLOGIA_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\origem whereIDORIGEMPSICOLOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\psicologia\origem whereORIGEMPSICOLOGIADESCRICAO($value)
 * @mixin \Eloquent
 */
class origem extends Model
{
    protected $table      = 'ORIGEM_PSICOLOGIA';
    protected $fillable   = ['ID_ORIGEM_PSICOLOGIA', 'ORIGEM_PSICOLOGIA_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_PSICOLOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_PSICOLOGIA_DESCRICAO'   => 'required|min:3',
    );
}
