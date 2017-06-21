<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

class atendimentoNutricao extends Model
{
    protected $table      = 'ATENDIMENTO_NUTRICAO';

    protected $fillable   = ['ID_ATENDIMENTO_NUTRICAO'
        ,'ATENDIMENTO_DATA'
        ,'ID_JOGADOR'
        ,'ID_ATIV_NUTRICAO'
        ,'ID_ORIGEM_NUTRICAO'
        ,'ID_CATEGORIA'
        ,'LOGIN_USUARIO'
        ,'DATA_GRAVACAO'
        ,'NOME_USUARIO'
        ,'NOME'
        ,'JOG_PESO'
        ,'JOG_PERC_GORDURA'
        ,'JOG_ALTURA'
        ,'ATENDIMENTO_OBS'];

    protected $primaryKey = 'ID_ATENDIMENTO_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ATENDIMENTO_DATA'  => 'required|min:10',
        'ID_ATIV_NUTRICAO'  => 'required',
        'ID_ORIGEM_NUTRICAO' => 'required',
    );
}
