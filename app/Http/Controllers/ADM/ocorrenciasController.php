<?php

namespace SRP\Http\Controllers\adm;

use SRP\Jogadores;
use SRP\Models\ADM\Ocorrencias;
use SRP\Http\Controllers\Controller;
use SRP\Models\ADM\ocorrenciaGravidade;
use SRP\Http\Requests\ADM\ocorrenciasRequest;

use SRP\helpers;
use DB;

class ocorrenciasController extends Controller
{
    private $ocorrencia;

    public function __construct(Ocorrencias $ocorrencia) {
        $this->ocorrencia = $ocorrencia;
    }

    public function index() {
        $ocorrencias = DB::table('V_OCORRENCIA_JOGADORES')
            ->orderBy('OCORR_DATA', 'DESC')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_ocorrenciadata')
            , trans( 'messages.tit_jogador')
            , trans( 'messages.tit_categoria')
            , trans( 'messages.tit_ocorrenciadescricao')
            , trans( 'messages.tit_ocorrenciatipo')
        );

        return view('adm.ocorrencias.index')
            ->with('ocorrencias', $ocorrencias)
            ->with('titulos', $titulos)
            ;
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select B.JOG_NOME_APELIDO, B.JOG_NOME_COMPLETO ";
        $_sql .= ", A.ID_JOGADOR_OCORRENCIA ";
        $_sql .= ", A.ID_JOGADOR ";
        $_sql .= ", CONVERT( VARCHAR(10), A.OCORR_DATA, 103 ) AS OCORR_DATA ";
        $_sql .= ", A.OCORR_TIPO ";
        $_sql .= ", A.OCORR_DESCRICAO ";
        $_sql .= ", A.ID_CATEGORIA ";
        $_sql .= ", C.CATEG_DESCRICAO ";
        $_sql .= "from JOGADOR_OCORRENCIA A ";
        $_sql .= " LEFT JOIN JOGADORES  B ON A.ID_JOGADOR   = B.ID_JOGADOR   ";
        $_sql .= " LEFT JOIN CATEGORIAS C ON A.ID_CATEGORIA = C.ID_CATEGORIA ";
        $_sql .= "order by ";
        $_sql .= "  A.OCORR_DATA desc ";
        $_sql .= " ,B.JOG_NOME_APELIDO ";
        $_sql .= " ,B.JOG_NOME_COMPLETO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        $gravidades = ocorrenciaGravidade::orderby('ID_OCORRENCIA_GRAVIDADE')
            ->pluck('OCORRENCIA_GRAVIDADE_DESCRICAO', 'ID_OCORRENCIA_GRAVIDADE')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        //return dd($jog);
        return view('adm.ocorrencias.create')
            ->with('gravidades', $gravidades)
            ;
    }

    public function store(ocorrenciasRequest $request) {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('JOGADOR_OCORRENCIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_JOGADOR_OCORRENCIA'] = $id;

        // troca a data para o formato do sql server
        $input['OCORR_DATA']         = data_to_sql($input['OCORR_DATA_S']);

        // grava a categoria
        $input['ID_CATEGORIA'] = Jogadores::find($input['ID_JOGADOR'])->categoria_id();

        $this->ocorrencia->create($input);

        \Session::flash('message', trans( 'messages.conf_ocorrencia_inc'));
        $url = $request->get('redirect_to', asset('adm/ocorrencias'));
        return redirect()->to($url);

    }

    public  function edit($id) {
        $ocorrencia = $this->ocorrencia->find($id);

        $gravidades = ocorrenciaGravidade::orderby('ID_OCORRENCIA_GRAVIDADE')
            ->pluck('OCORRENCIA_GRAVIDADE_DESCRICAO', 'ID_OCORRENCIA_GRAVIDADE')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        //$jog = Jogadores::find($ocorrencia['ID_JOGADOR'])->JOG_NOME();
        $jog = DB::select('select JOG_NOME from v_elenco where id_jogador = ' . $ocorrencia['ID_JOGADOR']);

        // acerta as datas
        $ocorrencia['OCORR_DATA_S'] = data_display($ocorrencia['OCORR_DATA']);
        $ocorrencia['JOG_NOME']   = $jog[0]->JOG_NOME;

        // chama a view de alteração
        return view ('adm.ocorrencias.edit')
            ->with('ocorrencia', $ocorrencia)
            ->with('gravidades', $gravidades)
            ;
    }

    public function update($id, ocorrenciasRequest $request) {
        // troca a data para o formato do sql server
        $request['OCORR_DATA'] = data_to_sql($request['OCORR_DATA_S']);
        $this->ocorrencia->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_ocorrencia_alt'));
        $url = $request->get('redirect_to', asset('adm.ocorrencias'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->ocorrencia->find($id)->delete();
        \Session::flash('message', trans('messages.conf_ocorrencia_exc'));
        //$url = $request->get('redirect_to', asset('adm.ocorrencias'));
        $url = asset('adm/ocorrencias');
        return redirect()->to($url);
    }
}
