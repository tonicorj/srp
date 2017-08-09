<?php
namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\ssocial\motivoAusenciaEscolar
 *
 * @property int $ID_MOTIVO_AUSENCIA_ESCOLAR
 * @property string $MOTIVO_AUSENCIA_DESCRICAO
 * @property string $FLAG_AUSENCIA_ESCOLA
 * @property string $MOTIVO_AUSENCIA_LETRA
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\motivoAusenciaEscolar whereFLAGAUSENCIAESCOLA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\motivoAusenciaEscolar whereIDMOTIVOAUSENCIAESCOLAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\motivoAusenciaEscolar whereMOTIVOAUSENCIADESCRICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\motivoAusenciaEscolar whereMOTIVOAUSENCIALETRA($value)
 * @mixin \Eloquent
 */
class motivoAusenciaEscolar extends Model
{
    protected $table      = 'MOTIVO_AUSENCIA_ESCOLAR';
    protected $fillable   = ['MOTIVO_AUSENCIA_DESCRICAO', 'FLAG_AUSENCIA_ESCOLA', 'MOTIVO_AUSENCIA_LETRA'];
    protected $primaryKey = 'ID_MOTIVO_AUSENCIA_ESCOLAR';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_motivoausencia_descricao'),
            trans('messages.tit_motivoausencia_flag'),
            trans('messages.tit_motivoausencia_letra')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'MOTIVO_AUSENCIA_DESCRICAO' => 'required|min:3',
        'MOTIVO_AUSENCIA_LETRA'     => 'required|max:1'
    );
}
