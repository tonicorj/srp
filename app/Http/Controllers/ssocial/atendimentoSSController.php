<?php

namespace SRP\Http\Controllers\ssocial;


use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\SSocial\atendimentoSSRequest;

use SRP\Models\ssocial\AtividadesSS;
use SRP\Models\ssocial\AtendimentoSS;
use SRP\Models\ssocial\origemservsocial;
use SRP\Models\DFutebol\Jogadores;

use DB;

class atendimentoSSController extends Controller
{
    private $atendimentoSS;

    public function __construct(atendimentoSS $atendimentoSS) {
        $this->atendimentoSS = $atendimentoSS;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = DB::table('VS_SSOCIAL_ATENDIMENTO')
            ->orderBy('VISITA_DATA', 'DESC')
            ->where('ID_JOGADOR', '>', 0)
            ->get();

        $titulos = array( '#'
        ,trans('messages.tit_visitadata')
        ,trans('messages.tit_jogador')
        ,trans('messages.tit_categoria')
        ,trans('messages.tit_motivoatendimento')
        ,trans('messages.tit_origematendimento')
        );

        return view('ssocial.atendimentoSS.index')
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

        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL')->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('ssocial.atendimentoSS.create')
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
    public function store(atendimentoSSRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_ASSIST_SOCIAL');
        if ($id != null) {
            $input['ID_ATEND_ASSIST_SOCIAL'] = $id;
        }
        $input['VISITA_DATA'] = data_to_sql($input['VISITA_DATA_S']);
        $this->atendimentoSS->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('ssocial/atendimentoSS'));
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
        $atendimentoSS = $this->atendimentoSS->find($id);

        // monta o campo da data da visita
        $atendimentoSS['VISITA_DATA_S'] = data_display($atendimentoSS['VISITA_DATA']);
        $jogadores   = Jogadores::whereIn('id_jogador', function($query)
                        {
                        $query->select('ID_JOGADOR')
                            ->from('elenco')
                            ->where("elenco_status", "<>", "'N'");
                        })
                        ->orderBy('JOG_NOME_COMPLETO', 'asc')
                        ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL');
        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL');

        return view ('ssocial.atendimentoSS.edit')
            ->with('jogadores', $jogadores)
            ->with('origem', $origem)
            ->with('atividade', $atividade)
            ->with('atendimentoSS', $atendimentoSS);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(atendimentoSSRequest $request, $id)
    {
        $request['VISITA_DATA'] = data_to_sql($request['VISITA_DATA_S']);
        //$request['VISITA_DATA'] = Carbon::createFromFormat('d/m/Y', $request['VISITA_DATA_S']);
        //return dd($request['VISITA_DATA']);

        $this->atendimentoSS->find($request['ID_ATEND_ASSIST_SOCIAL'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('ssocial/atendimentoSS'));
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
        $this->atendimentoSS->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atividades_exc'));
        return redirect()->to(asset('ssocial/atendimentoSS'));
    }
}
