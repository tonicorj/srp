<?php

namespace SRP\Models\SSocial;

use Illuminate\Database\Eloquent\Model;

class HistoricoEscolar extends Model
{
    protected $table = 'JOGADOR_HIST_ESCOLAR';
    protected $fillable = [
          'ID_JOGADOR'
        , 'ESCOLA_ANO'
        , 'ESCOLA_SERIE'
        , 'ESCOLA_TURMA'
        , 'ESCOLA_PERIODO'
        , 'ESCOLA_NOME'
        , 'ESCOLA_ENDERECO'
        , 'ESCOLA_TELEFONE'
        , 'ESCOLA_CONTATO'
        , 'FLAG_TRANSFERENCIA'
        , 'FLAG_HISTORICO'
        , 'FLAG_APROVADO'
        , 'FLAG_RECLASSIFICADO'
        , 'FLAG_1BIMESTRE'
        , 'FLAG_2BIMESTRE'
        , 'FLAG_3BIMESTRE'
        , 'FLAG_4BIMESTRE'
        , 'HIST_OBSERVACAO'
    ];
    protected $primaryKey = 'ID_HIST_ESCOLAR';

    public $timestamps = false;
}
