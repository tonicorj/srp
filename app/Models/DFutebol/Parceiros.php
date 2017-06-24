<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

class Parceiros extends Model
{
    protected $table      = 'parceiros';
    protected $fillable   = ['ID_PARCEIRO'
        , 'ID_CIDADE'
        , 'PARCEIRO_NOME'
        , 'PARCEIRO_PRIORIDADE'
        , 'PARCEIRO_TELEFONE'
        , 'PARCEIRO_CELULAR'
        , 'PARCEIRO_MAIL'
        , 'NOME_CONTATO_PARCEIRO'
    ];
    protected $primaryKey = 'ID_PARCEIRO';

    public $timestamps = false;

    public static $rules = array(
        'parceiro_nome'         => 'max:100|min:3',
        'parceiro_prioridade'   => 'required',
    );

    public function jogadores() {
        return $this->belongsTo('Jogadores', 'ID_PARCEIRO');
    }
}
