<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model implements TableInterface
{
    protected $table = 'DEPARTAMENTO_MEDICO_PRONTUARIO';
    protected $fillable = [
        'ID_PRONTUARIO'
        , 'ID_DEPARTAMENTO_MEDICO'
        , 'ID_MEDICO'
        , 'DATA_PRONTUARIO'
        , 'TXT_QUEIXA_PRINCIPAL'
        , 'TXT_HISTORIA_CLINICA'
        , 'TXT_EXAME_FISICO'
        , 'TXT_SUSPEITA'
        , 'TXT_EXAMES_COMPLEMENTARES'
        , 'TXT_DIAGNOSTICO'
        , 'TXT_TRATAMENTO'
    ];
    protected $primaryKey = 'ID_PRONTUARIO';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
            trans('messages.tit_prontuario_data')
        , trans('messages.tit_medico')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
        'ID_MEDICO' => 'required'
        , 'DATA_PRONTUARIO_S' => 'required'
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
            case $this->titulos[0]: return data_display($this->DATA_PRONTUARIO);
            case $this->titulos[1]: return $this->medico->NOME_USUARIO;    //ID_MEDICO;
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
}
