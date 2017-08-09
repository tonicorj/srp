<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;

use SRP\Http\Requests\DFutebol\JogadoresRequest;
use SRP\Models\ADM\Cidades;
use SRP\Models\DFutebol\Jogadores;
use SRP\Models\DFutebol\Parceiros;

use SRP\Models\ADM\Paises;
use SRP\Models\ADM\Escolaridades;
use SRP\Models\ADM\estadocivil;

use DB;
use File;
use Illuminate\Support\Facades\Auth;

class JogadoresController extends Controller
{
    private $jogadores;
    private $foto_padrao = 'fotos/foto.jpg';
    private $foto_diretorio = 'fotos/jogadores/';

    public function __construct(Jogadores $jogadores) {
        $this->jogadores = $jogadores;
    }

    public function index() {
        $id_categoria = Auth::user()->categoria_selecionada();
        $jogadores = DB::table('V_ELENCO')
            ->where('ID_CATEGORIA', '=', $id_categoria)
            ->where('ELENCO_STATUS', '=', 'S')
            ->orderBy('JOG_NOME_APELIDO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_apelido')
        , trans('messages.tit_nome_completo')
        , trans('messages.tit_tempo_clube')
        , trans('messages.tit_posicao')
        , trans('messages.tit_dt_nasc')
        , trans('messages.tit_idade')
        );

        return view('DFutebol.jogadores.index')
            ->with('jogadores', $jogadores)
            ->with('titulos', $titulos)
            ;
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
        $estadocivil    = estadocivil::orderBy('ESTADOCIVIL_DESCRICAO', 'asc')->pluck('ESTADOCIVIL_DESCRICAO', 'ID_ESTADOCIVIL');
        $parceiros      = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');
        $foto           = $this->foto_padrao;

        return view('dfutebol.jogadores.create')
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

