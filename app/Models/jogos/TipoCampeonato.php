<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

class TipoCampeonato extends Model
{
    protected $table      = 'TIPOCAMPEONATO';
    protected $fillable   = ['ID_TIPOCAMP', 'TCAMP_DESCRICAO', 'ID_ESCOPO'];
    protected $primaryKey = 'ID_TIPOCAMP';

    public $timestamps = false;

    public static $rules = array(
        'TCAMP_DESCRICAO'   => 'required|min:3',
    );
}
