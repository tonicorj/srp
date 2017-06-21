<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use SRP\Http\Controllers\Controller;

use SRP\Models\DM\DepMedico;
use SRP\Models\DM\dmExames;
use SRP\Models\DM\Exames;
use SRP\Models\DM\Medicos;
use SRP\Http\Requests\DM\dmExamesRequest;
use DB;

class dmExamesController extends Controller
{
    public function __construct(dmExames $dmexame )
    {
        $this->dmexame = $dmexame;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pega o código do atendimento
        $id_dm = Input::get('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);

        // titulos
        $titulos = array(
            trans('messages.tit_exames_data'),
            trans('messages.tit_medico'),
            trans('messages.tit_exames'),
            trans('messages.tit_exames_data_realizado')
        );

        // lista os acompanhamentos
        $dmexames = DB::table('VS_DM_EXAME')
            ->where('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->orderBy('EXAME_DATA', 'DESC')
            ->get();

        return view('DM.dmexames.index')
            ->with('dmexames', $dmexames)
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

        $medicos = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $exames  = Exames::orderBy('EXAME_NOME','asc')->pluck('EXAME_NOME', 'ID_EXAME')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('DM.dmexames.create')
            ->with('medicos', $medicos)
            ->with('dmatend', $dmatend)
            ->with('exames' , $exames)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(dmExamesRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTO_MEDICO_EXAME');
        if ($id != null) {
            $input['ID_DM_EXAME'] = $id;
        }

        // define as datas para exibição
        $input['EXAME_DATA']  = data_to_sql($input['EXAME_DATA_S']);
        $input['EXAME_DATA_REALIZADO']  = data_to_sql($input['EXAME_DATA_REALIZADO_S']);
        $this->dmexame->create($input);

        \Session::flash('message', trans('messages.conf_exame_inc'));
        //$url = $request->get('redirect_to', asset('DM.dmacompanha'));
        $url = route('dmexames.index', ['dm' => $input['ID_DEPARTAMENTO_MEDICO']]);
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
        $dmexame = $this->dmexame->find($id);

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($dmexame->ID_DEPARTAMENTO_MEDICO);

        // define as datas para exibição
        $dmexame['EXAME_DATA_S'] = data_display($dmexame['EXAME_DATA']);
        $dmexame['EXAME_DATA_REALIZADO_S'] = data_display($dmexame['EXAME_DATA_REALIZADO']);

        $medicos = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');
        $exames  = Exames::orderBy('EXAME_NOME','asc')->pluck('EXAME_NOME', 'ID_EXAME');

        return view('DM.dmexames.edit')
            ->with('dmexame', $dmexame)
            ->with('medicos', $medicos)
            ->with('exames', $exames)
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
    public function update(dmExamesRequest $request, $id)
    {
        $request['EXAME_DATA'] = data_to_sql($request['EXAME_DATA_S']);
        $request['EXAME_DATA_REALIZADO'] = data_to_sql($request['EXAME_DATA_REALIZADO_S']);
        $this->dmexame->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_exame_alt'));
        $url = route('dmexames.index', ['dm' => $request['ID_DEPARTAMENTO_MEDICO']]);
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
        $this->dmexame->find($id)->delete();
        \Session::flash('message', trans('messages.conf_exame_exc'));
        return redirect()->to(URL::previous());
    }
}
