<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use SRP\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use SRP\Http\Requests\DM\dmCirurgiasRequest;
use SRP\Models\DM\Cirurgias;
use SRP\Models\DM\dmCirurgias;
use SRP\Models\DM\DepMedico;
use SRP\Models\DM\Medicos;
use DB;

class DmCirurgiasController extends Controller
{
    public function __construct(dmCirurgias $dmcirurgia)
    {
        $this->dmcirurgia = $dmcirurgia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // pega o código do atendimento
        $id_dm = $request->input('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);

        // lista os acompanhamentos
        $dmcirurgias = DB::table('VS_DM_CIRURGIA')
            ->where('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->orderBy('CIRURGIA_DATA', 'DESC')
            ->get()
        ;

        $titulos = array(
            trans('messages.tit_dmcirurgia_data'),
            trans('messages.tit_medico'),
            trans('messages.tit_cirurgia'),
            trans('messages.tit_dmcirurgia_data_realizado')
        );

        return view('DM.dmcirurgias.index')
            ->with('dmcirurgias', $dmcirurgias)
            ->with('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->with('dmatend', $dmatend)
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
        $id_dm = Input::get('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);

        $medicos   = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $cirurgias = Cirurgias::orderBy('CIRURGIA_NOME','asc')->pluck('CIRURGIA_NOME', 'ID_CIRURGIA')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('DM.dmcirurgias.create')
            ->with('medicos', $medicos)
            ->with('dmatend', $dmatend)
            ->with('cirurgias' , $cirurgias)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(dmCirurgiasRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTO_MEDICO_CIRURGIA');
        if ($id != null) {
            $input['ID_DM_CIRURGIA'] = $id;
        }

        // define as datas para exibição
        $input['CIRURGIA_DATA']  = data_to_sql($input['CIRURGIA_DATA_S']);
        $input['CIRURGIA_DATA_SOLICITACAO']  = data_to_sql($input['CIRURGIA_DATA_SOLICITACAO_S']);
        $this->dmcirurgia->create($input);

        \Session::flash('message', trans('messages.conf_cirurgia_inc'));
        $url = route('dmcirurgias.index', ['dm' => $input['ID_DEPARTAMENTO_MEDICO']]);
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
        $dmcirurgia = $this->dmcirurgia->find($id);

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($dmcirurgia->ID_DEPARTAMENTO_MEDICO);

        // define as datas para exibição
        $dmcirurgia['CIRURGIA_DATA_S'] = data_display($dmcirurgia['CIRURGIA_DATA']);
        $dmcirurgia['CIRURGIA_DATA_SOLICITACAO_S'] = data_display($dmcirurgia['CIRURGIA_DATA_SOLICITACAO']);

        $medicos = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');
        $cirurgias = Cirurgias::orderBy('CIRURGIA_NOME','asc')->pluck('CIRURGIA_NOME', 'ID_CIRURGIA');

        return view('DM.dmcirurgias.edit')
            ->with('dmcirurgia', $dmcirurgia)
            ->with('medicos', $medicos)
            ->with('cirurgias', $cirurgias)
            ->with('dmatend', $dmatend)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(dmCirurgiasRequest $request, $id)
    {
        $request['CIRURGIA_DATA'] = data_to_sql($request['CIRURGIA_DATA_S']);
        $request['CIRURGIA_DATA_SOLICITACAO'] = data_to_sql($request['CIRURGIA_DATA_SOLICITACAO_S']);
        $this->dmcirurgia->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_cirurgia_alt'));
        $url = route('dmcirurgias.index', ['dm' => $request['ID_DEPARTAMENTO_MEDICO']]);
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
        $this->dmcirurgia->find($id)->delete();
        \Session::flash('message', trans('messages.conf_cirurgia_exc'));
        return redirect()->to(URL::previous());
    }
}
