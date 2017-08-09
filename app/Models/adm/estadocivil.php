<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\estadocivil
 *
 * @property int $ID_ESTADOCIVIL
 * @property string $ESTADOCIVIL_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\estadocivil whereESTADOCIVILDESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\estadocivil whereIDESTADOCIVIL($value)
 * @mixin \Eloquent
 */
class estadocivil extends Model
{
    //
    protected $table      = 'estadocivil';
    protected $fillable   = ['ESTADOCIVIL_DESCRICAO'];
    protected $primaryKey = 'ID_ESTADOCIVIL';

    public $timestamps = false;

    public static $rules = array(
        'ESTADOCIVIL_DESCRICAO'    => 'required|min:3:unique',
    );
}
