<?php

namespace SRP\Http\Controllers\jogos;

use SRP\Http\Controllers\Controller;
use SRP\Models\jogos\Criterios;
use SRP\Http\Requests\jogos\CriteriosRequest;

class CriteriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterios = Criterios::query()
            ->orderBy('CRIT_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_criterio')
        );

        return view('jogos.criterios.index')
            ->with('criterios', $criterios)
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
        //return view('jogos.criterios.create');
        $criterios = Criterios::query()
            ->orderBy('CRIT_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_criterio')
        );

        return view('jogos.criterios.index')
            ->with('criterios', $criterios)
            ->with('titulos', $titulos)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriteriosRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('CRITERIOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CRITERIO'] = $id;
        Criterios::create($input);

        \Session::flash('message', trans('messages.conf_criterio_inc'));
        $url = $request->get('redirect_to', asset('jogos/criterios'));
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
        $criterio = Criterios::where('ID_CRITERIO', $id)->get();
        return view ('jogos.criterios.edit')
            ->with('criterio', $criterio[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriteriosRequest $request, $id)
    {
        Criterios::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_criterio_alt'));
        $url = $request->get('redirect_to', asset('jogos/criterios'));
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
        Criterios::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_criterio_exc'));
        return redirect()->to(asset('jogos/criterios'));
    }
}
