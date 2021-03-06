<?php

namespace SRP\Http\Controllers\psicologia;

use DB;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\psicologia\atendimentopsicRequest;

use SRP\Models\psicologia\origem;
use SRP\Models\psicologia\atividades;
use SRP\Models\psicologia\atendimentopsic;
use SRP\Models\DFutebol\Jogadores;

class atendimentopsicController extends Controller
{
    private $atendimento;

    public function __construct(atendimentopsic $atendimento) {
        $this->atendimento = $atendimento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = DB::table('VS_PSICOLOGIA_ATENDIMENTO')
            ->orderBy('ATENDIMENTO_DATA', 'DESC')
            ->where('ID_JOGADOR', '>', 0)
            ->whereNotNull('ID_JOGADOR')
            ->get();

        $titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_jogador')
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );

        return view('psicologia.atendimentopsic.index')
            ->with('atendimentos', $atendimentos)
            ->with('titulos', $titulos)
            ;
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select ";
        $_sql .= " VISITA_DATA_S ";
        $_sql .= ",JOG_NOME_COMPLETO ";
        $_sql .= ",CATEG_DESCRICAO ";
        $_sql .= ",ORIGEM_SERVSOCIAL_DESCRICAO ";
        $_sql .= ",ATIV_ASSIST_SOCIAL_DESCR ";
        $_sql .= ",ID_ATEND_ASSIST_SOCIAL ";
        $_sql .= "from VS_ATENDIMENTO_SS A ";
        $_sql .= "order by ";
        $_sql .= "  A.visita_data desc ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
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

        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA')->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('psicologia.atendimentopsic.create')
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
    public function store(atendimentopsicRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_PSICOLOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATENDIMENTO_PSICOLOGIA'] = $id;

        $input['ATENDIMENTO_DATA'] = data_to_sql($input['ATENDIMENTO_DATA_S']);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('psicologia/atendimentopsic'));
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

        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA');
        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA');


        return view ('psicologia.atendimentopsic.edit')
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
    public function update(atendimentopsicRequest $request, atendimentopsic $atendimento)
    {
        $request['ATENDIMENTO_DATA'] = data_to_sql($request['ATENDIMENTO_DATA_S']);
        $this->atendimento->find($request['ID_ATENDIMENTO_PSICOLOGIA'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('psicologia/atendimentopsic'));
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
        return redirect()->to(asset('psicologia/atendimentopsic'));
        //return Redirect::route('atendimentopsic.index');
    }
}
