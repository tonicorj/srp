<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\nutricao\suplementos
 *
 * @property int $ID_SUPLEMENTO
 * @property string $SUPLEMENTO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\suplementos whereIDSUPLEMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\suplementos whereSUPLEMENTODESCRICAO($value)
 * @mixin \Eloquent
 */
class suplementos extends Model
{
    protected $table      = 'SUPLEMENTO';
    protected $fillable   = ['ID_SUPLEMENTO'
        , 'SUPLEMENTO_DESCRICAO'
    ];
    protected $primaryKey = 'ID_SUPLEMENTO';

    public $timestamps = false;

    public static $rules = array(
        'SUPLEMENTO_DESCRICAO'   => 'required|min:3',
    );
}
