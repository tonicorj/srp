<?php

namespace SRP\Http\Controllers\ADM;

use Illuminate\Http\Request;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DepartamentosRequest;
use \SRP\Models\ADM\Departamentos;
use DB;

class DepartamentosController extends Controller
{
    private $departamento;

    public function __construct(Departamentos $departamento) {
        $this->departamento = $departamento;
    }

    public function index(Request $request) {

        $departamentos = Departamentos::query()
            ->orderBy('DEPARTAMENTO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_departamento') );

        return view('adm.departamentos.index')
            ->with('departamentos', $departamentos )
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('adm.departamentos.create');
    }

    public function store(DepartamentosRequest $request) {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_DEPARTAMENTO'] = $id;

        $this->departamento->create($input);

        \Session::flash('message', trans( 'messages.conf_departamento_inc'));
        $url = $request->get('redirect_to', asset('adm/departamentos'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $depto = $this->departamento->find($id);
        return view ('adm.departamentos.edit')
            ->with('departamentos', $depto);
    }

    public function update($id, DepartamentosRequest $request) {
        $this->departamento->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_departamento_alt'));
        $url = $request->get('redirect_to', asset('adm/departamentos'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->departamento->find($id)->delete();

        \Session::flash('message', trans( 'messages.conf_departamento_exc'));
        return redirect()->to(asset('adm/departamentos'));
    }

}
