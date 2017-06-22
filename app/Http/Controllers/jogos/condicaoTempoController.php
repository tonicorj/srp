<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SRP\Models\jogos\CondicaoTempo;
use SRP\Http\Requests\jogos\condicaoTempoRequest;
//use DB;

class condicaoTempoController extends Controller
{
    private $condicao;

    public function __construct(CondicaoTempo $condicao) {
        $this->condicao = $condicao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condicoes = CondicaoTempo::query()
            ->orderBy('CONDICAO_TEMPO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_condicaotempo') );

        return view('jogos.condicaotempo.index')
            ->with('condicoes', $condicoes)
            ->with('titulos', $titulos)
            ;
        return view('jogos.condicaotempo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jogos.condicaotempo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(condicaoTempoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('CONDICAO_TEMPO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CONDICAO_TEMPO'] = $id;

        $this->condicao->create($input);

        \Session::flash('message', trans( 'messages.conf_condicaotempo_inc'));
        $url = $request->get('redirect_to', asset('jogos.condicaotempo'));
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
        return view ('jogos.condicaotempo.edit')
            ->with('condicao', $condicao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(condicaoTempoRequest $request, $id)
    {
        $this->condicao->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_condicaotempo_alt'));
        $url = $request->get('redirect_to', asset('jogos/condicaotempo'));
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
        \Session::flash('message', trans( 'messages.conf_condicaotempo_exc'));
        return redirect()->to(asset('jogos/condicaotempo'));
    }
}
