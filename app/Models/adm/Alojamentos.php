<?php

namespace SRP\Models\adm;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\adm\Alojamentos
 *
 * @property int $ID_ALOJAMENTO
 * @property string $ALOJAMENTO_NOME
 * @property int $ALOJAMENTO_QTD_VAGAS
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Alojamentos whereALOJAMENTONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Alojamentos whereALOJAMENTOQTDVAGAS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\adm\Alojamentos whereIDALOJAMENTO($value)
 * @mixin \Eloquent
 */
class Alojamentos extends Model
{
    protected $table      = 'alojamento';
    protected $fillable   = ['ID_ALOJAMENTO', 'ALOJAMENTO_NOME', 'ALOJAMENTO_QTD_VAGAS'];
    protected $primaryKey = 'ID_ALOJAMENTO';

    public $timestamps = false;
    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_alojamento'),
            trans('messages.tit_qtdvagas')
        );

        parent::__construct($attributes);
    }

    public static $rules = array(
        'ALOJAMENTO_NOME'       => 'required|min:3',
        'ALOJAMENTO_QTD_VAGAS'  => 'required:min:1'
    );
}
