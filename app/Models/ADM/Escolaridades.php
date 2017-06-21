<?php

namespace SRP\Models\ADM;

use Illuminate\Database\Eloquent\Model;

class Escolaridades extends Model
{
    //
    protected $table      = 'escolaridade';
    protected $fillable   = ['ID_ESCOLARIDADE', 'ESCOLARIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_ESCOLARIDADE';

    public $timestamps = false;

    public static $rules = array(
        'escolaridade_descricao'    => 'required|min:3',
    );
}
