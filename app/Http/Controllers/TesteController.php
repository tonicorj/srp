<?php

namespace SRP\Http\Controllers;

// DataTables PHP library
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

// Alias Editor classes so they are easy to use
use Illuminate\Http\Request;

use SRP\Http\Requests;
use SRP\Http\Requests\TesteRequest;

use SRP\Teste;
use DB;

class TesteController extends Controller
{
    private $teste;

    public function __construct(Teste $teste) {
        $this->teste = $teste;
        $this->campos =
            ['cidade_nome'
            ,'id_cidade'
            ,'uf'
            ,'id_pais'];
    }

    public function index(Request $request) {
        $r  = "base_path    ->" . base_path()   . "<br>";
        $r .= "app_path     ->" . app_path()    . "<br>";
        $r .= "public_path  ->" . public_path() . "<br>";
        $r .= "storage_path ->" . storage_path();
        //return $r;
        return view('teste.index');
    }

    // retorna a consulta no formato json
    public function teste_json() {
        $_sql = "select a.ID_CIDADE, a.CIDADE_NOME, a.UF, b.PAIS_NOME, a.ID_PAIS " .
            " from cidades a left join paises b on a.id_pais = b.id_pais " .
            " order by cidade_nome ";
        $teste = DB::select($_sql);

        // coloca uma chave [data] para usar no json
        $teste_data['data'] = $teste;
        $teste_json = \Response::json($teste_data);
        return $teste_json;
        //return \Response::json($teste);
    }

    public function teste_editor() {
        include( public_path() . "/plugins/datatables/extensions/editor/php/DataTables.php" );

        // Build our Editor instance and process the data coming from _POST
        /*
        Editor::inst( $db, 'cidades', 'id_cidade' )
            ->fields(
                Field::inst( 'cidade_nome' )->validator( 'Validate::notEmpty' ),
                Field::inst( 'uf' ),
                Field::inst( 'id_pais' ),
                Field::inst( 'id_cidade' )
                    )
            ->process( $_POST )
            ->json();
        */
    }

    public function create() {
        $p  = DB::select('select pais_nome, id_pais from paises order by pais_nome');
        $paises = $p->lists('pais_nome', 'id_pais');

        //return "Funcionou!";
        return view('teste.create')
            ->with('paises', $paises);
    }

    public function store(TesteRequest $request) {
        $input = $request->all();
        //return dd($input);

        $rules = array(
            'cidade_nome' => 'required',    // mesma key que demos nos $products
        );

        //$validator = Validator::make($input, $rules);

        // define o código novo
        $reg = DB::select('select max(ID_CIDADE) as id from CIDADES ');
        $id = $reg[0]->id;

        if ($id == null)
            $id = 0;
        $id = $id+ 1;

        // pega o próximo codigo
        $input['ID_CIDADE'] = $id;

        $this->teste->create($input);
        //Session::flash('flash_message', 'Inclusão feita com sucesso');

        //return $input;
        //return dd($input);
        return  \Response::json($input);
    }

    public  function edit($id) {
        $cidade = $this->teste->find($id);

        //$p  = TPaises::select('nompais', 'codpais')->orderBy('nompais', 'asc');
        //$paises = $p->lists('nompais', 'codpais');

        return view ('teste.edit')
            ->with('cidade', $cidade);
            //->with('paises', $paise));
    }

    public function update($id, TesteRequest $request) {
        $this->teste->find($id)->update($request->all());

        //$rules     = array( 'cidade_nome' => 'required', );
        //$validator = Validator::make($this->teste, $rules);

        return dd($request->all());
    }

    public function destroy($id) {
        $this->teste->find($id)->delete();
        return;
    }

    public function autocomplete(Request $request) {
        $term = $request->input('term');
        $term = '%' . $term . '%';
        $results = array();

        $queries = DB::table('v_cidades')
            ->where('cidade_nome', 'LIKE', $term)
            ->orderBy('cidade_nome')
            ->take(50)->get();
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->ID_CIDADE, 'value' => $query->cidade_nome];
        }
        return response()->json($results);
    }


}
