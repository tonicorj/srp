<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DFutebol\CategoriasRequest;
use SRP\Models\DFutebol\Categorias;

use DB;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::query()
            ->orderBy('CATEG_DESCRICAO', 'ASC')
            ->get()
        ;

        $titulos = array( '#'
            , trans('messages.tit_categoria')
            , trans('messages.tit_categ_idade_ini')
            ,trans('messages.tit_categ_idade_fin')
            ,trans('messages.tit_categ_tempo_jogo')

        );

        return view('DFutebol.categorias.index')
            ->with('categorias', $categorias)
            ->with('titulos', $titulos);
    }

    public function create()
    {
        return view('DFutebol.categorias.create');
    }

    public function store(CategoriasRequest $request)
    {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('CATEGORIAS');

        // define o clube padrão
        $c = DB::query('SELECT ID_TIME FROM CONFIGURA')->get();
        $clube = $c['ID_TIME'];
        $input['ID_CLUBE'] = $clube;

        if ($id != null)
            $input['ID_SELECAO'] = $id;

        Categorias::create($input);

        \Session::flash('message', trans( 'messages.conf_categoria_inc'));
        $url = $request->get('redirect_to', asset('DFutebol/categorias'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public function edit(Categorias $categoria)
    {
        return view ('DFutebol.categorias.edit')
            ->with('categoria', $categoria);
    }

    public function update(CategoriasRequest $request, $id )
    {
        Categorias::find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_categoria_alt'));
        $url = $request->get('redirect_to', asset('dfutebol/categorias'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        Categorias::find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_categoria_exc'));
        return redirect()->to(asset('dfutebol/categorias'));
    }
}
