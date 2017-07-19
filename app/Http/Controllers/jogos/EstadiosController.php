<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\jogos\EstadiosRequest;
use SRP\Models\ADM\Cidades;
use SRP\Models\ADM\Paises;
use SRP\Models\jogos\Estadios;

class EstadiosController extends Controller
{
    public function index()
    {
        $estadios = Estadios::query()
            ->orderBy('ESTADIO_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_estadio')
        , trans('messages.tit_uf')
        , trans('messages.tit_cidade')
        , trans('messages.tit_pais')
        );

        return view('jogos.estadios.index')
            ->with('estadios', $estadios)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        $paises  = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS')->prepend(trans('messages.tit_selecioneopcao'), '');
        $cidades = Cidades::orderBy('CIDADE_NOME', 'asc')->pluck('CIDADE_NOME', 'ID_CIDADE')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('jogos.estadios.create')
            ->with('paises', $paises)
            ->with('cidades', $cidades)
            ;
    }

    public function store(EstadiosRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('ESTADIOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ESTADIO'] = $id;
        Estadios::create($input);

        \Session::flash('message', trans('messages.conf_estadio_inc'));
        $url = $request->get('redirect_to', asset('jogos/estadios'));
        return redirect()->to($url);
    }

    public function edit($id)
    {
        $paises  = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS')->prepend(trans('messages.tit_selecioneopcao'), '');
        $cidades = Cidades::orderBy('CIDADE_NOME', 'asc')->pluck('CIDADE_NOME', 'ID_CIDADE')->prepend(trans('messages.tit_selecioneopcao'), '');
        $estadio = Estadios::where('ID_ESTADIO', $id)->get();

        return view ('jogos.estadios.edit')
            ->with('estadio', $estadio[0])
            ->with('paises', $paises)
            ->with('cidades', $cidades)
            ;
    }

    public function update(EstadiosRequest $request, $id)
    {
        Estadios::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_estadio_alt'));
        $url = $request->get('redirect_to', asset('jogos/estadios'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        Estadios::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_estadio_exc'));
        return redirect()->to(asset('jogos/estadios'));
    }
}
