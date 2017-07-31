<?php

namespace SRP\Http\Controllers\pedagogia;

use SRP\Models\pedagogia\origemPed;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\pedagogia\origempedRequest;

class origemPedController extends Controller
{
    public $origem;

    public function __construct(origemPed $origem) {
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
        $origem = origemPed::query()->get();
        return view('pedagogia.origemped.index')
            ->with('origens', $origem)
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
        return view('pedagogia.origemped.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(origemPedRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('ORIGEM_PEDAGOGIA');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ORIGEM_PEDAGOGIA'] = $id;

        $this->origem->create($input);

        \Session::flash('message', trans( 'messages.conf_origem_inc'));
        $url = $request->get('redirect_to', asset('pedagogia/origemped'));
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
        return view ('pedagogia.origemped.edit')
            ->with('origem', $origem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(origemPedRequest $request, $id )
    {
        $this->origem->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_origem_alt'));
        $url = $request->get('redirect_to', asset('pedagogia/origemped'));
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
        return redirect()->to(asset('pedagogia/origemped'));
    }
}
