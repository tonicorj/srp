<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\AtividadesSS
 *
 * @property int $ID_ATIV_ASSIST_SOCIAL
 * @property string $ATIV_ASSIST_SOCIAL_DESCR
 * @property string $FLAG_ATIVO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\AtividadesSS whereATIVASSISTSOCIALDESCR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\AtividadesSS whereFLAGATIVO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\AtividadesSS whereIDATIVASSISTSOCIAL($value)
 * @mixin \Eloquent
 */
class AtividadesSS extends Model
{
    protected $table      = 'atividades_assist_social';
    protected $fillable   = ['ID_ATIV_ASSIST_SOCIAL', 'ATIV_ASSIST_SOCIAL_DESCR'];
    protected $primaryKey = 'ID_ATIV_ASSIST_SOCIAL';

    public $timestamps = false;

    private $titulos;
    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_motivoatendimento')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
    );
}
