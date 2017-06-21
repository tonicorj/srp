<?php

namespace SRP\Http\Controllers\psicologia;

use Illuminate\Support\Facades\Redirect;
use SRP\Http\Controllers\Controller;

use SRP\Http\Requests\psicologia\atendimentopsic_gruposRequest;
use SRP\Models\psicologia\atendimentopsic_grupo;
use SRP\Models\psicologia\origem;
use SRP\Models\psicologia\atividades;
use DB;

class AtendimentopsicGrupoController extends Controller
{
    //
    private $atendimento;

    public function __construct(atendimentopsic_grupo $atendimento) {
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
            ->whereRaw('NOME IS NULL AND ID_JOGADOR IS NULL')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_visitadata')
            ,trans('messages.tit_motivoatendimento')
            ,trans('messages.tit_origematendimento')
        );

        return view('psicologia.atendimentopsic_grupo.index')
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
        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')
            ->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')
            ->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('psicologia.atendimentopsic_grupo.create')
            ->with('origem', $origem)
            ->with('atividade', $atividade);
    }

    public function store(atendimentopsic_gruposRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_PSICOLOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATENDIMENTO_PSICOLOGIA'] = $id;

        $input['ATENDIMENTO_DATA'] = data_to_sql($input['ATENDIMENTO_DATA_S']);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('psicologia.atendimentopsic_grupo'));
        return redirect()->to($url);
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
        $origem = origem::orderBy('ORIGEM_PSICOLOGIA_DESCRICAO', 'asc')->pluck('ORIGEM_PSICOLOGIA_DESCRICAO', 'ID_ORIGEM_PSICOLOGIA');
        $atividade = atividades::orderBy('ATIV_PSICOLOGIA_DESCR', 'asc')->pluck('ATIV_PSICOLOGIA_DESCR', 'ID_ATIV_PSICOLOGIA');

        return view ('psicologia.atendimentopsic_grupo.edit')
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
    public function update(atendimentopsic_gruposRequest $request, atendimentopsic_Grupo $atendimento)
    {
        $request['ATIVIDADE_DATA'] = data_to_sql($request['ATIVIDADE_DATA_S']);
        $this->atendimento->find($request['ID_ATENDIMENTO_PSICOLOGIA'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('psicologia.atendimentopsic_grupo'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $this->atendimento->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_atividades_exc'));
        return Redirect::route('atendimentopsic_grupo.index');
    }

}
