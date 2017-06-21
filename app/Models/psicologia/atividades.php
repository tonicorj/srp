<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;

class atividades extends Model
{
    protected $table      = 'ATIVIDADES_PSICOLOGIA';
    protected $fillable   = ['ID_ATIV_PSICOLOGIA', 'ATIV_PSICOLOGIA_DESCR'];
    protected $primaryKey = 'ID_ATIV_PSICOLOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_PSICOLOGIA_DESCR'   => 'required|min:3',
    );
}
