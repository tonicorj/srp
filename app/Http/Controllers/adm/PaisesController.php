<?php

namespace SRP\Http\Controllers\adm;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\ADM\PaisesRequest;
use SRP\Models\ADM\Paises;

class PaisesController extends Controller
{
    public function index() {

        $paises = Paises::query()
            ->orderBy('PAIS_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_pais_nome')
            , trans('messages.tit_pais_sigla')
        );

        return view('adm.paises.index')
            ->with('paises', $paises)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('adm.paises.create');
    }

    public function store(PaisesRequest $request) {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('PAISES');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_PAIS'] = $id;
        Paises::create($input);

        \Session::flash('message', trans('messages.conf_paises_inc'));
        $url = $request->get('redirect_to', asset('adm/paises'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public  function edit($id) {
        $pais = Paises::where('ID_PAIS', $id)->get();

        return view ('adm.paises.edit')
            ->with('pais', $pais[0]);
    }

    public function update(PaisesRequest $request, $id) {
        Paises::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_paises_alt'));
        $url = $request->get('redirect_to', asset('adm/paises'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        Paises::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_paises_exc'));
        return redirect()->to(asset('adm/paises'));
    }
}
