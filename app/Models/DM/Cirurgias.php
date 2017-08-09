<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Cirurgias
 *
 * @property int $ID_CIRURGIA
 * @property string $CIRURGIA_NOME
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Cirurgias whereCIRURGIANOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Cirurgias whereIDCIRURGIA($value)
 * @mixin \Eloquent
 */
class Cirurgias extends Model
{
    protected $table      = 'cirurgias';
    protected $fillable   = ['ID_CIRURGIA', 'CIRURGIA_NOME'];
    protected $primaryKey = 'ID_CIRURGIA';

    public $timestamps = false;

    private $titulos;
    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_cirurgia') );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'CIRURGIA_NOME'   => 'required|min:3',
    );
}
