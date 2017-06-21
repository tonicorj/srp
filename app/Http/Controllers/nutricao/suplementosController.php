<?php

namespace SRP\Http\Controllers\nutricao;

use SRP\Http\Controllers\Controller;
use SRP\Models\nutricao\suplementos;
use SRP\Http\Requests\nutricao\suplementosRequest;

class suplementosController extends Controller
{
    private $suplemento;

    public function __construct(suplementos $suplemento) {
        $this->suplemento = $suplemento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplementos = suplementos::query()
            ->orderBy('SUPLEMENTO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_suplementos') );

        return view('nutricao.suplementos.index')
            ->with('suplementos', $suplementos )
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
        return view('nutricao.suplementos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(suplementosRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('SUPLEMENTO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_SUPLEMENTO'] = $id;

        $this->suplemento->create($input);

        \Session::flash('message', trans( 'messages.conf_suplemento_inc'));
        $url = $request->get('redirect_to', asset('nutricao/suplementos'));
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
        $suplemento = $this->suplemento->find($id);
        return view ('nutricao.suplementos.edit')
            ->with('suplemento', $suplemento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(suplementosRequest $request, $id)
    {
        $this->suplemento->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_suplemento_alt'));
        $url = $request->get('redirect_to', asset('nutricao/suplementos'));
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
        $this->suplemento->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_suplemento_exc'));
        return redirect()->to(asset('nutricao/suplementos'));
    }
}
