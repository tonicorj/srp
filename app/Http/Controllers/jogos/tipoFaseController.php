<?php

namespace SRP\Http\Controllers\jogos;

use Illuminate\Routing\Controller;
use SRP\Models\jogos\tipoFase;
use SRP\Http\Requests\jogos\tipoFaseRequest;

class tipoFaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipoFase::query()
            ->orderBy('TFASE_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_tipofase')
        );

        return view('jogos.tipofase.index')
            ->with('tipos', $tipos)
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
        return view('jogos.tipofase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoFaseRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('TIPOFASE');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_TIPOFASE'] = $id;
        tipoFase::create($input);

        \Session::flash('message', trans('messages.conf_tipofase_inc'));
        $url = $request->get('redirect_to', asset('jogos/tipofase'));
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
        $tipo = tipoFase::where('ID_TIPOFASE', $id)->get();
        return view ('jogos.tipofase.edit')
            ->with('tipo', $tipo[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipoFaseRequest $request, $id)
    {
        tipoFase::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_tipofase_alt'));
        $url = $request->get('redirect_to', asset('jogos/tipofase'));
        return redirect()->to($url);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipoFase::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_tipofase_exc'));
        return redirect()->to(asset('jogos/tipofase'));
    }
}
