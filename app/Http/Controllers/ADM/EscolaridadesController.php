<?php

namespace SRP\Http\Controllers\ADM;

use SRP\Models\ADM\escolaridades;
use Illuminate\Routing\Controller;
use SRP\Http\Requests\ADM\EscolaridadesRequest;

class EscolaridadesController extends Controller
{
    private $escolaridade;

    public function __construct(escolaridades $escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolaridades = escolaridades::query()
            ->orderBy('ESCOLARIDADE_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_escolaridade') );

        return view('adm.escolaridades.index')
            ->with('escolaridades', $escolaridades)
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
        return view('adm.escolaridades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(escolaridadesRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o codigo novo
        $id = BuscaProximoCodigo('ESCOLARIDADE');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_ESCOLARIDADE'] = $id;
        $this->escolaridade->create($input);

        \Session::flash('message', trans('messages.conf_escolaridade_inc'));
        $url = $request->get('redirect_to', asset('adm/escolaridades'));
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
        $escolaridade = $this->escolaridade->find($id);
        return view ('adm.escolaridades.edit')
            ->with('escolaridade', $escolaridade )
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, escolaridadesRequest $request)
    {
        $this->escolaridade->find($id)->update($request->all());
        \Session::flash('message', trans( 'messages.conf_escolaridade_alt'));
        $url = $request->get('redirect_to', asset('adm/escolaridades'));
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
        $this->escolaridade->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_escolaridade_exc'));
        return redirect()->to(asset('adm/escolaridades'));
    }
}
