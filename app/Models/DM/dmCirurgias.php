<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;

/**
 * SRP\Models\DM\dmCirurgias
 *
 * @property int $ID_DM_CIRURGIA
 * @property int $ID_DEPARTAMENTO_MEDICO
 * @property int $ID_CIRURGIA
 * @property string $CIRURGIA_DATA
 * @property string $CIRURGIA_LOCAL
 * @property int $ID_MEDICO
 * @property string $CIRURGIA_LAUDO
 * @property string $CIRURGIA_DATA_SOLICITACAO
 * @property int $ID_MEDICO_SOLICITACAO
 * @property string $MEDICO_OPERACAO
 * @property-read \SRP\Models\DM\Cirurgias $cirurgia
 * @property-read \SRP\Models\DM\Medicos $medico
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereCIRURGIADATA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereCIRURGIADATASOLICITACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereCIRURGIALAUDO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereCIRURGIALOCAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereIDCIRURGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereIDDEPARTAMENTOMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereIDDMCIRURGIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereIDMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereIDMEDICOSOLICITACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\dmCirurgias whereMEDICOOPERACAO($value)
 * @mixin \Eloquent
 */
class dmCirurgias extends Model
{
    protected $table = 'DEPARTAMENTO_MEDICO_CIRURGIA';
    protected $fillable = [
        'ID_DM_CIRURGIA'
        ,'ID_DEPARTAMENTO_MEDICO'
        ,'ID_CIRURGIA'
        ,'ID_MEDICO'
        ,'CIRURGIA_DATA'
        ,'CIRURGIA_LOCAL'
        ,'CIRURGIA_LAUDO'
        ,'CIRURGIA_DATA_SOLICITACAO'
    ];
    protected $primaryKey = 'ID_DM_CIRURGIA';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_dmcirurgia_data'),
            trans('messages.tit_medico'),
            trans('messages.tit_cirurgia'),
            trans('messages.tit_dmcirurgia_data_realizado')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ID_MEDICO' => 'required'
    ,'ID_CIRURGIA' => 'required'
    ,'CIRURGIA_DATA_SOLICITACAO_S' => 'required'
    );

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    // exames
    public function cirurgia(){
        return $this->belongsTo(Cirurgias::class, 'ID_CIRURGIA', 'ID_CIRURGIA');
    }

}
