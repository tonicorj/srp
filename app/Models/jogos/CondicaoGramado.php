<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

class CondicaoGramado extends Model
{
    protected $table      = 'CONDICAO_GRAMADO';
    protected $fillable   = ['ID_CONDICAO_GRAMADO', 'CONDICAO_GRAMADO'];
    protected $primaryKey = 'ID_CONDICAO_GRAMADO';

    public $timestamps = false;

    public static $rules = array(
        'CONDICAO_GRAMADO'   => 'required|min:3',
    );
}
