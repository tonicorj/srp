<?php

namespace SRP\Http\Controllers\jogos;

use DB;
use SRP\Models\jogos\Tecnicos;
use Illuminate\Routing\Controller;
use SRP\Http\Requests\jogos\TecnicosRequest;

class tecnicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = Tecnicos::query()
            ->orderBy('TECNICO_NOME', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_tecnico')
        );

        return view('jogos.tecnicos.index')
            ->with('tecnicos', $tecnicos)
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
        return view('jogos.tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TecnicosRequest $request)
    {
        $input = $request->all();

        // define o codigo novo
        $id = BuscaProximoCodigo('TECNICOS');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_TECNICO'] = $id;
        Tecnicos::create($input);

        \Session::flash('message', trans('messages.conf_tecnico_inc'));
        $url = $request->get('redirect_to', asset('jogos/tecnicos'));
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
        $tecnico = Tecnicos::where('ID_TECNICO', $id)->get();
        return view ('jogos.tecnicos.edit')
            ->with('tecnico', $tecnico[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TecnicosRequest $request, $id)
    {
        Tecnicos::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_tecnico_alt'));
        $url = $request->get('redirect_to', asset('jogos/tecnicos'));
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
        Tecnicos::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_tecnico_exc'));
        return redirect()->to(asset('jogos/tecnicos'));
    }
}
