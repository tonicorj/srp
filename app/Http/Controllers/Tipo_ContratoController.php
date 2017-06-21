<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\Tipo_ContratoRequest;

use SRP\Tipo_Contrato;
use DB;

class Tipo_ContratoController extends Controller
{
    private $tipo_contrato;

    public function __construct(Tipo_Contrato $tipo_contrato) {
        $this->tipo_contrato = $tipo_contrato;
    }

    public function index(Request $request) {
        return view('tipo_contrato.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.ID_TIPO_CONTRATO, A.TIPO_CONTRATO_DESCRICAO ";
        $_sql .= "from TIPO_CONTRATO A ";
        $_sql .= "order by ";
        $_sql .= "  A.TIPO_CONTRATO_DESCRICAO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        return view('tipo_contrato.create')
            ;
    }

    public function store(Tipo_ContratoRequest $request) {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_TIPO_CONTRATO) as id from TIPO_CONTRATO');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_TIPO_CONTRATO'] = $id;

        $this->tipo_contrato->create($input);
        return view('tipo_contrato.index');
    }

    public  function edit($id) {
        $tipo_contrato = $this->tipo_contrato->find($id);
        return view ('tipo_contrato.edit')
            ->with('tipo_contrato', $tipo_contrato )
            ;
    }

    public function update($id, Tipo_ContratoRequest $request) {
        $this->tipo_contrato->find($id)->update($request->all());
        return view('tipo_contrato.index');
    }

    public function destroy($id) {
        $this->tipo_contrato->find($id)->delete();
        return;
    }
}
