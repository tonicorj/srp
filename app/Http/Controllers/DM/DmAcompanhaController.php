<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

use SRP\Models\DM\DepMedico;
use SRP\Models\DM\dmAcompanha;
use SRP\Http\Controllers\Controller;
use SRP\Models\DM\Medicos;
use SRP\Http\Requests\DM\dmAcompanhaRequest;

use DB;


class DmAcompanhaController extends Controller
{
    public function __construct(dmAcompanha $dmAcompanha)
    {
        $this->dmAcompanha = $dmAcompanha;
    }

    public function index()
    {
        // pega o código do atendimento
        $id_dm = Input::get('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);

        // define os titulos
        $titulos = array(
          trans('messages.tit_dmAcompanha_data')
        , trans('messages.tit_medico')
        );

        // lista os acompanhamentos
        $dmAcompanha = DB::table('VS_DM_ACOMPANHAMENTOS')
            ->where('id_departamento_medico', $id_dm)
            ->orderBy('acompanhamento_data', 'DESC')
            ->get()
            ;

        return view('DM.dmacompanha.index')
            ->with('dmacompanha', $dmAcompanha)
            ->with('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->with('dmatend', $dmatend)
            ->with('titulos', $titulos)
            ->with('pesquisa', '');
    }

    public function create()
    {
        $id_dm = Input::get('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);
        $medicos = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');

        return view('DM.dmacompanha.create')
            ->with('medicos', $medicos)
            ->with('dmatend', $dmatend)
            ;
    }

    public function store(dmAcompanhaRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTO_MEDICO_ACOMPANHA');
        if ($id != null) {
            $input['ID_ACOMPANHAMENTO_DM'] = $id;
        }

        // define as datas para exibição
        $input['ACOMPANHAMENTO_DATA']  = data_to_sql($input['ACOMPANHAMENTO_DATA_S']);
        $this->dmAcompanha->create($input);

        \Session::flash('message', trans('messages.conf_dmacompanha_inc'));
        //$url = $request->get('redirect_to', asset('DM.dmacompanha'));
        $url = route('dmacompanha.index', ['dm' => $input['ID_DEPARTAMENTO_MEDICO']]);
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dmAcompanha = $this->dmAcompanha->find($id);

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($dmAcompanha->ID_DEPARTAMENTO_MEDICO);

        // define as datas para exibição
        $dmAcompanha['ACOMPANHAMENTO_DATA_S'] = data_display($dmAcompanha['ACOMPANHAMENTO_DATA']);
        $medicos      = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');

        return view('DM.dmacompanha.edit')
            ->with('dmacompanha', $dmAcompanha)
            ->with('medicos', $medicos)
            ->with('dmatend', $dmatend)
            ;
    }

    public function update(DmAcompanhaRequest $request, $id)
    {
        $request['ACOMPANHAMENTO_DATA'] = data_to_sql($request['ACOMPANHAMENTO_DATA_S']);
        $this->dmAcompanha->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_dmacompanha_alt'));
        //$url = $request->get('redirect_to', asset('DM.dmacompanha'));
        $url = route('dmacompanha.index', ['dm' => $request['ID_DEPARTAMENTO_MEDICO']]);
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->dmAcompanha->find($id)->delete();
        \Session::flash('message', trans('messages.conf_dmacompanha_exc'));
        return redirect()->to(URL::previous());
    }
}
