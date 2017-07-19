<?php

namespace srpM\JogObservacao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use SRP\JogadoresObservacao;
use SRP\Models\ADM\Paises;
use SRP\Models\DFutebol\Parceiros;
use srpM\JogObservacao\Entities\jogobservacao;
use srpM\JogObservacao\Http\Requests\jogobservacaoRequest;

class JogObservacaoController extends Controller
{
    private $jogadores;
    private $foto_padrao = 'fotos/foto.jpg';
    private $foto_diretorio = 'fotos/observacao/';

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $titulos = array( '#'
        ,trans('messages.tit_apelido')
        ,trans('messages.tit_nome_completo')
        ,trans('messages.tit_dt_nasc')
        ,trans('messages.tit_idade')
        ,trans('messages.tit_posicao')
        );

        $jogadores = jogobservacao::query()
            ->orderBy('JOG_NOME_APELIDO', 'ASC')
            ->get();

        return view('jogobservacao::index')
            ->with('jogadores', $jogadores)
            ->with('titulos', $titulos)
            ;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $paises        = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        $parceiros     = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');
        $foto           = $this->foto_padrao;

        return view('jogobservacao::create')
            ->with('paises', $paises)
            ->with('parceiros', $parceiros)
            ->with('foto', $foto)
            ;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(jogobservacaoRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('JOGADORES_EM_OBSERVACAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_JOGADOR'] = $id;
        jogobservacao::create($input);

        \Session::flash('message', trans('messages.conf_jogobservacao_inc'));
        $url = $request->get('redirect_to', asset('jogobservacao'));
        return redirect()->to($url);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('jogobservacao::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $jogador = JogadoresObservacao::find($id);

        $paises        = Paises::orderBy('PAIS_NOME', 'asc')->pluck('PAIS_NOME', 'ID_PAIS');
        $parceiros     = Parceiros::orderBy('PARCEIRO_NOME', 'asc')->pluck('PARCEIRO_NOME', 'ID_PARCEIRO');
        $foto           = $this->foto_padrao;

        return view('jogobservacao::edit')
            ->with('jogador', $jogador)
            ->with('paises', $paises)
            ->with('parceiros', $parceiros)
            ->with('foto', $foto)
            ;
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($id, jogobservacaoRequest $request)
    {
        jogobservacao::find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_jogobservacao_alt'));
        $url = $request->get('redirect_to', asset('jogobservacao'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        jogobservacao::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_jogobservacao_exc'));
        return redirect()->to(asset('jogobservacao'));
    }
}
