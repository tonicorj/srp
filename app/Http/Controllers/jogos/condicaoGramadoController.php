<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SRP\Models\jogos\CondicaoGramado;
use SRP\Http\Requests\jogos\CondicaoGramadoRequest;


class condicaoGramadoController extends Controller
{
    private $condicao;

    public function __construct(CondicaoGramado $condicao) {
        $this->condicao = $condicao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condicoes = CondicaoGramado::query()
            ->orderBy('CONDICAO_GRAMADO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_condicaogramado') );

        return view('jogos.condicaoGramado.index')
            ->with('condicoes', $condicoes)
            ->with('titulos', $titulos)
            ;

        return view('condicaogramado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jogos.condicaogramado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CondicaoGramadoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('CONDICAO_GRAMADO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CONDICAO_GRAMADO'] = $id;

        $this->condicao->create($input);

        \Session::flash('message', trans( 'messages.conf_condicaogramado_inc'));
        $url = $request->get('redirect_to', asset('jogos.condicaogramado'));
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
        $condicao = $this->condicao->find($id);
        return view ('jogos.condicaogramado.edit')
            ->with('condicao', $condicao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CondicaoGramadoRequest $request, $id)
    {
        $this->condicao->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_condicaogramado_alt'));
        $url = $request->get('redirect_to', asset('jogos/condicaogramado'));
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
        $this->condicao->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_condicaogramado_exc'));
        return redirect()->to(asset('jogos/condicaogramado'));
    }
}
