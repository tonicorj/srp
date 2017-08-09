<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\HistoricoEscolar
 *
 * @property int $ID_HIST_ESCOLAR
 * @property int $ID_JOGADOR
 * @property string $ESCOLA_ANO
 * @property string $ESCOLA_NOME
 * @property string $ESCOLA_ENDERECO
 * @property string $ESCOLA_TELEFONE
 * @property string $ESCOLA_CONTATO
 * @property string $FLAG_TRANSFERENCIA
 * @property string $FLAG_HISTORICO
 * @property string $FLAG_APROVADO
 * @property string $FLAG_RECLASSIFICADO
 * @property string $FLAG_1BIMESTRE
 * @property string $FLAG_2BIMESTRE
 * @property string $FLAG_3BIMESTRE
 * @property string $FLAG_4BIMESTRE
 * @property string $HIST_OBSERVACAO
 * @property string $ESCOLA_SERIE
 * @property string $ESCOLA_TURMA
 * @property string $ESCOLA_PERIODO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLAANO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLACONTATO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLAENDERECO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLANOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLAPERIODO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLASERIE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLATELEFONE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereESCOLATURMA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAG1BIMESTRE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAG2BIMESTRE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAG3BIMESTRE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAG4BIMESTRE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAGAPROVADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAGHISTORICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAGRECLASSIFICADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereFLAGTRANSFERENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereHISTOBSERVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereIDHISTESCOLAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\HistoricoEscolar whereIDJOGADOR($value)
 * @mixin \Eloquent
 */
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
