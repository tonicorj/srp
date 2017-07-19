<?php

namespace SRP\Http\Controllers\jogos;

use SRP\Http\Controllers\Controller;
use SRP\Models\jogos\MotivoCartao;
use SRP\Http\Requests\jogos\MotivoCartaoRequest;


class MotivoCartaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivos = MotivoCartao::query()
            ->orderBy('MOTIVO_CARTAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_motivocartao')
        );

        return view('jogos.motivocartao.index')
            ->with('motivos', $motivos)
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
        return view('jogos.motivocartao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotivoCartaoRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('MOTIVO_CARTAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_MOTIVO_CARTAO'] = $id;
        MotivoCartao::create($input);

        \Session::flash('message', trans('messages.conf_motivocartao_inc'));
        $url = $request->get('redirect_to', asset('jogos/motivocartao'));
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
        $motivo = MotivoCartao::where('ID_MOTIVO_CARTAO', $id)->get();
        return view ('jogos.motivocartao.edit')
            ->with('motivocartao', $motivo[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotivoCartaoRequest $request, $id)
    {
        MotivoCartao::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_motivocartao_alt'));
        $url = $request->get('redirect_to', asset('jogos/motivocartao'));
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
        MotivoCartao::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_motivocartao_exc'));
        return redirect()->to(asset('jogos/motivocartao'));
    }
}
