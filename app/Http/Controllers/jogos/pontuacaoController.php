<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SRP\Models\jogos\Pontuacao;

class pontuacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontuacoes = Pontuacao::query()
            ->orderBy('PONT_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_pontuacao')
        , trans('messages.tit_pontuacao_vitoria')
        , trans('messages.tit_pontuacao_empate')
        , trans('messages.tit_pontuacao_empate0')
        , trans('messages.tit_pontuacao_vitoria_penalti')
        , trans('messages.tit_pontuacao_diferenca_gols')
        , trans('messages.tit_pontuacao_vitoria_gols')
        );

        return view('jogos.pontuacao.index')
            ->with('pontuacao', $pontuacoes)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
