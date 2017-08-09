<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;


/**
 * SRP\Models\DM\dmExames
 *
 * @property int $ID_DM_EXAME
 * @property int $ID_DEPARTAMENTO_MEDICO
 * @property string $ID_EXAME
 * @property string $EXAME_DATA
 * @property int $ID_MEDICO
 * @property string $EXAME_LAUDO
 * @property string $EXAME_DATA_REALIZADO
 * @property-read \SRP\Models\DM\Exames $exame
 * @property-read \SRP\Models\DM\Medicos $medico
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereEXAMEDATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereEXAMEDATAREALIZADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereEXAMELAUDO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereIDDEPARTAMENTOMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereIDDMEXAME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereIDEXAME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmExames whereIDMEDICO($value)
 * @mixin \Eloquent
 */
class dmExames extends Model
{

    protected $table = 'DEPARTAMENTO_MEDICO_EXAME';
    protected $fillable = [
        'ID_DM_EXAME'
        ,'ID_DEPARTAMENTO_MEDICO'
        ,'ID_EXAME'
        ,'EXAME_DATA'
        ,'ID_MEDICO'
        ,'EXAME_LAUDO'
        ,'EXAME_DATA_REALIZADO'
    ];
    protected $primaryKey = 'ID_DM_EXAME';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_dmexame_data')
           ,trans('messages.tit_medico')
           ,trans('messages.tit_exames')
           ,trans('messages.tit_dmexame_data_realizado')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ID_MEDICO' => 'required'
       ,'ID_EXAME' => 'required'
       ,'EXAME_DATA_S' => 'required'
    );

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    // exames
    public function exame(){
        return $this->belongsTo(Exames::class, 'ID_EXAME', 'ID_EXAME');
    }
}
