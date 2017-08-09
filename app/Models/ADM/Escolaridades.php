<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\escolaridades
 *
 * @property int $ID_ESCOLARIDADE
 * @property string $ESCOLARIDADE_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\escolaridades whereESCOLARIDADEDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\escolaridades whereIDESCOLARIDADE($value)
 * @mixin \Eloquent
 */
class escolaridades extends Model
{
    protected $table      = 'ESCOLARIDADE';
    protected $fillable   = ['ESCOLARIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_ESCOLARIDADE';

    public $timestamps = false;

    public static $rules = array(
        'ESCOLARIDADE_DESCRICAO'    => 'required|min:3:unique',
    );

}
