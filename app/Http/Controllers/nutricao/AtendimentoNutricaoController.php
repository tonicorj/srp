<?php

namespace SRP\Http\Controllers\nutricao;

use DB;
use SRP\Http\Controllers\Controller;

use SRP\Models\DFutebol\Jogadores;
use SRP\Models\nutricao\origemNutricao;
use SRP\Models\nutricao\atividadesNutricao;
use SRP\Models\nutricao\atendimentoNutricao;
use SRP\Http\Requests\nutricao\atendimentoNutricaoRequest;

class AtendimentoNutricaoController extends Controller
{
    private $atendimento;

    public function __construct(atendimentoNutricao $atendimento) {
        $this->atendimento = $atendimento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = DB::table('VS_NUTRICAO_ATENDIMENTO')
            ->orderBy('ATENDIMENTO_DATA', 'DESC')
            ->whereNotNull('ID_JOGADOR')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_visitadata')
            ,trans('messages.tit_jogador')
            ,trans('messages.tit_motivoatendimento')
            ,trans('messages.tit_origematendimento')
        );

        return view('nutricao.atendimentoNutricao.index')
            ->with('atendimentos', $atendimentos )
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

        $origem = origemNutricao::orderBy('ORIGEM_NUTRICAO_DESCRICAO', 'asc')->pluck('ORIGEM_NUTRICAO_DESCRICAO', 'ID_ORIGEM_NUTRICAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = atividadesNutricao::orderBy('ATIV_NUTRICAO_DESCR', 'asc')->pluck('ATIV_NUTRICAO_DESCR', 'ID_ATIV_NUTRICAO')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('nutricao.atendimentoNutricao.create')
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
    public function store(atendimentoNutricaoRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_NUTRICAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATENDIMENTO_NUTRICAO'] = $id;

        $input['ATENDIMENTO_DATA'] = data_to_sql($input['ATENDIMENTO_DATA_S']);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('nutricao/atendimentoNutricao'));
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
        $atendimento['ATENDIMENTO_DATA_S'] = data_display($atendimento['ATENDIMENTO_DATA']);

        $jogadores   = Jogadores::whereIn('id_jogador', function($query)
        {
            $query->select('ID_JOGADOR')
                ->from('elenco')
                ->where("elenco_status", "<>", "'N'");
        })
            ->orderBy('JOG_NOME_COMPLETO', 'asc')
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

        $origem = origemNutricao::orderBy('ORIGEM_NUTRICAO_DESCRICAO', 'asc')->pluck('ORIGEM_NUTRICAO_DESCRICAO', 'ID_ORIGEM_NUTRICAO');
        $atividade = atividadesNutricao::orderBy('ATIV_NUTRICAO_DESCR', 'asc')->pluck('ATIV_NUTRICAO_DESCR', 'ID_ATIV_NUTRICAO');


        return view ('nutricao.atendimentoNutricao.edit')
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
    public function update(atendimentoNutricaoRequest $request, $id)
    {
        $request['ATENDIMENTO_DATA'] = data_to_sql($request['ATENDIMENTO_DATA_S']);
        $this->atendimento->find($request['ID_ATENDIMENTO_NUTRICAO'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('nutricao/atendimentoNutricao'));
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
        //return redirect()->to(URL::previous());
        return redirect()->to(asset('nutricao/atendimentoNutricao'));
    }

}