        if ($input->file('imgfoto') != null) {
            //return dd($request->file('imgfoto'));
            $image = $input->file('imgfoto');
            $foto = $this->SalvaFotoJogador($image, $id);
            $input['JOG_IMAGEM'] = $foto;
        }

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
        return view('dfutebol.jogadores.index');
    }

    public  function edit($id) {
        $jogadores = $this->jogadores->find($id);

        //return dd($jogadores['JOG_IMAGEM']);
        $foto = $this->fotoNome($id, $jogadores['JOG_IMAGEM']);   //$this->fotoArquivo($jogadores['JOG_IMAGEM']);

        // registros de pa�ses
        $p      = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        // registro de escolaridades
        $escolaridades = Escolaridades::orderBy('ESCOLARIDADE_DESCRICAO', 'asc')->pluck('ESCOLARIDADE_DESCRICAO', 'ID_ESCOLARIDADE');
        // registro de estado civil
        $estadocivil   = estadocivil::orderBy('ESTADOCIVIL_DESCRICAO', 'asc')->pluck('ESTADOCIVIL_DESCRICAO', 'ID_ESTADOCIVIL');
        // registro de parceiros
        $parceiros     = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');

        // acerta as datas
        $this->AcertaDataExibicao($jogadores);

        // chama a view de altera��o
        return view ('dfutebol.jogadores.edit')
            ->with('jogador', $jogadores)
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

        //return dd($request->file('imgfoto'));

        // salva a foto
        if ($request->file('imgfoto') != null) {
            //return dd($request->file('imgfoto'));
            $image = $request->file('imgfoto');
            $foto = $this->SalvaFotoJogador($image, $id);
            $request['JOG_IMAGEM'] = $foto;
        }
        // salva o registro
        $this->jogadores->find($id)->update($request->all());

        //return dd($request->all());
        \Session::flash('message', trans('messages.conf_jogador_alt'));
        $url = $request->get('redirect_to', asset('DFutebol/jogadores'));
        return redirect()->to($url);
    }

    public function destroy() {
        //$this->Jogadores->find($id)->delete();
        return;
    }

    // --------------------------------------------------------------------------------------------
    public function fotoNome($id, $nomeimagem ){
        // se j� tiver nome, retorna o nome

        //$dir = $dir  . Jogadores::FOTO_DIRETORIO . round($id / 100, 0);
        //$nome = $dir . 'JOG' . $id . '.' . $extensao;
        $nome = $this->foto_diretorio .'padrao.jpg';

        if (isset($nomeimagem)) {
            $pesq = public_path() . DIRECTORY_SEPARATOR . $nomeimagem;
            //return dd($pesq);
            if (file_exists( $pesq ) == TRUE) {
                $nome = $nomeimagem;
            }
        }
        //return dd($nomeimagem . ' - ' . $nome);
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
    public function SalvaFotoJogador( $image, $id ) {
        // Pega a extens�o
        //$extensao = 'JPG';  //$imagem->extension();
        $extensao = $image->getClientOriginalExtension();

        // define o novo nome
        $nome = 'JOG' . $id  . '.' . $extensao;

        // define o diretório
        $dir1 = Jogadores::FOTO_DIRETORIO . round($id / 100, 0);
        $dir2 = public_path() . DIRECTORY_SEPARATOR . $dir1;
        //return dd($dir2);
        if (!file_exists($dir2)){
            mkdir($dir2, 777);
        }

        // salva a imagem
        $image->move($dir2, $nome);

        $nome = $dir1 . DIRECTORY_SEPARATOR . $nome;
        return $nome;
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

        if ($campos['CIDADE_NOME_NATAL'] != null )
            $campos['CIDADE_NOME_NATAL']         = Cidades::find($campos['ID_CIDADE_NATAL'])->CIDADE_NOME;

        if ($campos['CIDADE_NOME1'] != null )
            $campos['CIDADE_NOME1']              = Cidades::find($campos['ID_CIDADE'])->CIDADE_NOME;

        if ($campos['CIDADE_NOME2'] != null )
            $campos['CIDADE_NOME2']              = Cidades::find($campos['ID_CIDADE2'])->CIDADE_NOME;
    }

    public function AcertaCamposNulos( &$campos ) {
        $campo = '';
        for ($i = 1; $i<47; $i++) {
            switch  ($i){
                case  1: {$campo = 'JOG_PESO';      break; }
                case  2: {$campo = 'JOG_WWW';       break; }
                case  3: {$campo = 'JOG_EMAIL';     break; }
                case  4: {$campo = 'JOG_NUM_PE';    break; }
                case  5: {$campo = 'JOG_ENDERECO';  break; }
                case  6: {$campo = 'JOG_BAIRRO';    break; }
                case  7: {$campo = 'ID_CIDADE';     break; }
                case  8: {$campo = 'JOG_CEP';       break; }
                case  9: {$campo = 'JOG_TEL1';      break; }
                case 10: {$campo = 'JOG_TEL2';      break; }
                case 11: {$campo = 'JOG_TEL3';      break; }
                case 12: {$campo = 'JOG_TEL4';      break; }
                case 13: {$campo = 'JOG_ENDERECO2'; break; }
                case 14: {$campo = 'JOG_BAIRRO2';   break; }
                case 15: {$campo = 'ID_CIDADE2';    break; }
                case 16: {$campo = 'JOG_CEP2';      break; }
                case 17: {$campo = 'JOG_PASSAPORTE';break; }
                case 18: {$campo = 'JOG_REFTEL1';   break; }
                case 19: {$campo = 'JOG_REFTEL2';   break; }
                case 20: {$campo = 'JOG_REFTEL3';   break; }
                case 21: {$campo = 'JOG_REFTEL4';   break; }
                case 22: {$campo = 'JOG_MANEQUIM';  break; }
                case 23: {$campo = 'UF';            break; }
                case 24: {$campo = 'UF2';           break; }
                case 25: {$campo = 'JOG_RESPONSAVEL_LEGAL';     break; }
                case 26: {$campo = 'JOG_CERTIFICADO_MILITAR';   break; }
                case 27: {$campo = 'JOG_PIS';       break; }
                case 28: {$campo = 'JOG_TITULO_ELEITOR';        break; }
                case 29: {$campo = 'JOG_ZONA';      break; }
                case 30: {$campo = 'JOG_SECAO';     break; }
                case 31: {$campo = 'JOG_PLANO_SAUDE';           break; }
                case 32: {$campo = 'JOG_RA';        break; }
                case 33: {$campo = 'JOG_CUIDADOR_ENDERECO';     break; }
                case 34: {$campo = 'JOG_CUIDADOR_TELEFONE';     break; }
                case 35: {$campo = 'JOG_CUIDADOR_TELEFONE';     break; }
                case 36: {$campo = 'JOG_ORIGEM';                break; }
                case 37: {$campo = 'JOG_DOCUMENTOS_PAI';        break; }
                case 38: {$campo = 'JOG_DOCUMENTOS_MAE';        break; }
                case 39: {$campo = 'JOG_BANCO_NOME';            break; }
                case 40: {$campo = 'JOG_BANCO_AGENCIA';         break; }
                case 41: {$campo = 'JOG_BANCO_CONTA';           break; }
                case 42: {$campo = 'JOG_BANCO_TIPO_CONTA';      break; }
                case 43: {$campo = 'JOG_NOME_PLANO_SAUDE';      break; }
                case 44: {$campo = 'JOG_VISTO_NUMERO';          break; }
                case 45: {$campo = 'JOG_PE_DOMINANTE';          break; }
                case 46: {$campo = 'JOG_POS_ALTERNATIVA';       break; }
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
