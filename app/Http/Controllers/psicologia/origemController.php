<?php

namespace SRP\Http\Controllers\psicologia;

use SRP\Models\psicologia\origem;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\psicologia\origemRequest;

use DB;

class origemController extends Controller
{
    public $origem;

    public function __construct(origem $origem) {
        $this->origem = $origem;
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulos = array( '#', trans('messages.tit_origematendimento') );
        $origem = origem::query()->get();
        return view('psicologia.origem.index')
            ->with('origens', $origem)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select A.ID_ORIGEM_PSICOLOGIA, A.ORIGEM_PSICOLOGIA_DESCRICAO";
        $_sql .= " from ORIGEM_PSICOLOGIA A ";
        $_sql .= " order by ";
        $_sql .= "  A.ORIGEM_PSICOLOGIA_DESCRICAO ";
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
        return view('psicologia.origem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(origemRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ORIGEM_PSICOLOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ORIGEM_PSICOLOGIA'] = $id;

        $this->origem->create($input);

        \Session::flash('message', trans( 'messages.conf_origem_inc'));
        $url = $request->get('redirect_to', asset('psicologia.origem'));
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

        return view ('psicologia.origem.edit')
            ->with('origem', $origem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(origemRequest $request, $id )
    {
        $this->origem->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_origem_alt'));
        $url = $request->get('redirect_to', asset('psicologia.origem'));
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
        return redirect()->to(URL::previous());
    }
}
