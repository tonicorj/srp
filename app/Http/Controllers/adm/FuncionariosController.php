<?php

namespace SRP\Http\Controllers\adm;

use Illuminate\Http\Request;

use SRP\Http\Controllers\Controller;
use SRP\Models\ADM\Cargos;
use SRP\Models\ADM\Departamentos;
use SRP\Models\ADM\Funcionarios;
use DB;

class FuncionariosController extends Controller
{
    private $funcionario;

    public function __construct(Funcionarios $funcionario) {
        $this->funcionario = $funcionario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulos = array( '#'
        ,trans('messages.tit_funcionario')
        ,trans('messages.tit_cargo')
        ,trans('messages.tit_departamento')
        );

        $funcionarios = DB::table('VS_FUNCIONARIOS')
            ->orderBy('NOME_USUARIO', 'DESC')
            ->get();

        return view('adm.funcionarios.index')
            ->with('funcionarios', $funcionarios)
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
        $cargos = Cargos::orderBy('CARGO_COMISSAO', 'asc')->pluck('CARGO_COMISSAO', 'ID_CARGO_COMISSAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $departamentos = Departamentos::orderBy('DEPARTAMENTO_DESCRICAO', 'asc')->pluck('DEPARTAMENTO_DESCRICAO', 'ID_DEPARTAMENTO')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('adm.funcionarios.create')
            ->with('departamentos', $departamentos)
            ->with('cargos', $cargos)
        ;

        return view('adm.funcionarios.create');
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

        // define o código novo
        $id = BuscaProximoCodigo('USUARIOS');
        if ($id != null)
            $input['ID_USUARIO'] = $id;

        // acerta as datas
        $input['DATA_NASCIMENTO'] = data_to_sql($input['DATA_NASCIMENTO_S']);
        $input['FUNC_DATA_ENTRADA']  = data_to_sql($input['FUNC_DATA_ENTRADA_S']);
        $input['FUNC_DATA_SAIDA']  = data_to_sql($input['FUNC_DATA_SAIDA_S']);

        // campos default
        $input['LOGIN_USUARIO'] = 'usuario ' . $input['ID_USUARIO'];
        $input['USUARIO_SKIN'] = 'Blue';
        $input['FLAG_PREVILEGIADO_USUARIO'] = 'N';
        $input['FLAG_ATIVO_USUARIO'] = 'S';
        $input['FREQ_TROCA_SENHA_USUARIO'] = '365';
        $input['ID_PERFIL'] = 2;                            // usuário padrão

        $this->funcionario->create($input);

        \Session::flash('message', trans( 'messages.conf_funcionario_inc'));
        $url = $request->get('redirect_to', asset('adm/funcionarios'));
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
        $funcionario = $this->funcionario->find($id);

        // monta o campo da data da visita
        $funcionario['DATA_NASCIMENTO_S'] = data_display($funcionario['DATA_NASCIMENTO']);
        $funcionario['FUNC_DATA_ENTRADA_S'] = data_display($funcionario['FUNC_DATA_ENTRADA_S']);
        $funcionario['FUNC_DATA_SAIDA_S'] = data_display($funcionario['FUNC_DATA_SAIDA_S']);

        $cargos = Cargos::orderBy('CARGO_COMISSAO', 'asc')->pluck('CARGO_COMISSAO', 'ID_CARGO_COMISSAO')->prepend(trans('messages.tit_selecioneopcao'), '');
        $departamentos = Departamentos::orderBy('DEPARTAMENTO_DESCRICAO', 'asc')->pluck('DEPARTAMENTO_DESCRICAO', 'ID_DEPARTAMENTO')->prepend(trans('messages.tit_selecioneopcao'), '');

        return view ('adm.funcionarios.edit')
            ->with('funcionarios', $funcionario)
            ->with('cargos', $cargos)
            ->with('departamentos', $departamentos)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request['DATA_NASCIMENTO']   = data_to_sql($request['DATA_NASCIMENTO_S']);
        $request['FUNC_DATA_ENTRADA'] = data_to_sql($request['FUNC_DATA_ENTRADA_S']);
        $request['FUNC_DATA_SAIDA']   = data_to_sql($request['FUNC_DATA_SAIDA_S']);

        $this->funcionario->find($request['ID_USUARIO'])->update($request->all());

        \Session::flash('message', trans( 'messages.conf_funcionario_alt'));
        $url = $request->get('redirect_to', asset('adm.funcionarios'));
        return redirect()->to($url);        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->funcionario->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_funcionario_exc'));
        return redirect()->to(asset('adm/funcionarios'));
    }
}
