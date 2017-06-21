<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;

use SRP\Http\Controllers\Controller;

use SRP\Models\DM\DepMedico;
use SRP\Models\DM\Medicos;
use SRP\Models\DM\Prontuario;
use SRP\Http\Requests\DM\ProntuarioRequest;

use DB;

class ProntuarioController extends Controller
{
    public function __construct(Prontuario $prontuario)
    {
        $this->prontuario = $prontuario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $palavraChave = Input::get('pesquisa');

        // busca por campo da tabela
        $palavraChave = '%' . $palavraChave . '%';
        $categorias = Categorias::where('CATEG_DESCRICAO', 'like', $palavraChave )
            ->orderBy('CATEG_DESCRICAO', 'ASC')
            ->paginate(10);

        if (count($categorias)== 0) {
            $palavraChave = '';

            // retorna todos os dados
            $categorias = Categorias::query()
                ->orderBy('CATEG_DESCRICAO', 'ASC')
                ->paginate(10);

        }
        $palavraChave = str_replace('%', '', $palavraChave);
        */

        // pega o código do atendimento
        $id_dm = Input::get('dm');

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($id_dm);

        $titulos = array(
            trans('messages.tit_prontuario_data'),
            trans('messages.tit_medico')
        );

        // lista os acompanhamentos
        $prontuarios = DB::table('VS_DM_PRONTUARIO')
            ->where('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->orderBy('DATA_PRONTUARIO', 'DESC')
            ->get();

        return view('DM.prontuario.index')
            ->with('prontuarios', $prontuarios)
            ->with('ID_DEPARTAMENTO_MEDICO', $id_dm)
            ->with('dmatend', $dmatend)
            ->with('pesquisa', '')
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

        $medicos = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');

        return view('DM.prontuario.create')
            ->with('medicos', $medicos)
            ->with('dmatend', $dmatend)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProntuarioRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('DEPARTAMENTO_MEDICO_PRONTUARIO');
        if ($id != null) {
            $input['ID_PRONTUARIO'] = $id;
        }

        // define as datas para exibição
        $input['DATA_PRONTUARIO']  = data_to_sql($input['DATA_PRONTUARIO_S']);
        //return(dd($input));
        $this->prontuario->create($input);

        \Session::flash('message', trans('messages.conf_prontuario_inc'));
        $url = route('prontuario.index', ['dm' => $input['ID_DEPARTAMENTO_MEDICO']]);
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
        $prontuario = $this->prontuario->find($id);

        // pesquisa o atendimento
        $dmatend = DepMedico::pesquisaDM($prontuario->ID_DEPARTAMENTO_MEDICO);

        // define as datas para exibição
        $prontuario['DATA_PRONTUARIO_S'] = data_display($prontuario['DATA_PRONTUARIO']);
        $medicos      = Medicos::orderby('NOME_USUARIO', 'asc')->pluck('NOME_USUARIO', 'ID_USUARIO');

        return view('DM.prontuario.edit')
            ->with('prontuario', $prontuario)
            ->with('medicos', $medicos)
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
    public function update(ProntuarioRequest $request, $id)
    {
        $request['DATA_PRONTUARIO'] = data_to_sql($request['DATA_PRONTUARIO_S']);
        $this->prontuario->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_prontuario_alt'));
        $url = route('prontuario.index', ['dm' => $request['ID_DEPARTAMENTO_MEDICO']]);
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
        $this->prontuario->find($id)->delete();
        \Session::flash('message', trans('messages.conf_prontuario_exc'));
        return redirect()->to(URL::previous());
    }
}
