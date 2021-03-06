<?php

namespace SRP\Models\DM;

use Illuminate\Database\Eloquent\Model;
use SRP\Models\DFutebol\Categorias;
use SRP\Models\DFutebol\Jogadores;
use DB;

/**
 * SRP\Models\DM\DepMedico
 *
 * @property int $ID_DEPARTAMENTO_MEDICO
 * @property int $ID_JOGADOR
 * @property string $DM_DATA_INICIO
 * @property string $DM_DATA_FIM
 * @property int $ID_TIPO_LESAO
 * @property int $ID_ORIGEM_LESAO
 * @property string $FLAG_AFASTAMENTO
 * @property int $DM_TEMPO_PERMANENCIA
 * @property int $ID_PARTE_CORPO
 * @property string $DM_OBSERVACAO
 * @property int $ID_CATEGORIA
 * @property int $ID_MEDICO
 * @property string $DATA_CONCLUSAO_CONSULTA
 * @property mixed $DM_IMAGEM
 * @property int $ID_LOCAL
 * @property int $DT_LOCAL_2
 * @property int $DT_LOCAL_3
 * @property-read \SRP\Models\DFutebol\Categorias $categoria
 * @property-read \SRP\Models\DFutebol\Jogadores $jogador
 * @property-read \SRP\Models\DM\Medicos $medico
 * @property-read \SRP\Models\DM\Origem_Lesao $origem_lesao
 * @property-read \SRP\Models\DM\Parte_Corpo $parte_corpo
 * @property-read \SRP\Models\DM\Tipo_Lesao $tipo_lesao
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDATACONCLUSAOCONSULTA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDMDATAFIM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDMDATAINICIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDMIMAGEM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDMOBSERVACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDMTEMPOPERMANENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDTLOCAL2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereDTLOCAL3($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereFLAGAFASTAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDCATEGORIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDDEPARTAMENTOMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDLOCAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDMEDICO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDORIGEMLESAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDPARTECORPO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DM\DepMedico whereIDTIPOLESAO($value)
 * @mixin \Eloquent
 */
class DepMedico extends Model
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
        $dm = DB::table("VS_DM_ENTRADAS")
            ->whereNull('dm_data_fim')
            ->orderBy('dm_data_inicio')
            ->get()
        ;
        return $dm;
    }

}
