<?php

namespace SRP\Http\Controllers\SSocial;

use Illuminate\Http\Request;
use SRP\Http\Controllers\Controller;

//use Illuminate\Support\Facades\URL;

use SRP\Http\Requests\SSocial\historicoEscolarRequest;
use SRP\Models\SSocial\historicoEscolar;
use SRP\Jogadores;
use DB;


class historicoEscolarController extends Controller
{
    private $historico;

    public function __construct(historicoEscolar $historico) {
        $this->historico = $historico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $titulos = array( '#'
            ,trans('messages.tit_nome_jogador')
            ,trans('messages.tit_evento_titulo')
            ,trans('messages.tit_escolanome')
            ,trans('messages.tit_escolaano')
            ,trans('messages.tit_escolaserie')
            ,trans('messages.tit_escolaturma')
        );

        $historicos = DB::table('VS_HISTORICO_ESCOLAR')
            ->get();

        return view('SSocial.historicoEscolar.index')
            ->with('titulos', $titulos)
            ->with('historicos', $historicos)
            ;
    }

    public function _json() {
        $_sql  = "select ";
        $_sql .= " JOG_NOME_COMPLETO ";
        $_sql .= ",ESCOLA_ANO";
        $_sql .= ",ESCOLA_SERIE";
        $_sql .= ",ESCOLA_TURMA";
        $_sql .= ",ESCOLA_NOME";
        $_sql .= ",CATEG_DESCRICAO";
        $_sql .= ",ID_HIST_ESCOLAR ";
        $_sql .= "from VS_HISTORICO_ESCOLAR A ";
        $_sql .= "order by ";
        $_sql .= "  ESCOLA_ANO DESC, JOG_NOME_COMPLETO  ";
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
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

        return view('SSocial.historicoescolar.create')
            ->with('jogadores', $jogadores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $id = BuscaProximoCodigo('HIST_ESCOLAR');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_HIST_ESCOLAR'] = $id;

        $this->historico->create($input);
        //dd($this->atendimentoSS);

        \Session::flash('message', trans( 'messages.conf_historicoescolar_inc'));
        $url = $request->get('redirect_to', asset('SSocial/historicoescolar'));
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
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historico = $this->historico->find($id);

        // monta o campo da data da visita
        $jogadores   = Jogadores::whereIn('id_jogador', function($query)
        {
            $query->select('ID_JOGADOR')
                ->from('elenco')
                ->where("elenco_status", "<>", "'N'");
        })
            ->orderBy('JOG_NOME_COMPLETO', 'asc')
            ->pluck('JOG_NOME_COMPLETO', 'ID_JOGADOR');

        return view ('SSocial.historicoescolar.edit')
            ->with('jogadores', $jogadores)
            ->with('historicoescolar', $historico);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, historicoEscolarRequest $request)
    {
        $this->historico->find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_historicoescolar_alt'));
        $url = $request->get('redirect_to', asset('SSocial/historicoescolar'));
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
        $this->historico->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_historicoescolar_exc'));
        return redirect()->to(asset('SSocial/historicoescolar'));
    }
}
