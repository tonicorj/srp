<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\EstadoCivilRequest;
use SRP\EstadoCivil;
use DB;


class EstadocivilController extends Controller
{
    private $estadocivil;

    public function __construct(EstadoCivil $estadocivil) {
        $this->estadocivil = $estadocivil;
    }

    public function index(Request $request) {
        return view('estadocivil.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.ID_ESTADOCIVIL, A.ESTADOCIVIL_DESCRICAO ";
        $_sql .= "from ESTADOCIVIL A ";
        $_sql .= "order by ";
        $_sql .= "  A.ESTADOCIVIL_DESCRICAO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        return view('estadocivil.create')
            ;
    }

    public function store(EstadocivilsRequest $request) {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_ESTADOCIVIL) as id from ESTADOCIVIL ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_ESCOLARIDADE'] = $id;

        $this->estadocivil->create($input);
        return view('estadocivil.index');
    }

    public  function edit($id) {
        $estadocivil = $this->estadocivil->find($id);
        return view ('estadocivil.edit')
            ->with('estadocivil', $estadocivil )
            ;
    }

    public function update($id, EstadocivilRequest $request) {
        $this->estadocivil->find($id)->update($request->all());
        return view('estadocivil.index');
    }

    public function destroy($id) {
        $this->estadocivil->find($id)->delete();
        return;
    }
}
