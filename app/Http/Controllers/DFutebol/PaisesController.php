<?php

namespace SRP\Http\Controllers\DFutebol;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SRP\Http\Controllers\Controller;
use SRP\Http\Requests\DFutebol\PaisesRequest;
use SRP\Models\DFutebol\Paises;
use SRP\Models\DFutebolPaises;

use DB;

class PaisesController extends Controller
{
    private $paises;

    public function __construct(Paises $paises) {
        $this->paises = $paises;
    }

    public function index(Request $request) {

        $palavraChave = Input::get('pesquisa');
        $paises = [];

        //return dd($palavraChave);
        //return dd($request);

        if ( ! is_null($palavraChave )) {

            // busca por campo da tabela
            $palavraChave = '%' . $palavraChave . '%';
            $paises = Paises::where('PAIS_NOME', 'like', $palavraChave)
                ->orderBy('PAIS_NOME', 'ASC')
                ->paginate(10);

            $palavraChave = str_replace('%', '', $palavraChave);
        }

        if (count($paises) == 0) {
            $palavraChave = '';

            // retorna todos os dados
            $paises = Paises::query()
                ->orderBy('PAIS_NOME', 'ASC')
                ->paginate(10);
        }

        return view('DFutebol.paises.index')
            ->with('paises', $paises)
            ->with('pesquisa', '');
    }

    // retorna a consulta no formato json
    public function _json() {
        $_sql = "select a.ID_PAIS, a.PAIS_NOME, a.PAIS_SIGLA " .
            " from paises a " .
            " order by a.PAIS_NOME ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $_data['data'] = $teste;
        $_json = \Response::json($_data);
        return $_json;
        //return \Response::json($teste);
    }

    public function create() {
        //return "Funcionou!";


        return view('DFutebol.paises.create');
    }

    public function store(PaisesRequest $request) {
        $input = $request->all();

        // define o código novo
        $id = BuscaProximoCodigo('PAISES');

        // pega o próximo codigo
        if ($id != null)
            $input['ID_PAIS'] = $id;

        $this->paises->create($input);

        \Session::flash('message', trans('messages.conf_paises_inc'));
        $url = $request->get('redirect_to', asset('DFutebol.paises'));
        return redirect()->to($url);
    }

    public function show($id)
    {
        //
    }

    public  function edit($id) {
        $pais = $this->paises->find($id);
        return view ('DFutebol.paises.edit')
            ->with('pais', $pais);
    }

    public function update(PaisesRequest $request, $id) {

        $this->paises->find($id)->update($request->all());

        \Session::flash('message', trans('messages.conf_paises_alt'));
        $url = $request->get('redirect_to', asset('DFutebol.paises'));
        return redirect()->to($url);
    }

    public function destroy($id) {
        $this->paises->find($id)->delete();
        \Session::flash('message', trans('messages.conf_paises_exc'));
        return redirect()->to(URL::previous());
        return;
    }
}
