<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class Escopos extends Model
{
    protected $table      = 'ESCOPO';
    protected $fillable   = ['ID_ESCOPO', 'ESCOPO_DESCRICAO'];
    protected $primaryKey = 'ID_ESCOPO';

    public $timestamps = false;

    public static $rules = array(
        'ESCOPO_DESCRICAO'   => 'required|min:3',
    );
}
