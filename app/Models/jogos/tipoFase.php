<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\jogos\tipoFase
 *
 * @property int $ID_TIPOFASE
 * @property string $TFASE_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\tipoFase whereIDTIPOFASE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\jogos\tipoFase whereTFASEDESCRICAO($value)
 * @mixin \Eloquent
 */
class tipoFase extends Model
{
    protected $table      = 'TIPOFASE';
    protected $fillable   = ['ID_TIPOFASE', 'TFASE_DESCRICAO'];
    protected $primaryKey = 'ID_TIPOFASE';

    public $timestamps = false;

    public static $rules = array(
        'TFASE_DESCRICAO'   => 'required|min:3',
    );
}
