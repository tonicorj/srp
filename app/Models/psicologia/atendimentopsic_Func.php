<?php

namespace SRP\Models\psicologia;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

use SRP\Models\psicologia\origem;
use SRP\Models\psicologia\atividades;


class atendimentopsic_Func extends Model implements TableInterface
{
    protected $table      = 'ATENDIMENTO_PSICOLOGIA';
    protected $primaryKey = 'ID_ATENDIMENTO_PSICOLOGIA';

    protected $fillable   = ['ID_ATENDIMENTO_PSICOLOGIA'
        ,'ATENDIMENTO_DATA'
        ,'ID_JOGADOR'
        ,'ID_ATIV_PSICOLOGIA'
        ,'ID_ORIGEM_PSICOLOGIA'
        ,'ID_CATEGORIA'
        ,'LOGIN_USUARIO'
        ,'DATA_GRAVACAO'
        ,'NOME_USUARIO'
        ,'NOME'
        ,'EM_TRATAMENTO'
        ,'ENCERRADO'
        ,'ATENDIMENTO_OBS'];

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_nome_funcionario')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );
        parent::__construct($attributes);
    }
    public static $rules = array(
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
        switch ($header){
            case $this->titulos[0]:   return $this->ID_ATEND_ASSIST_SOCIAL;
            case $this->titulos[1]:   return data_display($this->VISITA_DATA);
            case $this->titulos[2]:   return $this->NOME;
            case $this->titulos[3]:   return $this->motivo_atendimento->ATIV_ASSIST_SOCIAL_DESCR;       //ID_ATIV_ASSIST_SOCIAL;
            case $this->titulos[4]:   return $this->origem_atendimento->ORIGEM_SERVSOCIAL_DESCRICAO;    //ID_ORIGEM_SERVSOCIAL;
        }
    }

    // motivo de atendimento
    public function motivo_atendimento() {
        return $this->belongsTo(atividades::class, 'ID_ATIV_PSICOLOGIA', 'ID_ATIV_PSICOLOGIA');
    }

    // origem de atendimento
    public function origem_atendimento() {
        return $this->belongsTo(origem::class, 'ID_ORIGEM_PSICOLOGIA', 'ID_ORIGEM_PSICOLOGIA');
    }
}
