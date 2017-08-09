<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\dmAcompanha
 *
 * @property int $ID_ACOMPANHAMENTO_DM
 * @property int $ID_DEPARTAMENTO_MEDICO
 * @property int $ID_MEDICO
 * @property string $ACOMPANHAMENTO_DATA
 * @property string $ACOMPANHAMENTO_OBS
 * @property string $LOGIN_USUARIO
 * @property string $DATA_GRAVACAO
 * @property-read \SRP\Models\DM\DepMedico $dmEntrada
 * @property-read \SRP\Models\DM\Medicos $medico
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereACOMPANHAMENTODATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereACOMPANHAMENTOOBS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereDATAGRAVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereIDACOMPANHAMENTODM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereIDDEPARTAMENTOMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereIDMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmAcompanha whereLOGINUSUARIO($value)
 * @mixin \Eloquent
 */
class dmAcompanha extends Model
{
    protected $table = 'DEPARTAMENTO_MEDICO_ACOMPANHA';
    protected $fillable = [
          'ID_ACOMPANHAMENTO_DM'
        , 'ID_DEPARTAMENTO_MEDICO'
        , 'ID_MEDICO'
        , 'ACOMPANHAMENTO_DATA'
        , 'ACOMPANHAMENTO_OBS'
        , 'LOGIN_USUARIO'
        , 'DATA_GRAVACAO'
    ];
    protected $primaryKey = 'ID_ACOMPANHAMENTO_DM';

    public $timestamps = false;

    protected $titulos;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->titulos = array(
            trans('messages.tit_dmAcompanha_data')
          , trans('messages.tit_medico')
          //, trans('messages.tit_dmAcompanha_obs')
        );
    }

    public static $rules = array(
      'ID_MEDICO' => 'required'
    , 'ACOMPANHAMENTO_DATA_S' => 'required'
    );

    // medicos
    public function dmEntrada(){
        return $this->belongsTo(DepMedico::class, 'ID_DEPARTAMENTO_MEDICO', 'ID_DEPARTAMENTO_MEDICO');
    }

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    public function formACOMPANHAMENTO_DATAAttribute(){
        return data_display($this->ACOMPANHAMENTO_DATA);
    }
}
