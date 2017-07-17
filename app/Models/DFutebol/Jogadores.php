<?php

namespace SRP\Models\DFutebol;

use Illuminate\Database\Eloquent\Model;
use DB;

class Jogadores extends Model
{
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
		return $this->hasOne('Paises', 'ID_PAIS');
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
        return $self['JOG_NOME_APELIDO'] . '/' . $self['JOG_NOME_COMPLETO'];
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
