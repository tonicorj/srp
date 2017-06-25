<?php

namespace SRP\Http\Controllers\ADM;

use DB;
use SRP\Models\ADM\Paises;
use SRP\Models\ADM\Cidades;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\ADM\CidadesRequest;

class CidadesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = DB::table('VS_CIDADES')
            ->orderBy('CIDADE_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_cidade')
            , trans('messages.tit_uf')
            , trans('messages.tit_pais')
        );

        return view('adm.cidades.index')
            ->with('cidades', $cidades)
            ->with('titulos', $titulos)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises       = Paises::orderBy('PAIS_NOME', 'asc')
            ->pluck('PAIS_NOME', 'ID_PAIS')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('adm.cidades.create')
            ->with('paises', $paises)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadesRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('CIDADES');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CIDADE'] = $id;
       Cidades::create($input);

        \Session::flash('message', trans('messages.conf_cidade_inc'));
        $url = $request->get('redirect_to', asset('adm/cidades'));
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidades::find($id);
        $paises = Paises::orderBy('PAIS_NOME', 'ASC')
            ->pluck('PAIS_NOME', 'ID_PAIS')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('adm.cidades.edit')
            ->with('cidade', $cidade )
            ->with('paises', $paises )
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadesRequest $request, $id)
    {
        Cidades::find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_cidade_alt'));
        $url = $request->get('redirect_to', asset('adm.cidades'));
        return redirect()->to($url);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cidades::find($id)->delete();
        \Session::flash('message', trans('messages.conf_cidade_exc'));
        return redirect()->to(asset('adm/cidades'));
    }
}
