<?php

namespace SRP\Models\jogos;

use Illuminate\Database\Eloquent\Model;

class Criterios extends Model
{
    protected $table      = 'CRITERIO';
    protected $fillable   = ['ID_CRITERIO', 'CRIT_DESCRICAO'];
    protected $primaryKey = 'ID_CRITERIO';

    public $timestamps = false;

    public static $rules = array(
        'CRIT_DESCRICAO'   => 'required|min:3',
    );
}
