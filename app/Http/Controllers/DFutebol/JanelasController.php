<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Routing\Controller;
use SRP\Models\DFutebol\Janelas;
use SRP\Http\Requests\DFutebol\janelasRequest;

class JanelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $janelas = Janelas::query()
            ->orderBy('JANELA_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_janela')
            , trans('messages.tit_janela_inicio')
            , trans('messages.tit_janela_final')
        );

        return view('DFutebol.janelas.index')
            ->with('janelas', $janelas)
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
        return view('DFutebol.janelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(janelasRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('JANELAS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_JANELA'] = $id;

        $input['JANELA_INICIO'] = data_to_sql($input['JANELA_INICIO_S']);
        $input['JANELA_FINAL']  = data_to_sql($input['JANELA_FINAL_S']);

        Janelas::create($input);

        \Session::flash('message', trans('messages.conf_janela_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/janelas'));
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
        $janela = Janelas::find($id);

        // acerta as datas
        $janela['JANELA_INICIO_S'] = data_display($janela['JANELA_INICIO']);
        $janela['JANELA_FINAL_S']  = data_display($janela['JANELA_FINAL']);

        return view ('DFutebol.janelas.edit')
            ->with('janela', $janela);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(janelasRequest $request, $id)
    {
        $request['JANELA_INICIO'] = data_to_sql($request['JANELA_INICIO_S']);
        $request['JANELA_FINAL']  = data_to_sql($request['JANELA_FINAL_S']);

        Janelas::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_janela_alt'));
        $url = $request->get('redirect_to', asset('DFutebol/janelas'));
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
        Janelas::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_janela_exc'));
        return redirect()->to(asset('DFutebol/janelas'));
    }
}
