<?php

namespace SRP;

use Illuminate\Database\Eloquent\Model;

class QuadroAtividades extends Model
{
    protected $table      = 'QUADRO_ATIVIDADES';
    protected $fillable   = ['ID_QUADRO_ATIVIDADE'
        , 'ID_CATEGORIA'
        , 'QUADRO_ATIVIDADE_DATA'
        , 'QUADRO_ATIVIDADE_POSICAO'
        , 'QUADRO_ATIVIDADE_HORA'
        , 'ID_ATIVIDADE'
        , 'ID_ATIVIDADE2'
        , 'ID_ATIVIDADE3'
        , 'ID_LOCAL_ATIVIDADE'
        , 'QUADRO_ATIVIDADE_LOCAL'
        , 'QUADRO_ATIVIDADE_COMPLEMENTO'
        , 'QUADRO_ATIVIDADE_OBS'
        , 'QUADRO_ATIVIDADE_OBS1'
        , 'QUADRO_ATIVIDADE_OBS2'
        , 'QUADRO_ATIVIDADE_OBS3'
    ];
    protected $primaryKey = 'ID_QUADRO_ATIVIDADE';

    public $timestamps = false;

    //public static $rules = array(
    //);
}
