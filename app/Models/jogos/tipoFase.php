<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

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
