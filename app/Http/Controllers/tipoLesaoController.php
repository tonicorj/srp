<?php

namespace SRP\Http\Controllers;

use Illuminate\Http\Request;

use SRP\Http\Requests;
use DB;

class tipoLesaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = DB::table('TIPO_LESAO')
            ->get();
        $titulos = array( trans('messages.tit_tipo_lesao') );

        return dd($titulos);

        return view('DM.tipo_lesao.index')
            ->with('tipos', $tipos)
            ->with('titulos', $titulos)
            ;
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql  = "select A.ID_TIPO_LESAO, A.TIPO_LESAO_DESCRICAO ";
        $_sql .= " from TIPO_LESAO A ";
        $_sql .= " order by ";
        $_sql .= "  A.TIPO_LESAO_DESCRICAO ";
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
