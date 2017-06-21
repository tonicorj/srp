<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
    protected $table      = 'TECNICO';
    protected $fillable   = ['ID_TECNICO', 'TECNICO_NOME'];
    protected $primaryKey = 'ID_TECNICO';

    public $timestamps = false;

    public static $rules = array(
        'TECNICO_NOME'   => 'required|min:3',
    );
}
