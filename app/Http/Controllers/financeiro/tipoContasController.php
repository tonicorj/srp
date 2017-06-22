<?php

namespace SRP\Http\Controllers\financeiro;

use Illuminate\Routing\Controller;
use SRP\Models\financeiro\tipoContas;
use SRP\Http\Requests\financeiro\tipoContasRequest;

class tipoContasController extends Controller
{
    private $tipo;

    public function __construct(tipoContas $tipo) {
        $this->tipo = $tipo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipoContas::query()
            ->orderBy('TIPO_CONTA_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#'
        , trans('messages.tit_tipoconta_num')
        , trans('messages.tit_tipoconta')
        );

        return view('financeiro.tipocontas.index')
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
        return view('financeiro.tipocontas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoContasRequest $request)
    {
        $input = $request->all();
        $id = BuscaProximoCodigo('TIPO_CONTA');

        // pega o próximo codigo
        if ($id != null)
            $input['TIPO_CONTA_ID'] = $id;

        $this->tipo->create($input);

        \Session::flash('message', trans( 'messages.conf_tipoconta_inc'));
        $url = $request->get('redirect_to', asset('financeiro/tipocontas'));
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
        $tipo = $this->tipo->find($id);
        return view ('financeiro.tipocontas.edit')
            ->with('tipo', $tipo)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipoContasRequest $request, $id)
    {
        $this->tipo->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_tipoconta_alt'));
        $url = $request->get('redirect_to', asset('financeiro/tipocontas'));
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
        $this->tipo->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_tipoconta_exc'));
        return redirect()->to(asset('financeiro/tipocontas'));    }
}
