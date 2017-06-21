<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
//use SRP\Models\DM\Exames;

class dmExames extends Model implements TableInterface
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
            case $this->titulos[0]: return data_display($this->EXAME_DATA);
            case $this->titulos[1]: return ( isset($this->medico->NOME_USUARIO) ) ? $this->medico->NOME_USUARIO : '-';
            case $this->titulos[2]: return ( isset($this->exame->EXAME_NOME) )    ? $this->exame->EXAME_NOME    : '-';
            case $this->titulos[3]: return data_display($this->EXAME_DATA_REALIZADO);
        }
    }

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    // exames
    public function exame(){
        return $this->belongsTo(Exames::class, 'ID_EXAME', 'ID_EXAME');
    }
}
