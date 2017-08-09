<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Origem_Lesao
 *
 * @property int $ID_ORIGEM_LESAO
 * @property string $ORIGEM_LESAO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Origem_Lesao whereIDORIGEMLESAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Origem_Lesao whereORIGEMLESAODESCRICAO($value)
 * @mixin \Eloquent
 */
class Origem_Lesao extends Model
{
    protected $table      = 'ORIGEM_LESAO';
    protected $fillable   = ['ID_ORIGEM_LESAO', 'ORIGEM_LESAO_DESCRICAO'];
    protected $primaryKey = 'ID_ORIGEM_LESAO';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_origem_lesao') );
        parent::__construct($attributes);
    }


    public static $rules = array(
        'ORIGEM_LESAO_DESCRICAO'   => 'required|min:3',
    );
}
