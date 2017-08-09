<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\nutricao\atividadesNutricao
 *
 * @property int $ID_ATIV_NUTRICAO
 * @property string $ATIV_NUTRICAO_DESCR
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atividadesNutricao whereATIVNUTRICAODESCR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\atividadesNutricao whereIDATIVNUTRICAO($value)
 * @mixin \Eloquent
 */
class atividadesNutricao extends Model
{
    protected $table      = 'ATIVIDADES_NUTRICAO';
    protected $fillable   = ['ID_ATIV_NUTRICAO', 'ATIV_NUTRICAO_DESCR'];
    protected $primaryKey = 'ID_ATIV_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ATIV_NUTRICAO_DESCR'   => 'required|min:3',
    );
}
