<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;

use SRP\Http\Requests\JogadoresRequest;

use SRP\Jogadores;
use SRP\JogadorFoto;
use SRP\Models\DFutebol\Paises;
use SRP\Escolaridades;
use SRP\Estadocivil;
use SRP\Parceiros;

use SRP\helpers;

use DB;
use File;
use Image;

class JogadoresController extends Controller
{
    private $jogadores;
    private $foto_padrao = 'fotos/foto.jpg';
    private $foto_diretorio = 'fotos/jogadores/';

    public function __construct(Jogadores $jogadores) {
        $this->jogadores = $jogadores;
    }

    public function index(Request $request) {
        return view('jogadores.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.JOG_NOME_APELIDO, A.JOG_NOME_COMPLETO, A.ID_JOGADOR ";
        $_sql .= ", A.JOG_POSICAO, A.JOG_IDADE ";
        $_sql .= ", CONVERT( VARCHAR(10), A.JOG_DT_NASCIMENTO, 103 ) AS JOG_DT_NASCIMENTO ";
        $_sql .= ", B.CATEG_DESCRICAO ";
        $_sql .= "from f_elenco_atual( 1 ) A ";
        $_sql .= ", ( select categ_descricao from categorias where id_categoria = 1 ) B ";
        $_sql .= "order by ";
        $_sql .= "  A.JOG_NOME_APELIDO ";
	    $_sql .= " ,A.JOG_NOME_COMPLETO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        $paises         = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        $escolaridades  = Escolaridades::orderBy('ESCOLARIDADE_DESCRICAO', 'asc')->pluck('ESCOLARIDADE_DESCRICAO', 'ID_ESCOLARIDADE');
        $estadocivil    = Estadocivil::orderBy('ESTADOCIVIL_DESCRICAO', 'asc')->pluck('ESTADOCIVIL_DESCRICAO', 'ID_ESTADOCIVIL');
        $parceiros      = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');
        $foto           = $this->foto_padrao;

        return view('jogadores.create')
            ->with('paises', $paises)
            ->with('escolaridades', $escolaridades)
            ->with('estadocivil', $estadocivil)
            ->with('parceiros', $parceiros)
            ->with('foto', $foto)
            ;
    }

    public function store(JogadoresRequest $request) {
        $input = $request->all();

        // define o c�digo novo
        $reg = DB::select('select max(ID_JOGADOR) as id from JOGADORES ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o pr�ximo codigo
        $input['ID_JOGADOR'] = $id;

        $image = $input->file('imgFoto');

        // troca a data para o formato do sql server
        $this->AcertaDatasGravacao($request);

        // testa os campos nulos
        $this->AcertaCamposNulos($request);

        // salva a foto
        if ($request->file('imgFoto') != null){
            $image = $request->file('imgFoto');
            $foto = $this->SalvaFotoJogador($image, $id);
            $request['JOG_IMAGEM'] = $foto;
        }

        $this->jogadores->create($input);
        return view('jogadores.index');
    }

    public  function edit($id) {
        $jogadores = $this->jogadores->find($id);
        $foto = $this->fotoNome($id, 'jpg');   //$this->fotoArquivo($jogadores['JOG_IMAGEM']);

        // registros de pa�ses
        $p      = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        // registro de escolaridade
        $escolaridades = Escolaridades::orderBy('ESCOLARIDADE_DESCRICAO', 'asc')->pluck('ESCOLARIDADE_DESCRICAO', 'ID_ESCOLARIDADE');
        // registro de estado civil
        $estadocivil   = Estadocivil::orderBy('ESTADOCIVIL_DESCRICAO', 'asc')->pluck('ESTADOCIVIL_DESCRICAO', 'ID_ESTADOCIVIL');
        // registro de parceiros
        $parceiros     = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');

        // acerta as datas
        $this->AcertaDataExibicao($jogadores);

        // chama a view de altera��o
        return view ('jogadores.edit')
            ->with('jogadores', $jogadores)
            ->with('foto', $foto)
            ->with('paises', $p)
            ->with('escolaridades', $escolaridades)
            ->with('estadocivil', $estadocivil)
            ->with('parceiros', $parceiros)
            ;
    }

    public function update($id, JogadoresRequest $request) {

        // troca a data para o formato do sql server
        $this->AcertaDatasGravacao($request);

        // testa os campos nulos
        $this->AcertaCamposNulos($request);

        // campos de status
        $campo = 'RESP_LEGAL_TUTOR';
        $request[$campo] = ($request[$campo] == 'on')?'S':'N';
        $campo = 'JOG_AUTORIZACAO_ALOJAMENTO';
        $request[$campo] = ($request[$campo] == 'on')?'S':'N';
        $campo = 'JOG_CARTEIRA_VACINA';
        $request[$campo] = ($request[$campo] == 'on')?'S':'N';

        // salva a foto
        if ($request->file('imgFoto') != null){
            $image = $request->file('imgFoto');
            $foto = $this->SalvaFotoJogador($image, $id);
            $request['JOG_IMAGEM'] = $foto;
        }

        // salva o registro
        $this->jogadores->find($id)->update($request->all());

        //return dd($request->all());
        return view('jogadores.index');
    }

    public function destroy($id) {
        //$this->Jogadores->find($id)->delete();
        return;
    }

    // --------------------------------------------------------------------------------------------
    public function fotoNome($id, $extensao ){
        // se j� tiver nome, retorna o nome
        $nome = $this->foto_diretorio . 'JOG' . $id . '.' . $extensao;

        if (file_exists($nome) == FALSE) {
            $nome = $this->foto_diretorio .'padrao.jpg';
        }
        return $nome;
    }

    // --------------------------------------------------------------------------------------------
    public function fotoArquivo($arquivo) {
        // define o nome do arquivo da foto
        if ( ($arquivo == '') || ($arquivo == null) || ( File::exists($arquivo) == false ) ) {
            $arquivo = $this->foto_padrao;
        }
        return $arquivo;
    }

    // --------------------------------------------------------------------------------------------
    public function SalvaFotoJogador( $id ) {
        // Pega a extens�o
        $extensao = 'JPG';  //$imagem->extension();

        // define o novo nome
        $novoNome = $this->fotoNome($id, $extensao);

        // salva a imagem
        $img = Image::make($imagem);
        $img->resize('100,120');
        $img->save($novoNome);

        $nome = asset("/fotos/jogadores/JOG" . $id . ".JPG" );

        return $novoNome;
    }

    // --------------------------------------------------------------------------------------------



    // acerta as datas para gravacao
    public function AcertaDatasGravacao( &$campos ) {
        $campos['JOG_DT_NASCIMENTO']         = data_to_sql($campos['JOG_DT_NASCIMENTO']);
        $campos['JOG_DATA_RESCISAO']         = data_to_sql($campos['JOG_DATA_RESCISAO']);
        $campos['JOG_PASSAPORTE_VENCIMENTO'] = data_to_sql($campos['JOG_PASSAPORTE_VENCIMENTO']);
        $campos['JOG_IDENTIDADE_EMISSAO']    = data_to_sql($campos['JOG_IDENTIDADE_EMISSAO']);
        $campos['JOG_PASSAPORTE_EMISSAO']    = data_to_sql($campos['JOG_PASSAPORTE_EMISSAO']);
        $campos['JOG_IDENTIDADE_VENCIMENTO'] = data_to_sql($campos['JOG_IDENTIDADE_VENCIMENTO']);
        $campos['JOG_VISTO_VENCIMENTO']      = data_to_sql($campos['JOG_VISTO_VENCIMENTO']);

    }

    // acerta as datas para visualiza��o
    public function AcertaDataExibicao( &$campos ) {
        $campos['JOG_DT_NASCIMENTO']         = data_display($campos['JOG_DT_NASCIMENTO']);
        $campos['JOG_DATA_RESCISAO']         = data_display($campos['JOG_DATA_RESCISAO']);
        $campos['JOG_PASSAPORTE_VENCIMENTO'] = data_display($campos['JOG_PASSAPORTE_VENCIMENTO']);
        $campos['JOG_IDENTIDADE_EMISSAO']    = data_display($campos['JOG_IDENTIDADE_EMISSAO']);
        $campos['JOG_PASSAPORTE_EMISSAO']    = data_display($campos['JOG_PASSAPORTE_EMISSAO']);
        $campos['JOG_IDENTIDADE_VENCIMENTO'] = data_display($campos['JOG_IDENTIDADE_VENCIMENTO']);
        $campos['JOG_VISTO_VENCIMENTO']      = data_display($campos['JOG_VISTO_VENCIMENTO']);

    }

    public function AcertaCamposNulos( &$campos ) {
        for ($i = 1; $i<47; $i++) {
            switch  ($i){
                case  1: $campo = 'JOG_PESO';
                case  2: $campo = 'JOG_WWW';
                case  3: $campo = 'JOG_EMAIL';
                case  4: $campo = 'JOG_NUM_PE';
                case  5: $campo = 'JOG_ENDERECO';
                case  6: $campo = 'JOG_BAIRRO';
                case  7: $campo = 'ID_CIDADE';
                case  8: $campo = 'JOG_CEP';
                case  9: $campo = 'JOG_TEL1';
                case 10: $campo = 'JOG_TEL2';
                case 11: $campo = 'JOG_TEL3';
                case 12: $campo = 'JOG_TEL4';
                case 13: $campo = 'JOG_ENDERECO2';
                case 14: $campo = 'JOG_BAIRRO2';
                case 15: $campo = 'ID_CIDADE2';
                case 16: $campo = 'JOG_CEP2';
                case 17: $campo = 'JOG_PASSAPORTE';
                case 18: $campo = 'JOG_REFTEL1';
                case 19: $campo = 'JOG_REFTEL2';
                case 20: $campo = 'JOG_REFTEL3';
                case 21: $campo = 'JOG_REFTEL4';
                case 22: $campo = 'JOG_MANEQUIM';
                case 23: $campo = 'UF';
                case 24: $campo = 'UF2';
                case 25: $campo = 'JOG_RESPONSAVEL_LEGAL';
                case 26: $campo = 'JOG_CERTIFICADO_MILITAR';
                case 27: $campo = 'JOG_PIS';
                case 28: $campo = 'JOG_TITULO_ELEITOR';
                case 29: $campo = 'JOG_ZONA';
                case 30: $campo = 'JOG_SECAO';
                case 31: $campo = 'JOG_PLANO_SAUDE';
                case 32: $campo = 'JOG_RA';
                case 33: $campo = 'JOG_CUIDADOR_ENDERECO';
                case 34: $campo = 'JOG_CUIDADOR_TELEFONE';
                case 35: $campo = 'JOG_CUIDADOR_TELEFONE';
                case 36: $campo = 'JOG_ORIGEM';
                case 37: $campo = 'JOG_DOCUMENTOS_PAI';
                case 38: $campo = 'JOG_DOCUMENTOS_MAE';
                case 39: $campo = 'JOG_BANCO_NOME';
                case 40: $campo = 'JOG_BANCO_AGENCIA';
                case 41: $campo = 'JOG_BANCO_CONTA';
                case 42: $campo = 'JOG_BANCO_TIPO_CONTA';
                case 43: $campo = 'JOG_NOME_PLANO_SAUDE';
                case 44: $campo = 'JOG_VISTO_NUMERO';
                case 45: $campo = 'JOG_PE_DOMINANTE';
                case 46: $campo = 'JOG_POS_ALTERNATIVA';
            };

            $campos[$campo] = ($campos[$campo] == '')?null:$campos[$campo];
        }
    }

    /*
    public function autocomplete(Request $request)
    {
        $data = DB::table('VSC_ELENCO')
            ->select("jog_nome_completo as name, id_jogador" )
            ->where("jog_nome_completo ","LIKE","%{$request->input('query')}%")
            ->where('id_categoria' , '<>', 1 )
            ->where('elenco_status', '=', 'S')
            ->get();
        return response()->json($data);
    }
    */

    public function autocomplete(Request $request){
        //return response()->json($request);
        //return dd($request);
        //$term = Input::get('term');

        $term = $request->input('term');
        $term = '%' . $term . '%';
        $results = array();

        $queries = DB::table('V_ELENCO')
            ->where('jog_nome', 'LIKE', $term)
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
        return response()->json($results);
    }

}
