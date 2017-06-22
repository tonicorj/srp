<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Http\Request;
use SRP\Http\Requests\jogos\escoposRequest;
use SRP\Models\jogos\Escopos;
use Illuminate\Routing\Controller;

class escoposController extends Controller
{

    private $escopo;
    public function __construct(Escopos $escopo) {
        $this->escopo = $escopo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escopos = Escopos::query()
            ->orderBy('ESCOPO_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_escopo') );

        return view('jogos.escopos.index')
            ->with('escopos', $escopos)
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
        return view('jogos.escopos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(escoposRequest $request)
    {
        $input = $request->all();
        $id = BuscaProximoCodigo('ESCOPO');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ESCOPO'] = $id;

        $this->escopo->create($input);

        \Session::flash('message', trans( 'messages.conf_escopo_inc'));
        $url = $request->get('redirect_to', asset('jogos.escopos'));
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
        $escopo = $this->escopo->find($id);
        return view ('jogos.escopos.edit')
            ->with('escopo', $escopo);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(escoposRequest $request, $id)
    {
        $this->escopo->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_escopo_alt'));
        $url = $request->get('redirect_to', asset('jogos/escopos'));
        return redirect()->to($url);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->escopo->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_escopo_exc'));
        return redirect()->to(asset('jogos/escopos'));
    }
}
