<?php

namespace SRP\Http\Controllers\ssocial;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\ssocial\origemservsocialRequest;
use SRP\Models\ssocial\origemservsocial;

use DB;

class origemservsocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(origemservsocial $origemservsocial) {
        $this->origemservsocial = $origemservsocial;
    }

    public function index()
    {
        //->orderBy('ORIGEM_SERVSOCIAL_DESCRICAO', 'ASC')
        //->paginate(10);
        $origens = origemservsocial::query()->get();
        $titulos = array( '#', trans('messages.tit_origematendimento') );
        //return dd($origens);
        return view('ssocial.origemservsocial.index')
            ->with('origens', $origens)
            ->with('titulos', $titulos)
            ;
    }

    public function _json() {
        $_sql  = "select A.ID_ORIGEM_SERVSOCIAL, A.ORIGEM_SERVSOCIAL_DESCRICAO";
        $_sql .= " from ORIGEM_SERVSOCIAL A ";
        $_sql .= " order by ";
        $_sql .= "  A.ORIGEM_SERVSOCIAL_DESCRICAO ";
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
        return view('ssocial.origemservsocial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(origemservsocialRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $id = BuscaProximoCodigo('ORIGEM_SERVSOCIAL');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ORIGEM_SERVSOCIAL'] = $id;

        $this->origemservsocial->create($input);

        \Session::flash('message', trans( 'messages.conf_origem_inc'));
        $url = $request->get('redirect_to', asset('ssocial\origemservsocial'));
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
        $origemservsocial = $this->origemservsocial->find($id);

        return view ('ssocial.origemservsocial.edit')
            ->with('origemservsocial', $origemservsocial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(origemservsocialRequest $request, $id )  //origemservsocial $origemservsocial)
    {
        $this->origemservsocial->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_origem_alt'));
        $url = $request->get('redirect_to', asset('ssocial\origemservsocial'));
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
        $this->origemservsocial->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_origem_exc'));
        return redirect()->to(asset('ssocial\origemservsocial'));
    }
}
