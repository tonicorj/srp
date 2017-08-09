<?php

namespace SRP\Models\contratos;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\contratos\tipoContrato
 *
 * @property int $ID_TIPO_CONTRATO
 * @property string $TIPO_CONTRATO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\contratos\tipoContrato whereIDTIPOCONTRATO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\contratos\tipoContrato whereTIPOCONTRATODESCRICAO($value)
 * @mixin \Eloquent
 */
class tipoContrato extends Model
{
    protected $table      = 'tipo_contrato';
    protected $fillable   = ['ID_TIPO_CONTRATO', 'TIPO_CONTRATO_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_CONTRATO';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
        'TIPO_CONTRATO_DESCRICAO'   => 'required|min:3',
    );}
