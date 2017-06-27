<?php

namespace SRP\Http\Controllers\DFutebol;

use SRP\Models\DFutebol\Selecoes;
use Illuminate\Routing\Controller;
use SRP\Http\Requests\DFutebol\selecoesRequest;

class selecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selecoes = Selecoes::query()
            ->orderBy('DESCRICAO_SELECAO', 'ASC')
            ->get()
        ;

        $titulos = array( '#'
        , trans('messages.tit_selecao')
        );

        return view('DFutebol.selecoes.index')
            ->with('selecoes', $selecoes)
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
        return view('DFutebol.selecoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(selecoesRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('SELECAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_SELECAO'] = $id;
        Selecoes::create($input);

        \Session::flash('message', trans('messages.conf_selecoes_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/selecoes'));
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
        $selecao = Selecoes::find($id);
        return view ('DFutebol.selecoes.edit')
            ->with('selecao', $selecao)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(selecoesRequest $request, $id)
    {
        Selecoes::find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_selecoes_alt'));
        $url = $request->get('redirect_to', asset('DFutebol/selecoes'));
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
        Selecoes::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_selecoes_exc'));
        return redirect()->to(asset('DFutebol/selecoes'));
    }
}
