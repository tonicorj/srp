<?php

namespace SRP\Http\Controllers\ADM;


use SRP\Http\Requests\ADM\CargosRequest;
use SRP\Models\ADM\Cargos;
use SRP\Http\Controllers\Controller;

class CargosController extends Controller
{
    private $cargos;

    public function __construct(Cargos $cargos) {
        $this->cargos = $cargos;
    }

    public function index() {
        $cargos = Cargos::query()
            ->orderBy('CARGO_COMISSAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_cargo') );

        return view('adm.cargos.index')
            ->with('cargos', $cargos)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        //return "Funcionou!";
        return view('adm.cargos.create');
    }

    public function store(CargosRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('CARGOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CARGO'] = $id;
        $this->cargos->create($input);

        \Session::flash('message', trans('messages.conf_cargo_inc'));
        $url = $request->get('redirect_to', asset('adm/cargos'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $cargo = $this->cargos->find($id);

        return view ('adm.cargos.edit')
            ->with('cargos', $cargo);
    }

    public function update($id, CargosRequest $request) {
        $this->cargos->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_cargo_alt'));
        $url = $request->get('redirect_to', asset('adm/cargos'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->cargos->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_cargo_exc'));
        return redirect()->to(asset('adm/cargos'));
    }
}
