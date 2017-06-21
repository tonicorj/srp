<?php

namespace SRP\Http\Controllers\ADM;

use Illuminate\Http\Request;

use SRP\Http\Requests\EscolaridadesRequest;
use SRP\Models\ADM\Escolaridades;
use DB;

class EscolaridadesController extends Controller
{
    private $escolaridade;

    public function __construct(Escolaridades $escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    public function index(Request $request) {

        $escolaridades = Escolaridades::query()
            ->orderBy('ESCOLARIDADE_DESCRICAO', 'ASC')
            ->get();

        $titulos = array( '#', trans('messages.tit_escolaridade') );

        return view('adm.escolaridades.index')
            ->with('escolaridades', $escolaridades)
            ->with('titulos', $titulos)
            ;
    }

    public function create() {
        return view('adm.escolaridades.create')
            ;
    }

    public function store(EscolaridadesRequest $request) {
        $input = $request->all();

        // define o c�digo novo
        $reg = DB::select('select max(ID_ESCOLARIDADE) as id from ESCOLARIDADE ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o pr�ximo codigo
        $input['ID_ESCOLARIDADE'] = $id;

        $this->escolaridades->create($input);
        return view('escolaridades.index');
    }

    public  function edit($id) {
        $escolaridades = $this->escolaridades->find($id);
        return view ('escolaridades.edit')
            ->with('escolaridades', $escolaridades )
            ;
    }

    public function update($id, EscolaridadesRequest $request) {
        $this->escolaridades->find($id)->update($request->all());
        return view('escolaridades.index');
    }

    public function destroy($id) {
        $this->escolaridades->find($id)->delete();
        return;
    }
}
