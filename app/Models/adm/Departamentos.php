<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

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
