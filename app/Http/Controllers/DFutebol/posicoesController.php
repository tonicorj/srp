<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Routing\Controller;
use SRP\Models\DFutebol\Posicoes;
use SRP\Http\Requests\DFutebol\PosicoesRequest;


class posicoesController extends Controller
{
    public function index() {
        $posicoes = Posicoes::query()
            ->orderBy('POSICAO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( trans('messages.tit_posicao_sigla')
            , trans('messages.tit_posicao')
            , trans('messages.tit_posicao_ordem')
            , trans('messages.tit_posicao_campo')
        );

        return view('DFutebol.posicoes.index')
            ->with('posicoes', $posicoes)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('DFutebol.posicoes.create');
    }

    public function store(posicoesRequest $request) {
        $input = $request->all();
        Posicoes::create($input);

        \Session::flash('message', trans('messages.conf_posicoes_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/posicoes'));
        return redirect()->to($url);
    }

    public  function edit($id) {
        //$posicoes = Posicoes::find($id);
        $p = Posicoes::where('POSICAO', $id)->get();
        $posicoes = $p[0];
        //return dd($posicoes);

        return view ('DFutebol.posicoes.edit')
            ->with('posicoes', $posicoes)
            ;
    }

    public function update($id, posicoesRequest $request) {
        Posicoes::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_posicoes_alt'));
        $url = $request->get('redirect_to', asset('DFutebol/posicoes'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        Posicoes::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_posicoes_exc'));
        return redirect()->to(asset('DFutebol/posicoes'));
    }
}
