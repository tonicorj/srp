<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DFutebol\Parceiros
 *
 * @property int $ID_PARCEIRO
 * @property int $ID_CIDADE
 * @property string $PARCEIRO_NOME
 * @property int $PARCEIRO_PRIORIDADE
 * @property string $PARCEIRO_TELEFONE
 * @property string $PARCEIRO_CELULAR
 * @property string $PARCEIRO_MAIL
 * @property string $NOME_CONTATO_PARCEIRO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros whereIDCIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros whereIDPARCEIRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros whereNOMECONTATOPARCEIRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros wherePARCEIROCELULAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros wherePARCEIROMAIL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros wherePARCEIRONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros wherePARCEIROPRIORIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Parceiros wherePARCEIROTELEFONE($value)
 * @mixin \Eloquent
 * @property-read \SRP\Models\DFutebol\Jogadores $jogadores
 */
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
        return $this->belongsTo(Jogadores::class, 'ID_PARCEIRO');
    }
}
