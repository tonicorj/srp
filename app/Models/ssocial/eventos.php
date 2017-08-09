<?php

namespace SRP\Models\ssocial;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\adm\Departamentos;
use SRP\Models\DFutebol\Categorias;

/**
 * SRP\Models\ssocial\eventos
 *
 * @property int $ID_EVENTO
 * @property string $EVENTO_DATA
 * @property string $EVENTO_TITULO
 * @property string $EVENTO_LOCAL
 * @property string $EVENTO_EXTERNO
 * @property int $ID_CATEGORIA
 * @property string $OBS_EVENTO
 * @property int $ID_DEPARTAMENTO
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\adm\Departamentos $departamento
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereEVENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereEVENTOEXTERNO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereEVENTOLOCAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereEVENTOTITULO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereIDDEPARTAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereIDEVENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\ssocial\eventos whereOBSEVENTO($value)
 * @mixin \Eloquent
 */
class eventos extends Model
{
    protected $table      = 'EVENTOS';

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
             trans('messages.tit_evento_data')
            ,trans('messages.tit_evento_titulo')
            ,trans('messages.tit_evento_local')
            ,trans('messages.tit_categoria')
            ,trans('messages.tit_evento_depto')
            ,trans('messages.tit_evento_externo')
        );
        parent::__construct($attributes);
    }

    protected $fillable   = ['ID_EVENTO'
        ,'EVENTO_DATA'
        ,'EVENTO_TITULO'
        ,'EVENTO_LOCAL'
        ,'EVENTO_EXTERNO'
        ,'ID_CATEGORIA'
        ,'ID_DEPARTAMENTO'
        ,'OBS_EVENTO'];

    protected $primaryKey = 'ID_EVENTO';

    public $timestamps = false;

    public static $rules = array(
    );

    // campos de relacionamento
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function departamento() {
        return $this->belongsTo(Departamentos::class, 'ID_DEPARTAMENTO', 'ID_DEPARTAMENTO');
    }
}
