<?php

namespace SRP\Models\SSocial;

use Illuminate\Database\Eloquent\Model;

class CursosExtras extends Model
{
    protected $table = 'CURSOS_EXTRAS';
    protected $fillable = ['ID_CURSO'
        , 'CURSO_NOME'
        , 'CURSO_DT_INICIO'
        , 'CURSO_DT_FINAL'
        , 'CURSO_EMPRESA'
        , 'CURSO_OBS'
    ];
    protected $primaryKey = 'ID_CURSO';
    public $timestamps = false;


}
