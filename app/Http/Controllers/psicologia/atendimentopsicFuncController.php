<?php

namespace SRP\Http\Controllers\psicologia;

use Illuminate\Support\Facades\Redirect;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\psicologia\atendimentopsic_FuncRequest;
use SRP\Models\psicologia\atendimentopsic_Func;
use SRP\Models\psicologia\origem;
use SRP\Models\psicologia\atividades;

use DB;

class atendimentopsicFuncController extends Controller
{

    private $atendimento;

    public function __construct(atendimentopsic_Func $atendimento) {
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
            ->whereNotNull ('NOME')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_visitadata')
            ,trans('messages.tit_nome_funcionario')
            ,trans('messages.tit_motivoatendimento')
            ,trans('messages.tit_origematendimento')
        );

        return view('psicologia.atendimentopsic_func.index')
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
        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')
            ->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')
            ->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('psicologia.atendimentopsic_func.create')
            ->with('origem', $origem)
            ->with('atividade', $atividade);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(atendimentopsic_FuncRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_PSICOLOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATENDIMENTO_PSICOLOGIA'] = $id;

        // pega o próximo codigo
        $input['ATENDIMENTO_DATA'] = data_to_sql($input['ATENDIMENTO_DATA_S']);

        //return dd($input);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('psicologia.atendimentopsic_func'));
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
        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')
            ->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA');

        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')
            ->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA');

        return view ('psicologia.atendimentopsic_func.edit')
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
    public function update(atendimentopsic_funcRequest $request, $id)
    {
        $request['ATENDIMENTO_DATA'] = data_to_sql($request['ATENDIMENTO_DATA_S']);
        $this->atendimento->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('psicologia.atendimentopsic_func'));
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
        return Redirect::route('atendimentopsic_func.index');
    }
}
