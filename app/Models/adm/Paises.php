<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Paises
 *
 * @property int $ID_PAIS
 * @property int $ID_CONTINENTE
 * @property string $PAIS_SIGLA
 * @property string $PAIS_NOME
 * @property string $PAIS_NOME_FEDERACAO
 * @property string $PAIS_FIG_BANDEIRA
 * @property string $PAIS_FIG_FEDERACAO
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises whereIDCONTINENTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises whereIDPAIS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises wherePAISFIGBANDEIRA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises wherePAISFIGFEDERACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises wherePAISNOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises wherePAISNOMEFEDERACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Paises wherePAISSIGLA($value)
 * @mixin \Eloquent
 */
class Paises extends Model
{
    //
    protected $table      = 'paises';
    protected $fillable   = ['ID_PAIS', 'PAIS_SIGLA', 'PAIS_NOME', 'PAIS_NOME_FEDERACAO'];
    protected $primaryKey = 'ID_PAIS';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
             trans('messages.tit_paisnome')
            ,trans('messages.tit_paissigla' )
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'PAIS_NOME'     => 'required|min:3',
        'PAIS_SIGLA'    => 'required|min:3|max:3'
    );

}
