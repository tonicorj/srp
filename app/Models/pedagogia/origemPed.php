<?php

namespace SRP\Models\pedagogia;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\pedagogia\origemPed
 *
 * @property int $ID_ORIGEM_PEDAGOGIA
 * @property string $ORIGEM_PEDAGOGIA_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\origemPed whereIDORIGEMPEDAGOGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\pedagogia\origemPed whereORIGEMPEDAGOGIADESCRICAO($value)
 * @mixin \Eloquent
 */
class origemPed extends Model
{
    protected $table      = 'ORIGEM_PEDAGOGIA';
    protected $fillable   = ['ID_ORIGEM_PEDAGOGIA', 'ORIGEM_PEDAGOGIA_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_PEDAGOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_PEDAGOGIA_DESCRICAO'   => 'required|min:3',
    );
}
