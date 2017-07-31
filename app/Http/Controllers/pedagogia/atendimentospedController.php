<?php

namespace SRP\Http\Controllers\pedagogia;


use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\pedagogia\atendimentospedRequest;

use SRP\Models\pedagogia\atividadesPed;
use SRP\Models\pedagogia\atendimentosped;
use SRP\Models\pedagogia\origemPed;
use SRP\Models\DFutebol\Jogadores;

use DB;

class atendimentospedController extends Controller
{
    private $atendimento;

    public function __construct(atendimentosped $atendimento) {
        $this->atendimento = $atendimento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = DB::table('VS_PEDAGOGIA_ATENDIMENTO')
            ->orderBy('VISITA_DATA', 'DESC')
            ->where('ID_JOGADOR', '>', 0)
            ->get();

        $titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_jogador')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );

        return view('pedagogia.atendimentosped.index')
            ->with('atendimentos', $atendimentos)
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
        $jogadores   = Jogadores::whereIn('id_jogador', function($query)
        {
            $query->select('ID_JOGADOR')
                ->from('elenco')
                ->where("elenco_status", "<>", "'N'");
        })
            ->orderBy('JOG_NOME_COMPLETO', 'asc')
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $origem = origemPed::orderBy('ORIGEM_PEDAGOGIA_DESCRICAO', 'asc')->pluck('ORIGEM_PEDAGOGIA_DESCRICAO', 'ID_ORIGEM_PEDAGOGIA')->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = atividadesPed::orderBy('ATIV_PEDAGOGICA_DESCR', 'asc')->pluck('ATIV_PEDAGOGICA_DESCR', 'ID_ATIV_PEDAGOGICA')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('pedagogia.atendimentosped.create')
            ->with('jogadores', $jogadores)
            ->with('origem', $origem)
            ->with('atividade', $atividade);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(atendimentospedRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_PEDAGOGIA');
        //return dd($id);
        if ($id != null) {
            $input['ID_ATENDIMENTO_PEDAGOGIA'] = $id;
        }
        $input['VISITA_DATA'] = data_to_sql($input['VISITA_DATA_S']);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('pedagogia/atendimentosped'));
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
        $atendimento = $this->atendimento->find($id);

        // monta o campo da data da visita
        $atendimento['VISITA_DATA_S'] = data_display($atendimento['VISITA_DATA']);
        $jogadores   = Jogadores::whereIn('id_jogador', function($query)
                        {
                        $query->select('ID_JOGADOR')
                            ->from('elenco')
                            ->where("elenco_status", "<>", "'N'");
                        })
                        ->orderBy('JOG_NOME_COMPLETO', 'asc')
                        ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

        $origem = origemPed::orderBy('ORIGEM_PEDAGOGIA_DESCRICAO', 'asc')->pluck('ORIGEM_PEDAGOGIA_DESCRICAO', 'ID_ORIGEM_PEDAGOGIA')->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = atividadesPed::orderBy('ATIV_PEDAGOGICA_DESCR', 'asc')->pluck('ATIV_PEDAGOGICA_DESCR', 'ID_ATIV_PEDAGOGICA')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view ('pedagogia.atendimentosped.edit')
            ->with('jogadores', $jogadores)
            ->with('origem', $origem)
            ->with('atividade', $atividade)
            ->with('atendimento', $atendimento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(atendimentospedRequest $request, $id)
    {
        $request['VISITA_DATA'] = data_to_sql($request['VISITA_DATA_S']);
        $this->atendimento->find($request['ID_ATENDIMENTO_PEDAGOGIA']);
        $this->atendimento->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('pedagogia/atendimentosped'));
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
        $this->atendimento->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atividades_exc'));
        return redirect()->to(asset('pedagogia/atendimentosped'));
    }
}
