<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * SRP\Models\DFutebol\Jogadores
 *
 * @property int $ID_JOGADOR
 * @property int $ID_TIME_INICIAL
 * @property int $ID_PAIS
 * @property string $JOG_NOME_APELIDO
 * @property string $JOG_NOME_COMPLETO
 * @property string $JOG_DT_NASCIMENTO
 * @property string $JOG_NOME_PAI
 * @property string $JOG_NOME_MAE
 * @property float $JOG_ALTURA
 * @property float $JOG_PESO
 * @property string $JOG_POSICAO
 * @property string $JOG_WWW
 * @property string $JOG_EMAIL
 * @property int $JOG_NUM_PE
 * @property string $JOG_OBSERVACOES
 * @property string $JOG_CPF
 * @property string $JOG_IDENTIDADE
 * @property string $JOG_CARTEIRA_TRABALHO
 * @property string $JOG_CBF
 * @property string $JOG_REG_ESTADUAL
 * @property string $JOG_ESTADO_CIVIL
 * @property string $JOG_ENDERECO
 * @property string $JOG_BAIRRO
 * @property int $ID_CIDADE
 * @property string $JOG_CEP
 * @property string $JOG_TEL1
 * @property string $JOG_TEL2
 * @property string $JOG_TEL3
 * @property string $JOG_TEL4
 * @property string $JOG_ENDERECO2
 * @property string $JOG_BAIRRO2
 * @property int $ID_CIDADE2
 * @property string $JOG_CEP2
 * @property string $JOG_PASSAPORTE
 * @property string $JOG_REFTEL1
 * @property string $JOG_REFTEL2
 * @property string $JOG_REFTEL3
 * @property string $JOG_REFTEL4
 * @property string $JOG_MANEQUIM
 * @property int $JOG_IDADE
 * @property string $UF
 * @property string $UF2
 * @property int $ID_CIDADE_NATAL
 * @property string $UF_NATAL
 * @property int $ID_PARCEIRO
 * @property string $JOG_DATA_RESCISAO
 * @property string $JOG_RESPONSAVEL_LEGAL
 * @property string $JOG_PASSAPORTE_VENCIMENTO
 * @property string $JOG_PASSAPORTE_EMISSAO
 * @property string $JOG_CERTIFICADO_MILITAR
 * @property string $JOG_PIS
 * @property string $JOG_TITULO_ELEITOR
 * @property string $JOG_ZONA
 * @property string $JOG_SECAO
 * @property string $JOG_IDENTIDADE_EMISSAO
 * @property string $JOG_IDENTIDADE_VENCIMENTO
 * @property string $RESP_LEGAL_TUTOR
 * @property string $CERT_LIVRO
 * @property string $CERT_TERMO
 * @property string $CERT_FOLHA
 * @property string $CERT_CARTORIO
 * @property string $JOG_PLANO_SAUDE
 * @property string $JOG_AMADOR_PROF
 * @property string $JOG_RA
 * @property string $JOG_CUIDADOR_ENDERECO
 * @property string $JOG_CUIDADOR_TELEFONE
 * @property int $ORIGEM_JOGADOR_ID
 * @property string $JOG_AUTORIZACAO_ALOJAMENTO
 * @property string $JOG_CARTEIRA_VACINA
 * @property string $JOG_ORIGEM
 * @property string $JOG_DOCUMENTOS_PAI
 * @property string $JOG_DOCUMENTOS_MAE
 * @property string $JOG_BANCO_NOME
 * @property string $JOG_BANCO_AGENCIA
 * @property string $JOG_BANCO_CONTA
 * @property string $JOG_BANCO_TIPO_CONTA
 * @property string $JOG_NOME_PLANO_SAUDE
 * @property string $JOG_VISTO_NUMERO
 * @property string $JOG_VISTO_VENCIMENTO
 * @property string $JOG_TITULO_CIDADE
 * @property string $ELENCO_STATUS
 * @property string $JOG_NOTA
 * @property string $JOG_PE_DOMINANTE
 * @property string $JOG_POS_ALTERNATIVA
 * @property string $JOG_BASE
 * @property int $ID_CLASSIF
 * @property int $ID_ESCOLARIDADE
 * @property string $JOG_FORMACAO
 * @property string $JOG_SMILES
 * @property int $ID_JOGADOR_TESTE
 * @property string $JOG_CAFE
 * @property string $JOG_ALMOCO
 * @property string $JOG_LANCHE
 * @property string $JOG_JANTAR
 * @property string $JOG_CEIA
 * @property int $ID_JOGADOR_EMPRESTADO
 * @property string $JOG_IMAGEM
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereCERTCARTORIO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereCERTFOLHA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereCERTLIVRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereCERTTERMO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereELENCOSTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDCIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDCIDADE2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDCIDADENATAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDCLASSIF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDESCOLARIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDJOGADOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDJOGADOREMPRESTADO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDJOGADORTESTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDPAIS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDPARCEIRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereIDTIMEINICIAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGALMOCO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGALTURA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGAMADORPROF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGAUTORIZACAOALOJAMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBAIRRO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBAIRRO2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBANCOAGENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBANCOCONTA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBANCONOME($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBANCOTIPOCONTA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGBASE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCAFE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCARTEIRATRABALHO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCARTEIRAVACINA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCBF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCEIA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCEP($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCEP2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCERTIFICADOMILITAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCPF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCUIDADORENDERECO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGCUIDADORTELEFONE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGDATARESCISAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGDOCUMENTOSMAE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGDOCUMENTOSPAI($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGDTNASCIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGEMAIL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGENDERECO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGENDERECO2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGESTADOCIVIL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGFORMACAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGIDENTIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGIDENTIDADEEMISSAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGIDENTIDADEVENCIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGIMAGEM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGJANTAR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGLANCHE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGMANEQUIM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOMEAPELIDO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOMECOMPLETO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOMEMAE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOMEPAI($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOMEPLANOSAUDE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNOTA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGNUMPE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGOBSERVACOES($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGORIGEM($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPASSAPORTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPASSAPORTEEMISSAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPASSAPORTEVENCIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPEDOMINANTE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPESO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPIS($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPLANOSAUDE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPOSALTERNATIVA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGPOSICAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGRA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGREFTEL1($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGREFTEL2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGREFTEL3($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGREFTEL4($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGREGESTADUAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGRESPONSAVELLEGAL($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGSECAO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGSMILES($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTEL1($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTEL2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTEL3($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTEL4($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTITULOCIDADE($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGTITULOELEITOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGVISTONUMERO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGVISTOVENCIMENTO($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGWWW($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereJOGZONA($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereORIGEMJOGADORID($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereRESPLEGALTUTOR($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereUF($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereUF2($value)
 * @method static \Illuminate\Database\Query\Builder|\SRP\Models\DFutebol\Jogadores whereUFNATAL($value)
 * @mixin \Eloquent
 */
class Jogadores extends Model
{
    const FOTO_PADRAO    = 'fotos/foto.jpg';
    const FOTO_DIRETORIO = 'fotos' . DIRECTORY_SEPARATOR . 'jogadores' . DIRECTORY_SEPARATOR;

    protected $table      = 'jogadores';
	protected $dateFormat = 'M j Y h:i:s:000A';
    protected $fillable   =
        ['ID_JOGADOR'
        ,'ID_TIME_INICIAL'
	    ,'ID_PAIS'
	    ,'JOG_NOME_APELIDO'
	    ,'JOG_NOME_COMPLETO'
	    ,'JOG_DT_NASCIMENTO'
	    ,'JOG_NOME_PAI'
	    ,'JOG_NOME_MAE'
	    ,'JOG_ALTURA'
	    ,'JOG_PESO'
	    ,'JOG_POSICAO'
	    ,'JOG_WWW'
	    ,'JOG_EMAIL'
	    ,'JOG_NUM_PE'
	    ,'JOG_OBSERVACOES'
	    ,'JOG_CPF'
	    ,'JOG_IDENTIDADE'
	    ,'JOG_CARTEIRA_TRABALHO'
	    ,'JOG_CBF'
	    ,'JOG_REG_ESTADUAL'
	    ,'JOG_ESTADO_CIVIL'
	    ,'JOG_ENDERECO'
	    ,'JOG_BAIRRO'
	    ,'ID_CIDADE'
	    ,'JOG_CEP'
	    ,'JOG_TEL1'
	    ,'JOG_TEL2'
	    ,'JOG_TEL3'
	    ,'JOG_TEL4'
	    ,'JOG_ENDERECO2'
	    ,'JOG_BAIRRO2'
	    ,'ID_CIDADE2'
	    ,'JOG_CEP2'
	    ,'JOG_PASSAPORTE'
	    ,'JOG_REFTEL1'
	    ,'JOG_REFTEL2'
	    ,'JOG_REFTEL3'
	    ,'JOG_REFTEL4'
	    ,'JOG_MANEQUIM'
	    ,'JOG_IDADE'
	    ,'UF'
	    ,'UF2'
	    ,'ID_CIDADE_NATAL'
	    ,'UF_NATAL'
	    ,'ID_PARCEIRO'
	    ,'JOG_DATA_RESCISAO'
	    ,'JOG_RESPONSAVEL_LEGAL'
	    ,'JOG_PASSAPORTE_VENCIMENTO'
	    ,'JOG_CERTIFICADO_MILITAR'
	    ,'JOG_PIS'
	    ,'JOG_TITULO_ELEITOR'
	    ,'JOG_ZONA'
	    ,'JOG_SECAO'
	    ,'JOG_IDENTIDADE_EMISSAO'
	    ,'RESP_LEGAL_TUTOR'
	    ,'CERT_LIVRO'
	    ,'CERT_TERMO'
	    ,'CERT_FOLHA'
	    ,'CERT_CARTORIO'
	    ,'JOG_PASSAPORTE_EMISSAO'
	    ,'JOG_IDENTIDADE_VENCIMENTO'
	    ,'JOG_PLANO_SAUDE'
	    ,'JOG_AMADOR_PROF'
	    ,'JOG_RA'
	    ,'JOG_CUIDADOR_ENDERECO'
	    ,'JOG_CUIDADOR_TELEFONE'
	    ,'JOG_AUTORIZACAO_ALOJAMENTO'
	    ,'JOG_CARTEIRA_VACINA'
	    ,'JOG_ORIGEM'
	    ,'JOG_DOCUMENTOS_PAI'
	    ,'JOG_DOCUMENTOS_MAE'
	    ,'JOG_BANCO_NOME'
	    ,'JOG_BANCO_AGENCIA'
	    ,'JOG_BANCO_CONTA'
	    ,'JOG_BANCO_TIPO_CONTA'
	    ,'JOG_NOME_PLANO_SAUDE'
	    ,'JOG_VISTO_NUMERO'
	    ,'JOG_VISTO_VENCIMENTO'
	    ,'ORIGEM_JOGADOR_ID'
	    ,'JOG_TITULO_CIDADE'
	    ,'ELENCO_STATUS'
	    ,'JOG_NOTA'
	    ,'JOG_PE_DOMINANTE'
	    ,'JOG_POS_ALTERNATIVA'
	    ,'ID_CLASSIF'
	    ,'JOG_BASE'
	    ,'ID_ESCOLARIDADE'
	    ,'JOG_FORMACAO'
		,'JOG_IMAGEM'
        ];

    protected $primaryKey = 'ID_JOGADOR';

    public $timestamps = false;

    public static $customMessages = array(
        'required'=> 'Digite o campo :attribute.',
        'between' => 'O :attribute deve ter no minimo :min digitos'
    );

    public static $rules = array(
         'JOG_NOME_APELIDO'     => 'required|min:3'
        ,'JOG_NOME_COMPLETO'    => 'required|min:3'
        ,'JOG_DT_NASCIMENTO'    => 'required'
    );

	public function paises() {
		//return $this->hasOne('Paises', 'ID_PAIS');
		//return $this->belongsTo('Paises', 'ID_PAIS');
	}

	public function categoria_id(){
		// pesquisa a categoria do jogador
		$reg = DB::table('elenco')
			->where('id_jogador', $this->ID_JOGADOR)
			->orderby('elenco_dt_chegada', 'desc')
			->get();
		$categoria = $reg[0]->ID_CATEGORIA;

		return $categoria;
	}

	public function status(){
		// pesquisa a categoria do jogador
		$reg = DB::table('elenco')
			->where('id_jogador', $this->ID_JOGADOR)
			->orderby('elenco_dt_chegada', 'desc')
			->get();

		//return dd($reg);

		// sen�o achar a categoria, considera 1
		$categoria = $reg[0]->ELENCO_STATUS;

		return $categoria;
	}

	// retorna os jogadores ativos, e um jogador para alteração
	static function jogadoresAtivos($id_jogador){
	    $id = $id_jogador;
	    $jog = Jogadores::whereIn('id_jogador', function($query)
        {
            $query->select('ID_JOGADOR')
                ->from('elenco')
                ->where("elenco_status", "<>", "'N'");
        })
            ->orWhere( "id_jogador", $id )
            ->orderBy('JOG_NOME_COMPLETO', 'asc')
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

	    return $jog;
    }

    static function na_escola_combo(){
        $jog = Jogadores::whereIn('id_jogador', function($query)
        {
            $query->select('ID_JOGADOR')
                ->from('VS_JOGADORES_NA_ESCOLA')
                ->where("ESCOLA_ANO", "=", "2017");
        })
            ->orderBy('JOG_NOME_COMPLETO', 'asc')
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return $jog;
    }

    static function JOG_NOME(){
        return 'NÃO DEFINIDO AINDA';    //$self['JOG_NOME_APELIDO'] . '/' . $self['JOG_NOME_COMPLETO'];
    }

    static function _lkp(){
        $queries = DB::table('V_ELENCO')
            ->orderBy('jog_nome')
            ->take(50)->get();

        if (count($queries) == 0) {
            $results[] = ['id' => '', 'value' => ''];
        }
        else {
            foreach ($queries as $query) {
                $descr = $query->JOG_NOME;
                $results[] = ['id' => $query->ID_JOGADOR, 'value' => $descr];
            }
        }
        //$dados = array();
        $dados[] = json_encode($results);
        return $dados;  //response()->json($results);
    }

}
