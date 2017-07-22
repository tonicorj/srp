<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DM\DepMedicoRequest;
use SRP\Models\DM\DepMedico;

use SRP\Models\DM\Medicos;
use SRP\Models\DM\Parte_Corpo;
use SRP\Models\DM\Tipo_Lesao;
use SRP\Models\DM\Origem_Lesao;

use SRP\Jogadores;

class DepMedicoController extends Controller
{
    public function __construct(DepMedico $depMedico)
    {
        $this->depMedico = $depMedico;
    }

    public function index( Request $request)
    {
        $titulos = array( '#'
            , trans('messages.tit_depmedico_inicio')
            , trans('messages.tit_depmedico_fim')
            , trans('messages.tit_jogador')
            , trans('messages.tit_depmedico_afastamento')
            , trans('messages.tit_tipo_lesao')
            , trans('messages.tit_origem_lesao')
            , trans('messages.tit_parte_corpo')
            , trans('messages.tit_medico')
            , trans('messages.tit_depmedico_tempo')
        );

        $depmedicos = DepMedico::consulta();
        //return dd($depmedicos[0]->id_departamento_medico);
        return view('dm.depmedico.index')
            ->with('depmedicos', $depmedicos)
            ->with('titulos', $titulos)
            ;
    }

    public function create()
    {
        $jogadores    = Jogadores::jogadoresAtivos(0)->prepend(trans('messages.tit_selecioneopcao'), '');;
        $origem_lesao = Origem_Lesao::orderBy('ORIGEM_LESAO_DESCRICAO', 'asc')->pluck('ORIGEM_LESAO_DESCRICAO', 'ID_ORIGEM_LESAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $tipo_lesao   = Tipo_Lesao::orderBy('TIPO_LESAO_DESCRICAO', 'asc')->pluck('TIPO_LESAO_DESCRICAO', 'ID_TIPO_LESAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $parte_corpo  = Parte_Corpo::orderBy('PARTE_CORPO_DESCRICAO', 'asc')->pluck('PARTE_CORPO_DESCRICAO', 'ID_PARTE_CORPO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $medicos      = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO')->prepend(trans('messages.tit_selecioneopcao'), '');;

        return view('dm.depmedico.create')
            ->with('jogadores', $jogadores)
            ->with('origem_lesao', $origem_lesao)
            ->with('tipo_lesao', $tipo_lesao)
            ->with('parte_corpo', $parte_corpo)
            ->with('medicos', $medicos)
            ;
    }

    public function store(DepMedicoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTO_MEDICO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_DEPARTAMENTO_MEDICO'] = $id;

        // define as datas para exibição
        $input['DM_DATA_INICIO'] = data_to_sql($input['DM_DATA_INICIO_S']);
        $input['DM_DATA_FIM']    = data_to_sql($input['DM_DATA_FIM_S']);

        if ($input['FLAG_AFASTAMENTO'] == ''){
            $input['FLAG_AFASTAMENTO'] = 'N';
        }

        DepMedico::create($input);

        \Session::flash('message', trans('messages.conf_depmedico_inc'));
        $url = $request->get('redirect_to', asset('dm/depfutebol'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $depMedico = DepMedico::find($id);

        // define as datas para exibição
        $depMedico['DM_DATA_INICIO_S'] = data_display($depMedico['DM_DATA_INICIO']);
        $depMedico['DM_DATA_FIM_S']    = data_display($depMedico['DM_DATA_FIM']);

        $jogadores    = Jogadores::jogadoresAtivos($depMedico['ID_JOGADOR'])->prepend(trans('messages.tit_selecioneopcao'), '');;
        $origem_lesao = Origem_Lesao::orderBy('ORIGEM_LESAO_DESCRICAO', 'asc')->pluck('ORIGEM_LESAO_DESCRICAO', 'ID_ORIGEM_LESAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $tipo_lesao   = Tipo_Lesao::orderBy('TIPO_LESAO_DESCRICAO', 'asc')->pluck('TIPO_LESAO_DESCRICAO', 'ID_TIPO_LESAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $parte_corpo  = Parte_Corpo::orderBy('PARTE_CORPO_DESCRICAO', 'asc')->pluck('PARTE_CORPO_DESCRICAO', 'ID_PARTE_CORPO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $medicos      = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO')->prepend(trans('messages.tit_selecioneopcao'), '');

        //return dd($depMedico);

        return view('dm.depmedico.edit')
            ->with('depmedico', $depMedico)
            ->with('jogadores', $jogadores)
            ->with('origem_lesao', $origem_lesao)
            ->with('tipo_lesao', $tipo_lesao)
            ->with('parte_corpo', $parte_corpo)
            ->with('medicos', $medicos)
            ;
    }

    public function update(DepMedicoRequest $request, $id)
    {
        $request['DM_DATA_INICIO'] = data_to_sql($request['DM_DATA_INICIO_S']);
        $request['DM_DATA_FIM']    = data_to_sql($request['DM_DATA_FIM_S']);
        $this->depMedico->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_depmedico_alt'));
        $url = $request->get('redirect_to', asset('dm/depmedico'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->depMedico->find($id)->delete();
        \Session::flash('message', trans('messages.conf_depmedico_exc'));
        return redirect()->to(asset('dm/depmedico'));
    }
}
