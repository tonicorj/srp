<?php

namespace SRP\Models\DM;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use SRP\Jogadores;
use SRP\Models\DFutebol\Categorias;
use DB;

class DepMedico extends Model implements TableInterface
{
    protected $table = 'DEPARTAMENTO_MEDICO';
    protected $fillable = [
          'ID_DEPARTAMENTO_MEDICO'
        , 'ID_JOGADOR'
        , 'DM_DATA_INICIO'
        , 'DM_DATA_FIM'
        , 'ID_TIPO_LESAO'
        , 'ID_ORIGEM_LESAO'
        , 'FLAG_AFASTAMENTO'
        , 'DM_TEMPO_PERMANENCIA'
        , 'ID_PARTE_CORPO'
        , 'DM_OBSERVACAO'
        , 'ID_CATEGORIA'
        , 'ID_MEDICO'
        , 'DATA_CONCLUSAO_CONSULTA'
        , 'DM_IMAGEM'
        , 'ID_LOCAL'
        , 'DT_LOCAL_2'
        , 'DT_LOCAL_3'
    ];
    protected $primaryKey = 'ID_DEPARTAMENTO_MEDICO';

    public $timestamps = false;

    private $titulos;

    public function __construct(array $attributes = [])
    {
        $this->titulos = array(
              trans('messages.tit_depmedico_inicio')
            , trans('messages.tit_depmedico_fim')
            , trans('messages.tit_jogador')
            , trans('messages.tit_depmedico_afastamento')
            , trans('messages.tit_tipo_lesao')
            , trans('messages.tit_origem_lesao')
            , trans('messages.tit_parte_corpo')
            , trans('messages.tit_medico')
            , trans('messages.tit_depmedico_tempo')
        );
        parent::__construct($attributes);
    }

    public static $rules = array(
          'ID_JOGADOR' => 'required'
        , 'DM_DATA_INICIO_S' => 'required'
        , 'ID_TIPO_LESAO' => 'required'
        , 'ID_ORIGEM_LESAO' => 'required'
        , 'ID_PARTE_CORPO' => 'required'
        , 'ID_MEDICO'   => 'required'
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
            case $this->titulos[0]: return data_display($this->DM_DATA_INICIO);
            case $this->titulos[1]: return data_display($this->DM_DATA_FIM);
            case $this->titulos[2]: return ( isset($this->jogador->JOG_NOME_APELIDO)) ? $this->jogador->JOG_NOME_APELIDO : '-';
            case $this->titulos[3]: return $this->FLAG_AFASTAMENTO;
            case $this->titulos[4]: return ( isset($this->tipo_lesao->TIPO_LESAO_DESCRICAO)) ? $this->tipo_lesao->TIPO_LESAO_DESCRICAO : '-';
            case $this->titulos[5]: return ( isset($this->origem_lesao->ORIGEM_LESAO_DESCRICAO)) ? $this->origem_lesao->ORIGEM_LESAO_DESCRICAO : '-';
            case $this->titulos[6]: return ( isset($this->parte_corpo->PARTE_CORPO_DESCRICAO) )  ? $this->parte_corpo->PARTE_CORPO_DESCRICAO : '-';
            case $this->titulos[7]: return ( isset($this->medico->NOME_USUARIO) )                ? $this->medico->NOME_USUARIO : '-';
            case $this->titulos[8]: return $this->DM_TEMPO_PERMANENCIA;
        }
    }

    // campos de relacionamento jogadores
    public function jogador(){
        $ret = $this->belongsTo(Jogadores::class, 'ID_JOGADOR', 'ID_JOGADOR');
        return $ret;
    }

    // campos de relacionamento categorias
    public function categoria(){
        return $this->belongsTo(Categorias::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }

    // medicos
    public function medico(){
        return $this->belongsTo(Medicos::class, 'ID_MEDICO', 'ID_USUARIO');
    }

    // campos de relacionamento
    public function origem_lesao(){
        return $this->belongsTo(Origem_Lesao::class, 'ID_ORIGEM_LESAO', 'ID_ORIGEM_LESAO');
    }

    // campos de relacionamento
    public function tipo_lesao(){
        return $this->belongsTo(Tipo_Lesao::class, 'ID_TIPO_LESAO', 'ID_TIPO_LESAO');
    }

    // campos de relacionamento
    public function parte_corpo(){
        return $this->belongsTo(Parte_Corpo::class, 'ID_PARTE_CORPO', 'ID_PARTE_CORPO');
    }

    // pesquisa a entrada no DM e carrega os campos para exibição
    public static function pesquisaDM($id_dm){

        $dmatend = DepMedico::find($id_dm);

        if ( !isset($dmatend ) ){
            return dd($id_dm);
        }
        // cria os campos de fk
        $dmatend['JOG_NOME_APELIDO'] = $dmatend->jogador->JOG_NOME_APELIDO;
        $dmatend['TIPO_LESAO_DESCRICAO'] = $dmatend->tipo_lesao->TIPO_LESAO_DESCRICAO;
        $dmatend['ORIGEM_LESAO_DESCRICAO'] = $dmatend->origem_lesao->ORIGEM_LESAO_DESCRICAO;
        $dmatend['PARTE_CORPO_DESCRICAO'] = $dmatend->parte_corpo->PARTE_CORPO_DESCRICAO;
        $dmatend['NOME_MEDICO'] = $dmatend->medico->NOME_USUARIO;
        $dmatend['DM_DATA_INI_S'] = data_display($dmatend->DM_DATA_INI);

        return $dmatend;
    }

    public static function consulta() {
        $sql = "select * from VS_DM_ENTRADAS ";
        $dm = DB::table("VS_DM_ENTRADAS")
            ->whereNull('dm_data_fim')
            ->orderBy('dm_data_inicio')
            ->get()
        ;
        return $dm;
    }

}
