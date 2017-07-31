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
        ,'JOG_PESO_GORDO'
        ,'JOG_PESO_MAGRO'
        ,'JOG_PESO_IDEAL'
        ,'BALANCOK_NCB'
        ,'BALANCOK_AF'
        ,'BALANCOK_NCT'
        ,'BALANCOK_PRESCRICAO'
        ,'BALANCOK_RESTRICAO'
        ,'COMPOSICAOCORP_ABDOMEN'
        ,'COMPOSICAOCORP_SUPILIACA'
        ,'COMPOSICAOCORP_SUBESCAPULAR'
        ,'COMPOSICAOCORP_TRICEPS'
        ,'COMPOSICAOCORP_BICEPS'
        ,'COMPOSICAOCORP_SUPESC'
        ,'COMPOSICAOCORP_AXILMEDIA'
        ,'COMPOSICAOCORP_TX'
        ,'COMPOSICAOCORP_CX'
        ,'COMPOSICAOCORP_PAN'
        ,'ATENDIMENTO_OBS'];

    protected $primaryKey = 'ID_ATENDIMENTO_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ATENDIMENTO_DATA'  => 'required|min:10',
        'ID_ATIV_NUTRICAO'  => 'required',
        'ID_ORIGEM_NUTRICAO' => 'required',
    );
}
