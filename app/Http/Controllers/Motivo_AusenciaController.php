<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\Motivo_AusenciaRequest;
use SRP\Motivo_Ausencia;
use DB;

class Motivo_AusenciaController extends Controller
{
    private $motivo;

    public function __construct(Motivo_Ausencia $motivo_ausencia) {
        $this->motivo_ausencia = $motivo_ausencia;
    }

    public function index(Request $request) {
        return view('motivo_ausencia.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.ID_MOTIVO_AUSENCIA, A.MOTIVO_AUSENCIA_DESCRICAO ";
        $_sql .= "from MOTIVO_AUSENCIA A ";
        $_sql .= "order by ";
        $_sql .= "  A.MOTIVO_AUSENCIA_DESCRICAO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        return view('motivo_ausencia.create')
            ;
    }

    public function store(Motivo_AusenciaRequest $request) {
        $input = $request->all();

        // define o código novo
        $reg = DB::select('select max(ID_MOTIVO_AUSENCIA) as id from MOTIVO_AUSENCIA ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_MOTIVO_AUSENCIA'] = $id;

        $this->motivo_ausencia->create($input);
        return view('motivo_ausencia.index');
    }

    public  function edit($id) {
        $motivo_ausencia = $this->motivo_ausencia->find($id);
        return view ('motivo_ausencia.edit')
            ->with('motivo_ausencia', $motivo_ausencia )
            ;
    }

    public function update($id, Motivo_ausenciaRequest $request) {
        $this->motivo_ausencia->find($id)->update($request->all());
        return view('motivo_ausencia.index');
    }

    public function destroy($id) {
        $this->motivo_ausencia->find($id)->delete();
        return;
    }
}
