<?php

namespace SRP\Models\psicologia;

use Illuminate\Database\Eloquent\Model;

class origem extends Model
{
    protected $table      = 'ORIGEM_PSICOLOGIA';
    protected $fillable   = ['ID_ORIGEM_PSICOLOGIA', 'ORIGEM_PSICOLOGIA_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_PSICOLOGIA';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_PSICOLOGIA_DESCRICAO'   => 'required|min:3',
    );
}
