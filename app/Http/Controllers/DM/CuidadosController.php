<?php

namespace SRP\Http\Controllers\DM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use SRP\Http\Requests\DM\cuidadosRequest;
use SRP\Models\DM\cuidados;

class CuidadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuidados = DB::table('VS_CUIDADOS')
            ->get();

        $titulos = array( '#'
            , trans('messages.tit_jogador')
            , trans('messages.tit_cuidados_data')
            , trans('messages.tit_medico')
            , trans('messages.tit_cuidados_tiposanguineo')
        );

        return view('dm.cuidados.index')
            ->with('cuidados', $cuidados)
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
        $medicos = DB::table('VW_MEDICOS')
            ->where('FLAG_ATIVO_USUARIO', 'S')
            ->pluck('NOME_USUARIO', 'ID_USUARIO')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        //return dd($jog);
        return view('dm.cuidados.create')
            ->with('medicos', $medicos)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cuidadosRequest $request)
    {
        $input = $request->all();
        // define o código novo

        /*
        $id = BuscaProximoCodigo('JOGADOR_OCORRENCIA');
        if ($id != null)
            $input['ID_JOGADOR_OCORRENCIA'] = $id;
        */

        // troca a data para o formato do sql server
        $input['DATA_INCLUSAO']         = data_to_sql($input['DATA_INCLUSAO_S']);

        cuidados::create($input);
        \Session::flash('message', trans( 'messages.conf_cuidados_inc'));
        $url = $request->get('redirect_to', asset('dm/cuidados'));
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
        $cuidados = cuidados::find($id);

        $medicos = DB::table('VW_MEDICOS')
            ->where('FLAG_ATIVO_USUARIO', 'S')
            ->pluck('NOME_USUARIO', 'ID_USUARIO')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        // acerta as datas
        $cuidados['DATA_INCLUSAO_S'] = data_display($cuidados['DATA_INCLUSAO']);

        $jog = DB::select('select JOG_NOME from v_elenco where id_jogador = ' . $ocorrencia['ID_JOGADOR']);
        $cuidados['JOG_NOME_COMPLETO']   = $jog[0]->JOG_NOME;

        // chama a view de alteração
        return view ('dm.cuidados.edit')
            ->with('cuidado', $cuidados)
            ->with('medicos', $medicos)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, cuidadosRequest $request)
    {
        // troca a data para o formato do sql server
        $request['DATA_INCLUSAO'] = data_to_sql($request['DATA_INCLUSAO_S']);
        cuidados::find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_cuidados_alt'));
        $url = $request->get('redirect_to', asset('dm.cuidados'));
        return redirect()->to($url);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cuidados::find($id)->delete();
        \Session::flash('message', trans('messages.conf_cuidados_exc'));
        $url = asset('dm/cuidados');
        return redirect()->to($url);
    }
}
