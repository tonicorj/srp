<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class LocalAtividade extends Model
{
    protected $table      = 'LOCAL_ATIVIDADE';
    protected $fillable   = ['ID_LOCAL_ATIVIDADE', 'LOCAL_ATIVIDADE_DESCRICAO'];
    protected $primaryKey = 'ID_LOCAL_ATIVIDADE';

    public $timestamps = false;

    public static $rules = array(
        'LOCAL_ATIVIDADE_DESCRICAO'   => 'required|min:3',
    );
}
