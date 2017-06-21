<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DFutebol\CategoriasRequest;
use SRP\Models\DFutebol\Categorias;

use DB;

class CategoriasController extends Controller
{
    public function __construct(Categorias $categoria) {
        $this->categoria = $categoria;
    }

    public function index()
    {
        $palavraChave = Input::get('pesquisa');

        // busca por campo da tabela
        $palavraChave = '%' . $palavraChave . '%';
        $categorias = Categorias::where('CATEG_DESCRICAO', 'like', $palavraChave )
            ->orderBy('CATEG_DESCRICAO', 'ASC')
            ->paginate(10);

        if (count($categorias)== 0) {
            $palavraChave = '';

            // retorna todos os dados
            $categorias = Categorias::query()
                ->orderBy('CATEG_DESCRICAO', 'ASC')
                ->paginate(10);

        }
        $palavraChave = str_replace('%', '', $palavraChave);

        return view('DFutebol.categorias.index')
            ->with('categorias', $categorias)
            ->with('pesquisa', $palavraChave);
    }

    public function create()
    {
        return view('DFutebol.categorias.create');
    }

    public function store(CategoriasRequest $request)
    {
        $input = $request->all();
        //return dd($input);

        // define o código novo
        $reg = DB::select('select max(ID_CATEGORIA) as id from CATEGORIAS ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_CATEGORIA'] = $id;
        $this->categoria->create($input);

        \Session::flash('message', trans( 'messages.conf_categoria_inc'));
        $url = $request->get('redirect_to', asset('DFutebol.categorias'));
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
        $this->categoria->find($id)->update($request->all());

        \Session::flash('message', trans( 'messages.conf_categoria_alt'));
        $url = $request->get('redirect_to', asset('DFutebol.categorias'));
        return redirect()->to($url);
    }

    public function destroy($id)
    {
        $this->categoria->find($id)->delete();
        \Session::flash('message', trans( 'messages.conf_categoria_exc'));
        return redirect()->to(URL::previous());
    }

    public function busca()
    {
        // palavra chave a ser buscada
        $palavraChave = Input::get('pesquisa');
        return dd($palavraChave);

        // busca por campo da tabela
        $palavraChave = '%' . $palavraChave . '%';
        $query = Categorias::where('CATEG_DESCRICAO', 'like', $palavraChave )
        ->orderBy('CATEG_DESCRICAO', 'ASC')
        ->paginate(10);

        if (count($query)== 0) {
            // retorna todos os dados
            $categorias = Categorias::query()
                ->orderBy('CATEG_DESCRICAO', 'ASC')
                ->paginate(10);

            return view('DFutebol.categorias.index')
                ->with('categorias', $categorias)
                ->with('pesquisa', $palavraChave);
        }

        return view('DFutebol.categorias.index')
            ->with('categorias', $query)
            ->with('pesquisa', $palavraChave);
    }

}
