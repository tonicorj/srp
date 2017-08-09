<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Departamentos
 *
 * @property int $ID_DEPARTAMENTO
 * @property string $DEPARTAMENTO_DESCRICAO
 * @property int $ID_FUNCIONARIO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Departamentos whereDEPARTAMENTODESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Departamentos whereIDDEPARTAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Departamentos whereIDFUNCIONARIO($value)
 * @mixin \Eloquent
 */
class Departamentos extends Model
{
    //
    protected $table      = 'departamentos';
    protected $fillable   = ['ID_DEPARTAMENTO', 'DEPARTAMENTO_DESCRICAO'];
    protected $primaryKey = 'ID_DEPARTAMENTO';

    public $timestamps = false;

    public static $rules = array(
        'DEPARTAMENTO_DESCRICAO'   => 'required|min:3',
    );
}
