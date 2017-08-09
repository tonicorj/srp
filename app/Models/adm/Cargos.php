<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Cargos
 *
 * @property int $ID_CARGO_COMISSAO
 * @property string $CARGO_COMISSAO
 * @property string $CARGO_COMISSAO_INGLES
 * @property string $CARGO_COMISSAO_DEFINICAO
 * @property string $dep_medico
 * @property string $fisioterapia
 * @property string $fisiologia
 * @property string $nutricao
 * @property string $assist_social
 * @property string $psicologia
 * @property string $peneira
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereAssistSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereCARGOCOMISSAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereCARGOCOMISSAODEFINICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereCARGOCOMISSAOINGLES($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereDepMedico($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereFisiologia($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereFisioterapia($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereIDCARGOCOMISSAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos whereNutricao($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos wherePeneira($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Cargos wherePsicologia($value)
 * @mixin \Eloquent
 */
class Cargos extends Model
{
    protected $table      = 'cargo_comissao';
    protected $fillable   = ['ID_CARGO_COMISSAO', 'CARGO_COMISSAO'];
    protected $primaryKey = 'ID_CARGO_COMISSAO';

    public $timestamps = false;


    public static $rules = array(
        'CARGO_COMISSAO'   => 'required|min:3',
    );
}
