<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\JogadoresObservacaoRequest;

use SRP\JogadoresObservacao;
use SRP\Paises;
use SRP\Parceiros;

use DB;
use File;
use Image;

class JogadoresObservacaoController extends Controller
{
    private $jogadores;
    private $foto_padrao = 'fotos/foto.jpg';
    private $foto_diretorio = 'fotos/observacao/';

    public function __construct(jogadoresObservacao $jogadores) {
        $this->jogadores = $jogadores;
    }

    public function index(Request $request) {
        return view('jogadoresObservacao.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.JOG_NOME_APELIDO, A.JOG_NOME_COMPLETO, A.ID_JOGADOR ";
        $_sql .= ", A.JOG_POSICAO, A.JOG_IDADE ";
        $_sql .= ", CONVERT( VARCHAR(10), A.JOG_DT_NASCIMENTO, 103 ) AS JOG_DT_NASCIMENTO ";
        $_sql .= "from jogadores_em_observacao A ";
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
        $paises        = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        $parceiros     = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');
        $foto           = $this->foto_padrao;

        return view('jogadoresObservacao.create')
            ->with('paises', $paises)
            ->with('parceiros', $parceiros)
            ->with('foto', $foto)
            ;
    }


    public function store(jogadoresObservacaoRequest $request) {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_JOGADOR) as id from JOGADORES_EM_OBSERVACAO ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_JOGADOR'] = $id;

        // troca a data para o formato do sql server
        $this->AcertaDatasGravacao($input);

        // testa os campos nulos
        $this->AcertaCamposNulos($request);

        // salva a foto
        if ($request->file('imgFoto') != null){
            $image = $request->file('imgFoto');
            $foto = $this->SalvaFotoJogador($image, $id);
            $request['JOG_IMAGEM'] = $foto;
        }

        $this->jogadores->create($input);
        return view('jogadoresObservacao.index');
    }

    public  function edit($id) {
        $jogadores = $this->jogadores->find($id);

        // registros de países
        $p = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        // registro de parceiros
        $parceiros = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');

        // registro de cidades
        $jogadores['CIDADE_NOME'] = $jogadores->cidade();

        // acerta as datas
        $this->AcertaDataExibicao($jogadores);

        $foto = $this->fotoArquivo($jogadores['JOG_IMAGEM']);

        // chama a view de alteração
        return view ('jogadoresObservacao.edit')
            ->with('jogadores', $jogadores)
            ->with('paises', $p)
            ->with('parceiros', $parceiros)
            ->with('foto', $foto)
            ;
    }

    public function update($id, jogadoresObservacaoRequest $request) {

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

        //return dd($request);
        // campos de status
        $this->jogadores->find($id)->update($request->all());
        return view('jogadoresObservacao.index');
    }

    // --------------------------------------------------------------------------------------------
    public function fotoNome($id, $extensao ){
        // se já tiver nome, retorna o nome
        $nome = $this->foto_diretorio . 'foto' . $id . '.' . $extensao;
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
    public function SalvaFotoJogador( $imagem, $id ) {
        // Pega a extensão
        $extensao = $imagem->extension();

        // define o novo nome
        $novoNome = $this->fotoNome($id, $extensao);

        // salva a imagem
        $img = Image::make($imagem);
        $img->resize('100,120');
        $img->save($novoNome);
        return $novoNome;
    }

    // --------------------------------------------------------------------------------------------
    // acerta as datas para gravacao
    public function AcertaDatasGravacao( &$campos ) {
        // troca a data para o formato do sql server
        if (isset($campos['JOG_DT_NASCIMENTO']))
            $campos['JOG_DT_NASCIMENTO']         = data_to_sql($campos['JOG_DT_NASCIMENTO']);
        if (isset($campos['JOG_DATA_RESCISAO']))
            $campos['JOG_DATA_RESCISAO']         = data_to_sql($campos['JOG_DATA_RESCISAO']);
        if (isset($campos['CONTRATO_INICIO']))
            $campos['CONTRATO_INICIO']           = data_to_sql($campos['CONTRATO_INICIO']);
        if (isset($campos['CONTRATO_FINAL']))
            $campos['CONTRATO_FINAL']            = data_to_sql($campos['CONTRATO_FINAL']);
    }

    // acerta as datas para visualização
    public function AcertaDataExibicao( &$campos ) {

        if (isset($campos['JOG_DT_NASCIMENTO']))
            $campos['JOG_DT_NASCIMENTO'] = data_display($campos['JOG_DT_NASCIMENTO']);
        if (isset($campos['JOG_DATA_RESCISAO']))
            $campos['JOG_DATA_RESCISAO'] = data_display($campos['JOG_DATA_RESCISAO']);
        if (isset($campos['CONTRATO_INICIO']))
            $campos['CONTRATO_INICIO']   = data_display($campos['CONTRATO_INICIO']);
        if (isset($campos['CONTRATO_FINAL']))
            $campos['CONTRATO_FINAL']    = data_display($campos['CONTRATO_FINAL']);
    }

    public function AcertaCamposNulos( &$campos ) {
        for ($i = 1; $i<6; $i++) {
            switch  ($i){
                case  1: $campo = 'JOG_NOME_COMPLETO';
                case  2: $campo = 'JOG_POSICAO';
                case  3: $campo = 'JOG_CBF';
                case  4: $campo = 'UF_NATAL';
                case  5: $campo = 'JOG_NUM_CONTRATO';
                case  6: $campo = 'JOG_PE_PRINCIPAL';
            };

            $campos[$campo] = ($campos[$campo] == '')?null:$campos[$campo];
        }
    }
}
