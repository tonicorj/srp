<?php

namespace SRP\Http\Controllers\nutricao;

use SRP\Http\Controllers\Controller;
use SRP\Models\nutricao\origemNutricao;
use SRP\Http\Requests\nutricao\origemNutricaoRequest;

class origemNutricaoController extends Controller
{
    private $origem;

    public function __construct(origemNutricao $origem) {
        $this->origem = $origem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origens = origemNutricao::query()
            ->orderBy('ORIGEM_NUTRICAO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_origemnutricao') );

        return view('nutricao.origemNutricao.index')
            ->with('origem', $origens)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select A.ID_ORIGEM_NUTRICAO, A.ORIGEM_NUTRICAO_DESCRICAO";
        $_sql .= " from ORIGEM_NUTRICAO A ";
        $_sql .= " order by ";
        $_sql .= "  A.ORIGEM_NUTRICAO_DESCRICAO ";
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
        return view('nutricao.origemNutricao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(origemNutricaoRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ORIGEM_NUTRICAO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ORIGEM_NUTRICAO'] = $id;

        $this->origem->create($input);

        \Session::flash('message', trans( 'messages.conf_origem_inc'));
        $url = $request->get('redirect_to', asset('nutricao/origemNutricao'));
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
        $origem = $this->origem->find($id);
        return view ('nutricao.origemNutricao.edit')
            ->with('origem', $origem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(origemNutricaoRequest $request, $id)
    {
        $this->origem->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_origem_alt'));
        $url = $request->get('redirect_to', asset('nutricao/origemNutricao'));
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
        $this->origem->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_origem_exc'));
        return redirect()->to(asset('nutricao/origemNutricao'));
    }
}
