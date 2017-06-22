<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

class CondicaoTempo extends Model
{
    protected $table      = 'CONDICAO_TEMPO';
    protected $fillable   = ['ID_CONDICAO_TEMPO', 'CONDICAO_TEMPO'];
    protected $primaryKey = 'ID_CONDICAO_TEMPO';

    public $timestamps = false;

    public static $rules = array(
        'CONDICAO_TEMPO'   => 'required|min:3',
    );
}
