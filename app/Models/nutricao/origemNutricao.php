<?php

namespace SRP\Models\nutricao;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\nutricao\origemNutricao
 *
 * @property int $ID_ORIGEM_NUTRICAO
 * @property string $ORIGEM_NUTRICAO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\origemNutricao whereIDORIGEMNUTRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\nutricao\origemNutricao whereORIGEMNUTRICAODESCRICAO($value)
 * @mixin \Eloquent
 */
class origemNutricao extends Model
{
    protected $table      = 'ORIGEM_NUTRICAO';
    protected $fillable   = ['ID_ORIGEM_NUTRICAO', 'ORIGEM_NUTRICAO_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_NUTRICAO';

    public $timestamps = false;

    public static $rules = array(
        'ORIGEM_NUTRICAO_DESCRICAO'   => 'required|min:3',
    );

}
