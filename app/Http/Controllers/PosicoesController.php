<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\PosicoesRequest;
use SRP\Posicoes;

use DB;


class PosicoesController extends Controller
{
    private $posicoes;

    public function __construct(Posicoes $posicoes) {
        $this->posicoes = $posicoes;
    }

    public function index(Request $request) {
        return view('posicoes.index');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.POSICAO, A.POSICAO_DESCRICAO, A.POSICAO_ORDEM, A.POSICAO_CAMPO ";
        $_sql .= "from POSICAO A ";
        $_sql .= "order by ";
        $_sql .= "  A.POSICAO ";
        $_sql .= " ,A.POSICAO_DESCRICAO ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        return view('posicoes.create');
    }

    public function store(PosicoesRequest $request) {
        $input = $request->all();
        $this->posicoes->create($input);
        return view('posicoes.index');
    }

    public  function edit($id) {
        $posicoes = $this->posicoes->where('POSICAO', $id);
        //find($id);
        //where('POSICAO', $id);
        //find($id);
        //return dd($posicoes);
        return view ('posicoes.edit')
            ->with('posicoes', $posicoes)
            ;
    }

    public function update($id, PosicoesRequest $request) {
        $this->posicoes->find($id)->update($request->all());
        return dd($request->all());
    }

    public function destroy($id) {
        $this->Posicoes->find($id)->delete();
        return;
    }
}
