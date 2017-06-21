<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use SRP\Models\DM\DepMedico;

class dmAcompanha extends Model implements TableInterface
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
        $this->titulos = array(
            trans('messages.tit_dmAcompanha_data')
          , trans('messages.tit_medico')
          //, trans('messages.tit_dmAcompanha_obs')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
      'ID_MEDICO' => 'required'
    , 'ACOMPANHAMENTO_DATA_S' => 'required'
    );

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return $this->titulos;
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case $this->titulos[0]: return data_display($this->ACOMPANHAMENTO_DATA);
            case $this->titulos[1]: return ( isset($this->medico->NOME_USUARIO) )    ? $this->medico->NOME_USUARIO : '-';

        }
    }

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
