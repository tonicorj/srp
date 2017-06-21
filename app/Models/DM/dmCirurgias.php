<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class dmCirurgias extends Model implements TableInterface
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

    //
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
            case $this->titulos[0]: return data_display($this->CIRURGIA_DATA_SOLICITACAO);
            case $this->titulos[1]: return ( isset($this->medico->NOME_USUARIO) )    ? $this->medico->NOME_USUARIO : '-';
            case $this->titulos[2]: return ( isset($this->cirurgia->CIRURGIA_NOME) ) ? $this->cirurgia->CIRURGIA_NOME    : '-';
            case $this->titulos[3]: return data_display($this->CIRURGIA_DATA_SOLICITACAO);
        }
    }

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    // exames
    public function cirurgia(){
        return $this->belongsTo(Cirurgias::class, 'ID_CIRURGIA', 'ID_CIRURGIA');
    }

}
