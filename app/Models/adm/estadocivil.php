<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

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
