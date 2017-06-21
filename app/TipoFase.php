<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class TipoFase extends Model
{
    protected $table      = 'TIPOFASE';
    protected $fillable   = ['ID_TIPOFASE', 'TFASE_DESCRICAO'];
    protected $primaryKey = 'ID_TIPOFASE';

    public $timestamps = false;

    public static $rules = array(
        'TFASE_DESCRICAO'   => 'required|min:3',
    );
}
