<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Tipo_Lesao
 *
 * @property int $ID_TIPO_LESAO
 * @property string $TIPO_LESAO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Tipo_Lesao whereIDTIPOLESAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Tipo_Lesao whereTIPOLESAODESCRICAO($value)
 * @mixin \Eloquent
 */
class Tipo_Lesao extends Model
{
    protected $table      = 'TIPO_LESAO';
    protected $fillable   = ['ID_TIPO_LESAO', 'TIPO_LESAO_DESCRICAO'];
    protected $primaryKey = 'ID_TIPO_LESAO';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_tipo_lesao') );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'TIPO_LESAO_DESCRICAO'   => 'required|min:3',
    );
}
