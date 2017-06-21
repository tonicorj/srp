<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;

use SRP\Http\Requests\atividadesRequest;
use SRP\Atividades;
use DB;

class AtividadesController extends Controller
{
    private $atividades;

    public function __construct(Atividades $atividades) {
        $this->atividades = $atividades;
    }

    public function index(Request $request) {
        $r  = "base_path    ->" . base_path()   . "<br>";
        $r .= "app_path     ->" . app_path()    . "<br>";
        $r .= "public_path  ->" . public_path() . "<br>";
        $r .= "storage_path ->" . storage_path();
        //return $r;
        return view('atividadesPed.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql = "select a.ID_ATIVIDADE, a.ATIVIDADE_DESCRICAO " .
            " from atividadesPed a " .
            " order by a.ATIVIDADE_DESCRICAO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        //return "Funcionou!";
        return view('atividadesPed.create');
    }

    public function store(atividadesRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o c�digo novo
        $reg = DB::select('select max(ID_ATIVIDADE) as id from ATIVIDADES ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o pr�ximo codigo
        $input['ID_ATIVIDADE'] = $id;

        $this->atividades->create($input);
        //Session::flash('flash_message', 'Inclus�o feita com sucesso');

        //return  \Response::json($input);
        return view ('atividadesPed.index');
    }

    public  function edit($id) {
        $atividade = $this->atividades->find($id);
        //return dd($atividade);
        return view ('atividadesPed.edit')
            ->with('atividades', $atividade);
    }

    public function update($id, atividadesRequest $request) {
        $this->atividades->find($id)->update($request->all());

        //return dd($request->all());
        return view ('atividadesPed.index');

    }

    public function destroy($id) {
        $this->atividades->find($id)->delete();
        return;
    }
}
