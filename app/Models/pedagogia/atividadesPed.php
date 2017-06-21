<?php

namespace SRP\Models\pedagogia;

use Illuminate\Database\Eloquent\Model;

class atividadesPed extends Model
{
    protected $table      = 'ATIVIDADES_PEDAGOGICAS';
    protected $fillable   = ['ID_ATIV_PEDAGOGICA', 'ATIV_PEDAGOGICA_DESCR'];
    protected $primaryKey = 'ID_ATIV_PEDAGOGICA';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_PEDAGOGICA_DESCR'   => 'required|min:3',
    );
}
