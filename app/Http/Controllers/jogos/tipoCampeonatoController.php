<?php

namespace SRP\Http\Controllers\jogos;

use SRP\Http\Requests\jogos\TipoCampeonatoRequest;
use SRP\Models\jogos\TipoCampeonato;
use SRP\Http\Controllers\Controller;

class tipoCampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocampeonato = TipoCampeonato::query()
            ->orderBy('TCAMP_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_tipocampeonato')
        );

        return view('jogos.tipocampeonato.index')
            ->with('tipocampeonato', $tipocampeonato)
            ->with('titulos', $titulos)
            ;

        return view('jogos.tipocampeonato.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jogos.tipocampeonato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoCampeonatoRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('TIPOCAMPEONATO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_TIPOCAMP'] = $id;
        TipoCampeonato::create($input);

        \Session::flash('message', trans('messages.conf_tipocamp_inc'));
        $url = $request->get('redirect_to', asset('jogos/tipocampeonato'));
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
        $tipocampeonato = TipoCampeonato::where('ID_TIPOCAMP', $id)->get();
        return view ('jogos.tipocampeonato.edit')
            ->with('tipocampeonato', $tipocampeonato[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoCampeonatoRequest $request, $id)
    {
        TipoCampeonato::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_tipocamp_alt'));
        $url = $request->get('redirect_to', asset('jogos/tipocampeonato'));
        return redirect()->to($url);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoCampeonato::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_tipocamp_exc'));
        return redirect()->to(asset('jogos/tipocampeonato'));
    }
}
