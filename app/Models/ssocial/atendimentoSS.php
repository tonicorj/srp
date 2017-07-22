<?php

namespace SRP\Models\ssocial;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Jogadores;
use Carbon\Carbon;

//use SRP\Models\ssocial\AtividadesSS;
//use SRP\Models\ssocial\origemservsocial;

class atendimentoSS extends Model implements TableInterface
{
    protected $table = 'ATENDIMENTO_ASSIST_SOCIAL';
    //protected $dates = ['VISITA_DATA'];
    protected $dateFormat = 'Ymd';
    //protected $casts = ['VISITA_DATA' => 'date'];

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array('#'
        , trans('messages.tit_visitadata')
        , trans('messages.tit_jogador')
        , trans('messages.tit_categoria')
        , trans('messages.tit_motivoatendimento')
        , trans('messages.tit_origematendimento')
        );
        parent::__construct($attributes);
    }

    protected $fillable = ['ID_ATEND_ASSIST_SOCIAL'
        , 'VISITA_DATA'
        , 'ID_JOGADOR'
        , 'ID_ATIV_ASSIST_SOCIAL'
        , 'ID_ORIGEM_SERVSOCIAL'
        , 'ID_CATEGORIA'
        , 'ID_USUARIO'
        , 'NOME_USUARIO'
        , 'NOME'
        , 'OBS_ATIVIDADE'];

    protected $primaryKey = 'ID_ATEND_ASSIST_SOCIAL';

    public $timestamps = false;

    public static $rules = array();

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
            case $this->titulos[0]:
                return $this->ID_ATEND_ASSIST_SOCIAL;
            case $this->titulos[1]:
                return data_display($this->VISITA_DATA);
            case $this->titulos[2]:
                return $this->jogador->JOG_NOME_COMPLETO;
            case $this->titulos[3]:
                return $this->ID_CATEGORIA;
            case $this->titulos[4]:
                return $this->motivo_atendimento->ATIV_ASSIST_SOCIAL_DESCR;       //ID_ATIV_ASSIST_SOCIAL;
            case $this->titulos[5]:
                return $this->origem_atendimento->ORIGEM_SERVSOCIAL_DESCRICAO;    //ID_ORIGEM_SERVSOCIAL;
        }
    }

    // campos de relacionamento
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // motivo de atendimento
    public function motivo_atendimento()
    {
        return $this->belongsTo(AtividadesSS::class, 'ID_ATIV_ASSIST_SOCIAL', 'ID_ATIV_ASSIST_SOCIAL');
    }

    // origem de atendimento
    public function origem_atendimento()
    {
        return $this->belongsTo(origemservsocial::class, 'ID_ORIGEM_SERVSOCIAL', 'ID_ORIGEM_SERVSOCIAL');
    }

    // jogadores
    public function jogador()
    {
        return $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
    }

    /*
    private function getVISITA_DATAvalue(){
        $dt = Carbon::createFromFormat ( 'd/m/Y', $this->attributes['VISITA_DATA']);
        return   $dt->format( $this->dateFormat );
            //date('d/m/Y', strtotime($this->attributes['VISITA_DATA']));
    }

    private function setVISITA_DATAvalue($value){
        $date_parts = explode('/', $value);
        //$this->attributes['VISITA_DATA'] = $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0];
        $this->attributes['VISITA_DATA'] = Carbon::createFromDate ( $date_parts[2].'-'.$date_parts[1].'-'.$date_parts[0]);
    }
    */
}
