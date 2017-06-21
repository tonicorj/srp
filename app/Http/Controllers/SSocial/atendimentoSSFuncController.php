<?php

namespace SRP\Http\Controllers\SSocial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use SRP\Http\Controllers\Controller;

use SRP\Http\Requests\SSocial\AtendimentoSS_funcRequest;

use SRP\Models\SSocial\atendimentoSS_Func;
use SRP\Models\SSocial\origemservsocial;

use SRP\Models\SSocial\AtividadesSS;

use DB;

class atendimentoSSFuncController extends Controller
{

    private $atendimento;

    public function __construct(atendimentoSS_Func $atendimento) {
        $this->atendimento = $atendimento;
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
            ->whereNotNull ('NOME')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_visitadata')
            ,trans('messages.tit_nome_funcionario')
            ,trans('messages.tit_motivoatendimento')
            ,trans('messages.tit_origematendimento')
        );

        return view('SSocial.atendimentoSS_func.index')
            ->with('atendimentos', $atendimentos)
            ->with('titulos', $titulos)
            ;
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select ";
        $_sql .= " VISITA_DATA_S ";
        $_sql .= ",NOME ";
        $_sql .= ",ORIGEM_SERVSOCIAL_DESCRICAO ";
        $_sql .= ",ATIV_ASSIST_SOCIAL_DESCR ";
        $_sql .= ",ID_ATEND_ASSIST_SOCIAL ";
        $_sql .= "from VS_ATENDIMENTO_SS A ";
        $_sql .= " where not nome is null ";
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
        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')
            ->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')
            ->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('SSocial.atendimentoSS_func.create')
            ->with('origem', $origem)
            ->with('atividade', $atividade);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(atendimentoSS_FuncRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_ASSIST_SOCIAL');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATEND_ASSIST_SOCIAL'] = $id;

        // pega o próximo codigo
        $input['VISITA_DATA'] = data_to_sql($input['VISITA_DATA_S']);

        //return dd($input);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('SSocial.atendimentoSS_func'));
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
        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')
            ->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL');

        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')
            ->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL');

        return view ('SSocial.atendimentoSS_func.edit')
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
    public function update(atendimentoSS_funcRequest $request, $id)
    {
        $request['VISITA_DATA'] = data_to_sql($request['VISITA_DATA_S']);
        $this->atendimento->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('SSocial.atendimentoSS_func'));
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
        return redirect()->to(URL::previous());
        return;
    }
}
