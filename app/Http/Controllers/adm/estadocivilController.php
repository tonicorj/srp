<?php

namespace SRP\Http\Controllers\adm;

use SRP\Http\Requests\ADM\estadocivilRequest;
use SRP\Models\ADM\estadocivil;
use SRP\Http\Controllers\Controller;


class estadocivilController extends Controller
{
    private $estadocivil;

    public function __construct(estadocivil $estadocivil) {
        $this->estadocivil = $estadocivil;
    }

    public function index() {
        $estados = estadocivil::query()
            ->orderBy('ESTADOCIVIL_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_estadocivil') );

        return view('adm.estadocivil.index')
            ->with('estados', $estados)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('adm.estadocivil.create')
            ;
    }

    public function store(estadocivilRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('ESTADOCIVIL');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ESTADOCIVIL'] = $id;
        $this->estadocivil->create($input);

        \Session::flash('message', trans('messages.conf_estadocivil_inc'));
        $url = $request->get('redirect_to', asset('adm/estadocivil'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        $estadocivil = $this->estadocivil->find($id);
        return view ('adm.estadocivil.edit')
            ->with('estadocivil', $estadocivil )
            ;
    }

    public function update($id, estadocivilRequest $request) {
        $this->estadocivil->find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_estadocivil_alt'));
        $url = $request->get('redirect_to', asset('adm/estadocivil'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->estadocivil->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_estadocivil_exc'));
        return redirect()->to(asset('adm/estadocivil'));
    }
}
