<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Parte_Corpo
 *
 * @property int $ID_PARTE_CORPO
 * @property string $PARTE_CORPO_DESCRICAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Parte_Corpo whereIDPARTECORPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Parte_Corpo wherePARTECORPODESCRICAO($value)
 * @mixin \Eloquent
 */
class Parte_Corpo extends Model
{
    protected $table      = 'PARTE_CORPO';
    protected $fillable   = ['ID_PARTE_CORPO', 'PARTE_CORPO_DESCRICAO'];
    protected $primaryKey = 'ID_PARTE_CORPO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_parte_corpo') );
        parent::__construct($attributes);
    }


    public static $rules = array(
        'PARTE_CORPO_DESCRICAO'   => 'required|min:3',
    );
}
