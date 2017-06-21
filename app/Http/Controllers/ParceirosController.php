<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\ParceirosRequest;

use SRP\Parceiros;
use DB;

class ParceirosController extends Controller
{
    private $parceiros;

    public function __construct(Parceiros $parceiros) {
        $this->parceiros = $parceiros;
    }

    public function index(Request $request) {
        return view('parceiros.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql = "select a.ID_PARCEIRO, a.PARCEIRO_NOME, a.NOME_CONTATO_PARCEIRO, a.PARCEIRO_TELEFONE, a.PARCEIRO_CELULAR " .
            " from parceiros a " .
            " order by a.PARCEIRO_NOME ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        //return "Funcionou!";
        return view('parceiros.create');
    }

    public function store(ParceirosRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $reg = DB::select('select max(ID_PARCEIRO) as id from PARCEIROS ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_PARCEIRO'] = $id;

        $this->parceiros->create($input);
        return view('parceiros.index');
    }

    public  function edit($id) {
        $parceiro = $this->parceiros->find($id);
        return view ('parceiros.edit')
            ->with('parceiro', $parceiro)
            ;
    }

    public function update($id, ParceirosRequest $request) {
        $this->parceiros->find($id)->update($request->all());
        return view('parceiros.index');
    }

    public function destroy($id) {
        $this->parceiros->find($id)->delete();
        return view('parceiros.index');
    }
}
