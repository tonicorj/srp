<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Http\Request;
use SRP\Http\Requests\DFutebol\CidadesRequest;
use SRP\Models\DFutebol\Cidades;
use SRP\Http\Controllers\Controller;
use SRP\Models\DFutebol\Paises;
use Illuminate\Support\Facades\URL;

class CidadesController extends Controller
{
    public function __construct(Cidades $cidade) {
        $this->cidade = $cidade;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //if (! $request->has('page')) {
        $request->has('f_nome') ? session(['f_nome' => $request->input('f_nome')])  : session(['f_nome' => '']);
        $request->has('f_uf')   ? session(['f_uf'   => $request->input('f_uf')])    : session(['f_uf'   => '']);
        $request->has('f_pais') ? session(['f_pais' => $request->input('f_pais')])  : session(['f_pais' => '']);

        $filtro = function ($query) use($request) {
            if (!empty(session('f_nome'))) {
                $query->where('CIDADE_NOME', 'like', session('f_nome') . '%');
            }

            if (!empty(session('f_uf'))) {
                $query->where('UF', '=', session('f_uf'));
            }

            if (!empty(session('f_pais'))) {
                $query->where('ID_PAIS', '=', session('f_pais'));
            }
        };
        //return dd($filtro);

        $paises = Paises::orderBy('PAIS_NOME', 'ASC')
            ->pluck('PAIS_NOME', 'ID_PAIS')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        $cidades = Cidades::query()
            ->where($filtro)
            ->orderBy('CIDADE_NOME', 'ASC')
            ->paginate(10);


        return view( 'DFutebol.cidades.index')
        ->with('cidades', $cidades)
        ->with('paises', $paises)
        ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises       = Paises::orderBy('PAIS_NOME', 'asc')
            ->pluck('PAIS_NOME', 'ID_PAIS')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('DFutebol.cidades.create')
            ->with('paises', $paises)
            ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadesRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('CIDADES');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_CIDADE'] = $id;

        $this->cidade->create($input);


        \Session::flash('message', trans('messages.conf_cidade_inc'));
        $url = $request->get('redirect_to', asset('DFutebol.cidades'));
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
        $cidade = $this->cidade->find($id);
        $paises = Paises::orderBy('PAIS_NOME', 'ASC')
            ->pluck('PAIS_NOME', 'ID_PAIS')
            ->prepend(trans('messages.tit_selecioneopcao'), '');

        return view('DFutebol.cidades.edit')
            ->with('cidade', $cidade )
            ->with('paises', $paises )
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadesRequest $request, $id)
    {
        $this->cidade->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_cidade_alt'));
        $url = $request->get('redirect_to', asset('DFutebol.cidades'));
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
        $this->cidade->find($id)->delete();
        \Session::flash('message', trans('messages.conf_cidade_exc'));
        return redirect()->to(URL::previous());    }
}
