<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\LocalAtividade
 *
 * @property int $ID_LOCAL_ATIVIDADE
 * @property string $LOCAL_ATIVIDADE_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\LocalAtividade whereIDLOCALATIVIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\LocalAtividade whereLOCALATIVIDADEDESCRICAO($value)
 * @mixin \Eloquent
 */
class LocalAtividade extends Model
{
    protected $table      = 'LOCAL_ATIVIDADE';
    protected $fillable   = ['ID_LOCAL_ATIVIDADE', 'LOCAL_ATIVIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_LOCAL_ATIVIDADE';

    public $timestamps = false;

    public static $rules = array(
        'LOCAL_ATIVIDADE_DESCRICAO'   => 'required|min:3',
    );
}
