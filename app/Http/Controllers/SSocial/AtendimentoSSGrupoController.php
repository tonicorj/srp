<?php

namespace SRP\Http\Controllers\SSocial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\SSocial\atendimentoSS_gruposRequest;
use SRP\Models\SSocial\atendimentoSS_Grupo;
use SRP\Models\SSocial\origemservsocial;
use SRP\Models\SSocial\AtividadesSS;
use DB;

class AtendimentoSSGrupoController extends Controller
{
    //
    private $atendimento;

    public function __construct(atendimentoSS_Grupo $atendimento) {
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
            ->whereRaw('ID_JOGADOR IS NULL AND NOME IS NULL')
            ->get();

        $titulos = array( '#'
            ,trans('messages.tit_visitadata')
            ,trans('messages.tit_categoria')
            ,trans('messages.tit_motivoatendimento')
            ,trans('messages.tit_origematendimento')
        );

        return view('SSocial.atendimentoSS_grupos.index')
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
        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')
            ->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL')
            ->prepend(trans('messages.tit_selecioneopcao'), '');
        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')
            ->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('SSocial.atendimentoSS_grupos.create')
            ->with('origem', $origem)
            ->with('atividade', $atividade);
    }

    public function store(atendimentoSS_gruposRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ATENDIMENTO_ASSIST_SOCIAL');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ATENDIMENTO_ASSIST_SOCIAL'] = $id;

        $input['VISITA_DATA'] = data_to_sql($input['VISITA_DATA_S']);
        $this->atendimento->create($input);

        \Session::flash('message', trans( 'messages.conf_atividades_inc'));
        $url = $request->get('redirect_to', asset('SSocial.atendimentoSS_grupos'));
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
        $atendimento['VISITA_DATA_S'] = data_display($atendimento['VISITA_DATA']);
        $origem = origemservsocial::orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'asc')->pluck('ORIGEM_SERVSOCIAL_DESCRICAO', 'ID_ORIGEM_SERVSOCIAL');
        $atividade = AtividadesSS::orderBy('ATIV_ASSIST_SOCIAL_DESCR', 'asc')->pluck('ATIV_ASSIST_SOCIAL_DESCR', 'ID_ATIV_ASSIST_SOCIAL');

        return view ('SSocial.atendimentoSS_grupos.edit')
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
    public function update(atendimentoSS_gruposRequest $request, atendimentoSS_Grupo $atendimentoSS_Grupo)
    {
        $request['VISITA_DATA'] = data_to_sql($request['VISITA_DATA_S']);
        $this->atendimento->find($request['ID_ATEND_ASSIST_SOCIAL'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_atividades_alt'));
        $url = $request->get('redirect_to', asset('SSocial.atendimentoSS_grupos'));
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
        return redirect()->to(URL::previous());
    }

}
