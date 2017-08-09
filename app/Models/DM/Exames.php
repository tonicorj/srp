<?php

namespace SRP\Models\DM;
use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\Exames
 *
 * @property int $ID_EXAME
 * @property string $EXAME_NOME
 * @property int $EXAME_PERIODICIDADE
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Exames whereEXAMENOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Exames whereEXAMEPERIODICIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\Exames whereIDEXAME($value)
 * @mixin \Eloquent
 */
class Exames extends Model
{
    protected $table      = 'EXAME';
    protected $fillable   = ['ID_EXAME', 'EXAME_NOME'];
    protected $primaryKey = 'ID_EXAME';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( trans('messages.tit_exames') );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'EXAME_NOME'   => 'required|min:3',
    );
}
